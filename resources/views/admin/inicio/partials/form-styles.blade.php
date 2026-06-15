@php $accent = $accent ?? '#1d6fdb'; @endphp
<style>
    .form-page-header { display:flex;align-items:center;gap:14px;margin-bottom:28px;padding-bottom:20px;border-bottom:1px solid #e2e8f0; }
    .fph-icon { width:46px;height:46px;border-radius:12px;background:{{ $accent }}15;color:{{ $accent }};display:flex;align-items:center;justify-content:center;font-size:18px; }
    .fph-text h2 { font-size:19px;font-weight:700;color:#0f172a;margin:0 0 2px; }
    .fph-text p  { font-size:12px;color:#94a3b8;margin:0; }
    .fph-back { margin-left:auto;display:inline-flex;align-items:center;gap:7px;padding:8px 16px;border-radius:8px;font-size:13px;font-weight:600;color:#475569;background:#f1f5f9;border:1px solid #e2e8f0;text-decoration:none;transition:all .15s; }
    .fph-back:hover { background:#e2e8f0; }
    .alert-success { display:flex;align-items:center;gap:10px;background:#f0fdf4;border:1px solid #bbf7d0;border-radius:10px;padding:13px 18px;margin-bottom:22px;font-size:13.5px;font-weight:500;color:#15803d; }
    .editor-layout { display:grid;grid-template-columns:1fr 300px;gap:22px;align-items:start; }
    .form-card { background:white;border:1px solid #e2e8f0;border-radius:14px;overflow:hidden;margin-bottom:18px; }
    .form-card-header { padding:16px 22px;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;gap:10px; }
    .form-card-header h3 { font-size:14px;font-weight:700;color:#0f172a;margin:0; }
    .form-card-body { padding:22px; }
    .field-group { margin-bottom:20px; }
    .field-group:last-child { margin-bottom:0; }
    .field-label { display:block;font-size:12.5px;font-weight:600;color:#374151;margin-bottom:5px; }
    .field-hint  { font-size:11px;color:#9ca3af;margin-bottom:6px;display:block; }
    .field-input { width:100%;padding:10px 13px;border-radius:8px;border:1px solid #d1d5db;font-size:13.5px;color:#1e293b;transition:border-color .15s,box-shadow .15s;background:#fafafa;outline:none;box-sizing:border-box; }
    .field-input:focus { border-color:{{ $accent }};box-shadow:0 0 0 3px {{ $accent }}14;background:white; }
    textarea.field-input { resize:vertical;min-height:100px;line-height:1.55; }
    .upload-area { border:2px dashed #d1d5db;border-radius:10px;padding:20px;text-align:center;cursor:pointer;transition:all .15s;background:#fafafa; }
    .upload-area:hover { border-color:{{ $accent }};background:{{ $accent }}08; }
    .upload-area input[type="file"] { display:none; }
    .upload-area i { font-size:22px;color:#cbd5e1;margin-bottom:8px;display:block; }
    .upload-area p { font-size:12px;color:#94a3b8;margin:0; }
    .visibility-card { background:white;border:1px solid #e2e8f0;border-radius:14px;overflow:hidden;margin-bottom:16px; }
    .visibility-card-top { height:4px;background:linear-gradient(90deg,{{ $accent }},{{ $accent }}aa); }
    .visibility-body { padding:18px 20px; }
    .visibility-row { display:flex;align-items:center;justify-content:space-between;gap:12px; }
    .visibility-info h4 { font-size:13px;font-weight:700;color:#0f172a;margin:0 0 2px; }
    .visibility-info p  { font-size:11.5px;color:#94a3b8;margin:0; }
    .toggle-wrap { display:flex;align-items:center;gap:8px;flex-shrink:0; }
    .toggle-label { font-size:12px;font-weight:600;color:#64748b;min-width:24px;text-align:right; }
    .switch { position:relative;display:inline-block;width:48px;height:26px; }
    .switch input { opacity:0;width:0;height:0; }
    .slider { position:absolute;cursor:pointer;top:0;left:0;right:0;bottom:0;background:#e2e8f0;border-radius:26px;transition:background .2s; }
    .slider::before { position:absolute;content:"";height:20px;width:20px;left:3px;bottom:3px;background:white;border-radius:50%;transition:transform .2s;box-shadow:0 1px 4px rgba(0,0,0,.18); }
    .switch input:checked + .slider { background:{{ $accent }}; }
    .switch input:checked + .slider::before { transform:translateX(22px); }
    .preview-card { background:white;border:1px solid #e2e8f0;border-radius:14px;overflow:hidden;margin-bottom:16px; }
    .preview-card-header { padding:13px 18px;border-bottom:1px solid #f1f5f9;font-size:13px;font-weight:700;color:#0f172a;display:flex;align-items:center;gap:8px; }
    .preview-img-wrap { position:relative;height:180px;overflow:hidden;background:#f1f5f9; }
    .preview-img-wrap img { width:100%;height:100%;object-fit:cover; }
    .save-bar { background:white;border:1px solid #e2e8f0;border-radius:14px;padding:18px 24px;display:flex;align-items:center;justify-content:space-between;margin-top:20px; }
    .save-bar p { font-size:12px;color:#94a3b8;margin:0; }
    .btn-save { display:inline-flex;align-items:center;gap:8px;padding:10px 24px;border-radius:9px;background:{{ $accent }};color:white;font-size:13.5px;font-weight:700;border:none;cursor:pointer;transition:filter .15s,transform .1s; }
    .btn-save:hover { filter:brightness(1.1);transform:translateY(-1px); }
    .item-row { display:grid;gap:10px;padding:14px;background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;margin-bottom:10px;position:relative; }
    .item-row-remove { position:absolute;top:8px;right:8px;width:24px;height:24px;border-radius:50%;background:#fee2e2;color:#ef4444;border:none;cursor:pointer;font-size:11px; }
    .btn-add-item { width:100%;padding:10px;border-radius:10px;border:2px dashed #d1d5db;background:#f8fafc;font-size:13px;font-weight:600;color:#94a3b8;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:8px; }
    .btn-add-item:hover { border-color:{{ $accent }};color:{{ $accent }}; }
</style>
