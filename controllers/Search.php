<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller
{
	public function index()
	{
		$data['keyword'] = $this->input->get('keyword');
		$this->load->model('m_search');

		$data['search_result'] = $this->article_model->search($data['keyword']);
		
		$this->load->view('akun.php', $data);
	}
}