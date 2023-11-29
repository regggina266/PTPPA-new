<?php
defined('BASEPATH') or exit('No direct script access allowed');

//nama classnya
class Akunadm extends CI_Controller
{
    //pemanggilan construct 
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form', 'download');
        $this->load->model('M_ppa');
        $this->load->model('m_akun');
    }
    //function tampilan awal
    public function index()
    {
        $data['akun'] = $this->m_akun->akun();
        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/navbar');
        $this->load->view('Templates/sidebaradm',$data);
        $this->load->view('akunadm', $data);

    }
    //tampilan pada button tambah pada Akun
    public function tambah()
    {
        $data['levels'] = $this->m_akun->get_levels();
        $data['departemen'] = $this->m_akun->get_departemen();
        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/sidebaradm');
        $this->load->view('tambahakunadm', $data);

        }

        //proses penambahan data akun
        public function tambah_akun()
        {
            // Retrieve data from the form
            $dataakun = array(
                'nama' => $this->input->post('nama'),
                'NRP' => $this->input->post('NRP'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'idlevel' => $this->input->post('level_k'),
                'iddepartemen' => $this->input->post('devisi'),
                // Add more fields if needed
            );
        
            // Insert data into the 'akun' table using your model method
            $idakun = $this->m_akun->insert_akun($dataakun);
        
            // Redirect after adding the account
            if ($idakun) {
                // If successful, redirect to a success page or back to the main page
                redirect('akunadm');
            } else {
                // If not successful, handle the error accordingly
                echo "Failed to add the account.";
            }
        }
        
        public function edit($idakun) {
            $where = array('idakun' => $idakun);
            $data['akun'] = $this->m_akun->get_akun_by_id($where); 
            $this->load->view('Templates/header');
            $this->load->view('Templates/sidebaradm');
            $this->load->view('editakunadm', $data);
        }
        

    public function proses_edit() {
        // Retrieve updated data from the form
        $idakun = $this->input->post('idakun');
        $dataakun = array(
                'idakun' => $this->input->post('idakun'),
                'nama' => $this->input->post('nama'),
                'NRP' => $this->input->post('NRP'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'idlevel' => $this->input->post('idlevel'),
                'iddepartemen' => $this->input->post('departemen'),
        );
    
        // Update the 'akun' record based on 'idakun'
        $where = array('idakun' => $idakun);
        $result = $this->m_akun->update_akun($where, $dataakun);
    
        if ($result) {
            // If the update was successful, redirect to a success page or perform other actions
            echo "Data akun berhasil diperbarui.";
            // Redirect to a success page or appropriate location
            redirect('akunadm');
        } else {
            // If the update failed, show an error message or perform other actions
            echo "Gagal memperbarui data akun.";
            // Redirect to an error page or appropriate location
            redirect('akunadm/edit/' . $idakun); // Redirect back to edit page
        }
    }
    
    // -- method menghapus data produk -- //
    public function delete($idakun)
    {
        $this->m_akun->delete($idakun);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('delete', ' Data akun berhasil dihapus.');
            redirect('akunadm');
        } else {
            redirect('akunadm');
        }
    }
}