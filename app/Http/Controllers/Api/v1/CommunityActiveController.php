<?php

namespace App\Http\Controllers\Api\v1;

use App\Repositories\v1\CommunityActiveRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommunityActiveController extends Controller
{
    private $communityActiveRepository;

    public function __construct(CommunityActiveRepository $communityActiveRepository)
    {
        $this->communityActiveRepository = $communityActiveRepository;
    }

    //
    public function list()
    {
        $list = $this->communityActiveRepository->getCommunityActiveList();
        $list = $this->formatPaginate($list);
        return $this->success($list);
    }
}
