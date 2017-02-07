<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Infomation</title>
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/reset.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap.min.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap-theme.min.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/font-awesome/css/font-awesome.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/style-info.css" />
	<link href='<?php echo base_url() ?>asset/font/Pacifico.ttf' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="header">
		<a href="http://localhost/mtp"><span style="border-right:1px solid #fff; padding-right: 8px;color:#fff;">MTP</span></a>
		Cập nhật thông tin cá nhân
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-3 col-md-3"></div>
			<div class="col-xs-12 col-sm-6 col-md-6">
				<div class="box-form">
					<div class="head-box">MTP SHOP</div>				
					<?php echo form_open(base_url().'index.php/users/infoUser'); ?>					
						<div class="lbl">Họ tên</div><input type="text" name="fname" class="input" value="<?php echo $name?>"><br>
						<div class="err"><?php echo form_error('fname'); ?></div>
						<div class="lbl">Số điện thoại</div><input type="text" name="fphone" class="input" value="<?php echo $phone?>"><br>
						<div class="err"><?php echo form_error('fphone'); ?></div>
						<div class="lbl">Địa chỉ</div><input type="text" name="faddress" class="input" value="<?php echo $address?>"><br>							
						<div class="err"><?php echo form_error('faddress'); ?></div>
						<div style="height:2px; width: 95%; background-color:#fff; margin-left:10px; margin-top:20px;"></div>
						<input type="submit" class="input submit" value="Lưu">		
					</form>				
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-3"></div>
		</div>
	</div>
</body>
</html>