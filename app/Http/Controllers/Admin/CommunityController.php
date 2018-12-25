<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\admin\CommunityRepository;
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

    public function index()
    {
        $list = $this->communityRepository->getCommunityList();
        foreach ($list as $key => $community) {
            $community->community_log = config('app.url') . $community->community_logo;
            $list[$key] = $community;
        }
        return $this->success($list);
    }
}
