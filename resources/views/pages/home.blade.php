@extends('layouts.app')
@section('title', 'Beranda')

@push('styles')
<style>
/* ── HERO ─────────────────────────────────── */
#beranda {
  background: var(--off-white);
  position: relative;
  overflow: hidden;
  padding: 80px 0 0;
  min-height: calc(100vh - 106px);
  display: flex;
  align-items: center;
}
#beranda::before {
  content: '';
  position: absolute;
  top: -80px; right: -80px;
  width: 500px; height: 500px;
  background: radial-gradient(circle, rgba(247,201,0,.18) 0%, transparent 70%);
  border-radius: 50%;
  pointer-events: none;
}
.hero-grid-bg {
  position: absolute; inset: 0;
  background-image: linear-gradient(rgba(13,27,75,.04) 1px,transparent 1px),linear-gradient(90deg,rgba(13,27,75,.04) 1px,transparent 1px);
  background-size: 48px 48px;
  pointer-events: none;
}
.hero-badge {
  display: inline-flex; align-items: center; gap: 8px;
  background: var(--white); border: 1.5px solid rgba(13,27,75,.12);
  border-radius: 40px; padding: 7px 16px 7px 10px;
  margin-bottom: 28px; box-shadow: var(--shadow-sm); font-size: .78rem;
}
.hero-badge .badge-dot { width: 24px; height: 24px; background: var(--yellow); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: .65rem; color: var(--navy-dark); }
.hero-badge span { color: var(--gray-text); font-weight: 600; font-family: var(--font-head); }
.hero-title { font-size: clamp(2.4rem,5vw,3.6rem); font-weight: 800; line-height: 1.1; color: var(--navy-dark); margin-bottom: 24px; }
.hero-title .highlight { color: var(--yellow); position: relative; }
.hero-title .highlight::after { content:''; position:absolute; bottom:2px; left:0; right:0; height:4px; background:var(--yellow); border-radius:2px; opacity:.35; }
.hero-desc { font-size: 1.05rem; color: var(--gray-mid); line-height: 1.78; margin-bottom: 36px; max-width: 500px; }
.hero-stats { display: flex; gap: 32px; flex-wrap: wrap; margin-top: 40px; padding-top: 36px; border-top: 1px solid rgba(13,27,75,.1); }
.stat-item .stat-num { font-family: var(--font-head); font-weight: 800; font-size: 2rem; color: var(--navy-dark); line-height: 1; }
.stat-item .stat-num span { color: var(--yellow); }
.stat-item .stat-label { font-size: .75rem; color: var(--gray-mid); margin-top: 4px; font-weight: 500; text-transform: uppercase; letter-spacing: .8px; }

/* Hero visual */
.hero-visual { position: relative; display: flex; align-items: center; justify-content: center; padding-bottom: 40px; }
.hero-hexagon-bg { position: absolute; width: 460px; height: 460px; background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 100%); clip-path: polygon(50% 0%,100% 25%,100% 75%,50% 100%,0% 75%,0% 25%); opacity: .07; animation: hexSpin 20s linear infinite; }
@keyframes hexSpin { to { transform: rotate(360deg); } }
.hero-card-main { background: var(--white); border-radius: var(--radius-lg); box-shadow: var(--shadow-lg); padding: 36px; text-align: center; position: relative; z-index: 2; max-width: 340px; width: 100%; border: 1px solid rgba(13,27,75,.07); }
.hero-logo-large { width: 160px; height: 160px; object-fit: contain; margin: 0 auto 20px; display: block; filter: drop-shadow(0 8px 24px rgba(13,27,75,.2)); animation: logoFloat 4s ease-in-out infinite; }
@keyframes logoFloat { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-10px)} }
.hero-card-title { font-family: var(--font-head); font-weight: 800; font-size: 1.6rem; color: var(--navy-dark); margin-bottom: 4px; }
.hero-card-sub { font-size: .8rem; color: var(--gray-mid); text-transform: uppercase; letter-spacing: 1px; font-weight: 500; }
.hero-card-tagline { margin-top: 16px; font-family: var(--font-head); font-style: italic; font-size: .88rem; color: var(--navy); font-weight: 600; padding: 10px 16px; background: rgba(247,201,0,.15); border-radius: var(--radius-sm); border-left: 3px solid var(--yellow); }
.float-badge { position: absolute; background: var(--white); border-radius: var(--radius-md); box-shadow: var(--shadow-md); padding: 10px 16px; display: flex; align-items: center; gap: 10px; font-family: var(--font-head); font-weight: 700; font-size: .78rem; color: var(--navy-dark); z-index: 3; border: 1px solid rgba(13,27,75,.07); animation: badgeFloat 3s ease-in-out infinite; }
.float-badge .fb-icon { width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 1rem; flex-shrink: 0; }
.float-badge-1 { top: 10%; left: -8%; animation-delay: 0s; }
.float-badge-2 { bottom: 18%; right: -10%; animation-delay: 1.2s; }
.float-badge-3 { top: 58%; left: -12%; animation-delay: .6s; }
@keyframes badgeFloat { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-6px)} }

/* ── VISI MISI ────────────────────────────── */
#visi-misi { background: var(--white); padding: 100px 0; position: relative; overflow: hidden; }
#visi-misi::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, var(--navy) 0%, var(--yellow) 50%, var(--navy) 100%); }
.vm-card { border-radius: var(--radius-lg); padding: 40px 36px; height: 100%; position: relative; overflow: hidden; transition: var(--transition); border: 1.5px solid transparent; }
.vm-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-lg); }
.vm-card-visi { background: linear-gradient(145deg, var(--navy-dark) 0%, var(--navy-mid) 100%); color: white; }
.vm-card-misi { background: var(--white); border-color: rgba(13,27,75,.12); box-shadow: var(--shadow-sm); }
.vm-card::after { content: ''; position: absolute; bottom: -40px; right: -40px; width: 180px; height: 180px; border-radius: 50%; opacity: .07; }
.vm-card-visi::after { background: var(--yellow); }
.vm-card-misi::after { background: var(--navy); }
.vm-icon-wrap { width: 58px; height: 58px; border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-bottom: 24px; position: relative; z-index: 1; }
.vm-card-visi .vm-icon-wrap { background: rgba(247,201,0,.2); color: var(--yellow); }
.vm-card-misi .vm-icon-wrap { background: rgba(13,27,75,.07); color: var(--navy); }
.vm-card-title { font-family: var(--font-head); font-weight: 800; font-size: 1.4rem; margin-bottom: 20px; position: relative; z-index: 1; }
.vm-card-visi .vm-card-title { color: var(--yellow); }
.vm-card-misi .vm-card-title { color: var(--navy-dark); }
.vm-card-text { font-size: .93rem; line-height: 1.8; position: relative; z-index: 1; }
.vm-card-visi .vm-card-text { color: rgba(255,255,255,.82); }
.vm-card-misi .vm-card-text { color: var(--gray-text); }
.misi-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 16px; position: relative; z-index: 1; }
.misi-list li { display: flex; gap: 14px; align-items: flex-start; font-size: .9rem; color: var(--gray-text); line-height: 1.7; }
.misi-num { width: 28px; height: 28px; border-radius: 50%; background: var(--yellow); color: var(--navy-dark); font-family: var(--font-head); font-weight: 800; font-size: .75rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 1px; }
.tagline-banner { background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 100%); border-radius: var(--radius-lg); padding: 40px 48px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 24px; position: relative; overflow: hidden; margin-top: 48px; }
.tagline-banner::before { content: '"'; position: absolute; top: -20px; left: 20px; font-size: 14rem; color: rgba(247,201,0,.08); font-family: Georgia,serif; line-height: 1; pointer-events: none; }
.tagline-text { font-family: var(--font-head); font-weight: 800; font-size: clamp(1.4rem,3vw,2rem); color: var(--white); font-style: italic; }
.tagline-text span { color: var(--yellow); }
.tagline-badge { background: rgba(247,201,0,.15); border: 1.5px solid rgba(247,201,0,.4); color: var(--yellow); font-family: var(--font-head); font-weight: 700; font-size: .8rem; padding: 10px 22px; border-radius: 40px; text-transform: uppercase; letter-spacing: 1.5px; }

/* ── STRUKTUR ─────────────────────────────── */
#struktur { background: var(--off-white); padding: 100px 0; }
.org-card { background: var(--white); border-radius: var(--radius-md); padding: 20px 18px; text-align: center; box-shadow: var(--shadow-sm); border: 1.5px solid rgba(13,27,75,.08); transition: var(--transition); cursor: default; }
.org-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); border-color: var(--yellow); }
.org-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px; border-radius: var(--radius-md) var(--radius-md) 0 0; }
.org-card { position: relative; }
.org-card-top::before { background: var(--yellow); }
.org-card-mid::before { background: var(--navy-mid); }
.org-card-dept::before { background: linear-gradient(90deg, var(--navy-mid), var(--yellow)); }
.org-connector-v { width: 2px; height: 32px; background: linear-gradient(to bottom, var(--navy-mid), rgba(13,27,75,.25)); margin: 0 auto; }
.org-avatar { width: 52px; height: 52px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; margin: 0 auto 12px; }
.org-card-top .org-avatar { background: rgba(247,201,0,.2); color: var(--yellow-deep); }
.org-card-mid .org-avatar { background: rgba(13,27,75,.08); color: var(--navy); }
.org-card-dept .org-avatar { background: rgba(13,27,75,.06); color: var(--navy-mid); }
.org-role { font-family: var(--font-head); font-size: .7rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1.2px; margin-bottom: 4px; }
.org-card-top .org-role { color: var(--yellow-deep); }
.org-card-mid .org-role,.org-card-dept .org-role { color: var(--navy-mid); }
.org-name { font-family: var(--font-head); font-weight: 700; font-size: .88rem; color: var(--navy-dark); line-height: 1.3; }
.org-program-badge { display: inline-block; background: rgba(247,201,0,.18); color: var(--navy-dark); font-family: var(--font-head); font-size: .65rem; font-weight: 700; padding: 3px 10px; border-radius: 20px; margin-top: 8px; }

/* ── DEPT PREVIEW ─────────────────────────── */
#departemen-prev { background: var(--white); padding: 100px 0; }
.dept-card { background: var(--white); border-radius: var(--radius-lg); border: 1.5px solid rgba(13,27,75,.09); padding: 32px 28px; height: 100%; transition: var(--transition); position: relative; overflow: hidden; box-shadow: var(--shadow-sm); }
.dept-card::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 3px; background: linear-gradient(90deg, var(--navy), var(--yellow)); transform: scaleX(0); transform-origin: left; transition: transform .35s ease; }
.dept-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-lg); border-color: rgba(13,27,75,.18); }
.dept-card:hover::after { transform: scaleX(1); }
.dept-num { font-family: var(--font-head); font-weight: 800; font-size: 2.4rem; color: rgba(13,27,75,.06); line-height: 1; margin-bottom: -8px; }
.dept-icon-wrap { width: 52px; height: 52px; background: var(--off-white); border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; font-size: 1.4rem; margin-bottom: 16px; transition: var(--transition); }
.dept-card:hover .dept-icon-wrap { background: var(--yellow); transform: rotate(-6deg); }
.dept-title { font-family: var(--font-head); font-weight: 700; font-size: .95rem; color: var(--navy-dark); margin-bottom: 8px; line-height: 1.35; }
.dept-program { display: inline-flex; align-items: center; gap: 6px; background: rgba(13,27,75,.06); color: var(--navy); font-size: .72rem; font-weight: 600; font-family: var(--font-head); padding: 5px 12px; border-radius: 20px; margin-bottom: 14px; }
.dept-desc { font-size: .82rem; color: var(--gray-mid); line-height: 1.7; }

/* ── CTA JOIN ─────────────────────────────── */
#bergabung { background: linear-gradient(135deg, var(--navy-dark) 0%, var(--navy-mid) 60%, #1a3080 100%); padding: 100px 0; position: relative; overflow: hidden; }
#bergabung::before { content:''; position:absolute; top:-100px; right:-100px; width:600px; height:600px; border-radius:50%; background:radial-gradient(circle,rgba(247,201,0,.12) 0%,transparent 65%); pointer-events:none; }
.join-title { font-family: var(--font-head); font-weight: 800; font-size: clamp(2rem,4.5vw,3rem); color: var(--white); line-height: 1.15; margin-bottom: 20px; }
.join-title span { color: var(--yellow); }
.join-features { list-style: none; padding: 0; margin: 28px 0 40px; display: flex; flex-direction: column; gap: 12px; }
.join-features li { display: flex; align-items: center; gap: 12px; color: rgba(255,255,255,.85); font-size: .9rem; }
.join-features li .check { width: 22px; height: 22px; background: rgba(247,201,0,.2); color: var(--yellow); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: .72rem; flex-shrink: 0; }
</style>
@endpush

@section('content')

{{-- ═══════════ HERO ═══════════ --}}
<section id="beranda">
  <div class="hero-grid-bg"></div>
  <div class="container-xl px-4 py-5 py-lg-0">
    <div class="row align-items-center gy-5">
      <div class="col-lg-6">
        <div class="hero-badge anim-left">
          <span class="badge-dot"><i class="bi bi-star-fill" style="font-size:.6rem"></i></span>
          <span>Himpunan Resmi Mahasiswa Informatika UTS</span>
        </div>
        <h1 class="hero-title anim-left delay-1">
          Bersama <span class="highlight">HMIT</span>,<br>
          <span style="color:var(--navy)">Inovasi Dimulai</span><br>
          Dari Sini
        </h1>
        <p class="hero-desc anim-left delay-2">
          Himpunan Mahasiswa Informatika UTS hadir sebagai wadah pengembangan diri, kreativitas, dan kolaborasi bagi seluruh mahasiswa Informatika UTS.
        </p>
        <div class="d-flex flex-wrap gap-3 anim-left delay-3">
          <a href="{{ route('contact') }}" class="btn-cta"><i class="bi bi-person-plus-fill"></i>Bergabung Sekarang</a>
          <a href="{{ route('about') }}" class="btn-outline-navy">Pelajari Lebih <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="hero-stats anim-fade delay-4">
          <div class="stat-item">
            <div class="stat-num"><span data-count="6" data-suffix="+">6+</span></div>
            <div class="stat-label">Departemen Aktif</div>
          </div>
          <div class="stat-item">
            <div class="stat-num"><span data-count="100" data-suffix="+">100+</span></div>
            <div class="stat-label">Anggota Aktif</div>
          </div>
          <div class="stat-item">
            <div class="stat-num"><span data-count="10" data-suffix="+">10+</span></div>
            <div class="stat-label">Program Kerja</div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="hero-visual anim-right delay-2">
          <div class="hero-hexagon-bg"></div>
          <div class="hero-card-main">
            <img src="{{ asset('assets/logo.png') }}" alt="Logo HMIT" class="hero-logo-large" />
            <div class="hero-card-title">HMIT</div>
            <div class="hero-card-sub">Universitas Teknologi Sumbawa</div>
            <div class="hero-card-tagline">"Dari Inisiatif Menjadi Dampak"</div>
          </div>
          <div class="float-badge float-badge-1 d-none d-lg-flex">
            <div class="fb-icon" style="background:rgba(247,201,0,.15)">🚀</div>
            <div><div style="font-size:.7rem;color:var(--gray-mid);font-weight:500">Program Unggulan</div><div>IT Bootcamp</div></div>
          </div>
          <div class="float-badge float-badge-2 d-none d-lg-flex">
            <div class="fb-icon" style="background:rgba(13,27,75,.08)">⚽</div>
            <div><div style="font-size:.7rem;color:var(--gray-mid);font-weight:500">Event Terbaru</div><div>HMIT Futsal Cup</div></div>
          </div>
          <div class="float-badge float-badge-3 d-none d-lg-flex">
            <div class="fb-icon" style="background:rgba(13,27,75,.08)">🏫</div>
            <div><div style="font-size:.7rem;color:var(--gray-mid);font-weight:500">Program Sosial</div><div>HMIT Go To School</div></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════ VISI MISI ═══════════ --}}
<section id="visi-misi">
  <div class="container-xl px-4">
    <div class="text-center mb-5 anim-up">
      <div class="section-label"><span class="dot"></span>Landasan Organisasi</div>
      <h2 class="section-title" style="font-size:clamp(1.8rem,3.5vw,2.6rem)">Visi &amp; <span>Misi</span> Kami</h2>
      <p class="section-desc mx-auto" style="max-width:520px">Fondasi gerak HMIT dalam mendorong mahasiswa Informatika menjadi generasi yang progresif, kolaboratif, dan berdampak.</p>
    </div>
    <div class="row g-4">
      <div class="col-lg-5 anim-left delay-1">
        <div class="vm-card vm-card-visi">
          <div class="vm-icon-wrap"><i class="bi bi-eye-fill"></i></div>
          <h3 class="vm-card-title">Visi</h3>
          <p class="vm-card-text">Mewujudkan Himpunan Mahasiswa Informatika yang <strong style="color:var(--yellow)">progresif, kolaboratif, dan berdampak</strong> melalui inisiatif-inisiatif inovatif yang relevan dengan perkembangan teknologi dan kebutuhan mahasiswa.</p>
        </div>
      </div>
      <div class="col-lg-7 anim-right delay-2">
        <div class="vm-card vm-card-misi">
          <div class="vm-icon-wrap"><i class="bi bi-rocket-takeoff-fill"></i></div>
          <h3 class="vm-card-title">Misi</h3>
          <ul class="misi-list">
            <li><span class="misi-num">1</span><span>Mendorong budaya inisiatif mahasiswa dalam pengembangan akademik, minat bakat, dan karya teknologi.</span></li>
            <li><span class="misi-num">2</span><span>Menghadirkan program kerja yang inovatif dan relevan guna meningkatkan kolaborasi antar anggota himpunan.</span></li>
            <li><span class="misi-num">3</span><span>Menciptakan lingkungan kerja yang solid, harmonis, dan inklusif dengan tetap mengedepankan profesionalisme.</span></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="tagline-banner anim-up delay-3">
      <div>
        <div style="font-size:.72rem;color:rgba(255,255,255,.45);text-transform:uppercase;letter-spacing:1.5px;font-family:var(--font-head);font-weight:700;margin-bottom:8px">Tagline HMIT</div>
        <div class="tagline-text">"Dari <span>Inisiatif</span> Menjadi <span>Dampak</span>"</div>
      </div>
      <div class="tagline-badge"><i class="bi bi-lightning-charge-fill me-1"></i>HMIT · UTS</div>
    </div>
  </div>
</section>

{{-- ═══════════ STRUKTUR ═══════════ --}}
<section id="struktur">
  <div class="container-xl px-4">
    <div class="text-center mb-5 anim-up">
      <div class="section-label"><span class="dot"></span>Kepengurusan</div>
      <h2 class="section-title" style="font-size:clamp(1.8rem,3.5vw,2.6rem)">Struktur <span>Organisasi</span></h2>
      <p class="section-desc mx-auto" style="max-width:520px">Susunan kepengurusan HMIT yang solid dan profesional.</p>
    </div>
    <div class="d-flex flex-column align-items-center anim-up delay-1">
      <div class="org-card org-card-top" style="width:220px"><div class="org-avatar"><i class="bi bi-person-badge-fill"></i></div><div class="org-role">Pemimpin Utama</div><div class="org-name">Ketua Himpunan</div></div>
      <div class="org-connector-v"></div>
      <div class="org-card org-card-mid" style="width:220px"><div class="org-avatar"><i class="bi bi-person-lines-fill"></i></div><div class="org-role">Pimpinan</div><div class="org-name">Wakil Ketua</div></div>
      <div class="org-connector-v"></div>
      <div class="d-flex gap-4 justify-content-center flex-wrap anim-fade delay-2">
        <div class="org-card org-card-mid" style="width:200px"><div class="org-avatar"><i class="bi bi-file-text-fill"></i></div><div class="org-role">Administrasi</div><div class="org-name">Sekretaris</div></div>
        <div class="org-card org-card-mid" style="width:200px"><div class="org-avatar"><i class="bi bi-cash-stack"></i></div><div class="org-role">Keuangan</div><div class="org-name">Bendahara</div></div>
      </div>
      <div class="org-connector-v"></div>
      <p style="font-family:var(--font-head);font-size:.72rem;font-weight:700;color:var(--gray-mid);text-transform:uppercase;letter-spacing:1.5px;" class="mb-3"><i class="bi bi-diagram-3-fill me-1" style="color:var(--yellow-deep)"></i>Departemen</p>
      <div class="row g-3 w-100 anim-up delay-3" style="max-width:960px">
        @foreach($departments as $dept)
        <div class="col-lg-4 col-md-6">
          <div class="org-card org-card-dept text-center py-3 px-3">
            <div class="org-avatar mx-auto"><i class="bi {{ $dept['icon'] }}"></i></div>
            <div class="org-name" style="font-size:.82rem">{{ $dept['title'] }}</div>
            <span class="org-program-badge">{{ $dept['program'] }}</span>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

{{-- ═══════════ DEPARTEMEN PREVIEW ═══════════ --}}
<section id="departemen-prev">
  <div class="container-xl px-4">
    <div class="text-center mb-5 anim-up">
      <div class="section-label"><span class="dot"></span>Unit Kerja</div>
      <h2 class="section-title" style="font-size:clamp(1.8rem,3.5vw,2.6rem)">Departemen <span>&amp; Program</span></h2>
      <p class="section-desc mx-auto" style="max-width:520px">Program kerja unggulan dari setiap departemen HMIT.</p>
    </div>
    <div class="row g-4">
      @foreach($departments as $i => $dept)
      <div class="col-lg-4 col-md-6 anim-up delay-{{ ($i % 3) + 1 }}">
        <div class="dept-card">
          <div class="dept-num">0{{ $dept['id'] }}</div>
          <div class="dept-icon-wrap"><i class="bi {{ $dept['icon'] }}"></i></div>
          <h4 class="dept-title">{{ $dept['title'] }}</h4>
          <div class="dept-program"><i class="bi bi-star-fill" style="color:var(--yellow-deep);font-size:.65rem"></i>{{ $dept['short'] }}</div>
          <p class="dept-desc">{{ $dept['desc'] }}</p>
        </div>
      </div>
      @endforeach
    </div>
    <div class="text-center mt-5 anim-up delay-3">
      <a href="{{ route('departments') }}" class="btn-cta"><i class="bi bi-grid-3x3-gap-fill"></i>Lihat Semua Departemen</a>
    </div>
  </div>
</section>

{{-- ═══════════ CTA JOIN ═══════════ --}}
<section id="bergabung">
  <div class="container-xl px-4">
    <div class="row align-items-center gy-5">
      <div class="col-lg-7 anim-left">
        <div class="section-label" style="background:rgba(247,201,0,.15);color:var(--yellow)"><span class="dot" style="background:var(--yellow)"></span>Gabung Bersama Kami</div>
        <h2 class="join-title">Jadilah Bagian dari<br><span>Gerakan HMIT</span><br>yang Berdampak</h2>
        <ul class="join-features">
          <li><span class="check"><i class="bi bi-check2"></i></span>Akses ke program pelatihan &amp; workshop eksklusif</li>
          <li><span class="check"><i class="bi bi-check2"></i></span>Jaringan alumni dan profesional di bidang IT</li>
          <li><span class="check"><i class="bi bi-check2"></i></span>Kesempatan memimpin dan berkolaborasi</li>
          <li><span class="check"><i class="bi bi-check2"></i></span>Partisipasi dalam kompetisi dan event tingkat nasional</li>
        </ul>
        <div class="d-flex flex-wrap gap-3">
          <a href="{{ route('contact') }}" class="btn-cta"><i class="bi bi-person-plus-fill"></i>Daftar Sekarang</a>
          <a href="{{ route('about') }}" class="btn-outline-white"><i class="bi bi-info-circle-fill"></i>Tentang Kami</a>
        </div>
      </div>
      <div class="col-lg-5 anim-right delay-2">
        <div style="background:rgba(255,255,255,.06);border:1.5px solid rgba(255,255,255,.12);border-radius:var(--radius-lg);padding:40px;text-align:center">
          <img src="{{ asset('assets/logo.png') }}" alt="HMIT Logo" style="width:120px;height:120px;object-fit:contain;filter:drop-shadow(0 8px 24px rgba(0,0,0,.3));margin-bottom:24px" />
          <div style="font-family:var(--font-head);font-weight:800;font-size:1.6rem;color:white;margin-bottom:6px">HMIT</div>
          <div style="color:rgba(255,255,255,.5);font-size:.8rem;text-transform:uppercase;letter-spacing:1px;margin-bottom:24px">Universitas Teknologi Sumbawa</div>
          <div class="d-flex justify-content-center gap-4 flex-wrap" style="padding-top:24px;border-top:1px solid rgba(255,255,255,.1)">
            <div><div style="font-family:var(--font-head);font-weight:800;font-size:1.8rem;color:var(--yellow);line-height:1">6+</div><div style="font-size:.72rem;color:rgba(255,255,255,.45);text-transform:uppercase;letter-spacing:.8px;margin-top:4px">Departemen</div></div>
            <div style="width:1px;background:rgba(255,255,255,.1)"></div>
            <div><div style="font-family:var(--font-head);font-weight:800;font-size:1.8rem;color:var(--yellow);line-height:1">100+</div><div style="font-size:.72rem;color:rgba(255,255,255,.45);text-transform:uppercase;letter-spacing:.8px;margin-top:4px">Anggota</div></div>
            <div style="width:1px;background:rgba(255,255,255,.1)"></div>
            <div><div style="font-family:var(--font-head);font-weight:800;font-size:1.8rem;color:var(--yellow);line-height:1">∞</div><div style="font-size:.72rem;color:rgba(255,255,255,.45);text-transform:uppercase;letter-spacing:.8px;margin-top:4px">Potensi</div></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
