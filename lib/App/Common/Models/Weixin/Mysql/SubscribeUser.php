<?php
namespace App\Common\Models\Weixin\Mysql;

use App\Common\Models\Base\Mysql\Base;

class SubscribeUser extends Base
{

    /**
     * 微信关注用户
     * This model is mapped to the table weixin_subscribe_user
     */
    public function getSource()
    {
        return 'weixin_subscribe_user';
    }
}