<?php

namespace public_html\class;

class person
{

    public function edit_person_profile_form()
    {
        $db = new db();

        $a_id = $_SESSION['a_id'];
        $p_mobile = $_COOKIE['user_mobile'];
        $sql = "select * from person where p_mobile = '$p_mobile'";
        $res = $db->get_select_query($sql, 1, $a_id);

        $sql_get_u_id = "select * from user where (a_id = $a_id) and (u_level=5 or u_level=7)";
        $res_u_id = $db->get_select_query($sql_get_u_id);


        $p_id = 0;
        $u_id = 0;
        if (count($res) > 0) {
            $p_id = $res[0]['p_id'];
        }
        if (count($res_u_id) > 0) {
            $u_id = $res_u_id[0]['u_id'];
        }
        ?>
        <input type="hidden" name="a_id" id="a-id" value="<?php echo $a_id; ?>">
        <input type="hidden" name="p_id" id="p-id" value="<?php echo $p_id; ?>">
        <input type="hidden" name="u_id" id="u-id" value="<?php echo $u_id; ?>">
        <div class="row">
            <div class="col-md-6 mt-3">
                <label>نام</label>
                <input type="text" name="p_name" id="p-name" class="form-control" placeholder="نام..."
                       value="<?php echo $res[0]['p_name']; ?>">
            </div>
            <div class="col-md-6 mt-3">
                <label>نام خانوادگی</label>
                <input type="text" name="p_family" id="p-family" class="form-control" placeholder="نام خانوادگی..."
                       value="<?php echo $res[0]['p_family']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-3">
                <label>جنسیت</label>
                <select name="p_gender" id="p-gender" class="form-control">
                    <option <?php echo $res[0]['p_gender'] == 1 ? "selected" : ""; ?> value="1">مرد</option>
                    <option <?php echo $res[0]['p_gender'] == 0 ? "selected" : ""; ?> value="0">زن</option>
                </select>
            </div>
            <div class="col-md-6 mt-3">
                <label>تاریخ تولد</label>
                <input type="text" name="p_birthday" id="p-birthday" class="form-control datepicker"
                       placeholder="تاریخ تولد" value="<?php echo $res[0]['p_birth']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-3">
                <button id="update-person-profile" class="btn btn-success w-100">ذخیره</button>
            </div>
        </div>
        <?php
    }

    public function update_person($arr, $a_id)
    {
        $db = new db();
        try {
            try {
                $conn = $db->get_account_connection_string($a_id);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            if ($arr['p_id'] == 0) {
                //For Insert New User
                $data = [
                    'p_name' => $arr['p_name'],
                    'p_family' => $arr['p_family'],
                    'p_gender' => $arr['p_gender'],
                    'p_birthday' => $arr['p_birthday'],
                    'u_id' => $arr['u_id'],
                    'p_mobile' => $_COOKIE['user_mobile'],
                    'p_regdate' => date('Y-m-d')
                ];
                $sql = "insert into person(u_id, p_name, p_family, p_gender, p_birth, p_mobile, p_regdate) values(:u_id, :p_name, :p_family, :p_gender, :p_birthday, :p_mobile, :p_regdate)";
                $statement = $conn->prepare($sql);
                if ($statement->execute($data)) {
                    echo "User Added successfully!";
                }
            } else {
                //For Upadate User
                $data = [
                    'p_name' => $arr['p_name'],
                    'p_family' => $arr['p_family'],
                    'p_gender' => $arr['p_gender'],
                    'p_birthday' => $arr['p_birthday'],
                    'p_id' => $arr['p_id']
                ];
                $sql = "update person set p_name = :p_name, p_family = :p_family, p_gender = :p_gender, p_birth = :p_birthday where p_id = :p_id";
                $statement = $conn->prepare($sql);
                if ($statement->execute($data)) {
                    echo "User Updated successfully!";
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update_person2($arr, $a_id)
    {
        $db = new db();
        $p_name = $arr['p_name'];
        $p_family = $arr['p_family'];
        $p_gender = $arr['p_gender'];
        $p_birthday = $arr['p_birthday'];
        $p_id = $arr['p_id'];
        $u_id = $arr['u_id'];
        $p_mobile = $_COOKIE['user_mobile'];
        $p_regdate = date('Y-m-d');
        if ($p_id == 0) {
            $sql = "insert into person(u_id, p_name, p_family, p_gender, p_birth, p_mobile, p_regdate) values($u_id, '$p_name', '$p_family', $p_gender, '$p_birthday', '$p_mobile', '$p_regdate')";
            $db->ex_query_db_account($sql, $a_id);
            exit;
        }
        $sql = "update person set p_name = '$p_name', p_family = '$p_family', p_gender = '$p_gender', p_birth = '$p_birthday' where p_id = $p_id";
        $db->ex_query_db_account($sql, $a_id);
    }

}
