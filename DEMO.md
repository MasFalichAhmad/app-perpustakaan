# Panduan Alur Penggunaan Aplikasi - Perpustakaan Digital Kampus

Berikut adalah urutan langkah-langkah penggunaan fitur utama pada aplikasi `app-perpustakaan`:

1. **Login sebagai Petugas atau Admin**: Buka halaman `/login` lalu masuk menggunakan akun yang tersedia seperti `admin@pens.ac.id` dengan password `password`, kemudian sistem akan mengarahkan ke halaman Dashboard dengan menampilkan nama serta role pengguna di navbar.
2. **Tampilkan Dashboard Statistik**: Pada halaman Dashboard, tampil tiga kartu statistik yaitu Total Buku, Total Anggota, dan Peminjaman Aktif yang datanya diambil melalui endpoint `GET /api/stats`.
3. **Tambah Kategori Baru**: Buka menu `/categories`, tambahkan satu kategori baru melalui formulir, lalu data akan tersimpan dan muncul pada daftar beserta notifikasi sukses.
4. **Tambah Buku dengan Kategori**: Buka menu `/books`, tambahkan buku baru beserta sampul buku dan pilihan kategori dari dropdown, lalu data akan tersimpan dan tampil pada daftar buku.
5. **Tambah Anggota Baru**: Buka menu `/members`, tambahkan anggota baru melalui formulir, lalu data akan tersimpan dengan validasi otomatis untuk memastikan NIM dan email bersifat unik.
6. **Buat Transaksi Peminjaman**: Buka `/loans/create`, buat transaksi peminjaman baru dengan memilih anggota serta buku yang dipinjam, dan identitas petugas akan terisi otomatis sesuai akun yang sedang login.
7. **Lihat Daftar Peminjaman Aktif**: Buka menu `/loans` untuk melihat transaksi yang sedang berjalan dengan status dipinjam beserta detail nama anggota, petugas, dan judul buku.
8. **Proses Pengembalian Buku**: Lakukan proses pengembalian buku pada transaksi yang aktif melalui halaman web atau endpoint `PUT /api/loans/{id}/kembalikan` hingga statusnya berubah menjadi dikembalikan.
9. **Tampilkan Halaman Laporan**: Buka `/loans/report` untuk melihat rekapitulasi seluruh transaksi lengkap dengan indikator peringatan deadline pengembalian yang diambil dari API `GET /api/loans`.
10. **Pengujian Endpoint API**: Jalankan pengujian pada Postman untuk endpoint `GET /api/books` dan `GET /api/stats` guna melihat format response JSON yang terstruktur.