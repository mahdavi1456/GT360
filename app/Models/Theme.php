<?php

namespace App\Models;

use App\Models\Nav;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Theme extends Model
{
    use HasFactory;

    protected $tabele = "themes";
    protected $guarded = [];

    public function components()
    {
        return $this->belongsToMany(Component::class, 'component_theme');
    }
    public function navs()
    {
        return $this->belongsToMany(Nav::class, 'nav_theme');
    }

}
