<?php

namespace public_html\class;

class website_shop_setting
{

    public $tb_transport = 'public_html\class\website_shop_transport';

    public function form_transport($transport_id = null)
    {
        $db = new db();
        $sql = "select * from $this->tb_transport where id = $transport_id";
        $res_transport = $db->get_select_query($sql);
        ?>
        <h4><?php echo is_array($res_transport) && count($res_transport) > 0 ? 'ایجاد روش حمل و نقل' : 'ویرایش حمل و نقل'; ?></h4>
        <form class="form-transport">
            <div class="row">
                <div class="col-md-6 mt-3">
                    <label class="required">عنوان</label>
                    <input type="text" name="title" id="title" class="form-control"
                           value="<?php echo is_array($res_transport) && count($res_transport) > 0 ? $res_transport[0]['title'] : ''; ?>"
                           required>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="required">هزینه</label>
                    <input type="text" name="price" id="price" class="form-control"
                           value="<?php echo is_array($res_transport) && count($res_transport) > 0 ? $res_transport[0]['price'] : ''; ?>"
                           required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-3">
                    <label>توضیحات</label>
                    <textarea name="desc" id="desc"
                              class="form-control"><?php echo is_array($res_transport) && count($res_transport) > 0 ? $res_transport[0]['title'] : ''; ?></textarea>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="required">بارگذاری آیکون</label>
                    <input type="text" name="icon" id="icon" class="form-control"
                           value="<?php echo is_array($res_transport) && count($res_transport) > 0 ? $res_transport[0]['icon'] : ''; ?>"
                           required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if (is_array($res_transport) && count($res_transport) > 0) { ?>
                        <button type="button" class="btn btn-warning mt-3" id="edit-transport-form">ویرایش</button>
                        <?php
                    } else { ?>
                        <button type="button" class="btn btn-info mt-3" id="save-transport-form">ایجاد</button>
                        <?php
                    } ?>
                </div>
            </div>
        </form>
        <?php
    }

    public function load_transport($a_id)
    {
        $pr = new prime();
        $items = $this->get_transports($a_id);
        ?>
        <table class="table">
            <thead>
            <tr>
                <th>ردیف</th>
                <th>عنوان</th>
                <th>قیمت</th>
                <th>توضیحات</th>
                <th>آیکن</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $counter = 1;
            if (is_array($items) && count($items) > 0) {
                foreach ($items as $item) {
                    ?>
                    <tr>
                        <td><?php echo $pr->per_number($counter); ?></td>
                        <td><?php echo $pr->per_number($item['title']); ?></td>
                        <td><?php echo $pr->per_number(number_format($item['price'])); ?></td>
                        <td><?php echo $pr->per_number($item['description']); ?></td>
                        <td><?php echo $pr->per_number($item['icon']); ?></td>
                        <td>
                            <button class="btn btn-danger btn-sm transport-item-remove"
                                    data-transport_id="<?php echo $item['id']; ?>"><i class="fa fa-remove"></i></button>
                            <button class="btn btn-warning btn-sm transport-item-edit"
                                    data-transport_id="<?php echo $item['id']; ?>"><i class="fa fa-edit"></i></button>
                            <i class="fa fa-spin fa-spinner heli_loading" style="display:none;"></i>
                        </td>
                    </tr>
                    <?php
                    $counter++;
                }
            } else { ?>
                <tr>
                    <td colspan="6">
                        <div class="alert alert-danger text-center">موردی یافت نشد.</div>
                    </td>
                </tr>
                <?php
            } ?>
            </tbody>
        </table>
        <?php
    }

    public function get_transports($a_id)
    {
        $db = new db();
        $sql_transport = "select * from $this->tb_transport where a_id = $a_id";
        $res_transport = $db->get_select_query($sql_transport);
        if (count($res_transport) == 0) {
            return 0;
        }
        return $res_transport;
    }

    public function save_transport($list, $a_id)
    {
        $db = new db();
        parse_str($list, $new);
        $title = $new['title'];
        $price = $new['price'];
        $description = $new['desc'];
        $icon = $new['icon'];
        $sql = "insert into $this->tb_transport(title,price,description,icon,a_id) values('$title' , '$price' , '$description' , '$icon' , $a_id)";
        $db->ex_query($sql);
    }

    public function remove_transport($transport_id)
    {
        $db = new db();
        $transport_id = $_POST['transport_id'];
        $sql = "delete from $this->tb_transport where id = $transport_id";
        $db->ex_query($sql);
    }

    public function load_transports_as_select($a_id)
    {
        $db = new db();
        $sql_transport = "select * from $this->tb_transport where a_id = $a_id";
        $res_transport = $db->get_select_query($sql_transport);
        if (count($res_transport) > 0) {
            ?>
            <select class="form-control">
                <?php
                foreach ($res_transport as $row) {
                    ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
                    <?php
                }
                ?>
            </select>
            <?php
        }
    }

}
