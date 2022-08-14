<div class="container">

    <div class="container">
      <div class="row d-flex gap-2 justify-content-center">
        <?php foreach ($allpost as $post) : ?>
            <div class="col-md-5 col-lg-3 mb-4 shadow-sm p-4" style="background-color: #FFFFFF; border-radius: 10px;">
                <div class="d-flex justify-content-center gap-2">
                    <a href="">
                        <img src="app/asset/img/userpic.gif" height="50px" alt="">
                        <p class="lead" style="text-decoration: none;"><?= $post["author"]; ?></p>
                    </a>
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
                <img style="max-height: 10vh; min-height: 10vh" src="../admin/images-post/<?= $post['images']; ?>" width="100%" alt="">
                <p>kategori <?= $post["kategori"]; ?></p>
                <hr class="my-3">
                <p><?= $post["title"]; ?></p>
                <div style="max-height: 10vh; min-height: 10vh" class="d-flex justify-content-between">
                  <p><?= $post["deskripsi"]; ?></p>
                </div>
                <div class="d-flex gap-2 justify-content-end">
                  <a class="btn btn-info" href="<?= $post["demo"]; ?>" role="button">demo</a>
                  <a class="btn btn-success" href="<?= $post["source"]; ?>" role="button">download</a>
                </div>
            </div>
        <?php endforeach; ?>
      </div>
    </div>
</div>