<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $data['judul']; ?></h1>
    <div class="jumbotron mt-5">
        <h1 class="display-4">Selamat datang !</h1>
        <p class="lead">Halo, <?= $_SESSION['login']['nama']; ?> as Administration</p>
        <hr class="my-4">
        <p>Anda sudah login sebagai admin, sekarang anda bisa melakukan manajemen pada website ini.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Selanjutnya</a>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->