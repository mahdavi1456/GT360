<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\Project;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Charge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $projectSetting =Project::checkOpenProject(auth()->user()->account_id);
        if ($projectSetting) {
            //$projectName = Project::getProjectName($project->project_id);
            $project = Project::find($projectSetting->project_id);
            $expirationTime = Carbon::parse($project->expire);
            if (Carbon::now()->lt($expirationTime)) {
                return $next($request);
            } else {
                return to_route('project.index');
            }
        } else {
            return to_route('project.index');
        }
    }
}
