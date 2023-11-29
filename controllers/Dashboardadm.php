<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboardadm extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();

        
        $this->load->model('m_login');
        
    }


    public function index()
    {
        $this->load->view('Templates/header');
        $this->load->view('Templates/navbar');
        $this->load->view('Templates/sidebaradm');
        $this->load->view('dashboardadm');
        $this->load->view('Templates/footer');
    }
    
}
