<?php

namespace App\Models;

use App\Models\Component;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

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

    public function getPosts($componentName, $accountId, $projectId)
    {
        $component = Component::where("name", $componentName)->first();
        if ($component) {
            $componentId = $component->id;

            $posts = Post::where('account_id', $accountId)->where('project_id', $projectId)->where('component_id', $componentId)->get();
            return $posts;
        } else {
            return null;
        }
    }

    public function getPostPermalink($componentName, $slug, $postId)
    {
        $permalink =  route('showPost', ['slug' => $slug, 'componentName' => $componentName, 'postId' => $postId]);
        return $permalink;
    }

    public function getShamsiDate($date)
    {
        if ($date) {
            return convertToPersian(verta($date)->format('H:i Y/m/d'));
        } else {
            return null;
        }
    }

}
