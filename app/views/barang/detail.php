<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-3" style="max-width: 720px;">
        <div class="row no-gutters">
            <div class="col-md-7">
                <img src="<?= BASEURL; ?>/img/barang/<?= $data['barang']['gambar']; ?>" class="card-img" alt="...">
            </div>
            <div class="col-md-5">
                <div class="card-body">
                    <h5 class="card-title"><?= $data['barang']['nm_barang']; ?></h5>
                    <p class="card-text"><?= $data['barang']['keterangan']; ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Type : <?= $data['barang']['kategori']; ?></li>
                    <li class="list-group-item">Stok : <?= $data['barang']['stok']; ?></li>
                    <li class="list-group-item">Rp : <?= $data['barang']['harga']; ?></li>
                </ul>
                <div class="card-body">
                    <p class="card-text"><a href="<?= BASEURL; ?>/barang" class="card-link">Back</a></p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->