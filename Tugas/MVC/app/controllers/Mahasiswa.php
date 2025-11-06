<?php

class Mahasiswa extends Controller {
    public function index() {
        $data = [
            'judul' => 'Daftar mahasiswa',
            'mahasiswa' => $this->model('Mahasiswa_model')->getAllMahasiswa()   
            // ->getMhs()
        ];

        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

        public function detail($id) {
        $data = [
            'judul' => 'Mahasiswa' . $id,
            'mahasiswa' => $this->model('Mahasiswa_model')->getMahasiswaById($id)
        ];


        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0 ) {
            Flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    
    }

    public function hapus() {
        if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($_POST['id']) > 0 ) {
            Flasher::setFlash('Berhasil', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Dihapus', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    
    }

    public function getubah() {
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }

    public function ubah() {
        if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0 ) {
            Flasher::setFlash('Berhasil', 'Diubah', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Diubah', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    
    }

    public function cari() {
        if(isset($_POST['cari'])) {
               $data = [
            'judul' => 'Daftar mahasiswa',
            'mahasiswa' => $this->model('Mahasiswa_model')->cariMahasiswa($_POST['keyword'])   
        ];
        } else {
                    $data = [
            'judul' => 'Daftar mahasiswa',
            'mahasiswa' => $this->model('Mahasiswa_model')->getAllMahasiswa()   
            // ->getMhs()
        ];
        }
 

        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    
    }
}
 
 
?>