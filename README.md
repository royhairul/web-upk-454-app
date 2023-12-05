##  UPK 454 App
---
 Aplikasi peminjaman ruang kelas pada Gedung 454, Politeknik Negeri Banyuwangi. Project ini dibuat dengan tujuan untuk memudahkan UPK dalam pencatatan peminjaman ruang kelas pada Gedung 454. Aplikasi ini dibuat berbasis website dan *mobile*.

## Install and Setup Laravel Project

Berikut adalah langkah-langkah:

1. Melakukan `git clone` pada project ini dengan menggunakan perintah berikut:
```sh
git clone https://github.com/royhairul/web-upk-454-app.git
```

2. Masuk ke dalam direktori project
```sh
cd web-upk-app
```

3. Instalasi dengan `composer` 
```sh
composer install
```

3. Salin file `.env.example`
```sh
cp .env.example .env
```

4. Konfigurasi database pada file `.env`
```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT= [Port MySQL]
DB_DATABASE= [Database Name]
DB_USERNAME= [Database User]
DB_PASSWORD= [Database Password]
```

5. Melakukan generate `encryption key`
```sh
php artisan key:generate
```

6. Melakukan `migrate` untuk membuat skema database
```sh
php artisan migrate
```

7. Menggunakan `seeder` untuk mengisikan data (opsional)
```sh
php artisan db:seed
```

7. Menjalankan project Laravel
```sh
php artisan serve
```
