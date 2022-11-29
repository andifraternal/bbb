
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
                        <input type="date" class="form-control" id="tanggalMulai" placeholder="Tanggal Mulai">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="tangggalSelesai" class="sr-only">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="tanggalSelesai" placeholder="Tanggal Selesai">
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
                  <tbody id="tampilData">
                  <!-- <div id="tampilData"></div> -->
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


  
  <div class="modal fade" id="modal-view">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Detail Penjualan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

            <div class="row">
              <div class="col-12">
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                  <!-- title row -->
                  <div class="row">
                    <div class="col-12">
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- info row -->
                  <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                      
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      <b>No Invoice : <span id="no_invoice_report"></span></b><br>
                      <br>
                      <b>No PO:</b> <span id="no_po_report"></span><br>
                      <b>Tanggal PO:</b> <span id="tanggal_po_report"></span><br>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <!-- Table row -->
                  <div class="row">
                    <div class="col-12 table-responsive">
                    <h5>List Penjualan</h5>
                      <table class="table table-striped">
                        <thead>
                        <tr>
                          <th>Qty</th>
                          <th>Product</th>
                          <th>Harga beli</th>
                          <th>harga Jual</th>
                          <th>Total harga</th>
                        </tr>
                        </thead>
                        <tbody id="tampilBarang">
                        
                        
                        </tbody>
                      </table>
                    </div>

                    <div class="col-12 table-responsive">
                      <h5>List Pengeluaran</h5>
                      <table class="table table-striped">
                        <thead>
                        <tr>
                          <th>Keterangan</th>
                          <th>Nominal</th>
                        </tr>
                        </thead>
                        <tbody id="tampilPengeluaran">
                        
                        
                        </tbody>
                      </table>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-6">
                      
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                      <div class="table-responsive">
                        <table class="table" id="tampilTotal">

                        </table>
                      </div>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <!-- this row will not appear when printing -->
                  <div class="row no-print">
                    <div class="col-12">
                      <!-- <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                      <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                        Payment
                      </button> -->
                      <div id="buttonExcel" ></div>
                      <div id="buttonTandaTerima" ></div>
                      <!-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                        <i class="fas fa-download"></i> Generate Excel
                      </button> -->
                    </div>
                  </div>
                </div>
                <!-- /.invoice -->
              </div><!-- /.col -->
            </div><!-- /.row -->

            </div>  
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
 



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
                // console.log(data)
                no = 1;
                var boleh = ''
                for(x=0; x<data.length; x++){
                  boleh += '<tr>'
                  boleh += '<td>'+no+'</td>'
                  boleh += '<td>'+data[x].nama_kategori+'</td>'
                  boleh += '<td>'+data[x].no_invoice+'</td>'
                  boleh += '<td>'+data[x].no_po+'</td>'
                  boleh += '<td>'+data[x].tanggal_po+'</td>'
                  boleh += '<td>'+data[x].total_beli+'</td>'
                  boleh += '<td>'+data[x].total_jual+'</td>'
                  boleh += '<td>'+data[x].pajak_daerah+'</td>'
                  boleh += '<td>'+data[x].ppn+'</td>'
                  boleh += '<td>'+data[x].pph+'</td>'
                  boleh += '<td>'+data[x].pajak_platform+'</td>'
                  boleh += '<td>'+data[x].pengeluaran+'</td>'
                  boleh += '<td>'+data[x].penjualan_bersih+'</td>'
                  boleh += '<td>'+data[x].keuntungan_bersih+'</td>'
                  boleh += '<td><button type="button" name="detailPenjualan" id="'+data[x].no_po+'" class="btn btn-primary detailPenjualan">Detail</button>'
                  boleh += '</tr>'
                  no++;
                }
                
                $('#tampilData').html(boleh)
            }
        });
        return false;
      });


      // $(".detailPenjualan" ).click(function() {
      //   console.log('haha')
      // })


    })


    $(document).on('click', '.detailPenjualan', function(){
      var id = $(this).attr("id");
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url()?>index.php/transaksi/detailTransaksi/"+id,
            dataType : "JSON",
            success: function(data){
              console.log(data)
                $('#no_invoice_report').html(data.jumlah[0].no_invoice);
                $('#no_po_report').html(data.jumlah[0].no_po);
                $('#tanggal_po_report').html(data.jumlah[0].tanggal_po);

                var hoho = ''
                for(i=0; i<data.barang.length; i++){
                  hoho += '<tr>'
                  hoho += '<td>'+data.barang[i].qty+'</td>'
                  hoho += '<td>'+data.barang[i].nama_barang+'</td>'
                  hoho += '<td>'+data.barang[i].harga_beli+'</td>'
                  hoho += '<td>'+data.barang[i].harga_jual+'</td>'
                  hoho += '<td>'+(data.barang[i].harga_jual)*(data.barang[i].qty)+'</td>'
                  hoho += '</tr>'
                }
                $('#tampilBarang').html(hoho);


                var bb = ''
                for(i=0; i<data.pengeluaran.length; i++){
                  bb += '<tr>'
                  bb += '<td>'+data.pengeluaran[i].keterangan+'</td>'
                  bb += '<td>'+data.pengeluaran[i].nominal+'</td>'
                  bb += '</tr>'
                }
                $('#tampilPengeluaran').html(bb);


                aaa = ''
                aaa += '<tr>'
                aaa += '<th style="width:50%">Subtotal</th>'
                aaa += '<td>'+data.jumlah[0].total_jual+'</td>'
                aaa += '</tr>'

                if(data.jumlah[0].pajak_daerah == 0){
                  // var pd = ''
                  aaa += '<tr>'
                  aaa += '<th style="width:50%"></th>'
                  aaa += '<td></td>'
                  aaa += '</tr>'
                }else{
                  // var pd = ''
                  aaa += '<tr>'
                  aaa += '<th style="width:50%">Pajak Daerah</th>'
                  aaa += '<td>'+data.jumlah[0].pajak_daerah+'</td>'
                  aaa += '</tr>'
                }

                if(data.jumlah[0].ppn == 0){
                  // var ppn = ''
                  aaa += '<tr>'
                  aaa += '<th style="width:50%"></th>'
                  aaa += '<td></td>'
                  aaa += '</tr>'
                }else{
                  // var ppn = ''
                  aaa += '<tr>'
                  aaa += '<th style="width:50%">PPN</th>'
                  aaa += '<td>'+data.jumlah[0].ppn+'</td>'
                  aaa += '</tr>'
                }

                if(data.jumlah[0].pph == 0){
                  // var pph = ''
                  aaa += '<tr>'
                  aaa += '<th style="width:50%"></th>'
                  aaa += '<td></td>'
                  aaa += '</tr>'
                }else{
                  // var pph = ''
                  aaa += '<tr>'
                  aaa += '<th style="width:50%">PPH</th>'
                  aaa += '<td>'+data.jumlah[0].pph+'</td>'
                  aaa += '</tr>'
                }

                if(data.jumlah[0].pajak_platform == 0){
                  // var pajak_platform = ''
                  aaa += '<tr>'
                  aaa += '<th style="width:50%"></th>'
                  aaa += '<td></td>'
                  aaa += '</tr>'
                }else{
                  // var pajak_platform = ''
                  aaa += '<tr>'
                  aaa += '<th style="width:50%">Pajak Platform</th>'
                  aaa += '<td>'+data.jumlah[0].pajak_platform+'</td>'
                  aaa += '</tr>'
                }

                if(data.jumlah[0].pengeluaran == 0){
                  // var pengeluaran = ''
                  aaa += '<tr>'
                  aaa += '<th style="width:50%"></th>'
                  aaa += '<td></td>'
                  aaa += '</tr>'
                }else{
                  // var pengeluaran = ''
                  aaa += '<tr>'
                  aaa += '<th style="width:50%">Pengeluaran</th>'
                  aaa += '<td>'+data.jumlah[0].pengeluaran+'</td>'
                  aaa += '</tr>'
                }

                // aaa = ''
                aaa += '<tr>'
                aaa += '<th style="width:50%">Total Modal</th>'
                aaa += '<td>'+data.jumlah[0].total_beli+'</td>'
                aaa += '</tr>'

                // penjualan_bersih = ''
                aaa += '<tr>'
                aaa += '<th style="width:50%">Penjualan bersih</th>'
                aaa += '<td>'+data.jumlah[0].penjualan_bersih+'</td>'
                aaa += '</tr>'

                // untung = ''
                aaa += '<tr>'
                aaa += '<th style="width:50%">Laba</th>'
                aaa += '<td>'+data.jumlah[0].keuntungan_bersih+'</td>'
                aaa += '</tr>'

               
                $('#tampilTotal').html(aaa);
                // $('#pajakDaerah').html(pd);
                // $('#ppn').html(ppn);
                // $('#pph').html(pph);
                // $('#pajakPlatform').html(pajak_platform);
                // $('#pengeluaran').html(pengeluaran);
                // $('#modal').html(modal);
                // $('#penjualanBersih').html(penjualan_bersih);
                // $('#untung').html(untung);

                var xx = '<a href="<?php echo base_url() ?>index.php/transaksi/downloadLaporan/'+id+'" rel="" target="_blank" class="btn btn-success float-right" style="margin-right:10px"> Download Laporan</a>'
                $('#buttonExcel').html(xx);

                var ff = '<a href="<?php echo base_url() ?>index.php/transaksi/downloadTandaTerima/'+id+'" rel="" target="_blank" class="btn btn-primary float-right" style="margin-right:10px"> Download Tanda Terima</a>'
                $('#buttonTandaTerima').html(ff);

                $('#modal-view').modal('show');
                
            }
        });
        return false;
        console.log(id)
    })
</script>