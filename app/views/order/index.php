<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block"><img src="<?= BASEURL; ?>/img/asset/form.png" class="card-img-top" alt="..."></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-2">ORDER! - </h1>
                            <h4 class="h4 text-gray-900 ">Masukkan data diri anda! </h4>
                            <small class="mb-4">*Pastikan anda memasukkan data diri yang valid.</small>
                        </div>
                        <form action="<?= BASEURL; ?>/order/tambah" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_user" id="id_user" value="<?= $_SESSION['login']['id']; ?>">
                            <input type="hidden" name="id_barang" id="id_barang" value="<?= $data['barang']; ?>">
                            <div class="form-group">
                                <input type="Nama" class="form-control form-control-user" id="Nama" name="nama" placeholder="Nama" required>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control form-control-user" id="nohp" name="nohp" placeholder="No. Hp" required>
                            </div>
                            <div class="form-group">
                                <input type="textarea" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat" required>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-user" id="jumlah" name="jumlah" placeholder="Jumlah" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Bukti Transfer</label>
                                <div class="custom-file">
                                    <input type="file" class="" id="gambar" name="gambar">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">Kirim</button>
                            <hr>
                            <small class="mb-4">Untuk info lebih lanjut bisa hubungi kami di </small>
                            <a href="wa.me/+6285728614399" class="btn btn-success btn-user btn-block">
                                <i class="fab fa-whatsapp fa-fw"></i> whatsapp GMpedia
                            </a>
                            <a href="instagram.com/gmpedia" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-instagram fa-fw"></i> Instagram GMpedia
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>