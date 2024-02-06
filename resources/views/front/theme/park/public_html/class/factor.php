<?php

namespace public_html\class;

class factor
{

    public function new_factor_head($a_id, $p_mobile)
    {
        $db = new db();

        $fh_date = date('Y-m-d H:i:s');
        $fh_status = "پرداخت نشده";
        $p_id = "";
        $p_fullname = "";

        $pdo = $db->get_account_connection_string($a_id);

        $p = $pdo->prepare("select * from person where p_mobile = :p_mobile");
        $p->bindParam('p_mobile', $p_mobile, PDO::PARAM_STR);
        $p->execute();
        $person = $p->fetchAll();

        if (count($person) > 0) {
            $p_fullname = $person[0]["p_name"] . " " . $person[0]["p_family"];
            $p_id = $person[0]["p_id"];
        }

        $stmt = $pdo->prepare("insert into factor_head(p_mobile, fh_date, fh_regdate, fh_status, p_fullname, p_id) values(:p_mobile, :fh_date, :fh_regdate, :fh_status, :p_fullname, :p_id)");

        $stmt->bindParam('p_mobile', $p_mobile, PDO::PARAM_STR);
        $stmt->bindParam('p_id', $p_id, PDO::PARAM_INT);
        $stmt->bindParam('p_fullname', $p_fullname, PDO::PARAM_STR);
        $stmt->bindParam('fh_date', $fh_date, PDO::PARAM_STR);
        $stmt->bindParam('fh_regdate', $fh_date, PDO::PARAM_STR);
        $stmt->bindParam('fh_status', $fh_status, PDO::PARAM_STR);

        $stmt->execute();
        $fh_id = $pdo->lastInsertId();

        return $fh_id;
    }

    public function new_factor_body($a_id, $fh_id, $pr_id, $pr_name, $pr_count, $pr_price)
    {
        $db = new db();

        $pdo = $db->get_account_connection_string($a_id);
        $stmt = $pdo->prepare("insert into factor_body(fh_id, pr_id, pr_name , f_count, pr_price) values(:fh_id, :pr_id, :pr_name, :pr_count, :pr_price)");

        $stmt->bindParam('fh_id', $fh_id, PDO::PARAM_INT);
        $stmt->bindParam('pr_id', $pr_id, PDO::PARAM_INT);
        $stmt->bindParam('pr_name', $pr_name, PDO::PARAM_STR);
        $stmt->bindParam('pr_count', $pr_count, PDO::PARAM_INT);
        $stmt->bindParam('pr_price', $pr_price, PDO::PARAM_INT);

        $stmt->execute();
    }

    public function update_factor_status($a_id, $fh_id, $fh_status)
    {
        $db = new db();

        $pdo = $db->get_account_connection_string($a_id);
        $stmt = $pdo->prepare("update factor_head set fh_status = :fh_status where fh_id = :fh_id");

        $stmt->bindParam('fh_status', $fh_status, PDO::PARAM_STR);
        $stmt->bindParam('fh_id', $fh_id, PDO::PARAM_INT);

        $stmt->execute();
    }

    public function get_factor_total_price($a_id, $fh_id)
    {
        $db = new db();

        $pdo = $db->get_account_connection_string($a_id);
        $stmt = $pdo->prepare("select f_count,pr_price from factor_body where fh_id = :fh_id");

        $stmt->bindParam('fh_id', $fh_id, PDO::PARAM_INT);

        $stmt->execute();
        $bodies = $stmt->fetchAll();
        $total = 0;
        foreach ($bodies as $body) {
            $price = $body["pr_price"] * $body["f_count"];
            $total += $price;
        }

        return $total;
    }

    public function list_products_sms($a_id, $fh_id)
    {
        $db = new db();
        $pro = new product();

        $factor_body = $db->get_select_query("select * from factor_body where fh_id = $fh_id", 1, $a_id);
        $list = "";
        if (count($factor_body) > 0) {
            foreach ($factor_body as $f) {
                $pr_count = $f['f_count'];
                $pr_id = $f['pr_id'];
                $pr_res = $pro->get_account_product_fields($a_id, $pr_id);
                $pr_name = $pr_res[0]['pr_name'];
                $list .= $pr_name . " - " . $pr_count . " عدد" . "\n";
            }
        }
        return $list;
    }


}
