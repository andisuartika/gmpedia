<?php $no = 0; ?>
<?php foreach ($data['review'] as $review) : ?>
<?php endforeach; ?>
<div class="container">
    <div class="row ">
        <div class="col-md-4">
            <h5>Profile</h5>
            <div class="mt-5" style="max-width: 720px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= BASEURL; ?>/img/user/<?= $_SESSION['login']['image']; ?>" class="rounded-circle" alt="image" width="100px">
                    </div>
                    <div class="col-md-8">
                        <h5 class="card-title" style="text-transform: uppercase;"><?= $_SESSION['login']['nama']; ?></h5>
                        <p class="card-text"><?= $_SESSION['login']['email']; ?></p>
                        <p class="card-text"><?= $_SESSION['login']['role']; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <h5>Transaksi</h5>
            <div class="row">
                <div class="col-lg-6">
                    <?php Flasher::flash(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Review</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['transaksi'] as $data) : ?>
                                <tr>
                                    <td><?= ++$no; ?></td>
                                    <td><?= $data['nm_barang']; ?></td>
                                    <td><?= $data['jumlah']; ?></td>
                                    <td><?= $data['status']; ?></td>
                                    <td>
                                        <?php if ($data['status'] == 'selesai') : ?>
                                            <?php if ($review['id_transaksi'] == $data['id_transaksi']) : ?>
                                                <small>Anda Sudah Memberikan Ulasan!</small>
                                            <?php else : ?>
                                                <a href="<?= BASEURL; ?>/barang/tambahReview/<?= $data['id_transaksi']; ?>" class="badge badge-primary tampilModalReview" data-toggle="modal" data-target="#formModal">Review</a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal review -->
<!-- Modal tambah data -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambahkan Ulasan Anda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= BASEURL; ?>/barang/tambahReview/<?= $data['id_transaksi']; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_transaksi" id="id_transaksi" value="<?= $data['id_transaksi']; ?>">
                    <div class="form-group">
                        <label for="review">Ulasan</label>
                        <textarea type="text" class="form-control" id="review" name="review" rows="3"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Ulasan</button>
                </form>
            </div>
        </div>
    </div>
</div>