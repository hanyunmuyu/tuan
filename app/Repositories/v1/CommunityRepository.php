<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/12
 * Time: 16:34
 */

namespace App\Repositories\v1;


use App\Models\CommunityModel;
use App\Models\CommunityUserModel;

class CommunityRepository
{
    public function getCommunityList()
    {
        return CommunityModel::orderby('id', 'desc')->paginate();
    }

    public function getUserCommunityListByUserId($userId, $limit = 6)
    {
        return CommunityUserModel::leftjoin('community', 'community.id', '=', 'community_user.community_id')
            ->where('community_user.user_id', $userId)
            ->limit($limit)
            ->get();
    }
}