<?php

class Transaksi extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model(array('barangModel', 'kategoriModel', 'transaksiModel'));
    }

    function index(){
        $kategori = $this->kategoriModel->get_all_data()->result();
        $this->load->view('__template/header');
        $this->load->view('transaksi', array('kategori'=>$kategori));
        $this->load->view('__template/footer');
    }

    function simpanTransaksi(){
        $kategori = $this->input->post('kategori');
        $no_invoice = $this->input->post('no_invoice');
        $no_po  = $this->input->post('no_po');
        $tanggal_po = $this->input->post('tanggal_po');

        $id_barang  = $this->input->post('id_barang');
        $harga_beli = $this->input->post('harga_beli');
        $harga_jual = $this->input->post('harga_jual');
        $qty        = $this->input->post('qty');
        $keuntungan = $this->input->post('keuntungan');

        $keterangan = $this->input->post('keterangan');
        $nominal    = $this->input->post('nominal');

        foreach ($id_barang as $key => $o) {
            # code...
            $id = uniqid();
            $this->transaksiModel->simpanPenjualan($id,  $kategori,  $no_invoice, $no_po, $tanggal_po, $o, $harga_beli[$key], $harga_jual[$key], $qty[$key], $keuntungan[$key]);
        };

        foreach ($keterangan as $key => $x) {
            # code...
            $id = uniqid();
            $this->transaksiModel->simpanPengeluaran($id, $no_invoice, $no_po, $tanggal_po, $x, $nominal[$key]);
        }
        // echo json_encode($data);

        echo json_encode('OK');
    }



    function laporanpenjualan(){
        $this->load->view('__template/header');
        $this->load->view('laporanPenjualan');
        $this->load->view('__template/footer');
    }


}