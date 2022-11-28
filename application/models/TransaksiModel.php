<?php

class TransaksiModel extends CI_Model{
    function simpanPenjualan($id, $kategori, $no_invoice, $no_po, $tanggal_po, $id_barang, $harga_beli, $harga_jual, $qty, $keuntungan){
        $query = $this->db->query("
            insert into transaksi (id_transaksi, kategori, no_invoice, no_po, tanggal_po, id_barang, harga_beli, harga_jual, qty, laba_rugi) values 
            ('$id', '$kategori', '$no_invoice', '$no_po', '$tanggal_po', '$id_barang', '$harga_beli', '$harga_jual', '$qty', '$keuntungan')
        ");
        return $query;
    }


    function simpanPengeluaran($id, $no_invoice, $no_po, $tanggal_po, $keterangan, $nominal){
        $query = $this->db->query("
            insert into transaksi_pengeluaran (id_transaksi_pengeluaran, no_invoice, no_po, tanggal_po, keterangan, nominal) values 
            ('$id', '$no_invoice', '$no_po', '$tanggal_po', '$keterangan', '$nominal')
        ");
        return $query;
    }

    function tampilDataTransaksi($tanggalMulai, $tanggalSelesai){
        $query = $this->db->query("
            select * from view_master_transaksi where tanggal_po >= '$tanggalMulai' and tanggal_po <= '$tanggalSelesai'
        ");
        return $query;
    }
}