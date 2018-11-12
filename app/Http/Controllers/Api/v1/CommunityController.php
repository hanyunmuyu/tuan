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
        $communityList = $this->formatPaginate($communityList);
        $data['communityList'] = $communityList;
        return $this->success($data);
    }
}
