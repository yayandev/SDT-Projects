<!-- Modal -->
<?php
$get = mysqli_query($conn, "SELECT * FROM multi_user WHERE id = '$login'")->fetch_array();
?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Changes Username or Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <span class="text-danger">
                            * don't change if you don't change the data !!
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-danger">* New Username</label>
                        <input type="text" class="form-control" value="<?= $get['username']; ?>" name="username" id="exampleFormControlInput1" required placeholder="********" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-danger">* New Password</label>
                        <input type="password" class="form-control" name="new_password" id="exampleFormControlInput1" placeholder="********">
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
    $username = $_POST['username'];
    $password = $_POST['new_password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $users = $user['username'];
    require_once __DIR__."/../sistem/sis_change_password.php";
    if ($password == null) {
        if (!usernameExist($conn, $username)) {
          $ubahUsername = mysqli_query($conn, "UPDATE multi_user SET username='$username' WHERE username='$users'");
          $ubahAuthor = mysqli_query($conn, "UPDATE postingan SET author='$username' WHERE author='$users'");
          $ubahProfile = mysqli_query($conn, "UPDATE profile SET name='$username' WHERE name='$users'");
          if ($ubahUsername && $ubahAuthor && $ubahProfile) {
            echo "
            <script>
              alert('Changes username has been successfully');
              window.location = window.location.href;
            </script>";
            exit;
          }
        } else {
          echo "
            <script>
                alert('username sudah ada!');
            </script>
          ";
        }
?>
<?php
    } else {
        if ($username !== $users) {
          $updatePass = mysqli_query($conn, "UPDATE multi_user SET password='$hash' WHERE username='$users'");
          /* update username */
          $updateUsername = mysqli_query($conn, "UPDATE multi_user SET username='$username' WHERE username='$users'");
          $ubahAuthor = mysqli_query($conn, "UPDATE postingan SET author='$username' WHERE author='$users'");
          $ubahProfile = mysqli_query($conn, "UPDATE profile SET name='$username' WHERE name='$users'");
          if ($updatePass && $updateUsername && $ubahAuthor && $ubahProfile) {
            echo "
            <script>
                alert('Changes username and password has been successfully');
                window.location = window.location.href;
            </script>";
            exit;
          }
        } else {
          $updatePass = mysqli_query($conn, "UPDATE multi_user SET password='$hash' WHERE username='$users'");
          if ($updatePass) {
            echo "
            <script>
              alert('Changes password successfully!')
              window.location = window.location.href;
            </script>";
            exit;
          }
        }
    }
}
?>