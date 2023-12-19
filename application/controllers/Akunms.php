<?php
defined('BASEPATH') or exit('No direct script access allowed');

//nama classnya
class Akunms extends CI_Controller
{
    //pemanggilan construct 
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form', 'download');
        $this->load->model('M_ppa');
        $this->load->model('M_akun');
    }
    //function tampilan awal
    public function index()
    {
        $data['akun'] = $this->M_akun->akun();
        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/navbar');
        $this->load->view('Templates/sidebarms',$data);
        $this->load->view('akunms', $data);

    }
    //tampilan pada button tambah pada Akun
    public function tambah()
    {
        $data['levels'] = $this->M_akun->get_levels();
        $data['departemen'] = $this->M_akun->get_departemen();
        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/sidebarms');
        $this->load->view('tambahakunms', $data);

        }

        //proses penambahan data akun
        public function tambah_akun()
        {
            // Load the necessary libraries
            $this->load->library('upload');
        
            // Configuration for file upload
            $config['upload_path'] = './uploads/'; // specify the folder where you want to save the uploaded images
            $config['allowed_types'] = 'gif|jpg|jpeg|png'; // specify the allowed file types
            $config['max_size'] = 2048; // specify the maximum file size in kilobytes
        
            $this->upload->initialize($config);
        
            // Check if the file upload is successful
            if ($this->upload->do_upload('ttd')) {
                // Retrieve data from the form including the file name
                $dataakun = array(
                    'nama' => $this->input->post('nama'),
                    'NRP' => $this->input->post('NRP'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'idlevel' => $this->input->post('level_k'),
                    'iddepartemen' => $this->input->post('devisi'),
                    'ttd' => $this->upload->data('file_name'), // store the uploaded file name in the database
                    // Add more fields if needed
                );
        
                // Insert data into the 'akun' table using your model method
                $idakun = $this->M_akun->insert_akun($dataakun);
        
                // Redirect after adding the account
                if ($idakun) {
                    // If successful, redirect to a success page or back to the main page
                    redirect('akunms');
                } else {
                    // If not successful, handle the error accordingly
                    echo "Failed to add the account.";
                }
            } else {
                // If file upload fails, handle the error accordingly
                echo $this->upload->display_errors();
            }
        }
        
        
        public function edit($idakun) {
            $where = array('idakun' => $idakun);
            $data['akun'] = $this->M_akun->get_akun_by_id($where); 
            $this->load->view('Templates/header');
            $this->load->view('Templates/sidebarms');
            $this->load->view('editakunms', $data);
            //print_r($data['akun']);
        }
        

    public function proses_edit() {
        // Retrieve updated data from the form
        $idakun = $this->input->post('idakun');
        $dataakun = array(
                'idakun' => $this->input->post('idakun'),
                'nama' => $this->input->post('nama'),
                'idlevel' => $this->input->post('idlevel'),
                'iddepartemen' => $this->input->post('devisi'),
                'NRP' => $this->input->post('NRP'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                
        );
    
        // Update the 'akun' record based on 'idakun'
        $where = array('idakun' => $idakun);
        $result = $this->M_akun->update_akun($where, $dataakun);
    
        if ($result) {
            // If the update was successful, redirect to a success page or perform other actions
            echo "Data akun berhasil diperbarui.";
            // Redirect to a success page or appropriate location
            redirect('akunms');
        } else {
            // If the update failed, show an error message or perform other actions
            echo "Gagal memperbarui data akun.";
            // Redirect to an error page or appropriate location
            redirect('akunms/edit/' . $idakun); // Redirect back to edit page
        }
    }
    
    // -- method menghapus data produk -- //
    public function delete($idakun)
    {
        $this->M_akun->delete($idakun);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('delete', ' Data akun berhasil dihapus.');
            redirect('akunms');
        } else {
            redirect('akunms');
        }
    }
}