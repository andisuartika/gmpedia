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
<div class="container">
    <!-- Search -->
    <div class="row mt-5">
        <div class="col-lg-2"></div>
        <div class="col-lg-10">
            <form action="<?= BASEURL; ?>/barang/cariProduct" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Barang..." name="keyword" id="keywordProduct" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="tombolCariProduct">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
            <div id="containerProduct">
                <div class="row ml-auto">
                    <?php foreach ($data['barang'] as $brg) : ?>
                        <div class="col-lg-4 mb-5">
                            <div class="card" style="width: 18rem;">
                                <a href="<?= BASEURL; ?>/Barang/detailProduct/<?= $brg['id_barang']; ?>"><img src="<?= BASEURL; ?>/img/barang/<?= $brg['gambar']; ?>" class="card-img-top" alt="..."></a>
                                <div class="card-body">
                                    <small class="card-title"><?= $brg['kategori']; ?></small>
                                    <h4 class="card-title"><?= $brg['nm_barang']; ?></h4>
                                    <p class="card-text"><?= $brg['keterangan']; ?></p>
                                    <h6 class="card-title">Rp. <?= $brg['harga']; ?></h6>
                                    <a href="<?= BASEURL; ?>/Order/transaksi/<?= $brg['id_barang']; ?>" class="btn btn-success">Order Now!</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Barang search
        // ambil element2 yang dibutuhkan
        var keyword = document.getElementById('keywordProduct');
        var tombolCari = document.getElementById('tombolCariProduct');
        var container = document.getElementById('containerProduct');

        // tambahkan event ketika keyword ditulis
        keyword.addEventListener('keyup', function() {

            // buat object ajax
            var xhr = new XMLHttpRequest();

            // cek kesiapan ajax
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // console.log(xhr.responseText);
                    container.innerHTML = xhr.responseText;
                }
            }

            // eksekusi ajax barang
            xhr.open('GET', 'http://localhost/gmpedia/app/views/home/product_search.php?keyword=' + keyword.value, true);
            xhr.send();

        });
    </script>