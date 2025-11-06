<?php

class Produk {
    public $judul = "judul",
            $penulis = "penulis",
            $penerbit = "penerbit",
            $harga = 0,
            $tipe;
            
            

    public function __construct($judul, $penulis, $penerbit, $harga, $tipe) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->tipe = $tipe;
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
  
        public $plytime;

        public function __construct($judul, $penulis, $penerbit, $harga, $tipe, $plytime) {
        parent::__construct($judul,$penulis,$penerbit,$harga,$tipe);
        $this->plytime = $plytime;
    }

    public function getInfoLengkap() {
        $str =  parent::getInfoLengkap() .  " ~ {$this->plytime} Jam.";
        return $str;
    }


 }

  class Komik extends Produk {
        public $halaman;

        public function __construct($judul, $penulis, $penerbit, $harga, $tipe, $halaman) {
        parent::__construct($judul,$penulis,$penerbit,$harga,$tipe);
        $this->halaman = $halaman;
    }

    public function getInfoLengkap() {
        $str = parent::getInfoLengkap() . " - {$this->halaman} Halaman.";
        return $str;
    }

 }


//  class InfoProduk {
//     public function cetak(/* Produk disini agar hanya tipe data class Produk yang bisa masuk ke class ini */ Produk $produk) {
//         $str = "{$produk->judul} | {$produk->getLabel()}, RP: [$produk->harga]";
//         return $str;
//     }
//  }



$produk1 = new Komik("naruto", "Masashi", "Shonen Jump", 30000, "Komik", 100);
$produk2 = new Game("GTAV", "Rockstar", "Rocksatr Corporation", 1000000, "Game", 75);

echo $produk1->getInfoLengkap();
echo "<br>";

echo $produk2->getInfoLengkap();




