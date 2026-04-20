<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'HMIT') – Himpunan Mahasiswa Informatika | UTS</title>
  <meta name="description" content="@yield('meta_desc', 'Himpunan Mahasiswa Informatika Universitas Teknologi Sumbawa – Dari Inisiatif Menjadi Dampak.')">

  {{-- Bootstrap 5 --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  {{-- Bootstrap Icons --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
  {{-- Google Fonts --}}
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,400&display=swap" rel="stylesheet" />
  {{-- Global CSS --}}
  <link rel="stylesheet" href="{{ asset('css/hmit.css') }}" />

  @stack('styles')
</head>
<body>

{{-- ── Announce Bar ─────────────────────────── --}}
<div class="announce-bar">
  <i class="bi bi-megaphone-fill me-2"></i>
  "DARI INISIATIF MENJADI DAMPAK"
  <span>•</span>
  HIMPUNAN MAHASISWA INFORMATIKA – UNIVERSITAS TEKNOLOGI SUMBAWA
</div>

{{-- ── Navbar ───────────────────────────────── --}}
<nav class="hmit-navbar">
  <div class="container-xl px-3 px-lg-4">
    {{-- Brand --}}
    <a href="{{ route('home') }}" class="navbar-brand-wrap me-auto me-lg-4">
      <img src="{{ asset('assets/logo.png') }}" alt="Logo HMIT" class="navbar-logo" />
      <div class="brand-text">
        <span class="brand-title">HMIT</span>
        <span class="brand-sub">Informatika · UTS</span>
      </div>
    </a>

    {{-- Mobile toggle --}}
    <button class="navbar-toggler d-lg-none ms-auto me-2" type="button"
            data-bs-toggle="collapse" data-bs-target="#mainNav">
      <i class="bi bi-list"></i>
    </button>

    {{-- Links --}}
    <div class="collapse navbar-collapse d-lg-flex justify-content-end" id="mainNav">
      <ul class="hmit-nav-links flex-column flex-lg-row py-3 py-lg-0 w-100 w-lg-auto">
        <li class="nav-item">
          <a href="{{ route('home') }}"
             class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('about') }}"
             class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Tentang Kami</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('departments') }}"
             class="nav-link {{ request()->routeIs('departments') ? 'active' : '' }}">Departemen</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('programs') }}"
             class="nav-link {{ request()->routeIs('programs') ? 'active' : '' }}">Program Kerja</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('contact') }}"
             class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Kontak</a>
        </li>
        <div class="nav-divider d-none d-lg-block"></div>
        <li class="nav-item">
          <a href="{{ route('contact') }}" class="nav-link nav-cta-btn">
            <i class="bi bi-chat-dots-fill me-1"></i>Hubungi Kami
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

{{-- ── Page Content ─────────────────────────── --}}
@yield('content')

{{-- ── FOOTER ───────────────────────────────── --}}
<footer class="hmit-footer">
  {{-- Wave --}}
  <div class="footer-wave">
    <svg viewBox="0 0 1440 80" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,40 C240,80 480,0 720,40 C960,80 1200,0 1440,40 L1440,80 L0,80 Z" fill="#0D1B4B"/>
    </svg>
  </div>

  <div class="container-xl px-4">
    <div class="row gy-5 footer-main">
      {{-- Brand --}}
      <div class="col-lg-4 col-md-6">
        <div class="footer-brand">
          <img src="{{ asset('assets/logo.png') }}" alt="Logo HMIT" class="footer-logo" />
          <div>
            <div class="footer-brand-title">HMIT</div>
            <div class="footer-brand-sub">Himpunan Mahasiswa Informatika</div>
          </div>
        </div>
        <p class="footer-desc">Wadah resmi mahasiswa Informatika Universitas Teknologi Sumbawa untuk berkembang, berkolaborasi, dan berdampak bagi masyarakat teknologi Indonesia.</p>
        <div class="footer-tagline"><i class="bi bi-quote"></i> Dari Inisiatif Menjadi Dampak</div>
        <div class="footer-socials mt-4">
          <a href="#" class="social-btn" title="Instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="social-btn" title="YouTube"><i class="bi bi-youtube"></i></a>
          <a href="#" class="social-btn" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
          <a href="#" class="social-btn" title="GitHub"><i class="bi bi-github"></i></a>
          <a href="mailto:hmit@uts.ac.id" class="social-btn" title="Email"><i class="bi bi-envelope-fill"></i></a>
        </div>
      </div>

      {{-- Navigation --}}
      <div class="col-lg-2 col-md-3 col-6">
        <h6 class="footer-col-title">Navigasi</h6>
        <ul class="footer-links">
          <li><a href="{{ route('home') }}"><i class="bi bi-chevron-right"></i>Beranda</a></li>
          <li><a href="{{ route('about') }}"><i class="bi bi-chevron-right"></i>Tentang Kami</a></li>
          <li><a href="{{ route('departments') }}"><i class="bi bi-chevron-right"></i>Departemen</a></li>
          <li><a href="{{ route('programs') }}"><i class="bi bi-chevron-right"></i>Program Kerja</a></li>
          <li><a href="{{ route('contact') }}"><i class="bi bi-chevron-right"></i>Kontak</a></li>
        </ul>
      </div>

      {{-- Departemen --}}
      <div class="col-lg-3 col-md-3 col-6">
        <h6 class="footer-col-title">Departemen</h6>
        <ul class="footer-links">
          <li><a href="{{ route('departments') }}"><i class="bi bi-chevron-right"></i>Kaderisasi</a></li>
          <li><a href="{{ route('departments') }}"><i class="bi bi-chevron-right"></i>Sosial Masyarakat</a></li>
          <li><a href="{{ route('departments') }}"><i class="bi bi-chevron-right"></i>Media & Kreatif</a></li>
          <li><a href="{{ route('departments') }}"><i class="bi bi-chevron-right"></i>Kesenian & Olahraga</a></li>
          <li><a href="{{ route('departments') }}"><i class="bi bi-chevron-right"></i>Pengembangan IT</a></li>
          <li><a href="{{ route('departments') }}"><i class="bi bi-chevron-right"></i>Kewirausahaan</a></li>
        </ul>
      </div>

      {{-- Contact --}}
      <div class="col-lg-3 col-md-6">
        <h6 class="footer-col-title">Kontak Kami</h6>
        <ul class="footer-contact-list">
          <li><i class="bi bi-geo-alt-fill"></i><span>Universitas Teknologi Sumbawa, Jl. Olat Maras, Batu Alang, Sumbawa, NTB</span></li>
          <li><i class="bi bi-envelope-fill"></i><a href="mailto:hmit@uts.ac.id">hmit@uts.ac.id</a></li>
          <li><i class="bi bi-instagram"></i><a href="#">@hmit_uts</a></li>
          <li><i class="bi bi-clock-fill"></i><span>Senin – Jumat, 08.00 – 17.00 WITA</span></li>
        </ul>
      </div>
    </div>

    <div class="footer-divider"></div>

    <div class="footer-bottom">
      <p class="mb-0">&copy; {{ date('Y') }} <strong>HMIT</strong> – Himpunan Mahasiswa Informatika, Universitas Teknologi Sumbawa. All rights reserved.</p>
      <p class="mb-0">Dibuat dengan <i class="bi bi-heart-fill" style="color:var(--yellow)"></i> oleh Tim HMIT</p>
    </div>
  </div>
</footer>

{{-- Back to top --}}
<a href="#" class="back-to-top" id="backToTop" title="Kembali ke atas">
  <i class="bi bi-chevron-up"></i>
</a>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
{{-- Global JS --}}
<script src="{{ asset('js/hmit.js') }}"></script>

@stack('scripts')
</body>
</html>
