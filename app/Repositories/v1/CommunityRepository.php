<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/12
 * Time: 16:34
 */

namespace App\Repositories\v1;


use App\Models\CommunityModel;

class CommunityRepository
{
    public function getCommunityList()
    {
        return CommunityModel::orderby('id', 'desc')->paginate();
    }
}