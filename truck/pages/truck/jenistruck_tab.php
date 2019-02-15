    <?php
    //include_once 'lib/config.php';
   ?>
     <div id="ModalTruck" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">          
      <div class="col-md-14">
                <div class="modal-content">
                    <div class="modal-header">
                         
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Data Jenis Kendaraan <button type="button" class="close" aria-label="Close" onclick="$('#ModalTruck').modal('hide');"><span>&times;</span></button></h4>                        
                    </div>

                  <div class="box">
                <table id="truck" class="table table-condensed table-bordered table-striped table-hover">
                <thead class="thead-light">
                <tr>
                          <th>Nama</th>
                          <th>Size</th>
                          <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                                    $j=1;
                                    $sqlcatat1 = "SELECT * FROM jenis_truck ORDER BY id DESC";
                                    $rescatat1 = mysql_query( $sqlcatat1 );
                                    while($catat1 = mysql_fetch_array( $rescatat1 )){
                                ?>
                        <tr>
                          <td ><?php echo $catat1['nama'];?></td>
                          <td ><?php echo $catat1['size'];?></td>
                          <td >
                                        <button type="button" class="btn btn btn-default btn-circle" onclick="pilih3('<?php echo $catat1['id'];?>','<?php echo $catat1['nama'];?>','<?php echo $catat1['size'];?>');">Pilih</button>

                                    </td>
                        </tr>
                    <?php }?>
                </tfoot>
              </table>
              </div>
              </div>
              </div>
              </div>
              </div>
              <script>
                $(function () {
                          $('#truck').DataTable()
                        });

                function pilih3(x,y,z){
                              $("#jenistruckhid").val(x);
                              $("#jenistruck").val(y);
                              $("#ukurantruck").val(z);
                              $("#ModalTruck").modal('hide');
                              //tarifs();
                           
                      }; 
              </script>

  <style type="text/css">
  .modal-header {
    padding-top: 15px;padding-bottom: 15px;
  }
  .title-header {
    font-size: 20px;
    text-align: center;
    font-weight: bold;
    font-family: monospace;
  }
  .modal-content {
    height: 556px;
  }
  .row {
    margin-left: 0px;
    margin-right: 0px;
    margin-top:10px;
  }
  .modal-title {
    padding-top: 5px;padding-bottom: 5px;
  }
</style>

