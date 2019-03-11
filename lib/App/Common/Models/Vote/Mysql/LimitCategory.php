<?php
namespace App\Common\Models\Vote\Mysql;

use App\Common\Models\Base\Mysql\Base;

class LimitCategory extends Base
{

    /**
     * 投票-限制类别表管理
     * This model is mapped to the table vote_limit_category
     */
    public function getSource()
    {
        return 'vote_limit_category';
    }
}

