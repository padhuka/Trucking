<?php
        include_once '../../lib/config.php';
        include_once '../../lib/fungsi.php';
		 //$ip = ; // Ambil IP Address dari User
        $fk_kota_asal = trim($_GET['asalid']);   
        $fk_kota_tujuan = trim($_GET['tujuanid']);
        $alamat_asal = trim($_GET['alamatasal']);
        $alamat_tujuan = trim($_GET['alamattujuan']); 
        $tanggal = trim($_GET['tgl']);
        $fk_jenis_truck = trim($_GET['jenistruckhid']);
        $berat = trim($_GET['berat']);
        $dimensi_p = trim($_GET['p']);
        $dimensi_l = trim($_GET['l']);
        $dimensi_t = trim($_GET['t']);
        $catatan = trim($_GET['catatan']);
        //$fk_customer_id = trim($_GET['userid']);
        $tarif = trim($_GET['tarif']);
        $id = trim($_GET['id']);
        
                $sqltbemp = "UPDATE orders SET fk_kota_asal='$fk_kota_asal',fk_kota_tujuan='$fk_kota_tujuan',alamat_asal='$alamat_asal',tanggal='$tanggal',fk_jenis_truck='$fk_jenis_truck',berat='$berat',dimensi_p='$dimensi_p',dimensi_t='$dimensi_t',dimensi_l='$dimensi_l',catatan='$catatan', tarif='$tarif' WHERE id='$id'";
                //echo $sqltbemp;
                mysql_query($sqltbemp);
           // echo '
     //}
?>