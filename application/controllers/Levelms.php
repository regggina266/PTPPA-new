<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Levelms extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();

        $this->load->helper('url', 'form', 'download');
        $this->load->model('M_ppa');
        $this->load->model('m_level');
       
    }
    public function index()
    {
       
        $data['level'] = $this->M_ppa->get_data('level')->result();
        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/navbar');
        $this->load->view('Templates/sidebarms');
        $this->load->view('levelms', $data);
        $this->load->view('Templates/footer');
    }
}