<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session_3 extends Model
{
    use HasFactory;

    protected $table = 'sgo_session_3';

    protected $fillable = [
        'contents',
        'image',
        'ingredients',
    ];

    protected $casts = [
        'contents' => 'array',
    ];
}
