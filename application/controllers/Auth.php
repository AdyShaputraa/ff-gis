<?php defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('m_data');
    }

    public function index() {
        $this->load->view('auth/index');
    }

    public function signIn() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $getData = $this->m_data->runQuery('SELECT uuid, name, username, password, isAdmin FROM user WHERE username = "'.$username.'" LIMIT 1')->result();
        if (!empty($getData)) {
            foreach ($getData as $value) {
                if (password_verify($password, $value->password)) {
                    $this->session->set_userdata('uuid', $value->uuid);
                    $this->session->set_userdata('name', $value->name);
                    $this->session->set_userdata('username', $value->username);
                    $this->session->set_userdata('isAdmin', $value->isAdmin);
                    $this->session->set_userdata('isLogin', TRUE);
                    $this->session->set_flashdata('success', 'Salamat datang.');
                    redirect(base_url('Dashboard'));
                } else {
                    $this->session->set_flashdata('failed', 'Password salah.');
                    redirect(base_url('Auth'));
                }
            }
        } else {
            $this->session->set_flashdata('failed', 'Akun tidak ditemukan.');
            redirect(base_url('Auth'));
        }
    }

    public function signOut() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('success', 'Berhasil keluar.');
        redirect(base_url('Auth'));
    }
}