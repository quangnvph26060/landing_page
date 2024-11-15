<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session_4 extends Model
{
    use HasFactory;

    protected $table = 'sgo_session_4';

    protected $fillable = [
        'title',
        'image',
        'contents',
        'product_benefits',
    ];

    protected $casts = [
        'product_benefits' => 'array',
        'contents' => 'array',
    ];
}
