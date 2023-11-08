<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cart()
    {
        return $this->belongsTo(CartHead::class, 'cart_id');
    }

    public function price()
    {
        $price = $this->cart->final_price;
        $price += ($this->transport_price ?? 0);
        if ($this->addons->count() > 0) {
            foreach ($this->addons as $addon) {
                $price += ($addon->pivot->addon_off_price ?? $addon->pivot->addon_real_price);
            }
        }
        return $price;
    }

    public function addons()
    {
        return $this->belongsToMany(Addon::class, 'checkout_addons', 'checkout_id', 'addon_id')->withPivot('addon_title', 'addon_details', 'addon_off_price', 'addon_real_price');
    }

    public function loadFactor()
    {
        ?>
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered" id="cart-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام محصول</th>
                                <th>قیمت واحد</th>
                                <th>تعداد</th>
                                <th>قیمت کل</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($this->cart->bodies as $key => $body) {
                            ?>
                                <tr id="tr-<?php echo $body->id ?>">
                                    <td><?php echo fa_number($key + 1) ?></td>
                                    <td>
                                        <a href="<?php echo route('front.products.single', $body->product_id) ?>" target="_blank"><?php echo $body->product_name ?></a>
                                    </td>
                                    <td><?php echo fa_number($body->showPrice()) ?></td>
                                    <td>
                                        <?php echo fa_number($body->product_count) ?>
                                    </td>
                                    <td id="bodyPrice-<?php echo $body->id ?>"><?php echo fa_number($body->total()) ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <td colspan="4">جمع کل</td>
                                <td id="totalPrice"><?php echo fa_number(number_format($this->cart->total_price)) ?></td>
                            </tr>
                            <tr>
                                <td colspan="4">تخفیف</td>
                                <td id="discountPrice"><?php echo fa_number(number_format($this->cart->discount_price ?? 0)) ?></td>
                            </tr>
                            <tr>
                                <td colspan="4">هزینه ارسال</td>
                                <td><?php echo fa_number(number_format($this->transport_price ?? 0)) ?></td>
                            </tr>
                            <?php
                            if ($this->addons->count() > 0) {
                                foreach ($this->addons as $addon) {
                                    ?>
                `                   <tr>
                                        <td colspan="4"><?php  echo $addon->pivot->addon_title ?></td>
                                        <td><?php echo !is_null($addon->pivot->addon_off_price) ? fa_number(number_format($addon->pivot->addon_off_price)) : fa_number(number_format($addon->pivot->addon_real_price)) ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            <tr>
                                <td colspan="4"><b> مبلغ نهایی </b></td>
                                <td id="finalPrice"><b><?php echo fa_number(number_format($this->price)) ?></b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php
    }
}
