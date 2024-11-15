<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session_5 extends Model
{
    use HasFactory;

    protected $table = 'sgo_session_5';

    protected $fillable = [
        'image',
        'title',
        'contents',
    ];

   
}
