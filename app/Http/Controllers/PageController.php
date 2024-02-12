<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\fileExists;

class PageController extends Controller
{

    public function index(Request $request)
    {
        $pages = Page::where('account_id',auth()->user()->account_id)->filter()->latest()->paginate(3);
        $accountUsers = auth()->user()->account->users;
        return view('admin.page.list', compact(['pages', 'accountUsers', 'request']));
    }

    public function create()
    {
        $action = request('action');

        if ($action == "create") {
            $page = null;
            return view('admin.page.create', compact(['action', 'page']));
        } else if ($action == "update") {
            $id = request('page');
            $page = Page::findOrFail($id);
            return view('admin.page.create', compact(['action', 'page']));
        }
    }

    public function store(Request $request)
    {
      //   dd($request->all());
        $request->validate([
            'content' => 'required|min:5'
        ]);
        if ($request->action == "create") {
            $data = $request->except('_token', 'thumbnail', 'action', 'q', 'page');
            // if ($request->thumbnail) {
            //     $fileName = now()->timestamp . '_' . $request->thumbnail->getClientOriginalName();
            //     $request->thumbnail->move(public_path(ert('thumb-path')), $fileName);
            //     $data['thumbnail'] = $fileName;
            //     $data['thumbnail_status'] = 1;
            // }
            DB::beginTransaction();

            $data['user_id'] = auth()->id();
            $data['author'] = auth()->id();
            $data['account_id'] = auth()->user()->account_id;
          //  dd($data);
            // dd($data);
            $page = Page::create($data);
            //$page->terms()->attach($request->term);
            DB::commit();
            alert()->success('موفق', 'صفحه با موفقیت ساخته شد.');
        } else if ($request->action == "update") {
            DB::beginTransaction();
            $data = $request->except('_token', 'thumbnail', 'action', 'q', 'page');

            $page = Page::findOrFail($request->page);
            $page->update($data);
            DB::commit();

            alert()->success('موفق', 'صفحه با موفقیت ویرایش شد.');
        }

        return to_route('page.index');
    }

    public function uploadImage(Request $request)
    {
        if ($request->image) {
            $fileName = now()->timestamp . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path(ert('pip')), $fileName);
            if ($request->action == 'create') {
                $page = Page::create([
                    'user_id' => auth()->id(),
                    'author' => auth()->id(),
                    'account_id' => auth()->user()->account->id,
                    'thumbnail' => $fileName,
                    'thumbnail_status' => 1
                ]);
                return ['action' => 'update', 'page' => $page->id, 'path' => asset(ert('pip')) . '/' . $page->thumbnail];
            } else {
                $page = Page::findOrFail($request->page);
                $page->update([
                    'thumbnail' => $fileName,
                    'thumbnail_status' => 1
                ]);
                return ['action' => 'update', 'page' => $page->id, 'path' => asset(ert('pip')) . '/' . $page->thumbnail];
            }
        }
    }

    public function pageImageDestroy()
    {

        $page = Page::findOrFail(request('page_id'));
        if ($page->thumbnail and file_exists(public_path(ert('pip') . '/' . $page->thumbnail))) {
            unlink(public_path(ert('pip') . '/' . $page->thumbnail));
        }
        $page->update([
            'thumbnail' => null,
            'thumbnail_status' => 0,
        ]);
        return 'success';
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();
        alert()->success('حذف پست', 'صفحه با موفقیت حذف شد. ');
        return redirect()->route('page.index');
    }




}
