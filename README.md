TODO
https://github.com/codegoen/spp/projects/1

# Sistem Informasi Pembayaran SPP
> *Mengelola pembayaran SPP dengan sistem informasi.*

Sistem Informasi Pembayaran SPP dibuat dengan Framework **Laravel 8** dan **Livewire 2**

### Daftar Isi
1. [Tentang Sistem Informasi SPP](#tentang)
2. [Tujuan](#tujuan)
3. [Cara Install](#cara-install)
    - [Spesifikasi yang Dibutuhkan](#spesifikasi-minimum-server)
    - [Tahap Install](#tahap-install)
4. [Developer dan Kontributor](#developer-dan-kontributor)
5. [Ingredients (Ramuan)](#ramuan)
6. [Lisensi](#license)
7. [Cara Berkontrobusi](#cara-berkontribusi)
8. [Screenshots](#screenshots)

***

## Tentang

**Sistem Informasi Pembayaran SPP** adalah software yang bertujuan untuk mempermudah pelayanan pembayaran pada sekolah. Software ini bisa digunakan untuk Sekolah Dasar/Sederajat, Sekolah Menengah Pertama/Sederajat, Sekolah Menengah Atas/Sederajat.

## Cara Install
Software ini dapat dipasang dalam server lokal (PC/Laptop) dan server online, dengan spesifikasi berikut :

#### Spesifikasi minimum server
PHP >= 7.4 (dan memenuhi [server requirement Laravel 8.x](https://laravel.com/docs/8.x/deployment#server-requirements))

1. Clone Repo pada terminal : `git clone https://github.com/codegoen/spp-sekolahala.git`
2. `$ cd spp-sekolahala`
3. `$ composer install`
4. `$ cp .env.example .env`
5. `$ php artisan key:generate`
6. Buat database pada MySQL untuk aplikasi ini
7. Setting database pada file `.env`, pada variable `APP_DEMO` ubah menjadi false
8. `$ php artisan migrate --seed`
9. `$ php artisan storage:link`
10. `$ php artisan serve`
11. Kunjungi web : `http://localhost:8000/app-install`
12. Login menggunakan email `admin@domain.com` dan password `secret`
12. Isi formulir installasi.
13. Selesai, Anda akan login sebagai Super Admin.

![Install Sistem Pembayaran SPP](docs/images/setup.png)

## Developer dan Kontributor

Project ini dikembangkan oleh [Rizkhal Lamaau](https://github.com/rizkhal) dan para [kontributor](https://github.com/codegoen/spp-sekolahal/graphs/contributors).

## Ramuan

Software ini dibangun dengan penuh cinta dan dengan bahan dan dukungan dari paket-paket berikut ini:

##### Backend
* [livewire](https://laravel-livewire.com/)
* [maatwebsite/excel](https://laravel-excel.com/)
* [nwidart/laravel-modules](https://nwidart.com/laravel-modules/v6/introduction)

##### Frontend

* [stisla](https://getstisla.com/), Admin template.
* [bootstrap4](https://getbootstrap.com/)
* [font awesome premium](https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css)
* [font awesome free](https://www.npmjs.com/package/@fortawesome/fontawesome-free)
* [select2](https://github.com/select2/select2)
* [apexcharts](https://apexcharts.com/), Grafik laporan pemasukan dan pengeluaran
* [sweetalert2](https://sweetalert2.github.io/)

## Lisensi

Project ini merupakan software free dan open source di bawah [lisensi MIT](LICENSE).

## Cara Berkontribusi

Jika ingin berkontribusi terhadap project ini, baik untuk membuat *Issue*, usulan Fitur tambahan, *Pull Request*, maupun donasi, silakan melihat [panduan kontribusi](CONTRIBUTING.md).

## Screenshots

#### Transaksi
![Transaksi](docs/images/transaction.png)

#### Report
![Report](docs/images/report.png)

README dibuat dengan refrensi dari [@nafiesl](https://github.com/nafiesl)
