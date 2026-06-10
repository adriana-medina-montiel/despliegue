@extends('layouts.web')

@section('title', 'Blog — Softura Solutions')

@push('styles')
<link rel="stylesheet" href="/css/estilos.css">
@endpush

@section('content')

@php
    $header = $sections->get('header');
    $postsSection = $sections->get('posts');
    $postItems = $postsSection?->items ?? $posts ?? collect();
@endphp

@if(!$header || $header->is_visible)
<section style="min-height:80vh; padding:8rem 5vw 4rem; background-color: #FAFAFA;">
  <div style="max-width:1200px; margin:0 auto;">

    <div class="sec-label" style="text-transform:uppercase; letter-spacing:3px; margin-bottom:1rem; color:#1A4FFF; font-weight:600; font-size: 0.9rem;">
        {{ $header?->content('badge_text', 'Blog') }}
    </div>

    <h1 style="font-family:'Syne',sans-serif; font-size:clamp(2.5rem,5vw,4rem); font-weight:800; line-height:1.15; margin-bottom:4rem;">
      {{ $header?->content('title', 'Insights & Tecnología') }}
    </h1>

    @if(!$postsSection || $postsSection->is_visible)
    <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(320px, 1fr)); gap:2.5rem;">

        @foreach($postItems as $post)
        <article style="background:#fff; border-radius:16px; overflow:hidden; box-shadow:0 10px 30px rgba(0,0,0,0.05); border: 1px solid #f0f0f0; display:flex; flex-direction:column;">

          <div style="width:100%; height:200px; background:#e2e8f0; overflow:hidden;">
            @php $img = $post->data('image', ''); @endphp
            @if($img)
            <img src="{{ cms_asset($img) }}" alt="{{ $post->data('title') }}" style="width:100%;height:100%;object-fit:cover;">
            @endif
          </div>

          <div style="padding:1.8rem; flex-grow:1;">
            <p style="font-size:0.75rem; color:#1A4FFF; font-weight:700; text-transform:uppercase; letter-spacing:1px; margin-bottom:0.8rem;">
              {{ $post->data('date') }} • {{ $post->data('author') }}
            </p>

            <h2 style="font-family:'Syne',sans-serif; font-size:1.3rem; font-weight:700; margin-bottom:1rem; line-height:1.3; color:#1e293b;">
              {{ $post->data('title') }}
            </h2>

            <p style="color:#6B6B80; font-size:0.95rem; line-height:1.6; margin-bottom:1.5rem;">
              {{ $post->data('excerpt') }}
            </p>

            <a href="#" style="display:inline-block; background:#1A4FFF; color:#fff; padding:0.7rem 1.5rem; border-radius:8px; font-weight:600; font-size:0.9rem; text-decoration:none;">
              Leer más
            </a>
          </div>
        </article>
        @endforeach

    </div>
    @endif
  </div>
</section>
@endif

@endsection
