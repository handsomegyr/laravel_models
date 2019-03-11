<?php
namespace App\Common\Models\Sms\Mysql;

use App\Common\Models\Base\Mysql\Base;

class Settings extends Base
{

    /**
     * 短信-短信设置表管理
     * This model is mapped to the table sms_settings
     */
    public function getSource()
    {
        return 'sms_settings';
    }

    public function reorganize(array $data)
    {
        $data = parent::reorganize($data);
        return $data;
    }
}