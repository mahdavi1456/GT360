<?php

namespace public_html\class;

class website_shop_checkout
{

    public $table = "website_shop_checkout";

    public function load_checkout_form()
    {
        $db = new db();
        $wst = new website_shop_transport();

        $a_id = $_SESSION['a_id'];
        $p_mobile = $_COOKIE['user_mobile'];

        $checkout_form = $db->get_select_query("select * from website_shop_checkout where mobile = '$p_mobile'");
        if (count($checkout_form) > 0) {
            $checkout_id = $checkout_form[0]['id'];
            $mobile = $checkout_form[0]['mobile'];
            $firstname = $checkout_form[0]['firstname'];
            $lastname = $checkout_form[0]['lastname'];
            $city = $checkout_form[0]['city'];
            $province = $checkout_form[0]['province'];
            $transport_type = $checkout_form[0]['transport_type'];
            $transport_price = $checkout_form[0]['transport_price'];
            $code_posti = $checkout_form[0]['code_posti'];
            $address = $checkout_form[0]['address'];
        } else {
            $checkout_id = 0;
            $mobile = "";
            $firstname = "";
            $lastname = "";
            $city = "";
            $province = "";
            $transport_type = "";
            $transport_price = "";
            $code_posti = "";
            $address = "";

            $sql_person = "select * from person where p_mobile = '$p_mobile'";
            $res_person = $db->get_select_query($sql_person, 1, $a_id);
            if (count($res_person) > 0) {
                $firstname = $res_person[0]['p_name'];
                $lastname = $res_person[0]['p_family'];
            }
        }
        ?>
        <form class="form-checkout">
            <input type="hidden" name="a_id" value="<?php echo $a_id; ?>">
            <input type="hidden" name="checkout_id" id="checkout-id" value="<?php echo $checkout_id; ?>">
            <div class="row">
                <div class="col-md-4 mt-3">
                    <label class="required">نام</label>
                    <input type="text" name="firstname" id="firstname" class="form-control"
                           value="<?php echo $firstname; ?>" required>
                </div>
                <div class="col-md-4 mt-3">
                    <label class="required">نام خانوادگی</label>
                    <input type="text" name="lastname" id="lastname" class="form-control"
                           value="<?php echo $lastname; ?>" required>
                </div>
                <div class="col-md-4 mt-3">
                    <label class="required">موبایل</label>
                    <input type="text" name="mobile" id="mobile" class="form-control" value="<?php echo $p_mobile; ?>"
                           required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-3">
                    <label class="required">استان</label>
                    <input type="text" name="city" id="city" class="form-control" value="<?php echo $city; ?>" required>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="required">شهر</label>
                    <input type="text" name="province" id="province" class="form-control"
                           value="<?php echo $province; ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-3">
                    <label class="required">کد پستی</label>
                    <input type="number" name="code_posti" id="code_posti" class="form-control"
                           value="<?php echo $code_posti; ?>" required>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="required">آدرس</label>
                    <input type="text" name="address" id="address" class="form-control" value="<?php echo $address; ?>"
                           required>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-3">
                    <label class="required">شیوه ارسال</label>
                    <?php $wst->load_transports_as_select("checkout_transport_type", "checkout-transport-type", $transport_type, $a_id); ?>
                    <input type="hidden" name="transport_type" id="transport-type"
                           value="<?php echo $transport_type; ?>">
                    <input type="hidden" name="transport_price" id="transport-price"
                           value="<?php echo $transport_price; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-3" id="website-prepayment-result">
                    <?php $this->show_prefactor($checkout_id); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <?php
                    $is_config_zarinpal = $this->is_configed_zarinpal();
                    if ($is_config_zarinpal) {
                        ?>
                        <button type="button" class="btn btn-success btn-lg mt-3" id="save-checkout-form">اتصال به درگاه
                            و پرداخت
                        </button>
                    <?php } else { ?>
                        <div class="alert alert-danger">پیکربندی درگاه پرداخت انجام نشده است. جهت پرداخت فاکتور خود با
                            مدیر سیستم تماس بگیرید.
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12" id="website-payment-result"></div>
            </div>
        </form>
        <?php
    }

    public function save_checkout($list)
    {
        $db = new db();

        parse_str($list, $new);
        $cart_id = $new['cart_id'];
        $checkout_id = $new['checkout_id'];
        $mobile = $new['mobile'];
        $firstname = $new['firstname'];
        $lastname = $new['lastname'];
        $city = $new['city'];
        $province = $new['province'];
        $code_posti = $new['code_posti'];
        $address = $new['address'];
        $transport_type = $new['transport_type'];
        $transport_price = $new['transport_price'];

        $create_date = date('Y-m-d');
        $create_time = date('H:i:s');

        if ($checkout_id == 0) {
            $sql = "insert into website_shop_checkout(cart_id, mobile, firstname, lastname, city, province, code_posti, address, transport_type, transport_price, create_date, create_time) ";
            $sql .= "values($cart_id, '$mobile', '$firstname', '$lastname', '$city', '$province', '$code_posti', '$address', '$transport_type', $transport_price, '$create_date', '$create_time')";
        } else {
            $sql = "update website_shop_checkout set mobile = '$mobile', firstname = '$firstname', lastname = '$lastname', city = '$city', province = '$province', code_posti = '$code_posti', address = '$address', transport_type = '$transport_type', transport_price = $transport_price, create_date = '$create_date', create_time = '$create_time' where id = $checkout_id";
        }
        $db->ex_query($sql);
    }

    public function show_prefactor($checkout_id)
    {
        $db = new db();
        $pr = new prime();
        $wst = new website_shop_transport();
        $wsp = new website_shop_product();

        $checkout_arr = $db->get_select_query("select * from website_shop_checkout where id = $checkout_id");
        $transport_type = $checkout_arr[0]['transport_type'];
        $transport_price = $checkout_arr[0]['transport_price'];

        $a_id = $_SESSION['a_id'];
        $mobile = $_COOKIE['user_mobile'];
        $sql_head = "select id from website_shop_cart_header where mobile = '$mobile' and cart_status = 0 order by id desc limit 1";
        $res_head = $db->get_var_query($sql_head);

        if ($res_head > 0) {
            $sql_body = "select * from website_shop_cart_body where cart_id = $res_head";
            $res_body = $db->get_select_query($sql_body);
            if (count($res_body) > 0) {
                $i = 1;
                ?>
                <h3>پیش فاکتور</h3>
                <input type="hidden" name="cart_id" id="cart-id" value="<?php echo $res_head; ?>">
                <table class="table table-bordered text-center">
                    <tr class="table-primary">
                        <th>ردیف</th>
                        <th>عنوان کالا</th>
                        <th>تعداد</th>
                        <th>مبلغ</th>
                        <th>تخفیف</th>
                    </tr>
                    <?php
                    $total_count = 0;
                    $total = 0;
                    $total_offer = 0;
                    foreach ($res_body as $row_body) {
                        ?>
                        <tr>
                            <td><?php echo $pr->per_number($i); ?></td>
                            <td><?php echo $pr->per_number($wsp->get_product_name($row_body['product_id'])); ?></td>
                            <td><?php echo $pr->per_number($row_body['count']); ?></td>
                            <td><?php echo $pr->per_number(number_format($row_body['price'])); ?></td>
                            <td><?php echo $pr->per_number(number_format($row_body['offer'])); ?></td>

                        </tr>
                        <?php
                        $i++;
                        $total_price += ($row_body['price'] * $row_body['count']);
                        $total_offer += ($row_body['offer'] * $row_body['count']);
                        $total_count += $row_body['count'];
                    }
                    ?>
                    <tr class="table-warning">
                        <th colspan="2" class="text-center">جمع</th>
                        <th><?php echo $pr->per_number(number_format($total_count)); ?></th>
                        <th><?php echo $pr->per_number(number_format($total_price)); ?></th>
                        <th><?php echo $pr->per_number(number_format($total_offer)); ?></th>
                    </tr>
                    <tr class="table-warning">
                        <th colspan="2" class="text-center">هزینه و روش ارسال</th>
                        <th><?php echo $transport_type; ?></th>
                        <th><?php echo $pr->per_number(number_format($transport_price)) ?></th>
                        <th></th>
                    </tr>
                    <tr class="table-success">
                        <th colspan="3" class="text-center">جمع کل</th>
                        <th><?php echo $pr->per_number(number_format($total_price + $transport_price)) ?></th>
                        <th></th>
                    </tr>
                </table>
                <input type="hidden" name="price" id="price" value="<?php echo $total_price + $transport_price; ?>">
                <?php
            }
        }
    }

    public function is_configed_zarinpal()
    {
        $db = new db();
        $a_id = $_SESSION['a_id'];
        $sql = "select * from account where a_id=$a_id";
        $res = $db->get_select_query($sql);
        if (count($res) > 0) {
            $a_zarinpal = $res[0]['a_zarinpal'];
            if (!$a_zarinpal) {
                return false;
            }
            return true;
        }
        return false;
    }

    public function load_orders($from_date = "", $to_date = "", $order_status = "")
    {
        $db = new db();
        $pr = new prime();
        $a_id = $_SESSION['a_id'];
        if ($from_date != "" && $to_date != "" && $order_status != "") {
            $sql = "select wsc.id, firstname, lastname, wsc.mobile, order_status, cart_id from website_shop_checkout wsc inner join website_shop_cart_header wsch on wsc.cart_id = wsch.id where wsch.a_id = $a_id and wsc.create_date >= '$from_date' and create_date <= '$to_date' and order_status = '$order_status'";

        } else {
            $sql = "select wsc.id, firstname, lastname, wsc.mobile, order_status, cart_id from website_shop_checkout wsc inner join website_shop_cart_header wsch on wsc.cart_id = wsch.id where wsch.a_id = $a_id";
        }
        $res = $db->get_select_query($sql);
        if (count($res) > 0) {
            ?>
            <div id="labelModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div id="load-website-shop-checkout-order-label-result"></div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button class="btn btn-info btn-lg">چاپ</button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ordersModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div id="load-website-shop-checkout-orders-result"></div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button class="btn btn-info btn-lg">چاپ</button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>ردیف</th>
                    <th>شماره سفارش</th>
                    <th>مشتری</th>
                    <th>موبایل</th>
                    <th>وضعیت</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                foreach ($res as $row) {
                    ?>
                    <tr>
                        <td><?php echo $pr->per_number($i); ?></td>
                        <td><?php echo $pr->per_number($row['id']); ?></td>
                        <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                        <td><?php echo $pr->per_number($row['mobile']); ?></td>
                        <td>
                            <?php
                            if ($row['order_status'] == "waiting") {
                                $status = "در انتظار بررسی";
                            } else if ($row['order_status'] == "in-progress") {
                                $status = "در حال رسیدگی";
                            } else if ($row['order_status'] == "packing") {
                                $status = "بسته بندی";
                            } else if ($row['order_status'] == "sent") {
                                $status = "ارسال شده";
                            } else if ($row['order_status'] == "delivered") {
                                $status = "تحویل شده";
                            } else {
                                $status = "نامعلوم";
                            }
                            echo $status;
                            ?>
                        </td>
                        <td>
                            <!-- <button type="button" class="btn btn-info btn-sm load-website-shop-checkout-order-label" data-toggle="modal" data-target="#labelModal" data-id="<?php echo $row['id']; ?>">چاپ برچسب</button>
								<button type="button" class="btn btn-warning btn-sm load-website-shop-checkout-orders" data-toggle="modal" data-target="#ordersModal" data-cart_id="<?php echo $row['cart_id']; ?>">چاپ صورتحساب</button>
								<button class="btn btn-success btn-sm">تاریخچه</button>	 -->
                        </td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
                </tbody>
            </table>
            <?php
        } else {
            ?>
            <div class="alert alert-danger text-center m-2">موردی جهت نمایش موجود نیست.</div>
            <?php
        }
    }

}
