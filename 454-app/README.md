##  UPK 454 App
---
 Aplikasi peminjaman ruang kelas pada Gedung 454, Politeknik Negeri Banyuwangi. Project ini dibuat dengan tujuan untuk memudahkan UPK dalam pencatatan peminjaman ruang kelas pada Gedung 454. Aplikasi ini dibuat berbasis website dan *mobile*.

## Install and Setup Laravel Project

Berikut adalah langkah-langkah:

#### 1. Melakukan `git clone` Laravel Project
Untuk melakukan `clone` dengan menggunakan perintah berikut :
```sh
git clone https://github.com/royhairul/web-upk-454-app.git
```

#### 2. Masuk ke Laravel Project
Sebelum melakukan konfigurasi masuk ke dalam direktori project terlebih dahulu :
```sh
cd web-upk-454-app
```

#### 3. Instalasi `composer`
Melakukan instalasi yang dibutuhkan dalam project laravel dengan menggunakan `composer` :
```sh
composer install
```

#### 4. Salin `.env.example`
Menyalin file `.env.example` dan simpan dengan nama `.env` yang nantinya akan digunakan sebagai file konfigurasi database dan hal yang lainnya.

Jika Menggunakan `git_bash/linux`
```sh
cp .env.example .env
```

Jika Menggunakan `command prompt` pada `windows`
```sh
copy .env.example .env
```

#### 5. Konfigurasi Database
Melakukan konfigurasi pada file `.env` tepatnya pada baris berikut :
```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT= [Port MySQL]
DB_DATABASE= db_upk
DB_USERNAME= [Database User]
DB_PASSWORD= [Database Password]
```
Untuk `DB_PORT`, `DB_USERNAME`, dan `DB_PASSWORD` sesuaikan dengan settingan user masing-masing

#### 6. Generate `encryption key`
Melakukan generate key untuk project laravel
```sh
php artisan key:generate
```

#### 7. Melakukan `migrate`
Melakukan `migrate`untuk membuat skema database yang sudah dibuat.
```sh
php artisan migrate
```

#### 8. Menjalankan `seeder` (Opsional)
Menjalankan file `seeder` untuk melakukan pengisian data yang telah dibuat pada project ini. 
```sh
php artisan db:seed
```

#### 9. Run Project Laravel
Menjalankan project laravel dengan perintah :
```sh
php artisan serve
```
