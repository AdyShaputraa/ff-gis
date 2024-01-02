<?php defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('m_data');

        if (!empty($this->session->userdata('isLogin') == FALSE)) {
            $this->session->set_flashdata('failed', 'Your session has expired, please sign in again.');
            redirect(base_url('Auth'));
        }
    }

    public function index() {
        $totalFaunaDilindungi = 0; $totalFaunaTidakDilindungi = 0; $totalFaunaLeastConcern = 0; $totalFaunaNearThreatned = 0; $totalFaunaVulnerable = 0;
        // $getDataFauna = $this->m_data->runQuery('SELECT * FROM fauna')->result();
        // foreach ($getDataFauna as $value) {
        //     if ($value->status_iucn == 'Dilindungi') {
        //         $getDataPopulation = $this->m_data->runQuery('SELECT SUM(population) as population FROM fauna_population WHERE fauna_uuid = "'.$value->uuid.'"')->result();
        //         foreach($getDataPopulation as $value) { $totalFaunaDilindungi += $value->population; }
        //     } else if ($value->status_iucn == 'Tidak Dilindungi') {
        //         $getDataPopulation = $this->m_data->runQuery('SELECT SUM(population) as population FROM fauna_population WHERE fauna_uuid = "'.$value->uuid.'"')->result();
        //         foreach($getDataPopulation as $value) { $totalFaunaTidakDilindungi += $value->population; }
        //     } else if ($value->status_iucn == 'Least Concern') {
        //         $getDataPopulation = $this->m_data->runQuery('SELECT SUM(population) as population FROM fauna_population WHERE fauna_uuid = "'.$value->uuid.'"')->result();
        //         foreach($getDataPopulation as $value) { $totalFaunaLeastConcern += $value->population; }
        //     } else if ($value->status_iucn == 'Near Threatned') {
        //         $getDataPopulation = $this->m_data->runQuery('SELECT SUM(population) as population FROM fauna_population WHERE fauna_uuid = "'.$value->uuid.'"')->result();
        //         foreach($getDataPopulation as $value) { $totalFaunaNearThreatned += $value->population; }
        //     } else if ($value->status_iucn == 'Vulnerable') {
        //         $getDataPopulation = $this->m_data->runQuery('SELECT SUM(population) as population FROM fauna_population WHERE fauna_uuid = "'.$value->uuid.'"')->result();
        //         foreach($getDataPopulation as $value) { $totalFaunaVulnerable += $value->population; }
        //     }
        // }
        $totalFloraDilindungi = 0; $totalFloraTidakDilindungi = 0; $totalFloraLeastConcern = 0; $totalFloraNearThreatned = 0; $totalFloraVulnerable = 0;
        // $getDataFlora = $this->m_data->runQuery('SELECT * FROM flora')->result();
        // foreach ($getDataFlora as $value) {
        //     if ($value->status_iucn == 'Dilindungi') {
        //         $getDataPopulation = $this->m_data->runQuery('SELECT SUM(population) as population FROM flora_population WHERE flora_uuid = "'.$value->uuid.'"')->result();
        //         foreach($getDataPopulation as $value) { $totalFloraDilindungi += $value->population; }
        //     } else if ($value->status_iucn == 'Tidak Dilindungi') {
        //         $getDataPopulation = $this->m_data->runQuery('SELECT SUM(population) as population FROM flora_population WHERE flora_uuid = "'.$value->uuid.'"')->result();
        //         foreach($getDataPopulation as $value) { $totalFloraTidakDilindungi += $value->population; }
        //     } else if ($value->status_iucn == 'Least Concern') {
        //         $getDataPopulation = $this->m_data->runQuery('SELECT SUM(population) as population FROM flora_population WHERE flora_uuid = "'.$value->uuid.'"')->result();
        //         foreach($getDataPopulation as $value) { $totalFloraLeastConcern += $value->population; }
        //     } else if ($value->status_iucn == 'Near Threatned') {
        //         $getDataPopulation = $this->m_data->runQuery('SELECT SUM(population) as population FROM flora_population WHERE flora_uuid = "'.$value->uuid.'"')->result();
        //         foreach($getDataPopulation as $value) { $totalFloraNearThreatned += $value->population; }
        //     } else if ($value->status_iucn == 'Vulnerable') {
        //         $getDataPopulation = $this->m_data->runQuery('SELECT SUM(population) as population FROM flora_population WHERE flora_uuid = "'.$value->uuid.'"')->result();
        //         foreach($getDataPopulation as $value) { $totalFloraVulnerable += $value->population; }
        //     }
        // }
        $data = array(
            'provinces' => $this->m_data->runQuery('SELECT * FROM provinces')->result(),
            'totalFaunaDilindungi' => $totalFaunaDilindungi, 'totalFaunaTidakDilindungi' => $totalFaunaTidakDilindungi,
            'totalFaunaLeastConcern' => $totalFaunaLeastConcern, 'totalFaunaNearThreatned' => $totalFaunaNearThreatned,
            'totalFaunaVulnerable' => $totalFaunaVulnerable,
            'totalFloraDilindungi' => $totalFloraDilindungi, 'totalFloraTidakDilindungi' => $totalFloraTidakDilindungi,
            'totalFloraLeastConcern' => $totalFloraLeastConcern, 'totalFloraNearThreatned' => $totalFloraNearThreatned,
            'totalFloraVulnerable' => $totalFloraVulnerable,
        );
        $this->load->view('dashboard/index', $data);
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

    public function getMaps() {
        $data = array();
		$coordinate = $this->m_data->runQuery('SELECT coordinate.uuid as uuid, provinces.uuid as provinces_uuid, provinces.name as provinces_name,
            flora_fauna_uuid, coordinate.type, coordinate.name, coordinate.latitude, coordinate.longtitude
            FROM coordinate
            LEFT JOIN provinces ON provinces.uuid = coordinate.provinces_uuid')->result();
        foreach ($coordinate as $value) {
            $temp = array(
                'uuid' => $value->flora_fauna_uuid,
                'coordinate_uuid' => $value->uuid,
                'provinces_uuid' => $value->provinces_uuid,
                'provinces_name' => $value->provinces_name,
                'location_name' => $value->name,
                'latitude' => $value->latitude,
                'longtitude' => $value->longtitude,
                'type' => $value->type,
            );
            if ($value->type == 'Fauna') {
                $getDataFauna = $this->m_data->runQuery('SELECT * FROM fauna WHERE uuid = "'.$value->flora_fauna_uuid.'"')->result();
                foreach ($getDataFauna as $val) {
                    $temp['name'] = $val->name;
                    $temp['local_name'] = $val->name_local;
                    $temp['description'] = $val->description;
                    $temp['iucn_status'] = $val->status;
                    $temp['status'] = $val->status_perlindungan;
                    $temp['image'] = $val->image;
                    $temp['icon'] = $val->icon;
                    
                    $population = 0;
                    $getDataPopulation = $this->m_data->runQuery('SELECT * FROM fauna_population WHERE fauna_uuid = "'.$value->flora_fauna_uuid.'" and coordinate_uuid = "'.$value->uuid.'"')->result();
                    foreach ($getDataPopulation as $populationVal) {
                        $population += $populationVal->population;
                    }
                    $temp['population'] = $population;
                }
            } else if ($value->type == 'Flora') {
                $getDataFlora = $this->m_data->runQuery('SELECT * FROM flora WHERE uuid = "'.$value->flora_fauna_uuid.'"')->result();
                foreach ($getDataFlora as $val) {
                    $temp['name'] = $val->name;
                    $temp['local_name'] = $val->name_local;
                    $temp['description'] = $val->description;
                    $temp['iucn_status'] = $val->status;
                    $temp['status'] = $val->status_perlindungan;
                    $temp['image'] = $val->image;
                    $temp['icon'] = $val->icon;
                    
                    $population = 0;
                    $getDataPopulation = $this->m_data->runQuery('SELECT * FROM flora_population WHERE flora_uuid = "'.$value->flora_fauna_uuid.'" and coordinate_uuid = "'.$value->uuid.'"')->result();
                    foreach ($getDataPopulation as $populationVal) {
                        $population += $populationVal->population;
                    }
                    $temp['population'] = $population;
                }
            }
            array_push($data, $temp);
        }
		echo json_encode($data);	
	}

    public function filterMaps() {
        $provinces = $this->input->post('provinces'); $status = $this->input->post('status');
    }
}