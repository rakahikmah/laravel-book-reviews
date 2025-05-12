# Book Reviews Application

## Deskripsi
Hallo, kali ini saya ingin membagikan sharing terkait dasar project dan fundamentalnya. Aplikasi **Book Reviews** dibangun dengan **Laravel 12** sebagai mini project untuk pembelajaran dan implementasi konsep fundamental pemrograman web. Fitur utama:
- Melihat daftar buku
- Menampilkan detail buku
- Membuat ulasan (review)
- Memberikan rating buku

## Konsep Dasar yang Digunakan
1. **MVC (Model-View-Controller)**  
   Pola desain untuk memisahkan logika aplikasi, tampilan, dan data.
2. **Migration**  
   Mendefinisikan struktur database secara version control.
3. **Factory**  
   Menghasilkan data dummy untuk pengujian menggunakan Laravel Factory.
4. **Cache**  
   Menyimpan data sering diakses untuk meningkatkan performa.
5. **Component**  
   Membangun UI modular dengan Laravel Components.
6. **Dockerize**  
   Kemasan aplikasi dalam container untuk kemudahan deployment.
7. **Rate Limiter**  
   Membatasi jumlah request untuk mencegah penyalahgunaan API.
8. **Laravel 12**  
   Framework PHP modern sebagai dasar aplikasi.

## Fitur
- 📚 Daftar buku dengan pagination
- 🔍 Detail buku lengkap
- ✍️ Membuat ulasan/review
- ⭐ Sistem rating buku
- ⏱️ Rate limiting untuk stabilitas API

## Opsional
- Docker & Docker Compose (Ready)


Cara Penggunaan
===============

Lihat Daftar Buku
----------------

Buka halaman utama untuk melihat semua buku

Gunakan pagination untuk navigasi

Detail Buku
------------

Klik judul buku untuk melihat detail lengkap

Termasuk review dan rating
Beri Review
------------


Isi form review dan rating di halaman detail buku

Rate limiting: Maksimal 3 review/jam

Teknologi
==========

*   PHP 8.x
*   Laravel 12
*   Docker (Opsional)
*   MySQL
*   Redis (Cache)
*   Xampp/Lampp/Lamp

Tahap Instalasi
==========

# Panduan Memulai Install Laravel

Langkah-langkah berikut menjelaskan cara untuk memulai proyek Laravel yang baru saja dikloning dari repositori Git.

## Clone Repositori
Klon proyek Laravel dari repositori Git menggunakan perintah berikut:

```bash
git clone <URL_REPOSITORI>
```

Ganti `<URL_REPOSITORI>` dengan URL repositori proyek Anda.

## Masuk ke Direktori Proyek
Pindah ke direktori proyek yang baru saja dikloning:

```bash
cd <NAMA_FOLDER_PROYEK>
```

## Instal Dependensi Composer
Jalankan perintah berikut untuk menginstal semua dependensi PHP yang diperlukan:

```bash
composer install
```

## Salin File Konfigurasi
Salin file `.env.example` menjadi `.env` untuk konfigurasi lingkungan:

```bash
cp .env.example .env
```

Kemudian, sesuaikan pengaturan di file `.env`, seperti koneksi database (`DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).

## Generate Application Key
Buat kunci aplikasi Laravel dengan perintah:

```bash
php artisan key:generate
```

## Jalankan Migrasi Database
Jalankan migrasi untuk membuat tabel di database:

```bash
php artisan migrate
```

Jalankan juga:

```bash
php artisan db:seed
```

## Jalankan Server Pengembangan
Mulai server pengembangan Laravel dengan perintah:

```bash
php artisan serve
```

Secara default, aplikasi akan berjalan di [http://localhost:8000](http://localhost:8000).




## Pembelajaran
============

Proyek ini cocok untuk mempelajari:

*   Penerapan MVC di Laravel
*   Migration dan Seeder
*   Manajemen Cache
*   Implementasi Rate Limiting
*   Dockerisasi aplikasi Laravel

Kontak
======

Untuk pertanyaan terkait instalasi atau terkait soal repo ini anda bisa kontak email ini:

*   [📧 rakahikmah46@gmail.com](mailto:rakahikmah46@gmail.com)


Lisensi
========

MIT License


