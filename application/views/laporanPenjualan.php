
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Laporan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data laporan Penjualan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Laporan Penjualan</h3>
                
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-inline">
                    <div class="form-group mb-2">
                        <label for="tanggalMulai" class="sr-only">Tanggal Mulai</label>
                        <input type="text" class="form-control" id="tanggalMulai" placeholder="Tanggal Mulai">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="tangggalSelesai" class="sr-only">Tanggal Selesai</label>
                        <input type="text" class="form-control" id="tanggalSelesai" placeholder="Tanggal Selesai">
                    </div>
                    <button type="submit" id="tampilkanData" class="btn btn-primary mb-2">Tampilkan</button>
                </div>
                <table  class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama kategori</th>
                    <th>No Invoice</th>
                    <th>No PO</th>
                    <th>Tanggal PO</th>
                    <th>Total Pembelian</th>
                    <th>Total Penjualan</th>
                    <th>Pajak Daerah</th>
                    <th>PPN</th>
                    <th>PPH</th>
                    <th>Pajak Platform</th>
                    <th>Pengeluaran dana</th>
                    <th>Penjualan Bersih</th>
                    <th>Keuntungan Bersih</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/adminlte/dist/js/adminlte.min.js"></script>


  <!-- DataTables  & Plugins -->
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url() ?>assets/adminlte/plugins/select2/js/select2.full.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#tampilkanData" ).click(function() {
        // console.log('haha')
        var tanggalMulai=$('#tanggalMulai').val();
        var tanggalSelesai=$('#tanggalSelesai').val();
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url()?>index.php/transaksi/tampilTransaksi/"+tanggalMulai+"/"+tanggalSelesai,
            dataType : "JSON",
            success: function(data){
                // $('[name="nama_kategori"]').val("");
                // $('#modal-xl').modal('hide');
                // tampilData();
                console.log(data)
            }
        });
        return false;
      });
    })
</script>