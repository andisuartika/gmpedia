<?php

class Home extends Controller
{
    public function index()
    {
        $id_barang = 3;

        $data['judul'] = 'Home';
        $data['barang'] = $this->model('Barang_model')->getBarangById($id_barang);
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
