<?php

namespace public_html\class;

class website_shop_cart
{

    public function get_count_items($a_id)
    {
        $db = new db();

        //$a_id = $_SESSION['a_id'];
        $mobile = $_COOKIE['user_mobile'];
        $sql_exist_cart_header = "select * from website_shop_cart_header where a_id = $a_id and mobile = '$mobile' and cart_status = 0";
        $res_cart_header = $db->get_select_query($sql_exist_cart_header);
        if (count($res_cart_header) == 0) {
            return 0;
        }
        $cart_id = $res_cart_header[0]['id'];
        $sql_count_items = "select sum(count) as count_items from website_shop_cart_body where cart_id = $cart_id";
        $res_count_items = $db->get_select_query($sql_count_items);
        if (count($res_count_items) == 0) {
            return 0;
        }
        $count_items = $res_count_items[0]['count_items'];
        if (is_null($count_items)) {
            return 0;
        }
        return $count_items;
    }

    public function load_cart($a_id)
    {
        $pr = new prime();
        $wp = new website_shop_product();

        $items = $this->get_cart_items($a_id);
        $count_items = $this->get_count_items($a_id);
        ?>
        <table class="table">
            <thead>
            <tr>
                <th>نام محصول</th>
                <th>قیمت</th>
                <th>تعداد</th>
                <th>جمع جزء</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $total_price = 0;
            if (is_array($items) && count($items) > 0) {
                foreach ($items as $item) {
                    $pr_name = $wp->get_product_name($item['product_id']);
                    $pr_price = $item['price'];
                    $pr_price_retail = $item['price'] * $item['count'];
                    $total_price += $pr_price_retail;
                    ?>
                    <tr>
                        <td><?php echo $pr->per_number($pr_name); ?></td>
                        <td><?php echo $pr->per_number(number_format($pr_price)); ?></td>
                        <td>
                            <input class="form-control product-item-count-cart col-12 col-md-6" type="number" min="1"
                                   value="<?php echo $item['count']; ?>"
                                   data-product_id="<?php echo $item['product_id']; ?>"
                                   data-oldvalue="<?php echo $item['count']; ?>">
                        </td>
                        <td><?php echo $pr->per_number(number_format($pr_price_retail)); ?></td>
                        <td>
                            <button class="btn btn-danger btn-sm product-item-remove-cart"
                                    data-product_id="<?php echo $item['product_id']; ?>"><i class="fa fa-remove"></i>
                            </button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <td>جمع</td>
                    <td></td>
                    <td>
                        <b>
                            <span>جمع اقلام: </span>
                            <span><?php echo $pr->per_number(number_format($count_items)); ?></span>
                        </b>
                    </td>
                    <td>
                        <b>
                            <span>جمع خرید: </span>
                            <span><?php echo $pr->per_number(number_format($total_price)); ?></span>
                        </b>
                    </td>
                    <td></td>
                </tr>
                <?php
            } else { ?>
                <tr>
                    <td colspan="5">
                        <div class="alert alert-danger text-center">سبد خرید خالی است.</div>
                    </td>
                </tr>
                <?php
            } ?>
            </tbody>
        </table>
        <?php
    }

    public function get_cart_items($a_id)
    {
        $db = new db();

        //$a_id = $_SESSION['a_id'];
        $mobile = $_COOKIE['user_mobile'];
        $sql_exist_cart_header = "select * from website_shop_cart_header where a_id = $a_id and mobile = '$mobile' and cart_status = 0";
        $res_cart_header = $db->get_select_query($sql_exist_cart_header);
        if (count($res_cart_header) == 0) {
            return 0;
        }
        $cart_id = $res_cart_header[0]['id'];
        $sql_cart_body = "select * from website_shop_cart_body where cart_id = $cart_id";
        $res_cart_body = $db->get_select_query($sql_cart_body);
        if (count($res_cart_body) == 0) {
            return 0;
        }
        return $res_cart_body;
    }

    public function load_cart2()
    {
        $mobile = $_COOKIE['user_mobile'];
        $a_id = $_SESSION['a_id'];
        var_dump($mobile);
        var_dump($a_id);
    }

    public function check_enough_stock($product_id, $count, $mobile, $a_id)
    {
        $db = new db();
        $sql_check_stock = "select * from website_shop_product where pr_id=$product_id";
        $res_check_stock = $db->get_select_query($sql_check_stock);
        $stock = $res_check_stock[0]['pr_stock'];
        if (!$stock or $stock == 0) {
            return false;
        }

        if ($count == 0) {
            $sql_exist_cart_header = "select * from website_shop_cart_header where a_id = $a_id and mobile = '$mobile' and cart_status = 0";
            $res_cart_header = $db->get_select_query($sql_exist_cart_header);
            if (count($res_cart_header) == 0) {
                return false;
            }
            $cart_id = $res_cart_header[0]['id'];
            $sql_check_enough_stock = "select * from website_shop_cart_body where cart_id = $cart_id and product_id = $product_id";
            $res_check_enough_stock = $db->get_select_query($sql_check_enough_stock);
            $count_product = $res_check_enough_stock[0]['count'];
            $count_product = $count_product + 1;
            if ($count_product > $stock) {
                return false;
            }
        }

        if ($count > $stock) {
            return false;
        }
        return true;
    }

}
