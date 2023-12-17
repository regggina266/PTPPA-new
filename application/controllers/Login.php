<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->model('M_akun');
        $this->load->model('M_login');
    }

    // Fungsi yang digunakan untuk memanggil views untuk login
    public function index()
    {
        $this->form_validation->set_rules('NRP', 'NRP', 'required|trim', [
            'required' => 'NRP tidak boleh kosong',
            'trim' => 'NRP tanpa spasi'
        ]);
        $this->form_validation->set_rules('password', 'Kata password', 'required|trim', [
            'required' => 'Kata Sandi tidak boleh kosong',
            'trim' => 'Kata Sandi tanpa spasi'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Sign In';

            $this->load->view('login', $data);
        } else {
            $this->login_processed();
        }
    }

    // Fungsi yang digunakan untuk proses masuk sesi (login)
    public function login_processed()
    {
        // fungsi ini bersifat privasi, agar tidak bisa di akses di url, hanya di fungsi yang memanggil saja
        $NRP = $this->input->post('NRP');
        $password = $this->input->post('password');
        //Mencari di databse
        //fungsi row_array agar tidak semua record terpanggil, hanya record yang di tentukan saja
        $pengguna = $this->db->get_where('akun', ['NRP' => $NRP])->row_array();
        // var_dump($pengguna);
        // die;
        // Cek kata password
        if ($pengguna) {
            if (password_verify($password, $pengguna['password'])) {
                //jika surel benar dan dan password benar
                $data = [
                    'NRP' => $pengguna['NRP'],
                    'idlevel' => $pengguna['idlevel'],
                    //'nama' => $pengguna['nama'],
                ];
                $this->session->set_userdata($data);
                if ($pengguna) {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Berhasil Login</div>');
                    if ($pengguna['idlevel'] === '1') {
                        redirect('Dashboardadm/index');
                    } elseif ($pengguna['idlevel'] === '2') {
                        redirect('Dashboardsh/index');
                    } elseif ($pengguna['idlevel'] === '9') {
                        redirect('Dashboardgl/index');
                    } elseif ($pengguna['idlevel'] === '10') {
                        redirect('Dashboardms/index');
                    } else {
                        redirect('login');
                    }
                } else {
                    $this->session->unset_userdata('NRP');
                    $this->session->unset_userdata('idlevel');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun kamu belum aktif, tunggu admin mengaktifkan</div>');
                    redirect('login');
                }
            } else {
                //jika password salah, tapi alamat surel ditemukan
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf, password yang kamu masukkan salah</div>');
                redirect('login');
            }
        } else { //jika penguna tidak di temukan
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">pengguna tidak di temukan...</div>');
            redirect('login');
        }
    }
    // untuk menjelankan fungsi logout
        public function logout()
        {
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('idlevel');
            $this->session->set_flashdata('success_logout','success_logout');
            redirect('Login');
        }
}