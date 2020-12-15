<?php

class Product extends Controller
{

    public function index()
    {
        $data['judul'] = 'Product';
        $data['barang'] = $this->model('Barang_model')->getAllBarang();
        if (isset($_SESSION['login']))
            $this->view('templates/header_login', $data);
        else {
            $this->view('templates/header', $data);
        }
        $this->view('home/product', $data);
        $this->view('templates/footer');
    }
}
