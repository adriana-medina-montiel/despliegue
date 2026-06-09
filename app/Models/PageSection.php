<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    protected $fillable = ['page_slug', 'section_key', 'content', 'is_visible'];

    protected $casts = [
        'content'    => 'array',
        'is_visible' => 'boolean',
    ];

    // ── Query helpers ──────────────────────────────────────────────

    public static function get(string $page, string $section): ?self
    {
        return static::where('page_slug', $page)->where('section_key', $section)->first();
    }

    public static function forPage(string $page): \Illuminate\Database\Eloquent\Collection
    {
        return static::where('page_slug', $page)->get()->keyBy('section_key');
    }

    // ── Content accessors ──────────────────────────────────────────

    public function content(string $key, mixed $default = null): mixed
    {
        return ($this->content ?? [])[$key] ?? $default;
    }

    public function setContent(string $key, mixed $value): void
    {
        $data = $this->content ?? [];
        $data[$key] = $value;
        $this->content = $data;
    }

    // ── Relationships ──────────────────────────────────────────────

    public function items(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SectionItem::class, 'section_id')->orderBy('sort_order');
    }
}
