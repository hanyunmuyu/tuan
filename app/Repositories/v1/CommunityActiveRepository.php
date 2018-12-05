<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/5
 * Time: 12:01
 */

namespace App\Repositories\v1;


use App\Models\CommunityActiveModel;

class CommunityActiveRepository
{
    public function getCommunityActiveList()
    {
        return CommunityActiveModel::orderby('id', 'desc')->paginate();
    }
}