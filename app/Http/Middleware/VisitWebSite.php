<?php

namespace App\Http\Middleware;

use App\Models\SiteEngine;
use Closure;

use Illuminate\Http\Request;
use Jenssegers\Agent\Facades\Agent;
use App\Models\Visit as ModelsVisit;
use Symfony\Component\HttpFoundation\Response;

class VisitWebSite
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //dump(session()->all());
        $response = $next($request);
        $siteEngine = new SiteEngine;
        $object = null;
        $object_type = null;
        if (request()->route()->getName() == 'showProduct') {
            $object = $siteEngine->getProduct(request('slug'));
            $object_type = 'product';
        } elseif (request()->route()->getName() == 'showPost') {
            $object = $siteEngine->getPost(request('slug'));
            $object_type = 'post';
        } elseif (request()->route()->getName() == 'showPage') {
            $object = $siteEngine->getPage(request('slug'));
            $object_type = 'page';
        }
        ModelsVisit::create([
            'ip' => getIp(),
            'url' => request()->url(),
            'route' => request()->route()->getName(),
            'browser' => Agent::browser(),
            'device' => Agent::platform(),
            'target' => 'website',
            'component_id'=>$object?->component_id,
            'object_id' => $object?->id,
            'object_type' => $object_type,
            'slug' => request('siteSlug'),
            'project_id'=>getProjectId()
        ]);


        return $response;
    }
}
