<?php defined('BASEPATH') or exit('No direct script access allowed');
class Detail extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('m_data');
    }

    public function faunaGrafikData() {
        $uuid = $this->input->post('uuid'); $data = array(); $label = array(); $dataset = array();
        $getData = $this->m_data->runQuery('SELECT * FROM fauna_population WHERE fauna_uuid = "'.$uuid.'" ORDER BY year ASC')->result();
        $populasi = 0;
        foreach ($getData as $value) {
            $label[] = $value->year;
            $populasi += $value->population;
            $dataset[] = $populasi;
        }
        array_push($data, array(
            'label' => $label,
            'dataset' => $dataset
        ));
        echo json_encode($data);
    }

    public function mappingFauna() {
        $uuid = $this->input->post('uuid'); 
		$data = $this->m_data->runQuery('SELECT * FROM fauna WHERE uuid = "'.$uuid.'"')->result();
		echo json_encode($data);	
	}

    public function fauna() {
        $uuid = $this->uri->segment(3);
        if (!empty($uuid)) {
            $data = array(
                'fauna' => $this->m_data->runQuery('SELECT * FROM fauna WHERE uuid = "'.$uuid.'"')->result(),
                'fauna_population_count' => $this->m_data->runQuery('SELECT SUM(population) as population FROM fauna_population WHERE fauna_uuid = "'.$uuid.'"')->result(),
            );
            $this->load->view('fauna/detail', $data);
        } else {
            redirect(base_url('GIS'));
        }
    }
    
    public function floraGrafikData() {
        $uuid = $this->input->post('uuid'); $data = array(); $label = array(); $dataset = array();
        $getData = $this->m_data->runQuery('SELECT * FROM flora_population WHERE flora_uuid = "'.$uuid.'" ORDER BY year ASC')->result();
        $populasi = 0;
        foreach ($getData as $value) {
            $label[] = $value->year;
            $populasi += $value->population;
            $dataset[] = $populasi;
        }
        array_push($data, array(
            'label' => $label,
            'dataset' => $dataset
        ));
        echo json_encode($data);
    }

    public function mappingFlora() {
        $uuid = $this->input->post('uuid'); 
		$data = $this->m_data->runQuery('SELECT * FROM flora WHERE uuid = "'.$uuid.'"')->result();
		echo json_encode($data);	
	}

    public function flora() {
        $uuid = $this->uri->segment(3);
        if (!empty($uuid)) {
            $data = array(
                'flora' => $this->m_data->runQuery('SELECT * FROM flora WHERE uuid = "'.$uuid.'"')->result(),
                'flora_population_count' => $this->m_data->runQuery('SELECT SUM(population) as population FROM flora_population WHERE flora_uuid = "'.$uuid.'"')->result(),
            );
            $this->load->view('flora/detail', $data);
        } else {
            redirect(base_url('GIS'));
        }
    }
}