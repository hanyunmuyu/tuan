<?php

namespace App\Http\Controllers\Api\v1;

use App\Repositories\v1\CommunityRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommunityController extends Controller
{
    //
    private $communityRepository;

    public function __construct(CommunityRepository $communityRepository)
    {
        $this->communityRepository = $communityRepository;
    }

    public function list()
    {
        $communityList = $this->communityRepository->getCommunityList();
        foreach ($communityList as $k => $v) {
            $v->community_logo = config('app.url') . $v->community_logo;
            $communityList[$k] = $v;
        }
        $data['userCommunityList'] = [];
        $auth = auth('api');
        if ($auth->check()) {
            $userCommunityList = $this->communityRepository->getUserCommunityListByUserId($auth->user()->id);
            if ($userCommunityList) {
                foreach ($userCommunityList as $k => $v) {
                    $v->community_logo = config('app.url') . $v->community_logo;
                    $userCommunityList[$k] = $v;
                }
                $data['userCommunityList'] = $userCommunityList->toArray();
            }
        }
        $communityList = $this->formatPaginate($communityList);
        $data['communityList'] = $communityList;
        return $this->success($data);
    }

    public function attention(Request $request)
    {
        $communityId = $request->get('id');
        if (!$communityId) {
            return $this->error('社团id不可以为空');
        }
        $user = $request->user('api');
        $community = $this->communityRepository->findUserCommunity($user->id, $communityId, 'attention');
        if ($community) {
            return $this->error('已经关注过');
        }
        $this->communityRepository->payAttentionToCommunity($user->id, $communityId);
        return $this->success([], '关注成功');
    }

    public function join(Request $request)
    {

        $communityId = $request->get('id');
        if (!$communityId) {
            return $this->error('社团id不可以为空');
        }
        $user = $request->user('api');
        $community = $this->communityRepository->findUserCommunity($user->id, $communityId, 'join');
        if ($community) {
            return $this->error('已经是该社团的成员');
        }
        $this->communityRepository->joinInCommunity($user->id, $communityId);
        return $this->success([], '加入成功');
    }
}
