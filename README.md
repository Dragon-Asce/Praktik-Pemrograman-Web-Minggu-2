# SIAKAD — Sistem Informasi Akademik

Aplikasi web pengelolaan data akademik berbasis Laravel, dibuat untuk Praktikum Pemrograman Web Minggu II (Modul Laravel v4, Bab 1–8), Program Studi Teknologi Rekayasa Informatika Industri, Politeknik Manufaktur Bandung.

## Identitas

| | |
|---|---|
| Nama | Farhan Maulana |
| NIM | 225443008 |
| Kelas | 2 AEC-1 |
| Prodi | Teknologi Rekayasa Informatika Industri |
| Institusi | Politeknik Manufaktur Bandung |
| Tahun Akademik | 2026/2027 |

## Fitur

- Halaman sambutan akademik dengan nama sistem, nama kampus, dan tahun akademik
- Layout Blade bersidebar dengan menu Dashboard, Data Mahasiswa, Data Dosen, dan Data Mata Kuliah
- CRUD data mahasiswa, dosen, dan mata kuliah
- Validasi masukan: NIM/NIDN/kode MK wajib dan unik, nama minimal 3 karakter, SKS 1–8
- Autentikasi login dan registrasi; seluruh halaman akademik hanya dapat diakses setelah login
- REST API daftar dan detail mahasiswa serta mata kuliah berformat JSON, dilindungi token Sanctum

## Teknologi

| Komponen | Versi |
|---|---|
| PHP | 8.5.10 |
| Laravel | 13.40.0 |
| Laravel Breeze | 2.4 (stack Blade with Alpine, tanpa dark mode) |
| Laravel Sanctum | 4.x |
| Bootstrap | 5.3 (CDN) |
| MySQL | 8.4 |

Antarmuka memakai Bootstrap 5 melalui CDN sehingga tidak diperlukan proses *build* aset untuk menjalankan aplikasi.

## Prasyarat

- PHP 8.3 atau lebih baru beserta ekstensi `pdo_mysql`, `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `json`, `bcmath`
- Composer
- MySQL (Laragon, XAMPP, atau server mandiri)

## Instalasi

**1. Pasang dependensi**

```bat
composer install
```

**2. Siapkan berkas lingkungan**

```bat
copy .env.example .env
php artisan key:generate
```

Sesuaikan bagian basis data pada `.env`:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_akademik
DB_USERNAME=root
DB_PASSWORD=
```

**3. Buat basis data**

```sql
CREATE DATABASE db_akademik;
```

**4. Jalankan migrasi**

```bat
php artisan migrate
```

**5. Nyalakan server**

```bat
php artisan serve
```

Aplikasi dapat diakses pada `http://127.0.0.1:8000`.

**6. Buat akun admin**

Buka `http://127.0.0.1:8000/register`, isi nama, surel, dan kata sandi, lalu masuk melalui halaman login.

## Struktur Data

| Tabel | Kolom |
|---|---|
| `mahasiswas` | id, nim (unik), nama, prodi, angkatan, alamat, timestamps |
| `dosens` | id, nidn (unik), nama, bidang_keahlian, timestamps |
| `matakuliahs` | id, kode_mk (unik), nama_mk, sks, timestamps |
| `users` | id, name, email (unik), password, timestamps |
| `personal_access_tokens` | token API Sanctum |

## Halaman Web

| URL | Keterangan | Akses |
|---|---|---|
| `/` | Halaman sambutan akademik | Publik |
| `/login` | Masuk ke aplikasi | Publik |
| `/register` | Pendaftaran akun admin | Publik |
| `/dashboard` | Ringkasan aplikasi | Setelah login |
| `/mahasiswa` | Daftar data mahasiswa | Setelah login |
| `/dosen` | Daftar data dosen | Setelah login |
| `/matakuliah` | Daftar data mata kuliah | Setelah login |
| `/kelas` | Halaman data kelas | Setelah login |
| `/logout` | Keluar dari aplikasi (POST) | Setelah login |

## Endpoint API

Seluruh endpoint mengembalikan JSON dengan struktur `success`, `data`, dan `message`.

| Metode | Endpoint | Keterangan | Akses |
|---|---|---|---|
| POST | `/api/register` | Registrasi pengguna, mengembalikan token | Publik |
| POST | `/api/login` | Login pengguna, mengembalikan token | Publik |
| GET | `/api/user` | Data pengguna yang sedang terautentikasi | Token |
| GET | `/api/mahasiswaAPI` | Daftar seluruh mahasiswa | Token |
| GET | `/api/mahasiswaAPI/{id}` | Detail satu mahasiswa | Token |
| GET | `/api/matakuliahAPI` | Daftar seluruh mata kuliah | Token |
| GET | `/api/matakuliahAPI/{id}` | Detail satu mata kuliah | Token |

Contoh pemakaian:

```bat
curl -H "Accept: application/json" ^
     -H "Authorization: Bearer <token>" ^
     http://127.0.0.1:8000/api/mahasiswaAPI
```

> Endpoint `/api/register` memakai kolom `c_password` untuk konfirmasi kata sandi, bukan `password_confirmation`.

## Riwayat Praktikum

Setiap bab dikerjakan pada branch tersendiri lalu digabungkan ke `main` dengan merge commit dan diberi tag.

| Tag | Bab | Cakupan |
|---|---|---|
| `bab-01` | Instalasi Laravel dan Konfigurasi Database | Proyek Laravel, `db_akademik`, halaman welcome akademik |
| `bab-02` | Routing Laravel | Route dasar, parameter, group, dan halaman studi kasus |
| `bab-03` | Controller dan Blade Template | Controller akademik dan layout bersidebar |
| `bab-04` | Migration dan Struktur Database | Tabel mahasiswa, dosen, matakuliah, dan kolom alamat |
| `bab-05` | Model dan Eloquent ORM | Model Eloquent dan data mahasiswa dari basis data |
| `bab-06` | Pembuatan CRUD Data Akademik | CRUD mahasiswa dengan validasi |
| `bab-07` | Sistem Login dan Registrasi | Login Breeze dan proteksi halaman |
| `bab-08` | Role Permission dan REST API | REST API daftar mahasiswa dan mata kuliah |

## Struktur Direktori

```
siakad/
├── app/
│   ├── Http/
│   │   ├── Controllers/        Dashboard, Mahasiswa, Dosen, Matakuliah
│   │   │   ├── API/            BaseController, RegisterController,
│   │   │   │                   MahasiswaAPIController, MatakuliahAPIController
│   │   │   └── Auth/           Controller autentikasi dari Breeze
│   │   ├── Requests/           Form request autentikasi
│   │   └── Resources/          MahasiswaResource, MatakuliahResource
│   └── Models/                 Mahasiswa, Dosen, Matakuliah, User
├── database/migrations/        Skema tabel
├── resources/views/
│   ├── layouts/app.blade.php   Layout utama Bootstrap (navbar + sidebar)
│   ├── auth/                   Halaman login dan registrasi
│   ├── dashboard.blade.php     Halaman dashboard
│   ├── kelas.blade.php         Halaman data kelas
│   ├── mahasiswa/              View CRUD mahasiswa
│   ├── dosen/                  View CRUD dosen
│   ├── matakuliah/             View CRUD mata kuliah
│   └── welcome-akademik.blade.php  Halaman sambutan
└── routes/
    ├── web.php                 Route aplikasi web
    ├── api.php                 Route REST API
    └── auth.php                Route autentikasi
```

## Catatan

- Berkas `.env` tidak disertakan dalam repositori karena memuat kredensial basis data. Gunakan `.env.example` sebagai acuan.
- Perintah `php artisan migrate:fresh` menghapus seluruh data dan membangun ulang skema dari nol.
