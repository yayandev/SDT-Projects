<div class="container mt-5">
    <div class="row d-flex justify-content-around">
        <?php foreach ($allpost as $post) : ?>
            <div class="card mt-3" style="width: 18rem; padding: 5px;box-sizing: border-box;">
                <img src="../admin/images-post/<?= $post['images']; ?>" class="card-img-top" height="150px" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $post['title']; ?></h5>
                    <p class="card-text"><?php $kalimat = $post['deskripsi'];
                                            $jumlahkarakter = 10;
                                            $cetak = substr($kalimat, 0, $jumlahkarakter);
                                            echo $cetak; ?>....</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">author : <a href="" class="card-link"><?= $post['author']; ?></a></li>
                    <li class="list-group-item">kategori : <a href="" class="card-link"><?= $post['kategori']; ?></a></li>
                    <li class="list-group-item"><?= $post['date']; ?></li>
                </ul>
                <div class="card-body">
                    <a href="" class="card-link">Read more</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>