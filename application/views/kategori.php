
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kategori
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Data Master</a></li>
        <li class="active">Kategori</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->

      <!-- /.row -->

      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Kategori</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

           
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Kategori</th>
                  <th>Nama</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
		$no = 1;
		foreach($kategori as $u){ 
		?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $u->kode ?></td>
                  <td><?php echo $u->kategori ?></td>
                  <td><?php echo "
                            <a class='btn btn-danger hapus'   data-kode='".$u->kode."' >Hapus</a>  
                            <a 
                            href='javascript:;'
                            data-kode='".$u->kode."'
                            data-nama='".$u->kategori."'
                            <button  data-toggle='modal' data-target='#modal-edit' class='btn btn-info'>Ubah</button></a>"
                  ?></td>
                </tr>
    <?php } ?>
               
                </tfoot>
              </table>
              <a class="btn btn-danger" data-toggle="modal" data-target="#tambah-satuan">Tambah kategori</a>
            </div>
       
</div>
         

    </section>
    <!-- /.content -->
  </div>



  <!-- End Advance Table Row -->
<div class="modal fade" id="tambah-satuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Kategori</h4>
            </div>
            <div class="modal-body">
                <!-- Form Layout Row Start -->

                <div class="form-validation-box">
                    <div class="form-wrap">
                        <form action="<?php echo base_url(). 'DataMaster/tambah_kategori'; ?>"data-parsley-validate method="post">

                            <div class="form-group">
                                <label>ID Kategori</label><span class="text-danger">*</span>
                                <input name="kode" type="text" class="form-control" id="kode" tabindex="1" autofocus placeholder="Masukkan kode kategori anda" required="" />
                            </div>
                            <div class="form-group">
                                <label>Nama Kategori</label><span class="text-danger">*</span>
                                <input name="nama" type="text" class="form-control" id="nama" tabindex="1" autofocus placeholder="Masukkan alamat anda" required="" />
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
                <h4 class="modal-title" id="myModalLabel">Edit Kategori</h4>
            </div>
            <div class="modal-body">
                <!-- Form Layout Row Start -->

                <div class="form-validation-box">
                    <div class="form-wrap">
                        <form action="<?php echo base_url(). 'DataMaster/edit_kategori'; ?>"data-parsley-validate method="post">

                            <div class="form-group">
                                <label>ID Kategori</label><span class="text-danger">*</span>
                                <input name="kode" type="text" class="form-control" id="kode" tabindex="1" autofocus placeholder="Masukkan kode kategori anda" required="" readonly />
                            </div>
                            <div class="form-group">
                                <label>Nama Kategori</label><span class="text-danger">*</span>
                                <input name="nama" type="text" class="form-control" id="nama" tabindex="1" autofocus placeholder="Masukkan alamat anda" required="" />
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
  

<script type="text/javascript">
 $(document).ready(function() {
	        // Untuk sunting
	        $('#modal-edit').on('show.bs.modal', function (event) {
	            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
	            var modal= $(this)

	            // Isi nilai pada field
                modal.find('#kode').attr("value",div.data('kode'));
                modal.find('#nama').attr("value",div.data('nama'));
	        });
	    });



      $(".hapus").click(function(e) {
          e.preventDefault();
          var kode = $(this).attr('data-kode');
          Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            Swal.fire({
              title: 'Deleted!',
              text: 'Your file has been deleted.',
              type: 'success',
              showCancelButton: false, // There won't be any cancel button
              showConfirmButton: false // There won't be any confirm button
            })
            window.location = "<?php echo base_url('DataMaster/hapus_kategori/') ?>" +kode;
           
          }
        })
          
      });
         
</script>

