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
            $list[$key] = $community;
        }
        return $this->success($list);
    }

    public function detail(Request $request)
    {
        $id = $request->get('id');
        if (!$id) {
            return $this->error('参数错误');
        }
        $detail = $this->communityRepository->detail($id);
        if (!$detail) {
            return $this->error('社团不存在');
        }
//        $detail->community_logo = config('app.url') . $detail->community_logo;
        return $this->success($detail->toArray());
    }
}
