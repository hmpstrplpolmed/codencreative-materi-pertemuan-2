<?php
include "koneksi.php";
include "tambahdata.php";

if (isset($_POST['simpandata'])){
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];

    TambahMahasiswa($nama, $nim, $jurusan, $koneksi);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <form action="" method="POST">
        <input type="text" name="nama" placeholder="Nama mahasiswa...">
        <input type="text" name="nim" placeholder="Nim mahasiswa...">
        <input type="text" name="jurusan" placeholder="Jurusan mahasiswa...">
        <input type="submit" name="simpandata" value="simpandata">
    </form>
    <table border="1" width="100%" cellpadding="5">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
        </tr>
        <?php
            $no = 1;
            $res = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
            while ($data = mysqli_fetch_array($res)):
        ?>
        <tr>
            <td><?php echo $no++;?></td>
            <td><?php echo $data['nama'];?></td>
            <td><?php echo $data['nim'];?></td>
            <td><?php echo $data['jurusan'];?></td>
        </tr>
        <?php
            endwhile;
        ?>
    </table>
</body>
</html>
