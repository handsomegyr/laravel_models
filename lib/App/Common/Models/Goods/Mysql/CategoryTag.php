<?php
namespace App\Common\Models\Goods\Mysql;

use App\Common\Models\Base\Mysql\Base;

class CategoryTag extends Base
{

    /**
     * 商品分类TAG表管理
     * This model is mapped to the table goods_category_tag
     */
    public function getSource()
    {
        return 'goods_category_tag';
    }

    public function reorganize(array $data)
    {
        $data = parent::reorganize($data);
        return $data;
    }
}