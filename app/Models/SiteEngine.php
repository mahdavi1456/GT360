<?php

namespace App\Models;

use App\Models\Page;
use App\Models\Post;
use App\Models\Product;
use App\Models\Component;
use Illuminate\Database\Eloquent\Model;

class SiteEngine extends Model
{
    //post section
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

    public function getPost($postId, $accountId, $projectId)
    {
            // $post = Post::where('account_id', $accountId)->where('project_id', $projectId)->where('id', $postId)->firstOrFail();
            $post = Post::findOrFail($postId);
            return $post;
    }

    public function getPostPermalink($componentName, $slug, $postId)
    {
        $permalink = route('showPost', ['slug' => $slug, 'componentName' => $componentName, 'postId' => $postId]);
        return $permalink;
    }

    //end post section
    //-----------------------------------------------------------
    //page sectino

    public function getPagePermalink($slug, $link, $pageId)
    {
        $permalink = route('showPage', ['slug' => $slug, 'link' => $link, 'pageId' => $pageId]);
        return $permalink;
    }

    public function getPages($componentName, $accountId, $projectId)
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

    public function getPageData($pageId)
    {
        $data = Page::find($pageId);
        return $data;
    }

    //end page section
    //-----------------------------------------------------------
    //setting section
    public function getSetting($key,$projectId = 0)
    {
        $s = Setting::where([
            'key' => $key,
            'project_id' => $projectId
        ])->first();
        if ($s) {
            return $s->value;
        } else {
            return null;
        }
    }


    public function getProducts($projectId,$limit)
    {
            $products = Product::where('project_id', $projectId)->latest()->take(9);
            return $products;
    }
}
