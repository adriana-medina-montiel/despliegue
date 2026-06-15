@php
$clients = \App\Models\PageSection::get('conocenos', 'clients');
if ($clients && $clients->is_visible) {
    $clientSectors = $clients->content('sectors', []);
    $items = $clients->items;
} else {
    $clientSectors = [];
    $items = collect();
}
@endphp
@if(count($clientSectors) > 0)
<div class="sp-clientes-grid rev">
  @foreach($clientSectors as $i => $sector)
  @php $sectorLogos = $items->filter(fn($item) => (int)$item->data('sector', 0) === $i) ?? collect(); @endphp
  @if($sectorLogos->count() > 0)
  <article class="sp-clientes-sector">
    <h3>{{ $sector['name'] ?? ($sector['sector'] ?? '') }}</h3>
    <div class="sp-logo-strip">
      @foreach($sectorLogos as $logo)
      @php
      $img = $logo->data('image', '');
      $src = cms_asset($img);
      @endphp
      <div class="sp-logo-cell">
        <img src="{{ $src }}" alt="{{ $logo->data('alt') }}" class="sp-official-logo sp-official-logo--client" loading="lazy">
      </div>
      @endforeach
    </div>
  </article>
  @endif
  @endforeach
</div>
@else
@php $sectores = config('softura-content.clientes', []); @endphp
<div class="sp-clientes-grid rev">
  @foreach($sectores as $sector)
  <article class="sp-clientes-sector">
    <h3>{{ $sector['sector'] }}</h3>
    <div class="sp-logo-strip">
      @foreach($sector['logos'] as $logo)
      <div class="sp-logo-cell">
        @include('partials.official-logo', [
          'file' => $logo['file'] ?? null,
          'cdn' => $logo['cdn'] ?? null,
          'alt' => $logo['alt'] ?? '',
          'class' => 'sp-official-logo sp-official-logo--client',
        ])
      </div>
      @endforeach
    </div>
  </article>
  @endforeach
</div>
@endif

