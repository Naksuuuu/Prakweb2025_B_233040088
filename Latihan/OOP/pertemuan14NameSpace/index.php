<?php


require_once 'App/init.php';



// $produk1 = new Komik("naruto", "Masashi", "Shonen Jump", 30000, "Komik", 100);
// $produk2 = new Game("GTAV", "Rockstar", "Rocksatr Corporation", 1000000, "Game", 75);

// $cetakProduk = new CetakInfoProduk;
// $cetakProduk->tambahProduk($produk1);
// $cetakProduk->tambahProduk($produk2);


// new App\Produk\User();
// echo "<br>";
// new App\Service\User();

// cara agar tidak menulis namespace berulang kali :

use App\Produk\User as ProdukUser;
use App\Service\User as ServiceUser;

new ProdukUser();
echo "<br>";
new ServiceUser();
