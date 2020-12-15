<?php

class User extends Controller
{

    public function index()
    {
        if ($_SESSION['login']['role'] == 'Admin') {

            // jika role admin
            $data['judul'] = 'Users';
            $data['user'] = $this->model('User_model')->getAllUser();
            $this->view('templates/admin/header', $data);
            $this->view('user/index', $data);
            $this->view('templates/admin/footer');
        } else if ($_SESSION['login']['role'] == 'Member') {

            // jika role member
            header('Location: ' . BASEURL . '/Home');
        } else
            // panggil login
            header('Location: ' . BASEURL . '/Auth');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail User';
        $data['user'] = $this->model('User_model')->getUserById($id);
        $this->view('templates/admin/header', $data);
        $this->view('user/detail', $data);
        $this->view('templates/admin/footer');
    }

    public function hapus($id)
    {
        if ($this->model('User_model')->hapusDataUser($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus.', 'success');
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus.', 'danger');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }

    public function tambah()
    {

        if ($this->model('User_model')->tambahUser($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan.', 'success');
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan.', 'danger');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }
    public function register()
    {

        if ($this->model('User_model')->register($_POST) > 0) {
            Flasher::setFlash('berhasil', ' ', 'success');
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
        if ($this->model('User_model')->register($_POST) == false) {
            Flasher::setFlash('gagal', ' email sudah terdaftar!', 'danger');
            header('Location: ' . BASEURL . '/auth/register');
            exit;
        } else {
            Flasher::setFlash('gagal', ' ', 'danger');
            header('Location: ' . BASEURL . '/auth/register');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('User_model')->getUserById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('User_model')->ubahDataUser($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah.', 'success');
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah.', 'danger');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Users';
        $data['user'] = $this->model('User_model')->cariDataUser();
        $this->view('templates/admin/header', $data);
        $this->view('user/index', $data);
        $this->view('templates/admin/footer');
    }

    public function profile()
    {
        $data['judul'] = 'Profile';
        $data['transaksi'] = $this->model('Order_model')->getAllOrderBarang();
        $data['review'] = $this->model('Barang_model')->getAllReview();
        $this->view('templates/header_login', $data);
        $this->view('user/user', $data);
        $this->view('templates/footer');
    }
}
