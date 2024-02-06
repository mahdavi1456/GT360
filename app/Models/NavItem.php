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
}
