<?php

namespace App\Servieses;

use App\Models\Page;
use App\Models\Post;
use App\Models\Component;

class siteEngine
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

    public function getPageData($pageId)
    {
        $data = Page::find($pageId);
        return $data;
    }

    //end page section
    //-----------------------------------------------------------

    
}
