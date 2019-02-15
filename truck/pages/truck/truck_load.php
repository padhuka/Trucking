                      <?php
                            include_once '../../lib/sess.php';
                            include_once '../../lib/config.php';
                      ?>
                      <style>
body {font-family: Arial, Helvetica, sans-serif;}

.myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

.myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal2 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content2 {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content2, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close2 {
  position: absolute;
  top: 60px;
  right: 400px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close2:hover,
.close2:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content2 {
    width: 100%;
  }
}
</style>
          
                      <table id="example1" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>No Polisi</th>
                          <th>Jenis Truck</th>
                          <th>Tahun Pembuatan</th>
                          <th>STNK</th>
                          <th>KIR</th>
                          <th>Foto</th>
                          <th></th>
                        </tr>
                        </thead>
                        <tbody>
                              <?php
                                    $j=1;
                                    $sqlcatat = "SELECT *, A.id AS ids FROM user_truck A
                                                LEFT JOIN jenis_truck B ON A.fk_jenis_truck=B.id
                                                WHERE A.fk_user_id='$userid'
                                    ORDER BY A.id DESC";
                                    //echo $sqlcatat;
                                    $rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){
                                      //  id  fk_user_id  no_polisi   fk_jenis_truck  tahun   stnk  kir   fot
                                ?>
                        <tr class="tr1">
                          <td><?php echo $j++;?></td>
                          <td ><?php echo $catat['no_polisi'];?></td>
                          <td ><?php echo $catat['nama'];?><br><?php echo $catat['size'];?></td>
                          <td ><?php echo $catat['tahun'];?></td>  
                          <td ><?php echo '<img class="myImg" id="stnk1" src="data:image/jpeg;base64,'.base64_encode( $catat['stnk'] ).'" width="100" />';?></td>
                          <td ><?php echo '<img class="myImg" id="kir1" src="data:image/jpeg;base64,'.base64_encode( $catat['kir'] ).'" width="100" />';?></td>
                          <td ><?php echo '<img class="myImg" id="foto1" src="data:image/jpeg;base64,'.base64_encode( $catat['foto'] ).'" width="100" />';?></td>
                          <td >
                                        <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id']; ?>"  onclick="ubahtruck(
                                         '<?php echo $catat['no_polisi'];?>',
                                         '<?php echo $catat['fk_jenis_truck'];?>',
                                         '<?php echo $catat['nama'];?>',
                                         '<?php echo $catat['size'];?>',
                                         '<?php echo $catat['tahun'];?>',
                                         '<?php echo $catat['ids'];?>',
                                         '<?php echo "<img src=data:image/jpeg;base64,".base64_encode( $catat['stnk'] )." width=100 />";?>',
                                         '<?php echo "<img src=data:image/jpeg;base64,".base64_encode( $catat['kir'] )." width=100 />";?>',
                                         '<?php echo "<img src=data:image/jpeg;base64,".base64_encode( $catat['foto'] )." width=100 />";?>',
                                        );"><span>Ubah</span></button>
                                         <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['ids']; ?>" onclick="open_del(iddelsatuan='<?php echo $catat['ids']; ?>');"><span>Hapus</span></button>

                                    </td>
                        </tr>
                    <?php }?>                                           
                        
                        </tbody>
                      </table>
                     <!--  <img id="myImg" src="img_snow.jpg" alt="Snow" style="width:100%;max-width:300px">
The Modal -->
<div id="myModal2" class="modal2">
  <span class="close2">&times;</span>
  <img class="modal-content2" id="img01">
  <div id="caption"></div>
</div>

<script>
// Get the modal
var modal2 = document.getElementById('myModal2');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var imgstnk = document.getElementById('stnk1');
var imgkir = document.getElementById('kir1');
var imgfoto = document.getElementById('foto1');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
imgstnk.onclick = function(){
  modal2.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}
imgkir.onclick = function(){
  modal2.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}
imgfoto.onclick = function(){
  modal2.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close2")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal2.style.display = "none";
}
</script>
                      <script>
                        $(function () {
                          $('#example1').DataTable()
                        });

                        function open_del(x){
                                $.ajax({
                                    url: "pages/truck/truck_del.php?id="+x,
                                    type: "GET",
                                    success: function (ajaxData){
                                        $("#ModalBatal").html(ajaxData);
                                        $("#ModalBatal").modal({backdrop: 'static',keyboard: false});
                                    }
                                });
                        };
                        
                      </script>