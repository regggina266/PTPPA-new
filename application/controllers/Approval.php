<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approval extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();

        $this->load->helper('url', 'form', 'download');
        $this->load->model('M_ppa');
       
    }

    public function index()
        {
            $data['laporan'] = $this->M_ppa->approval();
            $data['barang'] = $this->M_ppa->barang();
            $this->load->view('Templates/header', $data);
            $this->load->view('Templates/navbar');
            $this->load->view('Templates/sidebaradm');
            $this->load->view('approval', $data); 
        }

            public function tambahfile(){
                $config['upload_path'] = './detail/';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = 10000;
                $config['max_width'] = 10000;
                $config['max_height'] = 10000;
            
                $this->load->library('upload', $config);
            
                if (!$this->upload->do_upload('userfile')) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal Tambah Data!</div>');
                    redirect('Approval');
                } else {
                    $detail = $this->upload->data();
                    $detail = $detail['file_name'];
            
                    // Fetching 'NRP' and 'agenda' from 'ltb_barang' table based on certain conditions (e.g., 'idbarang')
                    $idbarang = $this->input->post('idbarang', TRUE);
                    $tb_barang_data = $this->db->get_where('tb_barang', array('idbarang' => $idbarang))->row();
            
                    if ($tb_barang_data) {
                        $NRP = $tb_barang_data->NRP;
                        $agenda = $tb_barang_data->agenda;
            
                        $data = array(
                            'file' => $detail,
                            'tgl_ajuan' => $this->input->post('tgl_ajuan', TRUE),
                            'agenda' => $agenda,
                            'NRP' => $NRP,
                            // Other data to be inserted...
                        );
            
                        $this->db->insert('laporan', $data);
                        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Tambah Data Berhasil!</div>');
                        redirect('Approval');
                    } else {
                        // Handle scenario where data from 'ltb_barang' is not found
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Barang tidak ditemukan!</div>');
                        redirect('Approval');
                    }
                }
            }
            

}   