<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/css/sidebar.css" />
    <script type="text/javascript" src="<?php echo base_url() ?>asset/js/ddsmoothmenu.js"></script>
    <script type="text/javascript">

  ddsmoothmenu.init({
    mainmenuid: "smoothmenu1", //menu DIV id
    orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
    classname: 'ddsmoothmenu', //class added to menu's outer DIV
    //customtheme: ["#1c5a80", "#18374a"],
    contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
  })

  ddsmoothmenu.init({
    mainmenuid: "smoothmenu2", //Menu DIV id
    orientation: 'v', //Horizontal or vertical menu: Set to "h" or "v"
    classname: 'ddsmoothmenu-v', //class added to menu's outer DIV
    method: 'toggle', // set to 'hover' (default) or 'toggle'
    arrowswap: true, // enable rollover effect on menu arrow images?
    //customtheme: ["#804000", "#482400"],
    contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
  })

  </script>
</head>
<body>
    <div id="smoothmenu2" class="ddsmoothmenu-v">
    <ul>
        <?php
            foreach ($catalog as $row){
                 if($row['parent#'] == null){
                    echo '<li><a href ="'.base_url().'index.php/catalog/index?id='.$row['catalog#'].'">';
                    echo $row['name'];
                    foreach ($catalog as $row2){
                        if($row2['parent#'] == $row['catalog#']){
                            echo '<i class="fa fa-caret-right" style="position: absolute; right:10px; font-size:20px;"></i></a>';
                            break;
                        }
                    }
                    echo '<ul>';
                    foreach ($catalog as $row2){
                        if($row2['parent#'] == $row['catalog#']){
                            echo '<li><a href="'.base_url().'index.php/catalog/index?id='.$row2['catalog#'].'">'. $row2['name'];
                            echo '</a></li>';
                        }
                    }                                
                    echo '</ul>';              
                    echo '</li>';
                }                                                                       
            }
        ?>
    </ul>
</div>
</body>
</html>
