<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-10-17
 * Time: 下午10:47
 * To change this template use File | Settings | File Templates.
 */

class CatagoryAction extends Action {
    public function clist($id=-1) {
        if ($id == -1) {
            $result = M()->query("select * from categories c, categories_description cd where cd.categories_id=c.categories_id");
            $this->ajaxReturn($result, 'JSON');
        } else {
            $result = M()->query("select * from categories c, categories_description cd where cd.categories_id=c.categories_id and c.categories_id=$id");
            $this->ajaxReturn($result, 'JSON');
        }
    }
}

?>