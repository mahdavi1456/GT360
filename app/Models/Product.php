<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    Public function categories()
    {
        Return $this->belongsToMany(Category::class, "product_category", "product_id", "category_id");
    }

    public function primaryCategory()
    {
        $category = $this->categories()->first();
        return $category->cname ?? '-';
    }

    public function hasCategory($category)
    {
        return $this->categories()->where('id', $category->id)->count() > 0;
    }

    public function media()
    {
        return $this->hasMany(ProductMedia::class);
    }

    public function primaryImage()
    {
        return $this->media()->first()->image ?? '';
    }

    public function getProductPrice()
    {
        dd($this->sales_price - $this->offer_price);
    }

    public function showPrice()
    {
        if (isset($this->offer_price))
            echo fa_number($this->offer_price) . '<br><s>' . fa_number($this->sales_price) . '</s>';
        else
            echo fa_number($this->sales_price);
    }

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }


}
