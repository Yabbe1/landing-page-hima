@extends('layouts.app')
@section('title', 'Program Kerja')
@section('meta_desc', 'Daftar lengkap program kerja HMIT sepanjang tahun kepengurusan.')

@push('styles')
<style>
.filter-bar { display: flex; gap: 10px; flex-wrap: wrap; justify-content: center; margin-bottom: 48px; }
.filter-btn { font-family: var(--font-head); font-weight: 600; font-size: .78rem; padding: 8px 20px; border-radius: 40px; border: 1.5px solid rgba(13,27,75,.15); background: var(--white); color: var(--gray-text); cursor: pointer; transition: var(--transition); }
.filter-btn:hover,.filter-btn.active { background: var(--navy); color: var(--white); border-color: var(--navy); }

.program-card { background: var(--white); border-radius: var(--radius-lg); border: 1.5px solid rgba(13,27,75,.09); padding: 28px; box-shadow: var(--shadow-sm); transition: var(--transition); position: relative; overflow: hidden; height: 100%; }
.program-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-lg); }
.program-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px; }
.program-card.status-selesai::before    { background: #22c55e; }
.program-card.status-berlangsung::before{ background: var(--yellow); }
.program-card.status-akan::before       { background: var(--navy-mid); }

.program-icon { width: 50px; height: 50px; border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; font-size: 1.3rem; margin-bottom: 16px; }
.status-badge { display: inline-flex; align-items: center; gap: 6px; font-family: var(--font-head); font-weight: 700; font-size: .68rem; padding: 4px 12px; border-radius: 20px; text-transform: uppercase; letter-spacing: .8px; }
.badge-selesai    { background: rgba(34,197,94,.12);  color: #16a34a; }
.badge-berlangsung{ background: rgba(247,201,0,.2);   color: #b45309; }
.badge-akan       { background: rgba(13,27,75,.08);   color: var(--navy-mid); }
.program-title { font-family: var(--font-head); font-weight: 700; font-size: 1.05rem; color: var(--navy-dark); margin: 12px 0 6px; }
.program-meta { font-size: .78rem; color: var(--gray-mid); display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }

/* Timeline view */
.prog-timeline { position: relative; }
.prog-timeline::before { content: ''; position: absolute; left: 50%; top: 0; bottom: 0; width: 2px; background: linear-gradient(to bottom, var(--yellow), var(--navy-mid)); transform: translateX(-50%); }
.prog-tl-item { display: flex; gap: 32px; align-items: center; margin-bottom: 40px; }
.prog-tl-item:nth-child(even) { flex-direction: row-reverse; }
.prog-tl-card { flex: 1; background: var(--white); border-radius: var(--radius-lg); padding: 24px; border: 1.5px solid rgba(13,27,75,.09); box-shadow: var(--shadow-sm); transition: var(--transition); }
.prog-tl-card:hover { box-shadow: var(--shadow-md); transform: translateY(-3px); }
.prog-tl-dot { width: 44px; height: 44px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1rem; flex-shrink: 0; z-index: 1; border: 3px solid var(--white); box-shadow: var(--shadow-md); }
.prog-tl-spacer { flex: 1; }

@media(max-width:767px) {
  .prog-timeline::before { left: 20px; }
  .prog-tl-item,.prog-tl-item:nth-child(even) { flex-direction: row; }
  .prog-tl-spacer { display: none; }
  .prog-tl-dot { position: absolute; left: 0; }
  .prog-tl-item { padding-left: 60px; position: relative; }
}
</style>
@endpush

@section('content')

{{-- Page Hero --}}
<div class="page-hero">
  <div class="container-xl px-4">
    <div class="page-hero-label"><i class="bi bi-calendar-event-fill me-1"></i>Agenda Organisasi</div>
    <h1 class="page-hero-title">Program <span>Kerja</span></h1>
    <p class="page-hero-desc">Rangkaian program kerja HMIT yang dirancang untuk memberikan dampak nyata bagi anggota dan masyarakat sepanjang tahun kepengurusan.</p>
    <div class="hmit-breadcrumb">
      <a href="{{ route('home') }}">Beranda</a>
      <span class="sep"><i class="bi bi-chevron-right"></i></span>
      <span class="current">Program Kerja</span>
    </div>
  </div>
</div>

{{-- Summary Stats --}}
<section style="padding:60px 0 0;background:var(--off-white)">
  <div class="container-xl px-4">
    <div class="row g-3 justify-content-center mb-5">
      @php
      $pStats = [
        ['num'=>count($programs),'suf'=>'','label'=>'Total Program','icon'=>'bi-grid-fill','bg'=>'var(--navy)'],
        ['num'=>count(array_filter($programs,fn($p)=>$p['status']==='Selesai')),'suf'=>'','label'=>'Selesai','icon'=>'bi-check-circle-fill','bg'=>'#16a34a'],
        ['num'=>count(array_filter($programs,fn($p)=>$p['status']==='Berlangsung')),'suf'=>'','label'=>'Berlangsung','icon'=>'bi-lightning-charge-fill','bg'=>'#b45309'],
        ['num'=>count(array_filter($programs,fn($p)=>$p['status']==='Akan Datang')),'suf'=>'','label'=>'Akan Datang','icon'=>'bi-clock-fill','bg'=>'#0369a1'],
      ];
      @endphp
      @foreach($pStats as $s)
      <div class="col-6 col-md-3 anim-up">
        <div style="background:{{ $s['bg'] }};border-radius:var(--radius-md);padding:24px;text-align:center;color:white;position:relative;overflow:hidden">
          <div style="position:absolute;bottom:-16px;right:-16px;width:80px;height:80px;border-radius:50%;background:rgba(255,255,255,.08)"></div>
          <i class="bi {{ $s['icon'] }}" style="font-size:1.5rem;opacity:.7;display:block;margin-bottom:10px"></i>
          <div style="font-family:var(--font-head);font-weight:800;font-size:2rem;color:white;line-height:1">{{ $s['num'] }}{{ $s['suf'] }}</div>
          <div style="font-size:.72rem;color:rgba(255,255,255,.65);text-transform:uppercase;letter-spacing:1px;margin-top:6px">{{ $s['label'] }}</div>
        </div>
      </div>
      @endforeach
    </div>

    {{-- Filter --}}
    <div class="filter-bar anim-up delay-2">
      <button class="filter-btn active" data-filter="semua">Semua Program</button>
      <button class="filter-btn" data-filter="Selesai">✅ Selesai</button>
      <button class="filter-btn" data-filter="Berlangsung">⚡ Berlangsung</button>
      <button class="filter-btn" data-filter="Akan Datang">🕐 Akan Datang</button>
    </div>

    {{-- Program Cards --}}
    <div class="row g-4">
      @php
      $iconColors = ['navy'=>'#0D1B4B','blue'=>'#0369a1','green'=>'#16a34a','purple'=>'#7c2d8e','orange'=>'#b45309','red'=>'#be123c'];
      @endphp
      @foreach($programs as $i => $p)
      <div class="col-lg-4 col-md-6 anim-up delay-{{ ($i%3)+1 }}">
        <div class="program-card status-{{ strtolower(str_replace(' ','-',$p['status'])) }}"
             data-status="{{ $p['status'] }}">
          <div class="program-icon"
               style="background:{{ $iconColors[$p['color']] ?? '#0D1B4B' }}22;color:{{ $iconColors[$p['color']] ?? '#0D1B4B' }}">
            <i class="bi {{ $p['icon'] }}"></i>
          </div>
          <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-1">
            @if($p['status'] === 'Selesai')
              <span class="status-badge badge-selesai"><i class="bi bi-check-circle-fill"></i>Selesai</span>
            @elseif($p['status'] === 'Berlangsung')
              <span class="status-badge badge-berlangsung"><i class="bi bi-lightning-charge-fill"></i>Berlangsung</span>
            @else
              <span class="status-badge badge-akan"><i class="bi bi-clock-fill"></i>Akan Datang</span>
            @endif
          </div>
          <h4 class="program-title">{{ $p['nama'] }}</h4>
          <div class="program-meta">
            <span><i class="bi bi-diagram-2-fill me-1" style="color:var(--yellow-deep)"></i>{{ $p['dept'] }}</span>
            <span>·</span>
            <span><i class="bi bi-calendar3 me-1"></i>{{ $p['bulan'] }}</span>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- Timeline View --}}
<section style="padding:90px 0;background:var(--white)">
  <div class="container-xl px-4">
    <div class="text-center mb-5 anim-up">
      <div class="section-label"><span class="dot"></span>Alur Waktu</div>
      <h2 class="section-title" style="font-size:clamp(1.8rem,3.5vw,2.6rem)">Timeline <span>Program</span></h2>
      <p class="section-desc mx-auto" style="max-width:500px">Urutan pelaksanaan program kerja HMIT sepanjang tahun kepengurusan.</p>
    </div>
    <div class="prog-timeline d-none d-md-block">
      @foreach($programs as $i => $p)
      <div class="prog-tl-item anim-fade delay-{{ ($i%3)+1 }}">
        @if($i % 2 === 0)
          <div class="prog-tl-card">
            <div class="program-meta mb-2"><i class="bi bi-calendar3 me-1"></i>{{ $p['bulan'] }}</div>
            <h4 style="font-family:var(--font-head);font-weight:700;font-size:1rem;color:var(--navy-dark);margin-bottom:6px">{{ $p['nama'] }}</h4>
            <div class="program-meta"><i class="bi bi-diagram-2-fill me-1" style="color:var(--yellow-deep)"></i>{{ $p['dept'] }}</div>
          </div>
          <div class="prog-tl-dot" style="background:{{ $iconColors[$p['color']] ?? '#0D1B4B' }}">
            <i class="bi {{ $p['icon'] }}" style="color:white;font-size:.85rem"></i>
          </div>
          <div class="prog-tl-spacer"></div>
        @else
          <div class="prog-tl-spacer"></div>
          <div class="prog-tl-dot" style="background:{{ $iconColors[$p['color']] ?? '#0D1B4B' }}">
            <i class="bi {{ $p['icon'] }}" style="color:white;font-size:.85rem"></i>
          </div>
          <div class="prog-tl-card">
            <div class="program-meta mb-2"><i class="bi bi-calendar3 me-1"></i>{{ $p['bulan'] }}</div>
            <h4 style="font-family:var(--font-head);font-weight:700;font-size:1rem;color:var(--navy-dark);margin-bottom:6px">{{ $p['nama'] }}</h4>
            <div class="program-meta"><i class="bi bi-diagram-2-fill me-1" style="color:var(--yellow-deep)"></i>{{ $p['dept'] }}</div>
          </div>
        @endif
      </div>
      @endforeach
    </div>
    {{-- Mobile list --}}
    <div class="d-md-none">
      @foreach($programs as $p)
      <div style="display:flex;gap:16px;margin-bottom:24px;padding-left:16px;border-left:3px solid {{ $iconColors[$p['color']] ?? '#0D1B4B' }}">
        <div>
          <div style="font-family:var(--font-head);font-weight:700;font-size:.72rem;color:var(--gray-mid);text-transform:uppercase;letter-spacing:1px;margin-bottom:4px">{{ $p['bulan'] }}</div>
          <div style="font-family:var(--font-head);font-weight:700;font-size:.95rem;color:var(--navy-dark)">{{ $p['nama'] }}</div>
          <div style="font-size:.78rem;color:var(--gray-mid);margin-top:4px">{{ $p['dept'] }}</div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

@endsection
