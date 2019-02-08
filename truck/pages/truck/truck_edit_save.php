<?php
        include_once '../../lib/config.php';
        include_once '../../lib/fungsi.php';
		 //$ip = ; // Ambil IP Address dari User
        $id = trim($_GET['kode']);   
        $nopol = trim($_GET['nopol']);   
        $jenistruck = trim($_GET['jenistruck']);
        $tahun = trim($_GET['tahun']);
        /*$stnk = trim($_GET['stnk']);
        $kir = trim($_GET['kir']);
        $foto = trim($_GET['foto']); */
       /* if($_FILES['stnk']['size'] > 0 && $_FILES['stnk']['error'] == 0){  
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
        }*/
         
       /* $sqlcek = "SELECT * FROM t_siswa WHERE (kd_siswa='$kode' AND kd_siswa<>'$kodehid') OR (nis='$nis' AND nis<>'$nishid') OR (nisn='$nisn' AND nisn<>'$nisnhid')";
        //echo $sqlcek;
        $qrycek = mysql_query($sqlcek);
        $row = mysql_fetch_array($qrycek);
        if ($row){
            echo 'y';
        }else{*/
                $sqltbemp = "UPDATE user_truck SET no_polisi='$nopol',fk_jenis_truck='$jenistruck',tahun='$tahun' WHERE id='$id'";
                //echo $sqltbemp;,stnk='$stnk',kir='$kir',foto='$foto'
                //echo $sqltbemp;
                mysql_query($sqltbemp);
           // echo '
     //}
?>