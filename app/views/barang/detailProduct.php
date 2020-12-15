<?php error_reporting(0) ?>
<?php foreach ($data['review'] as $review) : ?>
<?php endforeach; ?>
<div class="container">
    <!-- slider -->
    <div id="carouselExampleCaptions" class="carousel slide mt-3" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= BASEURL; ?>/img/slider/slider1.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Smartawtch U10</h5>
                    <p>Smartwatch U10. Promo Upto 50% jangan sampai kehabisan</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= BASEURL; ?>/img/slider/slider2.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Nike Air Jordan</h5>
                    <p>Sneaker Nike Air Jordan, Promo Upto 35% sikat!.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= BASEURL; ?>/img/slider/slider3.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Hoodie</h5>
                    <p>Hoodie hitam, Promo upto 75% buruan order!.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- end slider -->
    <div class="row mt-5">
        <div class="col-lg-2 mb-5">
            <div class="list-group">
                <a href="<?= BASEURL; ?>/Product" class="list-group-item list-group-item-success" style="background-color: green; color: honeydew;">
                    kategori
                </a>
                <a href="<?= BASEURL; ?>/barang/tag/watch" class="list-group-item list-group-item-action">Watch</a>
                <a href="<?= BASEURL; ?>/barang/tag/sneakers" class="list-group-item list-group-item-action">Sneakers</a>
                <a href="<?= BASEURL; ?>/barang/tag/hoodie" class="list-group-item list-group-item-action">Hoodie</a>
            </div>
        </div>
        <div class="col-lg-10">
            <div class="card mb-3">
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
                        <div class="review col-md-10 ">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Review</h5>
                            </div>
                            <?php if ($data['review']['review'] != NULL) : ?>
                                <p class="mb-1"><?= $data['review']['review']; ?></p>
                            <?php else : ?>
                                <p class="mb-1">Belum ada Review!</p>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><a href="<?= BASEURL; ?>/product" class="card-link">Back</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>