<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/19
 * Time: 11:50
 */

namespace App\Services;


use App\Models\DistrictModel;

class DistrictService
{
    public function getDistrictById($id)
    {
        return DistrictModel::where('id', $id)->first();
    }
}