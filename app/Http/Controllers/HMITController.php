<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HMITController extends Controller
{
    /* ── Shared Data ─────────────────────────────── */
    public function departments(): array
    {
        return [
            [
                'id'      => 1,
                'icon'    => 'bi-mortarboard-fill',
                'color'   => '#0D1B4B',
                'title'   => 'Pengembangan Sumber Daya Mahasiswa',
                'short'   => 'Kaderisasi',
                'program' => 'Kaderisasi',
                'desc'    => 'Bertanggung jawab atas proses kaderisasi anggota baru, pembinaan karakter, dan pengembangan potensi akademik mahasiswa Informatika UTS.',
                'detail'  => 'Departemen ini mengelola seluruh rangkaian proses penerimaan dan pembinaan anggota baru himpunan, mulai dari orientasi, pembekalan nilai-nilai organisasi, hingga pengembangan soft skill dan hard skill mahasiswa Informatika.',
                'kegiatan'=> ['Orientasi Anggota Baru', 'Leadership Training', 'Mentoring Akademik', 'Pembinaan Karakter'],
            ],
            [
                'id'      => 2,
                'icon'    => 'bi-people-fill',
                'color'   => '#1a6b3a',
                'title'   => 'Sosial Masyarakat',
                'short'   => 'HMIT Go To School',
                'program' => 'HMIT Go To School',
                'desc'    => 'Menjalankan program pengabdian masyarakat melalui kegiatan Go To School untuk mendekatkan teknologi kepada siswa-siswi sekolah di Sumbawa.',
                'detail'  => 'Departemen Sosial Masyarakat hadir untuk menjembatani mahasiswa Informatika dengan masyarakat luas melalui program-program sosial yang berdampak, terutama di bidang literasi teknologi untuk generasi muda Sumbawa.',
                'kegiatan'=> ['HMIT Go To School', 'Bakti Sosial Digital', 'Workshop Coding untuk SMA', 'Pengabdian Masyarakat'],
            ],
            [
                'id'      => 3,
                'icon'    => 'bi-camera-video-fill',
                'color'   => '#7c2d8e',
                'title'   => 'Media & Kreatif',
                'short'   => 'WINTER',
                'program' => 'WINTER',
                'desc'    => 'Mengelola konten kreatif, dokumentasi kegiatan, branding himpunan, serta distribusi informasi melalui berbagai platform media digital.',
                'detail'  => 'WINTER (HMIT Media) adalah departemen yang mengelola identitas visual dan komunikasi himpunan. Meliputi produksi konten, desain grafis, fotografi, videografi, dan pengelolaan seluruh platform digital HMIT.',
                'kegiatan'=> ['WINTER Event', 'Produksi Konten Digital', 'Desain Grafis & Branding', 'Manajemen Media Sosial'],
            ],
            [
                'id'      => 4,
                'icon'    => 'bi-trophy-fill',
                'color'   => '#b45309',
                'title'   => 'Kesenian & Olahraga',
                'short'   => 'HMIT Futsal Cup',
                'program' => 'HMIT Futsal Cup',
                'desc'    => 'Mewadahi minat dan bakat mahasiswa dalam bidang seni dan olahraga, termasuk penyelenggaraan turnamen futsal antar kampus.',
                'detail'  => 'Departemen Kesenian & Olahraga hadir untuk menjaga keseimbangan antara akademik dan kreativitas. Menyelenggarakan berbagai kompetisi olahraga, penampilan seni, dan kegiatan rekreasi untuk seluruh anggota HMIT.',
                'kegiatan'=> ['HMIT Futsal Cup', 'Pensi & Penampilan Seni', 'Liga Internal HMIT', 'Outing & Team Building'],
            ],
            [
                'id'      => 5,
                'icon'    => 'bi-cpu-fill',
                'color'   => '#0369a1',
                'title'   => 'Pengembangan Wawasan Teknologi & Informasi',
                'short'   => 'IT Bootcamp',
                'program' => 'IT Bootcamp',
                'desc'    => 'Menyelenggarakan pelatihan dan workshop teknologi intensif melalui program IT Bootcamp untuk meningkatkan kompetensi teknis mahasiswa.',
                'detail'  => 'Departemen PWTI adalah ujung tombak pengembangan kompetensi teknis anggota HMIT. Menyelenggarakan IT Bootcamp intensif, hackathon, seminar teknologi, dan program sertifikasi untuk mempersiapkan mahasiswa menghadapi industri digital.',
                'kegiatan'=> ['IT Bootcamp', 'Hackathon HMIT', 'Seminar Teknologi', 'Workshop Programming & Design'],
            ],
            [
                'id'      => 6,
                'icon'    => 'bi-bag-fill',
                'color'   => '#be123c',
                'title'   => 'Kewirausahaan',
                'short'   => 'HMIT KICEN',
                'program' => 'HMIT KICEN',
                'desc'    => 'Mendorong jiwa kewirausahaan mahasiswa Informatika melalui program HMIT KICEN yang menggabungkan teknologi dengan dunia bisnis.',
                'detail'  => 'HMIT KICEN (Kreativitas, Inovasi, dan Entrepreneurship) adalah program unggulan departemen kewirausahaan yang membekali mahasiswa dengan pengetahuan bisnis, mentorship dari praktisi, serta wadah untuk mengembangkan startup dan produk digital.',
                'kegiatan'=> ['HMIT KICEN Bazaar', 'Workshop Startup', 'Mentoring Wirausaha', 'Pameran Produk Teknologi'],
            ],
        ];
    }

    private function programs(): array
    {
        return [
            ['nama'=>'Kaderisasi',        'dept'=>'PSPM',   'bulan'=>'Februari',  'status'=>'Selesai',    'icon'=>'bi-mortarboard-fill', 'color'=>'navy'],
            ['nama'=>'IT Bootcamp',        'dept'=>'PWTI',   'bulan'=>'Maret',     'status'=>'Selesai',    'icon'=>'bi-cpu-fill',          'color'=>'blue'],
            ['nama'=>'HMIT Go To School',  'dept'=>'Sosmas', 'bulan'=>'April',     'status'=>'Berlangsung','icon'=>'bi-people-fill',       'color'=>'green'],
            ['nama'=>'WINTER',             'dept'=>'Media',  'bulan'=>'Mei',       'status'=>'Akan Datang','icon'=>'bi-camera-video-fill', 'color'=>'purple'],
            ['nama'=>'HMIT Futsal Cup',    'dept'=>'KeSor',  'bulan'=>'Juni',      'status'=>'Akan Datang','icon'=>'bi-trophy-fill',       'color'=>'orange'],
            ['nama'=>'HMIT KICEN',         'dept'=>'Wirausaha','bulan'=>'Agustus', 'status'=>'Akan Datang','icon'=>'bi-bag-fill',          'color'=>'red'],
        ];
    }

    /* ── Controllers ─────────────────────────────── */

    public function home()
    {
        return view('pages.home', [
            'departments' => $this->departments(),
            'programs'    => $this->programs(),
        ]);
    }

    public function about()
    {
        $values = [
            ['icon'=>'bi-lightning-charge-fill','title'=>'Progresif',     'desc'=>'Selalu bergerak maju, adaptif terhadap perubahan, dan tidak takut berinovasi.'],
            ['icon'=>'bi-people-fill',          'title'=>'Kolaboratif',   'desc'=>'Membangun sinergi antar anggota dan pemangku kepentingan untuk hasil terbaik.'],
            ['icon'=>'bi-geo-alt-fill',          'title'=>'Berdampak',    'desc'=>'Setiap langkah ditujukan untuk memberikan dampak nyata bagi mahasiswa dan masyarakat.'],
            ['icon'=>'bi-shield-check-fill',     'title'=>'Profesional',  'desc'=>'Mengedepankan integritas, tanggung jawab, dan standar kerja yang tinggi.'],
        ];
        return view('pages.about', compact('values'));
    }

    public function index_departments()
{
    return view('pages.departments', [
        'departments' => $this->departments(), // Ini memanggil fungsi di baris 10
    ]);
}

   public function index_programs()
{
    return view('pages.programs', [
        'programs' => $this->programs(),
    ]);
}

    public function contact()
    {
        return view('pages.contact');
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:100',
            'email'  => 'required|email',
            'subjek' => 'required|string|max:150',
            'pesan'  => 'required|string|max:1000',
        ]);

        // Di sini bisa ditambahkan Mail::to() untuk kirim email
        // Mail::to('hmit@uts.ac.id')->send(new ContactMail($request->all()));

        return back()->with('success', 'Pesan kamu berhasil dikirim! Tim HMIT akan segera menghubungi kamu. 🎉');
    }
}
