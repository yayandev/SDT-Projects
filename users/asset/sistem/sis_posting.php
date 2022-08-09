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

  mysqli_query($conn, "INSERT INTO notif VALUES('', '$author', '$title', '$date')");

  $query = "INSERT INTO postingan VALUES('', '$title', '$demo', '$source', '$images', '$deskripsi', '$author', '$date', '$kategori')";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
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
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
    return false;
  }

  // cek jika ukurannya terlalu besar
  if ($ukuranFile > 10000000) {
    echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
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


  $query = "UPDATE multi_user SET img = '$images'";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}
