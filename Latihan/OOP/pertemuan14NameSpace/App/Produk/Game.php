<?php
 class Game extends Produk implements TesInterface{
  
        private $plytime;

        public function __construct($judul, $penulis, $penerbit, $harga, $tipe, $plytime) {
        parent::__construct($judul,$penulis,$penerbit,$harga,$tipe);
        $this->plytime = $plytime;
    }

        public function setDiskon($diskon) {
        $this->diskon = $diskon;
    }

     public function getInfo() {
        $str = "{$this->tipe} : {$this->judul} | {$this->getLabel()} (Rp : {$this->harga})";
        return $str;
    }

    public function getInfoLengkap() {
        $str =  $this->getInfo() . "  ~ {$this->plytime} Jam.";
        return $str;
    }



 }
 
 
?>