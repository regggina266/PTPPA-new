<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporanadm extends CI_Controller
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
        $data['laporan'] = $this->M_ppa->laporan();
        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/navbar');
        $this->load->view('Templates/sidebaradm');
        $this->load->view('laporanadm', $data);
    
    }
    public function tambah()
    {
        $data['last'] = $this->M_ppa->get_last_permohonan();
        $data['nrp'] = $this->session->userdata('NRP');
        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/sidebaradm');
        $this->load->view('tambahdatalaporanadm', $data);
    }
    public function new_permohonan(){
        $data['no_surat'] = $this->input->post('no_surat');
        $data['nrp'] = $this->input->post('nrp');
        $data['created_date'] = $this->input->post('created_date');
        $data['catatan'] = $this->input->post('catatan');
        $data['status'] = $this->input->post('status');
        $insert_permohonan = $this->M_ppa->insert_new_permohonan($data);
        // $insert_permohonan = 2;
        $daftar_item = $this->input->post('daftar_item');
        foreach ($daftar_item as &$value){
            $value['id_permohonan'] = $insert_permohonan; 
        }
        // adding list item
        $insert_item = $this->M_ppa->insert_list_item($daftar_item);
        echo $insert_item;
    }
       public function tambah_barang()
    {
        // Mengambil data dari formulir input
        $data_laporan = array(
            'idakun' => $this->input->post('nama'),
            'idjenis' => $this->input->post('idjenis'),
            'kode_surat' => $this->input->post('kode_surat'),
            'nama_barang' => $this->input->post('nama_barang'),
            'jumlah' => $this->input->post('jumlah'),
            'rincian' => $this->input->post('rincian'),
            'agenda' => $this->input->post('agenda'),
            'tanggal_agenda' => $this->input->post('tanggal_agenda'),
            'NRP' => $this->input->post('NRP'),
           // 'file' => $this->input->post('file'),
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
        redirect('laporanadm');
    }
    public function edit($idlaporan)
    {
        // Mengambil data akun berdasarkan ID
        $where = array('idlaporan' => $idlaporan);
        $data['laporan'] = $this->M_ppa->data_idlap($where);
    
        if ($data['laporan']) { // Check if data exists
            // Memuat view untuk mengedit data akun
           $this->load->view('Templates/header');
           $this->load->view('Templates/sidebaradm');
           $this->load->view('editlaporanadm', $data);
           $this->load->view('Templates/footer');
           //print_r($data['laporan']);
        } else {
            // Handle the case where data with the given ID is not found
            echo "Data not found"; // Or perform a redirect or show an error message
        }
    }
            public function proses_edit()
        {
           

            // Retrieve other form inputs
            $idlaporan = $this->input->post('idlaporan');
            $idjenis = $this->input->post('idjenis');
            $kode_surat = $this->input->post('kode_surat');
            $nama_barang = $this->input->post('nama_barang');
            $jumlah = $this->input->post('jumlah');
            $rincian = $this->input->post('rincian');
            $agenda = $this->input->post('agenda');
            $tanggal_agenda = $this->input->post('tanggal_agenda');
            $NRP = $this->input->post('NRP');

            $data = array(
                //'nama' => $nama, // Use the fetched 'nama' instead of 'idakun'
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
                redirect('laporanadm');
            } else {
                redirect('laporanadm');
            }
        }


     // -- method menghapus data produk -- //
    public function delete($idbarang)
    {
        $this->m_laporan->delete($idbarang);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('delete', ' Data laporan berhasil dihapus.');
            redirect('laporanadm');
        } else {
            redirect('laporanadm');
        }
    }
}