<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Generate extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
    }
    
    function index()
    {
        
        $this->load->library('pdfgenerator');
        
        // Title/judul website (apabila nama file ingin di generate otomatis dari title/judul website
        $data['title'] = "Laporan RKB";
        // Nama file PDF yang nantinya akan di generate
        $file_pdf = $data['title'];
        // Ukuran kertas/PDF
        $paper = 'A4';
        //layout file PDF (landscape atau potrait)
        $orientation = "portrait";
        $result=$this->M_ppa->get_data('laporan')->result();
        $data['laporan'] = $result;
        // $data['nosurat'] =$result->kode_surat;
        $html = $this->load->view('laporanpdf', $data, true);
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);

    }
   
}
