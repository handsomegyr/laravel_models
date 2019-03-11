<?php
namespace App\Common\Models\Live\Mysql;

use App\Common\Models\Base\Mysql\Base;

class Resource extends Base
{

    /**
     * 直播-资源管理
     * This model is mapped to the table live_resource
     */
    public function getSource()
    {
        return 'live_resource';
    }

    public function reorganize(array $data)
    {
        $data = parent::reorganize($data);
        return $data;
    }
}