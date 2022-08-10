<div class="container mt-3">
    <a href="../../index.php" class="btn btn-secondary">Back</a>
    <div class="jumbotron">
        <div class="d-flex justify-content-center">
            <img src="../../../admin/images-post/<?= $user['img']; ?>" alt="" width="120px" class="rounded-circle">
            <a type="button" class="btn btn-primary m-2" style="height: 40px;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap"><i class="bi bi-pencil-square"></i></a>
        </div>


        <p class="lead fs-3">Profile</p>
        <hr class="my-4">
        <table cellpadding="10" cellpadding="10">
            <tr>
                <td>username </td>
                <td> <?= $user['username']; ?></td>
            </tr>
            <tr>
                <td>level </td>
                <td> <?= $user['level']; ?></td>
            </tr>
            <tr>
                <td>addres </td>
                <td> coming soon!</td>
            </tr>
            <tr>
                <td>email </td>
                <td> coming soon!</td>
            </tr>
            <tr>
                <td>nophone </td>
                <td> coming soon!</td>
            </tr>
            <tr>
                <td>Old </td>
                <td> coming soon!</td>
            </tr>
            <tr>
                <td>Total Post </td>
                <td> <?= $jmlpost; ?></td>
            </tr>
        </table>

        <p class="fs-3 mt-3">My post</p>
        <hr class="my-4">
        <div class="container mt-3">
            <div class="row d-flex justify-content-around">
                <?php foreach ($mypost as $post) : ?>
                    <div class="card mt-3" style="width: 18rem; padding: 5px;box-sizing: border-box;">
                        <img src="../../../admin/images-post/<?= $post['images']; ?>" class="card-img-top" height="150px" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $post['title']; ?></h5>
                            <p class="card-text"><?php $kalimat = $post['deskripsi'];
                                                    $jumlahkarakter = 10;
                                                    $cetak = substr($kalimat, 0, $jumlahkarakter);
                                                    echo $cetak; ?>....</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">kategori : <a href="" class="card-link"><?= $post['kategori']; ?></a></li>
                            <li class="list-group-item"><?= $post['date']; ?></li>
                        </ul>
                        <div class="card-body">
                            <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delpost<?= $post['id']; ?>"><i class="bi bi-trash3"></i></a>
                            <a href="" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                        </div>
                    </div>
                    <!-- modal -->
                    <div class="modal fade" id="delpost<?= $post['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                                </div>
                                <div class="modal-body">
                                    <p>Anda Yakin akan menghapus ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                                    <a href="../sistem/sis_del_post.php?id=<?= $post['id']; ?>" class="btn btn-danger">Yes</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal delete -->
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</div>