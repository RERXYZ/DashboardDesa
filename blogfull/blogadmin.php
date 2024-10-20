<?php
session_start();
require '../config.php';

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

$id = $_GET["id"];

$blog = query("SELECT * FROM blog WHERE id = $id")[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>berita</title>
    <link rel="stylesheet" href="blogadmin.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body>
    <section class="blog" id="blog">
        <div class="image">
            <img src="../img/blog/<?= $blog["gambar"]; ?>" alt="">
        </div>
        <div class="tanggal">
            <?= date("F j, Y", strtotime($blog["tanggal_update"])); ?>
        </div>
        <div class="judul">
            <?= $blog["judul"]; ?>
        </div>
        <div class="isi">
            <?= nl2br($blog["isi"]); ?>
        </div>
    </section>
</body>
</html>