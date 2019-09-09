
<div class="box-body">
                               <table id="example1" class="table table-bordered table-striped">



                                    <thead>



                                        <tr>



                                            <th>No</th>



                                            <th>Nama Produk</th>



                                            <th>Kategori</th>



                                            <th>Ukuran</th>



                                            <th>Harga</th>



                                            <th>Jumlah</th>



                                            <th>Total</th>



                                        </tr>



                                    </thead>



                                    <tbody>



                                        <?php



                                        $no = 1;

                                        $total = 0;
                                        $ongkir = 0;
                                        $totpembayaran = 0;

                                        foreach ($detailpemesanan as $u) {



                                            ?>



                                            <tr>

                                            <?php 

                                            if($u->diskon_brg == 0){

                                                $harga = $u->harga_brg;

                                            }else{

                                                $harga = $u->diskon_brg;

                                            }

                                         

                                            echo "

                                                <td>$no</td>

                                                <td>$u->nama_barang</td>

                                                <td>$u->nama_kategori</td>

                                                <td>$u->ukuran_brg</td>

                                                <td>$harga</td>

                                                <td>$u->qty</td>

                                                <td>$u->subtotal</td>

                                               ";

                                                 $total = $total + $u->subtotal;
                                                 $ongkir = $ongkir + $ongkir;
                                                 $totpembayaran = $total + $ongkir;
                                               $no++;

                                                ?>

                                            </tr>



                                            <tr>



                                            <?php } ?>







                                            </tfoot>



                                </table>



                            </div>

                            </div>
                            <br>

<div class="form-group">

  <label for="inputEmail3" class="col-sm-4 control-label">Sub Total</label>

  <div class="col-sm-10">

    <input type="text" class="form-control" id="subtotal" style="border:none" placeholder="Sub total" value="<?php echo $total ?>">

  </div>

</div>

<div class="form-group">

  <label for="inputPassword3" class="col-sm-4 control-label">Ongkos Kirim</label>

  <div class="col-sm-10">

    <input type="text" class="form-control" id="ongkos" name="ongkos" placeholder="Ongkos" style="border:none" value="<?php echo $ongkir ?>">

  </div>

</div>

<div class="form-group">

  <label for="inputPassword3" class="col-sm-4 control-label">Total Keseluruhan</label>



  <div class="col-sm-10">

    <input type="text" class="form-control" id="total" name="total" placeholder="Total" style="border:none" value="<?php echo $totpembayaran ?>">

  </div>

</div>