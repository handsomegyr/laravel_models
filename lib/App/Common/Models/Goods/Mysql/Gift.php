<?php
namespace App\Common\Models\Goods\Mysql;

use App\Common\Models\Base\Mysql\Base;

class Gift extends Base
{

    /**
     * 商品赠品表管理
     * This model is mapped to the table goods_gift
     */
    public function getSource()
    {
        return 'goods_gift';
    }

    public function reorganize(array $data)
    {
        $data = parent::reorganize($data);
        return $data;
    }
}