<?php
namespace App\Common\Models\Goods\Mysql;

use App\Common\Models\Base\Mysql\Base;

class Browse extends Base
{

    /**
     * 商品浏览历史表管理
     * This model is mapped to the table goods_browse
     */
    public function getSource()
    {
        return 'goods_browse';
    }

    public function reorganize(array $data)
    {
        $data = parent::reorganize($data);
        return $data;
    }
}