# DiArsip - Sistem Pengelolaan Arsip Digital

<p align="center">
    <img src="public/images/logo.svg" width="200" alt="DiArsip Logo">
</p>

<p align="center">
    <strong>Aplikasi Web untuk Pengelolaan Arsip Digital yang Modern dan Efisien</strong>
</p>

---

## 📋 Daftar Isi

- [Tentang DiArsip](#tentang-diarsip)
- [Fitur Utama](#fitur-utama)
- [Teknologi yang Digunakan](#teknologi-yang-digunakan)
- [Requirements](#requirements)
- [Instalasi](#instalasi)
- [Konfigurasi](#konfigurasi)
- [Menjalankan Aplikasi](#menjalankan-aplikasi)
- [Kredensial Login](#kredensial-login)
- [Struktur Folder](#struktur-folder)
- [Troubleshooting](#troubleshooting)
- [Lisensi](#lisensi)

---

## 🎯 Tentang DiArsip

DiArsip adalah aplikasi berbasis web yang dirancang untuk membantu organisasi dalam mengelola dokumen dan arsip digital secara terstruktur dan efisien. Aplikasi ini menyediakan sistem kategorisasi yang fleksibel, pencarian yang powerful, dan fitur export yang lengkap.

---

## ✨ Fitur Utama

### 1. **Autentikasi & Otorisasi**
- ✅ Login untuk Admin dan User
- ✅ Role-based access control
- ✅ Session management yang aman

### 2. **Dashboard Interaktif**
- ✅ Statistik total dokumen, ukuran file, dan kategori
- ✅ Grafik upload dokumen per bulan
- ✅ Daftar dokumen terbaru
- ✅ Quick access ke kategori

### 3. **Manajemen Dokumen**
- ✅ Upload dokumen (PDF, DOC, DOCX, XLS, XLSX, JPG, PNG) - Max 10MB
- ✅ Edit dan hapus dokumen
- ✅ Download dokumen original
- ✅ Preview dokumen (untuk PDF dan gambar)
- ✅ Metadata lengkap (nomor dokumen, tanggal, kategori, status, dll)

### 4. **Pencarian & Filter**
- ✅ Search berdasarkan judul, nomor dokumen, deskripsi
- ✅ Filter berdasarkan kategori
- ✅ Filter berdasarkan status (Aktif/Arsip)
- ✅ Filter berdasarkan tanggal
- ✅ Pagination untuk data yang besar

### 5. **Export Data**
- ✅ **Export ke PDF** - Laporan lengkap untuk 1 dokumen
- ✅ **Export ke Excel** - Seluruh data dokumen dalam bentuk tabel

### 6. **Manajemen Kategori**
- ✅ Tambah, edit, hapus kategori
- ✅ Kategori hierarki (parent-child)
- ✅ Jumlah dokumen per kategori

---

## 🛠 Teknologi yang Digunakan

- **Backend Framework**: Laravel 12.x
- **PHP**: 8.2+
- **Database**: MySQL/MariaDB
- **Frontend**: Bootstrap 5.3
- **Icons**: BoxIcons
- **Charts**: Chart.js
- **PDF Generation**: DomPDF
- **Excel Export**: Maatwebsite/Laravel-Excel
- **Server**: XAMPP (Apache & MySQL)

---

## 📦 Requirements

Pastikan sistem Anda memenuhi requirement berikut:

- **PHP** >= 8.2
- **MySQL** atau MariaDB
- **Composer** (Dependency Manager untuk PHP)
- **XAMPP** (untuk Apache & MySQL)
- **Git** (optional, untuk clone repository)

---

## 🚀 Instalasi

### Step 1: Download/Clone Project

Jika belum ada, download atau clone project ke folder XAMPP htdocs:

```bash
cd c:\xampp\htdocs
git clone <repository-url> DiArsip
# atau extract ZIP ke folder DiArsip
```

### Step 2: Masuk ke Folder Project

```bash
cd c:\xampp\htdocs\DiArsip\DiArsip
```

### Step 3: Install Dependencies

Install semua dependencies PHP menggunakan Composer:

```bash
composer install
```

**Jika terjadi error memory limit:**
```bash
php -d memory_limit=-1 composer install
```

### Step 4: Install Package Tambahan

Install package untuk export PDF dan Excel:

```bash
composer require barryvdh/laravel-dompdf
composer require maatwebsite/excel
```

### Step 5: Setup Environment File

Copy file `.env.example` menjadi `.env`:

```bash
copy .env.example .env
```

### Step 6: Generate Application Key

```bash
php artisan key:generate
```

---

## ⚙️ Konfigurasi

### 1. Konfigurasi Database

Edit file `.env` dan sesuaikan dengan konfigurasi database Anda:

```env
APP_NAME=DiArsip
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=diarsip
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
```

### 2. Buat Database

- Buka **XAMPP Control Panel**
- Start **Apache** dan **MySQL**
- Buka **phpMyAdmin**: http://localhost/phpmyadmin
- Klik **New** (atau **Baru**)
- Nama database: `diarsip`
- Collation: `utf8mb4_unicode_ci`
- Klik **Create**

### 3. Jalankan Migration

Buat semua tabel yang diperlukan:

```bash
php artisan migrate:fresh
```

**Atau jika ingin langkah per langkah:**

```bash
php artisan migrate --path=database/migrations/0001_01_01_000000_create_users_table.php
php artisan migrate --path=database/migrations/0001_01_01_000001_create_cache_table.php
php artisan migrate --path=database/migrations/2024_01_01_000001_add_role_to_users_table.php
php artisan migrate --path=database/migrations/2024_01_01_000002_create_categories_table.php
php artisan migrate --path=database/migrations/2024_01_01_000003_create_documents_table.php
```

### 4. Jalankan Seeder

Isi database dengan data awal (user dan kategori):

```bash
php artisan db:seed
```

### 5. Buat Storage Link

Buat symbolic link untuk akses file upload:

```bash
php artisan storage:link
```

### 6. Clear All Cache

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan optimize:clear
composer dump-autoload
```

---

## 🎮 Menjalankan Aplikasi

### Metode 1: Laravel Development Server (Recommended)

```bash
php artisan serve
```

Akses aplikasi di: **http://localhost:8000**

### Metode 2: XAMPP

- Pastikan Apache & MySQL sudah running di XAMPP
- Akses: **http://localhost/DiArsip/DiArsip/public**

**Note:** Untuk production, gunakan virtual host dan pastikan document root mengarah ke folder `public`.

---

## 🔐 Kredensial Login

Setelah menjalankan seeder, gunakan kredensial berikut untuk login:

### Admin Account
- **Username**: `admin`
- **Password**: `admin123`
- **Email**: admin@diarsip.com
- **Role**: Administrator

### User Account
- **Username**: `user`
- **Password**: `user123`
- **Email**: user@diarsip.com
- **Role**: Regular User

---

## 📁 Struktur Folder

```
DiArsip/
├── app/
│   ├── Exports/
│   │   └── DocumentsExport.php      # Class export Excel
│   ├── Http/
│   │   └── Controllers/
│   │       ├── AuthController.php   # Authentication & Dashboard
│   │       ├── DocumentController.php
│   │       └── CategoryController.php
│   └── Models/
│       ├── User.php
│       ├── Document.php
│       └── Category.php
├── database/
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 2024_01_01_000001_add_role_to_users_table.php
│   │   ├── 2024_01_01_000002_create_categories_table.php
│   │   └── 2024_01_01_000003_create_documents_table.php
│   └── seeders/
│       └── DatabaseSeeder.php
├── public/
│   ├── css/
│   │   ├── login.css
│   │   └── main.css
│   ├── js/
│   │   ├── login.js
│   │   ├── main.js
│   │   ├── dokumen.js
│   │   └── kategori.js
│   ├── images/
│   │   └── logo.svg
│   └── storage/               # Symlink ke storage/app/public
├── resources/
│   └── views/
│       ├── auth/
│       │   └── login.blade.php
│       ├── documents/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   ├── show.blade.php
│       │   └── pdf.blade.php
│       ├── categories/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   └── edit.blade.php
│       ├── layouts/
│       │   ├── app.blade.php
│       │   ├── auth.blade.php
│       │   ├── navbar.blade.php
│       │   └── sidebar.blade.php
│       └── dashboard.blade.php
├── routes/
│   └── web.php                # Routing aplikasi
├── storage/
│   └── app/
│       └── public/
│           └── documents/     # Folder upload dokumen
└── .env                       # Konfigurasi environment
```

---

## 🔧 Troubleshooting

### Error: "No application encryption key has been specified"

**Solusi:**
```bash
php artisan key:generate
```

### Error: "SQLSTATE[HY000] [1049] Unknown database 'diarsip'"

**Solusi:**
- Buka phpMyAdmin: http://localhost/phpmyadmin
- Buat database dengan nama `diarsip`
- Jalankan `php artisan migrate:fresh`

### Error: "SQLSTATE[42S02]: Base table or view not found"

**Solusi:**
```bash
php artisan migrate:fresh
php artisan db:seed
```

### Error: "The file does not exist" saat download dokumen

**Solusi:**
```bash
php artisan storage:link
```

### Error: Permission denied (Linux/Mac)

**Solusi:**
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

### Error: Port 8000 sudah dipakai

**Solusi:**
```bash
php artisan serve --port=8001
```

### Error: Composer memory limit

**Solusi:**
```bash
php -d memory_limit=-1 composer install
```

### Error: "Class 'App\Exports\DocumentsExport' not found"

**Solusi:**
```bash
composer dump-autoload
php artisan config:clear
```

### Error: XAMPP MySQL tidak bisa start

**Solusi:**
- Port 3306 mungkin digunakan aplikasi lain
- Stop service MySQL lain yang berjalan
- Atau ubah port MySQL di XAMPP config

---

## 📚 Panduan Penggunaan

### Upload Dokumen

1. Login ke aplikasi
2. Klik menu **Dokumen** di sidebar
3. Klik tombol **Tambah Dokumen**
4. Isi form:
   - Judul Dokumen
   - Nomor Dokumen (unik)
   - Kategori
   - Tanggal Dokumen
   - Status (Aktif/Arsip)
   - Deskripsi (optional)
   - Upload File (max 10MB)
5. Klik **Simpan**

### Export ke Excel

1. Masuk ke halaman **Daftar Dokumen**
2. (Optional) Gunakan filter untuk menyaring data
3. Klik tombol **Export ke Excel**
4. File Excel akan otomatis ter-download

### Export ke PDF (Laporan)

1. Masuk ke **Detail Dokumen**
2. Klik tombol **Export ke PDF (Laporan)**
3. File PDF laporan akan otomatis ter-download

### Mengelola Kategori

1. Klik menu **Kategori** di sidebar
2. Klik **Tambah Kategori Baru**
3. Isi nama kategori dan deskripsi
4. Pilih kategori induk (optional untuk sub-kategori)
5. Klik **Simpan**

---

## 🧪 Testing

Untuk menjalankan test (jika sudah dibuat):

```bash
php artisan test
```

---

## 📝 Catatan Penting

- **File Upload**: Maksimal 10MB per file
- **Format File**: PDF, DOC, DOCX, XLS, XLSX, JPG, JPEG, PNG
- **Session**: Menggunakan database driver
- **Storage**: File disimpan di `storage/app/public/documents`

---

## 🔒 Keamanan

- Selalu gunakan HTTPS di production
- Ubah kredensial default setelah instalasi
- Jangan commit file `.env` ke repository
- Backup database secara berkala
- Update dependencies secara rutin

---

## 🤝 Kontribusi

Jika Anda ingin berkontribusi pada project ini:

1. Fork repository
2. Buat branch fitur (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

---

## 📄 Lisensi

Project ini menggunakan lisensi [MIT License](https://opensource.org/licenses/MIT).

---

## 📧 Kontak

Untuk pertanyaan atau dukungan, silakan hubungi:

- **Email**: admin@diarsip.com
- **Website**: http://localhost:8000

---

## 🙏 Acknowledgments

- [Laravel](https://laravel.com) - The PHP Framework
- [Bootstrap](https://getbootstrap.com) - CSS Framework
- [BoxIcons](https://boxicons.com) - Icon Library
- [Chart.js](https://chartjs.org) - Charting Library
- [DomPDF](https://github.com/barryvdh/laravel-dompdf) - PDF Generation
- [Laravel Excel](https://laravel-excel.com) - Excel Export

---

<p align="center">
    Made with ❤️ for better document management
</p>
