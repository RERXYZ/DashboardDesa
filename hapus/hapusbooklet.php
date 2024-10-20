<?php
require '../config.php';
$id = $_GET["id"];

if (hapusbooklet($id) > 0) {
    echo "
    <script>
        alert('data booklet berhasil dihapus');
        document.location.href = '../index.php';
    </script>
    ";
}else{
    echo "
        <script>
            alert('data booklet gagal dihapus');
            document.location.href = '../index.php';
        </script>
    ";
}
?>