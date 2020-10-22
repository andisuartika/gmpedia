<?php

class Admin extends Controller
{
    public function index()
    {
        require_once '../app/config/Config.php';
        $con = new config();


        if ($con->auth() == TRUE) {
            // pangggil fungsi
            $data['judul'] = 'Admin';
            $this->view('templates/admin_header', $data);
            $this->view('admin/index');
            $this->view('templates/footer');
        } else {
            // panggil login
            header('Location: ' . BASEURL . '/Auth');
        }
    }
}
