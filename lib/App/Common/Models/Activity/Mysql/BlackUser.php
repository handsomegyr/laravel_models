<?php
namespace App\Common\Models\Activity\Mysql;

use App\Common\Models\Base\Mysql\Base;

class BlackUser extends Base
{

    /**
     * 活动-黑名单用户表管理
     * This model is mapped to the table activity_black_user
     */
    public function getSource()
    {
        return 'activity_black_user';
    }
}