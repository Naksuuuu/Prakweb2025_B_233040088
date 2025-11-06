<?php

class Mahasiswa_model {
    private $table = 'mahasiswa';
    private $db;

    public function __construct() {
        $this->db = new Database;

    }

    public function getAllMahasiswa () {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->resultSet();

    }
    
    public function getMahasiswaById ($id) {
        $this->db->query("SELECT * FROM {$this->table} WHERE id = :id");
        $this->db->bind(':id', $id);

        return $this->db->single();

    }

    public function tambahDataMahasiswa($data) {
        $query = "INSERT INTO {$this->table} (nrp, nama, jurusan, email)
                VALUES (:nrp, :nama, :jurusan, :email)";

        $this->db->query($query);
        $this->db->bind(':nrp', $data['nrp']);
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':jurusan', $data['jurusan']);
        $this->db->bind(':email', $data['email']);

        $this->db->execute();

        return $this->db->rowCount();


    }

    public function hapusDataMahasiswa($id) {
        $this->db->query("DELETE FROM {$this->table} WHERE id = :id");
        $this->db->bind(':id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($data) {
        $query = "UPDATE {$this->table}
                SET nama = :nama,
                    nrp = :nrp,
                    jurusan = :jurusan,
                    email = :email
                WHERE id = :id
                ";

        $this->db->query($query);
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':nrp', $data['nrp']);
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':jurusan', $data['jurusan']);
        $this->db->bind(':email', $data['email']);

        $this->db->execute();

        return $this->db->rowCount();


    }

    public function cariMahasiswa($nama) {
        $this->db->query("SELECT nama, id FROM {$this->table} WHERE nama LIKE :nama");

        $this->db->bind(':nama', "%$nama%");
        return $this->db->resultSet();
    }

    


}
 
 
?>