<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\admin\SchoolRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchoolController extends Controller
{
    //
    private $schoolRepository;

    public function __construct(SchoolRepository $schoolRepository)
    {
        $this->schoolRepository = $schoolRepository;
    }

    public function index()
    {
        $list = $this->schoolRepository->list();
        foreach ($list as $key => $school) {
            $school->school_logo = config('app.url') . $school->school_logo;
            $list[$key] = $school;
        }
        return $this->success($list->toArray());
    }
}
