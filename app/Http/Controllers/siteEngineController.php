<?php

namespace App\Http\Controllers;

use App\Models\Nav;
use App\Models\Page;
use App\Models\Post;
use App\Models\Account;
use App\Models\Pallete;
use App\Models\Project;
use App\Models\Setting;
use App\Models\SiteEngine;
//use App\Servieses\SiteEngine
use Illuminate\Http\Request;

class SiteEngineController extends Controller
{
    public function loadSite($slug)
    {
        //   User::find(4)->increment('city');
        // $settingModel = new Setting;
        // $postModel = new Post;
        // $pageModel = new Page;
        // $navModel = new Nav;
        // $palleteModel = new Pallete;
        $siteEngine=new SiteEngine;
        // $account = Account::where('slug', $slug)->first();
        $project = Project::where('slug', $slug)->first();
        // dd($project,$slug);
        if ($project) {
            $accountId = $project->account_id;
            $projectId = $project->id;
            $theme = Account::activeTheme($accountId, $projectId);
            $view = "front.theme.$theme.index";
            $products = Post::where('component_id', 2)->get();
            return view($view, compact('siteEngine', 'projectId', 'slug'));
        }
        return "یک تم برای خود انتخاب کنید";
    }

    public function showPost($slug, $componentName, $postId)
    {
        $settingModel = new Setting;
        $postModel = new Post;
        $pageModel = new Page;
        $navModel = new Nav;
        $pageModel = new Pallete;

        $project = Project::where('slug', $slug)->first();
        if ($project) {
            $accountId = $project->account_id;
            $projectId = $project->id;
            $theme = Account::activeTheme($accountId, $projectId);
            $view = "front.theme.$theme.post";
            return view($view, compact('settingModel', 'postModel', 'pageModel', 'navModel', 'accountId', 'projectId', 'slug', 'postId', 'palleteModel'));
        }
    }

    public function showPage($slug, $link, $pageId)
    {
        $settingModel = new Setting;
        $postModel = new Post;
        $pageModel = new Page;
        $navModel = new Nav;
        $palleteModel = new Pallete;

        $project = Project::where('slug', $slug)->first();
        if ($project) {
            $accountId = $project->account_id;
            $projectId = $project->id;
            $theme = Account::activeTheme($accountId, $projectId);

            if (Page::find($pageId)) {
                $view = "front.theme.$theme.page";
                return view($view, compact('settingModel', 'postModel', 'pageModel', 'navModel', 'accountId', 'projectId', 'slug', 'pageId', 'palleteModel'));
            } else {
                $view = "front.theme.$theme.404";
                return view($view, compact('settingModel', 'postModel', 'pageModel', 'navModel', 'accountId', 'projectId', 'slug', 'pageId', 'palleteModel'));
            }
        }
    }


    public function reserve($slug)
    {

        $settingModel = new Setting;
        $reservePlanModel = new ReservePlan;
        $palleteModel = new Pallete;

        $project = Project::where('slug', $slug)->first();

        // $v = new Verta();
        // $currentYear = $v->year;
        // $currentMonth = $v->month;
        $date = verta();
        $currentYear = $date->year;
        $currentMonth = request('month') ?? $date->month;
        $currentDay = request('day') ?? $date->day;
        if (request('day')) {
            $date->month = $currentMonth;
            $date->day = $currentDay;
        }
        $date->startMonth();

        if ($project) {
            $accountId = $project->account_id;
            $projectId = $project->id;

            $theme = Account::activeTheme($accountId, $projectId);

            $view = "front.theme.$theme.reserve";
            return view($view, compact('settingModel', 'date', 'reservePlanModel', 'palleteModel', 'accountId', 'projectId', 'currentYear', 'currentMonth', 'currentDay'));
        }
        return "یک تم برای خود انتخاب کنید";
    }
}
