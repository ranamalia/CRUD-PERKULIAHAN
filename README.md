# Sistem Perkuliahan - PHP MVC

Aplikasi web sistem perkuliahan yang dibangun menggunakan PHP dengan arsitektur MVC (Model-View-Controller).

## Fitur Utama

### Master Data
- **Data Mahasiswa**: CRUD lengkap untuk mengelola data mahasiswa (NIM, Nama, Alamat)
- **Data Dosen**: CRUD lengkap untuk mengelola data dosen (NIP, Nama, Alamat)
- **Data Mata Kuliah**: CRUD lengkap untuk mengelola mata kuliah (Kode, Nama, SKS, Semester)

### Data Transaksi
- **Data Kuliah**: CRUD lengkap untuk mengelola data kuliah dan nilai mahasiswa
- Relasi antar tabel dengan foreign key constraints
- Validasi data input yang komprehensif

## Teknologi yang Digunakan

- **Backend**: PHP Native dengan arsitektur MVC
- **Database**: MySQL
- **Frontend**: HTML5, CSS3 dengan font Poppins
- **Design**: Responsive design dengan warna #94C2DA, #E7A0CC, #EFE8E0

## Struktur Database

### Tabel Master
1. **Mhs** (Mahasiswa)
   - NIM (Primary Key)
   - Nama_Mhs
   - Alamat_Mhs

2. **Dosen**
   - NIP (Primary Key)
   - Nama_Dosen
   - Alamat_Dosen

3. **MataKuliah**
   - KodeMatkul (Primary Key)
   - NamaMatkul
   - SKS
   - Semester

### Tabel Transaksi
4. **Kuliah**
   - NIM (Foreign Key ke Mhs)
   - NIP (Foreign Key ke Dosen)
   - KodeMatkul (Foreign Key ke MataKuliah)
   - Nilai
   - Primary Key: (NIM, KodeMatkul)

## Instalasi

1. **Setup Database**
   \`\`\`sql
   -- Jalankan file database/migration.sql untuk membuat struktur database
   -- Jalankan file database/seeder.sql untuk data sample
   \`\`\`

2. **Konfigurasi**
   - Edit file `config/config.php` untuk menyesuaikan pengaturan database
   - Pastikan BASE_URL sesuai dengan lokasi aplikasi

3. **Web Server**
   - Pastikan PHP dan MySQL sudah terinstall
   - Jalankan aplikasi melalui web server (Apache/Nginx) atau PHP built-in server

## Struktur Aplikasi

\`\`\`
perkuliahan-app/
├── config/
│   ├── config.php          # Konfigurasi aplikasi
│   └── database.php        # Koneksi database
├── controllers/
│   ├── BaseController.php  # Controller dasar
│   ├── DashboardController.php
│   ├── MhsController.php
│   ├── DosenController.php
│   ├── MatakuliahController.php
│   └── KuliahController.php
├── models/
│   ├── BaseModel.php       # Model dasar
│   ├── Mhs.php
│   ├── Dosen.php
│   ├── MataKuliah.php
│   └── Kuliah.php
├── views/
│   ├── layouts/
│   │   ├── header.php
│   │   ├── sidebar.php
│   │   └── footer.php
│   ├── dashboard/
│   ├── mhs/
│   ├── dosen/
│   ├── matakuliah/
│   └── kuliah/
├── assets/
│   └── css/
│       └── style.css       # Styling dengan font Poppins
├── database/
│   ├── migration.sql       # Script pembuatan database
│   └── seeder.sql         # Data sample
└── index.php              # Entry point aplikasi
\`\`\`

## Fitur Keamanan

- Input validation pada semua form
- Prepared statements untuk mencegah SQL injection
- HTML escaping untuk mencegah XSS
- Foreign key constraints untuk integritas data

## Desain UI/UX

- Font: Poppins dari Google Fonts
- Warna utama: #94C2DA (biru muda), #E7A0CC (pink muda), #EFE8E0 (krem)
- Layout responsive dengan sidebar navigasi
- Tanpa gradasi warna sesuai permintaan
- Footer informatif

## Cara Penggunaan

1. **Dashboard**: Melihat statistik dan navigasi utama
2. **Master Data**: Kelola data mahasiswa, dosen, dan mata kuliah
3. **Data Kuliah**: Input dan kelola nilai mahasiswa per mata kuliah
4. **Validasi**: Sistem akan memvalidasi input dan menampilkan pesan error jika ada kesalahan

## Kontributor

Aplikasi ini dibuat sebagai implementasi sistem perkuliahan dengan arsitektur MVC menggunakan PHP native.
