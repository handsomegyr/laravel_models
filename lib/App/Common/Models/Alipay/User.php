<?php
namespace App\Common\Models\Alipay;

use App\Common\Models\Base\Base;

class User extends Base
{

    function __construct()
    {
        $this->setModel(new \App\Common\Models\Alipay\Mysql\User());
    }
}