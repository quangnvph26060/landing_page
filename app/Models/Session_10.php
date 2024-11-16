<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session_10 extends Model
{
    use HasFactory;

    protected $table = 'sgo_session_10';

    protected $fillable = [
        'title',
        'content',
        'image'
    ];
}
