<?php
      $now = date('Y-m-d H:i:s');
echo $now;
      ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data barang</li>
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
                <h3 class="card-title">Data Barang</h3>
                
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl" style="margin-bottom:10px">
                  + Tambah Barang
                </button>
                <table id="table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Dibuat</th>
                    <th>Diupdate</th>
                    <th>Aksi</th>
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



  <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Barang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <form class="form-horizontal">
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Kategori</label>
                      <div class="col-sm-10">
                        <select class="form-control select2 " id="kategori" style="width: 100%;">
                        <option value='0'>----Pilih Kategori----</option>
                        <?php 
                            foreach ($kategori as $data) {
                              # code...
                              echo '<option value='.$data->id_kategori.'>'.$data->nama_kategori.'</option>';
                            }
                        ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Barang</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_barang" placeholder="Nama Barang">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">Harga Barang</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="harga_barang" placeholder="Harga Barang">
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="modal-footer justify-content-between">
                    <button type="button" id="simpanBarang" class="btn btn-primary pull-right">Simpan Data</button>
                  </div>
                  <!-- /.card-footer -->
                </form>


            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



      
  <div class="modal fade" id="modal-update">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update Harga Barang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <form class="form-horizontal">
                  <div class="card-body">
                    
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">Harga Barang</label>
                      <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="id_barang_update" name="id_barang_update" placeholder="Harga Barang" readonly>
                        <input type="text" class="form-control" id="harga_barang_update" name="harga_barang_update" placeholder="Harga Barang">
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="modal-footer justify-content-between">
                    <button type="button" id="updateSimpanBarang" class="btn btn-primary pull-right">Simpan Data</button>
                  </div>
                  <!-- /.card-footer -->
                </form>


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
    
    function tampilData(){
      //datatables
      var table;
      table = $('#table').DataTable({ 

          "processing": true, 
          "serverSide": true, 
          "destroy": true,
          "order": [], 
          "ajax": {
              "url": "<?php echo site_url('barang/dataBarang')?>",
              "type": "POST"
          },
          "columnDefs": [
          { 
              "targets": [ 0 ], 
              "orderable": false, 
          },
          ],

      });
    }

    $(document).ready(function() {
 
      $('.select2').select2();
      tampilData();


      $("#simpanBarang" ).click(function() {
        // console.log('haha');
        var kategori=$('#kategori').val();
        var namabarang=$('#nama_barang').val();
        var harga=$('#harga_barang').val();
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/barang/simpanBarang')?>",
            dataType : "JSON",
            data : {kategori:kategori, namabarang:namabarang, harga:harga},
            success: function(data){
                $('[name="kategori"]').val("");
                $('[name="nama_barang"]').val("");
                $('[name="harga_barang"]').val("");
                $('#modal-xl').modal('hide');
                tampilData();
            }
        });
        return false;
      });

 
    });


    $(document).on('click', '.updateBarang', function(){
      var id = $(this).attr("id");
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url()?>index.php/barang/getBarang/"+id,
            dataType : "JSON",
            success: function(data){
                $('[name="id_barang_update"]').val(data.id_barang);
                $('[name="harga_barang_update"]').val(data.harga_update);
                $('#modal-update').modal('show');
                
            }
        });
        return false;
    })

    $(document).on('click', '#updateSimpanBarang', function(){
      var idbarang=$('#id_barang_update').val();
      var harga=$('#harga_barang_update').val();
      $.ajax({
          type : "POST",
          url  : "<?php echo base_url()?>index.php/barang/updateBarang",
          dataType : "JSON",
          data : {idbarang:idbarang, harga:harga},
          success: function(data){
              $('[name="harga_barang_update"]').val("");
              $('#modal-update').modal('hide');
              tampilData();
          }
      });
      return false;
    })


    $(document).on('click', '.deleteBarang', function(){
      var id = $(this).attr("id");
      console.log(id)
      if (confirm('Apakah ingin menghapus data?')) {
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url()?>index.php/barang/hapusBarang/"+id,
            dataType : "JSON",
            success: function(data){
              tampilData();
            }
        });
        return false;
      }
        
    })
 
</script>