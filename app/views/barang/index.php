<div class="container mt-3">


    <div class="row mb-3">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
                Tambah Data Barang
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <!-- Search -->
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Mahasiswa..." name="keyword" id="keyword" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="tombolCari">Search</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h3>Daftar Barang</h3>
            <?php foreach ($data['barang'] as $brg) : ?>
                <ul class="list-group">
                    <li class="list-group-item">
                        <?= $brg['nm_barang']; ?> <?= $brg['type_barang']; ?>
                        <a href="#" class="badge badge-danger float-right ml-1">Delete</a>

                        <a href="#" class="badge badge-success float-right ml-1">Edit</a>

                        <a href="#" class="badge badge-primary float-right ml-1">Detail</a>
                    </li>
                </ul>
            <?php endforeach ?>
        </div>
    </div>
</div>