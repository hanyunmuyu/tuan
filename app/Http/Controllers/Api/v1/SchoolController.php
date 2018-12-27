<?php

namespace App\Http\Controllers\Api\v1;

use App\Repositories\v1\SchoolRepository;
use App\Services\AttachmentService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchoolController extends Controller
{
    private $schoolRepository;
    private $attachmentService;

    public function __construct(SchoolRepository $schoolRepository, AttachmentService $attachmentService)
    {
        $this->schoolRepository = $schoolRepository;
        $this->attachmentService = $attachmentService;
    }

    public function list(Request $request)
    {
        $page = $request->get('page', 1);
        $schoolList = $this->schoolRepository->getSchoolList();
        if ($schoolList) {
            foreach ($schoolList as $key => $value) {
                $value->school_logo = config('app.url') . $value->school_logo;
                $schoolList[$key] = $value;
            }
        }
        $schoolList = $this->formatPaginate($schoolList);
        $schoolRecommend = $this->schoolRepository->getRecommendSchool();
        if ($schoolRecommend && $page == 1) {
            foreach ($schoolRecommend as $key => $v) {
                $v->school_logo = config('app.url') . $v->school_logo;
                $schoolRecommend[$key] = $v;
            }
            $data['schoolRecommend'] = $schoolRecommend->toArray();
        } else {
            $data['schoolRecommend'] = [];
        }
        $data['schoolList'] = $schoolList;
        return $this->success($data);
    }

    public function post(Request $request)
    {
        return $this->success($this->attachmentService->addAttachment($request, 'file', false));
    }
}
