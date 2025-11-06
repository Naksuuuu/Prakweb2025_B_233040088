<?php

class Produk {
    public $judul = "judul",
            $penulis = "penulis",
            $penerbit = "penerbit",
            $harga = 0;

    public function __construct($judul, $penulis, $penerbit, $harga) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }
    


    public function sayHello() {
         echo "Hello World";
    }

    public function getLabel() {
        return "$this->penulis, $this->judul";
    }
 }


 class InfoProduk {
    public function cetak(/* Produk disini agar hanya tipe data class Produk yang bisa masuk ke class ini */ Produk $produk) {
        $str = "{$produk->judul} | {$produk->getLabel()}, RP: [$produk->harga]";
        return $str;
    }
 }



$produk1 = new Produk("naruto", "Masashi", "Shonen Jump", 30000);

$infoProduk = new InfoProduk();
echo $infoProduk->cetak($produk1);



