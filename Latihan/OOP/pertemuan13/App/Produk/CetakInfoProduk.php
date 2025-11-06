<?php

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
 
 
?>