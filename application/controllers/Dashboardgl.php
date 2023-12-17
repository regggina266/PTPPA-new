<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboardgl extends CI_Controller
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
       
        $this->load->view('Templates/sidebargl');
    
        $this->load->view('dashboardgl');

        $this->load->view('Templates/footer');
    }
    
}
