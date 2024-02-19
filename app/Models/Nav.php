<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function items(){
        return $this->hasMany(NavItem::class)->where('account_id',auth()->user()->account->id);
    }

    public function getNavItems($componentName, $accountId, $projectId)
    {

    }

}
