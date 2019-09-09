<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>





<script>
  
  $(document).ready(function() {
    $('#example4').DataTable( {
        dom: 'Bfrtip',
        buttons: [
          {
                extend: 'pdfHtml5',
                orientation: 'Potrait',
                pageSize: 'A4',
                title: 'Laporan Transaksi',
                customize : function(doc) {
                doc.content[1].table.widths = [ '5%', '20%', '30%', '25%', '25%'];
                }
            }, {
                extend: 'print',
                pageSize: 'A4',
                title: 'Laporan Transaksi',
              
            },
            
            'excel'
        ]
    } );
} );
</script>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Laporan Transaksi

        <small>Control panel</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Laporan</a></li>

        <li class="active">Transaksi</li>

      </ol>

    </section>

    

    <section class="content">



<div class="box box-info">

            <div class="box-header with-border">

              <h3 class="box-title">Laporan Transaksi</h3>

            </div>

            <!-- /.box-header -->

            <!-- form start -->

            <form class="form-horizontal" action ="<?php echo base_url('Laporan/vTransaksi'); ?>" data-parsley-validate method="post">

              <div class="box-body">

                <div class="form-group">

                  <label for="inputEmail3" class="col-sm-2 control-label">Tgl Awal</label>



                  <div class="col-sm-8">

                    <input type="date" class="form-control" id="tglawal" placeholder="Tgl Awal" name="tglawal">

                  </div>

                </div>

                <div class="form-group">

                  <label for="inputPassword3" class="col-sm-2 control-label">Tgl Akhir</label>



                  <div class="col-sm-8">

                    <input type="date" class="form-control" id="tglakhir" name="tglakhir" placeholder="Masukkan Tgl Akhir">

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





    <!-- Main content -->

    <section class="content">

      <div class="row">

        <!-- /.col (LEFT) -->

        <div class="col-md-12">





          <!-- BAR CHART -->

          <div class="box box-success">

            <div class="box-header with-border">

              <h3 class="box-title">Grafik Penjualan</h3>



              <div class="box-tools pull-right">

                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>

                </button>

                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>

              </div>

            </div>

            <div class="box-body">

              <div class="chart">
                <center><h3> Penjualan bulan ini </h3> </center>

                <canvas id="barChart" style="height:230px"></canvas>

              </div>

            </div>

            <!-- /.box-body -->

          </div>

          <!-- /.box -->



        </div>

        <!-- /.col (RIGHT) -->


      <!-- /.row -->
    </section>

    <!-- /.content -->

 <!-- Main content -->
 <section class="content">
    <!-- Small boxes (Stat box) -->

    <!-- /.row -->

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Laporan Transaksi</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">


        <table id="example4"  class="display" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Invoice</th>
              <th>Nama Pemesan</th>
              <th>Total</th>
              <th>Tgl Pembayaran</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($lap as $u) {
              ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $u->id_pemesanan ?></td>
                <td><?php echo $u->nama_pemesan ?></td>
                <td><?php echo number_format($u->total,2,',','.'); ?></td>
                <td><?php echo $u->tgl_pembayaran ?></td>
               
              </tr>
              <?php } ?>

              </tfoot>
        </table>
      </div>

    </div>


  </section>
  <!-- /.content -->

</div>

 



<script>

  $(function () {

    /* ChartJS

     * -------

     * Here we will create a few charts using ChartJS

     */



    //--------------

    //- AREA CHART -

    //--------------



    // Get context with jQuery - using jQuery's .get() method.

    // var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    // This will get the first returned node in the jQuery collection.

    // var areaChart       = new Chart(areaChartCanvas)



    var areaChartData = {
      

    labels  : [<?php foreach ($rating as $r){  echo "'".$r->nama_barang."',";  }?>],

      datasets: [

       

        {

          label               : 'Digital Goods',

          fillColor           : 'rgba(60,141,188,0.9)',

          strokeColor         : 'rgba(60,141,188,0.8)',

          pointColor          : '#3b8bba',

          pointStrokeColor    : 'rgba(60,141,188,1)',

          pointHighlightFill  : '#fff',

          pointHighlightStroke: 'rgba(60,141,188,1)',

          data                : [<?php foreach ($rating as $r){  echo $r->jmlqty.",";  }?>]

        }

      ]

    }





  

    //-------------

    //- BAR CHART -

    //-------------

    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')

    var barChart                         = new Chart(barChartCanvas)

    var barChartData                     = areaChartData

    barChartData.datasets.fillColor   = '#00a65a'

    barChartData.datasets.strokeColor = '#00a65a'

    barChartData.datasets.pointColor  = '#00a65a'

    var barChartOptions                  = {

      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value

      scaleBeginAtZero        : true,

      //Boolean - Whether grid lines are shown across the chart

      scaleShowGridLines      : true,

      //String - Colour of the grid lines

      scaleGridLineColor      : 'rgba(0,0,0,.05)',

      //Number - Width of the grid lines

      scaleGridLineWidth      : 1,

      //Boolean - Whether to show horizontal lines (except X axis)

      scaleShowHorizontalLines: true,

      //Boolean - Whether to show vertical lines (except Y axis)

      scaleShowVerticalLines  : true,

      //Boolean - If there is a stroke on each bar

      barShowStroke           : true,

      //Number - Pixel width of the bar stroke

      barStrokeWidth          : 2,

      //Number - Spacing between each of the X value sets

      barValueSpacing         : 5,

      //Number - Spacing between data sets within X values

      barDatasetSpacing       : 1,

      //String - A legend template

      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets.fillColor%>"></span><%if(datasets.label){%><%=datasets.label%><%}%></li><%}%></ul>',

      //Boolean - whether to make the chart responsive

      responsive              : true,

      maintainAspectRatio     : true

    }



    barChartOptions.datasetFill = false

    barChart.Bar(barChartData, barChartOptions)

  })


</script>


