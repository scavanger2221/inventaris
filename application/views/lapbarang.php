
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Barang
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Laporan</a></li>
        <li class="active">Barang</li>
      </ol>
    </section>
    
    <section class="content">

<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Laporan Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tgl Awal</label>

                  <div class="col-sm-8">
                    <input type="date" class="form-control" id="inputEmail3" placeholder="Tgl Awal">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tgl Akhir</label>

                  <div class="col-sm-8">
                    <input type="date" class="form-control" id="inputPassword3" placeholder="Masukkan Tgl Akhir">
                  </div>
                </div>

                <div class="form-group">

                  <div class="col-sm-10">
                  <button type="submit" class="btn btn-info pull-right">Cari</button>
                  </div>
                </div>
               
              </div>
              <!-- /.box-body -->
               
          
              <!-- /.box-footer -->
            </form>
          </div>

                   

    </section>
    <!-- /.content -->

    <!-- Main content -->
 <section class="content">
    <!-- Small boxes (Stat box) -->

    <!-- /.row -->

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Laporan Barang</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">


      <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Kategori</th>
              <th>Nama Barang</th>
              <th>Qty</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($lap as $u) {
              ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $u->nama_kategori ?></td>
                <td><?php echo $u->nama_barang ?></td>
                <td><?php echo $u->qty ?></td>
               
              </tr>
              <?php } ?>

              </tfoot>
        </table>
      </div>

    </div>


  </section>
  <!-- /.content -->

  </div>