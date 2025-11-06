<?php

interface TesInterface {
     public function getInfoLengkap();
}

abstract class Produk {
    protected $judul = "judul",
            $penulis = "penulis",
            $penerbit = "penerbit",
            $harga = 0,
            $tipe,
            $diskon = 0;
            
            

    public function __construct($judul, $penulis, $penerbit, $harga, $tipe) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->tipe = $tipe;
    }
    
    public function getHarga() {
        return $this->harga - ($this->harga * $this->diskon / 100);
    }

    public function getJudul() {
        return $this->judul;
    }

    public function setJudul($judul) {
        // jika ingin hanya string judul nya :
        if(!is_string($judul)) throw new Exception("judul harus string");
        exit;
         $this->judul = $judul;
    }

    public function getPenulis() {
        return $this->penulis;
    }

     public function setPenulis($penulis) {
         $this->penulis = $penulis;
    }

    public function getPenerbit() {
        return $this->penerbit;
    }

     public function setPenerbit($penerbit) {
         $this->penerbit = $penerbit;
    }


    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }

    abstract public function getInfo();
     
     


 }


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

 class CetakInfoProduk {
    public $daftarProduk = [];

    public function tambahProduk(PRODUK $produk ) {
        $this->daftarProduk[]= $produk;
    }

    public function cetak() {
        $str = "DAFTAR PRODUK :<br>";

        foreach($this->daftarProduk as $produk) {
            $str .= " {$produk->getInfoLengkap()} <br>" ;
        }

        return $str;
    }
 }



$produk1 = new Komik("naruto", "Masashi", "Shonen Jump", 30000, "Komik", 100);
$produk2 = new Game("GTAV", "Rockstar", "Rocksatr Corporation", 1000000, "Game", 75);

$cetakProduk = new CetakInfoProduk;
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);

echo $cetakProduk->cetak();

// $produk3 =  new Produk("naruto", "Masashi", "Shonen Jump", 30000, "Komik"); akan error karna Produk merupakan abstract class

