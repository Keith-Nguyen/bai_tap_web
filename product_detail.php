<?php 

	include_once "connect.php";
	if(isset($_POST['id'])){
		$id= $_POST['id'];
		$select = mysqli_query($con,"select * from sanpham where idsp=$id");
		while($row=mysqli_fetch_array($select)){

?>
	<table width="100%">
		<tr>
			<td><img src="<?php echo $row['hinhanhsp'] ?>" width="170" height="100"></td>
			<td>
				<p style="margin-left: 30px;"><?php echo $row['tensp'] ?></p>
				<p style="margin-left: 30px;"><?php echo $row['giasp'] ?>$</p>
				<p style="margin-left: 30px;"><?php echo $row['chitietsp'] ?></p>
			</td>
		</tr>
	</table>
<?php
		}
	}		
	
?>