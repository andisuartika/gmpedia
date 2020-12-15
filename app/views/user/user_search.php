<?php
require_once '../../config/Config.php';
$con = new config();
$conn = $con->koneksi();
$keyword = $_GET["keyword"];
$query = "SELECT * FROM user WHERE
            nama LIKE '%$keyword%' OR
            email LIKE '%$keyword%'                  
            ";

$user = $conn->query($query);
$no = 0;
?>
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
                <?php foreach ($user as $usr) : ?>
                    <tr>
                        <td><?= ++$no; ?></td>
                        <td>
                            <img src="<?= BASEURL; ?>/img/user/<?= $usr['image']; ?>" class="sampul" alt="image" width="50px">
                        </td>
                        <td><?= $usr['nama']; ?></td>
                        <td><?= $usr['email']; ?></td>
                        <td>
                            <a href="<?= BASEURL; ?>/user/hapus/<?= $usr['id']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('yakin?');">Delete</a>
                            <a href="<?= BASEURL; ?>/user/ubah/<?= $usr['id']; ?>" class="badge badge-success float-right ml-1 tampilUserUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $usr['id']; ?>">Edit</a>
                            <a href="<?= BASEURL; ?>/user/detail/<?= $usr['id']; ?>" class="badge badge-primary float-right ml-1">Detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>