<?php
// studi kasus si toko jual produk (komik dan game)
class Produk
{
    public $judul,
        $penerbit,
        $Harga,
        $penulis,
        $jmlHalaman,
        $waktuMain;

    public function __construct($judul = "Judul", $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0, $jmlHalaman = 0, $waktuMain = 0)
    {
        // __construct adalah method spesial yang dimiliki oleh php
        // echo "Hello World";
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlHalaman = $jmlHalaman;
        $this->waktuMain = $waktuMain;
    }
    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
        // $this->(variabel) untuk memanggil variabel baru
    }
    public function getInfoProduk()
    {
        $str = "{$this->judul} | {$this->getLabel()} (Rp.{$this->harga})";
        return $str;
    }
}

class Komik extends Produk
{
    // jika extends bisa menggunakan property dan menggunakan semua hal yg ada di parents klas produk
    public function getInfoKomik()
    {
        $str = "Komik :" . parent::getInfoProduk() . "- {$this->jmlHalaman} Halaman.";
        return $str;
    }
}
class Game extends Produk
{
    public function getInfoGame()
    {
        $str = "Game : " . parent::getInfoProduk() . " - {$this->waktuMain} ~ Jam.";
        // :: adalah method statik didalam PHPt
        return $str;
    }
}

class CetakInfoProduk
{
    public function cetak(Produk $produk)
    {
        $str = "{$produk->judul} | {$produk->getLabel()}(Rp.{$produk->harga})";
        // return $str;
        // $str1 = "Komik : {$produk->judul} | {$produk->getLabel()}(Rp.{$produk->harga}) - 100 halaman";
        // return $str1;
        // $str2 = "Game : {$produk->judul} | {$produk->getLabel()}(Rp.{$produk->harga}) ~ 50Jam";
        // return $str2;
        return $str;
    }
}



$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0);

$produk2 = new Game("Dota 2", "Neil Druckman", "Gaben", 0, 0, 50);

// // $produk3 = new Produk("Dragon Ball");
// echo "Komik : " . $produk1->getLabel();
// echo "<br>";
// echo "Game : " . $produk2->getLabel();
// echo "<br>";
// // var_dump($produk3);
// $infoProduk1 = new CetakInfoProduk();
// echo $infoProduk1->cetak($produk1);
// $infoProduk1 = new CetakInfoProduk();
// echo $infoProduk1->cetak($produk1);

// menginstansiasi komik : naruto | masashi kishimoto | , shonen jump (Rp.3000) - 100 halaman.
// jika ini adalah game, maka tampilanya game : Dota 2 | Gaben, Steam (Rp.0) ~ 50jam.

echo $produk2->getInfoGame();
echo $produk1->getInfoKomik();
