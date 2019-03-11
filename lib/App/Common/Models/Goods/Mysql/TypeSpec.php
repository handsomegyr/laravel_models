<?php
namespace App\Common\Models\Goods\Mysql;

use App\Common\Models\Base\Mysql\Base;

class TypeSpec extends Base
{

    /**
     * 商品类型与规格对应表管理
     * This model is mapped to the table goods_type_spec
     */
    public function getSource()
    {
        return 'goods_type_spec';
    }

    public function reorganize(array $data)
    {
        $data = parent::reorganize($data);
        return $data;
    }
}