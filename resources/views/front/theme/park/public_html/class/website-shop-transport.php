<?php

namespace public_html\class;

class website_shop_transport
{

    public function load_transports_as_select($name, $id, $default, $a_id)
    {
        $db = new db();
        $sql_transport = "select * from website_shop_transport where a_id = $a_id order by show_order asc";
        $res_transport = $db->get_select_query($sql_transport);
        if (count($res_transport) > 0) {
            ?>
            <select name="<?php echo $name; ?>" id="<?php echo $id; ?>" class="form-control" required>
                <option></option>
                <?php
                foreach ($res_transport as $row) {
                    ?>
                    <option <?php echo($row['title'] == $default ? "selected" : ""); ?>
                            value="<?php echo $row['title'] . "|" . $row['price']; ?>"><?php echo $row['title'] . " - " . $row['description'] . " - " . number_format($row['price']); ?></option>
                    <?php
                }
                ?>
            </select>
            <?php
        } else {
            ?>
            <div class="alert alert-danger">هنوز هیچ روشی برای ارسال تعریف نشده است.</div>
            <?php
        }
    }

}
