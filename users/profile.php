<?php
require '../admin/sistem/query.php';

$id = $_GET['id'];
$member = query("SELECT * FROM multi_user WHERE id = $id")[0];
$name = $member['username'];
$profile = query("SELECT * FROM profile WHERE name = '$name'")[0];
$jmlpost = count(query("SELECT * FROM postingan WHERE author = '$name'"));
$allpost = query("SELECT * FROM postingan WHERE author = '$name'");


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
	<br>
	<!-- main -->
	<div class="container mt-5 text-center">
		<img src="../admin/images-post/<?= $member['img']; ?>" height="200px" width="200px" class="rounded-circle" alt="">
		<br>
		<h3 class="m-4 text-center"><?= $member['username']; ?></h3>
		<hr class="my-4">
		<br>
		<table cellpadding="15" style="text-align: left;">
			<tr>
				<td>level </td>
				<td> <?= $member['level']; ?></td>
			</tr>
			<tr>
				<td>addres </td>
				<td> <?= $profile['address']; ?></td>
			</tr>
			<tr>
				<td>email </td>
				<td> <?= $profile['email']; ?></td>
			</tr>
			<tr>
				<td>nophone </td>
				<td> <?= $profile['nophone']; ?></td>
			</tr>
			<tr>
				<td>Old </td>
				<td> <?= $profile['old']; ?></td>
			</tr>
			<tr>
				<td>Total Post </td>
				<td> <?= $jmlpost; ?></td>
			</tr>
		</table>

		<h3 class="mt-3">All POST</h3>
		<hr class="my-4">
		<div class="row d-flex justify-content-center">
			<?php foreach ($allpost as $post) : ?>
				<div class="card mt-3" style="width: 18rem; padding: 5px;box-sizing: border-box;">
					<img src="../admin/images-post/<?= $post['images']; ?>" class="card-img-top" height="150px" alt="...">
					<div class="card-body">
						<h5 class="card-title"><?= $post['title']; ?></h5>
						<p class="card-text"><?= $post['deskripsi']; ?></p>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">kategori : <a href="" class="card-link"><?= $post['kategori']; ?></a></li>
						<li class="list-group-item"><?= $post['date']; ?></li>
					</ul>
					<div class="card-body">
						<a href="<?= $post['demo']; ?>" class="btn btn-info">demo</a>
						<a href="<?= $post['source']; ?>" class="btn btn-success">download</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>


	<script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>