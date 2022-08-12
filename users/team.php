<?php
require '../admin/sistem/query.php';

$allmember = query("SELECT * FROM multi_user WHERE level = 'user'");

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SDT Projects | Team Member</title>
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
	<?php include 'asset/inc/inc_team.php'; ?>


	<script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>