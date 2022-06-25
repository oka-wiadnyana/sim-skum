# Aplikasi SIM-SKUM

## Apa itu SIM-SKUM?

SIM-SKUM (simulasi skum) adalah aplikasi keterbukaan panjar biaya perkara pada Pengadilan. Aplikasi ini dapat digunakan oleh masyarakat untuk menghitung simulasi biaya panjar perkara pada Pengadilan Negeri yang dituju, dan untuk Satker dapat digunakan untuk mencetak SKUM untuk perkara yang tidak menggunakan E-Court.

Aplikasi ini dibangun menggunakan framework Codigniter 4

## Instalasi

1. Download repository ini

2. Copykan ke server lokal terlebih dahulu

3. Buka terminal dan arahkan ke folder aplikasi, kemudian ketik composser install (jika pada komputer belum terinstall composer, silahkan diinstal dulu)

4. Impor database

5. Copy file env, kemudian rename menjadi .env, ubah baris envireonment dari production ke development, kemudian ubah base url ke http://localhost/nama_folder/public, selanjutnya setting koneksi di baris database (sebelumnya hilangkan tanda pagar pada baris-baris tersebut)

6. Silahkan buka pada browser dan ketik **localhost/nama_folder/public** untuk user, dan untuk admin silahkan ketik **localhost/nama_folder/public/admin** (user : onsdee86@gmail.com, pass : 12345)

7. Untuk memperbaharui radius silahkan klik tombol **perbarui radius** pada dashboard. Memperbarui radius memerlukan waktu cukup lama tergantung dari koneksi. Silahkan lakukan secara berkala untuk mendapatkan data terupdate

8. Secara default, data aplikasi ini mengambil data untuk Pengadilan Negeri, untuk Pengadilan Agama silahkan cari file Simulasi-PA.php pada folder controller dan rename menjadi Simulasi.php, dan file radius04.json pada folder writable dan rename menjadi radius.json


## Server Requirements

PHP version 7.3 atau yang lebih tinggi, dengan ekstensi yang harus diaktifkan sebagai berikut:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) 

Pastika ekstensi-ekstensi ini juga aktif:

- json (enabled secara default - jangan dimatikan)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled secara default - jangan dimatikan)

## Kontak

Apabila ada permasalahan, silahkan open issue, atau hubungi saya pada Telegram @okawiadnyana
