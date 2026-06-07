<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionItem extends Model
{
    protected $fillable = ['section_id', 'sort_order', 'data'];

    protected $casts = [
        'data'       => 'array',
        'sort_order' => 'integer',
    ];

    public function section(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PageSection::class, 'section_id');
    }

    public function data(string $key, mixed $default = null): mixed
    {
        return ($this->data ?? [])[$key] ?? $default;
    }
}
