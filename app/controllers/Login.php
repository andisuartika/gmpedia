<?php
if (isset($_POST['email'])) {
    // action
    $conn = $con->koneksi();
    $email = $_POST['email'];
    $psw = $_POST['password'];
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $user = $conn->query($sql);
    if ($user->num_rows > 0) {

        $row = mysqli_fetch_assoc($user);

        // verifikasi password md5
        if (password_verify($psw, $row["password"])) {

            $sess = $user->fetch_array();
            $_SESSION['login']['email'] = $row['email'];
            $_SESSION['login']['id'] = $row['id'];
            $_SESSION['login']['nama'] = $row['nama'];
            $_SESSION['login']['image'] = $row['image'];
            $_SESSION['login']['role'] = $row['role'];

            if ($row['role'] == 'Admin') {
                header('Location: ' . BASEURL . '/Admin');
            } else {
                header('Location: ' . BASEURL . '/Home');
            }
        } else {
            $data['msg']  = 'Password yang anda masukkan salah!';
            $this->view('login/index', $data);
        }
    } else {
        $data['msg'] = 'Email belum terdaftar!';
        $this->view('login/index', $data);
        $this->view('templates/footer');
    }
} else {
    $this->view('login/index');
    $this->view('templates/footer');
}
