<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Setting;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {
        $settingModel = new Setting;
        ert('cd');
        $projects = Project::where('account_id', auth()->user()->account_id)->latest()->get();
        return view('admin.project.list', compact('projects', 'settingModel'));
    }

    public function create()
    {
        $settingModel = new Setting;
        $action = "create";
        $project = null;
        if (request()->has('update')) {
            $action = 'update';
            $project = Project::where('id', request('update'))
                ->where('account_id', auth()->user()->account_id)
                ->firstOrFail();
            ert('cd');
        }
        return view('admin.project.create', compact('action', 'project', 'settingModel'));
    }

    public function store(Request $request)
    {
        if ($request->action == 'create') {
            $request->validate([
                'slug'=>'required|unique:projects,slug',
                'domain'=>'required|unique:projects,domain'
            ],[
                'slug.unique'=>'نامک وارد شده شما قبلا ثبت شده است',
            ]);
            $data = $request->except('_token', 'action', 'project', 'logo');
            $data['slug'] = make_slug($request->slug);
            $data['account_id'] = auth()->user()->account_id;
            if ($request->file('logo')) {
                $fileName = time() . '_' . $request->file('logo')->getClientOriginalName();
                $request->logo->move(public_path(ert('aip')), $fileName);
                $data['logo'] = $fileName;
            }

            Project::create($data);
            alert()->success('موفق', "پروژه با موفقیت ایجاد شد");
        } else if ($request->action == 'update') {
            $request->validate([
                'slug'=>'required|unique:projects,slug,'.$request->project,
                'domain'=>'required|unique:projects,domain,'.$request->project,
            ],[
                'slug.unique'=>'نامک وارد شده شما قبلا ثبت شده است',
            ]);
            $data = $request->except('_token', 'action', 'project', 'logo');
            $data['slug'] = make_slug($request->slug);
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
        session(['project_id' => $id]);
        $project = Project::Where(['account_id' => auth()->user()->account_id, 'id' => $id])->firstOrFail();
        return view('admin.project.show', compact('project'));
    }

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

    public function destroy(string $id)
    {
        $project = Project::Where(['account_id' => auth()->user()->account_id, 'id' => $id])->firstOrFail();
        $project->delete();
        alert()->warning('موفق', "پروژه با موفقیت حذف شد");
        return redirect()->route('project.index');
    }

    public function chooseProject()
    {
        $settingModel = new Setting;
        $projects = Project::where('account_id', auth()->user()->account_id)->latest()->get();
        return view('admin.choose-project', compact('settingModel', 'projects'));
    }

    public function openProject(Request $request)
    {
        $accountId = auth()->user()->account_id;
        $settingModel = new Setting();
        $project = Project::openProject($accountId, $request->project_id);
        if (!$settingModel->getSetting('active_theme', $accountId, $project->project_id)) {
            alert()->success('شما قالب فعال ندارید لطفا یکی انتخاب کنید');
            return to_route('theme.choose');
        }
        session(['projectId'=>$project->project_id]);
        return to_route('dashboard');
    }
}
