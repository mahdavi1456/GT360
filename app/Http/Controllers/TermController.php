<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Taxonomy;
use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TermController extends Controller
{

    public function termList(Request $request)
    {
        $taxonomy_id = $request->taxonomy_id;
        $id = $request->id;
        $termModel = new Term;
        return $termModel->list($taxonomy_id, $id);
    }

    public function store(Request $request)
    {
        if ($request->action == "create") {
            if ($request->slug) {
                $slug = make_slug($request->slug);
            } else {
                $slug = make_slug($request->name);
            }
            Term::create([
                'name' => $request->name,
                'slug' => $slug,
                'description' => $request->description,
                'parent_id' => $request->parent_id,
                'taxonomy_id' => $request->taxonomy_id
            ]);
        } else if ($request->action == "update") {
            $term = Term::find($request->id);
            if ($request->slug) {
                $slug = make_slug($request->slug);
            } else {
                $slug = make_slug($request->name);
            }
            $term->name = $request->name;
            $term->slug = $slug;
            $term->description = $request->description;
            $term-> parent_id = $request->parent_id;
            $term->taxonomy_id = $request->taxonomy_id;
            $term->save();
        }
        $termModel = new Term;
        return $termModel->list($request->taxonomy_id, $request->id);
    }

    public function show($id)
    {
        //
    }

    public function edit($id, Request $request)
    {
        $action = 'edit';
        $term = Term::find($id);
        $terms = Term::with(['childrenRecursive'])
            ->where('taxonomy_id', $request->taxonomy_id)
            ->where('parent_id','=',null)
            ->orderBy('term_order','asc')
            ->get();
        $taxonomy_id = $request->taxonomy_id;
        return response()->json(['form' => view('term.create',compact(['terms', 'action', 'term', 'taxonomy_id']))->render(), 'html' => view('term.list',compact(['terms']))->render()]);
    }

    public function update(Request $request, $id)
    {
        if ($request->slug) {
            $slug = make_slug($request->slug);
        } else {
            $slug = make_slug($request->name);
        }
        $term = Term::find($id);
        $term->update([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'taxonomy_id' => $request->taxonomy_id,
            'photo' => $request->filepath,
            'onlineshop_status' => $request->onlineshop_status,
        ]);

        $terms = Term::with(['childrenRecursive'])
            ->where('taxonomy_id', $request->taxonomy_id)
            ->where('parent_id','=',null)
            ->orderBy('term_order','asc')
            ->get();
        $action = 'create';
        $taxonomy_id = $request->taxonomy_id;
        return response()->json(['form' => view('term.create',compact(['terms', 'action', 'taxonomy_id']))->render(), 'html' => view('term.list',compact(['terms']))->render()]);
    }

    public function destroy($id, Request $request)
    {
        $term = Term::find($id);
        if (count($term->posts) > 0) {
            return response()->json(['status' => 'posts']);
        }
        if (count($term->navs) > 0) {
            return response()->json(['status' => 'navs']);
        } else {
            $term->delete();
            $terms = Term::with(['childrenRecursive'])
                ->where('taxonomy_id', $request->id)
                ->where('parent_id','=',null)
                ->orderBy('term_order','asc')
                ->get();
            $action = 'create';
            $taxonomy_id = $request->id;
            return response()->json(['status' => 'success', 'form' => view('term.create',compact(['terms', 'action', 'taxonomy_id']))->render(), 'html' => view('term.list',compact(['terms']))->render()]);
        }
    }

    public function getChildren(Request $request)
    {
        $term = Term::find($request->id);
        $children = get_taxonomy_terms(null, $request->id);
        $terms = $children;
        return response()->json(['html' => view('term.list', compact(['terms', 'children']))->render()]);
    }

    public function loadTermMeta($id)
    {
        $taxonomy = Taxonomy::where('slug', 'attributes')->first();
        $tax = Taxonomy::where('slug', 'product_category')->first();
        $term = Term::find($id);
        $meta_type = 1;
        if ($term->taxonomy_id == $tax->id && $term->parent_id != null) {
            $meta_type = 2;
        }
        return view('term.meta', compact('term','meta_type', 'taxonomy'));
    }

    public function saveTermMeta(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            if ($key != "_token" && $key != "_method" && $key != "term_id" && $key != "file") {
                $item = TermMeta::where('key', $key)->where('term_id', $request->term_id)->first();
                if (is_array($value)) {
                    $value = implode(',', $value);
                }
                if ($item) {
                    $value = ($key == 'photo_id' && $value == "") ? $item->value : $value;
                    $item->update([
                        'value'=>$value,
                    ]);
                } else {
                    TermMeta::create([
                        'term_id' => $request->term_id,
                        'key' => $key,
                        'value' => $value
                    ]);
                }
            }
        }
        alert()->success('مدیریت محتوا','مدیریت محتوا با موفقیت ایجاد شد.');
        return redirect()->route('term.meta', ['id' => $request->term_id]);
    }

    public function termSort(Request $request)
    {
        $form = $request->form;
        $taxonomy_id = $request->taxonomy_id;
        $i = 1;
        foreach(explode('&',$form) as $item){
            $id = explode('=', $item)[1];
            $term = Term::find($id);
            $term->update([
                'term_order' => $i
            ]);
            $i = $i + 1;
        }
        $terms = get_taxonomy_terms($taxonomy_id, null);
        return response()->json(['html' => view('term.list',compact(['terms']))->render()]);
    }

}
