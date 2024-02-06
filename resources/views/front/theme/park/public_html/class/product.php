<?php

namespace public_html\class;

class product
{

    public function get_account_product_price($a_id, $pr_id)
    {
        $db = new db();

        $pdo = $db->get_account_connection_string($a_id);

        $stmt = $pdo->prepare("select pr_sale from product where pr_id = :pr_id");
        $stmt->execute(['pr_id' => $pr_id]);
        $data = $stmt->fetchAll();

        return $data[0]['pr_sale'];
    }

    public function get_account_product_name($a_id, $pr_id)
    {
        $db = new db();

        $pdo = $db->get_account_connection_string($a_id);

        $stmt = $pdo->prepare("select pr_name from product where pr_id = :pr_id");
        $stmt->execute(['pr_id' => $pr_id]);
        $data = $stmt->fetchAll();

        return $data[0]['pr_name'];
    }

    public function get_account_product_fields($a_id, $pr_id)
    {
        $db = new db();

        $pdo = $db->get_account_connection_string($a_id);

        $stmt = $pdo->prepare("select * from product where pr_id = :pr_id");
        $stmt->execute(['pr_id' => $pr_id]);
        $data = $stmt->fetchAll();

        return $data;
    }

}
