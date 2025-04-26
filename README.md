Proyek UTS: Sistem Manajemen Inventori
Nama : Nicholas Alfandhy Kurniawan
Nim : A11.2022.14004
Deskripsi Proyek

Proyek UTS ini adalah sistem manajemen inventori sederhana menggunakan Laravel untuk mengelola barang, kategori, dan pemasok, serta menampilkan laporan stok.

Langkah Pengerjaan

Inisialisasi Proyek:
Membuat proyek Laravel baru via Laragon: laravel new inventory-system.
Mengatur file .env untuk koneksi database.

Containerisasi:
Menggunakan Docker untuk lingkungan konsisten.
Membuat docker-compose.yml (layanan: MySQL).

Menjalankan: docker-compose up -d.

Membuat Model dan Migrasi:
Membuat model: Admin, Category, Supplier, Item dengan perintah: php artisan make:model NamaModel -m.
Mengatur relasi: Admin ke semua (created_by), Category dan Supplier ke Item.
Migrasi: docker-compose exec app php artisan migrate.

Controller dan View Dasar:
Membuat controller: Dashboard, Item, Category, Supplier.
Membuat view: dashboard, item, category, supplier.

Fitur:
Create + Read untuk Item, Category, Supplier.

Admin: Memilih admin dari database (tanpa login, seeded manual).

Route di web.php:

Menambahkan route: /dashboard, /items, /categories, /suppliers.

Menghapus prefix admin untuk menyederhanakan route.

Fitur Laporan:

Membuat StockReportController.

Fitur laporan:
Ringkasan stok (total stok, nilai stok, rata-rata harga).
Stok rendah (< 5 unit).
Barang per kategori.
Ringkasan per kategori (jumlah barang, nilai stok, rata-rata harga).
Ringkasan per pemasok (jumlah barang, nilai stok).
Ringkasan sistem (total barang, nilai stok, jumlah kategori, pemasok).

Route: /stock/summary, /stock/low, dll.

Perbaikan Route:
Menyesuaikan redirect di controller agar sesuai route terbaru (misalnya, items bukan admin.items).

Pengujian:

Menguji semua fitur (tambah data, laporan).

Membersihkan cache: docker-compose exec app php artisan route:clear, cache:clear, view:clear.

Restart: docker-compose down && docker-compose up -d.

Fitur Sistem:
Create dan Read untuk Item, Category, Supplier.
Laporan: stok total, stok rendah, per kategori, per pemasok, dan ringkasan sistem.

Cara Menjalankan
Clone repository.
Salin .env.example ke .env, sesuaikan database.
Jalankan: docker-compose up -d.
Migrasi dan seed: docker-compose exec app php artisan migrate, db:seed --class=AdminSeeder.
Akses: http://localhost:8000.