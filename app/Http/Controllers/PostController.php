<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Component;
use App\Models\Taxonomy;
use App\Models\Attachment;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Term;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function index(Request $request)
    {
        $status = $request->status;
        $from = $request->from;
        $to = $request->to;
        $title = $request->title;
        $user_id = $request->user_id;
        $component_id = $request->component_id;
        $posts = Post::orderBy('created_at', 'desc');

        if (count($request->all()) > 0) {
            //$posts = Post::orderBy('created_at', 'desc')->where('remove_st', $request->remove_st)->paginate(50);
            if ($request->user_id) {
                $posts->where('user_id', $user_id);
            }
            if ($request->from) {
                $date = shamsi_to_miladi($from);
                $posts->whereDate('created_at', '>=', $date);
            }
            if ($request->to) {
                $date = shamsi_to_miladi($to);
                $posts->whereDate('created_at', '<=', $date);
            }
            if ($request->post_type) {
                $posts->where('post_type_id', $post_type);
            }
            if ($request->title) {
                $posts->where('title', 'like', '%' . $title . '%');
            }
            if ($request->status && $request->status != 'all') {
                $posts->where('publish_status', $status);
            }
        }
        $posts = $posts->paginate(50);

        $users = User::all();

        $components = Component::all();
        return view('admin.post.list', compact(['components', 'request', 'posts', 'users', 'status', 'from', 'to', 'title', 'user_id']));
    }

    public function create()
    {
        $action = "create";
        $taxonomies = Taxonomy::where('status', 1)->with('parents')->latest()->get();
        //   dd( $taxonomies);
        $components = Component::all();
        $componentModel = new Component;
        return view('admin.post.create', compact(['action', 'components', 'componentModel', 'taxonomies']));
    }
    public function store(Request $request)
    {
        //  dd($request->all());
        $request->validate([
            'content' => 'required|min:5'
        ]);
        DB::beginTransaction();
        $data = $request->except('_token', 'term', 't');
        $data['user_id'] = auth()->id();
        $data['author'] = auth()->id();
      //  dd($data);
        $post = Post::create($data);
        $post->terms()->attach($request->term);
        DB::commit();
        alert()->success('موفق', 'نوسته مورد نظر ساخته شد');
        return to_route('post.index', ['component_id' => $post->component_id]);
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

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->update([
            'remove_st' => 1,
            'remove_user' => Auth::user()->id,
            'remove_date' => date('Y-m-d'),
        ]);
        alert()->success('حذف پست', 'پست با موفقیت حذف شد. ');
        return redirect()->route('posts.index');
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
