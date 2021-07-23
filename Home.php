<?php
	session_start();
	if(!isset($_SESSION["user_id"])){
		header("Location:BT2-FormDN.php");
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		
		:root{
			--bg-body:linear-gradient(to right, #fbc2eb 0%, #a6c1ee 51%, #fbc2eb 100%);
			--bg-nav:#E8E8E8;
		}
		
		*{
			margin: 0px;
			padding: 0px;
			box-sizing: border-box;
		}
		
		body{
			height: 100vh;
			background: var(--bg-body);
			place-items:center;
			display: grid;
		}
		
		ul{
			list-style-type: none;
			display: flex;
			background: var(--bg-nav);
			height: 80px;
			border-radius: 35px;
			position: relative;
		}
		
		a{
			width: 200px;
			text-decoration: none;
			font-size: 25px;
			font-family: cursive;
			display: inline-grid;
			place-items:center;
			height: 100%;
			color: #5B21D5;
		}
		
		a span{
			display: none;
		}
		
		.active{
			transform: translateY(-20%);
			font-size: 45px;
			position: relative;
			transition: transform 0.3s cubic-bezier(0.125, 0.15, 0.25, 1.275); 
			color: coral;
		}
		
		.active span{
			display: block;
			font-size: 26px;
		}
		
		.control{
			background: var(--bg-nav);
			top: -40px;
			position: absolute;
			height: 90px;
			width: 90px;
			border-radius: 50%;
			left: calc(300px - 46px);
			transition: left 0.3s cubic-bezier(0.125, 0.15, 0.25, 1.275);
		}
	</style>
</head>

<body>
	<form method="post">
		<ul>
			<span class="control"></span>
			<li>
				<a href="Profile.php?id_user=<?php echo $_SESSION["user_id"] ?>">
					<i class="fa fa-id-card"></i>
					<span>Profile</span>
				</a>
			</li>
			<li>
				<a href="List.php?id_user=<?php echo $_SESSION["user_id"] ?>" class="active">
					<i class="fa fa-list"></i>
					<span>List of products</span>
				</a>
			</li>
			<li>
				<a href="Add_product.php?id_user=<?php echo $_SESSION["user_id"] ?>">
					<i class="fa fa-plus"></i>
					<span>Add products</span>
				</a>
			</li>
			<li>
				<a href="Log_out.php">
					<i class="fa fa-sign-out"></i>
					<span>Log out</span>
				</a>
			</li>
		</ul>
	</form>
	<script>
		let ul=document.querySelector('ul')
		ul.querySelectorAll('li a').forEach((a,i) => {
			a.onmouseover = (e) =>{
				ul.querySelector('li a.active').classList.remove('active')
				a.classList.add('active')
				let control=ul.querySelector('.control')
				control.style.left=`calc(${i * 200 + 100}px - 46px)`
			}				   
		});
	</script>
	
</body>
</html>