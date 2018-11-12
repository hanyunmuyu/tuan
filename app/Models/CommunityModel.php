<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityModel extends Model
{
    //
    protected $table = 'community';
    protected $fillable = [
        'community_name',
        'community_logo',
        'favorite_number',
        'member_number',
        'school_id',
    ];
}
