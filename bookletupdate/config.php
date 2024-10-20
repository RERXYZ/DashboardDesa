<?php

require '../config.php';

function editgambarbooklet($file){

    $gambar = $file["gambar"]["name"];
    $simpangambar = $file["gambar"]["tmp_name"];
    $ukurangambar = $file['gambar']['size'];
    $error = $file['gambar']['error'];
    
    // mengecek apakahada file diupload
    if($error === 4){
        echo "<script>
                alert('pilih gambar sampul terlebih dahulu');
              </script>";
        return false;
    }

    // mengecek tipe file
    $allowed = ['jpg', 'jpeg', 'png'];
    $ekstensi = explode('.', $gambar);
    $ekstensi = strtolower(end($ekstensi));

    if(!in_array($ekstensi, $allowed)){
        echo "<script>
                alert('Format gambar sampul salah!');
              </script>";
        return false;
    }
    
    if($ukurangambar > 100000000){
        echo "<script>
                alert('Ukuran gambar sampul terlalu besar!');
              </script>";
        return false;
    }
    
    $namagambarbaru = uniqid();
    $namagambarbaru .= '.';
    $namagambarbaru .= $ekstensi;

    move_uploaded_file($simpangambar, "img/booklet/".$namagambarbaru);


    return $namagambarbaru;
}

function editfilebooklet($file2){

    $file = $file2["file"]["name"];
    $simpanfile = $file2["file"]["tmp_name"];
    $ukuranfile = $file2['file']['size'];
    $error = $file2['file']['error'];
    
    // mengecek apakahada file diupload
    if($error === 4){
        echo "<script>
                alert('pilih file terlebih dahulu');
              </script>";
        return false;
    }

    // mengecek tipe file
    $allowed = ['pdf'];
    $ekstensi = explode('.', $file);
    $ekstensi = strtolower(end($ekstensi));

    if(!in_array($ekstensi, $allowed)){
        echo "<script>
                alert('Format file salah!');
              </script>";
        return false;
    }
    
    if($ukuranfile > 10000000000){
        echo "<script>
                alert('Ukuran file terlalu besar!');
              </script>";
        return false;
    }
    
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensi;

    move_uploaded_file($simpanfile, "file/booklet/".$namafilebaru);


    return $namafilebaru;
}

function editbooklet($data, $file, $file2, $session){
    global $conn;

    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $userid = $session['id'];

    $querygambar = "SELECT gambar FROM booklet WHERE id = $id";
    $resultgambar = mysqli_query($conn, $querygambar);
    $rowgambar = mysqli_fetch_assoc($resultgambar);
    $gambarSebelumnya = $rowgambar["gambar"];

    $queryfile = "SELECT dokumen FROM booklet WHERE id = $id";
    $resultbooklet = mysqli_query($conn, $queryfile);
    $rowfile = mysqli_fetch_assoc($resultbooklet);
    $fileSebelumnya = $rowfile["dokumen"];
    
    if ($file["gambar"]["error"] === 4 && empty($gambarSebelumnya)) {
        echo "<script>
               alert('pilih gambar terlebih dahulu');
             </script>";
       return false;
   }

    if ($file2["file"]["error"] === 4 && empty($fileSebelumnya)) {
        echo "<script>
               alert('pilih file terlebih dahulu');
             </script>";
       return false;
   }

   // Cek apakah pengguna mengunggah gambar baru
    if ($file["gambar"]["error"] === 4 || $file2["file"]["error"] === 4) {
        // Pengguna tidak mengunggah gambar baru
        $query = "UPDATE booklet SET
                user_id = '$userid',
                judul = '$judul',
                tanggal_update = NOW()
                WHERE id = $id
            ";
    }

    if ($file["gambar"]["error"] !== 4 || $file2["file"]["error"] !== 4) {

        // Pengguna mengunggah gambar baru
        $gambar = editgambarbooklet($file);
        $dokumen = editfilebooklet($file2);

        if (!$gambar) {
            return false;
        }
        
        if(!$dokumen){
            return false;
        }

        $query = "UPDATE booklet SET
                user_id = '$userid',
                gambar = '$gambar',
                judul = '$judul',
                dokumen = '$dokumen',
                tanggal_update = NOW()
                WHERE id = $id
            ";
    }


    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>
