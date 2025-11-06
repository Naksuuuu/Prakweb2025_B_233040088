<?php


require_once 'App/init.php';











$produk1 = new Komik("naruto", "Masashi", "Shonen Jump", 30000, "Komik", 100);
$produk2 = new Game("GTAV", "Rockstar", "Rocksatr Corporation", 1000000, "Game", 75);

$cetakProduk = new CetakInfoProduk;
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);

echo $cetakProduk->cetak();

// $produk3 =  new Produk("naruto", "Masashi", "Shonen Jump", 30000, "Komik"); akan error karna Produk merupakan abstract class

