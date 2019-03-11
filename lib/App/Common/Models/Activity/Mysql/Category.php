<?php
namespace App\Common\Models\Activity\Mysql;

use App\Common\Models\Base\Mysql\Base;

class Category extends Base
{

    /**
     * 活动-活动分类管理
     * This model is mapped to the table activity_category
     */
    public function getSource()
    {
        return 'activity_category';
    }
}