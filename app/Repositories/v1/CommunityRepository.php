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

    public function payAttentionToCommunity($userId, $communityId)
    {
        $data['user_id'] = $userId;
        $data['community_id'] = $communityId;
        $data['type'] = 'attention';
        $res = CommunityUserModel::create($data);
        if ($res) {
            $this->updateCommunityFavoriteNumber($communityId);
        }
    }

    public function updateCommunityFavoriteNumber($communityId, $number = 1)
    {
        return CommunityModel::where('id', $communityId)->increment('favorite_number', $number);
    }

    public function joinInCommunity($userId, $communityId)
    {
        $data['user_id'] = $userId;
        $data['community_id'] = $communityId;
        $data['type'] = 'join';
        $re = CommunityUserModel::create($data);
        if ($re) {
            return $this->updateCommunityMemberNumber($communityId);
        }
    }

    public function updateCommunityMemberNumber($communityId, $number = 1)
    {
        return CommunityModel::where('id', $communityId)->increment('member_number', $number);
    }

    public function findUserCommunity($userId, $communityId, $type)
    {
        return CommunityUserModel::where('user_id', $userId)
            ->where('type', $type)
            ->where('community_id', $communityId)
            ->first();
    }
}