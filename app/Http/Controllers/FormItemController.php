<?php

namespace App\Http\Controllers;

use App\Models\FormItem;
use Illuminate\Http\Request;

class FormItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        ert('cd');
        $items = FormItem::where('form_id', request('form_id'))->latest()->get();
        return view('admin.form_items.list', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.form_items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        FormItem::create($data);

        alert()->success('موفق', "ایجاد شد");
        return to_route('form-item.index', ['form_id' => $data['form_id']]);
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
    public function edit(FormItem $FormItem)
    {
        $item = $FormItem;
        return view('admin.form_items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FormItem $formItem)
    {
        $data = $request->except('_token');
        $formItem->update($data);
        alert()->success('موفق', "ایجاد شد");
        return to_route('form-item.index', ['form_id' => $formItem->form_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormItem $FormItem)
    {
        $form = $FormItem->form_id;
        $FormItem->delete();
        alert()->success('موفق', "ایجاد شد");
        return to_route('form-item.index', ['form_id' => $form]);
    }
}
