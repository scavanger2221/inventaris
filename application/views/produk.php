<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Barang
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Data Master</a></li>
      <li class="active">Produk</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->

    <!-- /.row -->

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Daftar Barang</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">


        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>ID Produk</th>
              <th>Kategori</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($produk as $u) {
              ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $u->id ?></td>
                
                <td><?php echo $u->kategori ?></td>
                <td><?php echo $u->nama_barang ?></td>
                <td><?php echo $u->harga ?></td>
                <td><?php echo $u->jumlah ?></td>
               
                <td><?php echo "
                            <a class='btn btn-danger hapus' data-kode='".$u->id."' >Hapus</a>  
                            <a 
                            href='javascript:;'
                            data-kode='".$u->id."'
                            data-nama='".$u->nama_barang."'
                        
                  
                            data-harga='".$u->harga."'
                            data-jumlah='".$u->jumlah."' 
                            data-kodeKategori='".$u->kode_kategori."'
                            data-namaKategori='".$u->kategori."'
                            <button  data-toggle='modal' data-target='#modal-edit' class='btn btn-info'>Ubah</button></a>"
                  ?></td>
              </tr>
              <?php } ?>

              </tfoot>
        </table>
        <a class="btn btn-danger" data-toggle="modal" data-target="#tambah-satuan">Tambah Produk</a>
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
        <h4 class="modal-title" id="myModalLabel">Tambah Produk</h4>
      </div>
      <div class="modal-body">
        <!-- Form Layout Row Start -->

        <div class="form-validation-box">
          <div class="form-wrap">
          <?php echo form_open_multipart('DataMaster/tambah_produk'); ?>
              <div class="form-group">
                <label>ID Kategori</label><span class="text-danger">*</span>
                <select class="form-control select2" style="width: 100%;" name="kodeKategori" id="kodeKategori">
                  <option value="" selected="selected">Silakan Pilih</option>
                  <?php
                  foreach ($kategori as $t) {
                    echo "
                      <option value='".$t->kode."'>$t->kategori</option>";
                  }
                  ?>
                </select>

              </div>
              <div class="form-group">
                <label>Nama Barang</label><span class="text-danger">*</span>
                <input name="kodes" type="hidden" class="form-control" id="kodes" placeholder="Masukkan produk anda"  />
                <input name="nama" type="text" class="form-control" id="nama" tabindex="1" autofocus placeholder="Masukkan produk anda" required="" />
              </div>
         
             
              <div class="form-group">
                <label>Harga</label><span class="text-danger">*</span>
                <input name="harga" type="text" class="form-control" id="harga" tabindex="1" autofocus placeholder="Masukkan harga " required="" />
              </div>
              <div class="form-group">
                <label>Jumlah</label><span class="text-danger">*</span>
                <input name="jumlah" type="text" class="form-control" id="jumlah" tabindex="1" autofocus placeholder="Masukkan harga " required="" />
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
                    <?php echo form_open_multipart('DataMaster/edit_produk'); ?>
                        <div class="form-group">
                          <label>ID Kategori</label><span class="text-danger">*</span>
                          <select class="form-control select2" style="width: 100%;" name="kodeKategori" id="kodeKategori">
                            <option value="" selected="selected">Silakan Pilih</option>
                            <?php
                            foreach ($kategori as $t) {
                              echo "
                                <option value='".$t->kode."'>$t->kategori</option>";
                            }
                            ?>
                          </select>

                        </div>
                        <div class="form-group">
                          <label>Nama Barang</label><span class="text-danger">*</span>
                          <input name="kodes" type="hidden" class="form-control" id="kode" placeholder="Masukkan produk anda"  />
                          <input name="nama" type="text" class="form-control" id="nama" tabindex="1" autofocus placeholder="Masukkan produk anda" required="" />
                        </div>
                   
                       
                        <div class="form-group">
                          <label>Harga</label><span class="text-danger">*</span>
                          <input name="harga" type="text" class="form-control" id="harga" tabindex="1" autofocus placeholder="Masukkan harga " required="" />
                        </div>
                        <div class="form-group">
                          <label>Jumlah</label><span class="text-danger">*</span>
                          <input name="jumlah" type="text" class="form-control" id="jumlah" tabindex="1" autofocus placeholder="Masukkan harga " required="" />
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
 $(document).ready(function() {
	        // Untuk sunting
	        $('#modal-edit').on('show.bs.modal', function (event) {
	            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
	            var modal= $(this)
         var kate = div.data('kodekategori');
	            // Isi nilai pada field
                modal.find('#kode').attr("value",div.data('kode'));
                modal.find('#nama').attr("value",div.data('nama'));
    
                modal.find('#harga').attr("value",div.data('harga'));   
                modal.find('#jumlah').attr("value",div.data('jumlah'));
                // modal.find('#kodeKategori').append($("<option>kategoris</option>").attr("value",div.data('kategori').text(value));
       
                modal.find('#kodeKategori').prepend("<option value='"+div.data('kodekategori')+"' selected>"+div.data('namakategori')+"</option>").attr('value',"bla bla bla");
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

