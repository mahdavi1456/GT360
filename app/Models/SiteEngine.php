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
    public function getPosts($componentName = null, $limit = null)
    {
        $component = Component::where("name", $componentName)->first();
        if ($component) {
            $componentId = $component->id;
            $posts = Post::where('project_id', getProjectId())->where('component_id', $componentId)->take($limit)->get();
            return $posts;
        } else {
            $posts = Post::where('project_id', getProjectId())->latest()->take($limit)->get();
            return $posts;
        }
    }

    public function getPost($slug)
    {
        //dd($slug);
        $post = Post::where('slug',$slug)->where('publish_status','publish')->firstOrFail();
        dd($post);
        return $post;
    }

    public function getPostPermalink($siteSlug, $componentName, $slug)
    {
        $permalink = route('showPost', ['siteSlug' => $siteSlug, 'componentName' => $componentName, 'slug' => $slug]);
        return $permalink;
    }

    //end post section
    //-----------------------------------------------------------
    //page sectino

    public function getPagePermalink($siteSlug, $slug)
    {
        $permalink = route('showPage', ['siteSlug' => $siteSlug,'slug' => $slug]);
        return $permalink;
    }

    public function getPages($limit=null)
    {
        $pages = Page::where('project_id', getProjectId())->where('publish_status','publish')->latest()->take($limit)->get();
        return $pages;
    }

    public function getPage($slug)
    {
       return Page::where('slug',$slug)->where('publish_status','publish')->firstOrFail();
    }

    //end page section
    //-----------------------------------------------------------
    //setting section
    public function getSetting($key, $projectId = 0)
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
    // end setting section
    //-----------------------------------------------------------
    //produc section
    public function getProducts($limit = null)
    {
        $products = Product::where('project_id', getProjectId())->latest()->take($limit)->get();
        return $products;
    }
    public function getProduct($slug)
    {
       return Product::where('slug',$slug)->firstOrFail();
    }



}
