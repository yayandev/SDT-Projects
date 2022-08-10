<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit images | <?= $user['username']; ?></h5>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <img src="../../../admin/images-post/<?= $user['img']; ?>" class="rounded-circle form-label" width="200px" height="200px" alt="">
                    </div>
                    <div class="mb-3">
                        <label for="file" class="col-form-label">File images</label>
                        <input type="file" class="form-control" id="file" required name="images">
                    </div>
                    <input type="hidden" name="id" value="<?= $user['id']; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="edit">edit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- button -->
<a type="button" hidden class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">edit images </a>

<!-- modal -->
<div class="modal fade" id="editprofile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile | <?= $user['username']; ?></h5>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="addres">Addres</label>
                        <input type="text" class="form-control" name="addres" id="addres" value="<?= $profile['address']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?= $profile['email']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="nophone">Nophone</label>
                        <input type="number" class="form-control" name="nophone" id="nophone" value="<?= $profile['nophone']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="old">Old</label>
                        <input type="number" class="form-control" name="old" id="old" value="<?= $profile['old']; ?>">
                    </div>
                    <input type="hidden" name="name" value="<?= $profile['name']; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="editprofile">edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
