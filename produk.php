<?php 

 class Barang {
     public $kd_brg,
            $nama_brg,
            $harga;

     public function __construct($kd_brg=0000,$nama_brg="nama barang",$harga=0){
        $this->kd_brg = $kd_brg;
        $this->nama_brg = $nama_brg;
        $this->harga = $harga;
     }
     public function cetak_data(Barang $barang){
         $d = "kode_barang : {$barang->kd_brg} <br>
               Nama Barang : {$barang->nama_brg} <br>
               Harga       : {$barang->harga} <br><br><hr>
         ";
         return $d;
     }
 }
 
 class Trade extends Barang{
     public $kd_trade,
            $kd_brg,
            $total;

     public function __construct($kd_trade=0000,$kd_brg=array(),$total=0){
        $this->kd_trade = $kd_trade;
        $this->kd_brg = $kd_brg;
        $this->total = $total;
     }
     public function getid(){
         $a = null;
        $ec = $this->kd_brg;
        for($i=0;$i<count($ec);$i++){
           $s = $ec[$i]->kd_brg ;
           $a .= $s.", ";  
        }
        return $a;
     }
     public function getname(){
         $l=null;
         $gn = $this->kd_brg;
         for($i=0;$i<count($gn);$i++){
             $s = $gn[$i]->nama_brg;
             $l .= $s.", ";
         }
         return $l;
     }
     public function get_total(){
         $sum = 0;
         $to = $this->kd_brg;
         for($i=0;$i<count($to);$i++){
             $tot = $to[$i]->harga;
            $sum += $tot;          
         }
         return $sum;
     }

     public function cetak_all(Trade $trade){
         $st = "Kode transaksi : {$trade->kd_trade}  
         <br> kode barang : {$trade->getid()} 
         <br> Nama barang : <b>{$trade->getname()}<b>
         <br><br> <strong>TOTAL</strong> Rp.{$trade->get_total()}";
         return $st;
     }
 }

 $barang1 = new Barang(12345,"Apache 16",18000);
 $barang2 = new Barang(25234,"Surya 16",19000);
 $barang3 = new Barang(12348,"A Mild 16",24000);

 echo $barang1->cetak_data($barang1);
 echo $barang2->cetak_data($barang2);
 echo $barang3->cetak_data($barang3);
 echo" <br><br>";

 $t1 = new Trade(1111,[$barang1,$barang2,$barang3],24223);

 //print_r($t1->tes($t1));
 echo $t1->cetak_all($t1);

