<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

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
            <form action="<?= BASEURL; ?>/barang/cari" method="post">
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
                        <a href="<?= BASEURL; ?>/barang/hapus/<?= $brg['id_barang']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('yakin?');">Delete</a>

                        <a href="<?= BASEURL; ?>/barang/ubah/<?= $brg['id_barang']; ?>" class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $brg['id_barang']; ?>">Edit</a>

                        <a href="<?= BASEURL; ?>/barang/detail/<?= $brg['id_barang']; ?>" class="badge badge-primary float-right ml-1">Detail</a>
                    </li>
                </ul>
            <?php endforeach ?>
        </div>
    </div>
</div>

<!-- Modal tambah data -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= BASEURL; ?>/barang/tambah" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_barang" id="id_barang">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" class="form-control" id="type" name="type">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <div class="custom-file">
                            <input type="file" class="" id="gambar" name="gambar">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>