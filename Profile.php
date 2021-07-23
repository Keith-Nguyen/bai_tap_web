<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Profile</title>
	<style>
		
		body{
			background-image: linear-gradient(to right, #fbc2eb 0%, #a6c1ee 51%, #fbc2eb 100%);
		}
		
		#frm1{
			display: grid;
			place-items:center;
			border-collapse: collapse;
		}
		
		h2{
			font-size: 50px;
			color: #ffffff;
		}
		
		table{
			box-shadow: 5px 10px 18px #888888;
		}
		
		tr{
			height: 50px;
			font-size: 25px;
		}
		
		.left{
			font-size: 23px;
			color: #4F12D0;
			
		}
		
		.data{
			color: #ffffff;
			font-family: cursive;
		}
	</style>
</head>

<body oncopy="return false" oncut="return false" onpaste="return false">
	<form method="post" name="frm1" id="frm1" enctype="multipart/form-data" action="#">
		<h2>Thông tin cá nhân</h2>
		<table width="600" height="auto" cellpadding="5" cellspacing="0" border="0">
			<?php
					include_once "connect.php";
					if(isset($_GET['id_user'])){
						$id=$_GET['id_user'];
						$select=mysqli_query($con,"SELECT * FROM thanhvien where id =$id");
						$row=mysqli_fetch_array($select, MYSQLI_ASSOC);
					}
					
			?>
			<tr>
				<td class="left">Tên người dùng</td>
				<td class="data"><?php echo $row['tendangnhap']; ?></td>
			</tr>
			<tr>
				<td class="left">Ảnh đại diện</td>
				<td><img src="<?php echo $row['hinhanh'] ?>" width="300" height="200"></td>
				
			</tr>
			<tr>
				<td class="left">Giới tính</td>
				<td class="data"><?php echo $row['gioitinh'] ?></td>
				
			</tr>
			<tr>
				<td class="left">Nghề nghiệp</td>
				<td class="data"><?php echo $row['nghenghiep'] ?></td>
			</tr>
			<tr>
				<td class="left">Sở thích</td>
				<td class="data"><?php echo $row['sothich'] ?></td>
			</tr>
			
		</table>
	</form>
</body>
</html>