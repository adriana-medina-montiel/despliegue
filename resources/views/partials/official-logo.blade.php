@php
  $name  = $name ?? ($alt ?? '');
  $file  = $file ?? null;
  $cdn   = $cdn ?? null;
  $class = $class ?? 'sp-official-logo';
  $src   = null;

  if ($file) {
      // Uploaded files (storage) vs static public files (public/img/...)
      if (str_starts_with($file, 'img/') || str_starts_with($file, 'img\\')) {
          $src = file_exists(public_path($file)) ? asset($file) : null;
      } else {
          $src = cms_asset($file) ?: null;
      }
  }

  if (!$src && $cdn) {
      $src = $cdn;
  }
@endphp
@if($src)
<img src="{{ $src }}" alt="{{ $alt ?? $name }}" class="{{ $class }}" loading="lazy" decoding="async">
@endif
