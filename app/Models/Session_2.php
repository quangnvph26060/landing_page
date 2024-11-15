<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session_2 extends Model
{
    use HasFactory;

    protected $table = 'sgo_session_2';

    protected $fillable = [
        'title',
        'contents',
    ];

    protected $casts = [
        'contents' => 'array',
    ];
}
