<?php
namespace App\Common\Models\Bargain\Mysql;

use App\Common\Models\Base\Mysql\Base;

class BlackUser extends Base
{

    /**
     * 砍价-砍价用户惩罚系数表
     * This model is mapped to the table bargain_black_user
     */
    public function getSource()
    {
        return 'bargain_black_user';
    }
}
