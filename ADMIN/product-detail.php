<?php 
	SESSION_START();
	Require_once '../incl/dbh.inc.php';

	$per_hal=10;
	$jumlah_record=mysqli_query($conn,"SELECT * from barang ");
	$jum = mysqli_num_rows($jumlah_record);

	$halaman=ceil($jum / $per_hal);
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	$start = ($page - 1) * $per_hal;
	$admin_username= $_SESSION['admUsername'] ?? "you";
?>

<!DOCTYPE html>
<html>
<head>
	<title> Admin Panel E-pasar</title>
	<!--bootstrap cdn-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	
	<!--font awesome icon-->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

	<!--jquery ui-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" />

	<!--custom style-->
	<link rel="stylesheet" href="css/style.css"></link>
    
</head>
<body>

<div class="d-flex" id="wrapper">
	<div class="bg-light border-right py-5 px-2" id="sidebar-wrapper">
		<div class="list-group list-group-flush px-2 py-2">
			<div class="sidebar-heading text-center">Hello <?php echo $admin_username;?></div>
			<a href="index.php" class="btn btn-success"> Data Barang</a>
			<a href="add_product.php" class="btn btn-light"> Tambah Barang</a>
			<a href="cart_info.php" class="btn btn-light"><span class="glyphicon glyphicon-shopping-cart"></span> Data Keranjang</a>
			<a href="user_info.php" class="btn btn-light"> Data Pengguna</a>
			<!--
				<li><a href="ganti_pass.php"><span class="glyphicon glyphicon-lock"></span> Ganti Password</a></li>
			-->
			<a href="../login/login.php" class="btn btn-light"><span class="glyphicon glyphicon-log-out"></span> Keluar</a>
		</div>
	</div>
	<div id="page-content-wrapper">
		<div class="container-fluid py-2">
            <h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Barang</h3>

            <?php
                $id_brg=mysqli_real_escape_string($conn,$_GET['id']);
                $det=mysqli_query($conn,"select * from barang where id_barang='$id_brg' ");
                while($d=mysqli_fetch_array($det)){
            ?>	
            
            <table class="table">
                <tr>
                    <td>kode</td>
                    <td><?php echo $d['id_barang'] ?></td>
                </tr>
                <tr> 
                    <td>Foto</td>
                    <td><img src="../img/product_img/<?php echo $d['foto_barang'] ?>" style="width: 100px;" ></td>
                </tr>
                <tr> 
                    <td>Nama</td>
                    <td><?php echo $d['nama_barang'] ?></td>
                </tr>
                <tr>
                    <td>Jenis</td>
                    <td><?php echo $d['jenis_barang'] ?></td>
                </tr>
                <tr>
                    <td>Quantity</td>
                    <td><?php echo $d['quantity_barang'] ?></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>Rp.<?php echo number_format($d['harga_barang']); ?>,- </td>
                </tr>

                <tr>
                    <td>Waktu Input</td>
                    <td><?php echo $d['waktu_input'] ?></td>
                </tr>
                <tr>
                    <td>Waktu Edit</td>
                    <td>
                        <?php IF(!$d['waktu_edit']){
                            ?> <p style="color: red;"> - </p>
                            <?php

                        }else{
                            echo $d['waktu_edit'] ;
                            
                            }
                            ?>
                    </td>
                </tr>
            </table>
            <?php 
                }
            ?>	
		</div>
	</div>
</div>

<!--script js-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<!--jquery ui-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous"></script>


<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
</script>

</body>
</html>