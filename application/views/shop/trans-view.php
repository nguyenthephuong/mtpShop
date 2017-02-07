<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lịch sử mua hàng</title>
    <link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/reset.css" />
    <link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap.min.css" />
    <link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap-theme.min.css" />
    <link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/font-awesome/css/font-awesome.css" />
    <link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/style-shop.css" />
    <link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/coin-slider-styles.css"/>
    <link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/style-product.css"/>
    <link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/sweetalert/dist/sweetalert.css">
    <link type ="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/cart.css" />

    <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>asset/js/coin-slider.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>asset/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
    <?php include 'navbar-user.php';?>
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
    <!--gio hang -->
    <div class="container">
        <div class="row">
            <form method="post" action="<?php echo base_url()?>index.php/cart/update_qty_size">
            <h2 style="margin-top:100px;">
                <a href="http://localhost/mtp/index.php"><span style="color:#03AC9A;"><i class="fa fa-home"></i> </span></a>
                <span><i class="fa fa-angle-double-right"></i></span>
                <span style="color:#F99A12; font-weight: bold;">Lịch sử mua hàng của bạn</span>
            </h2>
            <table>
                <tr>
                    <th>STT</th>
                    <th>Người nhận</th>                 
                    <th>Tổng tiền</th>
                    <th>Ngày mua</th>
                    <th>Trạng thái</th>
                </tr>
                <?php
                    $i = 1;
                    foreach ($trans as $item) {
                        echo '<tr>';
                        echo '<td>'.$i.'</td>';
                        echo '<td>'.$item['fullname'].'</td>';
                        echo '<td>'.number_format($item['amount']).' VNĐ</td>';
                        echo '<td>'.$item['created'].'</td>';
                        if($item['status'] == 1)
                            echo '<td>Đã xong</td>';
                        else
                            echo '<td>Chưa xong</td>';
                        echo '</tr>';
                        $i = $i+1;
                    }
                ?>
            </table>
            <div style="clear: left;">
                <?php echo $this->pagination->create_links(); ?>
            </div>
            </form>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>