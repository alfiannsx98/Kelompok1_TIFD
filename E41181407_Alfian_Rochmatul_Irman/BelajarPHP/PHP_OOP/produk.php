<?php
// studi kasus si toko jual produk (komik dan game)
class Produk
{
    public $judul = "Judul",
        $penerbit = "penerbit",
        $Harga = 0,
        $penulis = "penulis";
    // public function sayHello()
    // {
    //     return "Hello World!!";
    // }
    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
        // $this->(variabel) untuk memanggil variabel baru
    }
}
// $produk1 = new Produk();
// $produk1->judul = "Naruto";
// var_dump($produk1);

// $produk2 = new Produk();
// $produk2->judul = "Bleach";
// $produk2->tambahProperti = "hahaha";
// var_dump($produk2);

$produk3 = new Produk();
$produk3->judul = "Naruto";
$produk3->penulis = "Masashi Kishimoto";
$produk3->penerbit = "Shonen Jump";
$produk3->harga = 30000;

// echo "Komik : $produk3->penulis,$produk3->penerbit";
// echo "<br>";
// echo $produk3->getLabel();
// echo "<hr>";
$produk4 = new Produk();
$produk4->judul = "Dota 2";
$produk4->penulis = "Neil Druckman";
$produk4->harga = 0;


echo "Komik : " . $produk3->getLabel();
echo "<br>";
echo "Game : " . $produk4->getLabel();
