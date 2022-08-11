<?php

$id = $_GET['id'];

require '../../../admin/sistem/conn.php';

function del_post($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM postingan WHERE id = $id");
    return mysqli_affected_rows($conn);
}

if (del_post($id) > 0) {
    echo "
    <div class='alert alert-primary' role='alert'>
  Delete Post success!
  <a href='../pages/profile.php' class='btn btn-secondary'>back</a>
</div>
    ";
} else {
    echo "
    <div class='alert alert-danger' role='alert'>
  Delete Post error!
  <a href='../pages/profile.php' class='btn btn-secondary'>back</a>
</div>
    ";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete | post SDT Projects</title>
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
</head>

<body>



    <script src="../../../js/bootstrap.bundle.min.js"></script>
</body>

</html>