<?php
require_once '../../config/Config.php';
$con = new config();
$conn = $con->koneksi();
$keyword = $_GET["keyword"];
$query = "SELECT * FROM barang WHERE
            nm_barang LIKE '%$keyword%' OR
            kategori LIKE '%$keyword%'                  
            ";

$barang = $conn->query($query);

$no = 0;
?>
<div class="row ml-auto">
    <?php foreach ($barang as $brg) : ?>
        <div class="col-lg-4 mb-5">
            <div class="card" style="width: 18rem;">
                <img src="<?= BASEURL; ?>/img/barang/<?= $brg['gambar']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title"><?= $brg['nm_barang']; ?></h4>
                    <h6 class="card-title"><?= $brg['kategori']; ?></h6>
                    <p class="card-text"><?= $brg['keterangan']; ?></p>
                    <h6 class="card-title">Rp. <?= $brg['harga']; ?></h6>
                    <a href="https://linktr.ee/gmpedia" class="btn btn-success">Order Now!</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>