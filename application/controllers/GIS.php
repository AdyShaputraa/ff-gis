<?php defined('BASEPATH') or exit('No direct script access allowed');
class GIS extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('m_data');
    }

    public function index() {
        $data = array(
            'provinces' => $this->m_data->runQuery('SELECT * FROM provinces')->result()
        );
        $this->load->view('gis/index', $data);
    }
    
    public function filterGrafik() {
        $provinces = $this->input->post('provinces'); $iucn_status = $this->input->post('iucn_status');
        $status = $this->input->post('status'); $year = $this->input->post('year');
        $faunaPopulation = 0; $floraPopulation = 0;
        
        $data = array(
            array(
                'label' => 'Fauna',
            ),
            array(
                'label' => 'Flora',
            )
        );
		$coordinate = $this->m_data->runQuery('SELECT coordinate.uuid as uuid, provinces.uuid as provinces_uuid, flora_fauna_uuid, coordinate.type
            FROM coordinate
            LEFT JOIN provinces ON provinces.uuid = coordinate.provinces_uuid')->result();
        if ($provinces != '' || $provinces != null) {
            $coordinate = $this->m_data->runQuery('SELECT coordinate.uuid as uuid, provinces.uuid as provinces_uuid, flora_fauna_uuid, coordinate.type
            FROM coordinate
            LEFT JOIN provinces ON provinces.uuid = coordinate.provinces_uuid
            WHERE provinces.uuid = "'.$provinces.'"')->result();
        }
        foreach ($coordinate as $value) {
            if ($value->type == 'Fauna') {
                $getDataFauna = $this->m_data->runQuery('SELECT * FROM fauna WHERE uuid = "'.$value->flora_fauna_uuid.'"')->result();
                if (($iucn_status != '' || $iucn_status != null) && ($status != '' || $status != null)) {
                    $getDataFauna = $this->m_data->runQuery('SELECT * FROM fauna WHERE uuid = "'.$value->flora_fauna_uuid.'" AND status = "'.$iucn_status.'" AND status_perlindungan = "'.$status.'"')->result();
                } else if (($iucn_status != '' || $iucn_status != null) && ($status == '' || $status == null)) {
                    $getDataFauna = $this->m_data->runQuery('SELECT * FROM fauna WHERE uuid = "'.$value->flora_fauna_uuid.'" AND status = "'.$iucn_status.'"')->result();
                } else if (($iucn_status != '' || $iucn_status != null) && ($status == '' || $status == null)) {
                    $getDataFauna = $this->m_data->runQuery('SELECT * FROM fauna WHERE uuid = "'.$value->flora_fauna_uuid.'" AND status_perlindungan = "'.$status.'"')->result();
                }

                foreach ($getDataFauna as $val) {
                    $getDataPopulation = $this->m_data->runQuery('SELECT * FROM fauna_population
                        WHERE fauna_uuid = "'.$value->flora_fauna_uuid.'" AND coordinate_uuid = "'.$value->uuid.'"')->result();
                    if ($year != '' || $year != null) {
                        $getDataPopulation = $this->m_data->runQuery('SELECT * FROM fauna_population
                            WHERE fauna_uuid = "'.$value->flora_fauna_uuid.'" AND coordinate_uuid = "'.$value->uuid.'" AND year = "'.$year.'"')->result();
                    }
                    foreach ($getDataPopulation as $populationVal) {
                        $faunaPopulation += $populationVal->population;
                    }
                }
            } else if ($value->type == 'Flora') {
                $getDataFlora = $this->m_data->runQuery('SELECT * FROM flora WHERE uuid = "'.$value->flora_fauna_uuid.'"')->result();
                if (($iucn_status != '' || $iucn_status != null) && ($status != '' || $status != null)) {
                    $getDataFlora = $this->m_data->runQuery('SELECT * FROM flora WHERE uuid = "'.$value->flora_fauna_uuid.'" AND status = "'.$iucn_status.'" AND status_perlindungan = "'.$status.'"')->result();
                } else if (($iucn_status != '' || $iucn_status != null) && ($status == '' || $status == null)) {
                    $getDataFlora = $this->m_data->runQuery('SELECT * FROM flora WHERE uuid = "'.$value->flora_fauna_uuid.'" AND status = "'.$iucn_status.'"')->result();
                } else if (($iucn_status != '' || $iucn_status != null) && ($status == '' || $status == null)) {
                    $getDataFlora = $this->m_data->runQuery('SELECT * FROM flora WHERE uuid = "'.$value->flora_fauna_uuid.'" AND status_perlindungan = "'.$status.'"')->result();
                }

                foreach ($getDataFlora as $val) {
                    $getDataPopulation = $this->m_data->runQuery('SELECT * FROM flora_population
                        WHERE flora_uuid = "'.$value->flora_fauna_uuid.'" AND coordinate_uuid = "'.$value->uuid.'"')->result();
                    if ($year != '' || $year != null) {
                        $getDataPopulation = $this->m_data->runQuery('SELECT * FROM flora_population
                            WHERE flora_uuid = "'.$value->flora_fauna_uuid.'" AND coordinate_uuid = "'.$value->uuid.'" AND year = "'.$year.'"')->result();
                    }
                    foreach ($getDataPopulation as $populationVal) {
                        $floraPopulation += $populationVal->population;
                    }
                }
            }
        }
        $data[0]['population'] = $faunaPopulation;
        $data[1]['population'] = $floraPopulation;
		echo json_encode($data);	
    }

    public function countingCoordinate() {
        try {
            $total = 0;
            $getDataCoordinate = $this->m_data->runQuery('SELECT COUNT(*) as total FROM coordinate')->result();
            foreach($getDataCoordinate as $value) { $total += $value->total; }

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
        $provinces = $this->input->post('provinces'); $iucn_status = $this->input->post('iucn_status'); $status = $this->input->post('status');
        
        $data = array();
		$coordinate = $this->m_data->runQuery('SELECT coordinate.uuid as uuid, provinces.uuid as provinces_uuid, provinces.name as provinces_name,
            flora_fauna_uuid, coordinate.type, coordinate.name, coordinate.latitude, coordinate.longtitude
            FROM coordinate
            LEFT JOIN provinces ON provinces.uuid = coordinate.provinces_uuid')->result();
        if ($provinces != '' || $provinces != null) {
            $coordinate = $this->m_data->runQuery('SELECT coordinate.uuid as uuid, provinces.uuid as provinces_uuid, provinces.name as provinces_name,
            flora_fauna_uuid, coordinate.type, coordinate.name, coordinate.latitude, coordinate.longtitude
            FROM coordinate
            LEFT JOIN provinces ON provinces.uuid = coordinate.provinces_uuid
            WHERE provinces.uuid = "'.$provinces.'"')->result();
        }
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

        $filteredData = array_filter($data, function($obj) use ($iucn_status, $status) {
            if (isset($obj)) {
                if (($iucn_status != '' || $iucn_status != null) && ($status != '' || $status != null)) {
                    if ($obj['iucn_status'] == $iucn_status && $obj['status'] == $status) return true;
                } else if (($iucn_status == '' || $iucn_status == null) && ($status != '' || $status != null)) {
                    if (($obj['status'] == $status)) return true;
                } else if (($iucn_status != '' || $iucn_status != null) && ($status == '' || $status == null)) {
                    if (($obj['iucn_status'] == $iucn_status)) return true;
                } else {
                    return true;
                }
            }
            return false;
        });
		echo json_encode($filteredData);	
    }
}