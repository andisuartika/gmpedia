<?php

class Product extends Controller
{

    public function index()
    {
        $data['judul'] = 'Product';
        $data['barang'] = $this->model('Barang_model')->getAllBarang();
        $this->view('templates/header', $data);
        $this->view('home/product', $data);
        $this->view('templates/footer');
    }
}
