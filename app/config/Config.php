<?php
define('BASEURL', 'http://localhost/gmpedia/public');

class config
{
    function koneksi()
    {
        $conn = new mysqli('localhost', 'root', '', 'gmpedia');
        if ($conn->connect_error) {
            $conn = die("Koneksi gagal : " . $conn->connect_error);
        }
        return $conn;
    }

    function auth()
    {
        session_start();
        if (isset($_SESSION['login']['email'])) {
            return true;
        } else {
            return false;
        }
    }
}

// DB
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'gmpedia');
