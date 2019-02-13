<?php
        include_once '../../lib/config.php';
        include_once '../../lib/fungsi.php';
		 //$ip = ; // Ambil IP Address dari User
        $id = trim($_POST['idhid']);   
        $nopol = trim($_POST['nopol']);   
        $jenistruck = trim($_POST['jenistruckhid']);
        $tahun = trim($_POST['tahun']);
        $userid = trim($_POST['userid']);

        //CEK 
        $sqlcek= "SELECT * FROM user_truck WHERE id='$id'";
        $hcek=mysql_fetch_array(mysql_query($sqlcek));
        /*$stnk=$hcek['stnk'];
        $kir=$kir=$hcek['kir'];
        $foto=$stnk=$hcek['foto'];*/
        
        if($_FILES['stnk']['size'] > 0 && $_FILES['stnk']['error'] == 0){  
          $fileName = $_FILES['stnk']['name'];  
          $mimeType = $_FILES['stnk']['type'];  
          $tmpFile = fopen($_FILES['stnk']['tmp_name'], 'rb'); // (fileName, mode)  
          $fileData = fread($tmpFile, filesize($_FILES['stnk']['tmp_name']));  
          $stnk = addslashes($fileData);
        }else{
          $stnk=$hcek['stnk'];
        }
        if($_FILES['kir']['size'] > 0 && $_FILES['kir']['error'] == 0){  
          $fileName = $_FILES['kir']['name'];  
          $mimeType = $_FILES['kir']['type']; 
          $tmpFile = fopen($_FILES['kir']['tmp_name'], 'rbkir'); // (fileName, mode)  
          $fileData = fread($tmpFile, filesize($_FILES['kir']['tmp_name']));  
          $kir = addslashes($fileData); 
        }else{
          $kir=$hcek['kir']; 
        }
        if($_FILES['foto']['size'] > 0 && $_FILES['foto']['error'] == 0){  
          $fileName = $_FILES['foto']['name'];  
          $mimeType = $_FILES['foto']['type'];  
          $tmpFile = fopen($_FILES['foto']['tmp_name'], 'rbfoto'); // (fileName, mode)  
          $fileData = fread($tmpFile, filesize($_FILES['foto']['tmp_name']));  
          $foto = addslashes($fileData);  
        }else{
          $foto=$hcek['foto'];  
        }

        //echo $kir;



         
        /*if ($stnk==''){$stnk=$hcek['stnk'];}else{$stnk=$stnk;}
        if ($kir==''){$kir=$hcek['kir'];}else{$kir=$kir;}
        if ($foto==''){$stnk=$hcek['foto'];}else{$stnk=$foto;}*/
       /* $sqlcek = "SELECT * FROM t_siswa WHERE (kd_siswa='$kode' AND kd_siswa<>'$kodehid') OR (nis='$nis' AND nis<>'$nishid') OR (nisn='$nisn' AND nisn<>'$nisnhid')";
        //echo $sqlcek;
        $qrycek = mysql_query($sqlcek);
        $row = mysql_fetch_array($qrycek);
        if ($row){
            echo 'y';
        }else{*/
                $sqltbemp = "UPDATE user_truck SET no_polisi='$nopol',fk_jenis_truck='$jenistruck',tahun='$tahun' ,stnk='$stnk',kir='$kir',foto='$foto' WHERE id='$id'";
                //echo $sqltbemp;,stnk='$stnk',kir='$kir',foto='$foto'
                //cho $sqltbemp;
                mysql_query($sqltbemp);
           // echo '
     //}
?>