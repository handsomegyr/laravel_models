<?php
namespace App\Common\Models\Goods\Mysql;

use App\Common\Models\Base\Mysql\Base;

class Brand extends Base
{

    /**
     * 商品品牌表管理
     * This model is mapped to the table goods_brand
     */
    public function getSource()
    {
        return 'goods_brand';
    }

    public function reorganize(array $data)
    {
        $data = parent::reorganize($data);
        return $data;
    }
}