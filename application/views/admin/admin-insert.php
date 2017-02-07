<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Insert-Admin</title>
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
    <style type="text/css">
	.err{
		margin-left: 10px;
		color:red;
		margin-bottom: 0px; padding: 0px;
	}
	.input{
		width: 300px; height: 40px;
	}
	.submit{
		width: 300px; height: 40px;
		border:none; background-color: #159BE8; color:#fff; font-size: 20px;
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
				<div class="form" style="text-align: center;">
					<?php echo form_open(base_url().'index.php/adminproduct/adminInsert');?>
						<input type="text" name="nameLogin" placeholder="Tên đăng nhập" class="input">
						<div class="err"><?php echo form_error('nameLogin'); ?></div>
						<input type="text" name="pass" placeholder="Mật khẩu" class="input">
						<div class="err"><?php echo form_error('pass'); ?></div>
						<input type="text" name="fullname" placeholder="Họ tên đầy đủ" class="input">
						<div class="err"><?php echo form_error('fullname'); ?></div>
						<input type="submit" value="Tạo tài khoản mới"  class="submit">
					</from>
				</div>			
			</div>
		</div>
	</div>
</body>
</html>