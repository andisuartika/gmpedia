<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary tombolTambahUser" data-toggle="modal" data-target="#formModal">
                Tambah User
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <!-- Search -->
            <form action="<?= BASEURL; ?>/user/cari" method="post">
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
            <h3>Daftar User</h3>
            <?php foreach ($data['user'] as $user) : ?>
                <ul class="list-group">
                    <li class="list-group-item">
                        <?= $user['email']; ?>
                        <a href="<?= BASEURL; ?>/user/hapus/<?= $user['id']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('yakin?');">Delete</a>

                        <a href="<?= BASEURL; ?>/user/ubah/<?= $user['id']; ?>" class="badge badge-success float-right ml-1 tampilUserUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $user['id']; ?>">Edit</a>

                        <a href="<?= BASEURL; ?>/user/detail/<?= $user['id']; ?>" class="badge badge-primary float-right ml-1">Detail</a>
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
                <h5 class="modal-title" id="formModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/user/tambah" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <label for="roles_id">Roles</label>
                        <select class="form-control" id="role_id" name="role_id">
                            <option value=1>Admin</option>
                            <option value=2>Member</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
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