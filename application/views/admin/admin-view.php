
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>MTP-ADMIN</title>
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/reset.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap.min.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap-theme.min.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/font-awesome/css/font-awesome.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/style-admin.css" />

    <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<?php include 'navbar-admin.php'; ?>

	<div class="wrap">
		<div class="welcome"><i class="fa fa-table"></i></div>
		<a href="<?php echo base_url()?>index.php/adminproduct/showu"><div class="tiles tiles1">
			<span style="font-size:50px;"><i class="fa fa-user"></i></span><br>
			<span style="font-size:20px;">USERS</span>
		</div></a>
		<a href="http://localhost/mtp/index.php/adminproduct/showtrans"><div class="tiles tiles2">
			<span style="font-size:50px;"><i class="fa fa-cart-arrow-down"></i></span><br>
			<span style="font-size:20px;">CARTS</span>
		</div></a>
		<a href=""><div class="tiles tiles3">
			<span style="font-size:50px;"><i class="fa fa-street-view"></i></span><br>
			<span style="font-size:20px;">VIEW</span>
		</div></a>
		<a href="<?php echo base_url()?>index.php/shop"><div class="tiles tiles4">
			<span style="font-size:50px;"><i class="fa fa-home"></i></span><br>
			<span style="font-size:20px;">MY SHOP</span>
		</div></a>
		<a href="http://localhost/mtp/index.php/adminproduct/showc"><div class="tiles tiles5">
			<span style="font-size:50px;"><i class="fa fa-list-ul"></i></span><br>
			<span style="font-size:20px;">CATALOG</span>
		</div></a>
		<a href="http://localhost/mtp/index.php/adminproduct"><div class="tiles tiles6">
			<span style="font-size:50px;"><i class="fa fa-star"></i></span><br>
			<span style="font-size:20px;">PRODUCTS</span>
		</div></a>
		<a href=""><div class="tiles tiles7">
			<span style="font-size:50px;"><i class="fa fa-newspaper-o"></i></span><br>
			<span style="font-size:20px;">NEWS</span>
		</div></a>
		<a href=""><div class="tiles tiles8">
			
		</div></a>
	</div>
</body>
</html>