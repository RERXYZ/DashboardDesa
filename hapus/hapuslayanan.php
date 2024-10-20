<?php
require '../config.php';
$id = $_GET["id"];

if (hapuslayanan($id) > 0) {
    echo "
    <script>
        alert('data layanan berhasil dihapus');
        document.location.href = '../index.php';
    </script>
    ";
}else{
    echo "
        <script>
            alert('data layanan gagal dihapus');
            document.location.href = '../index.php';
        </script>
    ";
}
?>