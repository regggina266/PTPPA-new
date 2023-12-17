<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leveladm extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();

        $this->load->helper('url', 'form', 'download');
        $this->load->model('M_ppa');
        $this->load->model('m_level');
       
    }
    public function index()
    {
       
        $data['level'] = $this->m_level->level_();
        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/navbar');
        $this->load->view('Templates/sidebaradm');
        $this->load->view('leveladm', $data);
        $this->load->view('Templates/footer');
    }
     public function tambah()
    {
        $data['level'] = $this->M_ppa->level();
        
        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/sidebaradm');
        $this->load->view('tambahleveladm', $data);
        $this->load->view('Templates/footer');
    }
       public function tambah_level()
    {
        // Mengambil data dari formulir input
        $data_level = array(
            'idlevel' => $this->input->post('idlevel'),
            'level_k' => $this->input->post('level_k'),
        );

        // Memasukkan data ke tabel "akun"
        $idlevel = $this->M_ppa->insert_level($data_level);

        // Jika data berhasil ditambahkan
        if ($idlevel) {
            // Tampilkan pesan sukses atau lakukan aksi lainnya
            echo "Data akun berhasil ditambahkan dengan ID: " . $idlevel;
        } else {
            // Tampilkan pesan error atau lakukan penanganan kesalahan lainnya
            echo "Gagal menambahkan data akun.";
        }
        redirect('leveladm');
    }

    
    public function edit($idlevel)
    {
        // Mengambil data akun berdasarkan ID
        $where = array('idlevel' => $idlevel);
        $data['level'] = $this->m_level->data_idlevel($where);
    
        if ($data['level']) { // Check if data exists
            // Memuat view untuk mengedit data akun
           $this->load->view('Templates/header');
           $this->load->view('Templates/sidebaradm');
           $this->load->view('editleveladm', $data);
           $this->load->view('Templates/footer');
           //print_r($data['laporan']);
        } else {
            // Handle the case where data with the given ID is not found
            echo "Data not found"; // Or perform a redirect or show an error message
        }
    }


    public function proses_edit()
    {
        // Retrieve form inputs
        $idlevel = $this->input->post('idlevel');
        $level_k = $this->input->post('level_k');
    
        // Create an array with the data to be updated
        $data = array(
            'level_k' => $level_k,
        );
    
        // Define the condition to find the record to be updated
        $where = array(
            'idlevel' => $idlevel,
        );
    
        // Call the updatelevel method from model 'm_level' to update the record
        $this->m_level->updatelevel($where, $data, 'level');
    
        // Check if any rows were affected after the update
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Laporan berhasil diedit.');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengedit data.');
        }
    
        // Redirect to the 'leveladm' page
        redirect('leveladm');
    }
    
    public function delete($idlevel)
    {
        $this->m_level->delete($idlevel);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('delete', ' Data level berhasil dihapus.');
            redirect('leveladm');
        } else {
            redirect('leveladm');
        }
    }
}