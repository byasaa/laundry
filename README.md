<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Installation

Laravel 7.x menggunakan PHP versi 7.2. Kemungkinan akan ada kesalahan di beberapa versi. Jadi kalau belum update dulu. Lalu pastikan sudah menginstal composer.

1. Clone repository, bisa di download .zip atau dengan perintah git clone seperti ini

```
git clone https://github.com/byasaa/laundry.git
```

2. Pada cmd, pindah ke folder prognet8 contohnya

```
cd c:/xampp/htdocs/laundry
```

lalu instal composer

```
composer install
```

3. Edit pengaturan database di file `.env`, juga masukkan perintah ini untuk mengisi `APP_KEY`

```
php artisan key:generate
```

4. Migrasi tabelnya ke database dengan perintah

```
php artisan migrate
```

Lalu masukkan perintah berikut untuk insert beberapa data ke database

```
php artisan db:seed
```

5. Siap dijalankan...
