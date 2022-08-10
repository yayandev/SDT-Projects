<!-- Button trigger modal -->
<button type="button" hidden class="nav-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    <i class="bi bi-bell-fill"></i> Notifikasi
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Notifikasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <?php foreach ($allnotif as $notif) : ?>
                        <div class="card mb-3">
                            <div class="card-header">
                                <?= $notif['author']; ?> Memposting Projects !
                            </div>
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p><?= $notif['title']; ?></p>
                                    <footer class="blockquote-footer"><cite title="Source Title"><?= $notif['date']; ?></cite></footer>
                                </blockquote>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="modal-footer">
                <p style="font-size: 10px;">Crate by Yanz @2022</p>
            </div>
        </div>
    </div>
</div>