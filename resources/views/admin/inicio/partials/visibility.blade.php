<div class="visibility-card">
    <div class="visibility-card-top"></div>
    <div class="visibility-body">
        <div class="visibility-row">
            <div class="visibility-info">
                <h4>Visibilidad</h4>
                <p>Muestra u oculta esta sección.</p>
            </div>
            <div class="toggle-wrap">
                <span class="toggle-label" id="vis-label">{{ $section->is_visible ? 'Sí' : 'No' }}</span>
                <label class="switch">
                    <input type="checkbox" name="is_visible" {{ $section->is_visible ? 'checked' : '' }} onchange="document.getElementById('vis-label').textContent=this.checked?'Sí':'No'">
                    <span class="slider"></span>
                </label>
            </div>
        </div>
    </div>
</div>
