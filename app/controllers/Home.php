<?php

class Home extends Controller
{
    public function index()
    {

        if (isset($_SESSION['login'])) {
            if ($_SESSION['login']['role'] == 'Admin') {
                // jika role admin
                $data['judul'] = 'Admin';
                $this->view('templates/admin/header', $data);
                $this->view('admin/index', $data);
                $this->view('templates/admin/footer');
            } else if ($_SESSION['login']['role'] == 'Member') {
                $id_barang = 3;
                $data['judul'] = 'Home';
                $data['barang'] = $this->model('Barang_model')->getBarangById($id_barang);
                $this->view('templates/header_login', $data);
                $this->view('home/index', $data);
                $this->view('templates/footer');
            }
        } else {
            $id_barang = 3;
            $data['judul'] = 'Home';
            $data['barang'] = $this->model('Barang_model')->getBarangById($id_barang);
            $this->view('templates/header', $data);
            $this->view('home/index', $data);
            $this->view('templates/footer');
        }
    }
}
