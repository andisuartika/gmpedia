<?php $no = 0; ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="mt-3">
        <div class="row mb-3">
            <div class="col-lg">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary tombolTambahUser" data-toggle="modal" data-target="#formModal">
                    Tambah User
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <?php Flasher::flash(); ?>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg">
                <!-- Search -->
                <form action="<?= BASEURL; ?>/user/cari" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari User..." name="keyword" id="keyword" autocomplete="off">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="tombolCari">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md">
                <h3>Daftar User</h3>
                <div id="container">
                    <div class="row">
                        <div class="col-md">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Profil</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['user'] as $user) : ?>
                                        <tr>
                                            <td><?= ++$no; ?></td>
                                            <td>
                                                <img src="<?= BASEURL; ?>/img/user/<?= $user['image']; ?>" class="sampul" alt="image" width="50px">
                                            </td>
                                            <td><?= $user['nama']; ?></td>
                                            <td><?= $user['email']; ?></td>
                                            <td>
                                                <a href="<?= BASEURL; ?>/user/hapus/<?= $user['id']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('yakin?');">Delete</a>
                                                <a href="<?= BASEURL; ?>/user/ubah/<?= $user['id']; ?>" class="badge badge-success float-right ml-1 tampilUserUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $user['id']; ?>">Edit</a>
                                                <a href="<?= BASEURL; ?>/user/detail/<?= $user['id']; ?>" class="badge badge-primary float-right ml-1">Detail</a>
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
                    <h5 class="modal-title" id="formModalLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL; ?>/user/tambah" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role">
                                <option value="Member">Member</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
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
    // User search
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

        // eksekusi ajax 
        xhr.open('GET', 'http://localhost/gmpedia/app/views/user/user_search.php?keyword=' + keyword.value, true);
        xhr.send();

    });
</script>