<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $tabele = "themes";
    protected $guarded = [];

    public function components()
    {
        return $this->belongsToMany(Component::class, 'component_theme');
    }
}
