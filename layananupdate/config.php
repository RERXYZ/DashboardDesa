<?php

require '../config.php';

function uploadeditlogo($file){

    $logo = $file["logo"]["name"];
    $simpanlogo = $file["logo"]["tmp_name"];
    $ukuranlogo = $file['logo']['size'];
    $error = $file['logo']['error'];
    
    // mengecek apakahada file diupload
    if($error === 4){
        echo "<script>
                alert('pilih logo terlebih dahulu');
              </script>";
        return false;
    }

    // mengecek tipe file
    $allowed = ['jpg', 'jpeg', 'png'];
    $ekstensi = explode('.', $logo);
    $ekstensi = strtolower(end($ekstensi));

    if(!in_array($ekstensi, $allowed)){
        echo "<script>
                alert('Format logo salah!');
              </script>";
        return false;
    }
    
    if($ukuranlogo > 100000000){
        echo "<script>
                alert('Ukuran logo terlalu besar!');
              </script>";
        return false;
    }
    
    $namalogobaru = uniqid();
    $namalogobaru .= '.';
    $namalogobaru .= $ekstensi;

    move_uploaded_file($simpanlogo, "../img/layanan/".$namalogobaru);


    return $namalogobaru;
}
function editlayanan($data, $file){
    global $conn;       

    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $teks = htmlspecialchars($data["teks"]);

    $query = "SELECT logo FROM layanan WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $logoSebelumnya = $row["logo"];
    
    if ($file["logo"]["error"] === 4 && empty($logoSebelumnya)) {
         echo "<script>
                alert('pilih logo terlebih dahulu');
              </script>";
        return false;
    }

    // Cek apakah pengguna mengunggah logo baru
    if ($file["logo"]["error"] === 4) {
        // Pengguna tidak mengunggah logo baru
        $query = "UPDATE layanan SET
                    judul = '$judul',
                    teks = '$teks',
                    tanggal = NOW()
                    WHERE id = $id
                ";
    }
    
    if ($file["logo"]["error"] !== 4) {

        // Pengguna mengunggah logo baru
        $logo = uploadeditlogo($file);
        
        if( !$logo ){
            return false;
        }

        $query = "UPDATE layanan SET
                    logo = '$logo',
                    judul = '$judul',
                    teks = '$teks',
                    tanggal = NOW()
                    WHERE id = $id
                ";
    }

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>