<?php
require "../admin/sistem/conn.php";

// edit images profile 
function editImages($data)
{
    global $conn;

    $images = upload();
    $id  = $data['id'];

    $query = "UPDATE multi_user SET img = '$images' WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// function upload
function upload()
{
    $namaFile = $_FILES['images']['name'];
    $ukuranFile = $_FILES['images']['size'];
    $error = $_FILES['images']['error'];
    $tmpName = $_FILES['images']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<div class='alert alert-danger' role='alert' style='position:fixed; z-index:9999999; top:0;'>
        Pilih gambar terlebih dahulu!!!
        </div>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<div class='alert alert-danger' role='alert' id='alert'  style='position:fixed; z-index:9999999; top:0;'>
        Yang anda pilih bukan gambar! ekstensiGambarValid 'jpg, png, jpeg'
        </div>";
        return false;
    }

    // cek jika ukurannya terlalu besar



    if ($ukuranFile > 1000000) {
        echo "<div class='alert alert-danger' id='alert' role='alert' style='position:fixed; z-index:9999999; top:0;'>
        ukuran images terlalu besar!
        maximum ukuranFile '1mb'
        </div>";
        return false;
    }

    if ($ukuranFile  < 20000) {
        echo "<div class='alert alert-danger' id='alert' role='alert' style='position:fixed; z-index:9999999; top:0;'>
        ukuran images terlalu kecil!
        minimum ukuranFile '200kb'
        </div>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../admin/images-post/' . $namaFileBaru);

    return $namaFileBaru;
}


// funtion editProfile
function editProfile($data)
{
    global $conn;
    $name = $data["name"];
    $addres = htmlspecialchars($data['addres']);
    $email = htmlspecialchars($data['email']);
    $nophone = htmlspecialchars($data['nophone']);
    $old = htmlspecialchars($data['old']);

    $query = "UPDATE profile SET name = '$name', address = '$addres', email = '$email', nophone = '$nophone', old = '$old' WHERE name = '$name'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// function posting
function posting($data)
{
    global $conn;
    $title = htmlspecialchars($data['title']);
    $demo = htmlspecialchars($data['demo']);
    $source = htmlspecialchars($data['source']);
    $deskripsi = htmlspecialchars($data['deskripsi']);
    $author = htmlspecialchars($data['author']);
    $date = htmlspecialchars($data['date']);
    $kategori = htmlspecialchars($data['kategori']);
    $images = upload();
    if (!$images) {
        return false;
    }

    $query = "INSERT INTO postingan VALUES('', '$title', '$demo', '$source', '$images', '$deskripsi', '$author', '$date', '$kategori')";

    $post = mysqli_query($conn, $query);

    if ($post) {
        mysqli_query($conn, "INSERT INTO notif VALUES('', '$author', '$title', '$date')");
    }

    return mysqli_affected_rows($conn);
}

// delete post
function deletePost($data)
{
    global $conn;
    $id = $data['id'];
    $query = "DELETE FROM postingan WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// change username
function changeUsername($data)
{
    global $conn;
    $id = $data['id'];
    $usernameLama = $data['usernameLama'];
    $usernameBaru = htmlspecialchars($data['usernameBaru']);

    $query = "UPDATE multi_user SET username = '$usernameBaru' WHERE id = $id";

    $changeUsername = mysqli_query($conn, $query);

    if ($changeUsername) {
        mysqli_query($conn, "UPDATE postingan SET author = '$usernameBaru' WHERE author = '$usernameLama' ");
        mysqli_query($conn, "UPDATE profile SET name = '$usernameBaru' WHERE name = '$usernameLama'");
        mysqli_query($conn, "UPDATE notif SET author = '$usernameBaru' WHERE author = '$usernameLama'");
    }

    return mysqli_affected_rows($conn);
}
