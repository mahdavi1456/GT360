<?php

namespace App\Models;
use App\Models\NavItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function items() {
        return $this->hasMany(NavItem::class)->where('account_id',auth()->user()->account->id);
    }

    public function getNavItems($name, $accountId, $projectId)
    {
        $navId = Nav::where('name', $name)->first();
        if ($navId) {
            $items = NavItem::where('nav_id', $navId->id)->where('account_id', $accountId)->where('project_id', $projectId)->first();
            return $items;
        } else {
            return null;
        }
    }

}
