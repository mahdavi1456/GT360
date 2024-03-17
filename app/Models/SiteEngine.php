<?php

namespace App\Models;

use App\Models\Nav;
use App\Models\Page;
use App\Models\Post;
use App\Models\Product;
use App\Models\Component;
use Illuminate\Database\Eloquent\Model;

class SiteEngine extends Model
{

    //Post Methods
    public function getPosts($componentName = null, $limit = null)
    {
        $component = Component::where('name', $componentName)->first();
        if ($component) {
            $componentId = $component->id;
            $posts = Post::where('project_id', getProjectId())->where('component_id', $componentId)->where('publish_status', 'publish')->take($limit)->get();
            return $posts;
        } else {
            $posts = Post::where('project_id', getProjectId())->where('publish_status', 'publish')->latest()->take($limit)->get();
            return $posts;
        }
    }

    public function getPost($slug)
    {
        $post = Post::where('slug', $slug)->where('publish_status', 'publish')->firstOrFail();
        return $post;
    }


    // Page Methods
    public function getPages($limit = null)
    {
        $pages = Page::where('project_id', getProjectId())->where('publish_status', 'publish')->latest()->take($limit)->get();
        return $pages;
    }

    public function getPage($slug)
    {
        $page = Page::where('slug', $slug)->where('publish_status', 'publish')->firstOrFail();
        if ($page) {
            return $page;
        } else {
            //return to 404 page
        }
    }

    // Setting Methods
    public function getSetting($key)
    {
        $s = Setting::where([
            'key' => $key,
            // 'account_id' => $accountId,
            'project_id' => getProjectId()
        ])->first();
        if ($s) {
            return $s->value;
        } else {
            return null;
        }
    }

    // Product Methods
    public function getProducts($limit = null)
    {
        $products = Product::where('project_id', getProjectId())->latest()->take($limit)->get();
        return $products;
    }

    public function getCategories($limit = null)
    {
        return Category::where('project_id',getProjectId())->latest()->take($limit)->get();
    }


    public function getProduct($slug)
    {
        return Product::where('slug', $slug)->firstOrFail();
    }

    // Nav Methods
    public function getNavItems($name, $parentId = 0)
    {
        $nav = Nav::where('name', $name)->where('status', 'فعال')->first();

        if ($nav) {
            $items = NavItem::where('nav_id', $nav->id)->where('parent_id', $parentId)->where('project_id', getProjectId())->orderBy('order_num', 'asc')->get();
            return $items;
        } else {
            return null;
        }
    }
}
