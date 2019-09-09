<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Produk
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
        <h3 class="box-title">Daftar Produk</h3>
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
              <th>Deskripsi</th>
              <th>Ukuran</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Gambar</th>
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
                <td><?php echo $u->id_barang ?></td>
                
                <td><?php echo $u->nama_kategori ?></td>
                <td><?php echo $u->nama_barang ?></td>
                <td><?php echo $u->deskripsi ?></td>
                <td><?php echo $u->ukuran_brg ?></td>
                <td><?php echo $u->harga_brg ?></td>
                <td><?php echo $u->stok ?></td>
                <td><img src="<?php echo base_url('gambar/'.$u->gambar) ?>" width="100" height="100"></td>
                <td><?php echo "
                            <a class='btn btn-danger hapus' data-kode='".$u->id_barang."' >Hapus</a>  
                            <a 
                            href='javascript:;'
                            data-kode='".$u->id_barang."'
                            data-nama='".$u->nama_barang."'
                            data-deskripsi='".$u->deskripsi."'
                            data-ukuran='".$u->ukuran_brg."'
                            data-harga='".$u->harga_brg."'
                            data-berat_brg='".$u->berat_brg."'
                            data-kodeKategori='".$u->id_kategori."'
                            data-namaKategori='".$u->nama_kategori."'
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
            <!-- <div class="form-group">
              <label>ID Produk</label><span class="text-danger">*</span>
              <input name="kodeProduk" type="text" class="form-control" id="kodeProduk" tabindex="1" autofocus placeholder="Masukkan kode kategori anda" required="" />
            </div> -->
            <div class="form-group">
              <label>ID Kategori</label><span class="text-danger">*</span>
              <select class="form-control select2" style="width: 100%;" name="kodeKategori" id="kodeKategori">
                <option value="" selected="selected">Silakan Pilih</option>
                <?php
                foreach ($kategori as $t) {
                  echo "
                    <option value='".$t->kodeKategori."'>$t->nama_kategori</option>";
                }
                ?>
              </select>

            </div>
            <div class="form-group">
              <label>Nama Produk</label><span class="text-danger">*</span>
              <input name="nama" type="text" class="form-control" id="nama" tabindex="1" autofocus placeholder="Masukkan produk anda" required="" />
            </div>
            <div class="form-group">
              <label>Deskripsi</label><span class="text-danger">*</span>
              <input name="deskripsi" type="text" class="form-control" id="deskripsi" tabindex="1" autofocus placeholder="Masukkan deskripsi anda" required="" />
            </div>
            <div class="form-group">
              <label>Ukuran</label><span class="text-danger">*</span>
              <input name="ukuran" type="text" class="form-control" id="ukuran" tabindex="1" autofocus placeholder="Masukkan ukuran barang" required="" />
            </div>
            <div class="form-group">
              <label>Harga</label><span class="text-danger">*</span>
              <input name="harga" type="text" class="form-control" id="harga" tabindex="1" autofocus placeholder="Masukkan harga " required="" />
            </div>
            <div class="form-group">
              <label>Berat</label><span class="text-danger">*</span>
              <input name="berat" type="text" class="form-control" id="berat" tabindex="1" autofocus placeholder="Masukkan berat " required="" />
            </div>
            <div class="form-group">
              <label>Gambar</label><span class="text-danger">*</span>
              <input type="file" name="usefile"/>
           
            </div>
            <p>&nbsp;</p>

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
                                <option value='".$t->kodeKategori."'>$t->nama_kategori</option>";
                            }
                            ?>
                          </select>

                        </div>
                        <div class="form-group">
                          <label>Nama Produk</label><span class="text-danger">*</span>
                          <input name="kodes" type="hidden" class="form-control" id="kodes" placeholder="Masukkan produk anda"  />
                          <input name="nama" type="text" class="form-control" id="nama" tabindex="1" autofocus placeholder="Masukkan produk anda" required="" />
                        </div>
                        <div class="form-group">
                          <label>Deskripsi</label><span class="text-danger">*</span>
                          <input name="deskripsi" type="text" class="form-control" id="deskripsi" tabindex="1" autofocus placeholder="Masukkan deskripsi anda" required="" />
                        </div>
                        <div class="form-group">
                          <label>Ukuran</label><span class="text-danger">*</span>
                          <input name="ukuran" type="text" class="form-control" id="ukuran" tabindex="1" autofocus placeholder="Masukkan ukuran barang" required="" />
                        </div>
                        <div class="form-group">
                          <label>Harga</label><span class="text-danger">*</span>
                          <input name="harga" type="text" class="form-control" id="harga" tabindex="1" autofocus placeholder="Masukkan harga " required="" />
                        </div>
                        <div class="form-group">
                          <label>Berat</label><span class="text-danger">*</span>
                          <input name="berat" type="text" class="form-control" id="berat" tabindex="1" autofocus placeholder="Masukkan berat " required="" />
                        </div>
                        <div class="form-group">
                          <label>Gambar</label><span class="text-danger">*</span>
                          <input type="file" name="usefile"/>
                      
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
                modal.find('#deskripsi').attr("value",div.data('deskripsi'));
                modal.find('#ukuran').attr("value",div.data('ukuran'));
                modal.find('#berat').attr("value",div.data('berat_brg'));
                modal.find('#harga').attr("value",div.data('harga'));
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

