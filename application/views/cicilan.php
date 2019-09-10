<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Cicilan
      <small>Management Cicilan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Data Master</a></li>
      <li class="active">Cicilan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->

    <!-- /.row -->

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Daftar Cicilan</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Kategori</th>
              <th>Nama Produk</th>
              <th>Harga Satuan</th>
              <th>Harga Bayar</th>
              <th>Tanggal Beli</th>
              <th>Lama (Bulan)</th>
              <th>Jumlah</th>
              <th>Status</th>
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
                <td><?php echo $u->kategori ?></td>
                <td><?php echo $u->nama_barang ?></td>
                <td><?php echo $u->harga_satuan ?></td>
                <td><?php echo $u->harga_total ?></td>
                <td><?php echo $u->tgl_cicilan ?></td>
                <td><?php echo $u->lama ?></td>
                <td><?php echo $u->jumlah_beli ?></td>
                <td><?php if ($u->sisa_bayar <= 0) {
                        echo "<p class='text-success'><b>LUNAS</b></p>";
                      } else {
                        echo "<p class='text-danger'>Belum Lunas</p>";
                      }  ?></td>

                <td><?php
                      $btnEdit = "<a 
                    href='javascript:;'
                    data-id-cicilan='" . $u->id_cicilan . "'
                    data-kode-barang='" . $u->id_barang . "'
                    data-harga-satuan='" . $u->harga_satuan . "'
                    data-harga-bayar='" . $u->harga_total . "'
                    data-jumlah='" . $u->jumlah_beli . "' 
                    data-tanggal='" . $u->tgl_cicilan . "'
                    data-lama='" . $u->lama . "'
                    <button  data-toggle='modal' data-target='#modal-edit' class='btn btn-info'>Ubah</button></a>";
                      if ($u->is_uneditable) {
                        $btnEdit = "<button class='btn btn-info' disabled=''>Ubah</button>";
                      }
                      echo "
                            <a class='btn btn-danger hapus' data-kode='" . $u->id_cicilan . "' >Hapus</a>  
                            $btnEdit"
                      ?></td>
              </tr>
            <?php } ?>

            </tfoot>
        </table>
        <a class="btn btn-danger" data-toggle="modal" data-target="#tambah-satuan">
          <i class="fa fa-shopping-cart"></i> Pembelian Baru
        </a>
        <!-- <a class="btn btn-danger" data-toggle="modal" data-target="#tambah-satuan">Tambah Produk</a> -->
      </div>

    </div>


  </section>
  <!-- /.content -->
</div>

<div class="modal fade" id="tambah-satuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Pembelian</h4>
      </div>
      <div class="modal-body">
        <!-- Form Layout Row Start -->

        <div class="form-validation-box">
          <div class="form-wrap">
            <?php echo form_open_multipart('DataMaster/add_cicilan') ?>
            <div class="form-group">
              <label>Barang</label><span class="text-danger">*</span>
              <select class="form-control select2" style="width: 100%;" name="kodeBarangAdd" id="kodeBarangAdd" onChange="return fill_data()">
                <option value="">Silakan Pilih</option>
                <?php
                foreach ($barang as $t) {
                  echo "<option data-harga='" . $t->harga . "' value='" . $t->id . "'>$t->nama_barang</option>";
                }
                ?>
              </select>

            </div>

            <div class="form-group">
              <label>Tanggal Beli</label><span class="text-danger">*</span>
              <input name="tanggalBeliAdd" type="Date" class="form-control" id="tanggalBeliAdd" tabindex="1" autofocus placeholder="Tanggal Beli " required="" />
            </div>

            <div class="form-group">
              <label>Harga Satuan </label><span class="text-danger">*</span>
              <i class="fa fa-exclamation-circle text-warning">Jika harga satuan berbeda dengan harga sebelumnya maka data barang akan diupdate otomatis</i>
              <input name="hargaSatuanAdd" type="number" class="form-control" id="hargaSatuanAdd" tabindex="1" autofocus placeholder="Masukkan harga satuan " required="" />
            </div>

            <div class="form-group">
              <label>Lama(Bulan)</label><span class="text-danger">*</span>
              <input name="lamaAdd" type="number" class="form-control" id="lamaAdd" tabindex="1" autofocus placeholder="Masukkan lama cicilan " required="" />
            </div>


            <div class="form-group">
              <label>Jumlah</label><span class="text-danger">*</span>
              <input name="jumlahAdd" type="text" class="form-control" id="jumlahAdd" tabindex="1" autofocus placeholder="Masukkan Jumlah Beli " required="" onkeyup="return count_price();" />
            </div>

            <div class="form-group">
              <label>Harga Bayar</label><span class="text-danger">*</span>
              <input name="hargaBayarAdd" type="number" class="form-control" id="hargaBayarAdd" tabindex="1" autofocus placeholder="Masukkan harga bayar" required="" />
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


<!-- End Advance Table Row -->
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
            <?php echo form_open_multipart('DataMaster/edit_cicilan') ?>
            <input type="hidden" value="*" name="idCicilan" id="idCicilan">

            <div class="form-group">
              <label>Barang</label><span class="text-danger">*</span>
              <select class="form-control select2" style="width: 100%;" name="kodeBarang" id="kodeBarang">
                <option value="">Silakan Pilih</option>
                <?php
                foreach ($barang as $t) {
                  echo "<option value='" . $t->id . "'>$t->nama_barang</option>";
                }
                ?>
              </select>

            </div>


            <div class="form-group">
              <label>Tanggal Beli</label><span class="text-danger">*</span>
              <input name="tanggalBeli" type="Date" class="form-control" id="tanggalBeli" tabindex="1" autofocus placeholder="Tanggal Beli " required="" />
            </div>

            <div class="form-group">
              <label>Harga Satuan</label><span class="text-danger">*</span>
              <input name="hargaSatuan" type="number" class="form-control" id="hargaSatuan" tabindex="1" autofocus placeholder="Masukkan harga satuan " required="" />
            </div>

            <div class="form-group">
              <label>Harga Bayar</label><span class="text-danger">*</span>
              <input name="hargaBayar" type="number" class="form-control" id="hargaBayar" tabindex="1" autofocus placeholder="Masukkan harga bayar" required="" />
            </div>

            <div class="form-group">
              <label>Lama</label><span class="text-danger">*</span>
              <input name="lama" type="number" class="form-control" id="lama" tabindex="1" autofocus placeholder="Masukkan lama cicilan " required="" />
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
    $('#modal-edit').on('show.bs.modal', function(event) {
      var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
      var modal = $(this)
      var kate = div.data('kodekategori');
      // Isi nilai pada field

      $('#kodeBarang').val(div.data('kode-barang'));
      modal.find('#idCicilan').attr("value", div.data('id-cicilan'));
      modal.find('#nama').attr("value", div.data('nama'));
      modal.find('#hargaBayar').attr("value", div.data('harga-bayar'));
      modal.find('#hargaSatuan').attr("value", div.data('harga-satuan'));
      modal.find('#tanggalBeli').attr("value", div.data('tanggal'));
      modal.find('#lama').attr("value", div.data('lama'));
      modal.find('#jumlah').attr("value", div.data('jumlah'));
      // modal.find('#kodeKategori').append($("<option>kategoris</option>").attr("value",div.data('kategori').text(value));

      modal.find('#kodeKategori').prepend("<option value='" + div.data('kodekategori') + "' selected>" + div.data('namakategori') + "</option>").attr('value', "bla bla bla");
    });
  });

  function fill_data() {
    var kode_barang = document.getElementById('kodeBarangAdd');

    var index_selected = kode_barang.options[kode_barang.selectedIndex];

    var text_box_harga = document.getElementById('hargaSatuanAdd');

    var harga = index_selected.getAttribute("data-harga");

    text_box_harga.value = harga;
  };

  function count_price() {
    var txtJumlah = document.getElementById('jumlahAdd');
    var txtTotalBayar = document.getElementById('hargaBayarAdd');
    var txtPrice = document.getElementById('hargaSatuanAdd');

    txtTotalBayar.value = (txtPrice.value) * (txtJumlah.value);
  };

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
        window.location = "<?php echo base_url('DataMaster/remove_cicilan/') ?>" + kode;

      }
    })
  });
</script>