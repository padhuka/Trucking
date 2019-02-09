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
                      
                  </div><button type="button" class="btn btn-primary btn-md data-toggle="modal" data-target="#myModal" onclick="pilihasal();">Pilih</button>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Alamat Asal</label>
                  <div class="col-sm-6">
                    <textarea class="form-control" id="alamatasal"  name="alamatasal"></textarea>                      
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Kota Tujuan</label>
                  <div class="col-sm-6">
                    <input type="hidden" class="form-control" id="tujuanid" name="tujuanid" readonly="yes" onchange="tarif();">
                       <input type="text" class="form-control" id="tujuan" name="tujuan" readonly="yes" >
                      
                  </div><button type="button" class="btn btn-primary btn-md data-toggle="modal" data-target="#myModal" onclick="pilihtujuan();">Pilih</button>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Alamat Tujuan</label>
                  <div class="col-sm-6">
                    <textarea class="form-control" id="alamattujuan"  name="alamattujuan"></textarea>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Tanggal</label>

                  <div class="col-sm-6">
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control" id="tgl" name="tgl" style="width: 65%;" value="<?php echo date('Y-m-d');?>">
                    </div>
                  </div>
                </div>        

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Jenis Truck</label>

                  <div class="col-sm-6">
                    <input type="hidden" class="form-control" id="jenistruckhid" name="jenistruckhid" readonly="yes" onchange="tarif();">
                      <input type="text" class="form-control" id="jenistruck" name="jenistruck" readonly="yes" >
                       <input type="text" class="form-control" id="ukurantruck" name="ukurantruck" readonly="yes" >
                      
                  </div><button type="button" class="btn btn-primary btn-md data-toggle="modal" data-target="#myModal" onclick="pilihtruck();">Pilih</button>
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
                      <input type="text" class="form-control" id="berat" name="berat">
                  </div>Ton
                </div>      
                    
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Dimensi</label>

                  <div class="col-sm-8">
                      <table><tr><td>P : <input type="text" id="p" name="p" style="width: 34px;"></td><td>&nbsp;&nbsp;L : <input type="text" id="l" name="l" style="width: 40px;"></td><td>&nbsp;&nbsp;T : <input type="text" id="t" name="t" style="width: 40px;"></td></tr></table>
                      
                  </div>
                </div>  

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Catatan</label>

                  <div class="col-sm-5">
                      <textarea class="form-control" id="catatan" name="catatan"></textarea>
                  </div>
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
  </div> <!-- add-->

    </div>



      
    </section>
</div>
<div id="ModalBatal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<?php include_once 'jenistruck_tab.php';?>
<?php include_once 'asal_tab.php';?>
<?php include_once 'tujuan_tab.php';?>
<script>  
  function tarifs(){
      var asal = $('#asalid').val();
      var tujuan = $('#tujuanid').val();              
      var truck = $('#jenistruckhid').val();
      //alert('pages/order/tarif.php?asal='+asal+'&tujuan='+tujuan+'&truck='+truck);
       $.ajax({
             url: 'pages/order/tarif.php?asal='+asal+'&tujuan='+tujuan+'&truck='+truck,
             type: 'GET',
             success: function(data){
                var hsl=data.trim(); 
                $('#tarif').val(hsl);
             }
        });

  }

  function pilihtruck(){  
    $("#ModalTruck").modal({backdrop: 'static',keyboard: false});   
  }
  function pilihasal(){  
    $("#ModalAsal").modal({backdrop: 'static',keyboard: false});   
  }
  function pilihtujuan(){  
    $("#ModalTujuan").modal({backdrop: 'static',keyboard: false});   
  }

  
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

            }

            function bataladd(){
              refresh();
            }

            function batalubah(){
              refresh();
            }
            function ubahorder(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p){       

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
                          $('#catatan').val(o);   
                          $('#idhid').val(p);   

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
<?php if ($_GET['p']=='order' && $_GET['pil']=='list'){
  echo "<script>$('#addorder').hide();</script>";
}?>
<?php if ($_GET['p']=='order' && $_GET['pil']=='reg'){
  echo "<script>$('#listorder').hide();</script>";
}?>