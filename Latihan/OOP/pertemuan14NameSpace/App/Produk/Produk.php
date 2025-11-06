<?php
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
 
 
?>