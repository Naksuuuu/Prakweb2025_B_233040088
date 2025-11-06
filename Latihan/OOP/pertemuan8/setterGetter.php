<?php

class Produk {
    private $judul = "judul",
            $penulis = "penulis",
            $penerbit = "penerbit",
            $harga = 0,
            $tipe;
    protected $diskon = 0;
            
            

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



    public function sayHello() {
         echo "Hello World";
    }

    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }

     public function getInfoLengkap() {
        $str = "{$this->tipe} : {$this->judul} | {$this->getLabel()} (Rp : {$this->harga})";
        return $str;
    }

 }


 class Game extends Produk {
  
        private $plytime;

        public function __construct($judul, $penulis, $penerbit, $harga, $tipe, $plytime) {
        parent::__construct($judul,$penulis,$penerbit,$harga,$tipe);
        $this->plytime = $plytime;
    }

        public function setDiskon($diskon) {
        $this->diskon = $diskon;
    }

    public function getInfoLengkap() {
        $str =  parent::getInfoLengkap() .  " ~ {$this->plytime} Jam.";
        return $str;
    }



 }

  class Komik extends Produk {
        private $halaman;

        public function __construct($judul, $penulis, $penerbit, $harga, $tipe, $halaman) {
        parent::__construct($judul,$penulis,$penerbit,$harga,$tipe);
        $this->halaman = $halaman;
    }

    public function getInfoLengkap() {
        $str = parent::getInfoLengkap() . " - {$this->halaman} Halaman.";
        return $str;
    }

 }



$produk1 = new Komik("naruto", "Masashi", "Shonen Jump", 30000, "Komik", 100);
$produk2 = new Game("GTAV", "Rockstar", "Rocksatr Corporation", 1000000, "Game", 75);

echo $produk1->getInfoLengkap();
echo "<br>";

echo $produk2->getInfoLengkap();
echo "<hr>";
$produk2->setDiskon(99);
echo $produk2->getHarga();

echo "<hr>";

echo $produk2->getJudul();


$produk2->setJudul(1);
echo "<br>";

echo $produk2->getJudul();



