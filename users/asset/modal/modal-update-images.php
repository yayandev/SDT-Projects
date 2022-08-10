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
<a type="button" hidden class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">edit images</a>