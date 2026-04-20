@extends('layouts.app')
@section('title', 'Tentang Kami')
@section('meta_desc', 'Kenali lebih dekat Himpunan Mahasiswa Informatika UTS – sejarah, nilai, visi misi, dan semangat kami.')

@push('styles')
<style>
.value-card { background: var(--white); border-radius: var(--radius-lg); padding: 36px 28px; height: 100%; border: 1.5px solid rgba(13,27,75,.09); box-shadow: var(--shadow-sm); transition: var(--transition); text-align: center; position: relative; overflow: hidden; }
.value-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px; background: linear-gradient(90deg, var(--navy), var(--yellow)); transform: scaleX(0); transform-origin: left; transition: transform .35s ease; }
.value-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-lg); border-color: rgba(13,27,75,.15); }
.value-card:hover::before { transform: scaleX(1); }
.value-icon { width: 64px; height: 64px; border-radius: var(--radius-md); background: rgba(13,27,75,.06); display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: var(--navy); margin: 0 auto 20px; transition: var(--transition); }
.value-card:hover .value-icon { background: var(--yellow); color: var(--navy-dark); transform: rotate(-8deg); }
.value-title { font-family: var(--font-head); font-weight: 700; font-size: 1.1rem; color: var(--navy-dark); margin-bottom: 12px; }
.value-desc { font-size: .87rem; color: var(--gray-mid); line-height: 1.75; }

.timeline { position: relative; padding-left: 32px; }
.timeline::before { content: ''; position: absolute; left: 10px; top: 0; bottom: 0; width: 2px; background: linear-gradient(to bottom, var(--yellow), var(--navy-mid)); border-radius: 2px; }
.timeline-item { position: relative; margin-bottom: 40px; }
.timeline-item::before { content: ''; position: absolute; left: -26px; top: 4px; width: 14px; height: 14px; border-radius: 50%; background: var(--yellow); border: 3px solid var(--white); box-shadow: 0 0 0 3px var(--yellow); }
.timeline-year { font-family: var(--font-head); font-weight: 800; font-size: .75rem; color: var(--yellow-deep); text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 6px; }
.timeline-title { font-family: var(--font-head); font-weight: 700; font-size: 1rem; color: var(--navy-dark); margin-bottom: 8px; }
.timeline-desc { font-size: .87rem; color: var(--gray-mid); line-height: 1.72; }

.about-stat-card { background: var(--navy); border-radius: var(--radius-lg); padding: 32px 24px; text-align: center; position: relative; overflow: hidden; transition: var(--transition); }
.about-stat-card::after { content: ''; position: absolute; bottom: -30px; right: -30px; width: 120px; height: 120px; border-radius: 50%; background: rgba(247,201,0,.1); }
.about-stat-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.about-stat-num { font-family: var(--font-head); font-weight: 800; font-size: 2.4rem; color: var(--yellow); line-height: 1; margin-bottom: 8px; }
.about-stat-label { font-size: .78rem; color: rgba(255,255,255,.6); text-transform: uppercase; letter-spacing: 1px; font-weight: 500; }
</style>
@endpush

@section('content')

{{-- Page Hero --}}
<div class="page-hero">
  <div class="container-xl px-4">
    <div class="page-hero-label"><i class="bi bi-info-circle-fill me-1"></i>Profil Himpunan</div>
    <h1 class="page-hero-title">Tentang <span>HMIT</span></h1>
    <p class="page-hero-desc">Kenali lebih dekat siapa kami, dari mana kami berasal, dan ke mana kami melangkah bersama.</p>
    <div class="hmit-breadcrumb">
      <a href="{{ route('home') }}">Beranda</a>
      <span class="sep"><i class="bi bi-chevron-right"></i></span>
      <span class="current">Tentang Kami</span>
    </div>
  </div>
</div>

{{-- ─── Tentang & Statistik ─── --}}
<section style="padding:90px 0;background:var(--off-white)">
  <div class="container-xl px-4">
    <div class="row align-items-center gy-5">
      <div class="col-lg-6 anim-left">
        <div class="section-label"><span class="dot"></span>Siapa Kami</div>
        <h2 class="section-title" style="font-size:clamp(1.8rem,3.5vw,2.6rem)">Himpunan yang <span>Bergerak</span> Bersama</h2>
        <p class="section-desc mt-3">HMIT (Himpunan Mahasiswa Informatika Teknologi) adalah organisasi kemahasiswaan resmi di bawah Program Studi Informatika, Universitas Teknologi Sumbawa.</p>
        <p class="section-desc mt-3">Kami hadir sebagai wadah bagi seluruh mahasiswa Informatika untuk mengembangkan diri, menyalurkan minat bakat, berkolaborasi dalam program-program inovatif, dan berkontribusi nyata bagi masyarakat teknologi Indonesia.</p>
        <p class="section-desc mt-3">Dengan tagline <strong style="color:var(--navy)">"Dari Inisiatif Menjadi Dampak"</strong>, kami percaya bahwa setiap mahasiswa memiliki potensi luar biasa yang dapat mengubah dunia dimulai dari langkah kecil di dalam kampus.</p>
        <div class="mt-4">
          <a href="{{ route('contact') }}" class="btn-cta"><i class="bi bi-envelope-fill"></i>Hubungi Kami</a>
        </div>
      </div>
      <div class="col-lg-6 anim-right delay-2">
        <div class="row g-3">
          @php $stats = [['num'=>'6','suf'=>'+','label'=>'Departemen Aktif'],['num'=>'100','suf'=>'+','label'=>'Anggota Aktif'],['num'=>'6','suf'=>'+','label'=>'Program Kerja'],['num'=>'2024','suf'=>'','label'=>'Tahun Aktif Kepengurusan']]; @endphp
          @foreach($stats as $s)
          <div class="col-6">
            <div class="about-stat-card">
              <div class="about-stat-num">{{ $s['num'] }}<span style="color:rgba(247,201,0,.7)">{{ $s['suf'] }}</span></div>
              <div class="about-stat-label">{{ $s['label'] }}</div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ─── Nilai Inti ─── --}}
<section style="padding:90px 0;background:var(--white)">
  <div class="container-xl px-4">
    <div class="text-center mb-5 anim-up">
      <div class="section-label"><span class="dot"></span>Nilai Organisasi</div>
      <h2 class="section-title" style="font-size:clamp(1.8rem,3.5vw,2.6rem)">Nilai-Nilai <span>Inti</span> Kami</h2>
      <p class="section-desc mx-auto" style="max-width:500px">Prinsip yang menjadi landasan setiap langkah dan keputusan HMIT.</p>
    </div>
    <div class="row g-4">
      @foreach($values as $i => $v)
      <div class="col-lg-3 col-md-6 anim-up delay-{{ $i + 1 }}">
        <div class="value-card">
          <div class="value-icon"><i class="bi {{ $v['icon'] }}"></i></div>
          <h4 class="value-title">{{ $v['title'] }}</h4>
          <p class="value-desc">{{ $v['desc'] }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ─── Visi Misi Detail ─── --}}
<section style="padding:90px 0;background:var(--off-white)">
  <div class="container-xl px-4">
    <div class="text-center mb-5 anim-up">
      <div class="section-label"><span class="dot"></span>Arah Gerak</div>
      <h2 class="section-title" style="font-size:clamp(1.8rem,3.5vw,2.6rem)">Visi &amp; <span>Misi</span></h2>
    </div>
    <div class="row g-4">
      <div class="col-lg-5 anim-left">
        <div style="background:linear-gradient(145deg,var(--navy-dark),var(--navy-mid));border-radius:var(--radius-lg);padding:40px;height:100%;position:relative;overflow:hidden">
          <div style="position:absolute;bottom:-30px;right:-30px;width:160px;height:160px;border-radius:50%;background:rgba(247,201,0,.08)"></div>
          <div style="width:56px;height:56px;background:rgba(247,201,0,.2);border-radius:var(--radius-md);display:flex;align-items:center;justify-content:center;font-size:1.4rem;color:var(--yellow);margin-bottom:24px"><i class="bi bi-eye-fill"></i></div>
          <h3 style="font-family:var(--font-head);font-weight:800;color:var(--yellow);font-size:1.4rem;margin-bottom:16px">Visi</h3>
          <p style="color:rgba(255,255,255,.82);font-size:.93rem;line-height:1.8">Mewujudkan Himpunan Mahasiswa Informatika yang <strong style="color:var(--yellow)">progresif, kolaboratif, dan berdampak</strong> melalui inisiatif-inisiatif inovatif yang relevan dengan perkembangan teknologi dan kebutuhan mahasiswa.</p>
        </div>
      </div>
      <div class="col-lg-7 anim-right delay-2">
        <div style="background:var(--white);border:1.5px solid rgba(13,27,75,.1);border-radius:var(--radius-lg);padding:40px;height:100%;box-shadow:var(--shadow-sm)">
          <div style="width:56px;height:56px;background:rgba(13,27,75,.07);border-radius:var(--radius-md);display:flex;align-items:center;justify-content:center;font-size:1.4rem;color:var(--navy);margin-bottom:24px"><i class="bi bi-rocket-takeoff-fill"></i></div>
          <h3 style="font-family:var(--font-head);font-weight:800;color:var(--navy-dark);font-size:1.4rem;margin-bottom:20px">Misi</h3>
          @php $misi = ['Mendorong budaya inisiatif mahasiswa dalam pengembangan akademik, minat bakat, dan karya teknologi.','Menghadirkan program kerja yang inovatif dan relevan guna meningkatkan kolaborasi antar anggota himpunan.','Menciptakan lingkungan kerja yang solid, harmonis, dan inklusif dengan tetap mengedepankan profesionalisme.']; @endphp
          <div style="display:flex;flex-direction:column;gap:16px">
            @foreach($misi as $i => $m)
            <div style="display:flex;gap:14px;align-items:flex-start">
              <span style="width:28px;height:28px;border-radius:50%;background:var(--yellow);color:var(--navy-dark);font-family:var(--font-head);font-weight:800;font-size:.75rem;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:1px">{{ $i+1 }}</span>
              <span style="font-size:.9rem;color:var(--gray-text);line-height:1.7">{{ $m }}</span>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ─── Timeline Sejarah ─── --}}
<section style="padding:90px 0;background:var(--white)">
  <div class="container-xl px-4">
    <div class="row">
      <div class="col-lg-4 anim-left">
        <div class="section-label"><span class="dot"></span>Perjalanan</div>
        <h2 class="section-title" style="font-size:clamp(1.8rem,3.5vw,2.6rem)">Jejak <span>Sejarah</span> HMIT</h2>
        <p class="section-desc mt-3">Perjalanan panjang HMIT dalam membangun ekosistem mahasiswa Informatika yang berdampak di Sumbawa.</p>
        <a href="{{ route('programs') }}" class="btn-outline-navy mt-4 d-inline-flex"><i class="bi bi-calendar-event"></i>Lihat Program Kerja</a>
      </div>
      <div class="col-lg-7 offset-lg-1 anim-right delay-2">
        <div class="timeline">
          @php
          $history = [
            ['year'=>'Awal Berdiri',  'title'=>'Pendirian HMIT',          'desc'=>'HMIT didirikan sebagai wadah resmi mahasiswa Informatika Universitas Teknologi Sumbawa untuk berorganisasi dan berkembang bersama.'],
            ['year'=>'Pengembangan',  'title'=>'Pembentukan Departemen',   'desc'=>'Struktur organisasi diperkuat dengan pembentukan 6 departemen aktif yang masing-masing memiliki program kerja yang spesifik dan terukur.'],
            ['year'=>'Kolaborasi',    'title'=>'Ekspansi Program',         'desc'=>'HMIT memperluas jangkauan programnya melalui HMIT Go To School dan IT Bootcamp yang memberikan dampak langsung kepada siswa dan mahasiswa.'],
            ['year'=>'2024–2025',     'title'=>'Era Inisiatif & Dampak',   'desc'=>'Di bawah kepengurusan terbaru, HMIT meluncurkan tagline "Dari Inisiatif Menjadi Dampak" sebagai arah gerak menuju organisasi yang lebih profesional dan progresif.'],
          ];
          @endphp
          @foreach($history as $h)
          <div class="timeline-item">
            <div class="timeline-year">{{ $h['year'] }}</div>
            <div class="timeline-title">{{ $h['title'] }}</div>
            <div class="timeline-desc">{{ $h['desc'] }}</div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
