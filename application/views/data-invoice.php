<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            Pemesanan

            <small>Control panel</small>

        </h1>

        <ol class="breadcrumb">

            <li><a href="#"><i class="fa fa-dashboard"></i> Transaksi</a></li>

            <li class="active">Pemesanan</li>

        </ol>

    </section>



    <!-- Main content -->

    <section class="content">

        <!-- Small boxes (Stat box) -->



        <!-- /.row -->



        <div class="box">

            <div class="box-header">

                <h3 class="box-title">Daftar Pemesanan</h3>

            </div>

            <!-- /.box-header -->

            <div class="box-body">





                <table id="example1" class="table table-bordered table-striped">

                    <thead>

                        <tr>

                            <th>No</th>

                            <th>No Invoice</th>

                            <th>Nama</th>

                            <th>Tgl Bayar</th>

                            <th>Kurir</th>

                            <th>Ongkir</th>
                            <th>No Resi</th>

                            <th>Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php

                        $no = 1;

                        foreach ($pemesanan as $u) {
                            if($u->status == 'Paid'){
                            ?>

                            <tr>

                                <td><?php echo $no++ ?></td>

                                <td><?php echo $u->id_pemesanan ?></td>

                                <td><?php echo $u->nama_pemesan ?></td>

                                <td><?php echo $u->tgl_pembayaran ?></td>

                                <td><?php echo $u->kurir ?></td>

                                <td><?php echo $u->ongkir ?></td>
                                <td><?php echo $u->no_resi ;
                                                    if($u->no_resi == ''){
                                                        $ket = 'plus';
                                                        $st = 'success';
                                                    }else {
                                                       
                                                        $ket = 'pencil';
                                                        $st = 'danger';
                                                    }
                                ?></td>
                                <td><?php echo "
                                    <a href='javascript:;' 
                                        data-id_pemesanan='".$u->id_pemesanan."' 
                                        data-nama='".$u->nama_pemesan."'
                                        data-alamat='".$u->alamat_pemesanan."' 
                                        data-telp='".$u->nohp_pemesan."' 
                                        data-bukti='".$u->bukti_trf."' 
                                        data-tgl='".$u->tgl_pemesanan."' 
                                        data-email='".$u->email_konsumen."' 
                                        
                                        <button title='Lihat Detail Pemesanan'  data-toggle='modal' data-target='#modal-edit' class='btn btn-info'><i class='fa fa-eye' aria-hidden='true'></i></button></a> 
                                       
                                       
                                        <a href='javascript:;' 
                                        data-id_pemesanan='".$u->id_pemesanan."' 
                                        data-resi='".$u->no_resi."'
                                        
                                        <button title='Input Resi'  data-toggle='modal' data-target='#modal-resi' class='btn btn-".$st."'><i class='fa fa-".$ket."' aria-hidden='true'></i></button></a>   
                                       "?>

                            </tr>

                            <?php   }
                                
                      } ?>



                            </tfoot>

                </table>

                <!-- <a class="btn btn-danger" data-toggle="modal" data-target="#tambah-satuan">Tambah Pemesanan</a> -->

            </div>



        </div>





    </section>

    <!-- /.content -->

</div>







<!-- End Advance Table Row -->
<div class="modal fade" id="modal-edit" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                <center>

                    <h4 class="modal-title" id="myModalLabel"><b>Pemesanan</b></h4>

                </center>

            </div>

            <div class="modal-body">

                <!-- Form Layout Row Start -->



                <div class="form-validation-box">

                    <div class="box-header">

                    </div>

                    <!-- /.box-header -->

                    <div class="box-body">
                        <div class="form-wrap">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No Order</label><span class="text-danger"></span>
                                        <input name="id_pemesanan" type="text" class="form-control" id="id_pemesanan" tabindex="1" autofocus placeholder="Masukkan kode Pemesanan anda" required="" />
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alamat</label><span class="text-danger"></span>
                                        <input name="alamat" type="text" class="form-control" id="alamat" tabindex="1" autofocus placeholder="Masukkan alamat anda" required="" />
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama</label><span class="text-danger"></span>
                                        <input name="nama" type="text" class="form-control" id="nama" tabindex="1" autofocus placeholder="Masukkan kode Pemesanan anda" required="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telp</label><span class="text-danger"></span>
                                        <input name="telp" type="text" class="form-control" id="telp" tabindex="1" autofocus placeholder="Masukkan alamat anda" required="" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Email</label><span class="text-danger"></span>

                                        <input name="email" type="text" class="form-control" id="email" tabindex="1" autofocus placeholder="Masukkan kode Pemesanan anda" required="" />

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Tanggal Order</label><span class="text-danger"></span>

                                        <input name="tgl" type="text" class="form-control" id="tgl" tabindex="1" autofocus placeholder="Masukkan alamat anda" required="" />

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>Bukti</label><span class="text-danger"></span>
<br>
                                        <!-- <input name="bukti" type="text" class="form-control" id="bukti" tabindex="1" autofocus placeholder="Masukkan bukti Pemesanan anda" required="" /> -->
                                        <img name="bukti" id="bukti" height="200" widht="200">
                                    </div>

                                </div>

                            </div>

                            <p>&nbsp;</p>

                        </div>

                        <div class="box">

                            <div class="box-header">

                                <h3 class="box-title">Produk Yang Diorder</h3>

                            </div>

                            <!-- /.box-header -->
<br>
                            <div id="detailpemesanan" ></div>


                        

                    </div>

                    <div class="modal-footer">

                        <!-- Beri id "btn-simpan" untuk tombol simpan nya -->
                        <!-- <button type="button" class="btn btn-success" >Verifikasi</button>
                        <br>
                        <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button> -->

                    </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>


<?php echo form_open_multipart('Transaksi/inputResi'); ?>
<div class="modal fade" id="modal-resi" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                <center>

                    <h4 class="modal-title" id="myModalLabel"><b>Pemesanan</b></h4>

                </center>

            </div>

            <div class="modal-body">

                <!-- Form Layout Row Start -->



                <div class="form-validation-box">

                    <div class="box-header">

                    </div>

                    <!-- /.box-header -->

                    <div class="box-body">
                        <div class="form-wrap">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No Order</label><span class="text-danger"></span>
                                        <input name="id_pemesanan" type="text" class="form-control" id="id_pemesanan" tabindex="1" autofocus placeholder="Masukkan kode Pemesanan anda" required="" readonly />
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No Resi</label><span class="text-danger"></span>
                                        <input name="resi" type="text" class="form-control" id="resi" tabindex="1" autofocus placeholder="Masukkan resi anda" required="" />
                                    </div>
                                </div>

                            </div>


                            <p>&nbsp;</p>

                        </div>



                    <div class="modal-footer">

                        <!-- Beri id "btn-simpan" untuk tombol simpan nya -->
                        <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-danger" value="Simpan" name="Submit" tabindex="3" />

                    </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
<?php echo form_close(); ?>


	<script>
	    $(document).ready(function() {
	        // Untuk sunting
	        $('#modal-edit').on('show.bs.modal', function (event) {
	            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
	            var modal= $(this)

	            // Isi nilai pada field
                modal.find('#id_pemesanan').attr("value",div.data('id_pemesanan'));
	            modal.find('#nama').attr("value",div.data('nama'));
                modal.find('#alamat').attr("value",div.data('alamat'));
                modal.find('#telp').attr("value",div.data('telp'));
                modal.find('#bukti').attr("src","<?php echo base_url().'gambar/'?>"+div.data('bukti'));
                modal.find('#tgl').attr("value",div.data('tgl'));
                modal.find('#email').attr("value",div.data('email'));

                var data = "<?php echo base_url()?>Transaksi/vDetailPemesanan/"+div.data('id_pemesanan');
	            $('#detailpemesanan').load(data);
                // alert(data);
	        });
	    });

        $(document).ready(function() {
	        // Untuk sunting
	        $('#modal-resi').on('show.bs.modal', function (event) {
	            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
	            var modal= $(this)

	            // Isi nilai pada field
                modal.find('#id_pemesanan').attr("value",div.data('id_pemesanan'));
	            modal.find('#resi').attr("value",div.data('resi'));
        
                // alert(data);
	        });
	    });
	</script>