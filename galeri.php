<?php
$galeri = query("SELECT * FROM galeri ORDER BY id ASC");
?>

<section class="section gallery" id="gallery">
    <div class="heading">
        <div class="title">
            <h1>Galeri</h1>
        </div>
    </div>
    <div class="content">
        <?php
            foreach( $galeri as $row):?>
                <div class="galericontent">
                    <div class="image">
                        <img src="img/galeri/<?= $row["gambar"]; ?>" alt="">
                    </div>
                    <div class="text">
                        <div class="left">
                            <span><?= $row["keterangan"]; ?></span>
                            <div class="desc">
                                <p>Terakhir diperbarui</p>
                                <p><?= (new DateTime($row["diperbarui"]))->format('d M Y'); ?></p>
                            </div>
                        </div>
                        <div class="right">
                            <span class="material-symbols-rounded" id="dotgaleri">more_vert</span>
                            <a href="galeriupdate/galeriupdate.php?id=<?= $row["id"];?>" id="galerieditbtn">
                                <span class="material-symbols-rounded">edit_square</span>
                                Edit
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach;
        ?>
    </div>
</section>