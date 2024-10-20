<?php
$tambahblog = query("SELECT * FROM blog");
$blog = query("SELECT blog.*, admin.username FROM blog INNER JOIN admin ON blog.user_id = admin.id ORDER BY blog.tanggal_update DESC");

if (isset($_POST["addblogsubmit"])) {

    // cek data berhasil atau tidak
    if (tambahblog($_POST, $_FILES, $_SESSION) > 0) {
        echo "
            <script>
                alert('data berita berhasil ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data berita gagal ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
        echo mysqli_error($conn);
    }

}
?>

<section class="section blog" id="blog">
    <div class="heading">
        <div class="title">
            <h1>Berita</h1>
        </div>
    </div>
    <div class="newblog">
        <form class="addblogcontent" action="" method="post" enctype="multipart/form-data">
            <ul>
                <li>
                    <label for="bloggambar" id="addblog-area">
                        <input type="file" name="gambar" accept="image/*" id="bloggambar" hidden>
                        <div class="gambarblog-view" id="gambarblog-view">
                            <i class="uil uil-image"></i>
                            <p>Klik untuk unggah gambar</p>
                            <span>Gunakan gambar HD dan format jpg, jpeg, atau png</span>
                        </div>
                    </label>
                </li>
                <li>
                    <label for="judulblog">Judul<span>*</span></label>
                    <input type="text" name="judul" id="judulblog" placeholder="Masukkan Judul..." required>
                </li>
                <li>
                    <label for="isiblog">Isi<span>*</span></label>
                    <textarea name="isi" id="isiblog" placeholder="Harap tulis katanya di word terlebihi dahulu lalu copas kesini..." required></textarea>
                </li>
                <button type="submit" name="addblogsubmit">Tambah</button>
            </ul>
        </form>
    </div>
    <div class="content">
        <div class="searchbox">
            <i class="uil uil-search"></i>
            <input type="text" name="" id="findblog" placeholder="Mencari Berita..." onkeyup="searchblog()">
        </div>
        <div class="contentin">
            <a href="#" class="blog-new" id="blogaddbtn">
                <span class="material-symbols-rounded">add</span>
                <p>Tambah blog</p>
            </a>
            <?php
            foreach ($blog as $row): ?>
                <div class="blogcontentout">
                    <a href="blogfull/blogadmin.php?id=<?= $row["id"]; ?>" target="_blank" class="blogcontentin">
                        <div class="image">
                            <img src="img/blog/<?= $row["gambar"]; ?>" alt="" />
                        </div>
                        <div class="text-wrapper">
                            <h1 class="blogitem"><?= $row["judul"]; ?></h1>
                            <p><?= nl2br($row["isi"]); ?></p>
                            <div class="blogdesc">
                                <div class="time">
                                    <i class="uil uil-clock"></i>
                                    <p><?= (new DateTime($row["tanggal_update"]))->format('d M Y'); ?></p>
                                </div>
                                <p>|</p>
                                <div class="author">
                                    <p><?= $row["username"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="more">
                        <span class="material-symbols-rounded" id="dotblog">more_vert</span>
                        <div class="action" id="blogaction">
                            <a href="blogupdate/blogupdate.php?id=<?= $row["id"]; ?>" id="blogeditbtn">
                                <span class="material-symbols-rounded">edit_square</span>
                                Edit
                            </a>
                            <a href="hapus/hapusblog.php?id=<?= $row["id"]; ?>" id="blogdeletebtn">
                                <span class="material-symbols-rounded">delete</span>
                                Hapus
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</section>