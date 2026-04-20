# HMIT – Laravel Project
**Himpunan Mahasiswa Informatika | Universitas Teknologi Sumbawa**

---

## 📁 Struktur File

```
hmit-laravel/
├── routes/
│   └── web.php                          ← Semua route
├── app/Http/Controllers/
│   └── HMITController.php               ← Logic & data controller
├── resources/views/
│   ├── layouts/
│   │   └── app.blade.php                ← Master layout (navbar + footer)
│   └── pages/
│       ├── home.blade.php               ← Landing page
│       ├── about.blade.php              ← Tentang Kami
│       ├── departments.blade.php        ← Departemen
│       ├── programs.blade.php           ← Program Kerja
│       └── contact.blade.php           ← Kontak & Form
├── public/
│   ├── css/
│   │   └── hmit.css                     ← Global CSS
│   ├── js/
│   │   └── hmit.js                      ← Global JS
│   └── assets/
│       └── logo.png                     ← Logo HMIT
```

---

## 🚀 Cara Instalasi

### 1. Buat Project Laravel Baru
```bash
composer create-project laravel/laravel hmit-web
cd hmit-web
```

### 2. Salin File Proyek Ini
Salin semua file dari folder ini ke dalam project Laravel kamu:
- `routes/web.php` → timpa file yang ada
- `app/Http/Controllers/HMITController.php` → buat file baru
- `resources/views/layouts/app.blade.php`
- `resources/views/pages/*.blade.php`
- `public/css/hmit.css`
- `public/js/hmit.js`
- `public/assets/logo.png`

### 3. Buat Folder Views
```bash
mkdir -p resources/views/layouts
mkdir -p resources/views/pages
```

### 4. Jalankan Server
```bash
php artisan serve
```

Akses di: **http://localhost:8000**

---

## 🌐 Halaman Tersedia

| URL            | Route Name    | Halaman              |
|----------------|---------------|----------------------|
| `/`            | `home`        | Landing Page         |
| `/tentang`     | `about`       | Tentang Kami         |
| `/departemen`  | `departments` | Departemen HMIT      |
| `/program`     | `programs`    | Program Kerja        |
| `/kontak`      | `contact`     | Kontak & Form        |

---

## 🎨 Tech Stack

- **Backend**: Laravel 10/11 (PHP 8.1+)
- **Frontend**: Bootstrap 5.3 + Custom CSS
- **Icons**: Bootstrap Icons 1.11
- **Fonts**: Sora + DM Sans (Google Fonts)
- **Color Palette**:
  - Navy `#0D1B4B`
  - Yellow `#F7C900`
  - White `#FFFFFF`

---

## ✉️ Aktifkan Form Email (Opsional)

Di `HMITController.php`, method `sendContact()`, tambahkan:

```php
// Install: composer require laravel/mail
Mail::to('hmit@uts.ac.id')->send(new ContactMail($request->all()));
```

Atur `.env`:
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_FROM_ADDRESS=hmit@uts.ac.id
MAIL_FROM_NAME="HMIT UTS"
```

---

> Dibuat dengan ❤️ oleh Tim HMIT | "Dari Inisiatif Menjadi Dampak"
