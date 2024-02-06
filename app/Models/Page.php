<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function author_object()  {
        return $this->belongsTo(User::class, 'author');
    }

}
