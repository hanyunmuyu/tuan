<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/6
 * Time: 9:52
 */

namespace App\Repositories\v1;


use App\User;

class UserRepository
{
    public function findUserByMobile($mobile)
    {
        return User::where('mobile', $mobile)->first();
    }
}