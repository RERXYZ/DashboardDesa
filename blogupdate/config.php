<?php

require '../config.php';

function editgambarberita($file){

    $gambar = $file["gambar"]["name"];
    $simpangambar = $file["gambar"]["tmp_name"];
    $ukurangambar = $file['gambar']['size'];
    $error = $file['gambar']['error'];
    
    // mengecek apakahada file diupload
    if($error === 4){
        echo "<script>
                alert('pilih gambar terlebih dahulu');
              </script>";
        return false;
    }

    // mengecek tipe file
    $allowed = ['jpg', 'jpeg', 'png'];
    $ekstensi = explode('.', $gambar);
    $ekstensi = strtolower(end($ekstensi));

    if(!in_array($ekstensi, $allowed)){
        echo "<script>
                alert('Format gambar salah!');
              </script>";
        return false;
    }
    
    if($ukurangambar > 100000000){
        echo "<script>
                alert('Ukuran gambar terlalu besar!');
              </script>";
        return false;
    }
    
    $namagambarbaru = uniqid();
    $namagambarbaru .= '.';
    $namagambarbaru .= $ekstensi;

    move_uploaded_file($simpangambar, "../img/blog/".$namagambarbaru);


    return $namagambarbaru;
}

function editblog($data, $file, $session){
    global $conn;

    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $isi = htmlspecialchars($data["isi"]);
    $userid = $session['id'];
    
    $query = "SELECT gambar FROM blog WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $gambarSebelumnya = $row["gambar"];
    
    if ($file["gambar"]["error"] === 4 && empty($gambarSebelumnya)) {
         echo "<script>
                alert('pilih gambar terlebih dahulu');
              </script>";
        return false;
    }

    // Cek apakah pengguna mengunggah gambar baru
    if ($file["gambar"]["error"] === 4) {
        // Pengguna tidak mengunggah gambar baru
        $query = "UPDATE blog SET
                    user_id = '$userid',
                    judul = '$judul',
                    isi = '$isi',
                    tanggal_update = NOW()
                    WHERE id = $id
                ";
    }

    if ($file["gambar"]["error"] !== 4) {

        // Pengguna mengunggah gambar baru
        $gambar = editgambarberita($file);
        
        if(!$gambar){
            return false;
        }

        $query = "UPDATE blog SET
                    user_id = '$userid',
                    gambar = '$gambar',
                    judul = '$judul',
                    isi = '$isi',
                    tanggal_update = NOW()
                    WHERE id = $id
                ";
    }

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>
