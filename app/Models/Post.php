<?php

namespace App\Models;

use App\Models\Component;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $guarded = [];

    public function terms()
    {
        return $this->belongsToMany(Term::class, 'post_term');
    }

    public function component()
    {
        return $this->belongsTo(Component::class);
    }

    public function author_object()
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function scopeFilter($query)
    {
        if (request()->filled('component_id')) {
            if (request('component_id')) {
                $query->where('component_id', request('component_id'));
            }
        }
        if (request()->filled('author')) {
            $query->where('author', request('author'));
        }
        if (request()->filled('publish_status')) {
            $query->where('publish_status', request('publish_status'));
        }
        if (request()->filled('title')) {
            $query->where('title', 'like', '%' . request('title') . '%');
        }
        if (request()->filled('from')) {
            $from = verta()->parse(request('from'))->toCarbon();
            $query->where('created_at', '>=', $from);
        }
        if (request()->filled('to')) {
            $to = verta()->parse(request('to'))->toCarbon();
            $query->where('created_at', '<=', $to);
        }
    }

    public function getpublishValueAttribute()
    {
        switch ($this->publish_status) {
            case "draft":
                return "پیش نویس";
                break;
            case "publish":
                return "منتشر شده";
                break;
            default:
                return $this->publish_status;
                break;
        }
    }

    public function getShamsiDate($date)
    {
        if ($date) {
            return convertToPersian(verta($date)->format('H:i Y/m/d'));
        } else {
            return null;
        }
    }

    public function getSingleUrl()
    {
        $permalink = route('showPost', ['siteSlug' => request('siteSlug'), 'componentName' => $this->component->name, 'slug' => $this->slug]);
        return $permalink;
    }

    public function getImageUrl()
    {
        if ($this->thumbnail) {
            return asset(ert('thumb-path') . $this->thumbnail);
        }
        return asset('front-theme-asset/roma') . "/images/portfolio-img1.jpg";
    }

    public function getTotalVisits()
    {
        return Visit::where(['object_type' => 'post', 'object_id' => $this->id])->count();
    }
}
