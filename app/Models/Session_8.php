<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session_8 extends Model
{
    use HasFactory;

    protected $table = 'sgo_session_8';

    protected $fillable = [
        'title',
        'link_video',
        'content',
    ];
}
