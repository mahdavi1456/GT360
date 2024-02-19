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
        return $this->hasMany(NavItem::class)->where('account_id', auth()->user()->account->id);
    }

    public function getNavItems($name, $parentId, $accountId, $projectId)
    {
        $navId = Nav::where('name', $name)->first();
        if ($navId) {
            $items = NavItem::where('nav_id', $navId->id)->where('parent_id', $parentId)->where('account_id', $accountId)->where('project_id', $projectId)->orderBy('order_num')->get();
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
