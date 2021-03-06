<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng ký</title>
	<style>
		
		body{
			background-image: linear-gradient(to right, #fbc2eb 0%, #a6c1ee 51%, #fbc2eb 100%);
		}
		
		#frm1{
			place-items:center;
			display: grid;
			border-collapse: collapse;
			
		}
		h2{
			font-size: 50px;
			color: #ffffff;
		}
		form p{
			font-size: 20px;
			margin-top: -5px;
		}
		table{
			box-shadow: 5px 10px 18px #888888;
		}
		
		tr{
			width: auto;
			height: 60px;
			color: #4912BD;
			font-size: 20px;
		}
		
		.left label{
			margin-left: 18%;
		}
		
		label{
			font-size: 22px;
		}
		
		#txtTen,#txtMK,#txtMKA{
			width: 90%;
			padding: 10px;
		  	border-radius: 25px;
		  	border: 1px solid #ccc;
		}
		
		#rdNam,#rdNu,#rdKhac, #chkFashion, #chkMusic,#chkSport,#chkTravel{
			width: 15px;
			height: 15px;
		}
		
		#rdNu,#rdKhac{
			margin-left: 29%;	
			
		}
		
		#slJob{
			height: 30px;
			width: 130px;
		}
		
		#chkFashion,#chkMusic,#chkTravel{
			margin-left: 6%;
		}
		
		#btnDk,#btnLl{
			margin-top: 5px;
			margin-left: 30%;
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
		
		#btnLl{
			margin-left: 30px;
		}
		
		#btnDk:hover ,#btnLl:hover {
			background-color: black;
			color: aliceblue;
		}
		
		form table tr td p{
			margin-top: 5px;
		}
		
		a{
			color: crimson;
		}
	</style>
</head>

<body oncopy="return false" oncut="return false" onpaste="return false">
	
	<form name="frm1" id="frm1" method="post" enctype="multipart/form-data" action="#">
		<h2>Đăng ký tài khoản mới</h2>
		<p>Vui lòng điền đẩy đủ thông tin bên dưới để đăng ký tài khoản mới</p>
		<table width="800px" border="0" cellpadding="5" cellspacing="0" height="450px">
			<tr>
				<td class="left"><label>Tên đăng nhập</label></td>
				<td><input type="text" id="txtTen" name="txtTen" value="" maxlength="50" required placeholder="Nhập tên đăng nhập" oninput="checkUserName()"><br>
					<span id="txtCheckName"></span>
				</td>
			</tr>
			<tr>
				<td class="left"><label>Mật khẩu</label></td>
				<td><input type="password" id="txtMK" name="txtMK" value="" maxlength="15" required placeholder="Nhập mật khẩu"></td>
			</tr>
			<tr>
				<td class="left"><label>Nhập lại mật khẩu</label></td>
				<td><input type="password" id="txtMKA" name="txtMKA" value="" maxlength="15" required placeholder="Nhập lại mật khẩu"></td>
			</tr>
			<tr>
				<td class="left"><label>Hình đại diện</label></td>
				<td><input type="file" id="txtImage" name="txtImage" value="" required></td>
			</tr>
			<tr>
				<td class="left"><label>Giới tính</label></td>
				<td style="align-items: stretch;">
					<input type="radio" value="Nam" name="gender" id="rdNam" /><label>Nam</label>
					<input type="radio" value="Nữ" name="gender" id="rdNu" /><label>Nữ</label>
					<input type="radio" value="Khác" name="gender" id="rdKhac" /><label>Khác</label>
				</td>
			</tr>
			<tr>
				<td class="left"><label>Nghề nghiệp</label></td>
				<td>
					<select name="slJob" id="slJob">
						<option value="Học sinh">Học sinh</option>
						<option value="Sinh viên">Sinh viên</option>
						<option value="Thực tập sinh">Thực tập sinh</option>
						<option value="Trợ giảng">Trợ giảng</option>
						<option value="Giảng viên">Giảng viên</option>
						<option value="Khác">Khác</option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="left"><label>Sở thích</label></td>
				<td>
					<input type="checkbox" id="chkSport" name="hobby[]" value="Thể thao"><label>Thể thao</label>
					<input type="checkbox" id="chkTravel" name="hobby[]" value="Du lịch"><label>Du lịch</label>
					<input type="checkbox" id="chkMusic" name="hobby[]" value="Âm nhạc"><label>Âm nhạc</label>
					<input type="checkbox" id="chkFashion" name="hobby[]" value="Thời trang"><label>Thời trang</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="btnDk" id="btnDk" value="Đăng ký">
					<input type="submit" name="btnLl" id="btnLl" value="Làm lại">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p align="center">
						Bạn đã có tài khoản?
						<a href="BT2-FormDN.php">Click Here</a>
					</p>
				</td>
			</tr>
		</table>
	</form>
	
	<script type="text/javascript" src="../web2/Jquery/jQuery v3.4.1.min.js"></script>
	
	<script>
//		function checkUserName(){
//			var data = $('#txtTen').val();
//			jQuery.ajax({
//				type:'POST',
//				url:'check_name.php',
//				data:'txtTen='+data,
//				success:function(data){
//					$("#txtCheckName").html(data);
//				}
//			});
//		}
		$(document).ready(function(){
			$('#txtTen').on('change',function(){
				var ten = $('#txtTen').val();
				$.ajax({
					type:'POST',
					data:{ten: ten},
					url:'check_name.php',
					success:function(resposne){
						$("#txtCheckName").html(resposne);
					}
				});
			});
		});
	</script>
	
	<?php
		include_once "connect.php";
		if(isset($_POST["btnDk"])){
			$ten=$_POST["txtTen"];
			$mk=$_POST["txtMK"];
			$confirm=$_POST["txtMKA"];
			$hinh=$_FILES["txtImage"];
			$dir="Image/";
			$image=$dir.basename($_FILES["txtImage"]["name"]);
			$sex=$_POST["gender"];
			$job=$_POST["slJob"];
			$hobby=implode(",",$_POST["hobby"]);
			$encode=md5($mk);
			if(strlen($mk)!=8){
				echo"<script>alert('Mật khẩu chỉ có thể nhập 8 ký tự')</script>";
			}
			else if($confirm != $mk){
				echo"<script>alert('Mật khẩu xác nhận không trùng khớp')</script>";
			}
			else{
				if($hinh['type']=="image/jpg" || $hinh['type']=="image/png" || $hinh['type']=="image/jpeg"){
					if($hinh['size']<=1000000){
						if(move_uploaded_file($hinh["tmp_name"],$image)){
							$insert=mysqli_query($con,"insert into thanhvien (tendangnhap, matkhau, hinhanh, gioitinh, nghenghiep, sothich) values('$ten','$encode','$image','$sex','$job','$hobby')");
							if($insert){
								echo"<script>alert('Đăng ký thành công. Mời bạn đăng nhập lại bằng tài khoản vừa tạo')</script>";
								echo "<meta http-equiv='refresh' content='1;url=BT2-FormDN.php'>";
							}
						}
					}
					else{
						echo"<script>alert('Hình không được có kích thước quá 1Mb')</script>";
					}
				}
				else{
					echo"<script>alert('Hình phải có định dạng .jpg, .jpeg, .png')</script>";
				}
			}
		}
	?>
</body>
</html>
