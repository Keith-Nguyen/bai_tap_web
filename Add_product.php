<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add products</title>
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
			height: 70px;
		}
		
		label{
			margin-left: 10%;
			font-size: 23px;
			color: #4912BD;
		}
		
		#txtTen, #txtGia, #txtDetail, #txtID{
			border-radius: 35px;
			height: 30px;
			width: 90%;
			font-size: 16px;
		}
		
		#btnLuu{
			margin-left: 30%;
		}
		
		#btnLuu,#btnXoa{
			margin-top: 10px;
			margin-bottom: 10px;
			padding: 10px 30px;
			border-radius: 5px;
			border: 4px solid;
			border-image-slice: 1;
			border-image-source: linear-gradient(to left, #743ad5, #d53a9d);
			background-color: #a6c1ee;
			color: #D50344;
			font-size: 20px;
		}
		
		#btnXoa{
			margin-left: 30px;
		}
		
		#btnLuu:hover ,#btnXoa:hover {
			background-color: black;
			color: aliceblue;
		}
	</style>
</head>

<body>
	<?php 
		include_once "connect.php";
		if(isset($_GET['id_user'])){
			$id=$_GET['id_user'];
		}
	?>
	<h2>Thêm sản phẩm</h2>
	<form name="frm1" id="frm1" action="#" enctype="multipart/form-data" method="post">
		<table width="600px" height="auto" cellpadding="5" cellspacing="0">
			<tr>
				<td><label>Tên sản phẩm:</label></td>
				<td>
					<input type="text" name="txtTen" id="txtTen" placeholder="Nhập tên sản phẩm" required>
				</td>
			</tr>
			<tr>
				<td><label>Chi tiết sản phẩm:</label></td>
				<td>
					<input type="text" name="txtDetail" id="txtDetail" placeholder="Nhập chi tiết sản phẩm" required>
				</td>
			</tr>
			<tr>
				<td><label>Giá sản phẩm:</label></td>
				<td>
					<input type="text" name="txtGia" id="txtGia" placeholder="Nhập giá sản phẩm" required>
				</td>
			</tr>
			<tr>
				<td><label>Hình ảnh sản phẩm:</label></td>
				<td>
					<input type="file" name="txtHinh" id="txtHinh" required>
				</td>
			</tr>
			<tr>
				<td><label>ID của thành viên:</label></td>
				<td>
					<input type="text" name="txtID" id="txtID" value="<?php echo $id; ?>" readonly>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="btnLuu" id="btnLuu" value="Lưu">
					<input type="submit" name="btnXoa" id="btnXoa" value="Hủy">
				</td>
			</tr>
		</table>
	</form>
	<?php
		
		if(isset($_POST["btnLuu"])){
			$ten=$_POST['txtTen'];
			$chitiet=$_POST['txtDetail'];
			$gia=$_POST['txtGia'];
			$dir='Product/';
			$hinh=$_FILES['txtHinh'];
			$img=$dir.basename($_FILES['txtHinh']['name']);
			$id=$_POST['txtID'];
			if($hinh['type']=="image/jpg" || $hinh['type']=="image/png" || $hinh['type']=="image/jpeg"){
				if($hinh['size']<=1000000){
					if(move_uploaded_file($hinh["tmp_name"], $img)){
						$insert=mysqli_query($con,"insert into sanpham (tensp, chitietsp, giasp, hinhanhsp, idtv) values('$ten', '$chitiet', $gia, '$img', $id)");
						if($insert){
							echo"<script>alert('Thêm sản phẩm thành công')</script>";
							echo "<meta http-equiv='refresh' content='1;url=Home.php'>";
						}
						else{
							echo "<script>alert('Thêm sản phẩm không thành công')</script>";
						}
					}
				}
				else{
					echo "<script>alert('Hình tải lên chỉ có thể dưới 1Mb')</script>";
				}
			}
			else{
				echo "<script>alert('Hình tải lên phải thuộc định dạng .jpg, .png, .jpeg')</script>";
			}
		}
		
		if(isset($_POST['btnXoa'])){
			header("Location:Home.php");
		}
	?>
</body>
</html>