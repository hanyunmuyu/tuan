<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityUserModel extends Model
{
    //
    protected $table = 'community_user';
    protected $fillable = [
        'community_id',
        'user_id',

    ];
}
