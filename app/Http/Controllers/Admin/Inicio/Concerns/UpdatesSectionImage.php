<?php

namespace App\Http\Controllers\Admin\Inicio\Concerns;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait UpdatesSectionImage
{
    protected function updateImageField(array &$content, Request $request, string $field, string $storagePath): void
    {
        if (! $request->hasFile($field)) {
            return;
        }

        $old = $content[$field] ?? null;
        if ($old && ! str_starts_with($old, 'http') && ! str_starts_with($old, 'img/')) {
            Storage::disk('public')->delete($old);
        }

        $content[$field] = $request->file($field)->store($storagePath, 'public');
    }
}
