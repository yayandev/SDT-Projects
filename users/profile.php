<?php 
require '../admin/sistem/query.php';

$id = $_GET['id'];
$member = query("SELECT * FROM multi_user WHERE id = $id")[0];

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SDT Projects | Profile <?= $member['username']; ?></title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/users.css">
	<link rel="stylesheet" href="../icons/bootstrap-icons.css">
	<link rel="stylesheet" href="../css/animasi.css">
<head>

</head>
<body>
	<!-- nav -->
	<?php include 'asset/inc/header.php'; ?>

	<!-- main -->
	<div class="container">
		
	</div>


<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>