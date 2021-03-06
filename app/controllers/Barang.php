<?php

class Barang extends Controller
{

    public function index()
    {
        if ($_SESSION['login']['role'] == 'Admin') {

            // jika role admin
            $data['judul'] = 'Barang';
            $data['barang'] = $this->model('Barang_model')->getAllBarang();
            $this->view('templates/admin/header', $data);
            $this->view('barang/index', $data);
            $this->view('templates/admin/footer');
        } else if ($_SESSION['login']['role'] == 'Member') {

            // jika role member
            header('Location: ' . BASEURL . '/Home');
        } else {
            // panggil login
            header('Location: ' . BASEURL . '/Auth');
        }
    }

    public function detail($id_barang)
    {
        $data['judul'] = 'Detail Barang';
        $data['barang'] = $this->model('Barang_model')->getBarangById($id_barang);
        $this->view('templates/admin/header', $data);
        $this->view('barang/detail', $data);
        $this->view('templates/admin/footer');
    }

    public function detailProduct($id_barang)
    {
        $data['judul'] = 'Detail Product';
        $data['barang'] = $this->model('Barang_model')->getBarangById($id_barang);
        $data['review'] = $this->model('Barang_model')->getReviewById($id_barang);
        $this->view('templates/header_login', $data);
        $this->view('barang/detailProduct', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Barang_model')->tambahDataBarang($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan.', 'success');
            header('Location: ' . BASEURL . '/barang');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan.', 'danger');
            header('Location: ' . BASEURL . '/barang');
            exit;
        }
    }

    public function hapus($id_barang)
    {
        if ($this->model('Barang_model')->hapusDataBarang($id_barang) > 0) {
            Flasher::setFlash('berhasil', 'dihapus.', 'success');
            header('Location: ' . BASEURL . '/barang');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus.', 'danger');
            header('Location: ' . BASEURL . '/barang');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Barang_model')->getBarangById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('Barang_model')->ubahDataBarang($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah.', 'success');
            header('Location: ' . BASEURL . '/barang');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah.', 'danger');
            header('Location: ' . BASEURL . '/barang');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Barang';
        $data['barang'] = $this->model('Barang_model')->cariDataBarang();
        $this->view('templates/admin/header', $data);
        $this->view('barang/index', $data);
        $this->view('templates/admin/footer');
    }

    public function cariProduct()
    {
        $data['judul'] = 'Product';
        $data['barang'] = $this->model('Barang_model')->cariDataBarang();
        $this->view('templates/header_login', $data);
        $this->view('home/product', $data);
        $this->view('templates/footer');
    }

    public function tag($tag)
    {
        $data['judul'] = 'Product';
        $data['barang'] = $this->model('Barang_model')->getBarangByTag($tag);
        $this->view('templates/header_login', $data);
        $this->view('home/product', $data);
        $this->view('templates/footer');
    }

    public function tambahReview()
    {
        if ($this->model('Barang_model')->tambahDataReview($_POST) > 0) {
            Flasher::setFlash('Review berhasil', 'ditambahkan.', 'success');
            header('Location: ' . BASEURL . '/user/profile');
            exit;
        } else {
            Flasher::setFlash('Review gagal', 'ditambahkan.', 'danger');
            header('Location: ' . BASEURL . '/user/profile');
            exit;
        }
    }
}
