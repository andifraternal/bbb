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
            select * from view_master_transaksi where DATE_FORMAT(tanggal_po, '%Y-%m-%d') >= '$tanggalMulai' and DATE_FORMAT(tanggal_po, '%Y-%m-%d') <= '$tanggalSelesai'
        ");
        return $query;
    }

    function detailTransaksiBarang($id){
        $query = $this->db->query("
            select * from transaksi a join master_barang b on a.id_barang = b.id_barang where a.no_po = '$id'
        ");
        return $query;
    }

    function detailTransaksipengeluaran($id){
        $query = $this->db->query("
            select * from transaksi_pengeluaran where no_po = '$id'
        ");
        return $query;
    }

    function detailTransaksi($id){
        $query = $this->db->query("
            select * from view_master_transaksi where no_po = '$id'
        ");
        return $query;
    }

    function simpanMasterTransaksi($id, $kategori,  $no_invoice, $no_po, $tanggal_po, $pajak_daerah, $ppn, $pph, $pajak_platform){
        $query = $this->db->query("
            insert into master_transaksi (id_master_transaksi, kategori, no_invoice, no_po, tanggal_po, pajak_daerah, ppn, pph, pajak_platform) 
            values 
            ('$id', '$kategori', '$no_invoice', '$no_po', '$tanggal_po', '$pajak_daerah', '$ppn', '$pph', '$pajak_platform')
        ");
        return $query;
    }


}