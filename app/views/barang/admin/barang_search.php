<?php
require_once '../../../config/Config.php';
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
                <?php foreach ($barang as $barang) : ?>
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