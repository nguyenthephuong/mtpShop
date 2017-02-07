<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Transacion-Manager</title>
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/reset.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap.min.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap-theme.min.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/font-awesome/css/font-awesome.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/style-admin.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/style-product-view.css" />
    <link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/sweetalert/dist/sweetalert.css">
    <link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/style-form.css" />
    
    <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>asset/sweetalert/dist/sweetalert.min.js"></script>
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/style-user-view.css" />
	
	<style type="text/css">
		.search{
			height:40px;width:40px;font-size:18px;border:none;background-color: #12B1E5;color: #fff; transition: 0.3s;
		}
		.search:hover{background-color:#3ABAFD; }
		.searchi{
			height: 39px; width:250px; padding: 5px; margin:10px;
		}
	</style>
</head>
<body style="background-color: #fff;">
	<?php include 'navbar-admin.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="wrap-table" style="margin-left:50px;">
					<table border="1">
						<tr><th colspan="11">Bảng Quản Lý Đơn Hàng</th></tr>
						<tr style="font-weight: bold;">
							<td>Mã ĐH</td>
							<td>Trạng Thái</td>
							<td>Tên Khách Hàng</td>
							<td>Email</td>
							<td>Điện Thoại</td>
							<td>Địa Chỉ</td>
							<td>Thành Tiền(VNĐ)</td>
							<td>Ghi chú</td>
							<td>Ngày Khởi Tạo</td>
							<td>Chỉnh sửa</td>
							<td>Xóa</td>
						</tr>
						<?php 
							foreach ($trans as $row) {							
								echo '<tr>';
								echo '<td>'.$row['transaction#'].'</td>';
								if($row['status'] == 0){
									echo '<td>Chưa xong</td>';
								}else{
									echo '<td>Đã xong</td>';
								}
								echo '<td>'.$row['fullname'].'</td>';
								echo '<td>'.$row['email'].'</td>';
								echo '<td>'.$row['phone'].'</td>';
								echo '<td>'.$row['address'].'</td>';
								echo '<td>'.number_format($row['amount']).'</td>';
								echo '<td>'.$row['message'].'</td>';
								echo '<td>'.$row['created'].'</td>';
								echo '<td><a href="'.base_url().'index.php/adminproduct/transEdit?idtrans='.$row['transaction#'].'"><i class="fa fa-pencil-square-o"></i> Edit</a></td>';
								echo '<td><a href="'.base_url().'index.php/adminproduct/transDelete?idtrans='.$row['transaction#'].'"><i class="fa fa-times"></i> Delete</a></td>';
								echo '</tr>';							
							}						
						?>
						<tr>
							<td colspan="11">
								<input type="text" name="trans" class="searchi" id="trans" placeholder="Tìm kiếm theo mã đơn hàng">
								<button class="search"><i class="fa fa-search"></i></button>
							</td>
							<script type="text/javascript">
								$(document).ready(function(){
									$("button.search").click(function(){
										trans = $("input#trans").val();
										if(trans == ""){
											swal("Vui lòng nhập đúng mã đơn hàng!");
										}else{
											url = "http://localhost/mtp/index.php/adminproduct/transSearch?idtrans="+trans;
											window.location = url;
										}										
									});
								});
							</script>
						</tr>
					</table>
					<div style="clear: left;">
                        	<?php echo $this->pagination->create_links(); ?>
                    </div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="sidebar">
					<?php include "sidebar.php"; ?>
				</div>		
			</div>
		</div>
	</div>
</body>
</html>