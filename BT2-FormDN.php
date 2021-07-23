<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng nhập</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
		p{
			font-size: 20px;
		}
		table{
			box-shadow: 5px 10px 18px #888888;
		}
		
		tr{
			height: 50px;
			color: #4912BD;
			font-size: 20px;
			
		}
		
		.left label{
			margin-left: 10%;
		}
		
		label{
			font-size: 22px;
		}
		
		#txtTen,#txtMK{
			margin:auto;
  			display:block;
			width: 60%;
	  	  	margin-top: 15px;
		  	padding: 15px;
		  	border-radius: 25px;
		  	border: 1px solid #ccc;
		}		
		
		#btnSignIn{
			margin:auto;
  			display:block;
			padding: 10px 30px;
			text-transform: capitalize;
			border-radius: 5px;
			border: 4px solid;
			border-image-slice: 1;
			border-image-source: linear-gradient(to left, #743ad5, #d53a9d);
			background-color: #a6c1ee;
			color: #D50344;
			font-size: 20px;
			margin-top: 10px;
		}
		
		#btnSignIn:hover {
			background-color: black;
			color: aliceblue;
		}
		
		i{
			margin-top: -35px;
			float: right;
			margin-right: 120px;
			cursor: pointer;
			color: black;
		}
		
		a{
			color: crimson;
		}
	
	</style>
</head>

<body oncopy="return false" oncut="return false" onpaste="return false">
	<form name="frm1" id="frm1" method="post" enctype="multipart/form-data" action="#">
		<h2>Đăng nhập</h2>
		<table width="600px" border="0" cellpadding="5" cellspacing="0" >
			<tr>
				<td colspan="2"><input type="text" id="txtTen" name="txtTen" value="" maxlength="50" placeholder="Tên đăng nhập"></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="password" id="txtMK" name="txtMK" value="" maxlength="15" placeholder="Mật khẩu">
					<i class="fa fa-eye"></i></td>
			</tr>
			<tr>	
				<td colspan="2">
					<input type="submit" id="btnSignIn" name="btnSignIn" value="Sign in" onClick="login()">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p align="center">
						Bạn chưa có tài khoản?
						<a href="BT2-FormDK.php">Click Here</a>
					</p>
				</td>
			</tr>
		</table>
	</form>
	
	<script>
		
		var pw_field=document.querySelector("input[type='password']");
		var displ=document.querySelector("i");
			displ.onclick= () =>{
				if(pw_field.type=="password"){
					pw_field.type="text";
				}
				else if(pw_field.type=="text"){
					pw_field.type="password";
				}
			}
		function login(){
			var ten = document.forms['frm1']['txtTen'].value;
			var mk = document.getElementById('txtMK').value;
			// Biểu thức chính quy
			// Có thể sử dụng pattern trong input để ktr biểu thức chính quy
			var regExpTen = /^[A-Za-z][A-Za-z0-9]{6,15}$/;
			var regExpPw = /^[A-Za-z0-9]{6,15}/;
			// Hiển thị mật khẩu
			
			
			if(ten == null || ten == ""){
				alert('Tên đăng nhập không thể để trống');
			}
			else if(mk == null || mk == ""){
				alert('Mật khẩu không thể để trống');
			}
			else if(!regExpTen.test(ten)){
				alert('Tên phải bắt đầu từ chữ cái, sau đó là chữ cái hoặc số có độ dài từ 6-15');
			}
			else if(!regExpPw.test(mk)){
				alert('Mật khẩu phải có cả chữ cái và số có độ dài từ 6-15. Không được có ký tự khác');
			}
			
			
		}
	
	</script>
	
	<?php
		include_once "connect.php";
		session_start();
		if(isset($_POST["btnSignIn"])){
			$ten=$_POST["txtTen"];
			$mk=$_POST["txtMK"];
			$encode=md5($mk);
			$select=mysqli_query($con,"SELECT * FROM `thanhvien` WHERE tendangnhap='$ten' and matkhau='$encode'");
			$row=mysqli_fetch_assoc($select);
			if(!empty($row)){
				$_SESSION["user_id"]=$row["id"];
				header("Location:Home.php");
			}
//			else{
//				echo"<script>alert('Tên đăng nhập hoặc mật khẩu của bạn đã bị sai')</script>";
//			}
//			echo"<script>alert('$ten - $encode')</script>";
		}
	?>
	
	
</body>
</html>