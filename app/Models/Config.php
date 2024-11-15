<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $table = 'sgo_configs';

    protected $fillable = [
        'title',
        'logo',
        'favicon',
        'address',
        'phone',
        'website',
        'title_footer',
        'content_footer',
        'script',
        'fanpage',
        'title_seo',
        'description_seo',
        'keywords_seo',
    ];
}
