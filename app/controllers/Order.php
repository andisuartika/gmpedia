<?php

class Order extends Controller
{
    public function index()
    {

        if (isset($_SESSION['login'])) {

            $data['judul'] = 'Order';
            $this->view('templates/header_login', $data);
            $this->view('order/index', $data);
            $this->view('templates/footer');
        } else {
            // panggil login
            header('Location: ' . BASEURL . '/Auth');
        }
    }

    public function transaksi($id_barang)
    {
        if (isset($_SESSION['login'])) {

            $data['judul'] = 'Order';
            $data['barang'] = $id_barang;
            $this->view('templates/header_login', $data);
            $this->view('order/index', $data);
            $this->view('templates/footer');
        } else {
            // panggil login
            header('Location: ' . BASEURL . '/Auth');
        }
    }


    public function tambah()
    {
        if ($this->model('Order_model')->tambahDataOrder($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan.', 'success');
            header('Location: ' . BASEURL . '/User/profile');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan.', 'danger');
            header('Location: ' . BASEURL . '/Order');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Order_model')->getOrderById($_POST['id']));
    }

    public function admin()
    {
        $data['judul'] = 'Transaksi';
        $data['order'] = $this->model('Order_model')->getAllOrder();
        $this->view('templates/admin/header', $data);
        $this->view('order/admin', $data);
        $this->view('templates/admin/footer');
    }

    public function proses($id_transaksi)
    {
        if ($this->model('Order_model')->prosesDataOrder($id_transaksi) > 0) {
            Flasher::setFlash('berhasil', 'diubah.', 'success');
            header('Location: ' . BASEURL . '/Order/Admin');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah.', 'danger');
            header('Location: ' . BASEURL . '/Order/Admin');
            exit;
        }
    }

    public function terkirim($id_transaksi)
    {
        if ($this->model('Order_model')->terkirimDataOrder($id_transaksi) > 0) {
            Flasher::setFlash('berhasil', 'diubah.', 'success');
            header('Location: ' . BASEURL . '/Order/Admin');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah.', 'danger');
            header('Location: ' . BASEURL . '/Order/Admin');
            exit;
        }
    }

    public function selesai($id_transaksi)
    {
        if ($this->model('Order_model')->selesaiDataOrder($id_transaksi) > 0) {
            Flasher::setFlash('berhasil', 'diubah.', 'success');
            header('Location: ' . BASEURL . '/Order/Admin');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah.', 'danger');
            header('Location: ' . BASEURL . '/Order/Admin');
            exit;
        }
    }
}
