<?php

	include_once "connect.php";
	if(isset($_POST['id'])){
		$id=$_POST['id'];
		$result=mysqli_query($con,"SELECT * FROM sanpham WHERE idsp=$id");
		$html='';
		while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
			$html='<p align="center"><img src="'.$row["hinhanhsp"].'" class="img-thumbnail" /></p>';
		}
		echo $html;
	}
?>