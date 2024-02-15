<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //    dd(session('project_id'));
        // $account=auth()->user()->account->with('projects');
        //dd($account);
        ert('cd');
        $projects = Project::where('account_id', auth()->user()->account_id)->latest()->get();
        return view('admin.project.list', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $action = 'create';
        $project = null;
        if (request()->has('update')) {
            $action = 'update';
            $project = Project::where('id', request('update'))
                ->where('account_id', auth()->user()->account_id)
                ->firstOrFail();
            ert('cd');
        }
        return view('admin.project.create', compact('action', 'project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->action == 'create') {
            $data = $request->except('_token', 'action', 'project', 'logo');
            $data['account_id'] = auth()->user()->account_id;
            if ($request->file('logo')) {
                $fileName = time() . '_' . $request->file('logo')->getClientOriginalName();
                $request->logo->move(public_path(ert('aip')), $fileName);
                $data['logo'] = $fileName;
            }


            Project::create($data);
            alert()->success('موفق', "پروژه با موفقیت ایجاد شد");
        } elseif ($request->action == 'update') {
            $data = $request->except('_token', 'action', 'project', 'logo');
            $project = Project::where(['id' => $request->project, 'account_id' => auth()->user()->account_id])->firstOrFail();
            if ($request->file('logo')) {

                if ($project->logo and file_exists(public_path(ert('aip') . $project->logo))) {
                    unlink(public_path(ert('aip') . $project->logo));
                }
                $fileName = time() . '_' . $request->file('logo')->getClientOriginalName();
                $request->logo->move(public_path(ert('aip')), $fileName);
                $data['logo'] = $fileName;
            }
            $project->update($data);
            alert()->success('موفق', "پروژه با موفقیت ویرایش شد");
        }
        return to_route('project.index');
    }


    public function show($id)
    {
        session(['project_id'=>$id]);
        $project = Project::Where(['account_id' => auth()->user()->account_id, 'id' => $id])->firstOrFail();
        return view('admin.project.show',compact('project'));
    }

    /**
     * Display the specified resource.
     */
    public function logoDestroy(string $id)
    {
        $project = Project::Where(['account_id' => auth()->user()->account_id, 'id' => $id])->firstOrFail();
        if ($project->logo and file_exists(public_path(ert('aip') . $project->logo))) {
            unlink(public_path(ert('aip') . $project->logo));
        }
        $project->update([
            'logo' => null
        ]);
        alert()->success('موفق', 'لوگو حذف شد');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::Where(['account_id' => auth()->user()->account_id, 'id' => $id])->firstOrFail();
        $project->delete();
        alert()->warning('موفق', "پروژه با موفقیت حذف شد");
        return redirect()->route('project.index');
    }
}
