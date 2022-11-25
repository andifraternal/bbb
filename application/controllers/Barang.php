<?php

class Barang extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model(array('barangModel', 'kategoriModel'));
    }

    function index(){
        $kategori = $this->kategoriModel->get_all_data()->result();
        $this->load->view('__template/header');
        $this->load->view('barang', array('kategori'=>$kategori));
        $this->load->view('__template/footer');
    }


    function dataBarang(){
        $list = $this->barangModel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama_kategori;
            $row[] = $field->nama_barang;
            $row[] = $field->harga_update;
            $row[] = $field->created_at;
            $row[] = $field->updated_at;
            $row[] = '<button type="button" name="updateBarang" id="'.$field->id_barang.'" class="btn btn-warning updateBarang">Edit Harga</button>
            <button type="button" name="deleteBarang" id="'.$field->id_barang.'" class="btn btn-danger deleteBarang">Delete Data</button>';
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->barangModel->count_all(),
            "recordsFiltered" => $this->barangModel->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function simpanBarang(){
        $kategori   = $this->input->post('kategori');   
        $namabarang = $this->input->post('namabarang');  
        $harga      = $this->input->post('harga');
        $id         = uniqid();

        $query      = $this->barangModel->insertBarang($id, $kategori, $namabarang, $harga);
        $querylog   = $this->barangModel->insertBarangLog($id, $harga);

        if($query  && $querylog){
            $data = array(
                'kode'       => 200,
                'keterangan' => 'success'
            );
        }else{
            $data = array(
                'kode'       => 400,
                'keterangan' => 'failed'
            );
        }

        echo json_encode($data);
    }


    function getbarang($barang){
        $query = $this->barangModel->getBarang($barang)->row();

        echo json_encode($query);
    }


    function updateBarang(){
        $idbarang = $this->input->post('idbarang');
        $harga = $this->input->post('harga');
        $now = date('Y-m-d H:i:s');
        $query      = $this->barangModel->updateData($idbarang, $harga, $now);
        $queryLog   = $this->barangModel->insertBarangLog($idbarang, $harga);
        if($query && $queryLog){
            $data = array(
                'kode'       => 200,
                'keterangan' => 'success'
            );
        }else{
            $data = array(
                'kode'       => 400,
                'keterangan' => 'failed'
            );
        }

        echo json_encode($data);
    }


    function hapusBarang($idBarang){
        $query = $this->barangModel->hapusBarang($idBarang);
        if($query){
            $data = array(
                'kode'       => 200,
                'keterangan' => 'success'
            );
        }else{
            $data = array(
                'kode'       => 400,
                'keterangan' => 'failed'
            );
        }

        echo json_encode($data);
    }

    function get_barang($kategori){
        $query = $this->barangModel->get_barang($kategori)->result();
        echo json_encode($query);
    }
}