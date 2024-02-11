<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        confirmDelete('مطمئنید؟', 'آیا از حذف این مورد اطمینان دارید؟');
        $forms=Form::where('theme_id',request('theme_id'))->latest()->get();
        return view('admin.form.list',compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('admin.form.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        Form::create($data);
        alert()->success("موفق", "ایجاد شد");
        return to_route('form.index', ['theme_id' => $request->theme_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Form $form)
    {
        return view('admin.form.edit',compact('form'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Form $form)
    {
        $data = $request->except('_token');
        $form->update($data);
        alert()->success("موفق", "ویرایش شد");
        return to_route('form.index', ['theme_id' => $form->theme_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Form $form)
    {
        $theme = $form->theme_id;
        $form = $form->delete();
        alert()->success('موفق', 'حذف شد');
        return to_route('form.index', ['theme_id' => $theme]);
    }
}
