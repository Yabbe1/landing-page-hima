@extends('layouts.app')
@section('title', 'Kontak')
@section('meta_desc', 'Hubungi HMIT – Himpunan Mahasiswa Informatika Universitas Teknologi Sumbawa.')

@push('styles')
<style>
.contact-form-wrap { background: var(--white); border-radius: var(--radius-lg); padding: 48px 40px; box-shadow: var(--shadow-lg); border: 1.5px solid rgba(13,27,75,.07); }
.form-label-hmit { font-family: var(--font-head); font-weight: 600; font-size: .82rem; color: var(--navy-dark); margin-bottom: 8px; display: block; }
.form-label-hmit span { color: #ef4444; margin-left: 2px; }
.form-control-hmit { width: 100%; padding: 13px 18px; border: 1.5px solid rgba(13,27,75,.15); border-radius: var(--radius-sm); font-family: var(--font-body); font-size: .9rem; color: var(--gray-text); background: var(--off-white); outline: none; transition: var(--transition); }
.form-control-hmit:focus { border-color: var(--navy); background: var(--white); box-shadow: 0 0 0 3px rgba(13,27,75,.08); }
.form-control-hmit.is-invalid { border-color: #ef4444; }
.invalid-msg { font-size: .75rem; color: #ef4444; margin-top: 5px; font-family: var(--font-head); }

.contact-info-card { background: var(--navy); border-radius: var(--radius-lg); padding: 40px; color: white; height: 100%; position: relative; overflow: hidden; }
.contact-info-card::before { content: ''; position: absolute; top: -60px; right: -60px; width: 240px; height: 240px; border-radius: 50%; background: rgba(247,201,0,.1); pointer-events: none; }
.contact-info-card::after  { content: ''; position: absolute; bottom: -40px; left: -40px; width: 160px; height: 160px; border-radius: 50%; background: rgba(255,255,255,.04); pointer-events: none; }
.contact-info-item { display: flex; gap: 16px; align-items: flex-start; margin-bottom: 28px; position: relative; z-index: 1; }
.contact-info-icon { width: 44px; height: 44px; border-radius: var(--radius-sm); background: rgba(247,201,0,.15); display: flex; align-items: center; justify-content: center; font-size: 1.1rem; color: var(--yellow); flex-shrink: 0; }
.contact-info-label { font-family: var(--font-head); font-weight: 700; font-size: .72rem; color: rgba(255,255,255,.45); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px; }
.contact-info-value { font-size: .9rem; color: rgba(255,255,255,.85); line-height: 1.5; }
.contact-info-value a { color: rgba(255,255,255,.85); }
.contact-info-value a:hover { color: var(--yellow); }

.map-placeholder { background: var(--off-white); border-radius: var(--radius-lg); overflow: hidden; border: 1.5px solid rgba(13,27,75,.08); }
</style>
@endpush

@section('content')

{{-- Page Hero --}}
<div class="page-hero">
  <div class="container-xl px-4">
    <div class="page-hero-label"><i class="bi bi-chat-dots-fill me-1"></i>Hubungi Kami</div>
    <h1 class="page-hero-title">Kontak <span>HMIT</span></h1>
    <p class="page-hero-desc">Ada pertanyaan, ide, atau ingin bergabung? Kami siap mendengar dan merespons setiap pesan dari kamu.</p>
    <div class="hmit-breadcrumb">
      <a href="{{ route('home') }}">Beranda</a>
      <span class="sep"><i class="bi bi-chevron-right"></i></span>
      <span class="current">Kontak</span>
    </div>
  </div>
</div>

{{-- Main Contact Section --}}
<section style="padding:90px 0;background:var(--off-white)">
  <div class="container-xl px-4">
    <div class="row g-5">

      {{-- Left: Info + Socials --}}
      <div class="col-lg-5 anim-left">
        <div class="contact-info-card">
          <div style="position:relative;z-index:1;margin-bottom:32px">
            <div style="font-family:var(--font-head);font-weight:800;font-size:1.5rem;color:white;margin-bottom:8px">Informasi <span style="color:var(--yellow)">Kontak</span></div>
            <p style="font-size:.87rem;color:rgba(255,255,255,.6);line-height:1.72;margin:0">Jangan ragu untuk menghubungi kami melalui berbagai saluran di bawah ini. Tim HMIT siap melayani.</p>
          </div>

          <div class="contact-info-item">
            <div class="contact-info-icon"><i class="bi bi-geo-alt-fill"></i></div>
            <div>
              <div class="contact-info-label">Alamat</div>
              <div class="contact-info-value">Universitas Teknologi Sumbawa<br>Jl. Olat Maras, Batu Alang<br>Sumbawa, NTB 84371</div>
            </div>
          </div>
          <div class="contact-info-item">
            <div class="contact-info-icon"><i class="bi bi-envelope-fill"></i></div>
            <div>
              <div class="contact-info-label">Email</div>
              <div class="contact-info-value"><a href="mailto:hmit@uts.ac.id">hmit@uts.ac.id</a></div>
            </div>
          </div>
          <div class="contact-info-item">
            <div class="contact-info-icon"><i class="bi bi-clock-fill"></i></div>
            <div>
              <div class="contact-info-label">Jam Operasional</div>
              <div class="contact-info-value">Senin – Jumat<br>08.00 – 17.00 WITA</div>
            </div>
          </div>
          <div class="contact-info-item" style="margin-bottom:0">
            <div class="contact-info-icon"><i class="bi bi-instagram"></i></div>
            <div>
              <div class="contact-info-label">Media Sosial</div>
              <div class="contact-info-value"><a href="#">@hmit_uts</a></div>
            </div>
          </div>

          {{-- Socials --}}
          <div style="position:relative;z-index:1;margin-top:32px;padding-top:24px;border-top:1px solid rgba(255,255,255,.12)">
            <div style="font-family:var(--font-head);font-size:.72rem;font-weight:700;color:rgba(255,255,255,.45);text-transform:uppercase;letter-spacing:1.2px;margin-bottom:14px">Ikuti Kami</div>
            <div class="footer-socials">
              <a href="#" class="social-btn" title="Instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="social-btn" title="YouTube"><i class="bi bi-youtube"></i></a>
              <a href="#" class="social-btn" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
              <a href="#" class="social-btn" title="GitHub"><i class="bi bi-github"></i></a>
            </div>
          </div>
        </div>
      </div>

      {{-- Right: Form --}}
      <div class="col-lg-7 anim-right delay-2">
        <div class="contact-form-wrap">
          <div style="margin-bottom:32px">
            <div class="section-label"><span class="dot"></span>Kirim Pesan</div>
            <h2 class="section-title" style="font-size:1.8rem">Ada yang Ingin <span>Kamu Tanyakan?</span></h2>
            <p class="section-desc mt-2">Isi form di bawah ini dan tim HMIT akan segera merespons pesanmu.</p>
          </div>

          {{-- Flash success --}}
          @if(session('success'))
          <div class="hmit-alert hmit-alert-success p-4 mb-4 d-flex align-items-start gap-3">
            <i class="bi bi-check-circle-fill" style="font-size:1.3rem;flex-shrink:0;margin-top:1px"></i>
            <div>
              <strong>Berhasil Terkirim!</strong><br>
              <span style="font-size:.9rem">{{ session('success') }}</span>
            </div>
          </div>
          @endif

          <form action="{{ route('contact.send') }}" method="POST" id="contactForm" novalidate>
            @csrf
            <div class="row g-4">
              <div class="col-md-6">
                <label class="form-label-hmit">Nama Lengkap <span>*</span></label>
                <input type="text" name="nama" class="form-control-hmit @error('nama') is-invalid @enderror"
                       placeholder="Nama kamu" value="{{ old('nama') }}" />
                @error('nama')<div class="invalid-msg">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6">
                <label class="form-label-hmit">Alamat Email <span>*</span></label>
                <input type="email" name="email" class="form-control-hmit @error('email') is-invalid @enderror"
                       placeholder="email@example.com" value="{{ old('email') }}" />
                @error('email')<div class="invalid-msg">{{ $message }}</div>@enderror
              </div>
              <div class="col-12">
                <label class="form-label-hmit">Subjek <span>*</span></label>
                <input type="text" name="subjek" class="form-control-hmit @error('subjek') is-invalid @enderror"
                       placeholder="Topik pesan kamu" value="{{ old('subjek') }}" />
                @error('subjek')<div class="invalid-msg">{{ $message }}</div>@enderror
              </div>
              <div class="col-12">
                <label class="form-label-hmit">Pesan <span>*</span></label>
                <textarea name="pesan" rows="5" class="form-control-hmit @error('pesan') is-invalid @enderror"
                          placeholder="Tuliskan pesanmu di sini...">{{ old('pesan') }}</textarea>
                @error('pesan')<div class="invalid-msg">{{ $message }}</div>@enderror
              </div>
              <div class="col-12">
                <button type="submit" class="btn-cta w-100 justify-content-center">
                  <i class="bi bi-send-fill"></i>Kirim Pesan
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- Map / Location --}}
<section style="padding:0 0 90px;background:var(--off-white)">
  <div class="container-xl px-4">
    <div class="text-center mb-5 anim-up">
      <div class="section-label"><span class="dot"></span>Lokasi</div>
      <h2 class="section-title" style="font-size:clamp(1.6rem,3vw,2.2rem)">Temukan <span>Kami</span></h2>
    </div>
    <div class="map-placeholder anim-up delay-2">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.123456!2d117.4200!3d-8.5800!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sUniversitas+Teknologi+Sumbawa!5e0!3m2!1sid!2sid!4v1700000000000"
        width="100%" height="420" style="border:0;display:block" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade" title="Lokasi UTS Sumbawa">
      </iframe>
    </div>
  </div>
</section>

{{-- FAQ --}}
<section style="padding:0 0 90px;background:var(--off-white)">
  <div class="container-xl px-4">
    <div class="text-center mb-5 anim-up">
      <div class="section-label"><span class="dot"></span>Pertanyaan Umum</div>
      <h2 class="section-title" style="font-size:clamp(1.6rem,3vw,2.2rem)">FAQ <span>HMIT</span></h2>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-8 anim-up delay-1">
        <div class="accordion" id="faqAccordion">
          @php
          $faqs = [
            ['q'=>'Siapa saja yang bisa bergabung dengan HMIT?','a'=>'HMIT terbuka untuk seluruh mahasiswa aktif Program Studi Informatika di Universitas Teknologi Sumbawa.'],
            ['q'=>'Bagaimana cara mendaftar menjadi anggota HMIT?','a'=>'Kamu bisa mendaftar melalui proses kaderisasi yang diselenggarakan oleh Departemen PSPM setiap awal tahun ajaran. Pantau media sosial @hmit_uts untuk pengumuman terbaru.'],
            ['q'=>'Apakah HMIT menerima kontribusi dari pihak luar?','a'=>'Ya! HMIT terbuka untuk kolaborasi, sponsorship, dan kemitraan dari berbagai pihak. Silakan hubungi kami melalui form di atas atau email ke hmit@uts.ac.id.'],
            ['q'=>'Program apa yang paling cocok untuk mahasiswa baru?','a'=>'Untuk mahasiswa baru, kami merekomendasikan mengikuti Kaderisasi terlebih dahulu, dilanjutkan dengan IT Bootcamp untuk pengembangan kompetensi teknis.'],
          ];
          @endphp
          @foreach($faqs as $i => $faq)
          <div class="accordion-item" style="border:1.5px solid rgba(13,27,75,.1);border-radius:var(--radius-md) !important;margin-bottom:12px;overflow:hidden">
            <h2 class="accordion-header">
              <button class="accordion-button {{ $i !== 0 ? 'collapsed' : '' }}"
                      style="font-family:var(--font-head);font-weight:600;font-size:.92rem;color:var(--navy-dark);background:var(--white)"
                      type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $i }}">
                {{ $faq['q'] }}
              </button>
            </h2>
            <div id="faq{{ $i }}" class="accordion-collapse collapse {{ $i === 0 ? 'show' : '' }}" data-bs-parent="#faqAccordion">
              <div class="accordion-body" style="font-size:.88rem;color:var(--gray-text);line-height:1.75;background:var(--white)">
                {{ $faq['a'] }}
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
