<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporanms extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();

        $this->load->helper('url', 'form', 'download');
        $this->load->model('M_ppa');
        $this->load->model('m_laporan');
       
    }
    public function index()
    {
       
        $data['laporan'] = $this->M_ppa->get_data('laporan')->result();
        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/navbar');
        $this->load->view('Templates/sidebarms');
        $this->load->view('laporanms', $data);
        $this->load->view('Templates/footer');
    }
    public function tambah()
    {
        $data['laporan'] = $this->M_ppa->laporan()->result();

        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/sidebarms');
        $this->load->view('tambahdatalaporan', $data);
        $this->load->view('Templates/footer');
    }
       public function tambah_laporan()
    {
        // Mengambil data dari formulir input
        $data_laporan = array(
            'idakun' => $this->input->post('idakun'),
            'idjenis' => $this->input->post('idjenis'),
            'kode_surat' => $this->input->post('kode_surat'),
            'nama_barang' => $this->input->post('nama_barang'),
            'jumlah' => $this->input->post('jumlah'),
            'rincian' => $this->input->post('rincian'),
            'agenda' => $this->input->post('agenda'),
            'tanggal_agenda' => $this->input->post('tanggal_agenda'),
            'NRP' => $this->input->post('NRP'),
        );

        // Memasukkan data ke tabel "akun"
        $idlaporan = $this->M_ppa->insert_laporan($data_laporan);

        // Jika data berhasil ditambahkan
        if ($idlaporan) {
            // Tampilkan pesan sukses atau lakukan aksi lainnya
            echo "Data akun berhasil ditambahkan dengan ID: " . $idlaporan;
        } else {
            // Tampilkan pesan error atau lakukan penanganan kesalahan lainnya
            echo "Gagal menambahkan data akun.";
        }
        redirect('laporanms');
    }
    public function edit($idlaporan)
    {
        // Mengambil data akun berdasarkan ID
        $where = array('idlaporan' => $idlaporan);
        $data['laporan'] = $this->M_ppa-> data_idlap($where);

        // Memuat view untuk mengedit data akun
        
        $this->load->view('Templates/header');
        $this->load->view('Templates/sidebarms');
        $this->load->view('editlaporan', $data);
        $this->load->view('Templates/footer');
    }
    public function proses_edit()
    {
        // Mengambil data dari formulir input
        $idlaporan = $this->input->post('idlaporan');
        $idakun = $this->input->post('idakun');
        $idjenis = $this->input->post('idjenis');
        $kode_surat = $this->input->post('kode_surat');
        $nama_barang = $this->input->post('nama_barang');
        $jumlah = $this->input->post('jumlah');
        $rincian = $this->input->post('rincian');
        $agenda = $this->input->post('agenda');
        $tanggal_agenda = $this->input->post('tanggal_agenda');
        $NRP = $this->input->post('NRP');
        $data = array(
       
        'idakun' => $idakun,
        'idjenis' => $idjenis,
        'kode_surat' => $kode_surat,
        'nama_barang' => $nama_barang,
        'jumlah' => $jumlah,
        'rincian' => $rincian,
        'agenda' => $agenda,
        'tanggal_agenda' => $tanggal_agenda,
        'NRP' => $NRP,
            
        );
        $where = array(
            'idlaporan' => $idlaporan,
        );
        $this->M_ppa->updatelaporan($where, $data, 'laporan');

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', ' Data Laporan berhasil diedit.');
            redirect('laporanms');
        } else {
            redirect('laporanms');
        }        
    }
     // -- method menghapus data produk -- //
    public function delete($idlaporan)
    {
        $this->m_laporan->delete($idlaporan);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('delete', ' Data laporan berhasil dihapus.');
            redirect('laporanms');
        } else {
            redirect('laporanms');
        }
    }
}