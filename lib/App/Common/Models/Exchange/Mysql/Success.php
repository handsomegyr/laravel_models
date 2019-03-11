<?php
namespace App\Common\Models\Exchange\Mysql;

use App\Common\Models\Base\Mysql\Base;

class Success extends Base
{

    /**
     * 兑换-成功记录
     * This model is mapped to the table exchange_success
     */
    public function getSource()
    {
        return 'exchange_success';
    }

    public function reorganize(array $data)
    {
        $data = parent::reorganize($data);
        $data['exchange_time'] = $this->changeToMongoDate($data['exchange_time']);
        return $data;
    }
}