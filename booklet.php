<?php
$tambahbooklet = query("SELECT * FROM booklet");
$booklet = query("SELECT booklet.*, admin.username FROM booklet INNER JOIN admin ON booklet.user_id = admin.id ORDER BY booklet.tanggal_update DESC");

if (isset($_POST["addbookletsubmit"])) {

    // cek data berhasil atau tidak
    if (tambahbooklet($_POST, $_FILES, $_FILES, $_SESSION) > 0) {
        echo "
            <script>
                alert('data booklet berhasil ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data booklet gagal ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
        echo mysqli_error($conn);
    }

}
?>

<section class="section booklet" id="booklet">
                <div class="heading">
                    <div class="title">
                        <h1>Booklet</h1>
                    </div>
                </div>
                <div class="newbooklet">
                    <form class="addbookletcontent" action="" method="post" enctype="multipart/form-data">
                        <ul>
                            <li>
                                <label for="bookletgambar" id="addbooklet-area">
                                    <input type="file" name="gambar" accept="image/*" id="bookletgambar" hidden>
                                    <div class="gambarbooklet-view" id="gambarbooklet-view">
                                        <i class="uil uil-image"></i>
                                        <p>Klik untuk unggah sampul</p>
                                        <span>Gunakan gambar HD dan format jpg, jpeg, atau png</span>
                                    </div>
                                </label>
                            </li>
                            <li>
                                <label for="bookletfile" id="addbookletfile-area">
                                    <input type="file" name="file" id="bookletfile" hidden>
                                    <div class="filebooklet-view" id="filebooklet-view">
                                        <p>Unggah File Booklet</p>
                                    </div>
                                </label>
                            </li>
                            <li>
                                <label for="judul">Judul<span>*</span></label>
                                <input type="text" name="judul" id="judul" placeholder="Masukkan Judul..." required>
                            </li>
                            <button type="submit" name="addbookletsubmit">Tambah</button>
                        </ul>
                    </form>
                </div>
                <div class="content">
                    <a href="#" class="booklet-new" id="bookletaddbtn">
                        <span class="material-symbols-rounded">add</span>
                        <p>Tambah booklet</p>
                    </a>
                    <?php foreach ($booklet as $row): ?>
                        <div class="bookletcontentout">
                            <a href="file/booklet/<?= $row["dokumen"] ?>" class="bookletcontentin" target="_blank">
                                <div class="image">
                                    <img src="img/booklet/<?= $row["gambar"] ?>" alt="">
                                </div>
                                <div class="text">
                                    <h5><?= $row["judul"] ?></h5>
                                    <span><?= $row["username"] ?> | <?= (new DateTime($row["tanggal_update"]))->format('d M Y'); ?></span>
                                </div>
                            </a>
                            <div class="more">
                                <span class="material-symbols-rounded" id="dotbooklet">more_vert</span>
                                <div class="action" id="bookletaction">
                                    <a href="bookletupdate/bookletupdate.php?id=<?= $row["id"]; ?>" id="bookleteditbtn">
                                        <span class="material-symbols-rounded">edit_square</span>
                                        Edit
                                    </a>
                                    <a href="hapus/hapusbooklet.php?id=<?= $row["id"]; ?>" id="bookletdeletebtn">
                                        <span class="material-symbols-rounded">delete</span>
                                        Hapus
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </section>