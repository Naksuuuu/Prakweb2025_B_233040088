<?php
  class Komik extends Produk implements TesInterface{
        private $halaman;

        public function __construct($judul, $penulis, $penerbit, $harga, $tipe, $halaman) {
        parent::__construct($judul,$penulis,$penerbit,$harga,$tipe);
        $this->halaman = $halaman;
    }

    public function getInfo() {
        $str = "{$this->tipe} : {$this->judul} | {$this->getLabel()} (Rp : {$this->harga})";
        return $str;
    }

    public function getInfoLengkap() {
        $str = $this->getInfo() . " - {$this->halaman} Halaman.";
        return $str;
    }

 }
 
 
?>