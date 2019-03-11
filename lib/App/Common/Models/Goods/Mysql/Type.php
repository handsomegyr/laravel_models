<?php
namespace App\Common\Models\Goods\Mysql;

use App\Common\Models\Base\Mysql\Base;

class Type extends Base
{

    /**
     * 商品类型表管理
     * This model is mapped to the table goods_type
     */
    public function getSource()
    {
        return 'goods_type';
    }

    public function reorganize(array $data)
    {
        $data = parent::reorganize($data);
        return $data;
    }
}