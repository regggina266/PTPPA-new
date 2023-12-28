<?php
defined('BASEPATH') or exit('No direct script access allowed');

//nama classnya
class Akun extends CI_Controller
{
    //pemanggilan construct 
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form', 'download');
        $this->load->model('Akun_m');
        $this->load->model('Departemen_m');
    }
    //function tampilan awal
    public function index()
    {
        $data['akun'] = $this->Akun_m->akun()->result_array();
        $data['level'] = $this->Akun_m->get_all_level();
        $data['departemen'] = $this->Departemen_m->get_all_departemen();
        $this->load->view('master/components/header');
        $this->load->view('master/components/navbar');
        $this->load->view('master/akun', $data); 
        $this->load->view('master/components/sidebar'); 

    }
    //tampilan pada button tambah pada Akun
    public function tambah()
    {

        $NRP = $_POST['NRP'];
		$query = $this->db->get_where('akun', ['NRP' => $NRP]);
        $jum = $query->num_rows();
        if ($query->num_rows() > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Username Sudah Ada! Silahkan Coba Username Lain!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                </div>');
            redirect('akun');
        }

		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('idlevel')) {

		$NRP = $this->input->post("NRP");
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$nama = $this->input->post("nama");
		$idlevel = $this->input->post("idlevel");
		$iddepartemen = $this->input->post("iddepartemen");

        
            $hasil = $this->Akun_m->insert_akun($id, $NRP, $password, $nama, $idlevel, $iddepartemen);

            if($hasil==false){
                $this->session->set_flashdata('eror','error');
                redirect('akun', $data);
			}else{
				$this->session->set_flashdata('input','input');
				redirect('akun', $data);
            }

     	}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Auth');
	
		}        
    }

        //proses penambahan data akun
        public function tambah_akun()
        {
            // Configuration for file upload
            $config['upload_path']   = './uploads/';  // Specify the upload directory
            $config['allowed_types'] = 'gif|jpg|png';  // Specify allowed file types
            $config['max_size']      = 2048;           // Specify max file size in KB
        
            $this->load->library('upload', $config);
        
            // Check if the file upload is successful
            if ($this->upload->do_upload('ttd')) {
                // Retrieve data from the form
                $dataakun = array(
                    'nama'          => $this->input->post('nama'),
                    'NRP'           => $this->input->post('NRP'),
                    'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'idlevel'       => $this->input->post('level_k'),
                    'iddepartemen'  => $this->input->post('divisi'),
                    'ttd'         => $this->upload->data('ttd'), // Save the uploaded file name in the database
                );
        
                // Insert data into the 'akun' table using your model method
                $idakun = $this->Akun_m->insert_akun($dataakun);
        
                // Redirect after adding the account
                if ($idakun) {
                    // If successful, redirect to a success page or back to the main page
                    redirect('master/akun');
                } else {
                    // If not successful, handle the error accordingly
                    echo "Failed to add the account.";
                }
            } else {
                // If file upload fails, handle the error
                echo $this->upload->display_errors();
            }
        }
        
        public function edit() {

            if ($this->session->userdata('logged_in') == true AND $this->session->userdata('idlevel')) {

                $NRP = $this->input->post("NRP");
                $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $nama = $this->input->post("nama");
                $idlevel = $this->input->post("idlevel");
                $iddepartemen = $this->input->post("iddepartemen");
                $id = $this->input->post("idakun");
        
                
                    $hasil = $this->Akun_m->update_akun($id, $NRP, $password, $nama, $idlevel, $iddepartemen);
                    echo $hasil;
                    if($hasil==false){
                        $this->session->set_flashdata('eror_edit','eror_edit');
                        redirect('akun', $data);
                    }else{
                        $this->session->set_flashdata('edit','edit');
                        redirect('akun', $data);
                    }
        
                 }else{
        
                    $this->session->set_flashdata('loggin_err','loggin_err');
                    redirect('Auth');
            
                }         
        }
        
    public function proses_edit() {
        // Retrieve updated data from the form
        $idakun = $this->input->post('idakun');
        $dataakun = array(
                'idakun' => $this->input->post('idakun'),
                'nama' => $this->input->post('nama'),
                'idlevel' => $this->input->post('idlevel'),
                'iddepartemen' => $this->input->post('divisi'),
                'NRP' => $this->input->post('NRP'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                
        );
    
        // Update the 'akun' record based on 'idakun'
        $where = array('idakun' => $idakun);
        $result = $this->Akun_m->update_akun($where, $dataakun);
    
        if ($result) {
            // If the update was successful, redirect to a success page or perform other actions
            echo "Data akun berhasil diperbarui.";
            // Redirect to a success page or appropriate location
            redirect('master/akun');
        } else {
            // If the update failed, show an error message or perform other actions
            echo "Gagal memperbarui data akun.";
            // Redirect to an error page or appropriate location
            redirect('master/akun'); // Redirect back to edit page
        }
    }
    
    // -- method menghapus data produk -- //
    public function delete()
    {

        if ($this->session->userdata('logged_in') == true AND $this->session->userdata('idlevel')) {
            $idakun = $this->input->post("idakun");
            
                $hasil = $this->Akun_m->delete_akun($idakun);
    
                if($hasil==false){
                    $this->session->set_flashdata('eror_hapus','eror_hapus');
                    redirect('akun', $data);
                }else{
                    $this->session->set_flashdata('hapus','hapus');
                    redirect('akun', $data);
                }
    
        }else{
    
            $this->session->set_flashdata('loggin_err','loggin_err');
            redirect('Auth');
    
        }       
    }

     // -- method mengedit password -- //
     public function edit_password()
     {
         $idakun = $this->input->post('idakun');
         $password = $this->input->post('password');
 
         $data = array(
             'idakun' => $idakun,
             'password' => password_hash($password),
         );
         $where = array(
             'idakun' => $idakun,
         );
         $this->Akun_m->update_password($where, $data);
 
         if ($this->db->affected_rows() > 0) {
             $this->session->set_flashdata('success', ' Password berhasil diedit.');
             redirect('akun', $data);
         } else {
             redirect('akun', $data);
         }
     }
}