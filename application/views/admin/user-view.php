<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Danh sách users</title>
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/reset.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap.min.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap-theme.min.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/font-awesome/css/font-awesome.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/style-admin.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/style-product-view.css" />
    <link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/sweetalert/dist/sweetalert.css">
    <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>asset/sweetalert/dist/sweetalert.min.js"></script>
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
			<div class="col-xs-12 col-sm-3 col-md-3">
				<div class="sidebar">
					<?php include "sidebar.php"; ?>
				</div>		
			</div>
			<div class="col-xs-12 col-sm-9 col-md-9">
				<div class="wrap-table">
					<table border="1">
						<tr><th colspan="4">Bảng Quản Lý Thành Viên</th></tr>
						<?php 
							foreach ($user as $row) {							
								echo '<tr>';
								echo '<td>'.$row['name'].'</td>';
								echo '<td>'.$row['email'].'</td>';
								echo '<td><a href="'.base_url().'index.php/adminproduct/userEdit?idu='.$row['user#'].'"><i class="fa fa-pencil-square-o"></i> Edit & View</a></td>';
								echo '<td><a href="'.base_url().'index.php/adminproduct/userDelete?idu='.$row['user#'].'"><i class="fa fa-times"></i> Delete</a></td>';
								echo '</tr>';							
							}						
						?>
						<tr>
							<td colspan="4">
								<input type="text" name="email" class="searchi" id="email" placeholder="Tìm kiếm theo email đăng ký">
								<button class="search"><i class="fa fa-search"></i></button>
							</td>
							<script type="text/javascript">
								$(document).ready(function(){
									$("button.search").click(function(){
										email = $("input#email").val();
										if(email == ""){
											swal("Vui lòng nhập đúng tên email của người dùng!");
										}else{
											url = "http://localhost/mtp/index.php/adminproduct/userSearch?email="+email;
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
		</div>
	</div>
</body>
</html>