<?php

class Barang extends Controller
{

    public function index()
    {
        $data['judul'] = 'Daftar Barang';
        $data['barang'] = $this->model('Barang_model')->getAllBarang();
        $this->view('templates/admin_header', $data);
        $this->view('barang/index', $data);
        $this->view('templates/footer');
    }
}
