

<!-- Select2 -->



  <!-- Select2 -->

  <link rel="stylesheet" href="<?php echo base_url('assets/admin/bower_components/select2/dist/css/select2.min.css')?>">

<script src="<?php echo base_url('assets/admin/bower_components/select2/dist/js/select2.full.min.js')?>"></script>

<script>

     $(function () {

    //Initialize Select2 Elements

        $('.select2').select2().on("change", function (e) {

            var kode=$(this).val();

                $.ajax({

                    type : "POST",

                    url  : "<?php echo base_url('Transaksi/get_barang')?>",

                    dataType : "JSON",

                    data : {kode: kode},

                    cache:false,

                    success: function(data){

                        $.each(data,function(id_barang, nama_barang, nama_kategori){

                            $('[name="nama_barang"]').val(data.nama_barang);

                            $('[name="nama_kategori"]').val(data.nama_kategori);

                             

                        });

                         

                    }

                });

                return false;

});

     });

</script>





  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Stok

        <small>Control panel</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Transaksi</a></li>

        <li class="active">Stok</li>

      </ol>

    </section>



    <!-- Main content -->

    <section class="content">

      <!-- Small boxes (Stat box) -->



      <!-- /.row -->



      <div class="box">

            <div class="box-header">

              <h3 class="box-title">Daftar Stok</h3>

            </div>

            <!-- /.box-header -->

            <div class="box-body">



           

              <table id="example1" class="table table-bordered table-striped">

                <thead>

                <tr>

                  <th>No</th>

                  <th>ID Produk</th>

                  <th>Nama</th>

                  <th>Kategori</th>

                  <th>Ukuran</th>

                  <th>Tanggal</th>

                  <th>Qty</th>

                  <th>Action</th>

                </tr>

                </thead>

                <tbody>

                <?php 

		$no = 1;

		foreach($stok as $u){ 

		?>

                <tr>

                  <td><?php echo $no++ ?></td>

                  <td><?php echo $u->id_barang ?></td>

                  <td><?php echo $u->nama_barang?></td>

                  <td><?php echo $u->nama_kategori?></td>

                  <td><?php echo $u->ukuran_brg?></td>

                  <td><?php echo $u->tglbelanja?></td>

                  <td><?php echo $u->qty?></td>

                  <td><?php echo "

                            <a 

                            href='javascript:;'

                            data-kode='".$u->id_barang."'

                            data-nama='".$u->nama_barang."'

                            data-qty='".$u->qty."'

                            <button  data-toggle='modal' data-target='#modal-edit' class='btn btn-info'>Ubah</button></a>"

                  ?></td>

                </tr>

    <?php } ?>

               

                </tfoot>

              </table>

              <a class="btn btn-danger" data-toggle="modal" data-target="#tambah-satuan">Tambah Stok</a>

            </div>

       

</div>

         



    </section>

    <!-- /.content -->

  </div>







  <!-- End Advance Table Row -->

<div class="modal fade" id="tambah-satuan" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                <h4 class="modal-title" id="myModalLabel">Tambah Stok</h4>

            </div>

            <div class="modal-body">

                <!-- Form Layout Row Start -->



                <div class="form-validation-box">

                    <div class="form-wrap">

                        <form action="<?php echo base_url(). 'Transaksi/tambah_stok'; ?>"data-parsley-validate method="post">



                            <div class="form-group">

                                <label>ID Produk</label><span class="text-danger">*</span>

                                <div class="form-group">

              

                        <select class="form-control select2" style="width: 100%;" name="kode" id="kode">

                        <?php foreach($produk as $p){ ?>

                        <option value="<?php echo $p->id_barang?>"><?php echo $p->id_barang ." / ".$p->nama_barang ." / ". $p->ukuran_brg ?></option>

       

                        <?php } ?>

                        </select>

                    </div>

                            </div>

                            <div class="form-group">

                                <label>Nama Produk</label><span class="text-danger">*</span>

                                <input  type="text" name="nama_barang" class="form-control"  tabindex="1" autofocus readonly />

                            </div>

                            <div class="form-group">

                                <label>Satuan</label><span class="text-danger">*</span>

                                <input  type="text" name="nama_kategori" class="form-control" tabindex="1" autofocus readonly />

                            </div>

                            <div class="form-group">

                                <label>Tanggal Masuk</label><span class="text-danger">*</span>

                                <input  type="date" name="tglbelanja" class="form-control" tabindex="1" autofocus  />

                            </div>

                            <div class="form-group">

                                <label>Qty</label><span class="text-danger">*</span>

                                <input type="text" name="qty" class="form-control" tabindex="1" autofocus placeholder="Masukkan jumlah barang"  />

                            </div>

                            <p>&nbsp;</p>



                    </div>

                    <div class="modal-footer">

                        <!-- Beri id "btn-simpan" untuk tombol simpan nya -->

                        <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>

                        <input type="submit" class="btn btn-danger" value="Simpan" name="Submit" tabindex="3" />



                    </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>







<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                <h4 class="modal-title" id="myModalLabel">Edit Produk</h4>

            </div>

            <div class="modal-body">

                <!-- Form Layout Row Start -->



                <div class="form-validation-box">

                    <div class="form-wrap">

                    <?php echo form_open_multipart('Transaksi/updateStok'); ?>

                   

                        <div class="form-group">

                          <label>Nama Produk</label><span class="text-danger">*</span>

                          <input name="kode" type="hidden" class="form-control" id="kode" placeholder="Masukkan produk anda"  />

                          <input name="nama" type="text" class="form-control" id="nama" tabindex="1" autofocus placeholder="Masukkan produk anda" required="" readonly/>

                        </div>

                        <div class="form-group">

                          <label>Qty Stock</label><span class="text-danger">*</span>

                          <input name="qty" type="text" class="form-control" id="qty" tabindex="1" autofocus  required="" />

                        </div>

                       



                    </div>

                    <div class="modal-footer">

                        <!-- Beri id "btn-simpan" untuk tombol simpan nya -->

                        <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>

                        <input type="submit" class="btn btn-danger" value="Simpan" name="Submit" tabindex="3" />



                    </div>

                    <?php echo form_close(); ?>

                </div>

            </div>

        </div>

    </div>

</div>

  





<script type="text/javascript">

        $(document).ready(function(){

             $('.kode').live('change', function(){

                 

             

           });

 

        });



        $(document).ready(function() {

	        // Untuk sunting

	        $('#modal-edit').on('show.bs.modal', function (event) {

	            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan

	            var modal= $(this)

         var kate = div.data('kodekategori');

	            // Isi nilai pada field

                modal.find('#kode').attr("value",div.data('kode'));

                modal.find('#nama').attr("value",div.data('nama'));

                modal.find('#qty').attr("value",div.data('qty'));

             

	        });

	    });



    </script>