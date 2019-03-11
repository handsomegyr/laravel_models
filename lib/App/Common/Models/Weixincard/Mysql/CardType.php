<?php
namespace App\Common\Models\Weixincard\Mysql;

use App\Common\Models\Base\Mysql\Base;

class CardType extends Base
{

    /**
     * 微信卡券-卡券类别
     * This model is mapped to the table weixincard_card_type
     */
    public function getSource()
    {
        return 'weixincard_card_type';
    }
}