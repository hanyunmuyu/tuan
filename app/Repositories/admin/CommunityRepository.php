<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/25
 * Time: 15:57
 */

namespace App\Repositories\admin;


use App\Models\CommunityModel;

class CommunityRepository
{
    public function getCommunityList()
    {
        return CommunityModel::orderby('id', 'desc')->paginate();
    }

    public function detail($id)
    {
        return CommunityModel::where('id', $id)->first();
    }
}
