<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Catalog-Insert</title>
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/reset.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap.min.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap-theme.min.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/font-awesome/css/font-awesome.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/style-admin.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/style-catalog-ins.css" />
    
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
				<form method="post" action="<?php echo base_url()?>index.php/adminproduct/catalogInsert">
					<div class="form">
						<input type="text" name="catalogname" placeholder="Tên danh mục" class="input">
						<select name="selectcatalog">
							<option value="0">Không thuộc danh mục nào</option>}
							option
							<?php
								foreach ($catalog as $row) {
									if(empty($row['parent#']) || $row['parent#'] == 0){
										echo '<option value="'.$row['catalog#'].'">Thuộc danh mục ' . $row['name'];
										echo '</option>';												
									}					
								}		
							?>
						</select>
						</br><input type="submit" value="Thêm danh mục" class="submit">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>