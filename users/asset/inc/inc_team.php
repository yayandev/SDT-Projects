<br><br>
<div class="container mt-5">
	<div class="row d-flex justify-content-around">
<?php foreach($allmember as $member) : ?>
		<div class="card mb-3 text-center" style="width: 18rem;">
		  <img src="../admin/images-post/<?= $member['img']; ?>"class="rounded-circle" height="150px" class="card-img-top" alt="...">
		  <div class="card-body">
		    <h5 class="card-title"><?= $member['username'] ?></h5>
		    <a href="profile.php?id=<?= $member['id']; ?>" class="btn btn-primary">Profile</a>
		  </div>
		</div>
	<?php endforeach; ?>
	</div>
</div>