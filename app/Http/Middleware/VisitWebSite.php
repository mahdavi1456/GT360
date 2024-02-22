<?php

namespace App\Http\Middleware;

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
        $response=$next($request);
        ModelsVisit::create([
            'ip'=>getIp(),
            'url'=>request()->url(),
            'route'=>request()->route()->getName(),
            'browser'=>Agent::browser(),
            'device'=>Agent::platform(),
            'target'=>'website',
            'slug'=>request('slug')
        ]);

        return $response;
    }
}
