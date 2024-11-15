<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session_6 extends Model
{
    use HasFactory;

    protected $table = 'sgo_session_6';

    protected $fillable = [
        'image',
        'title',
        'short_description',
        'contents',
    ];

    protected $casts = [
        'contents' => 'array',
    ];
}
