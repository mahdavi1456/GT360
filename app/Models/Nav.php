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

}
