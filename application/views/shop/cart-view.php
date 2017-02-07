<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My Cart</title>
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
                <span style="color:#F99A12; font-weight: bold;">GIỎ HÀNG CỦA BẠN</span>
            </h2>
            <table>
                <th>STT</th>
                <th>Ảnh Sản Phẩm</th>
                <th>Size</th>
                <th>Giá(VNĐ)</th>
                <th>Số Lượng</th>
                <th>Tổng Giá Trị</th>
                <th>Xóa</th>
                    <?php
                    $i = 1;
                    $size = array('S'=>'S',"M"=>'M','L'=>'L','XL'=>'XL','XXL'=>'XXL');
                    foreach ($cart as $item) {
                        echo '<tr><td>'.$i;                  
                        echo '</td>';

                        echo '<td><img width="60" src="'.$img[$i-1][0]['images'].'">';
                        echo '</td>';

                        echo '<td><select name="select'.$i.'">';
                        echo '<option value="0">No size</option>';
                        foreach ($size as $key => $value) {
                            if($value == $item['options']['size']){
                                echo '<option value = "'.$value.'" selected="selected">'.$value.'</option>';
                            }else
                                echo '<option value = "'.$value.'">'.$value.'</option>';
                        }
                        echo '</select></td>';

                        echo '<td>'.number_format($item['price']);
                        echo '</td>';

                        echo '<td><input type="text" name="'.$i.'" id="qty" value="'.$item['qty'].'">';
                        echo '</input></td>';

                        echo '<td>'.number_format($item['subtotal']);
                        echo '</td>';

                        echo '<td><a href="http://localhost/mtp/index.php/cart/remove?idp='.$item['id'].'"><i class="fa fa-times" style="color:#000;"></i>';
                        echo '</a></td></tr>';
                        $i = $i +1;
                    }
                    ?>
                <tr>
                    <td colspan="3">
                        <div class="sum">
                            <span>Tổng số tiền: <?php echo number_format($sum);?> VNĐ</span>
                        </div>
                    </td>
                    <td colspan="4">
                        <div>
                            <a href="http://localhost/mtp/index.php"><div class="cart-control">Quay lại cửa hàng</div></a>
                            <input type="submit" id="udqty" value="Cập nhật thông tin" class="submit cart-control">
                            <a href="http://localhost/mtp/index.php/cart/destroy"><div class="cart-control">Xóa toàn bộ giỏ hàng</div></a>
                            <a href="http://localhost/mtp/index.php/checkout?amount=<?php echo $sum?>"><div class="cart-control">Thanh toán ngay</div></a>
                        </div>
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>