<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->

    <section class="content">
      <div class="row">
<div id="listorder">
        <!-- left column -->
        <div class="col-md-12">

        <h3>
        List Order
        <!--<small>Control panel</small>-->
      </h3>
          <!-- general form elements -->
          <div class="box box-primary">
            <!--<div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
             /.box-header -->
            <!-- form start 
            <form role="form">-->
              <div class="box-body">
                <div id="tableorder">
                </div>
              </div>
              <!-- /.box-body 
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>-->

          </div>
          <!-- /.box -->
        </div>
</div>

<div id="addorder">
        <div class="col-md-12">
           <h3>
        Pemesanan
        <!--<small>Control panel</small>-->
      </h3>
          <!-- general form elements -->
          <div class="box box-primary">
          </div>
        </div>
        <div class="col-md-5">
          <!-- Horizontal Form -->
          <div class="box box-infos">
            <!-- <div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
            </div>
            /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" enctype="multipart/form-data" novalidate id="formorder">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Kota Asal</label>
                  <div class="col-sm-6">
                    <input type="hidden" class="form-control" id="asalid" name="asalid" readonly="yes" onchange="tarif();">
                       <input type="text" class="form-control" id="asal" name="asal" readonly="yes" >
                      
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Alamat Asal</label>
                  <div class="col-sm-6">
                    <textarea class="form-control" id="alamatasal"  name="alamatasal" readonly></textarea>                      
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Kota Tujuan</label>
                  <div class="col-sm-6">
                    <input type="hidden" class="form-control" id="tujuanid" name="tujuanid" readonly="yes" onchange="tarif();">
                       <input type="text" class="form-control" id="tujuan" name="tujuan" readonly="yes" >
                      
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Alamat Tujuan</label>
                  <div class="col-sm-6">
                    <textarea class="form-control" id="alamattujuan"  name="alamattujuan" readonly></textarea>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Tanggal</label>

                  <div class="col-sm-6">
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control" id="tgl" name="tgl" style="width: 65%;" value="<?php echo date('Y-m-d');?>" readonly>
                    </div>
                  </div>
                </div>        

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Jenis Truck</label>

                  <div class="col-sm-6">
                      <input type="text" class="form-control" id="jenistruck" name="jenistruck" readonly="yes" >
                       <input type="text" class="form-control" id="ukurantruck" name="ukurantruck" readonly="yes" >
                      
                  </div>
                </div>          
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Tarif</label>

                  <div class="col-sm-5">
                      <input type="text" class="form-control" id="tarif" name="tarif" readonly="yes">
                  </div>
                </div>     
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Berat</label>

                  <div class="col-sm-5">
                      <input type="text" class="form-control" id="berat" name="berat" readonly>
                  </div>Ton
                </div>      
                    
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Dimensi</label>

                  <div class="col-sm-8">
                      <table><tr><td>P : <input type="text" id="p" name="p" style="width: 34px;" readonly></td><td>&nbsp;&nbsp;L : <input type="text" id="l" name="l" style="width: 40px;" readonly></td><td>&nbsp;&nbsp;T : <input type="text" id="t" name="t" style="width: 40px;" readonly></td></tr></table>
                      
                  </div>
                </div>  

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Catatan</label>

                  <div class="col-sm-5">
                      <textarea class="form-control" id="catatan" name="catatan" readonly></textarea>
                  </div>
                </div>    
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <input type="hidden" name="idhid" id="idhid">
                  <input type="hidden" name="userid" id="userid" value="<?php echo $userid;?>">
                <button type="button" class="btn btn-primary" onclick="batalubah()" id="canceledit">Close</button>
              </div>
              <!-- /.box-footer -->

            </form>
          </div>
  </div> <!-- add-->

    </div>



      
    </section>
</div>
<div id="ModalBatal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<script>  

  
          refresh();
            function refresh(){
              $('#saveadd').show();
              $('#canceladd').show();
              $('#saveedit').hide();
              $('#canceledit').hide();

              $('#asalid').val('');
              $('#asal').val('');              
              $('#tujuanid').val('');
              $('#tujuan').val('');
              $('#alamatasal').val('');
              $('#alamattujuan').val('');
              $('#tgl').val('');   
              $('#p').val('');
              $('#l').val('');
              $('#t').val('');
              $('#catatan').val('');
              $('#idhid').val('');
              $('#tarif').val('');

            }


            function batalubah(){
              refresh();
              $('#listorder').show();
              $('#addorder').hide();
            }
            function ubahorder(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q){       

                          $('#listorder').hide();
                          $('#addorder').show();

                          $('#asalid').val(a);
                          $('#asal').val(b);              
                          $('#alamatasal').val(c);
                          $('#tujuanid').val(d);
                          $('#tujuan').val(e);                          
                          $('#alamattujuan').val(f);
                          $('#tgl').val(g);   
                          $('#jenistruckhiden').val(h);
                          $('#jenistruck').val(i);
                          $('#ukurantruck').val(j);                          
                          $('#berat').val(k);
                          $('#p').val(l);
                          $('#l').val(m);
                          $('#t').val(n);
                          $('#idhid').val(o);   
                          $('#tarif').val(p);   
                          $('#catatan').val(q);   

                          $('#saveadd').hide();
                          $('#canceladd').hide();
                          $('#saveedit').show();
                          $('#canceledit').show();
            }

            

            $(document).ready(function (){
                 $("#tableorder").load('pages/admin/order_load.php');
            });


</script>
<?php if ($_GET['p']=='orderadmin' && $_GET['pil']=='list'){
  echo "<script>$('#addorder').hide();</script>";
}?>
<?php if ($_GET['p']=='orderadmin' && $_GET['pil']=='reg'){
  echo "<script>$('#listorder').hide();</script>";
}?>