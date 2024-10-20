<?php
session_start();
require 'config.php';

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

$id = $_GET["id"];

$booklet = query("SELECT * FROM booklet WHERE id = $id")[0];

if( isset($_POST["submit"]) ){
    
    // cek data berhasil atau tidak
    if ( editbooklet($_POST, $_FILES, $_FILES, $_SESSION) > 0) {
        echo "
            <script>
                alert('data booklet berhasil diubah');
                document.location.href = '../index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data booklet gagal diubah');
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
    <link rel="stylesheet" href="bookletupdate.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <div class="background">
        <div class="circle1"></div>
        <div class="circle2"></div>
    </div>
    <div class="booklet">
        <div class="editbooklet">
            <form class="editcontent" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $booklet["id"]; ?>">
                <ul>
                    <li>
                        <label for="bookletgambar" id="editbooklet-area">
                            <input type="file" name="gambar" accept="image/*" id="bookletgambar" value="../img/booklet/<?= $booklet["gambar"]; ?>" hidden>
                            <div class="gambarbooklet-view" id="gambarbooklet-view" style="background-image: url('../img/booklet/<?= $booklet["gambar"]; ?>');"></div>
                        </label>
                    </li>
                    <li>
                        <label for="bookletfile" id="editbookletfile-area">
                            <input type="file" name="file" id="bookletfile" value="<?= $booklet["dokumen"]; ?>" hidden>
                            <div class="filebooklet-view" id="filebooklet-view">
                                <p><?= $booklet["dokumen"]?></p>
                            </div>
                        </label>
                    </li>
                    <li>
                        <label for="judulbooklet">Judul<span>*</span></label>
                        <input type="text" name="judul" id="judulbooklet" placeholder="Masukkan Judul..." value="<?= $booklet["judul"]; ?>" required>
                    </li>
                    <button type="submit" name="submit">Tambah</button>
                </ul>
            </form>
        </div>
    </div>

    <script src="bookletupdate.js"></script>
</body>
</html>