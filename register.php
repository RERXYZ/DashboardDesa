<?php
require 'config.php';

if( isset($_POST["register"]) ){
    if( registrasi($_POST, $_FILES) > 0){
        echo "
            <script>
                alert('user baru berhasil ditambahkan');
                document.location.href = 'login.php';
            </script>
        ";
    } else{
        echo "
            <script>
                alert('user baru gagal ditambahkan');
            </script>
        ";
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman registrasi</title>
</head>
<body>
    <h1>Halaman Registrasi</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="username">username :</label>
                <input type="text" name="username" id="username" required>
            </li>
            <li>
                <label for="profil">profil :</label>
                <input type="file" name="profil" id="profil" required>
            </li>
            <li>
                <label for="email">email :</label>
                <input type="email" name="email" id="email" required>
            </li>
            <li>
                <label for="password">password :</label>
                <input type="password" name="password" id="password" required>
            </li>
            <li>
                <label for="password2">konfirmasi password :</label>
                <input type="password" name="password2" id="password2" required>
            </li>
            <button type="submit" name="register">registrasi</button>
        </ul>
    </form>
</body>
</html>