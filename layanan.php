<?php

$tambahlayanan = query("SELECT * FROM layanan");
$layanan = query("SELECT * FROM layanan ORDER BY tanggal DESC");

if (isset($_POST["addservicesubmit"])) {

    // cek data berhasil atau tidak
    if (tambahlayanan($_POST, $_FILES) > 0) {
        echo "
            <script>
                alert('data layanan berhasil ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data layanan gagal ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
        echo mysqli_error($conn);
    }

}
?>

<section class="section service" id="service">
    <div class="heading">
        <div class="title">
            <h1>Layanan</h1>
        </div>
    </div>
    <div class="newservice">
        <form class="addcontent" action="" method="post" enctype="multipart/form-data">
            <ul>
                <li>
                    <label for="servicelogo" id="addservice-area">
                        <input type="file" name="logo" accept="image/*" id="servicelogo" hidden required>
                        <div class="logoservice-view" id="logoservice-view">
                            <i class="uil uil-image"></i>
                            <p>Klik untuk unggah logo</p>
                            <span>Gunakan gambar HD dan format png untuk logo</span>
                        </div>
                    </label>
                </li>
                <li>
                    <label for="judul">Judul<span>*</span></label>
                    <input type="text" name="judul" id="judul" placeholder="Masukkan Judul..." required>
                </li>
                <li>
                    <label for="isi">Isi<span>*</span></label>
                    <textarea name="teks" id="isi"
                        placeholder="Harap tulis katanya di word terlebihi dahulu lalu copas kesini..."
                        required></textarea>
                </li>
                <button type="submit" name="addservicesubmit">Tambah</button>
            </ul>
        </form>
    </div>
    <?php
    foreach ($layanan as $row): ?>
        <div class="servicecontentfull">
            <div class="servicecontentisi">
                <div class="logo">
                    <img src="img/layanan/<?= $row["logo"]; ?>" alt="" />
                </div>
                <div class="judul">
                    <p><?= $row["judul"]; ?></p>
                </div>
                <div class="isi">
                    <p><?= nl2br($row["teks"]); ?></p>
                </div>
            </div>
        </div>
    <?php endforeach;
    ?>
    <div class="content">
        <a href="#" class="service-new" id="serviceaddbtn">
            <span class="material-symbols-rounded">add</span>
            <p>Tambah Layanan</p>
        </a>
        <?php
        foreach ($layanan as $row): ?>
            <div class="servicecontentout">
                <a href="#" class="servicecontentin">
                    <div class="logo">
                        <img src="img/layanan/<?= $row["logo"]; ?>" alt="" />
                    </div>
                    <div class="judul">
                        <p>
                            <?= $row["judul"]; ?>
                        </p>
                    </div>
                    <div class="subtitle">
                        <p>
                            <?= nl2br($row["teks"]); ?>
                        </p>
                    </div>
                    <div class="time">
                        <p>Terakhir diperbarui</p>
                        <span>
                            <?= (new DateTime($row["tanggal"]))->format('d M Y'); ?>
                        </span>
                    </div>
                </a>
                <div class="more">
                    <span class="material-symbols-rounded" id="dotservice">more_vert</span>
                    <div class="action" id="serviceaction">
                        <a href="layananupdate/layananupdate.php?id=<?= $row["id"]; ?>" id="serviceeditbtn">
                            <span class="material-symbols-rounded">edit_square</span>
                            Edit
                        </a>
                        <a href="hapus/hapuslayanan.php?id=<?= $row["id"]; ?>" id="servicedeletebtn"
                            onclick="return confirm('Hapus data ini?');">
                            <span class="material-symbols-rounded">delete</span>
                            Hapus
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach;
        ?>
    </div>
</section>