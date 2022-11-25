<?php

class BarangModel extends CI_Model{

    var $tabelbarang = 'master_barang'; //nama tabel dari database
    var $tabelkategori = 'master_kategori'; //nama tabel dari database
    var $column_order = array(null, 'master_kategori.nama_kategori','master_barang.nama_barang','master_barang.harga_update'); //field yang ada di table user
    var $column_search = array('master_kategori.nama_kategori','master_barang.nama_barang','master_barang.harga_update'); //field yang diizin untuk pencarian 
    var $order = array('master_kategori.nama_kategori' => 'asc'); // default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    private function _get_datatables_query()
    {
         
        $this->db->select('*');
        $this->db->from($this->tabelbarang);
        $this->db->join($this->tabelkategori, 'master_barang.id_kategori = master_kategori.id_kategori');
        $this->db->where('master_barang.status_aktif' , '1');
 
        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        // $this->db->from($this->tabelbarang);
        $this->db->select('*');
        $this->db->from($this->tabelbarang);
        $this->db->join($this->tabelkategori, 'master_barang.id_kategori = master_kategori.id_kategori');
        $this->db->where('master_barang.status_aktif' , '1');
        return $this->db->count_all_results();
    }


    function insertBarang($id, $kategori, $namabarang, $harga){
        $query = $this->db->query("
            insert into master_barang (id_barang, id_kategori, nama_barang, harga_update, status_aktif) values ('$id', '$kategori', '$namabarang', '$harga', '1')
        ");
        return $query;
    }

    function insertBarangLog($id , $harga){
        $idlog = uniqid();
        $query = $this->db->query("
            insert into master_barang_log (id_log, id_barang, harga) values ('$idlog', '$id', '$harga')
        ");
        return $query;
    }

    function getBarang($barang){
        $query = $this->db->query("
            select * from master_barang where id_barang = '$barang'
        ");
        return $query;
    }

    function updateData($idbarang, $harga, $now){
        $query = $this->db->query("
            update master_barang set harga_update = '$harga', updated_at = '$now' where id_barang = '$idbarang'
        ");
        return $query;
    }

    function hapusBarang($idBarang){
        $query = $this->db->query("
            update master_barang set status_aktif  = '0' where id_barang = '$idBarang'
        ");
        return $query;
    }


    function get_barang($kategori){
        $query = $this->db->query("
            select * from master_barang where status_aktif = '1' and id_kategori = '$kategori'
        ");
        return $query;
    }
}