<?php

namespace App\Http\Controllers;

use App\Models\Font;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class FontController extends Controller
{

    public function index()
    {
        $fonts = Font::latest()->get();
        return view('admin.font.list', compact('fonts'));
    }

    public function create()
    {
        return view('admin.font.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'label' => 'required'
        ]);

        $font = Font::create([
            'name' => $request->name,
            'label' => $request->label,
            'details' => $request->details
        ]);

        Alert::success('موفق', 'فونت جدید با موفقیت ایجاد شد.');
        return back();
    }

    public function edit(string $id)
    {
        $font = Font::findOrFail($id);
        return view('admin.font.edit', compact('font'));
    }

    public function update(Request $request, string $id)
    {
        $font = Font::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'label' => 'required'
        ]);

        $font->update([
            'name' => $request->name,
            'label' => $request->label,
            'details' => $request->details
        ]);

        Alert::success('موفق', 'فونت با موفقیت ویرایش شد.');
        return redirect()->route('font.index');
    }

    public function destroy(string $id)
    {
        $font = Font::findOrFail($id);
        $font->delete();
        Alert::success('موفق', 'فونت با موفقیت حذف شد.');
        return redirect()->route('font.index');
    }

}
