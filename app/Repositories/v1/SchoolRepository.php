<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/12
 * Time: 14:08
 */

namespace App\Repositories\v1;


use App\Models\SchoolModel;

class SchoolRepository
{
    public function getSchoolList()
    {
        return SchoolModel::orderby('favorite_number', 'desc')
            ->paginate();
    }
}