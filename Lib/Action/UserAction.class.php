<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-10-20
 * Time: 上午11:45
 * To change this template use File | Settings | File Templates.
 */
import("think.Encrypt.PasswordHash");

class UserAction extends UtilAction {
    public function login() {

        $name = $_POST["name"];
        $pwd = $_POST["pwd"];
        $hasher = new PasswordHash(10, true);

        //$savepwd = md5($pwd);
        $ret = array("success"=>false);
        $customers = M("customers");
        $records = $customers->where("customers_firstname='$name'")->select();

        //$ret["list"] = $records;
        //$ret["user"] = $name;
        //echo is_array($records);
        if (is_array($records) && sizeof($records) == 1) {
            if ($hasher->CheckPassword($pwd, $records[0]["customers_password"])) {
                $_SESSION["login"] = true;
                $_SESSION["username"] = $name;
                $ret["success"] = true;
            }
        }

        $this->ajaxReturn($ret, "JSON");
    }

    public function logoff() {
        $_SESSION["login"] = false;
        $_SESSION["username"] = null;
        $this->ajaxReturn(array("success"=>true), "JSON");
    }
}

?>