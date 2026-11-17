# Sistem Perpustakaan Digital Kampus

Aplikasi manajemen perpustakaan digital berbasis Laravel 12 yang mencakup fitur pengelolaan buku, kategori, anggota, transaksi peminjaman dengan peringatan deadline, upload sampul buku, autentikasi berbasis sesi, serta konsumsi REST API internal.

## Cara Menjalankan Project Secara Lokal

1. **Clone Repository**
   ```bash
   git clone [https://github.com/MasFalichAhmad/app-perpustakaan.git](https://github.com/MasFalichAhmad/app-perpustakaan.git)
   cd app-perpustakaan
   ```

2. **Install Dependencies**
   ```bash
   composer install
   ```

3. **Setup File `.env`**
   Salin file `.env.example` menjadi `.env`, lalu sesuaikan konfigurasi database MySQL dan tambahkan variabel `INTERNAL_API_URL`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=db_perpustakaan
   DB_USERNAME=root
   DB_PASSWORD=

   INTERNAL_API_URL=[http://127.0.0.1:8011](http://127.0.0.1:8011)
   ```

4. **Generate Key, Storage Link, dan Seeding Database**
   ```bash
   php artisan key:generate
   php artisan storage:link
   php artisan migrate:fresh --seed
   ```

5. **Menjalankan Dua Server**
   Halaman Dashboard dan Laporan mengambil data langsung dari API internal menggunakan Laravel HTTP Client, sehingga wajib menjalankan dua server secara bersamaan di dua terminal terpisah:
   - **Terminal 1 untuk trafik web utama:**
     ```bash
     php artisan serve --port=8000
     ```
   - **Terminal 2 untuk layanan API internal:**
     ```bash
     php artisan serve --port=8011
     ```

6. **Akses Aplikasi**
   Buka browser menuju alamat `http://127.0.0.1:8000/login` dan masuk menggunakan akun hasil seeder yaitu email `admin@pens.ac.id` dengan password `password`.