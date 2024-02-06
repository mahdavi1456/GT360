<?php

namespace public_html\class;

class website_reserve
{

    public function reserve_list($m = null, $d = null, $a_id)
    { ?>
        <div Class="reserveBoxResult table-responsive">
            <?php
            $db = new db();
            $gdate = new gdate();
            $pr = new prime();
            $opt = new option();

            $year = jdate('Y');

            $from = $gdate->shamsi_to_miladi($year . '/' . $m . '/' . $d);
            $to = $gdate->shamsi_to_miladi($year . '/' . $m . '/' . $d);
            $sql = "select * from reserve_plan where a_id = $a_id and date(rp_date) >= '$from' and date(rp_date) <= '$to'";
            $reserve_list = $db->get_select_query($sql);
            if (count($reserve_list) > 0) {
                ?>
                <table>
                    <thead>
                    <tr>
                        <th>روز</th>
                        <th>نام سانس</th>
                        <th>ساعت</th>
                        <th>رزرو</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($reserve_list as $item) {
                        $rs_details = $item['rs_details'];
                        $rp_date = $item['rp_date'];
                        $rp_count = $item['rp_count'];
                        $reserved_count = $db->get_var_query("select sum(ro_count) from reserve_order where rs_details = '$rs_details' and ro_date = '$rp_date' and a_id = $a_id and ro_status = 1");
                        $slug = explode('?', trim(str_replace('/', ' ', $_SERVER['REQUEST_URI'])))[0];
                        ?>
                        <tr>
                            <td><?php echo $pr->per_number($gdate->miladi_to_shamsi($item['rp_date']) . ' (' . jstrftime('%A', strtotime($item['rp_date'])) . ')'); ?></td>
                            <td><?php echo $item['rs_name']; ?></td>
                            <td><?php echo $pr->per_number($rs_details); ?></td>
                            <td>
                                <?php
                                if ($rp_count > $reserved_count) { ?>
                                    <button class="tn btn-success reserve-step2" data-id="<?php echo $item['ID']; ?>"
                                            data-a_id=<?php echo $a_id; ?>><i class="fa fa-check"></i> رزرو کنید
                                    </button>
                                    <?php
                                } else {
                                    ?>
                                    <button class="btn btn-danger" disabled><i class="fa fa-remove"></i> تکمیل ظرفیت
                                    </button>
                                    <?php
                                } ?>
                            </td>
                        </tr>
                        <?php
                    } ?>
                    </tbody>
                </table>
                <?php
            } else {
                ?>
                <div class="alert alert-danger text-center">زمان بندی رزرو این ماه هنوز انجام نشده است.</div>
                <?php
            }
            ?>
        </div>
        <?php
    }

    public function reserve_step2($a_id)
    {
        $db = new db();
        $pr = new prime();

        $sql = "select meta_value from site_setting where meta_key = 'website_reserve_rule' and a_id = $a_id";
        $rule = $db->get_var_query($sql);
        if ($rule) { ?>
            <div class="alert alert-success" style="font-size:0.9rem">
                <h4 class="mb-2">قوانین:</h4>
                <div class="mr-2">
                    <?php echo $pr->per_number(nl2br($rule)); ?>
                </div>
                <hr>
                <input type="checkbox" id="confirm-reserve-roles-checkbox">
                <b>قوانین فوق را به دقت مطالعه کرده و قبول دارم.</b>
            </div>
            <?php
        } ?>
        <div class="sansRow row m-0 mt-4">
            <input hidden id="reserve-plan-id" name="plan_id" value="<?php echo $_GET['plan_id']; ?>">
            <div class="sansform col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label>نام و نام خانوادگی <span>*</span></label>
                <input name="ro_name" id="ro-name" type="text" placeholder="نام و نام خانوادگی خود را وارد نمایید...">
            </div>
            <div class="sansform col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label>شماره موبایل <small>(اعداد انگلیسی)</small> <span>*</span></label>
                <input name="ro_mobile" id="ro-mobile" type="text" placeholder="شماره موبایل خود را وارد نمایید...">
            </div>
            <div class="sansform col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label>تعداد <span>*</span></label>
                <input name="ro_count" id="ro-count" type="number" value="1" placeholder="تعداد افراد را وارد کنید...">
            </div>
            <div class="sansform col-12 text-center">
                <button type="button" id="save-reserve" class="w-100">ثبت رزرو و پرداخت</button>
            </div>
        </div>
        <?php
    }

    public function load_reserve_auth_form($record_id)
    {
        $db = new db();
        $opt = new option();
        $pm = new website_payment();
        ?>
        <div class="container-fluid mt-5">
            <div class="row mb-5 reserveBox d-flex flex-column justify-content-center align-items-center">
                <form method="post" class="sansform col-6 d-flex flex-column">
                    <label class="text-center">کد اعتبارسنجی را وارد کنید <span>*</span></label>
                    <input hidden name="record_id" value="<?php echo $record_id; ?>">
                    <input name="auth_code" class="form-control">
                    <button type="submit" name="pay-reserve" class="mt-2">تایید و پرداخت</button>
                </form>
                <div class="col-6 d-flex flex-column px-1">
                    <button data-type="login" class="btn btn-danger btn-block btn-flat resend-code" disabled
                            style="font-size: 0.9rem;" data-a_id="<?php echo $opt->get_a_id(); ?>"
                            data-id="<?php echo $record_id; ?>">ارسال مجدد کد اعتبارسنجی
                    </button>
                    <div class="d-flex justify-content-center mt-2"><span class="login-timer"
                                                                          style="color: #999999;"></span></div>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pay-reserve'])) {
                        $auth_code = $_POST['auth_code'];
                        $record_id = $_POST['record_id'];
                        $a_id = $opt->get_a_id();
                        $code = $db->get_var_query("select ro_auth_code from reserve_order where ID = $record_id");
                        $ro_count = $db->get_var_query("select ro_count from reserve_order where ID = $record_id");
                        if ($auth_code == $code) {
                            //$reserve_price = $opt->get_global_option('reserve_price');
                            $reserve_price = $db->get_var_query("select rs_price from reserve_order where ID = $record_id") * $ro_count;
                            $pm->payment_request($reserve_price, $a_id, $record_id, "reserve");
                        } else {
                            echo "<div class='alert alert-danger w-100 mx-3'>کد اعتبارسنجی نامعتبر است.</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }

    public function reserve_list_user($m = null, $d = null, $a_id)
    { ?>
        <div Class="reserveBoxResult table-responsive">
            <?php
            $db = new db();
            $gdate = new gdate();
            $pr = new prime();
            $opt = new option();

            $year = jdate('Y');

            $mobile = $_COOKIE['user_mobile'];


            $from = $gdate->shamsi_to_miladi($year . '/' . $m . '/' . $d);
            $to = $gdate->shamsi_to_miladi($year . '/' . $m . '/' . $d);
            //$sql = "select * from reserve_plan where a_id = $a_id and date(rp_date) >= '$from' and date(rp_date) <= '$to'";
            $sql = "select * from reserve_order where a_id = $a_id and ro_mobile=$mobile order by ID desc";
            $reserve_list = $db->get_select_query($sql);
            if (count($reserve_list) > 0) {
                ?>
                <table>
                    <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>روز</th>
                        <th>نام سانس</th>
                        <th>قیمت رزرو</th>
                        <th>توضیحات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $counter = 1;
                    foreach ($reserve_list as $item) {
                        ?>
                        <tr>
                            <td><?php echo $pr->per_number($counter); ?></td>
                            <td><?php echo $pr->per_number($gdate->miladi_to_shamsi($item['ro_date'])); ?></td>
                            <td><?php echo $item['rs_name']; ?></td>
                            <td><?php echo $pr->per_number($item['rs_price']); ?></td>
                            <td><?php echo $pr->per_number($item['rs_details']); ?></td>
                        </tr>
                        <?php
                        $counter++;
                    } ?>
                    </tbody>
                </table>
                <?php
            } else {
                ?>
                <div class="alert alert-danger text-center">موردی یافت نشد.</div>
                <?php
            }
            ?>
        </div>
        <?php
    }

}
