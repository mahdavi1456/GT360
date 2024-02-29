<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservePart extends Model
{
    use HasFactory;

    protected $table = "reserve_parts";
    protected $guarded = [];

    public function hasPlan($date) {
        $projectId=Project::where('slug',request('slug'))->first()->id;

        $rPlan=ReservePlan::where(['rp_date'=>$date->format('Y/m/j'),'name'=>$this->name,'project_id'=>$projectId])->first();
        if ($rPlan) {
                return['plan'=>'true','left_count'=>$rPlan->left_count];
        }
        return ['plan'=>false];
    }
}
