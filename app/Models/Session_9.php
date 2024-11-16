<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session_9 extends Model
{
    use HasFactory;


    protected $table = 'sgo_session_9';

    protected $fillable = [
        'link',
        'content',
    ];


}
