<?php
$allnotif = query("SELECT * FROM notif ORDER BY id DESC");
?>

<!-- Modal -->
<div class="modal fade" id="notifikasi" tabindex="99" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Notifikasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <?php foreach ($allnotif as $notif) : ?>
                        <div class="card mb-3">
                            <div class="card-header">
                                <?= $notif["author"]; ?> Post Project! <a href="" class="btn btn-primary">Read</a>
                            </div>
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p><?= $notif["title"]; ?></p>

                                    <footer class="blockquote-footer"><?= $notif["date"]; ?></footer>
                                </blockquote>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>