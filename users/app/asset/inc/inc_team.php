<div class="container">
    <div class="row d-flex justify-content-around mb-3">
        <?php foreach ($allmember as $member) : ?>
            <div class="py-2 shadow mb-3" style="width: 18rem; border: none;">
                <a href="users.php?name=<?= $member['username']; ?>" style="text-decoration: none; color: black;">
                    <img src="../admin/images-post/<?= $member['img']; ?>" style="box-sizing: border-box;" height="200px" class="card-img-top  p-3" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $member['username']; ?></h5>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>