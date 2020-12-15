<?php

class Admin extends Controller
{
    public function index()
    {

        if ($_SESSION['login']['role'] == 'Admin') {

            // jika role admin
            $data['judul'] = 'Admin';
            $this->view('templates/admin/header', $data);
            $this->view('admin/index', $data);
            $this->view('templates/admin/footer');
        } else if ($_SESSION['login']['role'] == 'Member') {

            // jika role member
            header('Location: ' . BASEURL . '/Home');
        } else
            // panggil login
            header('Location: ' . BASEURL . '/Auth');
    }
}
