<?php

require '../config.php';

function uploadfoto($file){

    $foto = $file["foto"]["name"];
    $simpanfoto = $file["foto"]["tmp_name"];
    $ukuranfoto = $file['foto']['size'];
    $error = $file['foto']['error'];
    
    // mengecek apakah ada file diupload
    if($error === 1){
        echo "<script>
                alert('pilih foto terlebih dahulu');
              </script>";
        return false;
    }

    // mengecek tipe file
    $allowed = ['jpg', 'jpeg', 'png'];
    $ekstensi = explode('.', $foto);
    $ekstensi = strtolower(end($ekstensi));

    if(!in_array($ekstensi, $allowed)){
        echo "<script>
                alert('Format foto salah!');
              </script>";
        return false;
    }
    
    if($ukuranfoto > 100000000){
        echo "<script>
                alert('Ukuran foto terlalu besar!');
              </script>";
        return false;
    }
    
    $namafotobaru = uniqid();
    $namafotobaru .= '.';
    $namafotobaru .= $ekstensi;

    move_uploaded_file($simpanfoto, "../img/struktur/".$namafotobaru);


    return $namafotobaru;
}

function editstruktur($data, $file){
    global $conn;       

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $jabatan = htmlspecialchars($data["jabatan"]);
    $kutipan = htmlspecialchars($data["kutipan"]);

    $query = "SELECT foto FROM struktur WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $fotoSebelumnya = $row["foto"];
    
    if ($file["foto"]["error"] === 4 && empty($fotoSebelumnya)) {
         echo "<script>
                alert('pilih foto terlebih dahulu');
              </script>";
        return false;
    }

    // Cek apakah pengguna mengunggah gambar baru
    if ($file["foto"]["error"] === 4) {
        // Pengguna tidak mengunggah gambar baru
        $query = "UPDATE struktur SET
                    nama = '$nama',
                    jabatan = '$jabatan',
                    kutipan = '$kutipan'
                    WHERE id = $id
                ";
    }
    
    if ($file["foto"]["error"] !== 4) {

        // Pengguna mengunggah gambar baru
        $foto = uploadfoto($file);
        
        if( !$foto ){
            return false;
        }

        $query = "UPDATE struktur SET
                    foto = '$foto',
                    nama = '$nama',
                    jabatan = '$jabatan',
                    kutipan = '$kutipan'
                    WHERE id = $id
                ";
    }

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>