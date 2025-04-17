<!-- logo -->
![Logo](https://raw.githubusercontent.com/maventama/koperasi_mitra/main/public/assets/images/logo.svg)

# Koperasi Mitra Open Source

<!-- badges -->
![GitHub issues](https://img.shields.io/github/issues/maventama/koperasi_mitra)
![GitHub forks](https://img.shields.io/github/forks/maventama/koperasi_mitra)
![GitHub stars](https://img.shields.io/github/stars/maventama/koperasi_mitra)
![GitHub license](https://img.shields.io/github/license/maventama/koperasi_mitra)
![GitHub last commit](https://img.shields.io/github/last-commit/maventama/koperasi_mitra)
![GitHub contributors](https://img.shields.io/github/contributors/maventama/koperasi_mitra)
![GitHub pull requests](https://img.shields.io/github/issues-pr/maventama/koperasi_mitra)
![GitHub commit activity](https://img.shields.io/github/commit-activity/m/maventama/koperasi_mitra)
![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/maventama/koperasi_mitra)
![GitHub repo size](https://img.shields.io/github/repo-size/maventama/koperasi_mitra)
![GitHub language count](https://img.shields.io/github/languages/count/maventama/koperasi_mitra)

## Topik
- [Koperasi Mitra Open Source](#koperasi-mitra-open-source)
- [Topik](#topik)
- [Instalasi](#instalasi)
- [Apa itu Koperasi Mitra?](#apa-itu-koperasi-mitra)
- [Database Requirements](#database-requirements)
- [PHP Requirements](#php-requirements)
- [Kontribusi](#kontribusi)
- [Lisensi](#lisensi)

## Installasi
Untuk menginstal aplikasi Koperasi Mitra, ikuti langkah-langkah berikut:
1. **Clone repositori ini**:
   ```bash
   git clone https://github.com/maventama/koperasi_mitra
    ```
2. **Masuk ke direktori proyek**:
    ```bash
    cd koperasi_mitra
    ```
3. **Instal dependensi menggunakan Composer**:
    ```bash
    composer install
    ```
4. **Ganti konfigurasi app/Config/Database.php**:
    ```php
    public $default = [
        'DSN'      => '',
        'hostname' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'database' => 'koperasi_mitra',
        'DBDriver' => 'MySQLi',
        'DBPrefix' => '',
        'pConnect' => false,
        'DBDebug'  => (ENVIRONMENT !== 'production'),
        'cacheOn'  => false,
        'cacheDir' => '',
        'charset'  => 'utf8',
        'DBCollat' => 'utf8_general_ci',
        'swapPre'  => '',
        'encrypt'  => false,
        'compress' => false,
        'strictOn' => false,
        'failover' => [],
        'port'     => 3357,
    ];
    ```
5. **Buat database**:
    ```sql
    CREATE DATABASE koperasi_mitra;
    ```

6. **Import database dari koperasi.sql**:
    ```sql
    USE koperasi_mitra;
    SOURCE koperasi.sql;
    ```
7. **Ganti konfigurasi app/Config/App.php**:
    ```php
    public $baseURL = 'http://localhost:8080/';
    ```

## Apa itu Koperasi Mitra?
Koperasi Mitra adalah aplikasi berbasis web yang dirancang untuk membantu pengelolaan koperasi simpan pinjam. Aplikasi ini ditujukan untuk mempermudah anggota koperasi dalam melakukan transaksi, memantau saldo, dan mengelola pinjaman.

## Database Requirements

Koperasi Mitra membutuhkan database MySQL. Versi minimum yang dibutuhkan adalah 5.7.0, tetapi disarankan untuk menggunakan versi stabil terbaru dari MySQL atau MariaDB.

## PHP Requirements

Diperlukan PHP versi 7.2 atau lebih tinggi, dengan ekstensi berikut yang sudah terinstal: 

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) jika Anda berencana menggunakan pustaka HTTP\CURLRequest

Selain itu, pastikan ekstensi berikut ini diaktifkan di PHP Anda:

- json (diaktifkan secara default - jangan matikan)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (diaktifkan secara default - jangan matikan)

## Kontribusi
Jika Anda ingin berkontribusi pada proyek ini, silakan fork repositori ini dan buat pull request dengan perubahan yang Anda buat. Kami sangat menghargai kontribusi dari komunitas.

## Lisensi
Koperasi Mitra dilisensikan di bawah [MIT License](https://opensource.org/licenses/MIT). Anda bebas untuk menggunakan, menyalin, memodifikasi, dan mendistribusikan kode sumber ini dengan syarat mencantumkan lisensi ini dalam setiap salinan atau bagian dari perangkat lunak ini.