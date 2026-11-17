<?php
include "koneksi.php";

function TambahMahasiswa($nama, $nim, $jurusan, $konek){
    $stmt = mysqli_prepare($konek, "INSERT INTO mahasiswa (nama, nim, jurusan) VALUES (?,?,?)");
    mysqli_stmt_bind_param($stmt, "sss", $nama, $nim, $jurusan);
    mysqli_stmt_execute($stmt);
}
?>
