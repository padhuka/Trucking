<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"  style="margin-left: -0px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Order
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Order</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
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

        <div class="col-md-4">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <!-- <div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
            </div>
            /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" enctype="multipart/form-data" novalidate id="formorder">
              
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Kota Asal</label>
                  <div class="col-sm-6">
                    <input type="hidden" class="form-control" id="jenisorderhid" name="jenisorderhid" readonly="yes">
                       <input type="text" class="form-control" id="ukuranorder" name="ukuranorder" readonly="yes" >
                      <button type="button" class="btn btn-primary btn-md data-toggle="modal" data-target="#myModal" onclick="jenisorderpilih();">Pilih</button>
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Alamat Asal</label>
                  <div class="col-sm-6">
                    <textarea class="form-control"></textarea>                      
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Kota Tujuan</label>
                  <div class="col-sm-6">
                    <input type="hidden" class="form-control" id="jenisorderhid" name="jenisorderhid" readonly="yes">
                       <input type="text" class="form-control" id="ukuranorder" name="ukuranorder" readonly="yes" >
                      <button type="button" class="btn btn-primary btn-md data-toggle="modal" data-target="#myModal" onclick="jenisorderpilih();">Pilih</button>
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Alamat Tujuan</label>
                  <div class="col-sm-6">
                    <textarea class="form-control"></textarea>                      
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Tanggal</label>

                  <div class="col-sm-6">
                    <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>

                  <input type="text" class="form-control" id="tgllahir" style="width: 65%;" value="<?php echo date('Y-m-d');?>">
                </div>
                  </div>
                </div>        

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Jenis Truck</label>

                  <div class="col-sm-6">
                    <input type="hidden" class="form-control" id="jenistruckhid" name="jenistruckhid" readonly="yes">
                      <input type="text" class="form-control" id="jenistruck" name="jenistruck" readonly="yes" >
                       <input type="text" class="form-control" id="ukurantruck" name="ukurantruck" readonly="yes" >
                      <button type="button" class="btn btn-primary btn-md data-toggle="modal" data-target="#myModal" onclick="jenistruckpilih();">Pilih</button>
                  </div>
                </div>          

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Berat</label>

                  <div class="col-sm-5">
                      <input type="text" class="form-control" id="jenistruck" name="jenistruck">
                  </div>Ton
                </div>          
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Dimensi</label>

                  <div class="col-sm-2">
                      <input type="text" class="form-control" id="jenistruck" name="jenistruck">
                      <input type="text" class="form-control" id="jenistruck" name="jenistruck">
                      <input type="text" class="form-control" id="jenistruck" name="jenistruck">
                  </div>
                </div>  
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Catatan</label>

                  <div class="col-sm-5">
                      <textarea class="form-control" id="jenistruck" name="jenistruck"></textarea>
                  </div>
                </div>    

              <!-- /.box-body -->
              <div class="box-footer">
                <input type="hidden" name="idhid" id="idhid">
                <input type="hidden" name="userid" id="userid" value="<?php echo $userid;?>">
                <button type="submit" class="btn btn-primary" id="saveadd">Simpan</button>
                <button type="button" class="btn btn-primary" onclick="bataladd()" id="canceladd">Batal</button>

                <button type="button" class="btn btn-primary" onclick="simpanubah()" id="saveedit">Simpan</button>
              <button type="button" class="btn btn-primary" onclick="batalubah()" id="canceledit">Batal</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>

    </div>
      
    </section>
</div>
<div id="ModalBatal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<?php include_once 'jenisorder_tab.php';?>
<script>  
  function jenisorderpilih(){  
    $("#Modalorder").modal({backdrop: 'static',keyboard: false});   
  }
          refresh();
            function refresh(){
              $('#saveadd').show();
              $('#canceladd').show();
              $('#saveedit').hide();
              $('#canceledit').hide();

              $('#jenisorderhid').val('');
              $('#jenisorder').val('');              
              $('#ukuranorder').val('');
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
            }
            function ubahorder(a,b,c,d,e,f,g,h,i){                
                          //no_bukti,tr_date,transaction_type,fk_akun,nmakun,ref_akun,nmref,amount
                          $('#nopol').val(a);
                          $('#jenisorderhid').val(b);              
                          $('#jenisorder').val(c);
                          $('#ukuranorder').val(d);
                          $('#tahun').val(e);
                          $('#idhid').val(i);                          
                          $('#saveadd').hide();
                          $('#canceladd').hide();
                          $('#saveedit').show();
                          $('#canceledit').show();
            }

            function simpanubah(){
                  var id = $('#idhid').val();
                  var nopol = $('#nopol').val();              
                  var jenisorder = $('#jenisorderhid').val();
                  var tahun = $('#tahun').val(); 
                  //alert('pages/order/order_edit_save.php?kode='+id+'&nopol='+nopol+'&jenisorder='+jenisorder+'&tahun='+tahun+'&stnk='+stnk+'&kir='+kir+'&foto='+foto);
                   $.ajax({
                                url: 'pages/order/order_edit_save.php?kode='+id+'&nopol='+nopol+'&jenisorder='+jenisorder+'&tahun='+tahun,
                                type: 'GET',
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
                                  $("#tableorder").load('pages/order/order_load.php');

                                }
                        });
              }

            $(document).ready(function (){
                 $("#tableorder").load('pages/order/order_load.php');

                    $("#formorder").on('submit', function(e){
                          e.preventDefault();
                                      $.ajax({
                                                  type: 'POST',
                                                  url: 'pages/order/order_add_save.php',
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
                                                      $("#tableorder").load('pages/order/order_load.php');  
                                                      refresh();
                                                            alert('Data Berhasil Disimpan');
                                                  }
                                                      }
                                                });
                      });
            });


</script>
