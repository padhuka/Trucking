<?php
        include_once '../../lib/config.php';
        include_once '../../lib/fungsi.php';
		 //$ip = ; // Ambil IP Address dari User
        $nopol = trim($_POST['nopol']);   
        $jenistruck = trim($_POST['jenistruckhid']);
        $tahun = trim($_POST['tahun']);
        $stnk = trim($_POST['stnk']); 
        $kir = trim($_POST['kir']);
        $foto = trim($_POST['foto']);
        $userid = trim($_POST['userid']);
        
        if($_FILES['stnk']['size'] > 0 && $_FILES['stnk']['error'] == 0){  
          $fileName = $_FILES['stnk']['name'];  
          $mimeType = $_FILES['stnk']['type'];  
          $tmpFile = fopen($_FILES['stnk']['tmp_name'], 'rb'); // (fileName, mode)  
          $fileData = fread($tmpFile, filesize($_FILES['stnk']['tmp_name']));  
          $stnk = addslashes($fileData);  
        }
        if($_FILES['kir']['size'] > 0 && $_FILES['kir']['error'] == 0){  
          $fileName = $_FILES['kir']['name'];  
          $mimeType = $_FILES['kir']['type'];  
          $tmpFile = fopen($_FILES['kir']['tmp_name'], 'rb'); // (fileName, mode)  
          $fileData = fread($tmpFile, filesize($_FILES['kir']['tmp_name']));  
          $kir = addslashes($fileData);  
        }
        if($_FILES['foto']['size'] > 0 && $_FILES['foto']['error'] == 0){  
          $fileName = $_FILES['foto']['name'];  
          $mimeType = $_FILES['foto']['type'];  
          $tmpFile = fopen($_FILES['foto']['tmp_name'], 'rb'); // (fileName, mode)  
          $fileData = fread($tmpFile, filesize($_FILES['foto']['tmp_name']));  
          $foto = addslashes($fileData);  
        }
        //message_back($id_satuan);
		/* #cek idsurat
        $sqlcek = "SELECT * FROM t_siswa WHERE kd_siswa='$kode' OR nis='$nis' OR nisn='$nisn'";
        $qrycek = mysql_query($sqlcek);
        $row = mysql_fetch_array($qrycek);

        if ($row){
            echo 'y';
        }else{*/
		    $sqltbemp = "INSERT INTO user_truck (fk_user_id,no_polisi,fk_jenis_truck,tahun,stnk,kir,foto ) VALUES ('$userid','$nopol','$jenistruck','$tahun','$stnk','$kir','$foto')";
            mysql_query($sqltbemp);
            //echo 'n';
        //}
?>