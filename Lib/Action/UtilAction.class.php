<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-10-20
 * Time: 上午11:38
 * To change this template use File | Settings | File Templates.
 */

class UtilAction extends Action {
    protected function isLogin() {
        if (isset($_SESSION["login"]) && ($_SESSION["login"] == true))
        {
            return true;
        }

        return false;
    }

    protected function getLoginName() {
        if (isset($_SESSION["login"]) && isset($_SESSION["username"])) {
            return $_SESSION["username"];
        }

        return null;
    }
}

?>