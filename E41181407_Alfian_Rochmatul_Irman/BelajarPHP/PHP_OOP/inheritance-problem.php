<?php
// studi kasus si toko jual produk (komik dan game)
class Produk
{
    public $judul,
        $penerbit,
        $Harga,
        $penulis,
        $jmlHalaman,
        $waktuMain,
        $tipe;

    public function __construct($judul = "Judul", $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0, $jmlHalaman = 0, $waktuMain = 0, $tipe)
    {
        // __construct adalah method spesial yang dimiliki oleh php
        // echo "Hello World";
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlHalaman = $jmlHalaman;
        $this->waktuMain = $waktuMain;
        $this->tipe = $tipe;
    }
    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
        // $this->(variabel) untuk memanggil variabel baru
    }
    public function getInfoLengkap()
    {
        $str = "{$this->tipe} : {$this->judul} | {$this->getLabel()} (Rp.{$this->harga})";
        if ($this->tipe == "komik") {
            $str .= " - {$this->jmlHalaman} Halaman.";
        } else if ($this->tipe == "game") {
            $str .= " ~ {$this->waktuMain} Jam.";
        }

        return $str;
    }
}

class Komik extends Produk
{
    // jika extends bisa menggunakan property dan menggunakan semua hal yg ada di parents klas produk
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



$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0, "komik");

$produk2 = new Produk("Dota 2", "Neil Druckman", "Gaben", 0, 0, 50, "game");

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

echo $produk2->getInfoLengkap();
