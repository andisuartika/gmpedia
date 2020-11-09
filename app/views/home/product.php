<div class="container">
    <h1>Daftar Product</h1>
    <div class="row mt-5">
        <?php foreach ($data['barang'] as $brg) : ?>
            <div class="col-md-4 mb-5">
                <div class="card" style="width: 18rem;">
                    <img src="<?= BASEURL; ?>/img/barang/<?= $brg['gambar']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title"><?= $brg['nm_barang']; ?></h4>
                        <h6 class="card-title"><?= $brg['type_barang']; ?></h6>
                        <p class="card-text"><?= $brg['keterangan']; ?></p>
                        <h6 class="card-title">Rp. <?= $brg['harga']; ?></h6>
                        <a href="#" class="btn btn-success">Order Now!</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>