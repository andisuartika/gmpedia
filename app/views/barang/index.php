<?php $no = 0; ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="mt-3">
        <div class="row">
            <div class="col-lg-6">
                <?php Flasher::flash(); ?>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
                    Tambah Data Barang
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg">
                <!-- Search -->
                <form action="<?= BASEURL; ?>/barang/cariProduct" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari Barang..." name="keyword" id="keyword" autocomplete="off">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="tombolCari">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <h3>Daftar Barang</h3>
                <div id="container">
                    <div class="row">
                        <div class="col-md">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Type</th>
                                        <th>Keterangan</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['barang'] as $barang) : ?>
                                        <tr>
                                            <td><?= ++$no; ?></td>
                                            <td><?= $barang['nm_barang']; ?></td>
                                            <td><?= $barang['kategori']; ?></td>
                                            <td><?= $barang['keterangan']; ?></td>
                                            <td><?= $barang['harga']; ?></td>
                                            <td><?= $barang['stok']; ?></td>
                                            <td>
                                                <a href="<?= BASEURL; ?>/barang/hapus/<?= $barang['id_barang']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('yakin?');">Delete</a>
                                                <a href="<?= BASEURL; ?>/barang/ubah/<?= $barang['id_barang']; ?>" class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $barang['id_barang']; ?>">Edit</a>
                                                <a href="<?= BASEURL; ?>/barang/detail/<?= $barang['id_barang']; ?>" class="badge badge-primary float-right ml-1">Detail</a>
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
                            <label for="kategori">Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="kategori">
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

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
    // Barang search
    // ambil element2 yang dibutuhkan
    var keyword = document.getElementById('keyword');
    var tombolCari = document.getElementById('tombolCari');
    var container = document.getElementById('container');

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
        xhr.open('GET', 'http://localhost/gmpedia/app/views/barang/admin/barang_search.php?keyword=' + keyword.value, true);
        xhr.send();

    });
</script>