<?php
define('NAMA','Ariel');
 
echo NAMA;

const UMUR = 20;

echo UMUR;

// define tidak bisa digunakan dalam konsep oop (tidak bisa digunakan/ditaruh didalam class) dan bersifat constanta global
// const bisa digunakan dalam konsep oop (bisa di taruh didalam class)
 

class Coba {
    const TES = "<br> Bisa";
}

// cara akses const didalam class sama kaya static (gunakan ::)

echo Coba::TES;


// magic constant ada beberapa :

echo "<br>";

// echo __LINE__;
// echo __FILE__
// echo  __DIR__;
// echo __FUNCTION__;
// echo __CLASS__;
// echo __TRAIT__;
// echo __METHOD__;
// echo __NAMESPACE__;





?>