<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-10-18
 * Time: 下午10:02
 * To change this template use File | Settings | File Templates.
 */

class OrderAction extends UtilAction {
    public function clist($customid = -1) {
        $ret = array("success"=>false, "result"=>null);

        if ($this->isLogin()) {
            $result = M()->query("select * from orders c, orders_products op, products_description pd where c.orders_id=op.orders_id and op.products_id=pd.products_id and c.customers_id=$customid");
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