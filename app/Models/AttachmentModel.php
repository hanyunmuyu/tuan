<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttachmentModel extends Model
{
    //
    protected $table = 'attachment';
    protected $fillable = [
        'origin_name', 'attachment_path',
    ];
}
