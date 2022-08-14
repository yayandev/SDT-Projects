<div class="container">
    <div class="jumbotron">
        <div class="d-flex justify-content-center" style="background-image: url(../admin/images-post/<?= $user["img"]; ?>); background-repeat: no-repeat; background-size: cover; height: 300px; background-position: center; align-items: center; flex-direction: column;">
            <img src="../admin/images-post/<?= $user["img"]; ?>" height="100px" class="rounded-circle" style="border: 3px white solid;" alt="">
            <div class="m-3 text-light">
                <a class="btn btn-lg btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-gear-wide"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#editImages">Edit Images</a></li>
                    <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#editprofile">Edit profile</a></li>
                </ul>
            </div>
        </div>
        <hr class="my-4">
        <table class="table">
            <tbody>
                <tr>
                    <th>Name</th>
                    <td><?= $profile["name"]; ?></td>
                </tr>
                <tr>
                    <th>Addres</th>
                    <td><?= $profile["address"]; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= $profile["email"]; ?></td>
                </tr>
                <tr>
                    <th>Nophone</th>
                    <td><?= $profile["nophone"]; ?></td>
                </tr>
                <tr>
                    <th>Old</th>
                    <td><?= $profile["old"]; ?></td>
                </tr>
            </tbody>
        </table>
        <hr class="my-3">
        <h4>Total Post : <?= $totalPost; ?></h4>
    </div>


    <!-- ============================ delete post ======================== -->
    <?php
    if (isset($_POST['delete'])) {
        if (deletePost($_POST) > 0) {
            echo "
            <div class='container' style='position:fixed; z-index:999999; top:0;' id='alert'>
            <div class='alert alert-primary d-flex justify-content-around' role='alert'>
                <p>delete post success!</p>        
                <button type='button' onclick='closeAlert();' class='btn-close'  aria-label='Close'></button>
            </div>
            </div>
            ";
        } else {
            echo "
            <div class='container' style='position:fixed; z-index:999999; top:0;' id='alert'>
            <div class='alert alert-danger d-flex justify-content-around' role='alert'>
                <p>delete post not success!</p>        
                <button type='button' onclick='closeAlert();' class='btn-close'  aria-label='Close'></button>
            </div>
            </div>
            ";
        }
    }
    ?>

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
                                <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#delete<?= $post['id']; ?>"><i class="bi bi-trash3"></i> delete</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square"></i> edit</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-share"></i> share</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr class="my-2">
                <img src="../admin/images-post/<?= $post["images"]; ?>" width="100%" alt="">
                <p>kategori <?= $post["kategori"]; ?></p>
                <hr class="my-3">
                <p><?= $post["title"]; ?></p>
                <div class="d-flex justify-content-between">
                    <p><?= $post["deskripsi"]; ?></p>
                </div>
                <a class="btn btn-info" href="<?= $post["demo"]; ?>" role="button">demo</a>
                <a class="btn btn-success" href="<?= $post["source"]; ?>" role="button">download</a>
            </div>
            <!-- modal confirm delete -->
            <div class="modal fade" id="delete<?= $post['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">confirm</h5>
                        </div>
                        <div class="modal-body">
                            <p class="text-center fs-3">Title : <?= $post['title']; ?></p>
                            <h5 class="text-center">are you sure you want to delete??</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $post['id']; ?>">
                                <button type="submit" name="delete" class="btn btn-primary">Yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>


    <!-- =============================================== editImages============================================== -->
    <?php
    if (isset($_POST["editImages"])) {
        if (editImages($_POST) > 0) {
            echo "
            <div class='container' style='position:fixed; z-index:999999; top:0;'>
            <div class='alert alert-primary' role='alert'>
                Update Success please refresh page! <a href='profile.php' class='btn btn-light'><i class='bi bi-arrow-repeat'></i></a>
            </div>
            </div>
            ";
        } else {
            echo "
            <div class='container' style='position:fixed; z-index:999999; top:0;'>
            <div class='alert alert-danger' role='alert'>
                update error!
            </div>
            </div>
            ";
        }
    }
    ?>
    <!-- Modal edit images -->
    <div class="modal fade" id="editImages" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Images</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="mb-3">
                            <img src="../admin/images-post/<?= $user["img"]; ?>" alt="" height="200px" class="form-label rounded-circle">
                            <input type="file" class="form-control" name="images">
                        </div>
                        <input type="hidden" value="<?= $user["id"]; ?>" name="id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="editImages" class="btn btn-primary">Edit images</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- =============================================== editProfile ============================================== -->
    <?php

    if (isset($_POST["editProfile"])) {
        if (editProfile($_POST) > 0) {
            echo "
            <div class='container' style='position:fixed; z-index:999999; top:0;'>
            <div class='alert alert-primary' role='alert'>
                Update Success please refresh page! <a href='profile.php' class='btn btn-light'><i class='bi bi-arrow-repeat'></i></a>
            </div>
            </div>
            ";
        } else {
            echo "
            <div class='container' style='position:fixed; z-index:999999; top:0;'>
            <div class='alert alert-danger' role='alert'>
                Update error!
            </div>
            </div>
            ";
        }
    }

    ?>




    <!-- Modal edit images -->
    <div class="modal fade" id="editprofile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <input type="hidden" value="<?= $user['username']; ?>" name="name">
                        <div class="mb-3">
                            <label for="addres" class="form-label">Addres</label>
                            <input type="text" id="addres" class="form-control" value="<?= $profile['address']; ?>" name="addres">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" value="<?= $profile['email']; ?>" name="email">
                        </div>

                        <div class="mb-3">
                            <label for="nophone" class="form-label">Nophone</label>
                            <input type="text" id="nophone" class="form-control" value="<?= $profile['nophone']; ?>" name="nophone">
                        </div>

                        <div class="mb-3">
                            <label for="Old" class="form-label">Old</label>
                            <input type="text" id="Old" class="form-control" value="<?= $profile['old']; ?>" name="old">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="editProfile" class="btn btn-primary">Edit Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        function closeAlert() {
            let notif = document.getElementById("alert");
            notif.setAttribute("style", "display:none;")
        }
    </script>