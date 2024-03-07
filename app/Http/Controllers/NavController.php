<?php

namespace App\Http\Controllers;

use App\Models\Nav;
use App\Models\NavItem;
use App\Models\Page;
use App\Models\Project;
use App\Models\Theme;
use App\Models\Setting;
use Illuminate\Http\Request;

class NavController extends Controller
{

    public function index()
    {
        $navs = Nav::latest()->get();
        ert('cd');
        return view('admin.nav.list', compact('navs'));
    }

    public function create()
    {
        $action = 'create';
        $nav = null;
        if (request('action') == 'update') {
            $action = 'update';
            $nav = Nav::findOrFail(request('nav_id'));
        }
        return view('admin.nav.create', compact('action', 'nav'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token', 'q', 'action', 'nav_id');
        if ($request->action == 'create') {
            Nav::create($data);
            alert()->success('موفق', 'فهرست با موفقیت ساخته شد');
        } else if ($request->action == 'update') {
            $nav = Nav::findOrFail($request->nav_id);
            $nav->update($data);
            alert()->success('موفق', 'فهرست موردنظر ویرایش شد');
        }
        return to_route('nav.index');
    }

    public function destroy(Nav $nav)
    {
        $nav->delete();
        alert()->success('موفق', 'فهرست موردنظر حذف شد');
        return to_route('nav.index');
    }

    public function navItems()
    {
        $pages = Page::where('publish_status','publish')->latest()->get();

        $accountId = auth()->user()->account_id;
        $projectId = Project::checkOpenProject($accountId)->project_id;

        //create link
        if (request()->has('item_type')) {
            $nav = Nav::findOrFail(request('nav_id'));
            if (request('item_type') == 'link') {
                request()->validate([
                    'name' => ['required'],
                    'link' => ['required'],
                ]);
                NavItem::create([
                    'nav_id' => request('nav_id'),
                    'account_id' => $accountId,
                    'project_id' => $projectId,
                    'name' => request('name'),
                    'link' => request('link'),
                    'target' => request('target'),
                    'rel' => request('rel'),
                    'item_type' => request('item_type'),
                    'object_id' => 0,
                    'order_num' => $this->getLastOrder(request('nav_id')) + 1,
                ]);
            }
            //create page
            if (request('item_type') == 'page') {
                request()->validate([
                    'pages' => ['required'],
                ]);
                foreach (request('pages') as $pageId) {
                    $page = Page::findOrFail($pageId);
                    NavItem::create([
                        'nav_id' => request('nav_id'),
                        'account_id' => $accountId,
                        'project_id' => $projectId,
                        'name' => $page->title,
                        'link' => $page->slug,
                        'target' => '_self',
                        'rel' => 'ture',
                        'item_type' => request('item_type'),
                        'object_id' => $page->id,
                        'order_num' => $this->getLastOrder(request('nav_id')) + 1,
                    ]);
                }
            }

            $items = $nav->items()->where('parent_id', 0)->orderBy('order_num')->with('children')->get();

            return view('admin.nav.editItems', compact('nav', 'pages', 'items'));
            //end of createLink
        } else if (request('type') == 'get-nav-info') {

            request()->validate([
                'nav' => 'required'
            ], [
                'nav.required' => "انتخاب اشتباه!"
            ]);
            $nav = Nav::findOrFail(request('nav'));
            $items = $nav->items()->where('parent_id', 0)->orderBy('order_num')->with('children')->get();
            return view('admin.nav.editItems', compact('nav', 'pages', 'items'));
        } elseif (request('type') == 'delete_item') {
            $item = NavItem::where(['id' => request('item_id'), 'account_id' => auth()->user()->account->id])->firstOrFail();
            $item->delete();
            $nav = Nav::findOrFail(request('nav_id'));
            $items = $nav->items()->where('parent_id', 0)->orderBy('order_num')->with('children')->get();
            return view('admin.nav.editItems', compact('nav', 'pages', 'items'));
        } elseif (request()->has('item_id')) {
            // edit item
            $data = request()->except('item_id');
            $item = NavItem::where(['id' => request('item_id'), 'account_id' => auth()->user()->account->id])->firstOrFail();
            $item->update($data);
            // return "alert";
            return $data;
        }
        // end of ajax requests

        $setting = new Setting();

        $accountId = auth()->user()->account_id;
        $themeName = $setting->getSetting('active_theme', $accountId, getProjectId());
        $theme = Theme::where('name', $themeName)->first();
        $navs = $theme->navs->where('status','فعال');
        return view('admin.nav.selectItems', compact('navs'));
    }

    public function getLastOrder($nav)
    {
        return NavItem::getLastOrder($nav);
    }

    public function resortItems(Request $req)
    {
        foreach ($req->all() as $key => $value) {
            //  dd($value);
            $itemId = explode('-', $key);
            $itemId = array_pop($itemId);
            $parent = NavItem::findOrFail($itemId);
            $parent->update([
                'order_num' => $value['order'],
                'parent_id' => 0
            ]);
            if (array_key_exists('children', $value)) {
                foreach ($value['children'] as $key2 => $value2) {
                    $child = NavItem::findOrFail($value2);
                    $child->update([
                        'order_num' => $key2 + 1,
                        'parent_id' => $parent->id
                    ]);
                }
            }
        }
        return $req->all();
    }
}
