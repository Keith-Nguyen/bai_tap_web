<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cập nhật sản phẩm</title>
	<style>
	
		body{
			background-image: linear-gradient(to right, #fbc2eb 0%, #a6c1ee 51%, #fbc2eb 100%);
			place-items:center;
			display: grid;
		}
		
		h2{
			font-size: 50px;
			color: #fff;
		}
		
		table{
			box-shadow: 5px 10px 18px #888888;
		}
		
		tr{
			width: 100%;
			height: 70px;
		}
		
		label{
			font-size: 25px;
			color: #4912BD;
			margin-left: 10%;
		}
		
		#txtID, #txtTen, #txtGia, #txtDetail{
			width: 90%;
			padding: 10px;
		  	border-radius: 25px;
		  	border: 1px solid #ccc;
		}
		
		#btnLuu,#btnHuy{
			margin-top: 5px;
			margin-left: 33%;
			padding: 10px 30px;
			text-transform: capitalize;
			border-radius: 5px;
			border: 4px solid;
			border-image-slice: 1;
			border-image-source: linear-gradient(to left, #743ad5, #d53a9d);
			background-color: #a6c1ee;
			color: #D50344;
			font-size: 20px;
		}
		
		#btnHuy{
			margin-left: 30px;
		}
		
		#btnLuu:hover ,#btnHuy:hover {
			background-color: black;
			color: aliceblue;
		}
		
	</style>
</head>

<body>
	
	<h2>Cập nhật sản phẩm</h2>
	<form name="frm1" id="frm1" method="post" enctype="multipart/form-data">
		<table width="750" height="auto" cellpadding="5" cellspacing="0" border="0">
			<?php 
				include_once "connect.php";
				if(isset($_GET['id_sp'])){
					$id=$_GET['id_sp'];
					$select=mysqli_query($con,"select * from sanpham where idsp=$id");
					$row=mysqli_fetch_array($select,MYSQLI_ASSOC);
				}
			?>
			<tr>
				<td><label>ID sản phẩm:</label></td>
				<td>
					<input type="text" name="txtID" id="txtID" value="<?php echo $row['idsp'] ?>" readonly>
				</td>
			</tr>
			<tr>
				<td><label>Tên sản phẩm:</label></td>
				<td><input type="text" name="txtTen" id="txtTen" value="<?php echo $row['tensp'] ?>" ></td>
			</tr>
			<tr>
				<td><label>Hình sản phẩm:</label></td>
				<td>
					<img src="<?php echo $row['hinhanhsp'] ?>" width="150" height="80">
					<input type="file" name="txtHinh" id="txtHinh" >
				</td>
			</tr>
			<tr>
				<td><label>Đơn giá:</label></td>
				<td><input type="text" name="txtGia" id="txtGia" value="<?php echo $row['giasp'] ?>" ></td>
			</tr>
			<tr>
				<td><label>Chi tiết sản phẩm:</label></td>
				<td><input type="text" name="txtDetail" id="txtDetail" value="<?php echo $row['chitietsp'] ?>" ></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="btnLuu" id="btnLuu" value="Lưu">
					<input type="submit" name="btnHuy" id="btnHuy" value="Hủy">
				</td>
			</tr>
		</table>
	</form>
	<?php
		if(isset($_POST['btnLuu'])){
			$ten=$_POST['txtTen'];
			$dir='Product/';
			$hinh=$_FILES['txtHinh'];
			$image=$dir.basename($_FILES['txtHinh']['name']);
			$gia=$_POST['txtGia'];
			$detail=$_POST['txtDetail'];
			if($hinh['size']==0){
				$update=mysqli_query($con,"Update sanpham set tensp='$ten', chitietsp='$detail', giasp='$gia' where idsp=$id");
				if($update){
					echo"<script>alert('Cập nhật sản phẩm thành công')</script>";
					echo "<meta http-equiv='refresh' content='1;url=List.php'>";
				}
				else{
					echo"<script>alert('Cập nhật sản phẩm thất bại')</script>";
				}
			}
		}
	
	?>
</body>
</html>