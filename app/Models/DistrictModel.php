<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DistrictModel extends Model
{
    protected $table = 'district';
    //
    protected $fillable = [
        'code',
        'name',
        'pid',
    ];
}
