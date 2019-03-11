<?php
namespace App\Common\Models\Goods\Mysql;

use App\Common\Models\Base\Mysql\Base;

class Spec extends Base
{

    /**
     * 商品规格表管理
     * This model is mapped to the table goods_spec
     */
    public function getSource()
    {
        return 'goods_spec';
    }

    public function reorganize(array $data)
    {
        $data = parent::reorganize($data);
        return $data;
    }
}