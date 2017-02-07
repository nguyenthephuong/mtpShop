<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Customize-Product</title>
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/reset.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap.min.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap-theme.min.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/font-awesome/css/font-awesome.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/style-admin.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/style-form.css" />
    <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>asset/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>asset//ckeditor/sample.js"></script>
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
				<div class="form">
					<form method="post" action="<?php echo base_url()?>index.php/adminproduct/Upload" enctype="multipart/form-data">			
						<div class="title">Thêm sản phẩm mới</div>
						<label>Tên: </label><input type="text" placeholder="Tên sản phẩm" id="namep" name="namep"></br>
						<label>Giá: </label> <input type="text" placeholder="Giá sản phẩm" id="pricep" name="pricep"></br>
						<label>Hình ảnh: </label><input type="file" id="image" name="image"></br>
						<label>Thông tin chi tiết: </label></br><textarea id="description" name="description" class="ckeditor"></textarea></br>
						<label>Sản phẩm thuộc danh mục nào?: </label>
						<select name="selectp" class="select">
							<?php
								foreach ($catalog as $row) {
									if(!empty($row['parent#'])){
										foreach ($catalog as $row2) {
											if($row2['catalog#'] == $row['parent#'])
											echo '<option value="'.$row['catalog#'].'">' . $row['name'] ."(" . $row2['name'].")";
											echo '</option>';
										}										
									}else{
										echo '<option value="'.$row['catalog#'].'">' . $row['name'];
										echo '</option>';
									}						
								}							
							?>
						</select>
						</br>
						<button type="submit" class="sub">Submit</button>
					</from>
				</div>			
			</div>
		</div>
	</div>
</body>
</html>