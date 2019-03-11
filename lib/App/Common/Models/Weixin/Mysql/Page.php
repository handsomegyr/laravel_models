<?php
namespace App\Common\Models\Weixin\Mysql;

use App\Common\Models\Base\Mysql\Base;

class Page extends Base
{

    /**
     * 微信自定义页面
     * This model is mapped to the table weixin_page
     */
    public function getSource()
    {
        return 'weixin_page';
    }
}