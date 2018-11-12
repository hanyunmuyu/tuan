<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/12
 * Time: 14:08
 */

namespace App\Repositories\v1;


use App\Models\SchoolModel;
use App\Models\SchoolRecommendModel;

class SchoolRepository
{
    public function getSchoolList()
    {
        return SchoolModel::orderby('favorite_number', 'desc')
            ->paginate();
    }

    public function getRecommendSchool()
    {
        return SchoolRecommendModel::leftjoin('school', 'school.id', '=', 'school_recommend.school_id')
            ->select('school.*')
            ->get();
    }
}