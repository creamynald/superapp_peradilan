# Superapp Peradilan

Proyek Laravel untuk membuat Superapp peradilan, menggabungkan fitur administrasi, manajemen perkara, dan peran pengguna dalam satu aplikasi.

## Fitur Utama (W.I.P)
- Login menggunakan NIP (Nomor Induk Pegawai) 
- User/Data Pegawai sudah Terintegrasi dengan SIMTEPA
- Jurnal Perkara terintegrasi dengan SIPP lokal 
- Data Saksi to PDF
- Monitoring Arsip Perkara
- Monitoring Cuti Pegawai
- Penilaian Internal Pegawai
- Kebersihan Ruangan

## Prasyarat
- PHP 8.x
- Composer
- MySQL / PostgreSQL atau database lain yang didukung Laravel
- Node.js & npm/yarn (opsional, untuk build frontend)

## Instalasi Pengembangan
1. Clone repositori:
```bash
git clone https://github.com/creamynald/superapp_peradilan.git
cd superapp_peradilan
```
2. Install dependensi PHP:
```bash
composer install
```
3. Salin file environment dan konfigurasi:
```bash
cp .env.example .env
# edit .env untuk DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD, dll.
# jangan lupa isi FONNTE_TOKEN dan SIMTEPA_TOKEN di .env
php artisan key:generate
```
4. Jalankan migrasi dan seeder database:
```bash
php artisan migrate
php artisan db:seed
```
5. Buat super admin:
```bash
php artisan shield:super-admin
# atau perintah lain sesuai implementasi proyek untuk membuat akun super admin
```
6. Mulai server lokal:
```bash
php artisan serve
```

## Mulai Cepat
- Akses aplikasi di http://127.0.0.1:8000/mimin
- Login dengan akun super admin yang dibuat melalui perintah artisan
- Kelola pengguna, perkara, dan modul lain dari dashboard admin

## Kontribusi
1. Fork repositori
2. Buat branch fitur: `git checkout -b feat/nama-fitur`
3. Commit dan push: `git commit -m "Tambah fitur X"` lalu `git push`
4. Buat Pull Request yang deskriptif

## Kontak
creamynald@gmail.com
