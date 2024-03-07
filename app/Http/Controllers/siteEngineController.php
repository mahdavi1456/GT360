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
    public function loadSite($siteSlug)
    {
        //  slugWorm();

        //   User::find(4)->increment('city');
        $settingModel = new Setting;
        // $postModel = new Post;
        // $pageModel = new Page;
        // $navModel = new Nav;
        // $palleteModel = new Pallete;
        $siteEngine = new SiteEngine;
        //dd($siteEngine-> getNavItemsByName('top-menu'));

        // $account = Account::where('slug', $siteSlug)->first();
        $project = Project::where('slug', $siteSlug)->first();
        // dd($project,$slug);
        $accountId = getAccountId();
        $projectId = getProjectId();
        $theme = getActiveTheme();
        $view = "front.theme.$theme.index";
        $products = Post::where('component_id', 2)->get();
        return view($view, compact('siteEngine', 'projectId', 'settingModel', 'accountId'));
    }

    public function showPost($siteSlug, $componentName, $slug)
    {
        $siteEngine = new SiteEngine;

        $project = Project::where('slug', $siteSlug)->firstOrFail();
        $accountId = $project->account_id;
        $projectId = $project->id;
        $theme = Account::activeTheme($accountId, $projectId);
        $view = "front.theme.$theme.single.post";
        return view($view, compact('siteEngine', 'slug'));
    }

    public function showPage($siteSlug, $slug)
    {
        $siteEngine = new SiteEngine;
        $theme = getActiveTheme();
        $view = "front.theme.$theme.single.page";
        return view($view, compact('siteEngine', 'slug'));
    }

    public function showProduct($siteSlug, $slug)
    {
        //dd(session()->all());
        $siteEngine = new SiteEngine;
        $theme = getActiveTheme();
        $view = "front.theme.$theme.single.product";
        return view($view, compact('siteEngine', 'slug'));
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
