<?php

class User extends Controller
{

    public function index()
    {

        $data['judul'] = 'Users';
        $data['user'] = $this->model('User_model')->getAllUser();
        $this->view('templates/admin_header', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail User';
        $data['user'] = $this->model('User_model')->getUserById($id);
        $this->view('templates/admin_header', $data);
        $this->view('user/detail', $data);
        $this->view('templates/footer');
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

    public function getubah()
    {
        echo json_encode($this->model('User_model')->getUserById($_POST['id']));
    }
}
