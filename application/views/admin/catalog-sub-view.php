<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Catalog-View</title>
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/reset.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap.min.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap-theme.min.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/font-awesome/css/font-awesome.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/style-admin.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/style-product-view.css" />
    <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/bootstrap.min.js"></script>
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
						<tr><th colspan="3">Bảng Quản Lý</th></tr>
						<?php 
							foreach ($catalog as $row) {
								echo '<tr>';
								echo '<td><a href="'.base_url().'index.php/adminproduct/showp?idc='.$row['catalog#'].'">'.$row['name'].'</a></td>';
								echo '<td><a href="'.base_url().'index.php/adminproduct/catalogEdit"><i class="fa fa-pencil-square-o"></i> Edit</a></td>';
								echo '<td><a href="'.base_url().'index.php/adminproduct/catalogDelete?idc='.$row['catalog#'].'&pidc='.$idc.'"><i class="fa fa-times"></i> Delete</a></td>';
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