<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Changes Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-danger">* New Password</label>
                        <input type="password" class="form-control" name="new_password" id="exampleFormControlInput1" required placeholder="********" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="save" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['save'])) {
    $password = $_POST['new_password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $update = mysqli_query($conn, "UPDATE multi_user SET password='$hash' WHERE id='$login'");

    if ($update) {
?>
        <script>
            alert('Changes password has been successfully')
        </script>
<?php
    }
}
?>