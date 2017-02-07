<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div class="navbar-admin">
		<a href="<?php echo base_url()?>index.php/admin"><span style="margin-left:20px;">ADMIN PANEL</span></a>
		<ul class="avatar">
			<img src="<?php echo base_url()?>/asset/images/avatar.jpg" class="avatar-img"> <?php echo $admin['0']['name']?>
			<li>
				<img src="<?php echo base_url()?>/asset/images/avatar.jpg" class="avatar-img2">
				<div style="font-size: 16px;">MTPB-TEAM</div>
			</li>
			<a href="<?php echo base_url(); ?>index.php/admin/logout" class="sign-out"><li>Sign out</li></a>
		</ul>
	</div>
</body>
</html>