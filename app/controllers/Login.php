<?php
if (isset($_POST['email'])) {
    // action
    $conn = $con->koneksi();
    $email = $_POST['email'];
    $psw = $_POST['password'];
    $sql = "SELECT * FROM user WHERE password = '$psw' AND email = '$email'";
    $user = $conn->query($sql);
    if ($user->num_rows > 0) {
        $sess = $user->fetch_array();
        $_SESSION['login']['email'] = $sess['email'];
        $_SESSION['login']['id'] = $sess['id'];
        $_SESSION['login']['name'] = $sess['name'];
        header('Location: ' . BASEURL . '/Admin');
    } else {
        $msg = 'email dan password tidak ditemukan';
        $data['judul'] = 'Login';
        $this->view('templates/header', $data);
        $this->view('login/index', $msg);
        $this->view('templates/footer');
    }
} else {
    $data['judul'] = 'Login';
    $this->view('templates/header', $data);
    $this->view('login/index');
    $this->view('templates/footer');
}
