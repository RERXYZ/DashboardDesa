<?php
require '../config.php';
$id = $_GET["id"];

if (hapusblog($id) > 0) {
    echo "
    <script>
        alert('data blog berhasil dihapus');
        document.location.href = '../index.php';
    </script>
    ";
}else{
    echo "
        <script>
            alert('data blog gagal dihapus');
            document.location.href = '../index.php';
        </script>
    ";
}
?>