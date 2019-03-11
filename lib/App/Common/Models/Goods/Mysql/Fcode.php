<?php
namespace App\Common\Models\Goods\Mysql;

use App\Common\Models\Base\Mysql\Base;

class Fcode extends Base
{

    /**
     * 商品F码管理
     * This model is mapped to the table goods_fcode
     */
    public function getSource()
    {
        return 'goods_fcode';
    }

    public function reorganize(array $data)
    {
        $data = parent::reorganize($data);
        return $data;
    }
}