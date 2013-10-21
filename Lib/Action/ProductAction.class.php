<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-10-18
 * Time: 下午8:49
 * To change this template use File | Settings | File Templates.
 */

class ProductAction extends UtilAction {
    public function clist($catagoryid=-1) {
        if ($catagoryid == -1) {
            $result = M()->query("select * from products c, products_to_categories cd where cd.products_id=c.products_id");
            $this->ajaxReturn($result, 'JSON');
        } else {
            $result = M()->query("select * from products c, products_to_categories cd where cd.products_id=c.products_id and cd.categories_id=$catagoryid");
            $this->ajaxReturn($result, 'JSON');
        }
    }

    public function item($id=-1) {
        if ($id < 0) {
            $result = Array("error"=>"id is invalid");
            $this->ajaxReturn($result, 'JSON');
        } else {
            $result = M()->query("select * from products c, products_to_categories cd,products_description pd where cd.products_id=c.products_id and c.products_id=pd.products_id and c.products_id=$id");
            $this->ajaxReturn($result, 'JSON');
        }
    }
}


?>