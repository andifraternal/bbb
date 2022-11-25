
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data kategori</li>
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
                <h3 class="card-title">Data kategori</h3>
                
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl" style="margin-bottom:10px">
                  + Tambah Kategori
                </button>
                <table id="table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama kategori</th>
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
              <h4 class="modal-title">Tambah Data Kategori</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <form class="form-horizontal">
                  <div class="card-body">
                    
                    <div class="form-group row">
                      <label for="nama_kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama kategori">
                      </div>
                    </div>
                    
                  </div>
                  <!-- /.card-body -->
                  <div class="modal-footer justify-content-between">
                    <button type="button" id="simpanKategori" class="btn btn-primary pull-right">Simpan Data</button>
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
              <h4 class="modal-title">Update Data Kategori</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <form class="form-horizontal">
                  <div class="card-body">
                    
                    <div class="form-group row">
                      <label for="nama_kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                      <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="id_kategori_update" name="id_kategori_update" placeholder="ID kategori" readonly>
                        <input type="text" class="form-control" id="nama_kategori_update" name="nama_kategori_update" placeholder="Nama kategori">
                      </div>
                    </div>
                    
                  </div>
                  <!-- /.card-body -->
                  <div class="modal-footer justify-content-between">
                    <button type="button" id="updateSimpanKategori" class="btn btn-primary pull-right">Simpan Data</button>
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
                "url": "<?php echo site_url('kategori/dataKategori')?>",
                "type": "POST"
            },
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
 
        });
        // table.destroy();
    }

    $(document).ready(function() {
      $('.select2').select2();
      tampilData();
      

      $("#simpanKategori" ).click(function() {
        // console.log('haha');
        var namakategori=$('#nama_kategori').val();
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/kategori/simpanKategori')?>",
            dataType : "JSON",
            data : {namakategori:namakategori},
            success: function(data){
                $('[name="nama_kategori"]').val("");
                $('#modal-xl').modal('hide');
                tampilData();
            }
        });
        return false;
      });

    });


    $(document).on('click', '.updateKategori', function(){
      var id = $(this).attr("id");
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url()?>index.php/kategori/getKategori/"+id,
            dataType : "JSON",
            success: function(data){
                $('[name="nama_kategori_update"]').val(data.nama_kategori);
                $('[name="id_kategori_update"]').val(data.id_kategori);
                $('#modal-update').modal('show');
                
            }
        });
        return false;
    })


    $(document).on('click', '#updateSimpanKategori', function(){
      var idkategori=$('#id_kategori_update').val();
      var namakategori=$('#nama_kategori_update').val();
      $.ajax({
          type : "POST",
          url  : "<?php echo base_url()?>index.php/kategori/updateKategori",
          dataType : "JSON",
          data : {idkategori:idkategori, namakategori:namakategori},
          success: function(data){
              $('[name="nama_kategori_update"]').val("");
              $('#modal-update').modal('hide');
              tampilData();
          }
      });
      return false;
    })


    $(document).on('click', '.deleteKategori', function(){
      var id = $(this).attr("id");
      console.log(id)
      if (confirm('Apakah ingin menghapus data?')) {
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url()?>index.php/kategori/hapusKategori/"+id,
            dataType : "JSON",
            success: function(data){
              tampilData();
            }
        });
        return false;
      }
        
    })


    


 
</script>