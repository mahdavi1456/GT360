<?php

namespace public_html\class;

class digital_menu
{

    public function list_digital_menu()
    {
        $db = new db();
        $pr = new prime();

        $a_id = $_SESSION['a_id'];
        $p_mobile = $_COOKIE['user_mobile'];
        $sql = "select * from digital_menu_cart where a_id = $a_id and mobile = '$p_mobile'";
        $res = $db->get_select_query($sql);
        if (count($res) > 0) {
            ?>
            <div Class="reserveBoxResult table-responsive">
                <table>
                    <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>نام محصول</th>
                        <th>قیمت</th>
                        <th>تعداد</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $counter = 1;
                    foreach ($res as $item) {
                        $pr_id = $item['pr_id'];
                        $sql_product = "select * from product where pr_id = $pr_id";
                        $res_product = $db->get_select_query($sql_product, 1, $a_id);
                        $pr_name = '';
                        if (count($res_product) > 0) {
                            $pr_name = $res_product[0]['pr_name'];
                        }
                        ?>
                        <tr>
                            <td><?php echo $pr->per_number($counter); ?></td>
                            <td><?php echo $pr->per_number($pr_name); ?></td>
                            <td><?php echo $pr->per_number(number_format($item['pr_price'])); ?></td>
                            <td><?php echo $pr->per_number($item['pr_count']); ?></td>
                        </tr>
                        <?php
                        $counter++;
                    } ?>
                    </tbody>
                </table>
            </div>
            <?php
        } else {
            echo "<div class='alert alert-danger text-center'>موردی یافت نشد.</div>";
        }
    }

    public function getTotalCount($a_id, $mobile)
    {
        $db = new db();
        return "1";

        $count = $db->get_select_query("select SUM(pr_count) from digital_menu_cart where a_id = $a_id and mobile = '$mobile' and cart_status = 0", 1);

        return $count[0][0];
    }

    public function product_list($a_id, $cat_id = 0)
    {
        $db = new db();
        $pr = new prime();
        $opt = new option();
        ?>
        <div class="container p-0">
            <div class="row">
                <?php
                $pr_stock = 0;
                if ($cat_id == 0) {
                    $sql = "select * from product where pr_status > 0 order by pr_status desc";
                } else {
                    $sql = "select * from product where pr_cat = $cat_id and pr_status > 0 order by pr_status desc";
                }
                $products = $db->get_account_select_query($sql, $a_id);
                if (count($products) > 0) {
                    foreach ($products as $product) {
                        $pr_image = $product['pr_image'];
                        if ($pr_image == "") {
                            $pr_image = $opt->get_main_asset_url() . "images/no-image.jpg";
                        } else {
                            $pr_image = $opt->get_main_asset_url() . "images/product/" . $pr_image;
                        }
                        ?>
                        <div class="col-xl-3 col-sm-6 col-6">
                            <div class="product-item">
                                <div class="product-item-image">
                                    <img src="<?php echo $pr_image; ?>" class="img-fluid">
                                </div>
                                <div class="product-item-title">
                                    <h3><?php echo $product['pr_name']; ?></h3>
                                </div>
                                <div class="product-item-price">
                                    <?php echo $pr->per_number(number_format($product['pr_sale'])); ?>
                                    <span>تومان</span>
                                </div>
                                <?php
                                if ($product['pr_status'] != 1) { ?>
                                    <div class="no-st"><span>ناموجود</span></div>
                                    <?php
                                } else { ?>
                                    <button data-id="<?php echo $product['pr_id']; ?>"
                                            data-mobile="<?php echo $_GET['mobile']; ?>" class="product-item-add-cart">+
                                    </button>
                                    <?php
                                } ?>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <div class="alert alert-danger w-100 text-center">در این دسته کالایی موجود نیست.</div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
    }

    public function load_cart($a_id, $mobile)
    {
        $db = new db();
        $pro = new product();
        $opt = new option();
        $pr = new prime();

        $cart = $db->get_select_query("select * from digital_menu_cart where a_id = $a_id and mobile = '$mobile' and cart_status = 0");
        if (count($cart) > 0) {
            ?>
            <ul class="cart-body-list">
                <?php
                $total = 0;
                foreach ($cart as $c) {
                    $pr_id = $c['pr_id'];
                    $pr_res = $pro->get_account_product_fields($a_id, $pr_id);
                    $pr_image = $pr_res[0]['pr_image'];
                    $pr_name = $pr_res[0]['pr_name'];

                    if ($pr_image == "") {
                        $pr_image = $opt->get_main_asset_url() . "images/no-image.jpg";
                    } else {
                        $pr_image = $opt->get_main_asset_url() . "images/product/" . $pr_image;
                    }
                    ?>
                    <li>
                        <div class="cart-body-list-img">
                            <img src="<?php echo $pr_image; ?>" class="img-fluid">
                        </div>
                        <div class="cart-body-list-title">
                            <h3><?php echo $pr_name; ?></h3>
                            <div class="text-right"><?php echo $pr->per_number(number_format($c['pr_price'])); ?> <span>تومان</span>
                            </div>
                        </div>
                        <div class="cart-body-list-form">
                            <button class="cart-remove-btn">
                                <i class="fa fa-minus mines-product" style="font-size: 15px;"
                                   data-id="<?php echo $c['pr_id']; ?>" data-mobile="<?php echo $mobile; ?>"></i>
                            </button>
                            <div class="count mx-1"><input class="form-control"
                                                           value="<?php echo $pr->per_number($c['pr_count']); ?>"
                                                           disabled></div>
                            <button class="cart-remove-btn">
                                <i style="font-size: 15px;" class="fa fa-plus plus-product"
                                   data-id="<?php echo $c['pr_id']; ?>" data-mobile="<?php echo $mobile; ?>"></i>
                            </button>
                            <button class="cart-remove-btn"
                                    style="position: absolute; right: -3px; top: -1px; font-size: 20px;">
                                <i class="fa fa-close remove-item-from-cart" data-id="<?php echo $c['cart_id']; ?>"
                                   data-mobile="<?php echo $mobile; ?>" aria-hidden="true"></i>
                            </button>
                        </div>
                    </li>
                    <?php
                    $total += ($c['pr_price'] * $c['pr_count']);
                } ?>
            </ul>
            <div class="checkout-cart">
                <div class="checkout-cart-price mb-3">
                    <b>جمع کل: </b> <?php echo $pr->per_number(number_format($total)); ?> <span>تومان</span>
                </div>
                <div class="checkout-cart-btn">
                    <a href="#" id="checkout-digital-menu-btn" data-a_id="<?php echo $a_id; ?>"
                       data-mobile="<?php echo $mobile; ?>">ثبت نهایی و پرداخت</a>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="empty-cart">
                <img src="<?php echo $opt->get_main_asset_url(); ?>images/empty-cart.png" class="img-fluid">
                <h6>سبد خرید شما خالی ست...</h6>
            </div>
            <?php
        }
        ?>
        <a href="/m.php?id=<?php echo $a_id; ?>" class="btn btn-danger w-100 mt-2">خروج</a>
        <div id="checkout-cart-result"></div>
        <?php
    }


    public function get_products_on_digitial_menu_cart($a_id, $pr_id, $mobile)
    {
        $db = new db();

        $pdo = $db->get_auth_connection_string();

        $stmt = $pdo->prepare("select cart_id, pr_count from digital_menu_cart where a_id = :a_id and pr_id = :pr_id and mobile = :mobile and cart_status = 0");
        $stmt->execute([
            'a_id' => $a_id,
            'pr_id' => $pr_id,
            'mobile' => $mobile
        ]);
        $data = $stmt->fetchAll();

        return $data;
    }

    public function add_product_to_digital_menu_cart($a_id, $pr_id, $pr_price, $pr_count, $mobile)
    {
        $db = new db();

        $pdo = $db->get_auth_connection_string();

        $stmt = $pdo->prepare("insert into digital_menu_cart(a_id, pr_id, pr_price, pr_count, mobile) values(:a_id, :pr_id, :pr_price, :pr_count, :mobile)");

        $stmt->bindParam('a_id', $a_id, PDO::PARAM_INT);
        $stmt->bindParam('pr_id', $pr_id, PDO::PARAM_INT);
        $stmt->bindParam('pr_price', $pr_price, PDO::PARAM_INT);
        $stmt->bindParam('pr_count', $pr_count, PDO::PARAM_INT);
        $stmt->bindParam('mobile', $mobile, PDO::PARAM_STR);

        $stmt->execute();
    }

    public function update_digital_menu_cart($cart_id, $pr_count)
    {
        $db = new db();

        $pdo = $db->get_auth_connection_string();

        $stmt = $pdo->prepare("update digital_menu_cart set pr_count = :pr_count where cart_id = :cart_id");

        $stmt->bindParam('pr_count', $pr_count, PDO::PARAM_INT);
        $stmt->bindParam('cart_id', $cart_id, PDO::PARAM_INT);

        $stmt->execute();
    }

    public function remove_from_digital_menu_cart($cart_id)
    {
        $db = new db();

        $pdo = $db->get_auth_connection_string();

        $stmt = $pdo->prepare("delete from digital_menu_cart where cart_id = :cart_id");

        $stmt->bindParam('cart_id', $cart_id, PDO::PARAM_INT);

        $stmt->execute();
    }

    public function get_digitial_menu_cart_items($a_id, $mobile)
    {
        $db = new db();

        $pdo = $db->get_auth_connection_string();

        $stmt = $pdo->prepare("select pr_id, pr_price, pr_count from digital_menu_cart where a_id = :a_id and mobile = :mobile");

        $stmt->bindParam('a_id', $a_id, PDO::PARAM_INT);
        $stmt->bindParam('mobile', $mobile, PDO::PARAM_STR);

        $stmt->execute();
        $data = $stmt->fetchAll();

        return $data;
    }

}
