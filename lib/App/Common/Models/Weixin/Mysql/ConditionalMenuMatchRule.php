<?php
namespace App\Common\Models\Weixin\Mysql;

use App\Common\Models\Base\Mysql\Base;

class ConditionalMenuMatchRule extends Base
{

    /**
     * 微信个性化菜单匹配规则管理
     * This model is mapped to the table weixin_menu_conditional_matchrule
     */
    public function getSource()
    {
        return 'weixin_menu_conditional_matchrule';
    }
}