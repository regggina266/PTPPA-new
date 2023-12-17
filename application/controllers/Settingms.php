<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settingms extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Login');
    }
        
      public function index()
    {
       
        $data['akun'] = $this->M_ppa->get_data('akun')->result();

        $this->load->view('settingms', $data);
        $this->load->view('Templates/footer');
    }
    public function setting_akun()
    {
        $id = $this->session->userdata('idakun');
        $NRP = $this->input->post('NRP');
        $password = $this->input->post("password");
        $re_password = $this->input->post("re_password");

        // echo var_dump($id);
        // echo var_dump($username);
        // echo var_dump($password);
         //echo var_dump($re_password);
        // die();

        if($password == $re_password)
        {
            $hasil = $this->M_login->update_user($id, $NRP, $password);

            if($hasil==false){
                $this->session->set_flashdata('eror_edit','eror_edit');
                redirect('Settingms');
            }else{
                $this->session->set_flashdata('edit','edit');
                redirect('Settingm');
            }
            
        }else{
            $this->session->set_flashdata('password_err','password_err');
            redirect('Settingms');
        }
    }
    
}