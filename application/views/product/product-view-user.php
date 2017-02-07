<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $product['0']['name']?></title>
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/reset.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap.min.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap-theme.min.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/font-awesome/css/font-awesome.css" />
	<link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/style-shop.css" />
    <link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/style-product.css"/>
    <link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/sweetalert/dist/sweetalert.css">
    <link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/status-style.css">
    
    <script type="text/javascript" src="<?php echo base_url() ?>asset/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<?php include 'navbar-user.php'; ?>
	<div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-3">
                <a href="<?php echo base_url() ?>index.php/shop">
                    <img src="<?php echo base_url() ?>asset/images/logo.jpg" style="margin-bottom:10px; margin-left: 26px;">
                </a>
            </div>

            <div class="col-xs-12 col-sm-9 col-md-9 hidden-xs">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="box1">
                        <i class="fa fa-facebook-square"></i> Facebook
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="box2">
                        <i class="fa fa-clock-o"></i> Mở cửa<br>
                        <span style="font-size: 18px;">9h30 - 21h30</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="box3">
                        <i class="fa fa-phone-square"></i> Hotline<br>
                        <span style="font-size: 18px;">0912345678</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Khau hieu -->
    <div style="background:#03AC9A; width:100%; border-top:solid 1px #0D97D0; border-bottom:solid 1px #0D97D0; padding:5px;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <a href="#" style="text-decoration: none;"><span class="khauhieu"><i class="fa fa-cc-visa"></i> thanh toán linh hoạt </span></a>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <a href="#" style="text-decoration: none;"><span class="khauhieu"><i class="fa fa-mail-reply-all"></i> đổi trả dễ dàng </span></a>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <a href="#" style="text-decoration: none;"><span class="khauhieu"><i class="fa fa-truck"></i> giao hàng miễn phí </span></a>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <a href="#" style="text-decoration: none;"><span class="khauhieu"><i class="fa fa-shopping-cart"></i> uy tín-chất lượng </span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Khau hieu -->

    <div class="container">
        <div class="row">
        	<!--sidebar-->
            <div class="col-xs-12 col-sm-3 col-md-3" style="color: #fff;">                
                <div class="panel-dark">Danh mục sản phẩm</div>
                <div class="panel-dark-body panel-bg">
                    <ul class="menu-watch">
                        <?php 
                        foreach ($catalog as $row){
                            if($row['parent#'] == null){
                                echo '<li><a href ="#"><i class="fa fa-caret-right"></i> '. $row['name'] .'</a><ul>';
                                foreach ($catalog as $row2){
                                    if($row2['parent#'] == $row['catalog#'])
                                        echo '<li>'. $row2['name'].'</li>';
                                }                                
                                echo '</ul>';              
                                echo '</li>';
                            }                                                                       
                        }
                        ?>
                    </ul>
               	</div>
                
                <div class="panel-news hidden-xs"><i class="fa fa-list"></i> HỖ TRỢ TRỰC TUYẾN</div>
                <div class="panel-news-body hidden-xs">
                    <div style="margin-bottom: 20px;">
                        <a href="#"><img src="<?php echo base_url() ?>asset/images/yahoo-on.png"></a>
                    </div>
                    <div>
                        <a href="#"><img src="<?php echo base_url() ?>asset/images/skype-on.png"></a>
                    </div>
                </div>

                <div class="panel-news hidden-xs"><i class="fa fa-list"></i> TIN TỨC</div>
                <div class="panel-news-body hidden-xs">
                    <?php
                    for($i=0; $i<5; $i++){
                        echo '<div class="list-group">';
                        echo '<a href="#" class="list-group-item">';
                        echo '<h4 class="list-group-item-heading"><i class="fa  fa-thumb-tack fa-fw"></i>News time one</h4>';
                        echo '<p class="list-group-item-text">Wrap buttons or secondary text in 
                        .panel-footer. Note that panel footers do not inherit colors and borders..
                        </p>';
                        echo '</a>';
                        echo '</div>';
                    }                  
                    ?>
                </div>
            </div>
            <!--/sidebar-->

            <!--main-->
            <div class="col-xs-12 col-sm-9 col-md-9" style="color: #fff;">
                <div class= "product-view">
                	<div class="col-sx-12 col-sm-7 col-md-7">
                		<img src="<?php echo $product['0']['images']?>" class="product-img">
                	</div>

                	<div class="col-sx-12 col-sm-5 col-md-5" style="color:#000;">
                        <div>
                            <?php
                                echo '<div class="name">'.$product[0]['name'].'</div>';
                                echo '<div class="price2">'.number_format($product[0]['price']).' VNĐ</div>';
                                echo '<h3 style="color:#10E22D;">Thông tin sản phẩm</h3>';
                                echo '<div class="des">'.$product[0]['description'].'</div>';
                            ?>
                        </div>
                        <a class="add" href="<?php echo base_url().'index.php/cart/add?idp='.$product[0]['product#'].'&name='.trim($product[0]['name']).'&price='.$product[0]['price'];?>"><button class="add-to-cart add" id="add">Đặt Hàng</button></a>
                    </div>
            	</div>
            </div>
            <!--/main-->
            <!--status-->
            <?php
                if(count($this->cart->contents())>0){
                    echo '<a href="'.base_url().'index.php/cart"><ul class="status hidden-xs">';
                    echo '<i class="fa fa-cart-arrow-down"></i>';
                    echo '<li>Vào giỏ hàng</li>';
                    echo '</ul></a>';
                }
            ?>   
            <!--/status-->
        </div>
    </div>

	<?php include 'footer.php'; ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('a.add').click(function (argument) {
                var url = $(this).attr('href');
                swal({
                    title:"Bạn đã thêm sản phẩm vào giỏ hàng!", 
                    text: "Vui lòng vào giỏ hàng của bạn để tiếp tục thanh toán.", 
                    type: "success",
                    closeOnConfirm: false},
                    function() {
                        //alert(url);
                        window.location = url;
                    });
                return false;
            });
        });
    </script>
</body>
</html>