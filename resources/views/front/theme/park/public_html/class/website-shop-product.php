<?php

namespace public_html\class;

class website_shop_product
{

    public function get_product_name($pr_id)
    {
        $db = new db();

        try {
            $conn = $db->get_auth_connection_string();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $data = [
            'pr_id' => $pr_id
        ];
        $sql = "select pr_name from website_shop_product where pr_id = :pr_id";
        $statement = $conn->prepare($sql);
        $statement->execute($data);
        $out = $statement->fetchAll();
        if (count($out) > 0) {
            return $out[0]['pr_name'];
        } else {
            return "نامعتبر";
        }
    }

    public function get_product_content($pr_id)
    {
        $db = new db();
        try {
            $conn = $db->get_auth_connection_string();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $data = [
            'pr_id' => $pr_id
        ];
        $sql = "select pr_content from website_shop_product where pr_id = :pr_id";
        $statement = $conn->prepare($sql);
        $statement->execute($data);
        $out = $statement->fetchAll();
        if (count($out) > 0) {
            return $out[0]['pr_content'];
        } else {
            return "نامعتبر";
        }
    }

    public function get_product_image($pr_id)
    {
        $db = new db();
        try {
            $conn = $db->get_auth_connection_string();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $data = [
            'pr_id' => $pr_id
        ];
        $sql = "select pr_image from website_shop_product where pr_id = :pr_id";
        $statement = $conn->prepare($sql);
        $statement->execute($data);
        $out = $statement->fetchAll();
        if (count($out) > 0) {
            return $out[0]['pr_image'];
        } else {
            return "نامعتبر";
        }
    }

    public function get_product_price($pr_id)
    {
        $db = new db();
        try {
            $conn = $db->get_auth_connection_string();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $data = [
            'pr_id' => $pr_id
        ];
        $sql = "select pr_sale from website_shop_product where pr_id = :pr_id";
        $statement = $conn->prepare($sql);
        $statement->execute($data);
        $out = $statement->fetchAll();
        if (count($out) > 0) {
            return $out[0]['pr_sale'];
        } else {
            return "نامعتبر";
        }
    }

    public function get_products($a_id, $cat_id = null, $title = null)
    {
        $db = new db();
        $sql = "select * from website_shop_product where a_id = $a_id";
        if (!is_null($cat_id)) {
            $sql .= " and pr_cat = $cat_id";
        }
        if (!is_null($title)) {
            $sql .= " and pr_name like'%$title%'";
        }
        $res = $db->get_select_query($sql);
        return $res;
    }

    public function get_a_id()
    {
        $db = new db();
        $slug = explode('?', trim(str_replace('/', ' ', $_SERVER['REQUEST_URI'])))[0];
        $a_id = $db->get_var_query("select a_id from account where a_slug = '$slug'");
        return $a_id;
    }

    public function get_categories($a_id)
    {
        $db = new db();
        $a_id = $this->get_a_id();
        $sql = "select * from website_shop_product_category where a_id = $a_id order by cat_order desc";
        $categories = $db->get_select_query($sql);
        return $categories;
    }

    public function list_product($a_id, $cat_id = null, $title = null)
    {
        $pr = new prime();
        $products = $this->get_products($a_id, $cat_id, $title);
        if (count($products) > 0) {
            foreach ($products as $row) {
                ?>
                <div class="col-xl-3 col-sm-6 col-6">
                    <div class="product-item">
                        <div class="product-item-image">
                            <a href="?page=single-product.php&pr_id=<?php echo $row['pr_id']; ?>">
                                <img class="img-thumbnail"
                                     src="https://heliapp.ir/gt-content/asset/images/product/<?php echo $row['pr_image'] ?>">
                            </a>
                        </div>
                        <div class="product-item-title">
                            <a href="?page=single-product.php&pr_id=<?php echo $row['pr_id']; ?>">
                                <h3><?php echo $row['pr_name']; ?></h3>
                            </a>
                        </div>

                        <div class="">
                            <div class="pull-right product-item-price">
                                <span><?php echo $pr->per_number(number_format($row['pr_sale'])); ?></span>
                                <span>تومان</span>
                            </div>
                            <div class="pull-left">
                                <button class="btn btn-success btn-sm product-item-add-cart"
                                        data-product_id="<?php echo $row['pr_id']; ?>"
                                        data-product_price="<?php echo $row['pr_sale']; ?>"><i class="fa fa-plus"></i>
                                    <span>افزودن به سبد</span></button>
                                <!-- <button class="btn btn-danger btn-sm product-item-remove-cart" data-product_id="<?php //echo $row['pr_id']; ?>"><i class="fa fa-minus"></i></button> -->
                            </div>
                        </div>

                    </div>
                </div>
                <?php
            }
        } else { ?>
            <div class="alert alert-danger w-100 text-center">هیچ محصولی هنوز تعریف نشده است.</div>
            <?php
        }
    }


}
