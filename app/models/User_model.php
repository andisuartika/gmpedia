<?php

class User_model
{
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getAllUser()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getUserByID($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id ');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function hapusDataUser($id)
    {
        $query = "DELETE FROM user WHERE id =:id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function tambahUser($data)
    {

        if (isset($_FILES['gambar']['name'])) {
            $image = $this->upload();
        }
        $image = 'default.png';


        $email = htmlspecialchars($data['email']);

        $this->db->query('SELECT email FROM ' . $this->table . ' WHERE email=:email ');
        $this->db->bind('email', $email);


        if ($this->db->single() != false) {
            return false;
            exit;
        } else {

            $nama = htmlspecialchars($data['name']);
            $password = password_hash($data['password'], PASSWORD_DEFAULT);

            $query = "INSERT INTO user
            VALUES
            (null, :nama, :email, :image, :password, :role)";

            $this->db->query($query);
            $this->db->bind('nama', $nama);
            $this->db->bind('email', $email);
            $this->db->bind('image', $image);
            $this->db->bind('password', $password);
            $this->db->bind('role', $data['role']);

            $this->db->execute();

            return $this->db->rowCount();
        }
    }

    public function register($data)
    {
        $image = 'default.png';

        $email = htmlspecialchars($data['email']);

        $this->db->query('SELECT email FROM ' . $this->table . ' WHERE email=:email ');
        $this->db->bind('email', $email);


        if ($this->db->single() != false) {
            return false;
            exit;
        } else {

            $nama = htmlspecialchars($data['name']);
            $password = password_hash($data['password'], PASSWORD_DEFAULT);

            $query = "INSERT INTO user
            VALUES
            (null, '$nama', '$email', '$image', '$password', 'Member')";

            $this->db->query($query);

            $this->db->execute();

            return $this->db->rowCount();
        }
    }

    public function ubahDataUser($data)
    {

        if (!isset($_FILES['gambar']['name'])) {
            $image = 'default.png';
        }
        $image = $this->upload();

        $nama = htmlspecialchars($data['name']);
        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        $query = "UPDATE user SET
                nama = :nama,
                email = :email,
                image = :image,
                password = :password,
                role = :role
            WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama', $nama);
        $this->db->bind('email', $data['email']);
        $this->db->bind('image', $image);
        $this->db->bind('role', $data['role']);
        $this->db->bind('password', $password);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataUser()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM user WHERE
                     nama LIKE '%$keyword%' OR
                     email LIKE '%$keyword%'                    
                     ";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

    function upload()
    {
        $namaFile = $_FILES['gambar']['name'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        // cek file
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
                alert('yang anda upload bukan gambar!');
            </script> ";
            return false;
        }

        // upload
        move_uploaded_file($tmpName, '../public/img/user/' . $namaFile);
        return $namaFile;
    }
}
