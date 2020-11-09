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

    public function tambahUser($data)
    {

        $query = "INSERT INTO user
        VALUES
        (null, :nama, :email, 'default.png', :password, :role_id, '1', '12345')";

        $this->db->query($query);
        $this->db->bind('nama', $data['name']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('role_id', $data['role_id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
