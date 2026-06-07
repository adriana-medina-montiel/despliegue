<style>
    .pg-header {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 28px;
        padding-bottom: 20px;
        border-bottom: 1px solid #e2e8f0;
    }
    .pg-header-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
        background: {{ $color_bg }};
        color: {{ $color }};
    }
    .pg-header-text h2 {
        font-size: 20px;
        font-weight: 700;
        color: #0f172a;
        margin: 0 0 3px;
    }
    .pg-header-text .route {
        font-size: 12px;
        color: #94a3b8;
        font-family: ui-monospace, monospace;
    }
    .pg-header-text .route span {
        color: {{ $color }};
    }

    .pg-back-btn {
        margin-left: auto;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        color: #475569;
        background: #f1f5f9;
        border: 1px solid #e2e8f0;
        text-decoration: none;
        transition: all 0.15s;
    }
    .pg-back-btn:hover { background: #e2e8f0; color: #1e293b; }

    .pg-coming-soon {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        overflow: hidden;
    }
    .pg-coming-top {
        height: 5px;
        background: linear-gradient(90deg, {{ $color }}, {{ $color }}aa);
    }
    .pg-coming-body {
        padding: 48px 40px;
        text-align: center;
    }
    .pg-coming-body .big-icon {
        width: 70px;
        height: 70px;
        border-radius: 18px;
        background: {{ $color_bg }};
        color: {{ $color }};
        font-size: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
    }
    .pg-coming-body h3 {
        font-size: 18px;
        font-weight: 700;
        color: #0f172a;
        margin: 0 0 8px;
    }
    .pg-coming-body p {
        font-size: 14px;
        color: #64748b;
        max-width: 420px;
        margin: 0 auto 32px;
        line-height: 1.6;
    }

    .pg-sections-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 12px;
        max-width: 700px;
        margin: 0 auto;
        text-align: left;
    }
    .pg-section-chip {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 14px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 500;
        color: #334155;
    }
    .pg-section-chip i {
        font-size: 11px;
        color: {{ $color }};
        opacity: 0.8;
    }
    .pg-chip-badge {
        margin-left: auto;
        font-size: 10px;
        background: #f1f5f9;
        color: #94a3b8;
        padding: 2px 7px;
        border-radius: 10px;
        font-weight: 600;
    }
</style>

<div class="pg-header">
    <div class="pg-header-icon"><i class="{{ $icon }}"></i></div>
    <div class="pg-header-text">
        <h2>{{ $title }}</h2>
        <div class="route">softurasolutions.com<span>{{ $route_label }}</span></div>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="pg-back-btn">
        <i class="fas fa-arrow-left"></i> Volver al dashboard
    </a>
</div>

<div class="pg-coming-soon">
    <div class="pg-coming-top"></div>
    <div class="pg-coming-body">
        <div class="big-icon"><i class="{{ $icon }}"></i></div>
        <h3>Editor de {{ $title }}</h3>
        <p>Este módulo está en construcción. Pronto podrás editar todas las secciones de esta página directamente desde aquí.</p>
        <div class="pg-sections-grid">
            @foreach($sections as $section)
            <div class="pg-section-chip">
                <i class="fas fa-layer-group"></i>
                {{ $section }}
                <span class="pg-chip-badge">Pronto</span>
            </div>
            @endforeach
        </div>
    </div>
</div>
