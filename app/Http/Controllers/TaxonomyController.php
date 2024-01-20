<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Taxonomy;
use App\Models\Term;
use Illuminate\Http\Request;

class TaxonomyController extends Controller
{

    public function index()
    {
        $taxonomies = Taxonomy::orderBy('created_at', 'desc')->paginate(50);
        return view('admin.taxonomy.list', compact(['taxonomies']));

    }

    public function create()
    {
        $action = 'create';
        return view('admin.taxonomy.create', compact(['action']));
    }

    public function store(Request $request)
    {
        if ($request->slug) {
            $slug = make_slug($request->slug);
        } else {
            $slug = make_slug($request->name);
        }
        Taxonomy::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'status' => $request->status,
            'type' => $request->type,
        ]);

        alert()->success('ایجاد تکسونومی جدید','تکسونومی جدید با موفقیت ایجاد شد.');
        return redirect()->route('taxonomy.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $action = 'edit';
        $taxonomy = Taxonomy::find($id);
        return view('admin.taxonomy.create',compact(['action', 'taxonomy']));
    }

    public function update(Request $request, $id)
    {
        if ($request->slug) {
            $slug = make_slug($request->slug);
        } else {
            $slug = make_slug($request->name);
        }
        $taxonomy = Taxonomy::find($id);
        $taxonomy->update([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'status' => $request->status,
            'type' => $request->type,
        ]);

        alert()->success('ویرایش تکسونومی', 'ویرایش تکسونومی با موفقیت انجام شد. ')->autoclose(3500);
        return redirect()->route('taxonomy.index');
    }

    public function destroy($id)
    {
        $taxonomy = Taxonomy::find($id);
        if (count($taxonomy->terms) > 0) {
            alert()->error('حذف طبقه بندی', 'این طبقه شامل ترم است و قابل حذف نیست.');
        } else {
            $taxonomy->delete();
            alert()->success('حذف طبقه بندی', 'طبقه بندی با موفقیت حذف شد.');
        }
        return redirect()->route('taxonomy.index');
    }

}
