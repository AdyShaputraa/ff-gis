<?php defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('m_data');

        if (!empty($this->session->userdata('isLogin') == FALSE)) {
            $this->session->set_flashdata('failed', 'Sesi anda habis, silahkan sign in kembali.');
            redirect(base_url('Auth'));
        }
    }

    public function index() {
        $this->load->view('dashboard/index');
    }

    public function countingFlora() {
        try {
            $getData = $this->m_data->runQuery('SELECT * FROM flora_fauna_ledger_entries WHERE type = "Flora"')->num_rows();
            echo json_encode(array('code' => '200', 'total' => $getData));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function countingFauna() {
        try {
            $getData = $this->m_data->runQuery('SELECT * FROM flora_fauna_ledger_entries WHERE type = "Fauna"')->num_rows();
            echo json_encode(array('code' => '200', 'total' => $getData));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function mapping() {
		$data = $this->m_data->runQuery('SELECT * FROM flora_fauna_ledger_entries')->result();
		echo json_encode($data);	
	}
}