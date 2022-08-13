<br><br><br><br>
<div class="container" style="width: 100%; display: flex; justify-content: center; align-items: center;">
    <div class="setting shadow-sm">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a type="button" data-bs-toggle="modal" data-bs-target="#password" class="btn">Change password</a>
            </li>
            <li class="list-group-item">
                <a type="button" data-bs-toggle="modal" data-bs-target="#username" class="btn">Change username</a>
            </li>
            <li class="list-group-item">
                <a href="" class="btn">Delete account</a>
            </li>
            <li class="list-group-item">
                <a href="http://wa.me/6283873614764/" class="btn">Reporting bug!</a>
            </li>
            <li class="list-group-item">
                <a href="" class="btn">Service</a>
            </li>
            <li class="list-group-item">
                <a type="button" data-bs-toggle="modal" data-bs-target="#confirm" class="btn btn-danger">Logout</a>
            </li>
        </ul>
    </div>
</div>

<style>
    .setting {
        width: 300px;
        height: auto;
        border-radius: 10px;
        box-sizing: border-box;
        box-shadow: 3px 3px 3px white;
        background-color: #FFFFFF;
        padding: 5px;
    }
</style>


<!-- modal logout -->
<div class="modal fade" id="confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">confirm</h5>
            </div>
            <div class="modal-body">
                <h4 class="text-center">do you want to go out?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                <a href="../logout.php" class="btn btn-primary">Yes</a>
            </div>
        </div>
    </div>
</div>

<!-- ============================ change username ======================= -->
<!-- logic -->
<?php

if (isset($_POST['gantiUsername'])) {
    if (changeUsername($_POST) > 0) {
        echo "
        <div class='container' style='position:fixed; z-index:999999; top:0;' id='alert'>
        <div class='alert alert-primary d-flex justify-content-around' role='alert'>
            <p>Change username success!</p>        
            <button type='button' onclick='closeAlert();' class='btn-close'  aria-label='Close'></button>
        </div>
        </div>
        ";
    } else {
        echo "
    <div class='container' style='position:fixed; z-index:999999; top:0;' id='alert'>
    <div class='alert alert-primary d-flex justify-content-around' role='alert'>
        <p>Change username not success!</p>        
        <button type='button' onclick='closeAlert();' class='btn-close'  aria-label='Close'></button>
    </div>
    </div>
    ";
    }
}

?>

<!-- modal change username -->
<div class="modal fade" id="username" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="11" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Change username!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <!-- input link demo -->
                    <div class="mb-3">
                        <input type="hidden" name="usernameLama" value="<?= $user['username']; ?>">
                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
                        <label for="Kategori" class="form-label text-danger">New username!</label>
                        <input type="text" id="Kategori" name="usernameBaru" class="form-control mb-2">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="gantiUsername" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- modal change password -->
<div class="modal fade" id="password" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="11" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Change password!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center text-danger">Belom beres!!</p>
                <form action="">
                    <div class="mb-3">
                        <label for="Kategori" class="form-label text-danger">Password!</label>
                        <input type="text" id="Kategori" name="Kategori" class="form-control mb-2">
                    </div>
                    <div class="mb-3">
                        <label for="Kategori" class="form-label text-danger">New password!</label>
                        <input type="text" id="Kategori" name="Kategori" class="form-control mb-2">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
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