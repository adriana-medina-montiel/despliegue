@php
  $name = $name ?? ($alt ?? '');
  $file = $file ?? null;
  $cdn = $cdn ?? null;
  $class = $class ?? 'sp-official-logo';
  $src = null;
  if ($file && file_exists(public_path($file))) {
      $src = asset($file);
  } elseif ($cdn) {
      $src = $cdn;
  }
@endphp
@if($src)
<img src="{{ $src }}" alt="{{ $alt ?? $name }}" class="{{ $class }}" loading="lazy" decoding="async">
@endif
