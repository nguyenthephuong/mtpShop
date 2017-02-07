<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Register</title>
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/reset.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap.min.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap-theme.min.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/font-awesome/css/font-awesome.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/style-register.css" />
	<link href='<?php echo base_url() ?>asset/font/Pacifico.ttf' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/bootstrap.min.js"></script>
	<style type="text/css">
	.input2{
		height: 40px;
		margin-top: 40px;
	}
	</style>
</head>
<body>
	<div class="header">Đổi Mật Khẩu</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-3 col-md-3"></div>
			<div class="col-xs-12 col-sm-6 col-md-6">
				<div class="box-form">
					<?php echo form_open(base_url().'index.php/users/changePass'); ?>
						<div class="head-box">MTP SHOP</div>
						<input type="password" name="cpass" placeholder="Mật khẩu hiện tại" class="input input2"><br>
						<div class="err"><?php echo form_error('cpass'); ?></div>
						<input type="password" name="npass" placeholder="Mật khấu mới" class="input input2"><br>
						<div class="err"><?php echo form_error('npass'); ?></div>
						<input type="submit" class="input submit input2" value="Cập Nhật">				
					</form>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-3"></div>
		</div>
	</div>
</body>
</html>