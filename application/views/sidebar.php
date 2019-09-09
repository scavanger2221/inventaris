 <!-- Left side column. contains the logo and sidebar -->

 <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->

    <section class="sidebar">

      <!-- Sidebar user panel -->

      <div class="user-panel">

        <div class="pull-left image">

          <img src="<?php echo base_url('assets/admin/dist/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image">

        </div>

        <div class="pull-left info">

          <p><?php echo $this->session->userdata('nama'); ?></p>

          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

        </div>

      </div>

      <!-- search form -->
<!-- 
      <form action="#" method="get" class="sidebar-form">

        <div class="input-group">

          <input type="text" name="q" class="form-control" placeholder="Search...">

          <span class="input-group-btn">

                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>

                </button>

              </span>

        </div> -->

      </form>

      <!-- /.search form -->

      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu" data-widget="tree">

        <li class="header">MAIN NAVIGATION</li>

        <li><a href="../Admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>



            <li><a href="<?php echo base_url().'DataMaster' ?>"><i class="fa fa-user"></i> Admin</a></li>

            <li><a href="<?php echo base_url().'DataMaster/vKategori' ?>"><i class="fa fa-clone"></i> Kategori</a></li>

            <li><a href="<?php echo base_url().'DataMaster/vProduk' ?>"><i class="fa fa-laptop"></i> Produk</a></li>
            <li><a href="<?php echo base_url().'DataMaster/vCicilan' ?>"><i class="fa fa-file"></i> Cicilan</a></li>

       

            <li><a href="<?php echo base_url().'Transaksi/vStok' ?>"><i class="fa fa-shopping-bag"></i> Stok</a></li>

            <li><a href="<?php echo base_url().'Transaksi/vPemesanan' ?>"><i class="fa fa-shopping-cart"></i> Pemesanan</a></li>
            <li><a href="<?php echo base_url().'Transaksi/vDataInvoice' ?>"><i class="fa fa-sticky-note"></i> Data Invoice</a></li>

          

        <li class="treeview">

          <a href="#">

            <i class="fa fa-book"></i>

            <span>Laporan</span>

            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

          </a>

          <ul class="treeview-menu">

            <li><a href="<?php echo base_url().'Laporan/vTransaksi' ?>"><i class="fa fa-circle-o"></i> Transaksi</a></li>

            <li><a href="<?php echo base_url().'Laporan/vBarang' ?>"><i class="fa fa-circle-o"></i> Barang</a></li>

          </ul>

        </li>

       

        

      </ul>

    </section>

    <!-- /.sidebar -->

  </aside>

