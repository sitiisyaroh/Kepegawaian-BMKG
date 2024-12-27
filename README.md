# Sistem Informasi Data Kepegawaian  
Sistem ini dirancang untuk menyimpan dan mengelola data kepegawaian di **BMKG Stasiun Klimatologi Jawa Tengah**. Aplikasi ini mencakup pengelolaan data pegawai, diklat, pendidikan, dan riwayat pekerjaan. Dibangun menggunakan **PHP** dan **MySQL**.

---

## Fitur
- **Data Pegawai**: Menyimpan data pribadi pegawai (nama, NIP, jabatan, dll.).  
- **Data Diklat**: Mengelola data pendidikan dan pelatihan pegawai.  
- **Riwayat Pendidikan**: Menyimpan riwayat pendidikan formal pegawai.  
- **Riwayat Pekerjaan**: Mencatat riwayat pekerjaan pegawai di berbagai posisi.  
- **Pencarian Data**: Mempermudah pencarian data pegawai berdasarkan kriteria tertentu.  
- **Keamanan**: Login untuk mengakses sistem.

---

## Teknologi yang Digunakan
- **Back-End**: PHP  
- **Database**: MySQL  
- **Front-End**: HTML, CSS, JavaScript  
- **Server**: Apache (XAMPP atau LAMP)

---

## Cara Instalasi
1. **Clone Repositori**  
   Clone repositori ini ke komputer Anda:  
   ```bash
   git clone https://github.com/sitiisyaroh/repo-kepegawaian.git
   cd repo-kepegawaian
2. **Siapkan Server Lokal**
Pastikan XAMPP atau server berbasis PHP lainnya telah diinstal. Aktifkan Apache dan MySQL.

3. **Konfigurasi Database**

- Buka phpMyAdmin melalui browser.
- Buat database baru, misalnya kepegawaian.
- Import file database yang ada di folder db/kepegawaian.sql.

4. **Sesuaikan File Konfigurasi**
Edit file config.php untuk menyesuaikan dengan server lokal Anda:
<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "kepegawaian";
?>

5. **Jalankan Aplikasi**
Akses melalui browser: http://localhost/repo-kepegawaian.
Login menggunakan akun default:
- Username: admin
- Password: admin123

---

## Struktur Folder
- /db: File SQL untuk database.
- /assets: File CSS, JavaScript, dan gambar.
- /includes: File PHP untuk konfigurasi dan koneksi database.
- /modules: Modul utama untuk pengelolaan data.
- /index.php: Halaman utama aplikasi.

---

## Dokumentasi
Berikut beberapa tampilan dari sistem ini:

Dashboard Utama


https://github.com/user-attachments/assets/5605e66b-e318-4d14-9118-957f8b8deaf4

