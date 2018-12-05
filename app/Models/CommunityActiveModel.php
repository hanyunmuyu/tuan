<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityActiveModel extends Model
{
    //
    protected $table = 'community_active';
    protected $fillable = [
        'community_id',
        'user_id',
        'title',
        'img_list',
    ];
}
