<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function terms(){
        return $this->belongsToMany(Term::class,'post_term');
    }
    public function component() {
        return $this->belongsTo(Component::class);
    }
    public function author_object()  {
        return $this->belongsTo(User::class, 'author');
    }
}