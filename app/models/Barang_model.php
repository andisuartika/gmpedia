<?php
class Barang_model
{

    private $table = 'barang';
    private $review = 'review';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getAllBarang()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getAllReview()
    {
        $this->db->query('SELECT * FROM ' . $this->review);
        return $this->db->resultSet();
    }

    public function getBarangByID($id_barang)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_barang=:id ');
        $this->db->bind('id', $id_barang);
        return $this->db->single();
    }

    public function getReviewByID($id_barang)
    {
        $this->db->query('SELECT * FROM review INNER JOIN transaksi ON review.id_transaksi=transaksi.id_transaksi WHERE transaksi.id_barang=' . $id_barang);
        return $this->db->single();
    }

    public function getBarangBytag($tag)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE kategori=:tag ');
        $this->db->bind('tag', $tag);
        return $this->db->resultSet();
    }

    public function tambahDataBarang($data)
    {
        $gambar = $this->upload();

        $query = "INSERT INTO barang
        VALUES
        (null, :nm_barang, :kategori, :keterangan, :harga, :stok, '$gambar')";

        $this->db->query($query);
        $this->db->bind('nm_barang', $data['nama']);
        $this->db->bind('kategori', $data['kategori']);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('stok', $data['stok']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataBarang($id_barang)
    {
        $query = "DELETE FROM barang WHERE id_barang =:id";
        $this->db->query($query);
        $this->db->bind('id', $id_barang);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataBarang($data)
    {

        $gambar = $this->upload();

        $query = "UPDATE barang SET
                nm_barang = :nm_barang,
                kategori = :kategori,
                keterangan = :keterangan,
                harga = :harga,
                stok = :stok,
                gambar= :gambar
            WHERE id_barang = :id_barang";

        $this->db->query($query);
        $this->db->bind('nm_barang', $data['nama']);
        $this->db->bind('kategori', $data['kategori']);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('gambar', $gambar);
        $this->db->bind('id_barang', $data['id_barang']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataBarang()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM barang WHERE
                     nm_barang LIKE :keyword OR
                     kategori LIKE :keyword                   
                     ";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

    public function tambahDataReview($data)
    {
        $query = "INSERT INTO review
        VALUES
        (null, :id_transaksi, :review)";

        $this->db->query($query);
        $this->db->bind('id_transaksi', $data['id_transaksi']);
        $this->db->bind('review', $data['review']);

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
        move_uploaded_file($tmpName, '../public/img/barang/' . $namaFile);
        return $namaFile;
    }
}
