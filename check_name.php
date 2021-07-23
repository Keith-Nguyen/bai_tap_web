<?php

	include_once "connect.php";
	if(isset($_POST['ten'])){
		$ten = $_POST['ten'];
		$select = mysqli_query($con,"SELECT * FROM thanhvien WHERE tendangnhap='$ten'");
		$row = mysqli_num_rows($select);
		if($row>0){
			echo "<span style='color: red;font-size: 16px;'>Tên đã được đăng ký</span>";
//			echo "<script>$('#btnDk').prop('disabled',true);</script>";
		}
		else{
			echo "<span></span>";
//			echo "<script>$('#btnDk').prop('disabled',false);</script>";
		}
	}
?>