<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-10-18
 * Time: 下午9:16
 * To change this template use File | Settings | File Templates.
 */

class BasketAction extends UtilAction {
    public function clist($customid = -1) {
        $ret = array("success"=>false, "result"=>null);
        if ($this->isLogin()) {
            $result = M()->query("select * from customers_basket c, products p, products_description pd where c.products_id=p.products_id and p.products_id=pd.products_id and c.customers_id=$customid");
            $ret["success"] = true;
            $ret["result"] = $result;
        } else {
            $ret["success"] = false;
            $ret["errorText"] = "user not login";
        }

        $this->ajaxReturn($ret, 'JSON');
    }
}

?>