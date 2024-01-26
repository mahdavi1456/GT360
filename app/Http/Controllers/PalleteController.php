<?php

namespace App\Http\Controllers;

use App\Models\Pallete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class PalleteController extends Controller
{

    public function index()
    {
        $palletes = Pallete::latest()->get();
        return view('admin.pallete.list', compact('palletes'));
    }

    public function create()
    {
        return view('admin.pallete.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'label' => 'required'
        ]);

        $pallete = Pallete::create([
            'name' => $request->name,
            'label' => $request->label,
            'details' => $request->details,
            'first_color' => $request->first_color,
            'second_color' => $request->second_color,
            'third_color' => $request->third_color,
            'fourth_color' => $request->fourth_color
        ]);

        Alert::success('موفق', 'پالت جدید با موفقیت ایجاد شد.');
        return back();
    }

    public function edit(string $id)
    {
        $pallete = Pallete::findOrFail($id);
        return view('admin.pallete.edit', compact('pallete'));
    }

    public function update(Request $request, string $id)
    {
        $pallete = Pallete::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'label' => 'required'
        ]);

        $pallete->update([
            'name' => $request->name,
            'label' => $request->label,
            'details' => $request->details,
            'first_color' => $request->first_color,
            'second_color' => $request->second_color,
            'third_color' => $request->third_color,
            'fourth_color' => $request->fourth_color
        ]);

        Alert::success('موفق', 'پالت با موفقیت ویرایش شد.');
        return redirect()->route('pallete.index');
    }

    public function destroy(string $id)
    {
        $pallete = Pallete::findOrFail($id);
        $pallete->delete();
        Alert::success('موفق', 'پالت با موفقیت حذف شد.');
        return redirect()->route('pallete.index');
    }

}
