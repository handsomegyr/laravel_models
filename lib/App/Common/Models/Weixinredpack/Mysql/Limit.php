<?php
namespace App\Common\Models\Weixinredpack\Mysql;

use App\Common\Models\Base\Mysql\Base;

class Limit extends Base
{

    /**
     * 微信红包-活动规则限制
     * This model is mapped to the table weixinredpack_limit
     */
    public function getSource()
    {
        return 'weixinredpack_limit';
    }

    public function reorganize(array $data)
    {
        $data = parent::reorganize($data);
        $data['start_time'] = $this->changeToMongoDate($data['start_time']);
        $data['end_time'] = $this->changeToMongoDate($data['end_time']);
        return $data;
    }
}