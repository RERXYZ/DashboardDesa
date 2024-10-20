<?php

require '../config.php';

// function tambahdatagaleri($data, $file){
//     global $conn;

//     $keterangan = htmlspecialchars($data["keterangan"]);
    
//     $gambar = uploadgambar($file);
    
//     if( !$gambar ){
//         return false;
//     }

//     $query = "INSERT INTO galeri VALUES ('', '$gambar', '$keterangan', '', '')";


//     mysqli_query($conn, $query);

//     return mysqli_affected_rows($conn);
// }

function uploadgambar($file){

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
                alert('Format foto salah!');
              </script>";
        return false;
    }
    
    if($ukurangambar > 100000000){
        echo "<script>
                alert('Ukuran foto terlalu besar!');
              </script>";
        return false;
    }
    
    $namagambarbaru = uniqid();
    $namagambarbaru .= '.';
    $namagambarbaru .= $ekstensi;

    move_uploaded_file($simpangambar, "../img/galeri/".$namagambarbaru);


    return $namagambarbaru;
}

// function uploadvideo($file){

//     $video = $file["video"]["name"];
//     $simpanvideo = $file["video"]["tmp_name"];
//     $ukuranvideo = $file['video']['size'];
//     $errorvid = $file['video']['error'];
    
//     // mengecek apakahada file diupload
//     if($errorvid === 4){
//         echo "<script>
//                 alert('pilih video terlebih dahulu');
//               </script>";
//         return false;
//     }

//     // mengecek tipe file
//     $allowedvid = ['mp4', 'mov'];
//     $ekstensivid = explode('.', $video);
//     $ekstensivid = strtolower(end($ekstensivid));


//     if(!in_array($ekstensivid, $allowedvid)){
//         echo "<script>
//                 alert('Format video salah!');
//               </script>";
//         return false;
//     }
    
//     if($ukuranvideo > 100000000){
//         echo "<script>
//                 alert('Ukuran foto/video terlalu besar!');
//               </script>";
//         return false;
//     }
    
//     $namavideobaru = uniqid();
//     $namavideobaru .= '.';
//     $namavideobaru .= $ekstensivid;

//     move_uploaded_file($simpanvideo, "vid/".$namavideobaru);


//     return $namavideobaru;
// }


function editgaleri($data, $file){
    global $conn;       

    $id = $data["id"];
    $keterangan = htmlspecialchars($data["keterangan"]);

    $gambar = uploadgambar($file);

    if( !$gambar ){
        return false;
    }

    $query = "UPDATE galeri SET
                gambar = '$gambar',
                keterangan = '$keterangan'
                WHERE id = $id
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// function cari($keyword){
//     $query = "SELECT * FROM wisata
//                 WHERE nama LIKE '%$keyword%' OR
//                 alamat LIKE '%$keyword%' OR
//                 keterangan LIKE '%$keyword%'
//                 ";

//     return query($query);
// }

// function registrasi($data){
//     global $conn;

//     $username = strtolower(stripslashes($data["username"]));
//     $password = mysqli_real_escape_string($conn, $data["password"]);
//     $password2 = mysqli_real_escape_string($conn, $data["password2"]);

//     $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

//     if(mysqli_fetch_assoc($result)){
//         echo "
//             <script>
//                 alert('username sudah dipakai!');
//             </script>
//         ";
//         return false;
//     }

//     if($password !== $password2){
//         echo "
//             <script>
//                 alert('password tidak sesuai!');
//             </script>
//         ";
//         return false;
//     }

//     $password = password_hash($password, PASSWORD_DEFAULT);

//     $query = "INSERT INTO users VALUES ('', '$username', '$password')";

//     mysqli_query($conn, $query);

//     return mysqli_affected_rows($conn);
// }

?>