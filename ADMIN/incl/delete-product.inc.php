<?php 
    require_once "../../incl/dbh.inc.php";
    $id=$_GET['id'];
    mysqli_query($conn,"delete from barang where id_barang='$id'");
    header("location:../index.php");
?>