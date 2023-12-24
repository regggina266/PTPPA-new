<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Generate extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_ppa');
    }
    
    function index($id)
    {
        $this->load->library('pdfgenerator');
        
        $data['title'] = "Laporan RKB";
        $file_pdf = $data['title'];
        $paper = 'A4';
        $orientation = "portrait";
        
        // Ambil data dari model Permohonan_model
        $data['laporan'] = $this->M_ppa->get_data_by_id('permohonan', $id)->row();
        $data['list_item'] = $this->M_ppa->get_data_by_id('list_item', $id)->result();
        // // Ambil data dari model List_item_model
        // $data['list_item'] = $this->M_ppa->get_data('list_item')->result();
        
        $html = $this->load->view('laporanpdf', $data, true);
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
