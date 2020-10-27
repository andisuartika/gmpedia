<div class="container mt-5">
    <div class="card" style="width: 18rem;">
        <img src="<?= BASEURL; ?>/img/barang/<?= $data['barang']['gambar']; ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $data['barang']['nm_barang']; ?></h5>
            <p class="card-text"><?= $data['barang']['keterangan']; ?></p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Type : <?= $data['barang']['type_barang']; ?></li>
            <li class="list-group-item">Stok : <?= $data['barang']['stok']; ?></li>
            <li class="list-group-item">Rp : <?= $data['barang']['harga']; ?></li>
        </ul>
        <div class="card-body">
            <a href="<?= BASEURL; ?>/barang" class="card-link">Back</a>
        </div>
    </div>
</div>