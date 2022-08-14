<?php
/* jika ada postingan di upload */
if (isset($_POST['post'])) {
    if (posting($_POST) > 0) {
        echo "
        <div class='container' style='position:fixed; z-index:999999; top:0;' id='alert'>
        <div class='alert alert-primary d-flex justify-content-around' role='alert'>
            <p>Post success!</p>        
            <button type='button' onclick='closeAlert();' class='btn-close'  aria-label='Close'></button>
        </div>
        </div>
        ";
    } else {
        echo "
        <div class='container' style='position:fixed; z-index:999999; top:0;' id='alert'>
        <div class='alert alert-danger d-flex justify-content-around' role='alert'>
            <p>post Not success!</p>        
            <button type='button' onclick='closeAlert();' class='btn-close'  aria-label='Close'></button>
        </div>
        </div>
        ";
    }
}
if (isset($_POST["request-category"])) {
  /* insert username to post method */
  $_POST["username"] = $user["username"];
  $categoryName = $_POST["categoryName"];
  $process = send_requestCategory($_POST);
  if ($process["ok"]) {
    echo "
        <div id='message-response' class='alert alert-success fixed-top' role='alert'>
         permintaan berhasil, tunggu sampai admin mengabulkan !
        </div>
        <script>
          let message = document.querySelector('#message-response')
          let autoclose = setTimeout(() => {
            message.classList.add('closeup')
            setTimeout(() => {
              message.remove()
            }, 3000)
          }, 2000)
          message.addEventListener('click', function(){
            clearTimeout(autoclose)
            message.classList.add('closeup')
            setTimeout(() => {
              message.remove()
            }, 3000)
          })
        </script>
        ";
  } else {
    $message = $process["message"];
    echo "
        <div id='message-response' class='alert alert-danger fixed-top' role='alert'>
          $message
        </div>
        <script>
          let message = document.querySelector('#message-response')
          let autoclose = setTimeout(() => {
            message.classList.add('closeup')
            setTimeout(() => {
              message.remove()
            }, 3000)
          }, 2000)
          message.addEventListener('click', function(){
            clearTimeout(autoclose)
            message.classList.add('closeup')
            setTimeout(() => {
              message.remove()
            }, 3000)
          })
        </script>
        ";
  }
}
?>

<div class="container">
    <!-- form post -->
    <div class="jumbotron mb-3 bg-white p-4">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="date" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                    echo  date("F j, Y, g:i a"); ?>" name="date">
            <input type="hidden" name="author" value="<?= $user['username']; ?>">
            <!-- input title -->
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control mb-3" required>
            <!-- input kategori  -->
            <label for="kategori" class="form-label">Kategori</label>
            <label for="kategori" class="form-label fs-6"><a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#request">Request kategori ?</a></label>
            <select class="form-select mb-3" id="kategori" name="kategori" required>
                <?php foreach ($allkategori as $kategori) : ?>
                    <option value="1"><?= $kategori['kategori']; ?></option>
                <?php endforeach; ?>
            </select>
            <!-- input link demo -->
            <label for="demo" class="form-label">Demo</label>
            <input type="text" id="demo" name="demo" class="form-control mb-3" required>
            <!-- input link source -->
            <label for="source" class="form-label">Source code</label>
            <input type="text" id="source" name="source" class="form-control mb-3" required>

            <!-- input images -->
            <label for="images" class="form-label">Images privew</label>
            <input type="file" id="images" name="images" class="form-control mb-3" required>

            <!-- input deskripsi -->
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="deskripsi" required></textarea>
                <label for="floatingTextarea2">Deskripsi</label>
            </div>

            <!-- button post -->
            <button type="submit" class="form-control btn btn-primary" name="post">Posting</button>
        </form>
    </div>
</div>

<!-- modal request kategori -->
<div class="modal fade" id="request" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="11" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Request kategori!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <!-- input link demo -->
                    <label for="categoryName" class="form-label">Kategori Request ?</label>
                    <input required type="text" id="categoryName" name="categoryName" class="form-control mb-2">
                    <label class="form-label" for="reason">alasan</label>
                    <textarea required class="form-control" type="text/submit/hidden/button" name="reason" id="reason"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="request-category" type="button" class="btn btn-primary">Request</button>
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
