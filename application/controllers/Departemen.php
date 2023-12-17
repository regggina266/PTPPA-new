<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Departemen extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();

        $this->load->model('M_departemen');
        $this->load->model('M_ppa');
        
    }
    public function index()
    {
        $data['departemen'] = $this->M_ppa->departemen()->result();
        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/navbar');
        $this->load->view('Templates/sidebarms',$data);
        $this->load->view('departemen', $data);

    }


      public function tambah()
    {
        $data['departemen'] = $this->M_ppa->departemen()->result();
        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/sidebarms');
        $this->load->view('tambahdepartemen', $data);

       
    }

        //proses penambahan data akun
        public function tambah_departemen()
        {
            // Retrieve data from the form
            $datadep = array(
                'namadepartemen' => $this->input->post('namadepartemen'),
                'devisi' => $this->input->post('devisi'),
                
                // Add more fields if needed
            );
        
            // Insert data into the 'akun' table using your model method
            $iddepartemen = $this->M_departemen->insert_dep($datadep);
        
            // Redirect after adding the account
            if ($iddepartemen) {
                // If successful, redirect to a success page or back to the main page
                redirect('departemen');
            } else {
                // If not successful, handle the error accordingly
                echo "Failed to add the departemen.";
            }
        }

        public function edit($iddepartemen)
        {
            // Mengambil data akun berdasarkan ID
            $where = array('iddepartemen' => $iddepartemen);
            $data['departemen'] = $this->M_departemen->data_iddep($where);
        
            if ($data['departemen']) { // Check if data exists
                // Memuat view untuk mengedit data akun
               $this->load->view('Templates/header');
               $this->load->view('Templates/sidebarms');
               $this->load->view('editdepartemen', $data);
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
                $iddepartemen = $this->input->post('iddepartemen');
                $namadepartemen = $this->input->post('namadepartemen');
                $devisi = $this->input->post('devisi');
              
    
                $data = array(
                    //'nama' => $nama, // Use the fetched 'nama' instead of 'idakun'
                    'iddepartemen' => $iddepartemen,
                    'namadepartemen' => $namadepartemen,
                    'devisi' => $devisi,
                    
                );
    
                $where = array(
                    'iddepartemen' => $iddepartemen,
                );
    
                $this->M_departemen->updatedep($where, $data, 'departemen');
    
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', ' Data Laporan berhasil diedit.');
                    redirect('departemen');
                } else {
                    redirect('departemen');
                }
            }
    
      
        public function delete($iddepartemen)
        {
            $this->M_departemen->delete($iddepartemen);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('delete', ' Data akun berhasil dihapus.');
                redirect('departemen');
            } else {
                redirect('departemen');
            }
        }
}
