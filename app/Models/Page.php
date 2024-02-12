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

    public function scopeFilter($query)
    {
       
        if (request()->filled('author')) {
            $query->where('author', request('author'));
        }
        if (request()->filled('publish_status')) {
            $query->where('publish_status', request('publish_status'));
        }
        if (request()->filled('title')) {
            $query->where('title','like', '%' . request('title') . '%');
        }
        if (request()->filled('from')) {
           $from=verta()->parse(request('from'))->toCarbon();
           $query->where('created_at','>=',$from);
        }
        if (request()->filled('to')) {
            $to=verta()->parse(request('to'))->toCarbon();
           $query->where('created_at','<=',$to);
        }
    }
}
