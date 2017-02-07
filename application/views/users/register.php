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
</head>
<body>
	<div class="header">
		<a href="http://localhost/mtp"><span style="border-right:1px solid #fff; padding-right: 8px;color:#fff;">MTP</span></a>
		Đăng Ký
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-3 col-md-3"></div>
			<div class="col-xs-12 col-sm-6 col-md-6">
				<div class="box-form">
					<?php echo form_open(base_url().'index.php/users/register'); ?> 
						<div class="head-box">MTP SHOP</div>
						<input type="text" name="fname" placeholder="Họ Tên" class="input"><br>
						<div class="err"><?php echo form_error('fname'); ?></div>
						<input type="text" name="femail" placeholder="Email" class="input"><br>
						<div class="err"><?php echo form_error('femail'); ?></div>
						<input type="password" name="fpass" placeholder="Mật Khẩu" class="input"><br>
						<div class="err"><?php echo form_error('fpass'); ?></div>
						<input type="password" name="fpasscf" placeholder="Xác nhận lại mật khẩu" class="input"><br>
						<div class="err"><?php echo form_error('fpasscf'); ?></div>
						<div class="err"><?php echo $error; ?></div>
						<p style="margin-top:20px; margin-left: 10px;">
							Bằng việc click vào nút Đăng ký bạn đã đồng ý 
							<a href="#" style="font-weight: bold;">Điều khoản sử dụng</a>
						</p>
						<input type="submit" class="input submit" value="Đăng Ký">					
					</form>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-3"></div>
		</div>
	</div>
</body>
</html>