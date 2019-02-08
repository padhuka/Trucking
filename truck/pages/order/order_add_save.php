<?php
        include_once '../../lib/config.php';
        include_once '../../lib/fungsi.php';
		 //$ip = ; // Ambil IP Address dari User
        //fk_kota_asal  fk_kota_tujuan  alamat_asal   alamat_tujuan   date  fk_jenis_truck  berat   dimensi_p   dimensi_l   dimensi_t   catatan   fk_customer_id  fk_partner_id 
        $fk_kota_asal = trim($_POST['asalid']);   
        $fk_kota_tujuan = trim($_POST['tujuanid']);
        $alamat_asal = trim($_POST['alamatasal']);
        $alamat_tujuan = trim($_POST['alamattujuan']); 
        $tanggal = trim($_POST['tgl']);
        $fk_jenis_truck = trim($_POST['jenistruckhid']);
        $berat = trim($_POST['berat']);
        $dimensi_p = trim($_POST['p']);
        $dimensi_l = trim($_POST['l']);
        $dimensi_t = trim($_POST['t']);
        $catatan = trim($_POST['catatan']);
        $fk_customer_id = trim($_POST['userid']);
        
        
        //message_back($id_satuan);
		/* #cek idsurat
        $sqlcek = "SELECT * FROM t_siswa WHERE kd_siswa='$kode' OR nis='$nis' OR nisn='$nisn'";
        $qrycek = mysql_query($sqlcek);
        $row = mysql_fetch_array($qrycek);

        if ($row){
            echo 'y';
        }else{*/
		    $sqltbemp = "INSERT INTO orders (fk_kota_asal,fk_kota_tujuan,alamat_asal,alamat_tujuan,tanggal,fk_jenis_truck,berat,dimensi_p,dimensi_l,dimensi_t,catatan,fk_customer_id) VALUES ('$fk_kota_asal','$fk_kota_tujuan','$alamat_asal','$alamat_tujuan','$tanggal','$fk_jenis_truck','$berat','$dimensi_p','$dimensi_l','$dimensi_t','$catatan','$fk_customer_id')";
            mysql_query($sqltbemp);
            //echo 'n';
        //}
?>