@extends('layouts.app')
@section('title', 'Departemen')
@section('meta_desc', 'Kenali 6 departemen aktif HMIT beserta program kerja unggulan masing-masing.')

@push('styles')
<style>
.dept-detail-card { background: var(--white); border-radius: var(--radius-lg); border: 1.5px solid rgba(13,27,75,.09); overflow: hidden; box-shadow: var(--shadow-sm); transition: var(--transition); height: 100%; }
.dept-detail-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-lg); }
.dept-card-header { padding: 32px 28px 24px; position: relative; }
.dept-card-body { padding: 0 28px 28px; }
.dept-card-num { font-family: var(--font-head); font-weight: 800; font-size: 3.5rem; color: rgba(255,255,255,.15); line-height: 1; position: absolute; top: 16px; right: 20px; }
.dept-big-icon { width: 60px; height: 60px; background: rgba(255,255,255,.15); border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; font-size: 1.6rem; color: white; margin-bottom: 16px; }
.dept-card-name { font-family: var(--font-head); font-weight: 800; font-size: 1.1rem; color: white; line-height: 1.3; margin-bottom: 0; }
.dept-program-tag { display: inline-flex; align-items: center; gap: 6px; background: rgba(255,255,255,.2); color: white; font-size: .72rem; font-weight: 700; font-family: var(--font-head); padding: 5px 12px; border-radius: 20px; margin-top: 12px; }
.dept-detail-text { font-size: .87rem; color: var(--gray-text); line-height: 1.78; margin-top: 20px; margin-bottom: 20px; }
.kegiatan-title { font-family: var(--font-head); font-weight: 700; font-size: .78rem; color: var(--navy); text-transform: uppercase; letter-spacing: 1.2px; margin-bottom: 12px; }
.kegiatan-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 8px; }
.kegiatan-list li { display: flex; align-items: center; gap: 10px; font-size: .83rem; color: var(--gray-text); }
.kegiatan-list li::before { content: ''; width: 6px; height: 6px; border-radius: 50%; background: var(--yellow); flex-shrink: 0; }
</style>
@endpush

@section('content')

{{-- Page Hero --}}
<div class="page-hero">
  <div class="container-xl px-4">
    <div class="page-hero-label"><i class="bi bi-grid-3x3-gap-fill me-1"></i>Unit Kerja HMIT</div>
    <h1 class="page-hero-title">Departemen <span>HMIT</span></h1>
    <p class="page-hero-desc">6 departemen aktif yang bergerak bersama membawa HMIT menjadi himpunan yang progresif dan berdampak.</p>
    <div class="hmit-breadcrumb">
      <a href="{{ route('home') }}">Beranda</a>
      <span class="sep"><i class="bi bi-chevron-right"></i></span>
      <span class="current">Departemen</span>
    </div>
  </div>
</div>

{{-- Department Cards --}}
<section style="padding:90px 0;background:var(--off-white)">
  <div class="container-xl px-4">
    <div class="text-center mb-5 anim-up">
      <div class="section-label"><span class="dot"></span>6 Departemen Aktif</div>
      <h2 class="section-title" style="font-size:clamp(1.8rem,3.5vw,2.6rem)">Struktur <span>Departemen</span></h2>
      <p class="section-desc mx-auto" style="max-width:500px">Setiap departemen dipimpin oleh Kepala Departemen yang bertanggung jawab atas program kerja dan anggota di bawah koordinasinya.</p>
    </div>

    @php
    $colors = ['#0D1B4B','#1a6b3a','#7c2d8e','#b45309','#0369a1','#be123c'];
    @endphp

    <div class="row g-4">
      @foreach($departments as $i => $dept)
      <div class="col-lg-4 col-md-6 anim-up delay-{{ ($i % 3) + 1 }}">
        <div class="dept-detail-card">
          {{-- Header --}}
          <div class="dept-card-header" style="background:{{ $colors[$i] }}">
            <div class="dept-card-num">0{{ $dept['id'] }}</div>
            <div class="dept-big-icon"><i class="bi {{ $dept['icon'] }}"></i></div>
            <h3 class="dept-card-name">{{ $dept['title'] }}</h3>
            <div class="dept-program-tag"><i class="bi bi-star-fill" style="font-size:.6rem"></i>{{ $dept['program'] }}</div>
          </div>
          {{-- Body --}}
          <div class="dept-card-body">
            <p class="dept-detail-text">{{ $dept['detail'] }}</p>
            <div class="kegiatan-title"><i class="bi bi-calendar2-check-fill me-1" style="color:var(--yellow-deep)"></i>Program Kegiatan</div>
            <ul class="kegiatan-list">
              @foreach($dept['kegiatan'] as $k)
              <li>{{ $k }}</li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- Struktur Inti --}}
<section style="padding:90px 0;background:var(--white)">
  <div class="container-xl px-4">
    <div class="text-center mb-5 anim-up">
      <div class="section-label"><span class="dot"></span>Kepengurusan Inti</div>
      <h2 class="section-title" style="font-size:clamp(1.8rem,3.5vw,2.6rem)">Pengurus <span>Harian</span></h2>
    </div>
    <div class="row g-4 justify-content-center">
      @php
      $inti = [
        ['icon'=>'bi-person-badge-fill','role'=>'Ketua Himpunan','desc'=>'Memimpin seluruh organisasi dan bertanggung jawab atas arah gerak HMIT.','color'=>'var(--yellow)'],
        ['icon'=>'bi-person-lines-fill','role'=>'Wakil Ketua','desc'=>'Mendampingi ketua dan mengkoordinasikan seluruh departemen HMIT.','color'=>'var(--navy-mid)'],
        ['icon'=>'bi-file-text-fill','role'=>'Sekretaris','desc'=>'Mengelola administrasi, dokumentasi, dan surat-menyurat himpunan.','color'=>'#0369a1'],
        ['icon'=>'bi-cash-stack','role'=>'Bendahara','desc'=>'Mengelola keuangan dan laporan anggaran seluruh program kerja HMIT.','color'=>'#1a6b3a'],
      ];
      @endphp
      @foreach($inti as $i => $p)
      <div class="col-lg-3 col-md-6 anim-up delay-{{ $i + 1 }}">
        <div style="background:var(--white);border:1.5px solid rgba(13,27,75,.09);border-radius:var(--radius-lg);padding:32px 24px;text-align:center;box-shadow:var(--shadow-sm);transition:var(--transition);height:100%" class="value-hover">
          <div style="width:60px;height:60px;border-radius:50%;background:{{ $p['color'] }}22;display:flex;align-items:center;justify-content:center;font-size:1.4rem;color:{{ $p['color'] }};margin:0 auto 20px"><i class="bi {{ $p['icon'] }}"></i></div>
          <h4 style="font-family:var(--font-head);font-weight:700;font-size:1rem;color:var(--navy-dark);margin-bottom:10px">{{ $p['role'] }}</h4>
          <p style="font-size:.83rem;color:var(--gray-mid);line-height:1.7;margin:0">{{ $p['desc'] }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- CTA --}}
<section style="padding:80px 0;background:var(--off-white)">
  <div class="container-xl px-4 text-center anim-up">
    <div class="section-label mx-auto"><span class="dot"></span>Tertarik Bergabung?</div>
    <h2 class="section-title" style="font-size:clamp(1.6rem,3vw,2.2rem);margin-bottom:16px">Daftarkan Dirimu ke <span>HMIT</span></h2>
    <p class="section-desc mx-auto mb-4" style="max-width:480px">Pilih departemen yang sesuai minat dan bakatmu, dan mulailah perjalananmu bersama kami.</p>
    <a href="{{ route('contact') }}" class="btn-cta"><i class="bi bi-person-plus-fill"></i>Bergabung Sekarang</a>
  </div>
</section>

@endsection
