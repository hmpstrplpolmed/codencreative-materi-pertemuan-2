# Materi Pertemuan 2 — PHP & Database MySQL Dasar

Materi ini membahas dasar-dasar **PHP** dan cara menghubungkannya dengan **database MySQL**.
Di akhir materi, kita akan membuat aplikasi sederhana: **input dan tampil data mahasiswa**.

---

## 1. Tujuan Belajar

Setelah mengikuti materi ini, diharapkan bisa:

- Menulis sintaks dasar PHP (variabel, tipe data, percabangan, perulangan)
- Menjalankan PHP di XAMPP
- Membuat database dan tabel di MySQL
- Menghubungkan PHP ke MySQL dengan `mysqli`
- Menampilkan data dari database ke halaman web
- Menyimpan data dari form ke database

---

## 2. Persiapan

1. Install **XAMPP** (sudah termasuk Apache, PHP, dan MySQL/MariaDB).
2. Jalankan **Apache** dan **MySQL** dari XAMPP Control Panel.
3. Letakkan folder project di:
   ```
   C:\xampp\htdocs\materipertemuan2
   ```
   (macOS: `/Applications/XAMPP/xamppfiles/htdocs/materipertemuan2`)
4. Buka browser: `http://localhost/materipertemuan2`

---

## 3. Struktur File

| File | Keterangan |
|------|------------|
| `scheme.sql` | Membuat database `db_kampus` dan tabel `mahasiswa` |
| `koneksi.php` | Menghubungkan PHP ke database MySQL |
| `logikadasar.php` | Latihan logika dasar PHP (variabel, if, for) |
| `tambahdata.php` | Fungsi untuk menyimpan data mahasiswa ke database |
| `index.php` | Halaman utama: form input + tabel data mahasiswa |

---

## 4. Logika Dasar PHP (`logikadasar.php`)

### Menampilkan teks
```php
echo "Halo dengan echo <br>";
print("Halo dengan print <br>");
```

### Variabel dan tipe data
```php
$nama = "Walady";      // string
$umur = 19;            // integer
$beratbadan = 47.5;    // float
$sehat = true;         // boolean
```

PHP tidak perlu menulis tipe data secara eksplisit. Untuk melihat tipe data, gunakan `var_dump()`.

### Percabangan (if / else)
```php
if ($umur >= 19 && $nama == "Hylmi") {
    echo "Umur diatas 19 dan nama Hylmi";
} else if ($umur >= 19) {
    echo "Umur diatas 19";
} else {
    echo "Di bawah umur 19";
}
```

### Perulangan (for)
```php
for ($a = 0; $a <= $umur; $a++) {
    echo "<br>" . $a;
}
```

---

## 5. Membuat Database (`scheme.sql`)

Buka **phpMyAdmin** → menu **SQL** → tempel isi `scheme.sql` → klik **Go**.

```sql
CREATE DATABASE IF NOT EXISTS db_kampus;
USE db_kampus;

CREATE TABLE IF NOT EXISTS mahasiswa (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  nim VARCHAR(20) NOT NULL,
  jurusan VARCHAR(100) NOT NULL
);

INSERT INTO mahasiswa (nama, nim, jurusan) VALUES
('Andi',  '24001', 'TRPL'),
('Budi',  '24002', 'TRPL'),
('Citra', '24003', 'TRPL');
```

Penjelasan singkat:
- `INT AUTO_INCREMENT PRIMARY KEY` → ID otomatis bertambah dan unik.
- `VARCHAR(100)` → teks maksimal 100 karakter.
- `NOT NULL` → kolom wajib diisi.

---

## 6. Koneksi PHP ke MySQL (`koneksi.php`)

```php
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_kampus";

$koneksi = mysqli_connect($hostname, $username, $password, $database);
?>
```

- `mysqli_connect()` digunakan untuk membuka koneksi ke MySQL.
- Username default XAMPP adalah `root` dengan password kosong.
- File ini di-`include` di file lain supaya tidak menulis koneksi berulang.

---

## 7. Menyimpan Data (`tambahdata.php`)

```php
function TambahMahasiswa($nama, $nim, $jurusan, $konek){
    $stmt = mysqli_prepare($konek, "INSERT INTO mahasiswa (nama, nim, jurusan) VALUES (?,?,?)");
    mysqli_stmt_bind_param($stmt, "sss", $nama, $nim, $jurusan);
    mysqli_stmt_execute($stmt);
}
```

- `mysqli_prepare()` membuat query yang aman dari **SQL Injection**.
- `?` adalah placeholder untuk nilai yang akan diisi.
- `"sss"` artinya ketiga nilai bertipe **string**.

---

## 8. Menampilkan Data (`index.php`)

```php
$res = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
while ($data = mysqli_fetch_array($res)) {
    echo $data['nama'];
}
```

Alur halaman `index.php`:

1. Include `koneksi.php` dan `tambahdata.php`.
2. Jika tombol **simpandata** ditekan → ambil data dari form → simpan ke database.
3. Ambil semua data mahasiswa dengan `SELECT *`.
4. Tampilkan dengan perulangan `while` ke dalam tabel HTML.

---

## 9. Cara Menjalankan

1. Jalankan Apache & MySQL di XAMPP.
2. Import `scheme.sql` lewat phpMyAdmin.
3. Buka `http://localhost/materipertemuan2/index.php`.
4. Isi form nama, NIM, jurusan → klik **simpandata**.
5. Data baru akan muncul di tabel di bawah form.

> Kalau data tidak muncul, cek kembali nama database, tabel, dan pastikan MySQL sudah berjalan.

---

## 10. Latihan

1. Tambahkan tombol **Hapus** pada setiap baris tabel (gunakan `DELETE`).
2. Buat form **Edit** untuk mengubah data mahasiswa (gunakan `UPDATE`).
3. Tambahkan kolom baru `alamat` pada tabel `mahasiswa`.
4. Urutkan data berdasarkan nama menggunakan `ORDER BY nama ASC`.

---

## Catatan

- Simpan file PHP di dalam folder `htdocs` agar bisa diakses lewat browser.
- Nama file harus berakhiran `.php`, bukan `.html`.
- Jangan lupa menutup setiap statement PHP dengan `;`.
- Gunakan `<?php ... ?>` untuk menulis kode PHP di dalam HTML.
