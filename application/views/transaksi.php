
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Transaksi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Transaksi Penjualan</li>
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
              
              <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Transaksi Penjualan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
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
                    <label for="no_invoice" class="col-sm-2 col-form-label">No Invoice</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="no_invoice" placeholder="No Invoice">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="no_po" class="col-sm-2 col-form-label">No PO</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="no_po" placeholder="No PO">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tanggal_po" class="col-sm-2 col-form-label">Tanggal PO</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control tanggal" id="tanggal_po" placeholder="Tanggal PO">
                    </div>
                  </div>


                  <div class="row">
            
                <div class="col-md-12" style="padding-left:10px; padding-right:5px">
                <table class="table table-condensed">
                <thead>
                    <tr>
                        <th >Nama barang</th>
                        <th >Harga Beli</th>
                        <th >Harga Jual</th>
                        <th >QTY</th>
                        <th >keuntungan</th>
                    </tr>
                </thead>
                <tbody id="itemlist">
                  
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button id="addlist" class="btn btn-small btn-primary" onclick="additem(); return false">Add</i></button>
                        </td>
                    </tr>
                </tfoot>
            </table>
                </div>
                
              </div>


                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" id="simpanTransaksi" class="btn btn-info">Simpan Data</button>
                </div>
                <!-- /.card-footer -->
              </form>
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

    var i = 1;
    function additem() {
        // getBarang()
        var kategori=$('#kategori').val();
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url()?>index.php/barang/get_barang/"+kategori,
            dataType : "JSON",
            success: function(data){
                var hasil = ''
                hasil += '<option value="0">----Pilih Barang----</option>'
                for(a=0; a<data.length; a++){
                    hasil += '<option value="'+data[a].id_barang+'">'+data[a].nama_barang+'</option>'
                }


                // menentukan target append
                var itemlist = document.getElementById('itemlist');

                // membuat element
                var row = document.createElement('tr');
                var id_barang = document.createElement('td');
                var harga_beli = document.createElement('td');
                var harga_jual = document.createElement('td');
                var qty = document.createElement('td');
                var keuntungan = document.createElement('td');
                var aksi = document.createElement('td');

                // meng append element
                itemlist.appendChild(row);
                row.appendChild(id_barang);
                row.appendChild(harga_beli);
                row.appendChild(harga_jual);
                row.appendChild(qty);
                row.appendChild(keuntungan);
                row.appendChild(aksi);

                // membuat element input

                var id_barang_form = document.createElement('select');
                id_barang_form.setAttribute('name', 'id_barang[' + i + ']');
                id_barang_form.setAttribute('datanomor', i);
                id_barang_form.setAttribute('class', 'form-control transaksi_id_barang');
                id_barang_form.setAttribute('id', 'id_barang[' + i + ']');
                id_barang_form.innerHTML = hasil;

                var harga_beli_form = document.createElement('input');
                harga_beli_form.setAttribute('name', 'harga_beli[' + i + ']');
                harga_beli_form.setAttribute('datanomor', i);
                harga_beli_form.setAttribute('class', 'form-control');
                harga_beli_form.setAttribute('id', 'harga_beli[' + i + ']');
                harga_beli_form.setAttribute('readonly', true);

                var harga_jual_form = document.createElement('input');
                harga_jual_form.setAttribute('name', 'harga_jual[' + i + ']');
                harga_jual_form.setAttribute('datanomor', i);
                harga_jual_form.setAttribute('class', 'form-control');
                harga_jual_form.setAttribute('id', 'harga_jual[' + i + ']');

                var qty_form = document.createElement('input');
                qty_form.setAttribute('name', 'harga_jual[' + i + ']');
                qty_form.setAttribute('datanomor', i);
                qty_form.setAttribute('class', 'form-control');
                qty_form.setAttribute('id', 'harga_jual[' + i + ']');

                var keuntungan_form = document.createElement('input');
                keuntungan_form.setAttribute('name', 'keuntungan[' + i + ']');
                keuntungan_form.setAttribute('datanomor', i);
                keuntungan_form.setAttribute('class', 'form-control dates');
                keuntungan_form.setAttribute('id', 'keuntungan[' + i + ']');
                keuntungan_form.setAttribute('readonly', true);

                var hapus = document.createElement('span');

                // meng append element input
                id_barang.appendChild(id_barang_form);
                harga_beli.appendChild(harga_beli_form);
                harga_jual.appendChild(harga_jual_form);
                qty.appendChild(qty_form);
                keuntungan.appendChild(keuntungan_form);
                aksi.appendChild(hapus);

                hapus.innerHTML = '<button class="btn btn-small btn-danger">Delete</button>';
                // membuat aksi delete element
                hapus.onclick = function () {
                    row.parentNode.removeChild(row);
                };

                i++;
                
            }
        });
        
    }


    function getBarang(){
        var kategori=$('#kategori').val();
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url()?>index.php/barang/get_barang/"+kategori,
            dataType : "JSON",
            success: function(data){
                // $('[name="nama_kategori"]').val("");
                // $('#modal-xl').modal('hide');
                // tampilData();
                // console.log(data)
                var hasil = ''
                for(a=0; a<data.length; a++){
                    hasil += '<option value="'+data[a].id_barang+'">'+data[a].nama_barang+'</option>'
                }
                console.log(hasil);
                // return hasil;
                
            }
        });
    }



    $(document).on('change', '.transaksi_id_barang', function(){
        var id = $(this).attr("id");
        var nomor = $(this).attr("datanomor");
        var value =  $('[name="'+id+'"]').val();
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url()?>index.php/barang/getbarang/"+value,
            dataType : "JSON",
            success: function(data){
                console.log(data)
                $('[name="harga_beli['+nomor+']"]').val(data.harga_update);
            }
        });
        return false;
    })


</script>