<?php defined('BASEPATH') or exit('No direct script access allowed');
class Detail extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('m_data');
    }

    public function faunaGrafikData() {
        $coordinate_uuid = $this->input->post('coordinate_uuid'); $fauna_uuid = $this->input->post('fauna_uuid'); 
        $data = array(); $label = array(); $dataset = array();
        $getData = $this->m_data->runQuery('SELECT * FROM fauna_population
            WHERE fauna_uuid = "'.$fauna_uuid.'" AND coordinate_uuid = "'.$coordinate_uuid.'" ORDER BY year ASC')->result();
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

    public function fauna() {
        $uuid = $this->uri->segment(3);
        $fauna_uuid = '';
        $getCoordinate = $this->m_data->runQuery('SELECT * FROM coordinate WHERE uuid = "'.$uuid.'"')->result();
        foreach ($getCoordinate as $value) {
            $fauna_uuid = $value->flora_fauna_uuid;
        }
        if (!empty($uuid)) {
            $data = array(
                '_coordinate_uuid' => $uuid,
                'fauna' => $this->m_data->runQuery('SELECT fauna.uuid as uuid, fauna.name as name, fauna.name_local as name_local,
                    fauna.description as description, fauna.description_detail as description_detail, fauna_domain.name as domain_name,
                    fauna_kingdom.name as kingdom_name, fauna_phylum.name as phylum_name, fauna_class.name as class_name, fauna_ordo.name as ordo_name,
                    fauna_familia.name as familia_name, fauna_genus.name as genus_name, fauna_spesies.name as spesies_name,
                    fauna.status as status, fauna.status_perlindungan as status_perlindungan, image
                    FROM fauna
                    LEFT JOIN fauna_domain ON fauna_domain.uuid = fauna.domain
                    LEFT JOIN fauna_kingdom ON fauna_kingdom.uuid = fauna.kingdom
                    LEFT JOIN fauna_phylum ON fauna_phylum.uuid = fauna.phylum
                    LEFT JOIN fauna_class ON fauna_class.uuid = fauna.class
                    LEFT JOIN fauna_ordo ON fauna_ordo.uuid = fauna.ordo
                    LEFT JOIN fauna_familia ON fauna_familia.uuid = fauna.familia
                    LEFT JOIN fauna_genus ON fauna_genus.uuid = fauna.genus
                    LEFT JOIN fauna_spesies ON fauna_spesies.uuid = fauna.spesies
                    WHERE fauna.uuid = "'.$fauna_uuid.'"')->result(),
                'fauna_population_count' => $this->m_data->runQuery('SELECT SUM(population) as population FROM fauna_population
                    WHERE coordinate_uuid = "'.$uuid.'" AND fauna_uuid = "'.$fauna_uuid.'"')->result(),
                'fauna_coordinate' => $this->m_data->runQuery('SELECT coordinate.name as location_name,
                    coordinate.latitude, coordinate.longtitude, provinces.name as provinces_name
                    FROM coordinate
                    LEFT JOIN provinces ON provinces.uuid = coordinate.provinces_uuid
                    WHERE coordinate.uuid = "'.$uuid.'"')->result(),
            );
            $this->load->view('fauna/detail', $data);
        } else {
            redirect(base_url('GIS'));
        }
    }
    
    public function floraGrafikData() {
        $coordinate_uuid = $this->input->post('coordinate_uuid'); $flora_uuid = $this->input->post('flora_uuid'); 
        $data = array(); $label = array(); $dataset = array();
        $getData = $this->m_data->runQuery('SELECT * FROM flora_population
            WHERE flora_uuid = "'.$flora_uuid.'" AND coordinate_uuid = "'.$coordinate_uuid.'" ORDER BY year ASC')->result();
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

    public function flora() {
        $uuid = $this->uri->segment(3);
        $flora_uuid = '';
        $getCoordinate = $this->m_data->runQuery('SELECT * FROM coordinate WHERE uuid = "'.$uuid.'"')->result();
        foreach ($getCoordinate as $value) {
            $flora_uuid = $value->flora_fauna_uuid;
        }
        if (!empty($uuid)) {
            $data = array(
                '_coordinate_uuid' => $uuid,
                'flora' => $this->m_data->runQuery('SELECT flora.uuid as uuid, flora.name as name, flora.name_local as name_local,
                    flora.description as description, flora.description_detail as description_detail, flora_domain.name as domain_name,
                    flora_kingdom.name as kingdom_name, flora_division.name as division_name, flora_class.name as class_name, flora_ordo.name as ordo_name,
                    flora_familia.name as familia_name, flora_genus.name as genus_name, flora_spesies.name as spesies_name,
                    flora.status as status, flora.status_perlindungan as status_perlindungan, image
                    FROM flora
                    LEFT JOIN flora_domain ON flora_domain.uuid = flora.domain
                    LEFT JOIN flora_kingdom ON flora_kingdom.uuid = flora.kingdom
                    LEFT JOIN flora_division ON flora_division.uuid = flora.division
                    LEFT JOIN flora_class ON flora_class.uuid = flora.class
                    LEFT JOIN flora_ordo ON flora_ordo.uuid = flora.ordo
                    LEFT JOIN flora_familia ON flora_familia.uuid = flora.familia
                    LEFT JOIN flora_genus ON flora_genus.uuid = flora.genus
                    LEFT JOIN flora_spesies ON flora_spesies.uuid = flora.spesies
                    WHERE flora.uuid = "'.$flora_uuid.'"')->result(),
                'flora_population_count' => $this->m_data->runQuery('SELECT SUM(population) as population FROM flora_population
                    WHERE coordinate_uuid = "'.$uuid.'" AND flora_uuid = "'.$flora_uuid.'"')->result(),
                'flora_coordinate' => $this->m_data->runQuery('SELECT coordinate.name as location_name,
                    coordinate.latitude, coordinate.longtitude, provinces.name as provinces_name
                    FROM coordinate
                    LEFT JOIN provinces ON provinces.uuid = coordinate.provinces_uuid
                    WHERE coordinate.uuid = "'.$uuid.'"')->result(),
            );
            $this->load->view('flora/detail', $data);
        } else {
            redirect(base_url('GIS'));
        }
    }
    
    public function getMaps() {
        $uuid = $this->input->post('uuid'); 
        
        $data = array();
        $coordinate = $this->m_data->runQuery('SELECT coordinate.uuid as uuid, provinces.uuid as provinces_uuid, provinces.name as provinces_name,
            flora_fauna_uuid, coordinate.type, coordinate.name, coordinate.latitude, coordinate.longtitude
            FROM coordinate
            LEFT JOIN provinces ON provinces.uuid = coordinate.provinces_uuid
            WHERE coordinate.uuid = "'.$uuid.'"')->result();

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
}