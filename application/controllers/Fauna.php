<?php defined('BASEPATH') or exit('No direct script access allowed');
use Ramsey\Uuid\Uuid;
class Fauna extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('m_data');

        if (!empty($this->session->userdata('isLogin') == FALSE)) {
            $this->session->set_flashdata('failed', 'Your session has expired, please sign in again.');
            redirect(base_url('Auth'));
        }
    }

    public function index() {
        $data = array(
            'fauna_domain' => $this->m_data->runQuery('SELECT * FROM fauna_domain ORDER BY createdAt ASC')->result(),
            'fauna_kingdom' => $this->m_data->runQuery('SELECT * FROM fauna_kingdom ORDER BY createdAt ASC')->result(),
            'fauna_phylum' => $this->m_data->runQuery('SELECT * FROM fauna_phylum ORDER BY createdAt ASC')->result(),
            'fauna_class' => $this->m_data->runQuery('SELECT * FROM fauna_class ORDER BY createdAt ASC')->result(),
            'fauna_ordo' => $this->m_data->runQuery('SELECT * FROM fauna_ordo ORDER BY createdAt ASC')->result(),
            'fauna_familia' => $this->m_data->runQuery('SELECT * FROM fauna_familia ORDER BY createdAt ASC')->result(),
            'fauna_genus' => $this->m_data->runQuery('SELECT * FROM fauna_genus ORDER BY createdAt ASC')->result(),
            'fauna_spesies' => $this->m_data->runQuery('SELECT * FROM fauna_spesies ORDER BY createdAt ASC')->result(),
            'provinces' => $this->m_data->runQuery('SELECT * FROM provinces ORDER BY createdAt ASC')->result()
        );
        $this->load->view('fauna/index', $data);
    }

    public function create() {
        try {
            $icon = NULL;
            $config['file_name'] = $this->input->post('icon');
            $config['upload_path']   = './assets/upload/icon/'; 
            $config['allowed_types'] = '*';
            $config['max_size'] = '2048';
            $this->upload->initialize($config);

            if ($_FILES['icon']['error'] != UPLOAD_ERR_NO_FILE) {
                if (!$this->upload->do_upload('icon')) {
                    if ($_FILES['icon']['error'] == UPLOAD_ERR_INI_SIZE || $_FILES['icon']['error'] == UPLOAD_ERR_FORM_SIZE) {
                        echo json_encode(array('code' => '400', 'message' => 'File size should not exceed 2MB.'));
                        die();
                    } else {
                        echo json_encode(array('code' => '400', 'message' => 'Icon failed to upload.', 'error' => $this->upload->display_errors()));
                        die();
                    }
                } else {
                    $icon = base_url('assets/upload/icon/').$this->upload->data('file_name');
                }
            }
            
            $image = NULL;
            $config['file_name'] = $this->input->post('image');
            $config['upload_path']   = './assets/upload/image/animals/'; 
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '2048';
            $this->upload->initialize($config);
                
            if ($_FILES['image']['error'] != UPLOAD_ERR_NO_FILE) {
                if (!$this->upload->do_upload('image')) {
                    if ($_FILES['image']['error'] == UPLOAD_ERR_INI_SIZE || $_FILES['image']['error'] == UPLOAD_ERR_FORM_SIZE) {
                        echo json_encode(array('code' => '400', 'message' => 'File size should not exceed 2MB.'));
                    } else {
                        echo json_encode(array('code' => '400', 'message' => 'Image gagal diupload.'));
                    }
                } else {
                    $image = base_url('assets/upload/image/animals/').$this->upload->data('file_name');
                }
            }

            $data = array(
                'uuid' => Uuid::uuid4()->toString(),
                'name' => $this->input->post('name'),
                'name_local' => $this->input->post('name_local'),
                'domain' => $this->input->post('domain'),
                'kingdom' => $this->input->post('kingdom'),
                'phylum' => $this->input->post('phylum'),
                'class' => $this->input->post('class'),
                'ordo' => $this->input->post('ordo'),
                'familia' => $this->input->post('familia'),
                'genus' => $this->input->post('genus'),
                'spesies' => $this->input->post('spesies'),
                'description' => $this->input->post('description'),
                'description_detail' => $this->input->post('description_detail'),
                'status' => $this->input->post('status'),
                'status_perlindungan' => $this->input->post('status_perlindungan'),
                'icon' => $icon,
                'image' => $image,
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->save($data, 'fauna');

            echo json_encode(array('code' => '201', 'message' => 'Successfully adding data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function read() {
        $rows = $this->m_data->getRows(
            $_POST,
            array(null, 'fauna.uuid', 'fauna.name', 'name_local', 'fauna_domain.uuid as domain_uuid', 'fauna_domain.name as domain_name', 
            'fauna_kingdom.uuid as kingdom_uuid', 'fauna_kingdom.name as kingdom_name', 'fauna_phylum.uuid as phylum_uuid',
            'fauna_phylum.name as phylum_name', 'fauna_ordo.uuid as ordo_uuid', 'fauna_ordo.name as ordo_name',
            'fauna_class.uuid as class_uuid', 'fauna_class.name as class_name', 'fauna_familia.uuid as familia_uuid',
            'fauna_familia.name as familia_name', 'fauna_genus.uuid as genus_uuid', 'fauna_genus.name as genus_name',
            'fauna_spesies.uuid as spesies_uuid', 'fauna_spesies.name as spesies_name', 'description', 'description_detail',
            'status', 'status_perlindungan', 'icon', 'image', 'fauna.createdAt', 'fauna.updatedAt'),
            array('name', 'name_local', 'fauna_domain.uuid as domain_name', 'fauna_kingdom.uuid as kingdom_name'),
            array('createdAt' => 'ASC'),
            'fauna',
            'fauna.uuid, fauna.name, name_local, fauna_domain.uuid as domain_uuid, fauna_domain.name as domain_name, 
            fauna_kingdom.uuid as kingdom_uuid, fauna_kingdom.name as kingdom_name, fauna_phylum.uuid as phylum_uuid,
            fauna_phylum.name as phylum_name, fauna_ordo.uuid as ordo_uuid, fauna_ordo.name as ordo_name,
            fauna_class.uuid as class_uuid, fauna_class.name as class_name, fauna_familia.uuid as familia_uuid,
            fauna_familia.name as familia_name, fauna_genus.uuid as genus_uuid, fauna_genus.name as genus_name,
            fauna_spesies.uuid as spesies_uuid, fauna_spesies.name as spesies_name, description, description_detail,
            status, status_perlindungan, icon, image, fauna.createdAt, fauna.updatedAt',
            array(
                array(
                    'table' => 'fauna_domain',
                    'equals' => 'fauna_domain.uuid = fauna.domain',
                    'options' => 'LEFT',
                ),
                array(
                    'table' => 'fauna_kingdom',
                    'equals' => 'fauna_kingdom.uuid = fauna.kingdom',
                    'options' => 'LEFT',
                ),
                array(
                    'table' => 'fauna_phylum',
                    'equals' => 'fauna_phylum.uuid = fauna.phylum',
                    'options' => 'LEFT',
                ),
                array(
                    'table' => 'fauna_class',
                    'equals' => 'fauna_class.uuid = fauna.class',
                    'options' => 'LEFT',
                ),
                array(
                    'table' => 'fauna_ordo',
                    'equals' => 'fauna_ordo.uuid = fauna.ordo',
                    'options' => 'LEFT',
                ),
                array(
                    'table' => 'fauna_familia',
                    'equals' => 'fauna_familia.uuid = fauna.familia',
                    'options' => 'LEFT',
                ),
                array(
                    'table' => 'fauna_genus',
                    'equals' => 'fauna_genus.uuid = fauna.genus',
                    'options' => 'LEFT',
                ),
                array(
                    'table' => 'fauna_spesies',
                    'equals' => 'fauna_spesies.uuid = fauna.spesies',
                    'options' => 'LEFT',
                )
            ),
        );

        $data = array();
        $number = $_POST['start'];
        foreach ($rows as $i) {
            $number++;
            
            $population = 0;

            $getPopulation = $this->m_data->runQuery('SELECT * FROM fauna_population WHERE fauna_uuid = "'.$i->uuid.'"')->result();
            foreach ($getPopulation as $value) {
                $population += $value->population;
            }

            $row = array(
                'no' => $number,
                'uuid' => $i->uuid,
                'name' => $i->name,
                'name_local' => $i->name_local,
                'domain_uuid' => $i->domain_uuid, 'domain_name' => $i->domain_name, 
                'kingdom_uuid' => $i->kingdom_uuid, 'kingdom_name' => $i->kingdom_name, 
                'phylum_uuid' => $i->phylum_uuid, 'phylum_name' => $i->phylum_name, 
                'class_uuid' => $i->class_uuid, 'class_name' => $i->class_name, 
                'ordo_uuid' => $i->ordo_uuid, 'ordo_name' => $i->ordo_name, 
                'familia_uuid' => $i->familia_uuid, 'familia_name' => $i->familia_name, 
                'genus_uuid' => $i->genus_uuid, 'genus_name' => $i->genus_name, 
                'spesies_uuid' => $i->spesies_uuid, 'spesies_name' => $i->spesies_name, 
                'description' => $i->description,
                'description_detail' => $i->description_detail,
                'status' => $i->status,
                'status_perlindungan' => $i->status_perlindungan,
                'population' => $population,
                'icon' => $i->icon,
                'image' => $i->image,
                'createdAt' => $i->createdAt,
                'updatedAt' => $i->updatedAt
            );
            $data[] = $row;
        }

        $result = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_data->countAll('SELECT fauna.uuid, fauna.name, name_local, fauna_domain.uuid as domain_uuid,
                fauna_domain.name as domain_name, fauna_kingdom.uuid as kingdom_uuid, fauna_kingdom.name as kingdom_name, fauna_phylum.uuid as phylum_uuid,
                fauna_phylum.name as phylum_name, fauna_ordo.uuid as ordo_uuid, fauna_ordo.name as ordo_name,
                fauna_class.uuid as class_uuid, fauna_class.name as class_name, fauna_familia.uuid as familia_uuid,
                fauna_familia.name as familia_name, fauna_genus.uuid as genus_uuid, fauna_genus.name as genus_name,
                fauna_spesies.uuid as spesies_uuid, fauna_spesies.name as spesies_name, description, description_detail,
                status, status_perlindungan, icon, image, fauna.createdAt, fauna.updatedAt
                FROM fauna
                LEFT JOIN fauna_domain ON fauna_domain.uuid = fauna.domain
                LEFT JOIN fauna_kingdom ON fauna_kingdom.uuid = fauna.kingdom
                LEFT JOIN fauna_phylum ON fauna_phylum.uuid = fauna.phylum
                LEFT JOIN fauna_class ON fauna_class.uuid = fauna.class
                LEFT JOIN fauna_ordo ON fauna_ordo.uuid = fauna.ordo
                LEFT JOIN fauna_familia ON fauna_familia.uuid = fauna.familia
                LEFT JOIN fauna_genus ON fauna_genus.uuid = fauna.genus
                LEFT JOIN fauna_spesies ON fauna_spesies.uuid = fauna.spesies
                ORDER BY createdAt ASC'),
            "recordsFiltered" => $this->m_data->countFiltered(
                $_POST,
                array(null, 'fauna.uuid', 'fauna.name', 'name_local', 'fauna_domain.uuid as domain_uuid', 'fauna_domain.name as domain_name', 
                'fauna_kingdom.uuid as kingdom_uuid', 'fauna_kingdom.name as kingdom_name', 'fauna_phylum.uuid as phylum_uuid',
                'fauna_phylum.name as phylum_name', 'fauna_ordo.uuid as ordo_uuid', 'fauna_ordo.name as ordo_name',
                'fauna_class.uuid as class_uuid', 'fauna_class.name as class_name', 'fauna_familia.uuid as familia_uuid',
                'fauna_familia.name as familia_name', 'fauna_genus.uuid as genus_uuid', 'fauna_genus.name as genus_name',
                'fauna_spesies.uuid as spesies_uuid', 'fauna_spesies.name as spesies_name', 'description', 'description_detail',
                'status', 'status_perlindungan', 'icon', 'image', 'fauna.createdAt', 'fauna.updatedAt'),
                array('name', 'name_local', 'fauna_domain.name as domain_name', 'fauna_kingdom.name as kingdom_name'),
                array('createdAt' => 'ASC'),
                'fauna',
                'fauna.uuid, fauna.name, name_local, fauna_domain.uuid as domain_uuid, fauna_domain.name as domain_name, 
                fauna_kingdom.uuid as kingdom_uuid, fauna_kingdom.name as kingdom_name, fauna_phylum.uuid as phylum_uuid,
                fauna_phylum.name as phylum_name, fauna_ordo.uuid as ordo_uuid, fauna_ordo.name as ordo_name,
                fauna_class.uuid as class_uuid, fauna_class.name as class_name, fauna_familia.uuid as familia_uuid,
                fauna_familia.name as familia_name, fauna_genus.uuid as genus_uuid, fauna_genus.name as genus_name,
                fauna_spesies.uuid as spesies_uuid, fauna_spesies.name as spesies_name, description, description_detail,
                status, status_perlindungan, icon, image, fauna.createdAt, fauna.updatedAt',
                array(
                    array(
                        'table' => 'fauna_domain',
                        'equals' => 'fauna_domain.uuid = fauna.domain',
                        'options' => 'LEFT',
                    ),
                    array(
                        'table' => 'fauna_kingdom',
                        'equals' => 'fauna_kingdom.uuid = fauna.kingdom',
                        'options' => 'LEFT',
                    ),
                    array(
                        'table' => 'fauna_phylum',
                        'equals' => 'fauna_phylum.uuid = fauna.phylum',
                        'options' => 'LEFT',
                    ),
                    array(
                        'table' => 'fauna_class',
                        'equals' => 'fauna_class.uuid = fauna.class',
                        'options' => 'LEFT',
                    ),
                    array(
                        'table' => 'fauna_ordo',
                        'equals' => 'fauna_ordo.uuid = fauna.ordo',
                        'options' => 'LEFT',
                    ),
                    array(
                        'table' => 'fauna_familia',
                        'equals' => 'fauna_familia.uuid = fauna.familia',
                        'options' => 'LEFT',
                    ),
                    array(
                        'table' => 'fauna_genus',
                        'equals' => 'fauna_genus.uuid = fauna.genus',
                        'options' => 'LEFT',
                    ),
                    array(
                        'table' => 'fauna_spesies',
                        'equals' => 'fauna_spesies.uuid = fauna.spesies',
                        'options' => 'LEFT',
                    )
                ),
            ),
            "data" => $data
        );
        echo json_encode($result);
    }

    public function update() {
        try {
            $uuid = $this->input->post('uuid');

            $icon = NULL;
            $config['file_name'] = $this->input->post('icon');
            $config['upload_path']   = './assets/upload/icon/'; 
            $config['allowed_types'] = '*';
            $config['max_size'] = '2048';
            $this->upload->initialize($config);

            if ($_FILES['icon']['error'] != UPLOAD_ERR_NO_FILE) {
                if (!$this->upload->do_upload('icon')) {
                    if ($_FILES['icon']['error'] == UPLOAD_ERR_INI_SIZE || $_FILES['icon']['error'] == UPLOAD_ERR_FORM_SIZE) {
                        echo json_encode(array('code' => '400', 'message' => 'File size should not exceed 2MB.'));
                        die();
                    } else {
                        echo json_encode(array('code' => '400', 'message' => 'Icon failed to upload.', 'error' => $this->upload->display_errors()));
                        die();
                    }
                } else {
                    $icon = base_url('assets/upload/icon/').$this->upload->data('file_name');
                }
            }

            if ($icon == NULL) {
                $getData = $this->m_data->runQuery('SELECT icon FROM fauna WHERE uuid = "'.$uuid.'"')->result();
                foreach ($getData as $value) {
                    $icon = $value->icon;
                }
            }
            
            $image = NULL;
            $config['file_name'] = $this->input->post('image');
            $config['upload_path']   = './assets/upload/image/animals/'; 
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '2048';
            $this->upload->initialize($config);
                
            if ($_FILES['image']['error'] != UPLOAD_ERR_NO_FILE) {
                if (!$this->upload->do_upload('image')) {
                    if ($_FILES['image']['error'] == UPLOAD_ERR_INI_SIZE || $_FILES['image']['error'] == UPLOAD_ERR_FORM_SIZE) {
                        echo json_encode(array('code' => '400', 'message' => 'File size should not exceed 2MB.'));
                    } else {
                        echo json_encode(array('code' => '400', 'message' => 'Image gagal diupload.'));
                    }
                } else {
                    $image = base_url('assets/upload/image/animals/').$this->upload->data('file_name');
                }
            }

            if ($image == NULL) {
                $getData = $this->m_data->runQuery('SELECT image FROM fauna WHERE uuid = "'.$uuid.'"')->result();
                foreach ($getData as $value) {
                    $image = $value->image;
                }
            }

            $data = array(
                'name' => $this->input->post('name'),
                'name_local' => $this->input->post('name_local'),
                'domain' => $this->input->post('domain'),
                'kingdom' => $this->input->post('kingdom'),
                'phylum' => $this->input->post('phylum'),
                'class' => $this->input->post('class'),
                'ordo' => $this->input->post('ordo'),
                'familia' => $this->input->post('familia'),
                'genus' => $this->input->post('genus'),
                'spesies' => $this->input->post('spesies'),
                'description' => $this->input->post('description'),
                'description_detail' => $this->input->post('description_detail'),
                'status' => $this->input->post('status'),
                'status_perlindungan' => $this->input->post('status_perlindungan'),
                'icon' => $icon,
                'image' => $image,
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->update(
                array('uuid' => $uuid),
                $data,
                'fauna'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully updating data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function delete() {
        try {
            $uuid = $this->input->post('uuid');
            $this->m_data->delete(
                array(
                    'uuid' => $uuid,
                ),
                'fauna'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully deleting data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function getCoordinateDataByProvinces() {
        try {
            $uuid = $this->input->post('uuid');
            $data = $this->m_data->runQuery('SELECT * FROM coordinate WHERE provinces_uuid = "'.$uuid.'"')->result();
            echo json_encode(array('code' => '200', 'message' => 'Successfully get coordinate data.', 'data' => $data));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function getCoordinateById() {
        try {
            $uuid = $this->input->post('uuid');
            $data = $this->m_data->runQuery('SELECT * FROM coordinate WHERE uuid = "'.$uuid.'"')->result();
            echo json_encode(array('code' => '200', 'message' => 'Successfully get coordinate data.', 'data' => $data));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }
    
    public function readCoordinate() {
        $fauna_uuid = $this->input->post('fauna_uuid');
        $rows = $this->m_data->getRows(
            $_POST,
            array(null, 'coordinate.uuid', 'coordinate.provinces_uuid', 'provinces.name as provinces_name', 'flora_fauna_uuid', 'coordinate.name',
            'latitude', 'longtitude', 'coordinate.createdAt', 'coordinate.updatedAt'),
            array('provinces.name as provinces_name', 'coordinate.name'),
            array('coordinate.createdAt' => 'ASC'),
            'coordinate',
            'coordinate.uuid, coordinate.provinces_uuid, provinces.name as provinces_name, flora_fauna_uuid, coordinate.name, latitude, longtitude,
            coordinate.createdAt, coordinate.updatedAt',
            array(
                array(
                    'table' => 'provinces',
                    'equals' => 'provinces.uuid = coordinate.provinces_uuid',
                    'options' => 'LEFT',
                ),
            ),
            array(
                array(
                    'parameters' => 'and',
                    'field' => 'coordinate.type',
                    'value' => 'Fauna',
                ),
                array(
                    'parameters' => 'and',
                    'field' => 'flora_fauna_uuid',
                    'value' => $fauna_uuid,
                )
            )
        );

        $data = array();
        $number = $_POST['start'];
        foreach ($rows as $i) {
            $number++;
            $population = 0;

            $getPopulation = $this->m_data->runQuery('SELECT * FROM fauna_population WHERE fauna_uuid = "'.$i->flora_fauna_uuid.'" AND coordinate_uuid = "'.$i->uuid.'"')->result();
            foreach ($getPopulation as $value) {
                $population += $value->population;
            }

            $row = array(
                'no' => $number,
                'uuid' => $i->uuid,
                'provinces_uuid' => $i->provinces_uuid,
                'provinces_name' => $i->provinces_name,
                'name' => $i->name,
                'latitude' => $i->latitude,
                'longtitude' => $i->longtitude,
                'population' => $population,
            );
            $data[] = $row;
        }

        $result = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_data->countAll('SELECT coordinate.uuid, coordinate.provinces_uuid, provinces.name as provinces_name,
                flora_fauna_uuid, coordinate.name, latitude, longtitude, coordinate.createdAt, coordinate.updatedAt
                FROM coordinate
                LEFT JOIN provinces ON provinces.uuid = coordinate.provinces_uuid
                WHERE coordinate.type = "Fauna" AND flora_fauna_uuid = "'.$fauna_uuid.'"
                ORDER BY coordinate.createdAt ASC'),
            "recordsFiltered" => $this->m_data->countFiltered(
                $_POST,
                array(null, 'coordinate.uuid', 'coordinate.provinces_uuid', 'provinces.name as provinces_name', 'flora_fauna_uuid', 'coordinate.name',
                'latitude', 'longtitude', 'coordinate.createdAt', 'coordinate.updatedAt'),
                array('provinces.name as provinces_name', 'coordinate.name'),
                array('coordinate.createdAt' => 'ASC'),
                'coordinate',
                'coordinate.uuid, coordinate.provinces_uuid, provinces.name as provinces_name, flora_fauna_uuid, coordinate.name, latitude, longtitude,
                coordinate.createdAt, coordinate.updatedAt',
                array(
                    array(
                        'table' => 'provinces',
                        'equals' => 'provinces.uuid = coordinate.provinces_uuid',
                        'options' => 'LEFT',
                    ),
                ),
                array(
                    array(
                        'parameters' => 'and',
                        'field' => 'coordinate.type',
                        'value' => 'Fauna',
                    ),
                    array(
                        'parameters' => 'and',
                        'field' => 'flora_fauna_uuid',
                        'value' => $fauna_uuid,
                    )
                )
            ),
            "data" => $data
        );
        echo json_encode($result);
    }

    public function updateCoordinate() {
        try {
            $data = array(
                'provinces_uuid' => $this->input->post('provinces'),
                'name' => $this->input->post('name'),
                'latitude' => $this->input->post('latitude'),
                'longtitude' => $this->input->post('longtitude'),
                'updatedAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->update(
                array('uuid' => $this->input->post('uuid')),
                $data,
                'coordinate'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully update coordinate.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function deleteCoordinate() {
        try {
            $uuid = $this->input->post('uuid');
            $getCoordinate = $this->m_data->runQuery('SELECT * FROM coordinate WHERE uuid = "'.$uuid.'"')->result();
            foreach ($getCoordinate as $value) {
                $getPopulation = $this->m_data->runQuery('SELECT * FROM fauna_population WHERE coordinate_uuid = "'.$uuid.'"')->result();
                if (empty($getPopulation)) {
                    $this->m_data->delete(
                        array(
                            'coordinate_uuid' => $uuid,
                        ),
                        'fauna_population'
                    );
                }
                $this->m_data->delete(
                    array(
                        'uuid' => $uuid,
                    ),
                    'coordinate'
                );
            }
            echo json_encode(array('code' => '200', 'message' => 'Successfully deleting coordinate.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function increasePopulation() {
        try {
            $coordinate_uuid = Uuid::uuid4()->toString(); $provinces_uuid = $this->input->post('provinces'); $fauna_uuid = $this->input->post('fauna_uuid');
            $latitude = $this->input->post('latitude'); $longtitude = $this->input->post('longtitude');
            $coordinate = array(
                'uuid' => $coordinate_uuid,
                'provinces_uuid' => $provinces_uuid,
                'flora_fauna_uuid' => $fauna_uuid,
                'type' => 'Fauna',
                'name' => $this->input->post('name'),
                'latitude' => $this->input->post('latitude'),
                'longtitude' => $this->input->post('longtitude'),
                'createdAt' => date('Y-m-d H:i:s'),
            );
            $getCoordinate = $this->m_data->runQuery('SELECT * FROM coordinate
            WHERE provinces_uuid = "'.$provinces_uuid.'" AND flora_fauna_uuid = "'.$fauna_uuid.'" AND latitude = "'.$latitude.'" AND longtitude = "'.$longtitude.'"')->result();
            if (empty($getCoordinate)) {
                $this->m_data->save($coordinate, 'coordinate');
            } else {
                foreach($getCoordinate as $value) {
                    $coordinate_uuid = $value->uuid;
                }
            }

            $faunaPopulation = array(
                'uuid' => Uuid::uuid4()->toString(),
                'fauna_uuid' => $fauna_uuid,
                'coordinate_uuid' => $coordinate_uuid,
                'year' => $this->input->post('year'),
                'population' => $this->input->post('population'),
            );
            $this->m_data->save($faunaPopulation, 'fauna_population');
            echo json_encode(array('code' => '200', 'message' => 'Successfully increase population.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function decreasePopulation() {
        try {
            $provinces_uuid = $this->input->post('provinces'); $name = $this->input->post('name');
            $year = $this->input->post('year'); $population = $this->input->post('population');
            $getCoordinate = $this->m_data->runQuery('SELECT * FROM coordinate WHERE uuid = "'.$name.'"')->result();
            if (!empty($getCoordinate)) {
                $fauna_uuid = ''; $fauna_uuid = '';
                foreach ($getCoordinate as $value) {
                    $fauna_uuid = $value->flora_fauna_uuid; $coordinate_uuid = $value->uuid;
                }
                $faunaPopulation = array(
                    'uuid' => Uuid::uuid4()->toString(),
                    'fauna_uuid' => $fauna_uuid,
                    'coordinate_uuid' => $coordinate_uuid,
                    'year' => $this->input->post('year'),
                    'population' => -$this->input->post('population'),
                );
                $this->m_data->save($faunaPopulation, 'fauna_population');
            }
            echo json_encode(array('code' => '200', 'message' => 'Successfully decrease population.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }
}