<?php

class Transaksi extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model(array('barangModel', 'kategoriModel'));
    }

    function index(){
        $kategori = $this->kategoriModel->get_all_data()->result();
        $this->load->view('__template/header');
        $this->load->view('transaksi', array('kategori'=>$kategori));
        $this->load->view('__template/footer');
    }


}