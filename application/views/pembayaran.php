<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Pembayaran <small>Pembayaran Cicilan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Data Master</a></li>
            <li class="active">Pembayaran</li>
        </ol>
    </section>
    <section class="content">
        <!-- Small boxes (Stat box) -->

        <!-- /.row -->

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar Barang Cicilan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="box-body">
                    <a class="btn btn-success" href="<?php echo base_url("Pembayaran/vHistoryBayar"); ?>">Lihat semua history cicilan</a>

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Barang</th>
                                <th>Tanggal Beli</th>
                                <th>Lama/Sisa(Bulan)</th>
                                <th>Harga Total</th>
                                <th>Sisa Cicilan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data_bayar as $u) {
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $u->kategori ?></td>
                                    <td><?php echo $u->nama_barang ?></td>
                                    <td><?php echo $u->tgl_cicilan ?></td>
                                    <td><?php echo $u->lama . "/" . $u->sisa_bulan ?></td>
                                    <td><?php echo $u->harga_total ?></td>
                                    <td><?php echo $u->sisa_bayar ?></td>
                                    <td>
                                        <?php
                                            $textBtnTerbayar = "Terbayar";
                                            if ($u->sisa_bayar <= 0)
                                                $textBtnTerbayar = "LUNAS";
                                            $btnBayar = "<button  data-toggle='modal' data-target='#modal-edit' class='btn btn-info'>Bayar</button></a>";
                                            if ($u->is_paid)
                                                $btnBayar = "<button class='btn btn-danger' disabled=''>$textBtnTerbayar</button></a>";
                                            echo "
                                        <a href='javascript:;'
                                        data-id-cicilan='" . $u->id_cicilan . "'
                                        data-bayar-bulanan='" . ($u->harga_total / $u->lama) . "'
                                        $btnBayar
                                        <a href='" . base_url() . "Pembayaran/vHistoryBayar/$u->id_cicilan'  data-toggle='modal' class='btn btn-success'>Lihat Pembayaran</button></a>";
                                            ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </section>
</div>

<!-- MODAL PEMBAYARAN -->

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h1 class="modal-title" id="myModalLabel">Bayar Cicilan</h1>
                <h4 class="modal-subtitle" id="modalSubtitle">Apakah anda yakin akan membayar cicilan bulan ini?</h4>
                <i class="fa fa-exclamation-circle text-warning"> Cicilan yang telah dibayar tidak dapat diedit lagi</i>
            </div>
            <div class="modal-body">


                <div class="form-validation-box">
                    <div class="form-wrap">
                        <?php echo form_open_multipart('Pembayaran/Bayar') ?>

                        <input type="hidden" value="*" name="idCicilan" id="idCicilan">

                        <div class="form-group">
                            <label>Tanggal</label><span class="text-danger"></span>
                            <input name="tanggalBayar" type="text" class="form-control" id="tanggalBayar" tabindex="1" autofocus value="<?php echo date('d F Y'); ?>" readonly="true" />
                        </div>

                        <div class="form-group">
                            <label>Bayar</label><span class="text-danger">*</span>
                            <input name="bayar" type="number" class="form-control" id="bayar" readonly="" tabindex="1" autofocus placeholder="Pembayaran Bulan ini " required="" />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <!-- Beri id "btn-simpan" untuk tombol simpan nya -->
                        <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-danger" value="Bayar" name="Submit" tabindex="3" />

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

            modal.find('#idCicilan').attr("value", div.data('id-cicilan'));
            modal.find('#bayar').attr("value", div.data('bayar-bulanan'));

        });
    });
</script>