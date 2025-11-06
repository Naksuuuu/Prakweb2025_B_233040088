<?php
class About extends Controller {
    public function index($nama = "hehe", $profesi = "tes", $umur = 17) {
        $data = [
            'nama' => $nama,
            'profesi' => $profesi,
            'umur' => $umur,
            'judul' => "About me"
            ];

        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page() {

        $data = [
            'judul' => "page"
        ];

        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }


}
 
 
?>