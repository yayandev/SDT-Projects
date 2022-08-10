<?php
session_start();
if (!isset($_SESSION["users"])) {
    header("Location: ../../../login.php");
    exit;
}

// <!-- cetak session login -->
if ($_SESSION['users']) {
    $login = $_SESSION['users'];
}

require '../../../admin/sistem/query.php';
require '../sistem/sis_posting.php';

$user = query("SELECT * FROM multi_user where id = $login")[0];
$name = $user['username'];

$jmlpost = count(query("SELECT * FROM postingan WHERE author = '$name'"));
$mypost = query("SELECT * FROM postingan WHERE author = '$name'");
$profile = query("SELECT * FROM profile WHERE name = '$name'")[0];

if (isset($_POST['edit'])) {
    if (editImages($_POST) > 0) {
        echo "
        <div class='alert alert-success mt-5' role='alert'>
        Update images Success! Please refresh page <a href='profile.php' class='btn btn-light'><i class='bi bi-arrow-clockwise'></i></a>
        </div>
        ";
    } else {
        echo "
        <div class='alert alert-danger mt-5' role='alert'>
        Update images Error! Please refresh page <a href='profile.php' class='btn btn-light'><i class='bi bi-arrow-clockwise'></i></a>
        </div>
        ";
    }
}

if (isset($_POST['editprofile'])) {
    if (editProfile($_POST) > 0) {
        echo "
        <div class='alert alert-success mt-5' role='alert'>
        Update profile Success! Please refresh page <a href='profile.php' class='btn btn-light'><i class='bi bi-arrow-clockwise'></i></a>
        </div>
        ";
    } else {
        echo "
        <div class='alert alert-danger mt-5' role='alert'>
        Update profile Error! Please refresh page <a href='profile.php' class='btn btn-light'><i class='bi bi-arrow-clockwise'></i></a>
        </div>
        ";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $user['username']; ?> | Profile</title>
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../css/users.css">
</head>

<body>

    <!-- profile -->
    <?php include '../inc/inc_profile.php'; ?>


    <!-- modal update img -->
    <?php include '../modal/modal-update-images.php'; ?>


    <script src="../../../js/bootstrap.bundle.min.js"></script>
</body>

</html>