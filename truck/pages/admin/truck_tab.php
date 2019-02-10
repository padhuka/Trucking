
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data truck</li>
      </ol>
    </section>

    Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div id="listtruck">
        
        <div class="col-md-12">
          <h3>
        List Truck
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
                <div id="tabletruck">
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
</div> <!-- listtruck -->
<div id="add">
       
        <div class="col-md-12">
           <h3>
        Armada
        <!--<small>Control panel</small>-->
      </h3>
          <!-- general form elements -->
          <div class="box box-primary">
          </div>
        </div>
        <div class="col-md-4">
          <!-- Horizontal Form -->
          <div class="box box-infos">
            <!-- <div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
            </div>
            /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" enctype="multipart/form-data" novalidate id="formtruck">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-5 control-label">No Polisi</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="nopol" name="nopol" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-5 control-label">Jenis Truck</label>

                  <div class="col-sm-6">
                      <input type="text" class="form-control" id="jenistruck" name="jenistruck" readonly="yes" >
                       <input type="text" class="form-control" id="ukurantruck" name="ukurantruck" readonly="yes" >
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-5 control-label">Tahun Pembuatan</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="tahun" name="tahun" readonly>
                  </div>
                </div>     

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-5 control-label">STNK</label>

                  <div class="col-sm-6">
                    <span id="stnk1"></span>
                  </div>
                </div>  

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-5 control-label">KIR</label>

                  <div class="col-sm-6">
                    <span id="kir1"></span>
                  </div>
                </div>  
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-5 control-label">Foto</label>

                  <div class="col-sm-6">
                      <span id="foto1"></span>
                  </div>
                </div>  
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="hidden" name="idhid" id="idhid">
                <input type="hidden" name="stnk1" id="stnk1">
                <input type="hidden" name="kir1" id="kir1">
                <input type="hidden" name="foto1" id="foto1">
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

              $('#jenistruckhid').val('');
              $('#jenistruck').val('');              
              $('#ukurantruck').val('');
              $('#tahun').val('');
              $('#nopol').val('');
              $('#nopolhid').val('');
              $('#stnk').val('');   
              $('#kir').val('');
              $('#foto').val('');
              $('#idhid').val('');
            }

            function bataladd(){
              refresh();
            }

            function batalubah(){
              refresh();
              $('#listtruck').show();
              $('#add').hide();
            }
            function ubahtruck(a,b,c,d,e,f,g,h,i){                
                          //no_bukti,tr_date,transaction_type,fk_akun,nmakun,ref_akun,nmref,amount
                          $('#listtruck').hide();
                          $('#add').show();

                          $('#nopol').val(a);
                          $('#jenistruckhid').val(b);              
                          $('#jenistruck').val(c);
                          $('#ukurantruck').val(d);
                          $('#tahun').val(e);
                          $('#idhid').val(f);     
                          $('#stnk1').html(g); 
                          $('#kir1').html(h); 
                          $('#foto1').html(i); 

                          $('#saveadd').hide();
                          $('#canceladd').hide();
                          $('#saveedit').show();
                          $('#canceledit').show();
            }

            function simpanubah(){
                  var id = $('#idhid').val();
                  var nopol = $('#nopol').val();              
                  var jenistruck = $('#jenistruckhid').val();
                  var tahun = $('#tahun').val(); 
                  //alert('pages/admin/truck_edit_save.php?kode='+id+'&nopol='+nopol+'&jenistruck='+jenistruck+'&tahun='+tahun+'&stnk='+stnk+'&kir='+kir+'&foto='+foto);
                   $.ajax({
                                url: 'pages/admin/truck_edit_save.php?kode='+id+'&nopol='+nopol+'&jenistruck='+jenistruck+'&tahun='+tahun,
                                type: 'GET',
                                success: function (data){               
                                  var hsl=data.trim();      
                                  alert(hsl);
                                  if (hsl=='y'){
                                    alert('Data Sudah Ada');
                                    return false();
                                    exit();
                                  }
                                  //alert(hsl);              
                                  alert('Data Berhasil Disimpan');  
                                  refresh();
                                  $("#tabletruck").load('pages/admin/truck_load.php');
                                  $('#listtruck').show();
                                  $('#add').hide();
                                }
                        });
              }

            $(document).ready(function (){
                 $("#tabletruck").load('pages/admin/truck_load.php');
            });


</script>
<?php if ($_GET['p']=='truckadmin' && $_GET['pil']=='list'){
  echo "<script>$('#add').hide();</script>";
}?>
<?php if ($_GET['p']=='truckadmin' && $_GET['pil']=='reg'){
  echo "<script>$('#listtruck').hide();</script>";
}?>