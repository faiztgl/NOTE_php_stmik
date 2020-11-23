<?php
session_start();


if ( !isset($_SESSION["login"]) ) {
    header("location: login.php");
    exit;

}


require 'function.php';
$mahasiswa = query("SELECT * FROM mahasiswa");


if ( isset($_POST["cari"]) ) {
    $mahasiswa = cari ($_POST["keyword"]);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>INDEX</title>
</head>
<body>

<a href="logout.php">LOGOUT</a>

<h1>Daftar Mahasiswa</h1>

<a href="tambah.php">+ Tambah Data Mahasiswa</a>
<br></br>

<form action="" method="POST">
    <input type="text" name="keyword" size="30" autofocus placeholder="masukan keyword" autocomplete="off">
    <button type="submit" name="cari">Cari</button>

</form>

<br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>ID Mahasiswa</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Email</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach( $mahasiswa as $row ) { ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row ["id"] ?></td>
            <td><?php echo $row ["nrp"] ?></td>
            <td><?php echo $row ["nama"] ?></td>
            <td><?php echo $row ["jurusan"] ?></td>
            <td><?php echo $row ["email"] ?></td>
            <td><img src="img/<?php echo $row['gambar'] ?>" width="80"></td>
            <td>
                <a href="ubah.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('yakin?');" >Ubah</a>
                <a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('yakin?');">Hapus</a>
            </td>
        </tr>
        <?php $i++ ; ?>
        <?php } ?>


    </table>
</body>
</html>