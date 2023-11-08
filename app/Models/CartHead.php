<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartHead extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bodies()
    {
        return $this->hasMany(CartBody::class, 'cart_id');
    }

    public function totalPrice()
    {
        $total = 0;
        foreach ($this->bodies as $body) {
            if (!is_null($body->product_offer))
                $total += ($body->product_offer * $body->product_count);
            else
                $total += ($body->product_price * $body->product_count);
        }
        return $total;
    }

    public function finalPrice()
    {
        return $this->total_price - ($this->discount_price ?? 0);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function checkout()
    {
        return $this->hasOne(Checkout::class, 'cart_id');
    }

    public function showCart()
    {
        $cart = optional($this)->loadCart();
        return $cart;
    }

    public function loadCart()
    {
        if (!is_null($this) && $this->bodies->count()) {
            ?>
            <div class="row">
                <div class="col-12">
                    <table class="table" id="cart-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام محصول</th>
                                <th>قیمت واحد</th>
                                <th>تعداد</th>
                                <th>قیمت کل</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($this->bodies as $key => $body) {
                            ?>
                                <tr id="tr-<?php echo $body->id ?>">
                                    <td><?php echo fa_number($key + 1) ?></td>
                                    <td>
                                        <a href="<?php echo route('front.products.single', $body->product_id) ?>" target="_blank"><?php echo $body->product_name ?></a>
                                    </td>
                                    <td><?php echo fa_number($body->showPrice()) ?></td>
                                    <td>
                                        <input type="text" name="amount" class="touchspin text-center" value="<?php echo $body->product_count ?>" onchange="amount(<?php echo $body->id ?>, this.value)">
                                    </td>
                                    <td id="bodyPrice-<?php echo $body->id ?>"><?php echo fa_number($body->total()) ?></td>
                                    <td>
                                        <a href="#" class="text-danger" onclick="removeFromCart(<?php echo $body->id ?>)"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <td colspan="4">جمع کل</td>
                                <td id="totalPrice"><?php echo fa_number($this->totalPrice()) ?></td>
                            </tr>
                            <tr>
                                <td colspan="4">تخفیف</td>
                                <td id="discountPrice"><?php echo fa_number($this->discount_price ?? 0) ?></td>
                            </tr>
                            <tr>
                                <td colspan="4">مبلغ نهایی</td>
                                <td id="finalPrice"><?php echo fa_number($this->final_price) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>کد تخفیف</label>
                        <input type="text" name="discount" class="form-control" value="<?php echo $this->discount_title ?>" placeholder="کد تخفیف...">
                    </div>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary" onclick="discount(<?php echo $this->id ?>, true)">اعمال کد تخفیف</button>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-danger" onclick="removeDiscount(<?php echo $this->id ?>)">حذف کد تخفیف</button>
                </div>
                <div class="col-md-3">
                    <a href="<?php echo route('customer.login') ?>" class="btn btn-success">تسویه حساب</a>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="alert alert-primary text-center">
                <div class="mb-3">
                    سبد خرید شما خالی است.
                </div>
                <a href="/" class="btn btn-success">بازگشت به فروشگاه</a>
            </div>
        <?php
        }
    }
}
