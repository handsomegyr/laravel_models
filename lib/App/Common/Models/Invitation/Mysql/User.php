<?php
namespace App\Common\Models\Invitation\Mysql;

use App\Common\Models\Base\Mysql\Base;

class User extends Base
{

    /**
     * 微信邀请-用户表管理
     * This model is mapped to the table invitation_user
     */
    public function getSource()
    {
        return 'invitation_user';
    }

    public function reorganize(array $data)
    {
        $data = parent::reorganize($data);
        $data['log_time'] = $this->changeToMongoDate($data['log_time']);
        $data['expire'] = $this->changeToMongoDate($data['expire']);
        $data['lock'] = $this->changeToBoolean($data['lock']);
        return $data;
    }
}