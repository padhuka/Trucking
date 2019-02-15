
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
                    <div class="box-body">
                      <div id="tabletruck">
                      </div>
                    </div>                    
                </div>
            <!-- /.box -->
          </div>
        </div> <!-- listtruck -->

      <div id="add">
       
              <div class="col-md-12">
                    <h3>
                      Registrasi Armada
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
                    <input type="text" class="form-control" id="nopol" name="nopol" >
                    <input type="hidden" class="form-control" id="nopolid" name="nopolhid" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-5 control-label">Jenis Truck</label>

                  <div class="col-sm-6">
                    <input type="hidden" class="form-control" id="jenistruckhid" name="jenistruckhid" readonly="yes">
                      <input type="text" class="form-control" id="jenistruck" name="jenistruck" readonly="yes" >
                       <input type="text" class="form-control" id="ukurantruck" name="ukurantruck" readonly="yes" >
                      <button type="button" class="btn btn-primary btn-md data-toggle="modal" data-target="#myModal" onclick="pilihtruck();">Pilih</button>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-5 control-label">Tahun Pembuatan</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="tahun" name="tahun">
                  </div>
                </div>     

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-5 control-label">STNK</label>

                  <div class="col-sm-6">
                    <span id="stnk1"></span>
                    <input type="file" class="form-control" id="stnk" name="stnk" required>
                  </div>
                </div>  

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-5 control-label">KIR</label>

                  <div class="col-sm-6">
                    <span id="kir1"></span>
                    <input type="file" class="form-control" id="kir" name="kir" required>
                  </div>
                </div>  

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-5 control-label">Foto</label>

                  <div class="col-sm-6">
                    <span id="foto1"></span>
                    <input type="file" class="form-control" id="foto" name="foto" required>
                  </div>
                </div>  
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="hidden" name="idhid" id="idhid">
                <input type="hidden" name="userid" id="userid" value="<?php echo $userid;?>">
                <input type="hidden" name="simpan" id="simpan" value="saveadd">
                <button type="submit" class="btn btn-primary" id="saveadd">Simpan</button>
                <button type="button" class="btn btn-primary" onclick="bataladd()" id="canceladd">Batal</button>
                <!--<button type="submit" class="btn btn-primary" id="saveedit">Simpan</button>-->
                
                <button type="button" class="btn btn-primary" onclick="batalubah()" id="canceledit">Batal</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
  </div> <!-- add-->

    </div>



      
    </section>
</div>
<div id="ModalBatal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<?php include_once 'jenistruck_tab.php';?>
<script>  

          refresh();
            function refresh(){
              //$('#saveadd').show();
              $('#canceladd').show();
              //$('#saveedit').hide();
              $('#canceledit').hide();

              $('#jenistruckhid').val('');
              $('#jenistruck').val('');              
              $('#ukurantruck').val('');
              $('#tahun').val('');
              $('#nopol').val('');
              $('#nopolhid').val('');
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

                          //$('#saveadd').hide();
                          $('#canceladd').hide();
                          //$('#saveedit').show();
                          $('#canceledit').show();

                          $('#simpan').val('saveedit');                          
            }

            function simpanubah(){
                  var id = $('#idhid').val();
                  var nopol = $('#nopol').val();              
                  var jenistruck = $('#jenistruckhid').val();
                  var tahun = $('#tahun').val(); 
                  var stnk = $('#stnk').val(); 
                  var kir = $('#kir').val(); 
                  var foto = $('#foto').val(); 
                  //alert('pages/truck/truck_edit_save.php?kode='+id+'&nopol='+nopol+'&jenistruck='+jenistruck+'&tahun='+tahun+'&stnk='+stnk+'&kir='+kir+'&foto='+foto);
                   $.ajax({
                                //url: 'pages/truck/truck_edit_save.php?kode='+id+'&nopol='+nopol+'&jenistruck='+jenistruck+'&tahun='+tahun+'&stnk='+stnk+'&kir='+kir+'&foto='+foto,
                                url: 'pages/truck/truck_edit_save.php',
                                type: 'POST',
                                success: function (data){               
                                  var hsl=data.trim();      
                                  //alert(hsl);
                                  if (hsl=='y'){
                                    alert('Data Sudah Ada');
                                    return false();
                                    exit();
                                  }
                                  //alert(hsl);              
                                  alert('Data Berhasil Disimpan');  
                                  refresh();
                                  $("#tabletruck").load('pages/truck/truck_load.php');
                                  $('#listtruck').show();
                                  $('#add').hide();
                                }
                        });
              }
            
            $(document).ready(function (){
                 $("#tabletruck").load('pages/truck/truck_load.php');

                    $("#formtruck").on('submit', function(e){
                          e.preventDefault();
                                    var simpan = $('#simpan').val();
                                      if (simpan=='saveedit'){
                                        var urle='pages/truck/truck_edit_save.php';
                                      }
                                      if (simpan=='saveadd'){
                                        var urle='pages/truck/truck_add_save.php';
                                      }
                                      //return false;
                                      $.ajax({
                                                  type: 'POST',
                                                  url: urle,
                                                  data: new FormData(this),
                                                  contentType: false,
                                                  cache: false,
                                                  processData:false,
                                                  success: function(data){
                                                        //alert('lolos');
                                                        var hsl=data.trim();
                                                        //alert(hsl);
                                                        //return false;
                                                        if (hsl=='y'){
                                                      alert('Data Sudah ada');
                                                      return false;
                                                      exit();
                                                    }else{
                                                      $("#tabletruck").load('pages/truck/truck_load.php');  
                                                      refresh();
                                                            alert('Data Berhasil Disimpan');
                                                      if (simpan=='saveedit'){
                                                        $('#listtruck').show();
                                                        $('#add').hide();
                                                      }
                                                  }
                                                      }
                                                      
                                                });
                      });
            });

function pilihtruck(){  
                $("#ModalTruck").modal({backdrop: 'static',keyboard: false});   
              }
  
</script>
<?php if ($_GET['p']=='truck' && $_GET['pil']=='list'){
  echo "<script>$('#add').hide();</script>";
}?>
<?php if ($_GET['p']=='truck' && $_GET['pil']=='reg'){
  echo "<script>$('#listtruck').hide();</script>";
}?>