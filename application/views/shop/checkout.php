<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Checkout</title>
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
</head>
<body>
	<?php include 'navbar-user.php';?>
	<div class="container">
		<div class="row">
			<?php echo form_open(base_url().'index.php/checkout/creTrans?amount='.$amount); ?>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h3 class="title">THÔNG TIN KHÁCH HÀNG</h3>
						<input type="text" name="fullname" class="input" placeholder="Họ và tên người nhận"></br>
						<div class="err"><?php echo form_error('fullname'); ?></div>
						<input type="text" name="phone" class="input" placeholder="Số điện thoại"></br>
						<div class="err"><?php echo form_error('phone'); ?></div>
						<input type="text" name="email" class="input" placeholder="Email"></br>
						<div class="err"><?php echo form_error('email'); ?></div>
						<input type="text" name="address" class="input" placeholder="Địa chỉ nhận hàng"></br>
						<div class="err"><?php echo form_error('address'); ?></div>
						<textarea class="input" name="mess" placeholder="Ghi chú" style="height: 60px;"></textarea>
				</div>

				<div class="col-xs-12 col-sm-4 col-md-4">
					<h3 class="title">THÔNG TIN THANH TOÁN</h3>
					<h4 style="margin-top:38px;"><i class="fa fa-check-circle" style="color:#0EC2DD;"></i> Thanh toán khi giao hàng.</h4>
					<h4 style="margin-top:38px;"><i class="fa fa-check-circle" style="color:#0EC2DD;"></i> Free ship trong nội thành Hà Nội.</h4>
					<h4 style="margin-top:38px;"><i class="fa fa-check-circle" style="color:#0EC2DD;"></i> Được đổi trả khi sản phẩm không đúng yêu cầu.</h4>
				</div>

				<div class="col-xs-12 col-sm-4 col-md-4">
					<h3 class="title">ĐẶT HÀNG</h3>
					<h4 style="margin-top:38px;"><i class="fa fa-money" style="color:#0EC2DD;"></i> Tổng số tiền phải trả:</h4>
					<div style="margin-left:25px; font-size: 18px; color: #F6557B;"><?php echo number_format($amount);?> VNĐ</div>
					<input type="submit" value="Gửi Đơn Hàng" class="submit">
				</div>
			</form>
		</div>
	</div>
</body>
</html>