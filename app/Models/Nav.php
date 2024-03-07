<?php

namespace App\Models;

use App\Models\NavItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(NavItem::class)->where('project_id', getProjectId())->orderBy('order_num');
    }

    public function getNavItems($name, $parentId, $accountId, $projectId)
    {
        $navId = Nav::where('name', $name)->first();
        if ($navId) {
            $items = NavItem::where('nav_id', $navId->id)->where('parent_id', $parentId)->where('account_id', $accountId)->where('project_id', $projectId)->orderBy('order_num', 'asc')->get();
            return $items;
        } else {
            return null;
        }
    }

    public function itemHasChild($id)
    {
        $items = NavItem::where('parent_id', $id)->get();
        if ($items->count() > 0) {
            return true;
        } else {
            return null;
        }
    }

}
