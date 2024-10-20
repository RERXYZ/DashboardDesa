<?php
session_start();
require 'config.php';

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

$id = $_GET["id"];

$blog = query("SELECT * FROM blog WHERE id = $id")[0];

if( isset($_POST["submit"]) ){
    
    // cek data berhasil atau tidak
    if ( editblog($_POST, $_FILES, $_SESSION) > 0) {
        echo "
            <script>
                alert('data blog berhasil diubah');
                document.location.href = '../index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data blog gagal diubah');
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
    <link rel="stylesheet" href="blogupdate.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <div class="background">
        <div class="circle1"></div>
        <div class="circle2"></div>
    </div>
    <div class="blog">
        <div class="editblog">
            <form class="editcontent" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $blog["id"]; ?>">
                <ul>
                    <li>
                        <label for="bloggambar" id="editblog-area">
                            <input type="file" name="gambar" accept="image/*" id="bloggambar" value="../img/blog/<?= $blog["gambar"]; ?>" hidden>
                            <div class="gambarblog-view" id="gambarblog-view" style="background-image: url('../img/blog/<?= $blog["gambar"]; ?>');"></div>
                        </label>
                    </li>
                    <li>
                        <label for="judul">Judul<span>*</span></label>
                        <input type="text" name="judul" id="judul" placeholder="Masukkan Judul..." value="<?= $blog["judul"]; ?>" required>
                    </li>
                    <li>
                        <label for="isi">Isi<span>*</span></label>
                        <textarea name="isi" id="isi" placeholder="Harap tulis katanya di word terlebihi dahulu lalu copas kesini..." required><?= $blog["isi"]; ?></textarea>
                    </li>
                    <button type="submit" name="submit">Tambah</button>
                </ul>
            </form>
        </div>
    </div>

    <script src="blogupdate.js"></script>
</body>
</html>