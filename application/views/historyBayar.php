<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>History <small>Pembayaran Cicilan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Data Master</a></li>
            <li class="active">History Pembayaran</li>
        </ol>
    </section>
    <section class="content">
        <!-- Small boxes (Stat box) -->

        <!-- /.row -->

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar Pembayaran Cicilan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kategori</th>
                                <th>Barang</th>
                                <th>Tanggal Bayar</th>
                                <th>Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1;
                            foreach ($pembayaran as $u) {
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $u->kategori ?></td>
                                    <td><?php echo $u->nama_barang ?></td>
                                    <td><?php echo $u->tgl_bayar ?></td>
                                    <td><?php echo $u->bayar ?></td>
                            <?php }?>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

