<br><br><br>
<div class="container">
    <div class="jumbotron">
        <div class="d-flex justify-content-center" style="background-image: url(../admin/images-post/<?= $user['img']; ?>); background-repeat: no-repeat; background-size: cover; height: 300px; background-position: center; align-items: center; flex-direction: column;">
            <img src="../admin/images-post/<?= $user['img']; ?>" height="100px" class="rounded-circle" style="border: 3px white solid;" alt="">
        </div>
        <div class="d-flex mt-3 justify-content-center">
            <a href="chat.php" class="btn btn-primary" style="font-size: 25px;"><i class="bi bi-chat-dots"></i></a>
        </div>
        <hr class="my-4">
        <table class="table">
            <tbody>
                <tr>
                    <th>Name</th>
                    <td><?= $user['username']; ?></td>
                </tr>
                <tr>
                    <th>Addres</th>
                    <td><?= $profile['address']; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= $profile['email']; ?></td>
                </tr>
                <tr>
                    <th>Nophone</th>
                    <td><?= $profile['nophone']; ?></td>
                </tr>
                <tr>
                    <th>Old</th>
                    <td><?= $profile['old']; ?></td>
                </tr>
            </tbody>
        </table>
        <hr class="my-3">
        <h4>Total Post : <?= $totalPost; ?></h4>
    </div>


    <div class="container">
        <?php foreach ($allpost as $post) : ?>
            <div class="jumbotron mb-4 shadow-sm p-4" style="background-color: #FFFFFF; border-radius: 10px;">
                <div class="d-flex justify-content-between">
                    <div>
                        <a href="">
                            <img src="../admin/images-post/<?= $user['img']; ?>" height="50px" alt="" class="rounded-circle">
                            <p class="lead" style="text-decoration: none;"><?= $post['author']; ?></p>
                        </a>
                    </div>
                    <div class="d-flex">
                        <p class="lead"><?= $post['date']; ?></p>
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
                <p>kategori <?= $post['kategori']; ?></p>
                <hr class="my-3">
                <p><?= $post['title']; ?></p>
                <div class="d-flex justify-content-between">
                    <p><?= $post['deskripsi']; ?></p>
                </div>
                <a class="btn btn-info" href="<?= $post['demo']; ?>" role="button">demo</a>
                <a class="btn btn-success" href="<?= $post['source']; ?>" role="button">download</a>
            </div>
        <?php endforeach; ?>

    </div>








    <!-- opsi post -->