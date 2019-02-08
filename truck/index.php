<?php include_once 'header.php';?>
<?php include_once 'header_menu.php';?>
<?php include_once 'menu_left.php';?>
<?php
            if(!empty($_GET["p"])){
                $pag = $_GET["p"];}else{
                    $pag="";
                }
                //echo $h;
                switch($pag){
                        default : include_once 'middle.php'; break;
                        ## MASTER ##
                        //===================== truck ===========================
                        case 'truck': include_once 'pages/truck/truck_tab.php';break;
                        case 'order': include_once 'pages/order/order_tab.php';break;
                      }
        ?>
  
<?php include_once 'footer.php';?>