<?php

namespace public_html\class;

class db
{

    public function yadoni_get_connection_string()
    {
        $dbname = 'yadoni_yadonidb';
        $db_username = 'yadoni_yadoniuser';
        $db_password = 'Wi0Ygz5g';
        $pdo_conn = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8", "$db_username", "$db_password",
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        return $pdo_conn;
    }

    public function sudo_get_connection_string($a_id)
    {
        $dbname = $this->get_db_arg($a_id, 'a_db_name');
        $db_username = $this->get_db_arg($a_id, 'a_db_user');
        $db_password = $this->get_db_arg($a_id, 'a_db_password');
        $pdo_conn = new PDO("mysql:host=localhost; dbname=$dbname; charset=utf8", "$db_username", "$db_password", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        return $pdo_conn;
    }

    public function get_auth_connection_string()
    {
        $host = "localhost";
        $dbname = "yadoni_auth";
        $db_username = "yadoni_helisoft";
        $db_password = "2f0u4HXaEH";
        $dsn = "mysql:host=$host; dbname=$dbname; charset=UTF8";
        $pdo_conn = new PDO($dsn, $db_username, $db_password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        return $pdo_conn;
    }

    function get_connection_string()
    {
        $dbname = 'yadoni_auth';
        $db_username = 'yadoni_helisoft';
        $db_password = '2f0u4HXaEH';
        $pdo_conn = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8", "$db_username", "$db_password",
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

        return $pdo_conn;
    }

    function master_get_connection_string()
    {
        $dbname = 'yadoni_masterdb';
        $db_username = 'yadoni_masteruser';
        $db_password = '2AwFKj2b';
        $pdo_conn = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8", "$db_username", "$db_password",
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

        return $pdo_conn;
    }

    public function ex_query($sql, $sudo = 0)
    {
        if ($sudo == 1) {
            $pdo_conn = $this->sudo_get_connection_string();
        } else if ($sudo == 2) {
            $pdo_conn = $this->yadoni_get_connection_string();
        } else if ($sudo == 3) {
            $pdo_conn = $this->master_get_connection_string();
        } else {
            $pdo_conn = $this->get_connection_string();
        }
        $pdo_statement = $pdo_conn->prepare($sql);
        $pdo_statement->execute();
        $id = $pdo_conn->lastInsertId();
        return $id;
    }

    public function ex_query_db_account($sql, $a_id)
    {
        $pdo_conn = $this->sudo_get_connection_string($a_id);
        $pdo_statement = $pdo_conn->prepare($sql);
        $pdo_statement->execute();
        $id = $pdo_conn->lastInsertId();
        return $id;
    }

    public function get_select_query($sql, $sudo = 0, $a_id = null)
    {
        if ($sudo == 1) {
            $pdo_conn = $this->sudo_get_connection_string($a_id);
        } else if ($sudo == 2) {
            $pdo_conn = $this->yadoni_get_connection_string();
        } else if ($sudo == 3) {
            $pdo_conn = $this->master_get_connection_string();
            //$pdo_conn = $this->sudo_get_connection_string(51);
        } else {
            $pdo_conn = $this->get_connection_string();
        }
        $pdo_statement = $pdo_conn->prepare($sql);
        $pdo_statement->execute();
        $result = $pdo_statement->fetchAll();
        return $result;
    }

    public function get_var_query($sql, $sudo = 0)
    {
        if ($sudo == 1) {
            $pdo_conn = $this->sudo_get_connection_string();
        } else if ($sudo == 2) {
            $pdo_conn = $this->yadoni_get_connection_string();
        } else if ($sudo == 3) {
            $pdo_conn = $this->master_get_connection_string();
        } else {
            $pdo_conn = $this->get_connection_string();
        }
        $pdo_statement = $pdo_conn->prepare($sql);
        $pdo_statement->execute();
        $result = $pdo_statement->fetchAll();
        if ($result) {
            return $result[0][0];
        } else {
            return;
        }
    }

    public function check_login($username, $password)
    {
        $dbname = 'yadoni_auth';
        $db_username = 'yadoni_helisoft';
        $db_password = '2f0u4HXaEH';
        $pdo_conn = new PDO("mysql:host=localhost;dbname=" . $dbname . ";charset=utf8", $db_username, $db_password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $sql = "select a_id from user where u_username = '$username' and u_password = '$password'";
        $pdo_statement = $pdo_conn->prepare($sql);
        $pdo_statement->execute();
        $result = $pdo_statement->fetchAll();
        if (count($result) > 0) {
            $a_id = $result[0][0];
        } else {
            $a_id = "no";
        }

        if ($a_id == "no") {
            $aa_id = 0;
        } else {
            $aa_id = $a_id;
        }
        $lr_time = jdate('Y/m/d H:s:i');
        $pr = new prime();
        $lr_ip = $pr->get_ip();
        $sql_ins = "insert into login_record (a_id, lr_user, lr_pass, lr_time, lr_ip) values($aa_id, '$username', '$password', '$lr_time', '$lr_ip')";
        $pdo_statement = $pdo_conn->prepare($sql_ins);
        $pdo_statement->execute();
        return $a_id;
    }

    public function get_db_arg($account_id, $arg)
    {
        $dbname = 'yadoni_auth';
        $db_username = 'yadoni_helisoft';
        $db_password = '2f0u4HXaEH';
        $pdo_conn = new PDO("mysql:host=localhost;dbname=" . $dbname . ";charset=utf8", $db_username, $db_password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $sql = "select $arg from account where a_id = $account_id";
        $pdo_statement = $pdo_conn->prepare($sql);
        $pdo_statement->execute();
        $result = $pdo_statement->fetchAll();
        if (count($result) > 0) {
            return $result[0][0];
        } else {
            return "no";
        }
    }


    //Account Methods
    public function get_account_connection_string($account_id)
    {
        $host = "localhost";
        $dbname = $this->get_db_arg($account_id, 'a_db_name');
        $db_username = $this->get_db_arg($account_id, 'a_db_user');
        $db_password = $this->get_db_arg($account_id, 'a_db_password');
        $dsn = "mysql:host=$host; dbname=$dbname; charset=UTF8";
        $pdo_conn = new PDO($dsn, $db_username, $db_password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        return $pdo_conn;
    }

    public function get_account_select_query($sql, $a_id)
    {
        $pdo_conn = $this->get_account_connection_string($a_id);
        $pdo_statement = $pdo_conn->prepare($sql);
        $pdo_statement->execute();
        $result = $pdo_statement->fetchAll();
        return $result;
    }

}
