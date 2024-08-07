# Sistem Pakar Diagnosa Penyakit Sapi

## Deskripsi Proyek

Proyek ini adalah Sistem Pakar Diagnosa Penyakit Sapi yang dibangun menggunakan Laravel. Sistem ini bertujuan untuk memberikan diagnosa penyakit sapi berdasarkan gejala yang diinputkan oleh pengguna dengan menggunakan metode Forward Chaining.

## Persiapan Proyek

### 1 Instalasi Laravel
Pastikan Anda telah menginstal [Composer](https://getcomposer.org/) dan [PHP](https://www.php.net/). Kemudian, Anda dapat menginstal Laravel dengan menjalankan perintah berikut:

```bash
    composer create-project --prefer-dist laravel/laravel Pakar-Sapi
```
### 2 Konfigurasi .env
Salin file .env.example ke file .env:

```bash
    cp .env.example .env
```

### 3 Generate Key Aplikasi
Generate key aplikasi dengan perintah:

```bash
    php artisan key:generate

```

### 4 Migrasi Database
Jalankan migrasi untuk membuat tabel yang diperlukan di database:

```bash
    php artisan migrate
```

### 5 Jalankan Server
Jalankan server secara local dengan menggunakan

```bash
    php artisan serve
```
Akses aplikasi melalui http://localhost:8000.

## Penjelasan Singkat

### Laravel
Laravel adalah framework PHP yang menyediakan berbagai fitur untuk mempermudah pengembangan aplikasi web. Laravel menawarkan berbagai alat dan pustaka untuk routing, ORM (Eloquent), migrasi database, dan pengelolaan autentikasi. Dengan Laravel, pengembangan aplikasi web menjadi lebih cepat dan efisien.

### Forward Chaining
Forward Chaining adalah metode dalam sistem pakar untuk proses inferensi. Metode ini dimulai dari data yang sudah ada (gejala) dan mencoba untuk mencocokkannya dengan aturan yang ada untuk mencapai kesimpulan (diagnosa penyakit). Proses ini dilakukan dengan memeriksa aturan satu per satu dan melakukan inferensi berdasarkan data yang diberikan hingga mencapai kesimpulan yang tepat.

## Panduan Penggunaan

1. Tambahkan Data: Tambahkan data gejala dan penyakit melalui antarmuka admin atau menggunakan seeder.
2. Diagnosa: Masukkan gejala yang dialami sapi melalui antarmuka pengguna untuk mendapatkan diagnosa penyakit menggunakan metode Forward Chaining.
3. Perbarui: Perbarui aturan dan data sesuai kebutuhan untuk meningkatkan akurasi diagnosa.


Jika Anda memiliki pertanyaan atau membutuhkan bantuan lebih lanjut, jangan ragu untuk menghubungi!

*WillHamz Dev*