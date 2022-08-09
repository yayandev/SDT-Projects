<?php
require 'sistem/query.php';

session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: ../login.php");
    exit;
}

// <!-- cetak session login -->
if ($_SESSION['admin']) {
    $login = $_SESSION['admin'];
}

$user = query("SELECT * FROM multi_user WHERE id = '$login'")[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDT Projects | Admin Panel</title>
</head>

<body>
    <h1>HELLO <?= $user['username']; ?></h1>
</body>

</html>