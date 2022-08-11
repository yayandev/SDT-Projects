<?php
require '../../../admin/sistem/conn.php';

function posting($data)
{
  global $conn;
  $title = htmlspecialchars($data['title']);
  $demo = htmlspecialchars($data['demo']);
  $source = htmlspecialchars($data['source']);
  $deskripsi = htmlspecialchars(($data['deskripsi']));
  $author = htmlspecialchars($data['author']);
  $date = htmlspecialchars($data['date']);
  $kategori = htmlspecialchars($data['kategori']);

  // upload images
  $images = upload();
  if (!$images) {
    return false;
  }
  $query = "INSERT INTO postingan VALUES(NULL, '$title', '$demo', '$source', '$images', '$deskripsi', '$author', '$date', '$kategori')";
  try {
    mysqli_query($conn, "INSERT INTO notif VALUES(NULL, '$author', '$title', '$date')");
  
  
    mysqli_query($conn, $query);
  
    return mysqli_affected_rows($conn);
    
  } catch (\Exception $e ) {
    header('Content-Type: application/json');
    echo json_encode([
        "message" => mysqli_error($conn),
        "query" => $query
      ]);
    exit;
  }
}


function upload()
{
  $namaFile = $_FILES['images']['name'];
  $ukuranFile = $_FILES['images']['size'];
  $error = $_FILES['images']['error'];
  $tmpName = $_FILES['images']['tmp_name'];

  // cek apakah tidak ada gambar yang diupload
  if ($error === 4) {
    echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
    return false;
  }

  // cek apakah yang diupload adalah gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png', "gif"];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
    return false;
  }

  // cek jika ukurannya terlalu besar
  // 10000000 * n (mb size)
  if ($ukuranFile > 1000000) {
    echo "<div class='alert alert-danger' role='alert'>
        ukuran images terlalu besar!
        maximum ukuranFile '1mb'
        </div>";
    return false;
  }

  // lolos pengecekan, gambar siap diupload
  // generate nama gambar baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  move_uploaded_file($tmpName, '../../../admin/images-post/' . $namaFileBaru);

  return $namaFileBaru;
}


function editImages($data)
{
  global $conn;

  $images = upload();
  $id  = $data['id'];

  $query = "UPDATE multi_user SET img = '$images' WHERE id = $id";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function editProfile($data) {
  global $conn;

  $name = $data['name'];
  $addres = htmlspecialchars($data['addres']);
  $email = htmlspecialchars($data['email']);
  $nophone = htmlspecialchars($data['nophone']);
  $old = htmlspecialchars($data['old']);

  $query = "UPDATE profile SET address = '$addres', email = '$email', nophone = '$nophone', old = '$old' WHERE name = '$name'";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);

}