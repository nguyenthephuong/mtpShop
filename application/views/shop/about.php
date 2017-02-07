<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>About</title>
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/reset.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap.min.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap-theme.min.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/font-awesome/css/font-awesome.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/style-shop.css" />
  <link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/style-product.css"/>
  <link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/about.css"/>
  <link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/animate.css"/>
  <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/jquery-1.11.2.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>asset/js/WoW.js"></script>
  <script>
    new WOW().init();
  </script>
</head>
<body>
	<?php 
    if(!empty($email)){
        include 'navbar-user.php';
    }else{
        include 'navbar.php';
    }
  ?>
  <div class="banner">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <!-- <div class="team wow fadeInRight">MTP-TEAM</div> -->
          <img class="logo wow fadeInRight" src="<?php echo base_url()?>asset/images/mtpb.png">
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="caption wow fadeInRight">"Làm việc hết mình. Không ngừng sáng tạo và học hỏi để tạo ra những điểu mới mẻ trong cuộc sống. :v"</div>
        </div>
      </div>
    </div>
  </div>
	<div class="container">
  		<div class="row">
  			<div class="col-xs-12 col-sm-6 col-md-6">
  				<div style="margin-top:100px; text-align: center;" class="wow zoomIn">
  					<img src="<?php echo base_url()?>/asset/images/TNHP.jpg" class="tnhp">
  				</div>

  				<div style="text-align: center;" class="wow zoomIn">
  					<img src="<?php echo base_url()?>/asset/images/Tu.jpg" class="tnhp">
  				</div>

  				<div style="text-align: center;" class="wow zoomIn">
  					<img src="<?php echo base_url()?>/asset/images/Minh.jpg" class="tnhp">
  				</div>

  				<div style="text-align: center;" class="wow zoomIn">
  					<img src="<?php echo base_url()?>/asset/images/avatar.jpg" class="tnhp">
  				</div>

  				<div style="text-align: center;" class="wow zoomIn">
  					<img src="<?php echo base_url()?>/asset/images/Bach.jpg" class="tnhp">
  				</div>
  			</div>
  			<div class="col-xs-12 col-sm-6 col-md-6">

  				<div class="description wow fadeInRight" style="margin-top:100px;">
  					<div class="name">Nguyễn Hồng Phương</div>
  					<div class="info">
  						<div>Thông tin cá nhân</div>
  						<ul>
  							<li>Giảng Viên Hướng Dẫn</li>
  							<li>MSc, Lecturer, Department of Information Systems
							School of Information and Communication Technology 
							Hanoi University of Science and Technology </li>
  							<li>Email: phuongnh@soict.hust.edu.vn</li>
  							<li>Giới thiệt bản thân: Like a Boss</li>
  						</ul>
  					</div>
  				</div>

  				<div class="description wow fadeInRight">
  					<div class="name">Đoàn Anh Tú</div>
  					<div class="info">
  						<div>Thông tin cá nhân</div>
  						<ul>
  							<li>MSSV: 20134474</li>
  							<li>Lớp: Việt Nhật C-K58</li>
  							<li>Giới thiệt bản thân: Không thấy anh đang đọc truyện à? Đi chỗ khác chơi. -_-</li>
  						</ul>
  					</div>
  				</div>

  				<div class="description wow fadeInRight">
  					<div class="name">Vũ Quang Minh</div>
  					<div class="info">
  						<div>Thông tin cá nhân</div>
  						<ul>
  							<li>MSSV: 20132623</li>
  							<li>Lớp: Việt Nhật C-K58</li>
  							<li>Giới thiệt bản thân: Yêu màu tím, sống nội tâm, thích màu hồng và chơi búp bê <3.</li>
  						</ul>
  					</div>
  				</div>

  				<div class="description wow fadeInRight">
  					<div class="name">Nguyễn Thế Phương</div>
  					<div class="info">
  						<div>Thông tin cá nhân</div>
  						<ul>
  							<li>MSSV: 20134474</li>
  							<li>Lớp: Việt Nhật C-K58</li>
  							<li>Giới thiệt bản thân: NOT FOUND!!!</li>
  						</ul>
  					</div>
  				</div>

  				<div class="description wow fadeInRight">
  					<div class="name">Thân Việt Bách</div>
  					<div class="info">
  						<div>Thông tin cá nhân</div>
  						<ul>
  							<li>MSSV: 20134474</li>
  							<li>Lớp: Việt Nhật C-K58</li>
  							<li>Giới thiệt bản thân: NOT FOUND!!!</li>
  						</ul>
  					</div>
  				</div>

  			</div>
  		</div>
	</div>
</body>
</html>