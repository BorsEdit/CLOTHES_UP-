<?php 
SESSION_START();
include '../../incl/dbh.inc.php';

$nama_barang = $_POST['nama'];
$jenis = $_POST['jenis'];
$qty = $_POST['qty'];
$harga = $_POST['harga'];
$tanggal = date("Y-m-d H:i:s");

if($_POST['upload']){
   $allowed_ext   = array('jpg','png','jpeg');
   $file_name     = $_FILES['file']['name'];
   $tmp           = explode('.', $file_name);
   $file_ext      = end($tmp);
   $file_size     = $_FILES['file']['size'];
   $file_tmp      = $_FILES['file']['tmp_name'];
   $nama          = "foto";

   if(in_array($file_ext, $allowed_ext) === true){
                     
      $in = mysqli_query($conn,"INSERT INTO barang VALUES('','".$nama."', '".$nama_barang."', '".$jenis."', '".$qty."', '".$harga."','".$tanggal."','')" );     

      if($in){
         $query = mysqli_query($conn,"SELECT id_barang FROM barang ORDER BY id_barang DESC LIMIT 1");
         $data  = mysqli_fetch_array($query);

         //mengganti nama
         $nama_baru = "fotobarang".$data['id_barang'].'.'.$file_ext; 
         $nama_baru1 = "fotobarang".$data['id_barang']; 

         $file_temp = $_FILES['file']['tmp_name']; //data temp yang di upload

         $lokasi = '../../img/product_img/'.$nama_baru1.'.'.$file_ext;  
         move_uploaded_file($file_tmp, $lokasi);

         //update nama file di database
         $id_barang = $data['id_barang'];
         $up = mysqli_query($conn,"UPDATE barang SET foto_barang='$nama_baru' WHERE id_barang='$id_barang' ");
         header("location:../index.php");
      }
      else{
         echo'gagal';
      }
   }
   else{
      header("location:../tambah_produk.php?pesan=ext");
   }
}
else{
   header("location:../tambah_produk.php?pesan=gagal");
}
?>
