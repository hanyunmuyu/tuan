<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/24
 * Time: 16:57
 */

namespace App\Repositories\admin;


use App\Models\SchoolModel;

class SchoolRepository
{
    public function list()
    {
        return SchoolModel::orderby('id', 'desc')->paginate();
    }
}
