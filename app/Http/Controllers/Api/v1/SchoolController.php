<?php

namespace App\Http\Controllers\Api\v1;

use App\Repositories\v1\SchoolRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchoolController extends Controller
{
    private $schoolRepository;

    public function __construct(SchoolRepository $schoolRepository)
    {
        $this->schoolRepository = $schoolRepository;
    }

    public function list()
    {
        $schoolList = $this->schoolRepository->getSchoolList();
        if ($schoolList) {
            foreach ($schoolList as $key => $value) {
                $value->school_logo = config('app.url') . $value->school_logo;
                $schoolList[$key] = $value;
            }
        }
        $schoolList = $this->formatPaginate($schoolList);
        return $this->success($schoolList);
    }
}
