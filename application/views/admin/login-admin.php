
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>MTP-ADMIN-LOGIN</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/style-login-admin.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/font-awesome/css/font-awesome.css" />
	<script src="<?php echo base_url() ?>asset/js/jquery-1.11.2.min.js"></script>

</head>
<body>
	<div class="navbar-admin">
		<span style="margin-left:20px;">ADMIN PANEL</span>
	</div>
	<div class="login-form">
		<?php echo form_open(base_url().'index.php/admin/login'); ?>	
			<i class="fa fa-user" style="margin-left:28px; margin-top:20px; margin-bottom:5px;"></i></br>
			<input type="text" name='fadmin' placeholder="UserName" class='input' id='fname'></br>
			<div class="err"><?php echo form_error('fadmin'); ?></div>
			<i class="fa fa-unlock-alt" style="margin-left:28px; margin-top:15px;"></i></br>
			<input type="password" name='fpass' placeholder='PassWord' class="input" id='fpass'></br>
			<div class="err"><?php echo form_error('fpass'); ?></div>
			<input type="submit" value="LOGIN" class='submit'>
		</form>
	</div>
	<div class="caption">MTPB SHOP. Copyright &copy; 2015 by MTPB-TEAM</div>

</body>
</html>