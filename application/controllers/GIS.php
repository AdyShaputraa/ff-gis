<?php defined('BASEPATH') or exit('No direct script access allowed');
class GIS extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('m_data');
    }

    public function index() {
        $totalFaunaDilindungi = 0; $totalFaunaTidakDilindungi = 0; $totalFaunaLeastConcern = 0; $totalFaunaNearThreatned = 0; $totalFaunaVulnerable = 0;
        $getDataFauna = $this->m_data->runQuery('SELECT * FROM fauna')->result();
        foreach ($getDataFauna as $value) {
            if ($value->status_iucn == 'Dilindungi') {
                $getDataPopulation = $this->m_data->runQuery('SELECT SUM(population) as population FROM fauna_population WHERE fauna_uuid = "'.$value->uuid.'"')->result();
                foreach($getDataPopulation as $value) { $totalFaunaDilindungi += $value->population; }
            } else if ($value->status_iucn == 'Tidak Dilindungi') {
                $getDataPopulation = $this->m_data->runQuery('SELECT SUM(population) as population FROM fauna_population WHERE fauna_uuid = "'.$value->uuid.'"')->result();
                foreach($getDataPopulation as $value) { $totalFaunaTidakDilindungi += $value->population; }
            } else if ($value->status_iucn == 'Least Concern') {
                $getDataPopulation = $this->m_data->runQuery('SELECT SUM(population) as population FROM fauna_population WHERE fauna_uuid = "'.$value->uuid.'"')->result();
                foreach($getDataPopulation as $value) { $totalFaunaLeastConcern += $value->population; }
            } else if ($value->status_iucn == 'Near Threatned') {
                $getDataPopulation = $this->m_data->runQuery('SELECT SUM(population) as population FROM fauna_population WHERE fauna_uuid = "'.$value->uuid.'"')->result();
                foreach($getDataPopulation as $value) { $totalFaunaNearThreatned += $value->population; }
            } else if ($value->status_iucn == 'Vulnerable') {
                $getDataPopulation = $this->m_data->runQuery('SELECT SUM(population) as population FROM fauna_population WHERE fauna_uuid = "'.$value->uuid.'"')->result();
                foreach($getDataPopulation as $value) { $totalFaunaVulnerable += $value->population; }
            }
        }
        $totalFloraDilindungi = 0; $totalFloraTidakDilindungi = 0; $totalFloraLeastConcern = 0; $totalFloraNearThreatned = 0; $totalFloraVulnerable = 0;
        $getDataFlora = $this->m_data->runQuery('SELECT * FROM flora')->result();
        foreach ($getDataFlora as $value) {
            if ($value->status_iucn == 'Dilindungi') {
                $getDataPopulation = $this->m_data->runQuery('SELECT SUM(population) as population FROM flora_population WHERE flora_uuid = "'.$value->uuid.'"')->result();
                foreach($getDataPopulation as $value) { $totalFloraDilindungi += $value->population; }
            } else if ($value->status_iucn == 'Tidak Dilindungi') {
                $getDataPopulation = $this->m_data->runQuery('SELECT SUM(population) as population FROM flora_population WHERE flora_uuid = "'.$value->uuid.'"')->result();
                foreach($getDataPopulation as $value) { $totalFloraTidakDilindungi += $value->population; }
            } else if ($value->status_iucn == 'Least Concern') {
                $getDataPopulation = $this->m_data->runQuery('SELECT SUM(population) as population FROM flora_population WHERE flora_uuid = "'.$value->uuid.'"')->result();
                foreach($getDataPopulation as $value) { $totalFloraLeastConcern += $value->population; }
            } else if ($value->status_iucn == 'Near Threatned') {
                $getDataPopulation = $this->m_data->runQuery('SELECT SUM(population) as population FROM flora_population WHERE flora_uuid = "'.$value->uuid.'"')->result();
                foreach($getDataPopulation as $value) { $totalFloraNearThreatned += $value->population; }
            } else if ($value->status_iucn == 'Vulnerable') {
                $getDataPopulation = $this->m_data->runQuery('SELECT SUM(population) as population FROM flora_population WHERE flora_uuid = "'.$value->uuid.'"')->result();
                foreach($getDataPopulation as $value) { $totalFloraVulnerable += $value->population; }
            }
        }
        $data = array(
            'totalFaunaDilindungi' => $totalFaunaDilindungi, 'totalFaunaTidakDilindungi' => $totalFaunaTidakDilindungi,
            'totalFaunaLeastConcern' => $totalFaunaLeastConcern, 'totalFaunaNearThreatned' => $totalFaunaNearThreatned,
            'totalFaunaVulnerable' => $totalFaunaVulnerable,
            'totalFloraDilindungi' => $totalFloraDilindungi, 'totalFloraTidakDilindungi' => $totalFloraTidakDilindungi,
            'totalFloraLeastConcern' => $totalFloraLeastConcern, 'totalFloraNearThreatned' => $totalFloraNearThreatned,
            'totalFloraVulnerable' => $totalFloraVulnerable,
        );
        $this->load->view('gis/index', $data);
    }

    public function countingCagarAlam() {
        try {
            $total = 0;
            $getDataFlora = $this->m_data->runQuery('SELECT COUNT(*) as total FROM flora')->result();
            foreach($getDataFlora as $value) { $total += $value->total; }
            
            $getDataFauna = $this->m_data->runQuery('SELECT COUNT(*) as total FROM fauna')->result();
            foreach($getDataFauna as $value) { $total += $value->total; }
            echo json_encode(array('code' => '200', 'total' => $total));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function countingFlora() {
        try {
            $total = 0;
            $getData = $this->m_data->runQuery('SELECT SUM(population) as population FROM flora_population')->result();
            foreach($getData as $value) { $total += $value->population; }
            echo json_encode(array('code' => '200', 'total' => $total));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function countingFauna() {
        try {
            $total = 0;
            $getData = $this->m_data->runQuery('SELECT SUM(population) as population FROM fauna_population')->result();
            foreach($getData as $value) { $total += $value->population; }
            echo json_encode(array('code' => '200', 'total' => $total));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function mappingFlora() {
		$data = $this->m_data->runQuery('SELECT * FROM flora')->result();
		echo json_encode($data);	
	}

    public function mappingFauna() {
		$data = $this->m_data->runQuery('SELECT * FROM fauna')->result();
		echo json_encode($data);	
	}
}