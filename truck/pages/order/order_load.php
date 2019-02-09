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
                                    $sqlcatat = "SELECT *, A.id AS ids, B.nama AS asal, C.nama AS tujuan, D.nama AS truck FROM orders A
                                                LEFT JOIN kota B ON A.fk_kota_asal=B.id
                                                LEFT JOIN kota C ON A.fk_kota_tujuan=C.id
                                                LEFT JOIN jenis_truck D ON A.fk_jenis_truck=D.id
                                                WHERE A.fk_customer_id='$userid'
                                    ORDER BY A.id DESC";
                                    $rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){
                                      //  id  fk_user_id  no_polisi   fk_jenis_order  tahun   stnk  kir   fot
                                ?>
                        <tr class="tr1">
                          <td><?php echo $j++;?></td>
                          <td ><?php echo $catat['asal'];?></td>
                          <td ><?php echo $catat['alamat_asal'];?></td>
                          <td ><?php echo $catat['tujuan'];?></td>  
                          <td ><?php echo $catat['alamat_tujuan'];?></td>
                          <td ><?php echo $catat['tanggal'];?></td>
                          <td ><?php echo $catat['truck'];?><br><?php echo $catat['size'];?></td>
                          <td ><?php echo $catat['berat'];?> Ton, <?php echo $catat['dimensi_p'];?> x <?php echo $catat['dimensi_l'];?> x <?php echo $catat['dimensi_t'];?></td>
                          <td >
                                        <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id']; ?>"  onclick="ubahorder(
                                         '<?php echo $catat['fk_kota_asal'];?>',
                                         '<?php echo $catat['asal'];?>',
                                         '<?php echo $catat['alamat_asal'];?>',
                                         '<?php echo $catat['fk_kota_tujuan'];?>',
                                         '<?php echo $catat['tujuan'];?>',
                                         '<?php echo $catat['alamat_tujuan'];?>',
                                         '<?php echo $catat['tanggal'];?>',
                                         '<?php echo $catat['fk_jenis_truck'];?>',
                                         '<?php echo $catat['truck'];?>',
                                         '<?php echo $catat['size'];?>',
                                         '<?php echo $catat['berat'];?>',
                                         '<?php echo $catat['dimensi_p'];?>',
                                         '<?php echo $catat['dimensi_l'];?>',
                                         '<?php echo $catat['dimensi_t'];?>',
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