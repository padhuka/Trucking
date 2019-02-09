<?php
		//$skrg = date('Y-m-d');
        include_once '../../lib/config.php';
        $id = $_GET['id'];
        //$keterangan_batal = $_GET['keteranganbatal'];
        //$no_bukti_or = trim($_POST['idkwitansior']);
        //$keterangan_batal = trim($_POST['keteranganbatal']);
        //echo $keterangan_batal;
        
            $updatebatalcash = "DELETE FROM orders WHERE id='$id'";
            mysql_query($updatebatalcash);
            
?>
