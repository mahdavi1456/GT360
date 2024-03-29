<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Term;
use App\Models\User;
use App\Models\Theme;
use App\Models\Project;
use App\Models\Taxonomy;
use App\Models\Component;
use App\Models\Attachment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

    public function index(Request $request)
    {
        $accountId = auth()->user()->account->id;
        $projectId = Project::checkOpenProject($accountId)->project_id;

        $posts = Post::where('account_id', $accountId)->where('project_id', $projectId)->filter()->latest()->paginate(3);

        $accountUsers = auth()->user()->account->users;
        $activeTheme = Theme::getActive();
        ert('cd');
        $components = $activeTheme->components;
        // dd($components);
        return view('admin.post.list', compact(['components', 'request', 'posts', 'accountUsers']));
    }

    public function create()
    {

        $action = request('action');
        $term_array = [];
        $compnent = Component::findOrFail(request('component_id'));
        // $taxonomies = Taxonomy::where(['status', 1])->with('parents')->latest()->get();
        $taxonomies = $compnent->taxonomies()->with('parents')->latest()->get();
        // $components = Component::all();
        // $componentModel = new Component;
        if ($action == 'create') {
            $post = new Post();
            return view('admin.post.create', compact(['action', 'taxonomies', 'term_array', 'post']));
        } elseif ($action == 'update') {
            $id = request('post');
            $post = Post::findOrFail($id);
            $term_array = $post->terms->pluck('id')->toArray();
            return view('admin.post.create', compact(['action', 'taxonomies', 'post', 'term_array']));
        }
    }

    public function store(Request $request)
    {

        if ($request->action == 'create') {
            $request->validate([
                'slug' => "required|unique:posts,slug,null,id,component_id," . $request->component_id
            ], [
                'slug.unique' => 'نامک نوشته شده قبلا برای این بخش ثبت شده است',
            ]);
            // $validate=Validator::make(request()->all(),[
            //     'slug'=>"required|unique:posts,slug,null,id,component_id,".$request->component_id
            // ],[
            //     'slug.unique'=>'نامک نوشته شده قبلا برای این بخش ثبت شده است',
            // ]);
            // if ($validate->fails()) {
            //     dd($request->all());
            //     if ($request->post) {
            //         return back()->withErrors($validate)->withInput()->with(['action'=>'update','post'=>request('post')]);
            //     }
            //   return back()->withErrors($validate)->withInput();
            // }
            $data = $request->except('_token', 'term', 'thumbnail', 'action', 'q', 'post');
            // if ($request->thumbnail) {
            //     $fileName = now()->timestamp . '_' . $request->thumbnail->getClientOriginalName();
            //     $request->thumbnail->move(public_path(ert('thumb-path')), $fileName);
            //     $data['thumbnail'] = $fileName;
            //     $data['thumbnail_status'] = 1;
            // }
            DB::beginTransaction();

            $accountId = auth()->user()->account_id;

            $data['account_id'] = $accountId;
            $data['project_id'] = getProjectId();
            $data['author'] = auth()->id();
            $data['slug'] = make_slug($request->slug);
            //  dd($data);
            $post = Post::create($data);
            $post->terms()->attach($request->term);
            DB::commit();
            alert()->success('موفق', 'نوسته مورد نظر ساخته شد');
        } else if ($request->action == 'update') {
            $post = Post::findOrFail($request->post);
            // $request->validate([
            //     'slug'=>"required|unique:posts,slug,$post->id,id,component_id,".$request->component_id
            // ],[
            //     'slug.unique'=>'نامک نوشته شده قبلا برای این بخش ثبت شده است',
            // ]);
            $validate = Validator::make($request->all(), [
                'slug' => "required|unique:posts,slug,$post->id,id,component_id," . $request->component_id
            ], [
                'slug.unique' => 'نامک نوشته شده  قبلا برای این بخش ثبت شده است',
            ]);
            if ($validate->fails()) {

                return redirect(Str::before(url()->previous(), '?').'?'.http_build_query(['component_id'=>request('component_id'),'action'=>'update','post'=>request('post')]))->withErrors($validate)->withInput();
            }

            DB::beginTransaction();
            $data = $request->except('_token', 'term', 'thumbnail', 'action', 'q', 'post', 'component_id');
            $data['slug'] = make_slug($request->slug);

            $post->update($data);
            $post->terms()->sync($request->term);
            DB::commit();

            alert()->success('موفق', 'نوسته مورد نظر ویرایش شد');
        }

        return to_route('post.index', ['component_id' => $post->component_id]);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        alert()->success('حذف پست', 'پست با موفقیت حذف شد. ');
        return to_route('post.index', ['component_id' => $post->component_id]);
    }

    public function uploadImage(Request $request)
    {
        if ($request->image) {
            $fileName = now()->timestamp . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path(ert('thumb-path')), $fileName);
            if ($request->action == 'create') {
                $post = Post::create([
                    'account_id' => auth()->user()->account_id,
                    'author' => auth()->id(),
                    'project_id' => getProjectId(),
                    'component_id' => $request->component_id,
                    'thumbnail' => $fileName,
                    'thumbnail_status' => 1
                ]);
                return ['action' => 'update', 'post' => $post->id, 'path' => asset(ert('thumb-path')) . '/' . $post->thumbnail];
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

    /*
    public function store(Request $request)
    {
        parse_str($request->list, $data);
        $post = Post::where('title', $data['title'])->get();
        if (count($post) > 0) {
            return response()->json('fail');
        } else {
            $post = Post::create([
                'user_id' => Auth::user()->id,
                'post_type_id' => $data['post_type_id'],
                'title' => $data['title'],
                'content' => $request->content,
                'abstract' =>$data['abstract'],
                'publish_status' => $data['publish_status'],
                'thumbnail' => $data['filepath'],
                'thumbnail_status' => $data['thumbnail_status'],
                'post_order' => $data['order'],
                'slug' => make_slug($data['title']),
                'author' => $data['author'],
            ]);

            parse_str($request->taxonomy_fields, $fields);
            foreach ($fields as $field) {
                if (is_array($field)) {
                    foreach ($field as $item) {
                        PostTerm::create([
                            'post_id' => $post->id,
                            'term_id' => $item,
                            'model' => 'post'
                        ]);
                    }
                } else {
                    PostTerm::create([
                        'post_id' => $post->id,
                        'term_id' => $field,
                        'model' => 'Post'
                    ]);
                }
            }
            if ($data['multimedia_id'][0] != "") {
                $photo = explode(',', $data['multimedia_id'][0]);
                foreach ($photo as $item) {
                    if ($item != "") {
                        Attachment::create([
                            'media_id' => $item,
                            'type' => 'multimedia',
                            'record_id' => $post->id,
                        ]);
                    }
                }
            }

            if ($data['photo_id'][0] != "") {
                $photo = explode(',', $data['photo_id'][0]);
                foreach ($photo as $item) {
                    if ($item != "") {
                        Attachment::create([
                            'media_id' => $item,
                            'type' => 'post',
                            'record_id' => $post->id,
                        ]);
                    }
                }
            }
            return response()->json('success');
        }
    }

    public function show($id)
    {
        $post = Post::find($id);
        return new PostResource($post);
    }

    public function edit($id)
    {
        $action = 'edit';
        $post = Post::find($id);
        if ($post->thumbnial) {
            $ext = explode('.', $post->thumbnail)[1];
        } else {
            $ext = "";
        }
        $postType = PostType::find($post->post_type_id);
        $types = PostType::whereIn('id', User::valid_post_types())->orderBy('created_at', 'desc')->get();

        $tax_ids = TaxonomyPosttype::where('postType_id', $post->post_type_id)->pluck('taxonomy_id');
        $taxonomies = Taxonomy::where('status', 1)->whereIn('id', $tax_ids)->whereIn('id', User::valid_taxonomies())->get();
        $hidden = Taxonomy::where('status', 0)->whereIn('id', $tax_ids)->get();

        $termids = PostTerm::where('post_id', $post->id)->where('model', 'post')->pluck('term_id');
        $tax_ids = Term::whereIn('id',$termids)->pluck('taxonomy_id');
        $hidden_taxonomies = Taxonomy::where('status', 0)->whereIn('id', $tax_ids)->get();

        return view('posts.create',compact(['ext','hidden_taxonomies', 'hidden', 'action','post', 'types','taxonomies']));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        parse_str($request->list, $data);
        $existance = Post::where('title', $data['title'])->where('id','!=',$id)->get();
        if (count($existance) > 0) {
            return response()->json('fail');
        } else {
            $post->update([
                'post_type_id' => $data['post_type_id'],
                'title' => $data['title'],
                'content' => $request->content,
                'abstract' =>$data['abstract'],
                'publish_status' => $data['publish_status'],
                'thumbnail' => $data['filepath'],
                'thumbnail_status' => $data['thumbnail_status'],
                'post_order' => $data['order'],
                'slug' => make_slug($data['title']),
                'author' => $data['author'],
            ]);

            if ($post->title != $data['title']) {
                EditLog::create([
                    'user_id' => Auth::user()->id,
                    'old_field' => $post->title,
                    'new_field' => $data['title'],
                    'record_id' => $post->id,
                    'table_name' => 'post',
                    'field_name' => 'title',
                ]);
            }
            if ($post->content != $data['content']) {
                EditLog::create([
                    'user_id' => Auth::user()->id,
                    'old_field' => $post->content,
                    'new_field' => $request->content,
                    'record_id' => $post->id,
                    'table_name' => 'post',
                    'field_name' => 'content',
                ]);
            }

            $attributes = PostTerm::where('post_id', $post->id)->where('model', 'post')->get();
            foreach ($attributes as $item) {
                $item->delete();
            }
            parse_str($request->taxonomy_fields, $fields);
            foreach ($fields as $field) {
                if (is_array($field)) {
                    foreach ($field as $item) {
                        PostTerm::create([
                            'post_id' => $post->id,
                            'term_id' => $item,
                            'model' => 'post'
                        ]);
                    }
                } else {
                    PostTerm::create([
                        'post_id' => $post->id,
                        'term_id' => $field,
                        'model' => 'Post'
                    ]);
                }
            }

            if ($data['multimedia_id'][0] != "") {
                $photo = explode(',', $data['multimedia_id'][0]);
                foreach ($photo as $item) {
                    if ($item != "") {
                        Attachment::create([
                            'media_id' => $item,
                            'type' => 'multimedia',
                            'record_id' => $post->id,
                        ]);
                    }
                }
            }
            if ($data['photo_id'][0] != "") {
                $photo = explode(',', $data['photo_id'][0]);
                foreach ($photo as $item) {
                    if ($item != "") {
                        Attachment::create([
                            'media_id' => $item,
                            'type' => 'post',
                            'record_id' => $post->id,
                        ]);
                    }
                }
            }
            return response()->json('success');
        }
    }

    public function getTaxonomies(Request $request)
    {
        $model= "";
        $post_id = "";
        $postType = PostType::find($request->id);
        $tax_ids = TaxonomyPosttype::where('postType_id', $request->id)->pluck('taxonomy_id');
        $taxonomies = Taxonomy::where('status', 1)->whereIn('id', $tax_ids)->whereIn('id', User::valid_taxonomies())->get();
        $hidden = Taxonomy::where('status', 0)->whereIn('id', $tax_ids)->get();
        return response()->json(['html'=>view('posts.partials.taxonomy',compact(['hidden','taxonomies','post_id','model']))->render()]);
    }
    */
}
