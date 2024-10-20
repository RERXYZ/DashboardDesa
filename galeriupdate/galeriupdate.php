<?php
session_start();
require 'config.php';

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}


$id = $_GET["id"];

$galeri = query("SELECT * FROM galeri WHERE id = $id")[0];

if( isset($_POST["submit"]) ){
    
    // cek data berhasil atau tidak
    if ( editgaleri($_POST, $_FILES) > 0) {
        echo "
            <script>
                alert('data galeri berhasil diubah');
                document.location.href = '../index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data galeri gagal diubah');
                document.location.href = '../index.php';
            </script>
        ";
        echo mysqli_error($conn);
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPage</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="galeriupdate.css">
</head>
<body>
    <div class="background">
        <div class="circle1"></div>
        <div class="circle2"></div>
    </div>
    <div class="gallery">
        <div class="editgaleri">
            <form class="editcontent" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $galeri["id"];?>">
                <label for="galerigambar" id="editgaleri-area">
                    <input type="file" name="gambar" id="galerigambar" hidden>
                    <div class="gambargaleri-view" id="gambargaleri-view" >
                      <i class="uil uil-image"></i>
                      <p>Drag dan drop atau klik disini untuk unggah gambar</p>
                      <span>Unggah gambar HD format jpeg atau jpg</span>
                    </div>
                </label>
                <input class="keterangangaleriedit" type="text" name="keterangan" value="<?= $galeri["keterangan"]?>" placeholder="Masukkan Keterangan..." required>
                <button type="submit" name="submit">Perbarui</button>
            </form>
        </div>
    </div>

    <script src="galeriupdate.js"></script>
</body>
</html>