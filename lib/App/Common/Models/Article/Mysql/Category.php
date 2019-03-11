<?php
namespace App\Common\Models\Article\Mysql;

use App\Common\Models\Base\Mysql\Base;

class Category extends Base
{

    /**
     * 文章-分类管理
     * This model is mapped to the table article_category
     */
    public function getSource()
    {
        return 'article_category';
    }
}