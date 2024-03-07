<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavItem extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function getLastOrder($nav)
    {
        $item = NavItem::where(['nav_id' => $nav, 'account_id' => auth()->user()->account->id])->orderBy('order_num', 'desc')->first();
        if ($item) {
            return $item->order_num;
        }
        return 0;
    }
    public function getTypeValueAttribute()
    {
        switch ($this->item_type) {
            case 'link':
                return 'پیوند دلخواه';
                break;
            case 'page':
                return 'برگه';
                break;
            default:
                return $this->type_value;
                break;
        }
    }
    public function children(){
        return $this->hasMany(NavItem::class,'parent_id')->orderBy('order_num');
    }
    public function object(){
        return $this->belongsTo(Page::class,'object_id');
    }

    public function getLink()
    {

        if ($this->item_type == "page") {
            $page=Page::findOrFail($this->object_id);
            $link = $page->show_url();
        } else if($this->item_type == "post") {

            //$link = $postModel->getPostPermalink($slug, $navItem->link, $navItem->object_id);
        } else if($this->item_type == "link") {
            $link = $this->link;
        }
        return $link;
    }

}
