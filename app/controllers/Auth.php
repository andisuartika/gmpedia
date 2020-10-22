<?php

class Auth extends Controller
{
    public function index()
    {
        require_once '../app/config/Config.php';
        $con = new config();


        if ($con->auth() == TRUE) {
            // pangggil fungsi
            $data['judul'] = 'Admin';
            $this->view('templates/header', $data);
            $this->view('admin/index');
            $this->view('templates/footer');
        } else {
            // panggil login
            require_once '../app/controllers/Login.php';
        }
    }


    public function register()
    {
        $data['judul'] = 'Register';
        $this->view('templates/header', $data);
        $this->view('login/registrasi');
        $this->view('templates/footer');
    }

    public function logout()
    {
        session_start();
        $_SESSION['login']['email'];
        session_unset();

        header('Location: ' . BASEURL . '/Auth');
    }
}
