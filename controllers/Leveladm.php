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
            'nama' => $this->input->post('nama'),
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
        $data['level'] = $this->M_ppa->data_id($where);

        //print_r($data['level']);
        // Memuat view untuk mengedit data akun
        
        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/sidebaradm');
        $this->load->view('editleveladm', $data);

    }
     // -- method mengedit data produk -- //
    public function proses_edit()
    {
        $idlevel = $this->input->post('idlevel');
        $nama = $this->input->post('nama');
        $level_k = $this->input->post('level_k');
        $status_level = $this->input->post('status_level');
      
        
        $data = array(
       
        'idlevel' => $idlevel,
        'nama' => $nama,
        'level_k' => $level_k,
        'status_level' => $status_level,
        'iddepartemen' => $namadepartemen,
        
            
        );
        $where = array(
            'idlevel' => $idlevel,
        );
        $this->M_ppa->updatelevel($where, $data, 'level');

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', ' Data Laporan berhasil diedit.');
            redirect('leveladm');
        } else {
            redirect('leveladm');
        }        
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