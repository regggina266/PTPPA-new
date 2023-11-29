<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akunsh extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();

        $this->load->helper('url', 'form', 'download');
        $this->load->model('M_ppa');
        $this->load->model('m_akun');
    }


    public function index()
    {
       
        $data['akun'] = $this->M_ppa->get_data('akun')->result();
        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/navbar');
        $this->load->view('Templates/sidebarsh',$data);
        $this->load->view('akunsh', $data);
        $this->load->view('Templates/footer');
    }
    public function tambah()
    {
        $data['akun'] = $this->M_ppa->akun()->result();

        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/sidebarsh');
        $this->load->view('tambahakun', $data);
        $this->load->view('Templates/footer');
    }
       public function tambah_akun()
    {
        // Mengambil data dari formulir input
        $data_akun = array(
            'nama' => $this->input->post('nama'),
            'NRP' => $this->input->post('NRP'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'idlevel' => $this->input->post('idlevel'),

        );

        // Memasukkan data ke tabel "akun"
        $idakun = $this->M_ppa->insert_akun($data_akun);

        // Jika data berhasil ditambahkan
        if ($idakun) {
            // Tampilkan pesan sukses atau lakukan aksi lainnya
            echo "Data akun berhasil ditambahkan dengan ID: " . $idakun;
        } else {
            // Tampilkan pesan error atau lakukan penanganan kesalahan lainnya
            echo "Gagal menambahkan data akun.";
        }
        redirect('akunsh');
    }
     public function edit($idakun)
    {
        // Mengambil data akun berdasarkan ID
        $where = array('idakun' => $idakun);
        $data['akun'] = $this->M_ppa->data_idak($where);

        // Memuat view untuk mengedit data akun
        
        $this->load->view('Templates/header');
        $this->load->view('Templates/sidebarsh');
        $this->load->view('editakun', $data);
        $this->load->view('Templates/footer');
    }

    public function proses_edit()
    {
        // Mengambil data dari formulir input
        $idakun = $this->input->post('idakun');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $password1 = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);

        if($password != ''){
            $dataakun = array(
                'nama' => $this->input->post('nama'),
                'NRP' => $this->input->post('NRP'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'idlevel' => $this->input->post('idlevel')
            );

            $where = array('idakun' => $idakun);
            // Memperbarui data akun berdasarkan ID
            $result = $this->M_ppa->update($where, $dataakun, 'akun');

            // Jika data berhasil diperbarui
            if ($result) {
                // Tampilkan pesan sukses atau lakukan aksi lainnya
                echo "Data akun berhasil diperbarui.";
            } else {
                // Tampilkan pesan error atau lakukan penanganan kesalahan lainnya
                echo "Gagal memperbarui data akun.";
            }
            redirect('akunsh');
        } else {
            $dataakun = array(
                'nama' => $this->input->post('nama'),
                'NRP' => $this->input->post('NRP'),
                'idlevel' => $this->input->post('idlevel')
            );

            $where = array('idakun' => $idakun);
            // Memperbarui data akun berdasarkan ID
            $result = $this->M_ppa->update($where, $dataakun, 'akun');

            // Jika data berhasil diperbarui
            if ($result) {
                // Tampilkan pesan sukses atau lakukan aksi lainnya
                echo "Data akun berhasil diperbarui.";
            } else {
                // Tampilkan pesan error atau lakukan penanganan kesalahan lainnya
                echo "Gagal memperbarui data akun.";
            }
            redirect('akunsh');
        }
        
    }

    // -- method menghapus data produk -- //
    public function delete($idakun)
    {
        $this->m_akun->delete($idakun);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('delete', ' Data akun berhasil dihapus.');
            redirect('akunsh');
        } else {
            redirect('akunsh');
        }
    }

}