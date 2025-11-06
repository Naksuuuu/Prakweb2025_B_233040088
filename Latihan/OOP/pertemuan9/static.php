<?php  

class ContohStatic {
    public static $angka = 1;

    public static function halo() {
        return "Halo " . self::$angka . " kali";
    }
}

echo ContohStatic::halo();
echo "<hr>";

class Contoh {
    public $angka = 1;

    public function halo() {
        return "Halo " . $this->angka++ . " kali <br>";
    }
}

$obj = new Contoh;
$obj2 = new Contoh;

echo $obj->halo();
echo $obj->halo();
echo $obj->halo();
echo "<br>";
echo $obj2->halo();
echo $obj2->halo();
echo $obj2->halo();    
echo "<hr>";

class Contoh2 {
    public static $angka = 1;

    public function halo() {
        return "Halo " . self::$angka++ . " kali <br>";
    }
}

$obj3 = new Contoh2;
$obj4 = new Contoh2;

echo $obj3->halo();
echo $obj3->halo();
echo $obj3->halo();
echo "<br>";
echo $obj4->halo();
echo $obj4->halo();
echo $obj4->halo();

?>