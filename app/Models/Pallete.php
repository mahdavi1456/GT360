<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pallete extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "palletes";
    protected $guarded = [];
}
