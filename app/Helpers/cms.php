<?php

if (! function_exists('cms_asset')) {
    /**
     * Resolve a CMS image path: external URL, public/img asset, or storage upload.
     */
    function cms_asset(?string $path): string
    {
        if (! $path) {
            return '';
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        if (str_starts_with($path, 'img/')) {
            return asset($path);
        }

        return asset('storage/' . $path);
    }
}
