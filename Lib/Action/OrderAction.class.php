<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-10-18
 * Time: 下午10:02
 * To change this template use File | Settings | File Templates.
 */

class OrderAction extends Action {
    public function clist($customid = -1) {
        $result = M()->query("select * from orders c, orders_products op, products_description pd where c.orders_id=op.orders_id and op.products_id=pd.products_id and c.customers_id=$customid");
        $this->ajaxReturn($result, 'JSON');
    }
}

?>