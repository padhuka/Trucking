<?php
    //kd_siswa_bayar  fk_kd_siswa_kewajiban_bayar   tgl   jml_bayar
    include_once '../../lib/config.php';
    include_once '../../lib/fungsi.php';
    $asal= $_GET['asal'];
    $tujuan= $_GET['tujuan'];
    $truck= $_GET['truck'];
//
//id	fk_jenis_truck	fk_kota_asal	fk_kota_tujuan	tarif 	
    $qpil="SELECT * FROM tarif WHERE fk_jenis_truck='$truck' AND fk_kota_asal='$asal' AND fk_kota_tujuan='$tujuan'";
    $hpil=mysql_fetch_array(mysql_query($qpil));
    $tarif=$hpil['tarif'];

    //echo 'var hsl=new Array('.$tarif.');';
    echo $tarif;
    //echo $totbayar."-".$jmlbyre."-".$sisa;


?>