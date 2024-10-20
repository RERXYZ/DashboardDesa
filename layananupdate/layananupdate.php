<?php
session_start();
require 'config.php';

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

$id = $_GET["id"];

$layanan = query("SELECT * FROM layanan WHERE id = $id")[0];

if( isset($_POST["submit"]) ){
    
    // cek data berhasil atau tidak
    if ( editlayanan($_POST, $_FILES) > 0) {
        echo "
            <script>
                alert('data layanan berhasil diubah');
                document.location.href = '../index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data layanan gagal diubah');
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
    <title>Document</title>
    <link rel="stylesheet" href="layananupdate.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <div class="background">
        <div class="circle1"></div>
        <div class="circle2"></div>
    </div>
    <div class="service">
        <div class="editservice">
            <form class="editcontent" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $layanan["id"]; ?>">
                <ul>
                    <li>
                        <label title="gunakan gambar dengan rasio sama dan format png" for="servicelogo" id="editservice-area">
                            <input type="file" name="logo" accept="image/*" id="servicelogo" value="../img/layanan/<?= $layanan["logo"]; ?>" hidden>
                            <div class="logoservice-view" id="logoservice-view" style="background-image: url('../img/layanan/<?= $layanan["logo"]; ?>');"></div>
                        </label>
                    </li>
                    <li>
                        <label for="judul">Judul<span>*</span></label>
                        <input type="text" name="judul" id="judul" placeholder="Masukkan Judul..." value="<?= $layanan["judul"]; ?>" required>
                    </li>
                    <li>
                        <label for="isi">Isi<span>*</span></label>
                        <textarea name="teks" id="isi" placeholder="Harap tulis katanya di word terlebihi dahulu lalu copas kesini..." required><?= $layanan["teks"]; ?></textarea>
                    </li>
                    <button type="submit" name="submit">Perbarui</button>
                </ul>
            </form>
        </div>
    </div>

    <script src="layananupdate.js"></script>
</body>
</html>