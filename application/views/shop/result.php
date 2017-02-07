<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Result</title>
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/reset.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap.min.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap-theme.min.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/font-awesome/css/font-awesome.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/style-shop.css" />
    <link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/coin-slider-styles.css"/>
    <link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/checkout.css"/>
    <link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/sweetalert/dist/sweetalert.css">

    <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>asset/js/coin-slider.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>asset/sweetalert/dist/sweetalert.min.js"></script>
	<style type="text/css">
	.car{
		font-size: 250px;
		color: #03AC9A;
		text-align: center;
	}
	.cap{
		color:#fff; font-size:22px; text-align: center; font-weight: bold;
	}
	body{
		background-image: url(../../asset/images/road.jpg);
	}
	.box{
		width: 100%; background-color: rgba(3,172,154,0.8); margin: auto;
		padding: 10px; padding-left: 200px; padding-right: 200px;
	}
	</style>
</head>
<body>
	<div class="car"><i class="fa fa-truck"></i></div>
	<div class="cap box">Cảm ơn quý khách đã mua hàng của chúng tôi. Sản phẩm sẽ được giao tới quý khách trong thời gian sớm nhất. Xin chân thành cảm ơn!</div>
	<script type="text/javascript">
		$(document).ready(function(){
			setTimeout(function(){window.location = "http://localhost/mtp";},3000);
		});
	</script>
</body>
</html>