<?php
$struktur = query("SELECT * FROM struktur ORDER BY id ASC");
?>

<section class="section struktur" id="struktur">
    <div class="heading">
        <div class="title">
            <h1>Struktur</h1>
        </div>
    </div>
    <div class="content">
        <table>
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Quotes</th>
                <th>Edit</th>
            </tr>
            <?php
            foreach ($struktur as $row): ?>
                <tr>
                    <td><img src="img/struktur/<?= $row["foto"] ?>" alt=""></td>
                    <td><p><?= $row["nama"]; ?></p></td>
                    <td><p><?= $row["jabatan"]; ?></p></td>
                    <td><p><?= $row["kutipan"]; ?></p></td>
                    <td><a href="strukturupdate/strukturupdate.php?id=<?= $row["id"] ?>"><span class="material-symbols-outlined">edit</span></a></td>
                </tr>
            <?php endforeach;
            ?>
        </table>
    </div>
</section>