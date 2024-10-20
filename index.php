<?php
session_start();
require 'config.php';

$namaadmin = $_SESSION['username'];

if (!isset($_SESSION["login"]) && !isset($namaadmin)) {
    header("Location: login.php");
    exit;
}

$query = "SELECT * FROM admin WHERE username = '$namaadmin'";
$result = mysqli_query($conn, $query);

if ($result) {
    $admin = mysqli_fetch_assoc($result);
}

$layanandashboard = query("SELECT * FROM layanan ORDER BY id DESC LIMIT 5");
$strukturdashboard = query("SELECT * FROM struktur ORDER BY id ASC");
$bookletdashboard = query("SELECT * FROM booklet ORDER BY id DESC");
$galeridashboard = query("SELECT * FROM galeri ORDER BY id ASC LIMIT 5");
$blogdashboard = query("SELECT blog.*, admin.username FROM blog INNER JOIN admin ON blog.user_id = admin.id ORDER BY blog.tanggal_update DESC LIMIT 5");

$totallayanan = count(query("SELECT * FROM layanan"));
$totalstruktur = count(query("SELECT * FROM struktur"));
$totalbooklet = count(query("SELECT * FROM booklet"));
$totalgaleri = count(query("SELECT * FROM galeri"));
$totalblog = count(query("SELECT * FROM blog"));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css" />
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>

<body>
    <div class="background">
        <div class="circle1"></div>
        <div class="circle2"></div>
    </div>
    <div class="container">
        <nav>
            <div class="image">
                <img src="img/imgstatic/logo.png" alt="" />
            </div>
            <div class="navbar">
                <ul>
                    <li data-li="beranda" class="list active">
                        <a href="#beranda">
                            <span class="material-symbols-rounded">grid_view</span>
                            <p>Beranda</p>
                        </a>
                    </li>
                    <li data-li="service" class="list">
                        <a href="#service">
                            <span class="material-symbols-rounded">web_asset</span>
                            <p>Layanan</p>
                        </a>
                    </li>
                    <li data-li="gallery" class="list">
                        <a href="#gallery">
                            <span class="material-symbols-rounded">image</span>
                            <p>Galeri</p>
                        </a>
                    </li>
                    <li data-li="struktur" class="list">
                        <a href="#struktur">
                            <span class="material-symbols-rounded">group</span>
                            <p>Struktur</p>
                        </a>
                    </li>
                    <li data-li="booklet" class="list">
                        <a href="#booklet">
                            <span class="material-symbols-rounded">developer_guide</span>
                            <p>Booklet</p>
                        </a>
                    </li>
                    <li data-li="blog" class="list">
                        <a href="#blog">
                            <span class="material-symbols-rounded">news</span>
                            <p>Berita</p>
                        </a>
                    </li>
                </ul>
                <div class="logout">
                    <a href="logout.php">
                        <span class="material-symbols-rounded">move_item</span>
                        <p>Logout</p>
                    </a>
                </div>
            </div>
        </nav>
        <div class="right-wrapper">
            <!-- profile -->
            <div class="fixed">
                <div class="profile">
                    <p><?= $namaadmin ?></p>
                    <img src="img/admin/<?= $admin["profil"]; ?>" alt="">
                </div>
                <div class="button">
                    <span class="material-symbols-rounded" id="iconnav">menu</span>
                </div>
            </div>

            <!-- beranda section -->
            <section class="section beranda" id="beranda">
                <div class="heading">
                    <div class="title">
                        <p>Welcome back, <?= $namaadmin ?></p>
                        <h1>Dashboard</h1>
                    </div>
                </div>
                <div class="content">
                    <div class="main-box" style="--i:1">
                        <div class="left">
                            <div class="title">
                                <p>Kunjungan Hari Ini</p>
                                <h1 class="kunjunganwebsite">000</h1>
                            </div>
                            <div class="bottom">
                                <div class="box">
                                    <span class="material-symbols-rounded">web_asset</span>
                                    <div class="text">
                                        <p>Layanan</p>
                                        <h5><?= $totallayanan ?></h5>
                                    </div>
                                </div>
                                <div class="box">
                                    <span class="material-symbols-rounded">image</span>
                                    <div class="text">
                                        <p>Galeri</p>
                                        <h5><?= $totalgaleri ?></h5>
                                    </div>
                                </div>
                                <div class="box">
                                    <span class="material-symbols-rounded">developer_guide</span>
                                    <div class="text">
                                        <p>Booklet</p>
                                        <h5><?= $totalbooklet ?></h5>
                                    </div>
                                </div>
                                <div class="box">
                                    <span class="material-symbols-rounded">news</span>
                                    <div class="text">
                                        <p>Berita</p>
                                        <h5><?= $totalblog ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right">
                            <img src="img/adminweb/vectordashboard.png" alt="">
                        </div>
                    </div>
                    <div class="layanan-box" style="--i:2">
                        <div class="title">
                            <p>Layanan</p>
                        </div>
                        <div class="isi">
                            <?php
                            foreach ($layanandashboard as $layanandashboardrow): ?>
                                <div class="layanan-content">
                                    <div class="logo">
                                        <img src="img/sapawarga.png" alt="" />
                                    </div>
                                    <div class="judul">
                                        <p><?= $layanandashboardrow["judul"]; ?></p>
                                    </div>
                                    <div class="subtitle">
                                        <p><?= $layanandashboardrow["teks"]; ?></p>
                                    </div>
                                    <div class="time">
                                        <p>Terakhir diperbarui</p>
                                        <span><?= (new DateTime($layanandashboardrow["tanggal"]))->format('d M Y'); ?></span>
                                    </div>
                                </div>
                            <?php endforeach;
                            ?>
                        </div>
                    </div>
                    <div class="struktur-box" style="--i:3">
                        <div class="title">
                            <p>Struktur Desa</p>
                        </div>
                        <div class="isi">
                            <div class="slide-content strukturSwiper">
                                <div class="card-wrapper swiper-wrapper">
                                    <?php
                                    foreach ($strukturdashboard as $strukturdashboardrow): ?>
                                        <div class="card swiper-slide">
                                            <img src="img/struktur/<?= $strukturdashboardrow["foto"]; ?>" alt="">
                                            <div class="text">
                                                <p><?= $strukturdashboardrow["nama"]; ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach;
                                    ?>
                                </div>
                            </div>
                            <div class="arrow swiper-button-next"></div>
                            <div class="arrow swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="galeri-box" style="--i:4">
                        <div class="title">
                            <p>Galeri</p>
                        </div>
                        <div class="isi">
                            <?php
                            foreach ($galeridashboard as $galeridashboardrow): ?>
                                <div class="galeri-content">
                                    <div class="image">
                                        <img src="img/galeri/<?= $galeridashboardrow["gambar"]; ?>" alt="">
                                    </div>
                                    <div class="text">
                                        <span><?= $galeridashboardrow["keterangan"]; ?></span>
                                        <div class="desc">
                                            <p>Terakhir diperbarui</p>
                                            <p><?= (new DateTime($galeridashboardrow["diperbarui"]))->format('d M Y'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;
                            ?>
                        </div>
                    </div>
                    <div class="booklet-box" style="--i:5">
                        <div class="title">
                            <p>Booklet</p>
                        </div>
                        <div class="isi">
                            <?php
                            foreach ($bookletdashboard as $bookletdashboardrow): ?>
                                <div class="booklet-content">
                                    <div class="image">
                                        <img src="img/booklet/<?= $bookletdashboardrow["gambar"] ?>" alt="">
                                    </div>
                                    <div class="text">
                                        <h5><?= $bookletdashboardrow["judul"] ?></h5>
                                        <span><?= (new DateTime($bookletdashboardrow["tanggal_update"]))->format('d M Y'); ?></span>
                                    </div>
                                </div>
                            <?php endforeach;
                            ?>
                        </div>
                    </div>
                    <div class="berita-box" style="--i:6">
                        <div class="title">
                            <p>Berita</p>
                        </div>
                        <div class="isi">
                            <table>
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Judul</td>
                                        <td>Penulis</td>
                                        <td>Dibuat</td>
                                        <td>Diperbarui</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($blogdashboard as $blogdashboardrow): ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td>
                                                <p><?= $blogdashboardrow["judul"]; ?></p>
                                            </td>
                                            <td><?= $blogdashboardrow["username"]; ?></td>
                                            <td><?= (new DateTime($blogdashboardrow["tanggal_dibuat"]))->format('d M Y'); ?></td>
                                            <td><?= (new DateTime($blogdashboardrow["tanggal_update"]))->format('d M Y'); ?></td>
                                        </tr>
                                    <?php endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <!-- layanan content -->
            <?php
            include('layanan.php');
            ?>

            <!-- galeri section -->
            <?php
            include('galeri.php');
            ?>

            <!-- struktur section -->
            <?php
            include('struktur.php');
            ?>

            <!-- booklet section -->
            <?php
            include('booklet.php');
            ?>

            <!-- berita box -->
            <?php
            include('blog.php');
            ?>
        </div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="dashboard.js"></script>
</body>

</html>