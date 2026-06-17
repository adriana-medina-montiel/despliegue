@extends('layouts.web')

@section('title', 'Softura Solutions')

@push('head-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
@endpush

@push('styles')
<link rel="stylesheet" href="/css/estilos.css">
@endpush

@section('content')

<section class="hero" id="hero-section">
  <canvas id="three-hero"></canvas>
  <div class="hero-content">
    <div class="hero-badge">
      <span class="badge-dot"></span>
      Softura Solutions
    </div>
    <h1>Software<br><em>a la</em><br>medida</h1>
    <p class="hero-sub">
      Impulsamos la evolución de tu empresa con tecnología de alto rendimiento diseñada para el mercado actual.
    </p>
  </div>
</section>

<section class="stats-section">

  <div class="stats-header">
    <h2><span class="section-tag">NUESTROS RESULTADOS</span></h2>
  </div>
  <div class="stats rev">
    <div class="stat">
      <div class="stat-n" data-target="120" data-suffix="+">0</div>
      <div class="stat-l">Proyectos entregados</div>
    </div>

    <div class="stat">
      <div class="stat-n" data-target="98" data-suffix="%">0</div>
      <div class="stat-l">Satisfacción de clientes</div>
    </div>

    <div class="stat">
      <div class="stat-n" data-target="40" data-suffix="+">0</div>
      <div class="stat-l">Expertos en el equipo</div>
    </div>

    <div class="stat">
      <div class="stat-n" data-target="5" data-suffix="+">0</div>
      <div class="stat-l">Años de experiencia</div>
    </div>
  </div>

</section>

<section class="section" id="servicios">
  <div class="services-bg"></div>
  <div class="services-head rev">
    <h2>
      Potenciamos la competitividad de tu empresa con <span>soluciones tecnológicas</span> eficientes.
    </h2>
    <p class="services-sub">Desarrollamos software a la medida, aplicaciones y plataformas digitales que impulsan tu negocio al siguiente nivel.</p>
  </div>
  <div class="services-grid">
    <div class="svc rev">
      <div class="svc-num">01</div>
      <div class="svc-icon">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <defs><linearGradient id="medidaGrad" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" stop-color="#6366f1"/><stop offset="100%" stop-color="#8b5cf6"/></linearGradient></defs>
          <path d="M21 6V3h-3M3 18v3h3M3 6v12h12" stroke="#64748b" stroke-width="1.5" stroke-linecap="round"/>
          <rect x="10" y="7" width="8" height="8" rx="1.5" fill="url(#medidaGrad)" stroke="#6366f1" stroke-width="1"/>
          <path d="M14 7v8M10 11h8" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
      </div>
      <h3 class="svc-title">Software a la medida</h3>
      <p class="svc-desc">Apps web y móviles construidas desde cero. Código limpio, arquitectura escalable y entrega continua.</p>
    </div>
    <div class="svc rev" style="transition-delay:.1s">
      <div class="svc-num">02</div>
      <div class="svc-icon">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <defs><linearGradient id="maquilaGrad" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" stop-color="#10b981"/><stop offset="100%" stop-color="#06b6d4"/></linearGradient></defs>
          <rect x="2" y="4" width="8" height="5" rx="1" fill="url(#maquilaGrad)"/>
          <rect x="14" y="4" width="8" height="5" rx="1" fill="url(#maquilaGrad)"/>
          <rect x="8" y="15" width="8" height="5" rx="1" fill="url(#maquilaGrad)"/>
          <path d="M6 9v3h4M18 9v3h-4M12 12v3" stroke="#10b981" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="2 2"/>
        </svg>
      </div>
      <h3 class="svc-title">Maquila de software</h3>
      <p class="svc-desc">Desarrollo de software a bajo costo, manteniendo calidad, escalabilidad y tiempos de entrega rápidos.</p>
    </div>
    <div class="svc rev" style="transition-delay:.2s">
      <div class="svc-num">03</div>
      <div class="svc-icon">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <defs><linearGradient id="appsGrad" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" stop-color="#f59e0b"/><stop offset="100%" stop-color="#ef4444"/></linearGradient></defs>
          <rect x="5" y="2" width="14" height="20" rx="3" stroke="#475569" stroke-width="1.5"/>
          <rect x="6.5" y="3.5" width="11" height="17" rx="1.5" fill="url(#appsGrad)" opacity=".15"/>
          <path d="M9 11l-2 2 2 2M15 11l2 2-2 2" stroke="#f59e0b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
      <h3 class="svc-title">Desarrollo de apps</h3>
      <p class="svc-desc">Aplicaciones móviles y web desarrolladas con tecnologías modernas para brindar experiencias rápidas y atractivas.</p>
    </div>
  </div>
</section>

<section id="ecosistema" class="rev" style="position:relative;z-index:10;background:#000000;color:#fff;padding:6rem 0;overflow:hidden;font-family:'Inter',sans-serif;">
  <div style="position:absolute;top:-10%;left:-10%;width:50vw;height:50vw;background:radial-gradient(circle,rgba(26,79,255,0.15) 0%,transparent 70%);pointer-events:none;"></div>
  <div style="position:absolute;bottom:-10%;right:-10%;width:40vw;height:40vw;background:radial-gradient(circle,rgba(255,255,255,0.1) 0%,transparent 70%);pointer-events:none;"></div>
  
  <div style="max-width:1300px;margin:0 auto;padding:0 5vw;display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:4rem;align-items:center;">
    <div style="display:flex;flex-direction:column;gap:2rem;">
      <h2 style="font-size:clamp(2.2rem,4vw,3.2rem);font-family:'Syne',sans-serif;font-weight:800;line-height:1.15;margin:0;color:#ffffff;">
        Respaldados por un<br><span style="background:linear-gradient(90deg,#00C6FF,#0072FF);-webkit-background-clip:text;-webkit-text-fill-color:transparent;font-weight:900;">ecosistema tecnológico</span>
      </h2>
      <p style="color:#94A3B8;font-size:1.05rem;line-height:1.6;margin:0;">
        Nuestro equipo base está conformado por más de 30 profesionales especializados. Como socios fundadores y miembros honoríficos del <strong>Clúster de TI de Tlaxcala</strong>, extendemos nuestras capacidades de inmediato.
      </p>
    </div>

    <div style="position:relative;height:550px;display:flex;align-items:center;justify-content:center;flex:1;min-width:350px;">
      <div style="position:absolute;border:1px dashed rgba(26,79,255,0.2);border-radius:50%;width:320px;height:320px;animation:spin 40s linear infinite;"></div>
      <div style="position:absolute;border:1px solid rgba(255,255,255,0.05);border-radius:50%;width:460px;height:460px;"></div>
      
      <div id="eco-core" style="position:relative;z-index:5;width:200px;height:200px;background:#fff;border-radius:50%;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:1.5rem;text-align:center;color:#030816;box-shadow:0 0 40px rgba(26,79,255,0.4);border:6px solid rgba(26,79,255,0.15);transition:all 0.4s ease;">
        <div id="core-logo-area" style="height:45px;display:flex;align-items:center;margin-bottom:0.5rem;font-family:'Syne',sans-serif;font-weight:800;font-size:1.1rem;color:#1A4FFF;">SOFTURA</div>
        <p id="core-desc" style="font-size:0.75rem;color:#475569;line-height:1.3;margin:0;font-weight:500;">Pasa el cursor sobre un aliado para explorar.</p>
      </div>

      <div class="sat-node" data-title="Innovación" data-desc="Impulsando la tecnología." data-img="/img/Imagen1.png" data-color="#ffffff" style="position:absolute;top:5%;background:#fff;border-radius:50%;padding:10px;width:70px;height:70px;display:flex;align-items:center;justify-content:center;cursor:pointer;box-shadow:0 10px 25px rgba(0,0,0,0.3);transition:all 0.3s ease;z-index:6;"><img src="/img/Imagen1.png" style="width:70%;height:70%;object-fit:contain;"></div>
      <div class="sat-node" data-title="Industria TI" data-desc="Fortaleciendo el sector." data-img="/img/Imagen2.png" data-color="#454545" style="position:absolute;top:25%;right:5%;background:#454545;border-radius:50%;padding:10px;width:70px;height:70px;display:flex;align-items:center;justify-content:center;cursor:pointer;box-shadow:0 10px 25px rgba(0,0,0,0.3);transition:all 0.3s ease;z-index:6;"><img src="/img/Imagen2.png" style="width:70%;height:70%;object-fit:contain;"></div>
      <div class="sat-node" data-title="Impacto Social" data-desc="Justicia y prosperidad." data-img="/img/Imagen3.png" data-color="#ffffff" style="position:absolute;bottom:25%;right:5%;background:#fff;border-radius:50%;padding:10px;width:70px;height:70px;display:flex;align-items:center;justify-content:center;cursor:pointer;box-shadow:0 10px 25px rgba(0,0,0,0.3);transition:all 0.3s ease;z-index:6;"><img src="/img/Imagen3.png" style="width:70%;height:70%;object-fit:contain;"></div>
      <div class="sat-node" data-title="Software" data-desc="Clase mundial." data-img="/img/Imagen4.png" data-color="#ffffff" style="position:absolute;bottom:5%;background:#fff;border-radius:50%;padding:10px;width:70px;height:70px;display:flex;align-items:center;justify-content:center;cursor:pointer;box-shadow:0 10px 25px rgba(0,0,0,0.3);transition:all 0.3s ease;z-index:6;"><img src="/img/Imagen4.png" style="width:70%;height:70%;object-fit:contain;"></div>
      <div class="sat-node" data-title="Digital" data-desc="Transformación total." data-img="/img/Imagen5.png" data-color="#3f3e3e" style="position:absolute;bottom:25%;left:5%;background:#3f3e3e;border-radius:50%;padding:10px;width:70px;height:70px;display:flex;align-items:center;justify-content:center;cursor:pointer;box-shadow:0 10px 25px rgba(0,0,0,0.3);transition:all 0.3s ease;z-index:6;"><img src="/img/Imagen5.png" style="width:70%;height:70%;object-fit:contain;"></div>
      <div class="sat-node" data-title="Soluciones" data-desc="Tecnología avanzada." data-img="/img/Imagen1.1.png" data-color="#383838" style="position:absolute;top:25%;left:5%;background:#383838;border-radius:50%;padding:10px;width:70px;height:70px;display:flex;align-items:center;justify-content:center;cursor:pointer;box-shadow:0 10px 25px rgba(0,0,0,0.3);transition:all 0.3s ease;z-index:6;"><img src="/img/Imagen1.1.png" style="width:70%;height:70%;object-fit:contain;"></div>
    </div>
  </div>

  <style>
    @keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
    .sat-node:hover { transform: scale(1.15); }
  </style>

  <script>
    const core = document.getElementById('eco-core');
    const logoArea = document.getElementById('core-logo-area');
    const desc = document.getElementById('core-desc');
    const nodes = document.querySelectorAll('.sat-node');

    nodes.forEach(node => {
      node.addEventListener('mouseover', () => {
        logoArea.innerHTML = `<img src="${node.getAttribute('data-img')}" style="height:100%; object-fit:contain;">`;
        desc.innerHTML = `<strong>${node.getAttribute('data-title')}</strong><br>${node.getAttribute('data-desc')}`;
        
        const color = node.getAttribute('data-color');
        core.style.backgroundColor = color;
        const isDark = (color !== '#ffffff');
        core.style.color = isDark ? '#ffffff' : '#030816';
        desc.style.color = isDark ? '#cccccc' : '#475569';
      });

      node.addEventListener('mouseout', () => {
        logoArea.innerHTML = 'SOFTURA';
        desc.innerText = 'Pasa el cursor sobre un aliado para explorar.';
        core.style.backgroundColor = '#ffffff';
        core.style.color = '#030816';
        desc.style.color = '#475569';
      });
    });
  </script>
</section>


<section class="section" id="proceso">
  <div class="process-wrap">
    <div class="process-header rev">
      <h2>Con nuestros modelos de externalización,<br>seremos tus verdaderos <strong>aliados de negocio</strong></h2>
    </div>
    <div class="process-cards rev">
      <div class="p-card">
        <div class="p-icon-wrap">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/>
          </svg>
        </div>
        <h3>Onshoring</h3>
        <p>Nuestros ingenieros trabajan directamente en tus instalaciones ubicadas en México cuando así se requiera.</p>
      </div>
      <div class="p-card">
        <div class="p-icon-wrap">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>
          </svg>
        </div>
        <h3>Nearshoring</h3>
        <p>Nuestros ingenieros trabajan remotamente en proyectos para tu empresa ubicada en E.U.A o Latinoamérica.</p>
      </div>
    </div>
    <div class="process-footer rev">
      <p>Hagamos equipo y <strong>deja de preocuparte</strong> de los costos de reclutamiento, selección, capacitación y continuidad del personal.</p>
    </div>
  </div>
</section>

<section class="stack-section" id="stack">
  <div class="products-top rev">
    <div class="sec-label">PRODUCTOS</div>
    <h2>Descubre nuestros productos y potencia el éxito de tu organización</h2>
    <p class="products-sub">Soluciones diseñadas para optimizar procesos, automatizar tareas y acelerar el crecimiento de tu empresa.</p>
  </div>
  <div class="stack-grid">
    <div class="stack-tag rev">
      <div class="prod-icon"><img src="/img/bituyu1.png" alt="Bituyú"></div>
      <div><h3>Bituyú</h3><p>Gestión moderna y automatización empresarial.</p></div>
    </div>
    <div class="stack-tag rev">
      <div class="prod-icon"><img src="/img/binibia.png" alt="Binibiaa"></div>
      <div><h3>Binibiaa</h3><p>Soluciones inteligentes para procesos digitales.</p></div>
    </div>
    <div class="stack-tag rev">
      <div class="prod-icon"><img src="/img/academica2.png" alt="academica"></div>
      <div><h3>Academica</h3><p>Soluciones inteligentes para procesos digitales.</p></div>
    </div>
    <div class="stack-tag rev">
      <div class="prod-icon"><img src="/img/siga2.png" alt="siga"></div>
      <div><h3>SIGA</h3><p>Soluciones inteligentes para procesos digitales.</p></div>
    </div>
    <div class="stack-tag rev">
      <div class="prod-icon"><img src="/img/fenix2.png" alt="fenix"></div>
      <div><h3>Fenix Admin</h3><p>Soluciones inteligentes para procesos digitales.</p></div>
    </div>
    <div class="stack-tag rev">
      <div class="prod-icon"><img src="/img/pbr.png" alt="pbr"></div>
      <div><h3>Mi PBR</h3><p>Soluciones inteligentes para procesos digitales.</p></div>
    </div>
    <div class="stack-tag rev">
      <div class="prod-icon"><img src="/img/sspip2.png" alt="sspip"></div>
      <div><h3>SSPIP</h3><p>Soluciones inteligentes para procesos digitales.</p></div>
    </div>
  </div>
</section>

<section class="cta-section" id="contacto-cta" style="position:relative;z-index:10;background:#020714;padding:5rem 5vw;color:#fff;font-family:'Inter',sans-serif;">
  <div class="rev" style="max-width:1200px;margin:0 auto;display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:4rem;align-items:center;">
    <div>
      <div class="sec-label" style="color:#1A4FFF;text-transform:uppercase;letter-spacing:2px;font-weight:600;margin-bottom:1rem;font-size:0.9rem;">Contacto</div>
      <h2 style="font-family:'Syne',sans-serif;font-size:clamp(2.2rem,4vw,3.5rem);font-weight:800;line-height:1.2;margin-bottom:1.5rem;">
        Emprende este <br>viaje <span style="color:#1A4FFF;">con nosotros</span>
      </h2>
      <p style="color:#94a3b8;font-size:1.1rem;line-height:1.6;max-width:480px;margin-bottom:3.5rem;">
        Cuéntanos tu idea y construyamos juntos soluciones tecnológicas que impulsen tu negocio.
      </p>
    </div>
    <div style="background:rgba(255,255,255,0.02);border:1px solid rgba(255,255,255,0.05);backdrop-filter:blur(10px);padding:2.5rem;border-radius:24px;box-shadow:0 30px 60px rgba(0,0,0,0.4);">
      <form data-contact novalidate style="display:flex;flex-direction:column;gap:1.2rem;">
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1.2rem;">
          <input type="text" name="nombre" placeholder="Nombre completo" required style="width:100%;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.08);padding:0.9rem 1rem;border-radius:10px;color:#fff;font-family:inherit;font-size:0.9rem;outline:none;box-sizing:border-box;">
          <input type="text" name="empresa" placeholder="Empresa (opcional)" style="width:100%;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.08);padding:0.9rem 1rem;border-radius:10px;color:#fff;font-family:inherit;font-size:0.9rem;outline:none;box-sizing:border-box;">
        </div>
        <input type="email" name="email" placeholder="Correo electrónico" required style="width:100%;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.08);padding:0.9rem 1rem;border-radius:10px;color:#fff;font-family:inherit;font-size:0.9rem;outline:none;box-sizing:border-box;">
        <input type="tel" name="telefono" placeholder="Teléfono (opcional)" style="width:100%;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.08);padding:0.9rem 1rem;border-radius:10px;color:#fff;font-family:inherit;font-size:0.9rem;outline:none;box-sizing:border-box;">
        <textarea name="mensaje" placeholder="Cuéntanos sobre tu proyecto..." rows="4" required style="width:100%;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.08);padding:0.9rem 1rem;border-radius:10px;color:#fff;font-family:inherit;font-size:0.9rem;outline:none;resize:none;box-sizing:border-box;display:block;"></textarea>
        <button type="submit" style="width:100%;background:linear-gradient(90deg,#1A4FFF 0%,#3b82f6 100%);color:#fff;border:none;padding:1rem;border-radius:10px;font-family:inherit;font-weight:600;font-size:1rem;cursor:pointer;">
          Enviar mensaje
        </button>
      </form>
    </div>
  </div>
</section>

<a href="#hero-section" class="boton-volver-arriba">&uarr;</a>

@endsection

@push('scripts')
<script>
(function(){
  const canvas = document.getElementById('three-hero');
  const section = document.getElementById('hero-section');
  if(!canvas||!section) return;
  const renderer = new THREE.WebGLRenderer({canvas,alpha:true,antialias:true});
  renderer.setPixelRatio(Math.min(window.devicePixelRatio,2));
  renderer.setClearColor(0x000000,0);
  function resize(){renderer.setSize(section.offsetWidth,section.offsetHeight);camera.aspect=section.offsetWidth/section.offsetHeight;camera.updateProjectionMatrix();}
  const scene=new THREE.Scene();
  const camera=new THREE.PerspectiveCamera(60,1,0.1,100);
  camera.position.set(0,0,8);
  resize();
  window.addEventListener('resize',resize);
  scene.add(new THREE.AmbientLight(0xffffff,0.4));
  const dLight=new THREE.DirectionalLight(0x1A4FFF,1.5);dLight.position.set(5,5,5);scene.add(dLight);
  const dLight2=new THREE.DirectionalLight(0x00C9A7,1);dLight2.position.set(-5,-3,3);scene.add(dLight2);
  const wireMat=new THREE.MeshPhongMaterial({color:0x1A4FFF,wireframe:true,transparent:true,opacity:0.25});
  const objects=[];
  const mainSphere=new THREE.Mesh(new THREE.IcosahedronGeometry(1.8,3),wireMat.clone());mainSphere.material.opacity=0.15;scene.add(mainSphere);objects.push({mesh:mainSphere,rx:.003,ry:.005});
  const innerIco=new THREE.Mesh(new THREE.IcosahedronGeometry(1,1),new THREE.MeshPhongMaterial({color:0xEEF2FF,transparent:true,opacity:0.6,shininess:120}));scene.add(innerIco);objects.push({mesh:innerIco,rx:.006,ry:-.004});
  for(let i=0;i<3;i++){const ring=new THREE.Mesh(new THREE.TorusGeometry(2.5+i*.5,0.015,16,120),new THREE.MeshPhongMaterial({color:i===0?0x1A4FFF:i===1?0x00C9A7:0x6B6B80,transparent:true,opacity:0.5-i*.1}));ring.rotation.x=Math.PI/2*(i*.7+.5);ring.rotation.y=i*.8;scene.add(ring);objects.push({mesh:ring,rx:i%2===0?.004:-.003,ry:i%2===0?-.003:.005});}
  const orbiters=[];
  [{r:3.2,speed:.008,phase:0,y:.5,geo:new THREE.OctahedronGeometry(.18)},{r:3.5,speed:-.006,phase:2.1,y:-.4,geo:new THREE.TetrahedronGeometry(.15)},{r:2.8,speed:.01,phase:4.2,y:.8,geo:new THREE.OctahedronGeometry(.12)}].forEach(d=>{const m=new THREE.Mesh(d.geo,new THREE.MeshPhongMaterial({color:Math.random()>.5?0x1A4FFF:0x00C9A7,transparent:true,opacity:.8,shininess:100}));scene.add(m);orbiters.push({mesh:m,...d,t:d.phase});});
  const ptGeo=new THREE.BufferGeometry();const ptPos=new Float32Array(450);for(let i=0;i<450;i++)ptPos[i]=(Math.random()-.5)*20;ptGeo.setAttribute('position',new THREE.BufferAttribute(ptPos,3));scene.add(new THREE.Points(ptGeo,new THREE.PointsMaterial({color:0x1A4FFF,size:.04,transparent:true,opacity:.4})));
  const gridHelper=new THREE.GridHelper(20,30,0x1A4FFF,0xE4E4EE);gridHelper.material.transparent=true;gridHelper.material.opacity=0.15;gridHelper.position.y=-4;scene.add(gridHelper);
  let mox=0,moy=0;document.addEventListener('mousemove',e=>{mox=(e.clientX/window.innerWidth-.5)*2;moy=(e.clientY/window.innerHeight-.5)*2;});
  function animate(){requestAnimationFrame(animate);objects.forEach(o=>{o.mesh.rotation.x+=o.rx;o.mesh.rotation.y+=o.ry;});orbiters.forEach(o=>{o.t+=o.speed;o.mesh.position.x=Math.cos(o.t)*o.r;o.mesh.position.z=Math.sin(o.t)*o.r;o.mesh.position.y=o.y+Math.sin(o.t*2)*.3;o.mesh.rotation.x+=.02;o.mesh.rotation.y+=.015;});camera.position.x+=(mox*1.5-camera.position.x)*.04;camera.position.y+=(-moy*1-camera.position.y)*.04;camera.lookAt(0,0,0);renderer.render(scene,camera);}
  animate();
})();

document.addEventListener("DOMContentLoaded",()=>{
  const nodes=document.querySelectorAll('.sat-node');
  const core=document.getElementById('eco-core');
  const coreLogo=document.getElementById('core-logo-placeholder');
  const coreDesc=document.getElementById('core-desc');
  const defaultTitle=coreLogo.innerHTML;
  const defaultDesc=coreDesc.innerHTML;
  nodes.forEach(node=>{
    node.addEventListener('mouseenter',()=>{
      core.style.borderColor="#1A4FFF";core.style.boxShadow="0 0 50px rgba(26,79,255,0.6)";
      coreLogo.innerHTML=`<img src="${node.getAttribute('data-img')}" style="max-height:100%;max-width:100%;object-fit:contain;">`;
      coreDesc.innerHTML=`<strong>${node.getAttribute('data-title')}</strong><br>${node.getAttribute('data-desc')}`;
    });
    node.addEventListener('mouseleave',()=>{core.style.borderColor="rgba(26,79,255,0.15)";core.style.boxShadow="0 0 40px rgba(26,79,255,0.4)";coreLogo.innerHTML=defaultTitle;coreDesc.innerHTML=defaultDesc;});
  });
});

</script>
@endpush
