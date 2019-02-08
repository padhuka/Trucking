                      <?php
                            include_once '../../lib/sess.php';
                            include_once '../../lib/config.php';
                      ?>
                      <table id="example1" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Kota Asal</th>
                          <th>Alamat Asal</th>
                          <th>Kota Tujuan</th>
                          <th>Alamat Tujuan</th>
                          <th>Tanggal</th>
                          <th>Jenis Truck</th>
                          <th>Info Barang</th>
                          <th></th>
                        </tr>
                        </thead>
                        <tbody>
                              <?php
                                    $j=1;
                                    $sqlcatat = "SELECT *, A.id AS ids FROM user_order A
                                                LEFT JOIN jenis_order B ON A.fk_jenis_order=B.id
                                                WHERE A.fk_user_id='$userid'
                                    ORDER BY A.id DESC";
                                    $rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){
                                      //  id  fk_user_id  no_polisi   fk_jenis_order  tahun   stnk  kir   fot
                                ?>
                        <tr class="tr1">
                          <td><?php echo $j++;?></td>
                          <td ><?php echo $catat['no_polisi'];?></td>
                          <td ><?php echo $catat['nama'];?><br><?php echo $catat['size'];?></td>
                          <td ><?php echo $catat['tahun'];?></td>  
                          <td ><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $catat['stnk'] ).'" width="100" />';?></td>
                          <td ><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $catat['kir'] ).'" width="100" />';?></td>
                          <td ><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $catat['foto'] ).'" width="100" />';?></td>
                          <td >
                                        <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id']; ?>"  onclick="ubahorder(
                                         '<?php echo $catat['no_polisi'];?>',
                                         '<?php echo $catat['fk_jenis_order'];?>',
                                         '<?php echo $catat['nama'];?>',
                                         '<?php echo $catat['size'];?>',
                                         '<?php echo $catat['tahun'];?>',
                                         '<?php echo $catat['ids'];?>',
                                        );"><span>Ubah</span></button>
                                         <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['ids']; ?>" onclick="open_del(iddelsatuan='<?php echo $catat['ids']; ?>');"><span>Hapus</span></button>

                                    </td>
                        </tr>
                    <?php }?>                                           
                        
                        </tbody>
                      </table>

                      <script>
                        $(function () {
                          $('#example1').DataTable()
                        });

                        function open_del(x){
                                $.ajax({
                                    url: "pages/order/order_del.php?id="+x,
                                    type: "GET",
                                    success: function (ajaxData){
                                        $("#ModalBatal").html(ajaxData);
                                        $("#ModalBatal").modal({backdrop: 'static',keyboard: false});
                                    }
                                });
                        };
                      </script>