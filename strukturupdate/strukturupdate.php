<?php
session_start();
require 'config.php';

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

$id = $_GET["id"];

$struktur = query("SELECT * FROM struktur WHERE id = $id")[0];

if( isset($_POST["submit"]) ){
    
    // cek data berhasil atau tidak
    if ( editstruktur($_POST, $_FILES) > 0) {
        echo "
            <script>
                alert('data struktur berhasil diubah');
                document.location.href = '../index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data struktur gagal diubah');
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
    <link rel="stylesheet" href="strukturupdate.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <div class="background">
        <div class="circle1"></div>
        <div class="circle2"></div>
    </div>
    <div class="struktur">
        <div class="editstruktur">
            <form class="editcontent" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $struktur["id"]; ?>">
                <ul>
                    <li>
                        <label title="gunakan gambar dengan rasio sama dan format png" for="strukturgambar" id="editstruktur-area">
                            <input type="file" name="foto" accept="image/*" id="strukturgambar" value="../img/struktur/<?= $struktur["foto"]; ?>" hidden>
                            <div class="gambarstruktur-view" id="gambarstruktur-view" style="background-image: url('../img/struktur/<?= $struktur["foto"]; ?>');">
                                <span class="material-symbols-rounded">edit</span>
                            </div>
                        </label>
                    </li>
                    <li>
                        <label for="nama">Nama<span class="span">*</span></label>
                        <input type="text" name="nama" id="nama" value="<?= $struktur["nama"]; ?>" required>
                    </li>
                    <li>
                        <label for="jabatan">Jabatan<span class="span">*</span></label>
                        <input type="text" name="jabatan" id="jabatan" value="<?= $struktur["jabatan"]; ?>" required>
                    </li>
                    <li>
                        <label for="quotes">Quotes<span class="span">*</span></label>
                        <textarea name="kutipan" id="quotes" required><?= $struktur["kutipan"] ?></textarea>
                    </li>
                    <button type="submit" name="submit">Perbarui</button>
                </ul>
            </form>
        </div>
    </div>

    <script src="strukturupdate.js"></script>
</body>
</html>