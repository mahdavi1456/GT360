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

class PageController extends Controller
{

    public function index(Request $request)
    {
        $pages = Page::latest()->paginate(50);
        $users = User::all();

        return view('admin.page.list', compact(['pages', 'users', 'request']));
    }

    public function create()
    {
        $action = request('action');

        if ($action == "create") {
            $page = new Page();
            return view('admin.page.create', compact(['action', 'page']));
        } else if ($action == "update") {
            $id = request('page');
            $page = Page::findOrFail($id);
            return view('admin.page.create', compact(['action', 'page']));
        }
    }

    public function store(Request $request)
    {
        //  dd($request->all());
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
            //  dd($data);
            $page = Page::create($data);
            //$page->terms()->attach($request->term);
            DB::commit();
            alert()->success('موفق', 'صفحه با موفقیت ساخته شد.');
        } else if ($request->action == "update") {
            DB::beginTransaction();
            $data = $request->except('_token', 'thumbnail', 'action', 'q', 'page');

            $page = Page::findOrFail($request->post);
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
            $request->image->move(public_path(ert('thumb-path')), $fileName);
            if ($request->action == 'create') {
                $post = Post::create([
                    'user_id' => auth()->id(),
                    'author' => auth()->id(),
                    'component_id' => $request->component_id,
                    'thumbnail' => $fileName,
                    'thumbnail_status' => 1
                ]);
                return ['action' => 'created', 'post' => $post->id, 'path' => asset(ert('thumb-path')) . '/' . $post->thumbnail];
            } else {
                $post = Post::findOrFail($request->post);
                $post->update([
                    'thumbnail' => $fileName,
                    'thumbnail_status' => 1
                ]);
                return ['action' => 'update', 'post' => $post->id, 'path' => asset(ert('thumb-path')) . '/' . $post->thumbnail];
            }
        }
    }

    public function thumbDestroy()
    {

        $post = Post::findOrFail(request('post_id'));
        unlink(public_path(ert('thumb-path') . '/' . $post->thumbnail));
        $post->update([
            'thumbnail' => null,
            'thumbnail_status' => 0,
        ]);
        return 'success';
    }
}
