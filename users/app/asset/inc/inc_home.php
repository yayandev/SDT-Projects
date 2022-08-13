<br>
<div class="container mt-5">

    <div class="container">
        <?php foreach ($allpost as $post) : ?>
            <div class="jumbotron mb-4 shadow-sm p-4" style="background-color: #FFFFFF; border-radius: 10px;">
                <div class="d-flex justify-content-between">
                    <div>
                        <a href="">
                            <img src="app/asset/img/userpic.gif" height="50px" alt="">
                            <p class="lead" style="text-decoration: none;"><?= $post["author"]; ?></p>
                        </a>
                    </div>
                    <div class="d-flex">
                        <p class="lead"><?= $post["date"]; ?></p>
                        <div class="dropdown">
                            <button style="background-color: transparent; border: none; font-size: 28px;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-share"></i> share</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr class="my-2">
                <img src="../admin/images-post/<?= $post['images']; ?>" width="100%" alt="">
                <p>kategori <?= $post["kategori"]; ?></p>
                <hr class="my-3">
                <p><?= $post["title"]; ?></p>
                <div class="d-flex justify-content-between">
                    <p><?= $post["deskripsi"]; ?></p>
                </div>
                <a class="btn btn-info" href="<?= $post["demo"]; ?>" role="button">demo</a>
                <a class="btn btn-success" href="<?= $post["source"]; ?>" role="button">download</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>