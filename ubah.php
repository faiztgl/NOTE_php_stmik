<?php

session_start();


if ( !isset($_SESSION["login"]) ) {
    header("location: login.php");
    exit;

}


require 'function.php';

$id = $_GET["id"];

$mhs = query ("SELECT * FROM mahasiswa WHERE id=$id")[0];

if (isset ($_POST["submit"])) {
    
    if(ubah($_POST) > 0) {

    echo " <script> 
            alert('data berhasil diubah!');
            document.location.href = 'index.php';
            </script>
        
    ";
    
    } else {
        echo "<script> 
        alert('data TIDAK berhasil diubah!');
        document.location.href = 'index.php';
        </script>
    
        ";

    };

} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ubah Data Mahasiswa</title>
</head>
<body>
<h1>Ubah Data Mahasiswa</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $mhs["id"]; ?>">
        <input type="hidden" name="gambarlama" value="<?php echo $mhs["gambar"]; ?>" >
        <ul>
            <li>
                <label for="nrp">NRP :</label>
                <input type="text" name="nrp" id="nrp" required value="<?php echo $mhs["nrp"]; ?>">
            </li>
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" required value="<?php echo $mhs["nama"]; ?>">
            </li>
            <li>
                <label for="email">Email :</label>
                <input type="text" name="email" id="email" required value="<?php echo $mhs["email"]; ?>">
            </li>
            <li>
                <label for="jurusan">Jurusan :</label>
                <input type="text" name="jurusan" id="jurusan" required value="<?php echo $mhs["jurusan"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar :</label> <br>
                <img src="img/<?php echo $mhs['gambar']; ?> " width="40"> <br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Ubah</button>
            </li>
        </ul>


    </form>

</body>
</html>