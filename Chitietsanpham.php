<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Chi tiết sản phẩm</title>
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
		
		label{
			font-size: 25px;
			color: #4912BD;
			margin-left: 10%;
		}
		
		p{
			font-size: 23px;
			font-family: cursive;
		}
		
		
	</style>
</head>

<body>
	<h2>Chi tiết sản phẩm</h2>
	<form name="frm1" id="frm1" method="post" enctype="multipart/form-data">
		<table width="700" height="auto" cellpadding="5" cellspacing="0" border="0">
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
					<p><?php echo $row['idsp'] ?></p>
				</td>
			</tr>
			<tr>
				<td><label>Tên sản phẩm:</label></td>
				<td>
					<p><?php echo $row['tensp'] ?></p>
				</td>
			</tr>
			<tr>
				<td><label>Hình sản phẩm:</label></td>
				<td>
					<img src="<?php echo $row['hinhanhsp'] ?>" width="150" height="80">
				</td>
			</tr>
			<tr>
				<td><label>Đơn giá:</label></td>
				<td>
					<p><?php echo $row['giasp'] ?>$</p>
				</td>
			</tr>
			<tr>
				<td><label>Chi tiết sản phẩm:</label></td>
				<td>
					<p><?php echo $row['chitietsp'] ?></p>
				</td>
			</tr>
			
		</table>
	</form>
</body>
</html>