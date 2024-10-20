<?php
$conn = mysqli_connect("localhost", "root", "", "desamappilawing");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function tambahlayanan($data, $file){
    global $conn;

    $judul = htmlspecialchars($data["judul"]);
    $teks = htmlspecialchars($data["teks"]);
    
    $logo = uploadlogo($file);
    
    if(!$logo){
        return false;
    }

    $query = "INSERT INTO layanan VALUES ('', '$logo', '$judul', '$teks', NOW())";


    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function uploadlogo($file){

    $logo = $file["logo"]["name"];
    $simpanlogo = $file["logo"]["tmp_name"];
    $ukuranlogo = $file['logo']['size'];
    $error = $file['logo']['error'];
    
    // mengecek apakahada file diupload
    if($error === 4){
        echo "<script>
                alert('pilih gambar terlebih dahulu');
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
    
    if($ukuranlogo > 10000000000){
        echo "<script>
                alert('Ukuran logo terlalu besar!');
              </script>";
        return false;
    }
    
    $namalogobaru = uniqid();
    $namalogobaru .= '.';
    $namalogobaru .= $ekstensi;

    move_uploaded_file($simpanlogo, "img/layanan/".$namalogobaru);


    return $namalogobaru;
}

function hapuslayanan($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM layanan WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function tambahbooklet($data, $file, $file2, $session){
    global $conn;

    $judul = htmlspecialchars($data["judul"]);
    
    $userid = $session['id'];

    $gambar = uploadgambarbooklet($file);
    $dokumen = uploadfilebooklet($file2);
    
    if(!$gambar){
        return false;
    }

    if(!$dokumen){
        return false;
    }

    $query = "INSERT INTO booklet VALUES ('', '$userid', '$gambar', '$judul', '$dokumen', NOW(), NOW())";


    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function uploadgambarbooklet($file){

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

function uploadfilebooklet($file2){

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

function hapusbooklet($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM booklet WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function tambahblog($data, $file, $session){
    global $conn;

    $judul = htmlspecialchars($data["judul"]);
    $isi = htmlspecialchars($data["isi"]);
    
    $userid = $session['id'];

    $gambar = uploadgambarberita($file);
    
    if(!$gambar){
        return false;
    }

    $query = "INSERT INTO blog VALUES ('', '$userid', '$gambar', '$judul', '$isi', NOW(), NOW())";


    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function uploadgambarberita($file){

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
    
    if($ukurangambar > 10000000000){
        echo "<script>
                alert('Ukuran gambar terlalu besar!');
              </script>";
        return false;
    }
    
    $namagambarbaru = uniqid();
    $namagambarbaru .= '.';
    $namagambarbaru .= $ekstensi;

    move_uploaded_file($simpangambar, "img/blog/".$namagambarbaru);


    return $namagambarbaru;
}

function hapusblog($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM blog WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function uploadprofil($file){

    $profil = $file["profil"]["name"];
    $simpanprofil = $file["profil"]["tmp_name"];
    $ukuranprofil = $file['profil']['size'];
    $error = $file['profil']['error'];
    
    // mengecek apakahada file diupload
    if($error === 4){
        echo "<script>
                alert('pilih gambar terlebih dahulu');
              </script>";
        return false;
    }

    // mengecek tipe file
    $allowed = ['jpg', 'jpeg', 'png'];
    $ekstensi = explode('.', $profil);
    $ekstensi = strtolower(end($ekstensi));

    if(!in_array($ekstensi, $allowed)){
        echo "<script>
                alert('Format profil salah!');
              </script>";
        return false;
    }
    
    if($ukuranprofil > 1000000){
        echo "<script>
                alert('Ukuran profil terlalu besar!');
              </script>";
        return false;
    }
    
    $namaprofilbaru = uniqid();
    $namaprofilbaru .= '.';
    $namaprofilbaru .= $ekstensi;

    move_uploaded_file($simpanprofil, "img/admin/".$namaprofilbaru);


    return $namaprofilbaru;
}

function registrasi($data, $file){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $profil = uploadprofil($file);
    
    if(!$profil){
        return false;
    }

    $result = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username' OR email = '$email'");

    if(mysqli_fetch_assoc($result)){
        echo "
            <script>
                alert('username sudah dipakai!');
            </script>
        ";
        return false;
    }

    if($password !== $password2){
        echo "
            <script>
                alert('password tidak sesuai!');
            </script>
        ";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO admin VALUES ('', '$profil', '$username', '$email', '$password')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>