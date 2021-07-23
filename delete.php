<?php

	include_once "connect.php";
	$id=$_GET['id_sp'];
	$delete=mysqli_query($con,"delete from sanpham where idsp=$id");
	if($delete){
		header("Location:List.php");
	}
	else{
		echo "<script>alert('Không xóa được')</script>";
	}
?>