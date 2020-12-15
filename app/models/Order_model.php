<?php
class Order_model
{

    private $table = 'transaksi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllOrder()
    {
        $this->db->query('SELECT * FROM transaksi INNER JOIN barang ON barang.id_barang = transaksi.id_barang');
        return $this->db->resultSet();
    }

    public function getAllOrderBarang()
    {
        $id_user = $_SESSION['login']['id'];

        $this->db->query('SELECT * FROM transaksi INNER JOIN barang ON barang.id_barang = transaksi.id_barang WHERE transaksi.id_user=' . $id_user);
        return $this->db->resultSet();
    }

    public function getOrderByID($id_transaksi)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_transaksi=:id ');
        $this->db->bind('id', $id_transaksi);
        return $this->db->single();
    }

    public function tambahDataOrder($data)
    {
        $gambar = $this->upload();

        $query = "INSERT INTO transaksi
        VALUES
        (null, :id_user, :nama, :nohp, :alamat, :id_barang, :jumlah, '$gambar', 'proses')";

        $this->db->query($query);
        $this->db->bind('id_user', $data['id_user']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nohp', $data['nohp']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('id_barang', $data['id_barang']);
        $this->db->bind('jumlah', $data['jumlah']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    // action status transaksi

    public function prosesDataOrder($id_transaksi)
    {
        $query = "UPDATE transaksi SET
                status = 'proses'
            WHERE id_transaksi = '$id_transaksi'";

        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function terkirimDataOrder($id_transaksi)
    {
        $query = "UPDATE transaksi SET
                status = 'terkirim'
            WHERE id_transaksi = '$id_transaksi'";

        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function selesaiDataOrder($id_transaksi)
    {
        $query = "UPDATE transaksi SET
                status = 'selesai'
            WHERE id_transaksi = '$id_transaksi'";

        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
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
        move_uploaded_file($tmpName, '../public/img/order/' . $namaFile);
        return $namaFile;
    }
}
