<?php
namespace App\Common\Models\Weixin\Mysql;

use App\Common\Models\Base\Mysql\Base;

class Qrcode extends Base
{

    /**
     * 微信二维码推广场景数据
     * This model is mapped to the table weixin_qrcode
     */
    public function getSource()
    {
        return 'weixin_qrcode';
    }
}