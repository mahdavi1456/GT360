<?php

use public_html\class\db;
use public_html\class\person;

require_once("../class/jdf.php");
require_once("../class/db.php");
require_once("../class/person.php");

if(isset($_POST['update_person_profile'])) {
    $db = new db();
    $person = new person();

    $arr = array();
    $a_id = $_POST['a_id'];
    $arr['p_name'] = $_POST['p_name'];
    $arr['p_family'] = $_POST['p_family'];
    $arr['p_gender'] = $_POST['p_gender'];
    $arr['p_birthday'] = $_POST['p_birthday'];
    $arr['p_id'] = $_POST['p_id'];
    $arr['u_id'] = $_POST['u_id'];

    $person->update_person($arr, $a_id);

    exit;
}
