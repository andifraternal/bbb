<?php

class Transaksi extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model(array('barangModel', 'kategoriModel', 'transaksiModel'));
        $this->load->library(array( 'PHPExcel'));
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

    function tampilTransaksi($tanggalMulai, $tanggalSelesai){
        $query = $this->transaksiModel->tampilDataTransaksi($tanggalMulai, $tanggalSelesai)->result();
        echo json_encode($query);
    }


    function detailTransaksi($id){
        $barang = $this->transaksiModel->detailTransaksiBarang($id)->result();
        $pengeluaran = $this->transaksiModel->detailTransaksipengeluaran($id)->result();
        $jumlah = $this->transaksiModel->detailTransaksi($id)->result();
        echo json_encode(array('barang'=>$barang, 'pengeluaran'=>$pengeluaran, 'jumlah'=>$jumlah));
    }


    function downloadLaporan($id){
        $barang = $this->transaksiModel->detailTransaksiBarang($id);
        $pengeluaran = $this->transaksiModel->detailTransaksipengeluaran($id);
        $jumlah = $this->transaksiModel->detailTransaksi($id)->row();

        $objPHPExcel = new PHPExcel();

        $style_header = array(  
            'font' => array(
                'size' => 18,
                'bold' => true), 
                'alignment' => array(    
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)    
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)  
                )  
        );
        $style1 = array(  
            'font' => array(
                'size' => 14,
                'bold' => true), 
                'alignment' => array(    
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, // Set text jadi ditengah secara horizontal (center)    
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)  
                )  
        );
        $style3 = array(  
            'font' => array(
                'bold' => true,
                'size' => 12), // Set font nya jadi bold  
                'alignment' => array(    
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)    
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'wrap' => true // Set text jadi di tengah secara vertical (middle) 
                ),
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
            )
        );

        $style_left = array(  
            'font' => array(
                'size' => 11,
                'bold' => true
                ), // Set font nya jadi bold  
                'alignment' => array(    
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, // Set text jadi ditengah secara horizontal (center)    
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'wrap' => true // Set text jadi di tengah secara vertical (middle)  
                ),
                'borders' => array(    
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis    
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis    
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis    
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis  
                )
        );

        $style_col = array(  
            'font' => array(
                'bold' => false,
                'size' => 11), // Set font nya jadi bold  
                'alignment' => array(    
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)    
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
                ),          
            'borders' => array(    
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis    
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis    
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis    
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis  
            )   
        );


        $blokAbuAbu = array(  
            'font' => array(
                'bold' => false,
                'size' => 13), // Set font nya jadi bold  
                'alignment' => array(    
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)    
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
                ),          
            'borders' => array(    
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis    
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis    
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis    
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis  
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => 'A0A0A0')
            )
        );

        $objPHPExcel->getActiveSheet()->setCellValue('A1','Laporan Penjualan');
        $objPHPExcel->getActiveSheet()->mergeCells('A1:E1');
        $objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($style_header);
        $objPHPExcel->getActiveSheet()->setCellValue('A3','No Invoice');
        $objPHPExcel->getActiveSheet()->setCellValue('B3',': '.$jumlah->no_invoice);
        $objPHPExcel->getActiveSheet()->setCellValue('A4','No PO');
        $objPHPExcel->getActiveSheet()->setCellValue('B4',': '.$jumlah->no_po);
        $objPHPExcel->getActiveSheet()->setCellValue('A5','Tanggal PO');
        $objPHPExcel->getActiveSheet()->setCellValue('B5',': '.$jumlah->tanggal_po);
        $objPHPExcel->getActiveSheet()->setCellValue('A7','List Penjualan');


        $objPHPExcel->getActiveSheet()->setCellValue('A8','QTY');
        $objPHPExcel->getActiveSheet()->setCellValue('B8','NAMA BARANG / JASA');
        $objPHPExcel->getActiveSheet()->setCellValue('C8','HARGA BELI');
        $objPHPExcel->getActiveSheet()->setCellValue('D8','HARGA JUAL');
        $objPHPExcel->getActiveSheet()->setCellValue('E8','JUMLAH HARGA JUAL');
        $objPHPExcel->getActiveSheet()->getStyle('A8')->applyFromArray($blokAbuAbu);
        $objPHPExcel->getActiveSheet()->getStyle('B8')->applyFromArray($blokAbuAbu);
        $objPHPExcel->getActiveSheet()->getStyle('C8')->applyFromArray($blokAbuAbu);
        $objPHPExcel->getActiveSheet()->getStyle('D8')->applyFromArray($blokAbuAbu);
        $objPHPExcel->getActiveSheet()->getStyle('E8')->applyFromArray($blokAbuAbu);


        $q = $barang->result();
        $cc = $barang->num_rows();

        $row = 9;
        for($i=0; $i<$cc; $i++){
                $objPHPExcel->getActiveSheet()->setCellValue('A'.$row,$q[$i]->qty);
                $objPHPExcel->getActiveSheet()->setCellValue('B'.$row,$q[$i]->nama_barang);
                $objPHPExcel->getActiveSheet()->setCellValue('C'.$row,$q[$i]->harga_beli);
                $objPHPExcel->getActiveSheet()->getStyle('C'.$row)->getNumberFormat()->setFormatCode('#,##0');
                $objPHPExcel->getActiveSheet()->setCellValue('D'.$row,$q[$i]->harga_jual);
                $objPHPExcel->getActiveSheet()->getStyle('D'.$row)->getNumberFormat()->setFormatCode('#,##0');
                $objPHPExcel->getActiveSheet()->setCellValue('E'.$row,($q[$i]->qty)*($q[$i]->harga_jual));
                $objPHPExcel->getActiveSheet()->getStyle('E'.$row)->getNumberFormat()->setFormatCode('#,##0');
                $row++;
        }

        for($i=8; $i<$row; $i++){
            $objPHPExcel->getActiveSheet()->getStyle('A'.$i)->applyFromArray($style_col);
            $objPHPExcel->getActiveSheet()->getStyle('B'.$i)->applyFromArray($style_col);
            $objPHPExcel->getActiveSheet()->getStyle('C'.$i)->applyFromArray($style_col);
            $objPHPExcel->getActiveSheet()->getStyle('D'.$i)->applyFromArray($style_col);
            $objPHPExcel->getActiveSheet()->getStyle('E'.$i)->applyFromArray($style_col);
        }


        $row+1;
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$row,'List Pengeluaran');

        $row = $row+1;
        $momo = $pengeluaran->result();
        $dodo = $pengeluaran->num_rows();
        $ttt = $row;

        for($u=0; $u<$dodo; $u++){
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$row,$momo[$u]->keterangan);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$row,$momo[$u]->nominal);
            $objPHPExcel->getActiveSheet()->getStyle('B'.$row)->getNumberFormat()->setFormatCode('#,##0');
            $row++;
        };

        for($i= $ttt; $i<$row; $i++){
            $objPHPExcel->getActiveSheet()->getStyle('A'.$i)->applyFromArray($style_col);
            $objPHPExcel->getActiveSheet()->getStyle('B'.$i)->applyFromArray($style_col);
        };

        $row = $row;

        $objPHPExcel->getActiveSheet()->setCellValue('D'.$row,'Sub total');
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$row,$jumlah->total_jual);
        $objPHPExcel->getActiveSheet()->getStyle('E'.$row)->getNumberFormat()->setFormatCode('#,##0');

        
        if($jumlah->pajak_daerah > 0){
            $row = $row+1;
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$row,'Pajak Daerah');
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$row,$jumlah->pajak_daerah);
            $objPHPExcel->getActiveSheet()->getStyle('E'.$row)->getNumberFormat()->setFormatCode('#,##0');
        }

        
        if($jumlah->ppn > 0){
            $row = $row+1;
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$row,'PPN');
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$row,$jumlah->ppn);
            $objPHPExcel->getActiveSheet()->getStyle('E'.$row)->getNumberFormat()->setFormatCode('#,##0');
        }

        
        if($jumlah->pph > 0){
            $row = $row+1;
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$row,'PPH');
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$row,$jumlah->pph);
            $objPHPExcel->getActiveSheet()->getStyle('E'.$row)->getNumberFormat()->setFormatCode('#,##0');
        }

        
        if($jumlah->pajak_platform > 0){
            $row = $row+1;
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$row,'pajak Platform');
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$row,$jumlah->pajak_platform);
            $objPHPExcel->getActiveSheet()->getStyle('E'.$row)->getNumberFormat()->setFormatCode('#,##0');
        }

        
        if($jumlah->pengeluaran > 0){
            $row = $row+1;
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$row,'Total Pengeluaran');
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$row,$jumlah->pengeluaran);
            $objPHPExcel->getActiveSheet()->getStyle('E'.$row)->getNumberFormat()->setFormatCode('#,##0');
        }

        $row = $row+1;
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$row,'Total Modal');
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$row,$jumlah->total_beli);
        $objPHPExcel->getActiveSheet()->getStyle('E'.$row)->getNumberFormat()->setFormatCode('#,##0');

        $row = $row+1;
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$row,'Penjualan Bersih');
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$row,$jumlah->penjualan_bersih);
        $objPHPExcel->getActiveSheet()->getStyle('E'.$row)->getNumberFormat()->setFormatCode('#,##0');

        $row = $row+1;
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$row,'Laba');
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$row,$jumlah->keuntungan_bersih);
        $objPHPExcel->getActiveSheet()->getStyle('E'.$row)->getNumberFormat()->setFormatCode('#,##0');

        foreach(range('A','E') as $columnID) {
            $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
                ->setAutoSize(true);
        }  

        // $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);  

        $objPHPExcel->getActiveSheet()->setTitle('SME Modul 2');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
                        //Header
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                        //Nama File
        header('Content-Disposition: attachment;filename="SME Modul 2.xlsx"');
                        //Download
        $objWriter->save("php://output"); 
        // print_r($datarow);
    } 


}