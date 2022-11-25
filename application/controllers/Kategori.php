<?php

class Kategori extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('kategoriModel');
    }

    function index(){
        $this->load->view('__template/header');
        $this->load->view('kategori');
        $this->load->view('__template/footer');
    }

    function dataKategori(){
        $list = $this->kategoriModel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            // $row[] = $field->id_kategori;
            $row[] = $field->nama_kategori;
            $row[] = $field->created_at;
            $row[] = $field->updated_at;
            $row[] = '<button type="button" name="updateKategori" id="'.$field->id_kategori.'" class="btn btn-warning updateKategori">Edit Data</button>
            <button type="button" name="deleteKategori" id="'.$field->id_kategori.'" class="btn btn-danger deleteKategori">Delete Data</button>';
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->kategoriModel->count_all(),
            "recordsFiltered" => $this->kategoriModel->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function simpanKategori(){
        $kategori = $this->input->post('namakategori');

        $query = $this->kategoriModel->insertData($kategori);

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

    function getKategori($kategori){
        $query = $this->kategoriModel->getKategori($kategori)->row();

        echo json_encode($query);
    }

    function updateKategori(){
        $idkategori = $this->input->post('idkategori');
        $kategori = $this->input->post('namakategori');
        $query = $this->kategoriModel->updateData($idkategori, $kategori);
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

    function hapusKategori($idKategori){
        $query = $this->kategoriModel->hapusKategori($idKategori);
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


    
}