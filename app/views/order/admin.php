<?php $no = 0; ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">
        <div class="col-md">
            <h3>Daftar Barang</h3>
            <div class="row">
                <div class="col-lg-6">
                    <?php Flasher::flash(); ?>
                </div>
            </div>
            <div id="container">
                <div class="row">
                    <div class="col-md">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>No.Hp</th>
                                    <th>Alamat</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['order'] as $order) : ?>
                                    <tr>
                                        <td><?= ++$no; ?></td>
                                        <td><?= $order['nama']; ?></td>
                                        <td><?= $order['nohp']; ?></td>
                                        <td><?= $order['alamat']; ?></td>
                                        <td><?= $order['nm_barang']; ?></td>
                                        <td><?= $order['jumlah']; ?></td>
                                        <td><?= $order['status']; ?></td>
                                        <td>
                                            <a href="<?= BASEURL; ?>/order/selesai/<?= $order['id_transaksi']; ?>" class="badge badge-primary float-right ml-1">Selesai</a>
                                            <a href="<?= BASEURL; ?>/order/terkirim/<?= $order['id_transaksi']; ?>" class="badge badge-success float-right ml-1">Terkirim</a>
                                            <a href="<?= BASEURL; ?>/order/proses/<?= $order['id_transaksi']; ?>" class="badge badge-danger float-right ml-1">Proses</a>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->