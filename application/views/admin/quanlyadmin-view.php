<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Danh sách Admin</title>
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
						<tr><th colspan="4">Bảng Quản Lý Admin</th></tr>
						<tr style="font-weight: bold;">
							<td>Name Login</td>
							<td>Full Name</td>
							<td>Chỉnh sửa</td>
							<td>Xóa</td>
						</tr>
						<?php
							foreach ($admin as $row) {
								echo '<tr>';
								echo '<td>'.$row['adminName'].'</td>';
								echo '<td>'.$row['name'].'</td>';
								echo '<td><a href="'.base_url().'index.php/adminproduct/adminEdit?idad='.$row['AD#'].'"><i class="fa fa-pencil-square-o"></i> Edit & View</a></td>';
								echo '<td><a href="'.base_url().'index.php/adminproduct/adminDelete?idad='.$row['AD#'].'"><i class="fa fa-times"></i> Delete</a></td>';
								echo '</tr>';							
							}						
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>