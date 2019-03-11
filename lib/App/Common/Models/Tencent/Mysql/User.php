<?php
namespace App\Common\Models\Tencent\Mysql;

use App\Common\Models\Base\Mysql\Base;

class User extends Base
{

    /**
     * 腾讯-用户表管理
     * This model is mapped to the table tencent_user
     */
    public function getSource()
    {
        return 'tencent_user';
    }
}