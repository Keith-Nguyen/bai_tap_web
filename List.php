<!DOCTYPE html>
<html>
<head>
<title>List of products</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
		
		th{
			color: crimson;
			font-size: 25px;
			padding: 5px 5px;
			text-align: center;
		}
		
		td{
			font-size: 20px;
			font-family: cursive;
		}
		
		#btnEdit, a{
			color: #000DFD;
			
		}
		
		#btnXoa{
			color: red;
		}
		
		.txtSearch{
			width: 400px;
			height: 40px;
			border-radius: 15px;
			margin-top: 20px;
			margin-bottom: 20px;
			font-size: 18px;
		}
		
		#contentSearch, hr{
			margin-top: 20px;
		}
		
		#txtNoti{
			position: fixed;
			top: 0;
			left: 0;
			bottom: 0;
			right: 0;
			margin-top: 12.5%;
			animation: animate ease .5s;
			
		}
		
		.modal-content{
			min-height: 200px;
			width: 600px;
		}
		
		@keyframes animate{
			from{
				opacity: 0;
				transform: translateY(-140px);
			}to{
				opacity: 1;
				transform: translateY(0px);
			}
		}
		
	</style>
<body>  
	<h2>Danh sách sản phẩm</h2>
	<input type="search" class="txtSearch" placeholder="Tìm kiếm sản phẩm">
	<table border="1" cellspacing="0" style="box-shadow: 5px 10px 18px #888888;width: 70%;z-index: 1;">
		<thead >
			<tr>
				<th>Số thứ tự</th>
				<th>Tên sản phẩm</th>
				<th>Đơn giá</th>
				<th>Chi tiết sản phẩm</th>
				<th>Sửa</th>
				<th>Xóa</th>
			</tr>
		</thead>
			<tbody>
			<?php 
			include_once "connect.php";
			$select=mysqli_query($con,"select * from sanpham");
			while($row=mysqli_fetch_array($select,MYSQLI_ASSOC)){

		?>
			<tr align="center">
				<td><p href="#" class="txtID" data-id="<?php echo $row["idsp"] ?>" title=""><?php echo $row['idsp'] ?></p></td>
				<td><?php echo $row['tensp'] ?></td>
				<td><?php echo $row['giasp'] ?>$</td>
				<td>
			<!-- <a href="Chitietsanpham.php?id_sp=<?php /*echo $row['idsp']<?php */?> ?>">-->
					<p class="txtDetail" style="font-size: 20px;text-decoration: underline;color: #4222C8;cursor: pointer" data-id="<?php echo $row['idsp'] ?>">Chi tiết</p>
			<!-- </a>-->
				</td>
				<td>
					<a href="Capnhatsanpham.php?id_sp=<?php echo $row['idsp'] ?>">
						<p class="fa fa-edit" id="btnEdit" name="btnEdit"></p>
					</a>							
				</td>
				<td>
					<a href="delete.php?id_sp=<?php echo $row['idsp'] ?>">
						<p name="btnXoa" id="btnXoa" class="fa fa-minus-circle"></p>
					</a>							
				</td>
			</tr>
			<?php 
			}
		?>
		</tbody>  
	</table>
	<hr width="80%;">
	<div id="contentSearch" style="z-index: 10;">
	</div>
	<script>  
		$(document).ready(function(){ 
			// Display hình ảnh khi hover 
			$('.txtID').tooltip({
				classes:{ "ui-tooltip": "highlight"},
				position:{my:'left center', at:'right center'},
				content:function(result){
					$.post('image.php',
							{id: $(this).data('id')},
						   	function(data){
								result(data);
							}
					);
				}
			});
			// Display chi tiết sản phẩm 
			$('.txtDetail').click(function(){
				var ma=$(this).data('id');
				$.ajax({
					type:'POST',
					data:{id: ma},
					url:'product_detail.php',
					success:function(data){
						$('#content').html(data);
						$('#txtNoti').modal('show');
					}
				});
			});
			// Search
			$('.txtSearch').keyup(function(){
				var text= $('.txtSearch').val();
				if(text==''|| text==null){
					$('#contentSearch').html('');
				}
				else{
					$.ajax({
						type:'POST',
						data:{search: text},
						url:'search.php',
						success:function(data){
							$('#contentSearch').html(data);
						}
					});
				}
			});
		});  
	</script>
<!--	Display chi tiết sản phẩm -->
	<div class="modal fade" id="txtNoti" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" align="center" style="font-weight: bold; vertical-align: middle;">Chi tiết sản phẩm</h3>
					<button type="button" class="close" data-dismiss="modal">X</button>
                </div>
                <div class="modal-body" id="content"></div>
            </div>
         </div>
     </div>
</body>  
</html> 