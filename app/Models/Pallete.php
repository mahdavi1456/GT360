<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pallete extends Model
{
    use HasFactory;

    protected $table = "palletes";
    protected $guarded = [];

    public function getByName($name)
    {
        $data = Pallete::where("name", $name)->first();
        if ($data) {
            return $data;
        } else {
            return null;
        }
    }
}
