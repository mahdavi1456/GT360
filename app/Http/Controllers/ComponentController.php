<?php

namespace App\Http\Controllers;

use App\Models\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class ComponentController extends Controller
{

    public function index()
    {
        $components = Component::latest()->get();

        return view('admin.component.list', compact('components'));
    }

    public function create()
    {
        return view('admin.component.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'label' => 'required'
        ]);

        $component = Component::create([
            'name' => $request->name,
            'label' => $request->label,
            'slogan' => $request->slogan,
            'details' => $request->details,
            'status' => $request->status
        ]);

        Alert::success('موفق', 'بخش جدید با موفقیت تعریف شد.');
        return back();
    }

    public function edit(string $id)
    {
        $component = Component::findOrFail($id);
        return view('admin.component.edit', compact('component'));
    }

    public function update(Request $request, string $id)
    {
        $component = Component::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'label' => 'required'
        ]);

        $component->update([
            'name' => $request->name,
            'label' => $request->label,
            'slogan' => $request->slogan,
            'details' => $request->details,
            'status' => $request->status
        ]);

        Alert::success('موفق', 'بخش با موفقیت ویرایش شد.');
        return redirect()->route('component.index');
    }

    public function destroy(string $id)
    {
        $component = Component::findOrFail($id);
        $component->delete();
        Alert::success('موفق', 'بخش با موفقیت حذف شد.');
        return redirect()->route('component.index');
    }

}
