
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->

      <!-- /.row -->

      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

           
            <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Akses</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    foreach($user as $u){ 
                    ?>
                            <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $u->username ?></td>
                            <td> <?php if($u->admin){
                                echo "Admin"; }else{
                                    echo "User";
                                }
                            ?></td>
                            <td><?php echo "
                                        <a class='btn btn-danger hapus' id='hapus' data-kode='".$u->id."'>Hapus</a>  
                                        <a 
                                        href='javascript:;'
                                        data-id='".$u->id."'
                                        data-username='".$u->username."'
                                        <button  data-toggle='modal' data-target='#modal-edit' class='btn btn-info'>Ubah</button></a>"
                            ?></td>
                            </tr>
                <?php } ?>
        </tbody>
               
              </table>
              <a class="btn btn-danger" data-toggle="modal" data-target="#tambah-satuan">Tambah User</a>
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
                <h4 class="modal-title" id="myModalLabel">Tambah Satuan</h4>
            </div>
            <div class="modal-body">
                <!-- Form Layout Row Start -->

                <div class="form-validation-box">
                    <div class="form-wrap">
                        <form action="<?php echo base_url(). 'DataMaster/tambah_user'; ?>"data-parsley-validate method="post">

                            <div class="form-group">
                                <label>Nama User</label><span class="text-danger">*</span>
                                <input name="nama" type="text" class="form-control" id="nama" tabindex="1" autofocus placeholder="Masukkan nama anda" required="" />
                            </div>
                            <div class="form-group">
                                <label>Alamat User</label><span class="text-danger">*</span>
                                <input name="alamat" type="text" class="form-control" id="alamat" tabindex="1" autofocus placeholder="Masukkan alamat anda" required="" />
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input name="username" type="text" class="form-control" id="username" tabindex="2" placeholder="Masukkan username" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" type="password" class="form-control" id="password" tabindex="3" placeholder="Masukkan password" />
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

  <!-- End Advance Table Row -->
<div class="modal fade" id="tambah-satuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Satuan</h4>
            </div>
            <div class="modal-body">
                <!-- Form Layout Row Start -->

                <div class="form-validation-box">
                    <div class="form-wrap">
                        <form action="<?php echo base_url(). 'DataMaster/tambah_user'; ?>"data-parsley-validate method="post">

                            <div class="form-group">
                                <label>Nama User</label><span class="text-danger">*</span>
                                <input name="nama" type="text" class="form-control" id="nama" tabindex="1" autofocus placeholder="Masukkan nama anda" required="" />
                            </div>
                            <div class="form-group">
                                <label>Alamat User</label><span class="text-danger">*</span>
                                <input name="alamat" type="text" class="form-control" id="alamat" tabindex="1" autofocus placeholder="Masukkan alamat anda" required="" />
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input name="username" type="text" class="form-control" id="username" tabindex="2" placeholder="Masukkan username" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" type="password" class="form-control" id="password" tabindex="3" placeholder="Masukkan password" />
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
  

<div aria-hidden="true" class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                <h4 class="modal-title" id="myModalLabel">Ganti Akses User</h4>

            </div>

            <div class="modal-body">

                <!-- Form Layout Row Start -->


                <div class="form-validation-box">

                    <div class="form-wrap">

                        <form action="<?php echo base_url(). 'DataMaster/edit_user'; ?>" id="form-edit" data-parsley-validate method="post">
                      
                            <div class="form-group">
                                <label>Username</label>
                                <input name="id" type="hidden" class="form-control" id="id" tabindex="2"/>
                                <input name="username" type="text" class="form-control" id="username" tabindex="2" placeholder="Masukkan username" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" type="password" class="form-control" id="password" tabindex="3" placeholder="Masukkan password" />
                                <p>* Masukkan password jika akan merubah password user </p>
                            </div>
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

<script>
 $(document).ready(function() {
	        // Untuk sunting
	        $('#modal-edit').on('show.bs.modal', function (event) {
	            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
	            var modal= $(this)

	            // Isi nilai pada field
                modal.find('#id').attr("value",div.data('id'));
                modal.find('#username').attr("value",div.data('username'));
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
            window.location = "<?php echo base_url('DataMaster/hapus_user/') ?>" +kode;
           
          }
        })
          
      });
    </script>