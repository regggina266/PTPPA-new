<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settingadm extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Login');
	}
	//tampilan pada Setting
		
	  public function index()
    {
       //memanggil data
        $data['akun'] = $this->M_ppa->get_data('akun')->result();
		//memanggil view
        $this->load->view('settingadm', $data);
		$this->load->view('Templates/navbar');
      
    }
	//function yang dipanggil dan memeroses data
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
                redirect('Settingadm');
			}else{
				$this->session->set_flashdata('edit','edit');
				redirect('Settingadm');
			}
			
        }else{
            $this->session->set_flashdata('password_err','password_err');
			redirect('Settingadm');
        }
	}
    
}