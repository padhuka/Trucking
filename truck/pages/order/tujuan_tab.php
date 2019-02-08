      <?php
    include_once 'lib/config.php';
   ?>
     <div id="ModalTujuan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">          
      <div class="col-md-10">
                <div class="modal-content">
                    <div class="modal-header">
                         
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Kota Asal <button type="button" class="close" aria-label="Close" onclick="$('#ModalTujuan').modal('hide');"><span>&times;</span></button></h4>                        
                    </div>

                  <div class="box">
                <table id="kota2" class="table table-condensed table-bordered table-striped table-hover">
                <thead class="thead-light">
                <tr>
                          <th>Nama</th>
                          <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                                    $j=1;
                                    $sqlcatat1 = "SELECT * FROM kota ORDER BY nama ASC";
                                    $rescatat1 = mysql_query( $sqlcatat1 );
                                    while($catat1 = mysql_fetch_array( $rescatat1 )){
                                ?>
                        <tr>
                          <td ><?php echo $catat1['nama'];?></td>
                          <td >
                                        <button type="button" class="btn btn btn-default btn-circle" onclick="pilih2('<?php echo $catat1['id'];?>','<?php echo $catat1['nama'];?>');">Pilih</button>

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
              <script type="text/javascript">
                $('#kota2').DataTable();
                function pilih2(x,y,z){
                              $("#tujuanid").val(x);
                              $("#tujuan").val(y);
                              $("#ModalTujuan").modal('hide');
                              tarifs();
                           
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

