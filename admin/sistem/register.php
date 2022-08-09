<?php
require 'conn.php';


////////////////// function registration /////////////////
function register($data)
{
  global $conn;

  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);
  $level = mysqli_real_escape_string($conn, $data["level"]);


  $admin = mysqli_query($conn, "SELECT username FROM multi_user WHERE username = '$username' ");

  if (mysqli_fetch_assoc($admin)) {

    echo "<div class='alert alert-danger' role='alert'>
        Username yang Anda pilih sudah digunakan, silahkan pilih username lain
      </div>
      ";

    return false;
  }

  // cek pasword
  if ($password !== $password2) {
    echo "<div class='alert alert-danger' role='alert'>
        Password dan konfirmasi password yang Anda masukan tidak sesuai
          </div>
          ";

    return false;
  }

  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // tambah user
  mysqli_query($conn, "INSERT INTO multi_user VALUES(NULL, '$username', '$password', '$level', 'avatar.jpg')");

  mysqli_query($conn, "INSERT admin VALUES(NULL, '$username', '$password')");

  return mysqli_affected_rows($conn);
}
