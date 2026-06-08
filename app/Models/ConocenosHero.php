<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConocenosHero extends Model
{
    protected $table = 'conocenos_hero';

    protected $fillable = [
        'badge_text',
        'title',
        'description',
        'background_image',
        'is_visible',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];
}
