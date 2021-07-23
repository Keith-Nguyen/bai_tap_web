<?php

	include_once "connect.php";
	if(isset($_POST['search'])){
		$select = mysqli_query($con,"select * from sanpham where tensp LIKE '%{$_POST['search']}%'");
		while($row= mysqli_fetch_array($select,MYSQLI_ASSOC)){
?>

	<table>
		<tr>
			<td style="padding: 5px;"><img src="<?php echo $row['hinhanhsp'] ?>" width="150" height="100"></td>
			<td style="padding: 5px;">
				<p style="margin-left: 30px;"><?php echo $row['tensp'] ?></p>
			</td>
		</tr>
	</table>

<?php
		}
	}
?>