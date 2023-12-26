<?php defined('BASEPATH') or exit('No direct script access allowed');
use Ramsey\Uuid\Uuid;
class Flora extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('m_data');

        if (!empty($this->session->userdata('isLogin') == FALSE)) {
            $this->session->set_flashdata('failed', 'Your session has expired, please sign in again.');
            redirect(base_url('Auth'));
        }
    }

    public function index() {
        $this->load->view('flora/index');
    }

    public function create() {
        try {
            $icon = NULL;
            $config['file_name'] = $this->input->post('icon');
            $config['upload_path']   = './assets/upload/icon/'; 
            $config['allowed_types'] = 'ico';
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
                'description' => $this->input->post('description'),
                'description_detail' => $this->input->post('description_detail'),
                'class' => $this->input->post('class'),
                'location' => $this->input->post('location'),
                'latitude' => $this->input->post('latitude'),
                'longtitude' => $this->input->post('longtitude'),
                'conservation_type' => $this->input->post('conservation_type'),
                'conservation_at' => $this->input->post('conservation_at'),
                'conservation_date' => $this->input->post('conservation_date'),
                'status_iucn' => $this->input->post('status_iucn'),
                'icon' => $icon,
                'image' => $image,
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->save($data, 'flora');
            echo json_encode(array('code' => '201', 'message' => 'Successfully adding data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function read() {
        $rows = $this->m_data->getRows(
            $_POST,
            array(null, 'uuid', 'name', 'description', 'description_detail', 'class', 'location', 'latitude', 'longtitude',
            'conservation_type', 'conservation_at', 'conservation_date', 'status_iucn', 'icon', 'image', 'createdAt', 'updatedAt'),
            array('name', 'class'),
            array('createdAt' => 'ASC'),
            'flora',
            'uuid, name, description, description_detail, class, location, latitude, longtitude, conservation_type, conservation_at,
            conservation_date, status_iucn, icon, image, createdAt, updatedAt',
        );

        $data = array();
        $number = $_POST['start'];
        foreach ($rows as $i) {
            $number++;

            $population = 0;
            $getPopulation = $this->m_data->runQuery('SELECT SUM(population) as population FROM flora_population WHERE flora_uuid = "'.$i->uuid.'"')->result();
            if (!empty($getPopulation)) {
                foreach ($getPopulation as $value) { $population += $value->population; }
            }

            $row = array(
                'no' => $number,
                'uuid' => $i->uuid,
                'name' => $i->name,
                'description' => $i->description,
                'description_detail' => $i->description_detail,
                'class' => $i->class,
                'location' => $i->location,
                'latitude' => $i->latitude,
                'longtitude' => $i->longtitude,
                'conservation_type' => $i->conservation_type,
                'conservation_at' => $i->conservation_at,
                'conservation_date' => $i->conservation_date,
                'status_iucn' => $i->status_iucn,
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
            "recordsTotal" => $this->m_data->countAll('SELECT uuid, name, description, description_detail, class, location, latitude, longtitude, 
                conservation_type, conservation_at, conservation_date, status_iucn, icon, image, createdAt, updatedAt
                FROM flora
                ORDER BY createdAt ASC'),
            "recordsFiltered" => $this->m_data->countFiltered(
                $_POST,
                array(null, 'uuid', 'name', 'description', 'description_detail', 'class', 'location', 'latitude', 'longtitude',
                'conservation_type', 'conservation_at', 'conservation_date', 'status_iucn', 'icon', 'image', 'createdAt', 'updatedAt'),
                array('name', 'class'),
                array('createdAt' => 'ASC'),
                'flora',
                'uuid, name, description, description_detail, class, location, latitude, longtitude, conservation_type, conservation_at,
                conservation_date, status_iucn, icon, image, createdAt, updatedAt',
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
            $config['allowed_types'] = 'ico';
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
                $getData = $this->m_data->runQuery('SELECT icon FROM flora WHERE uuid = "'.$uuid.'"')->result();
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
                $getData = $this->m_data->runQuery('SELECT image FROM flora WHERE uuid = "'.$uuid.'"')->result();
                foreach ($getData as $value) {
                    $image = $value->image;
                }
            }

            $data = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'description_detail' => $this->input->post('description_detail'),
                'class' => $this->input->post('class'),
                'location' => $this->input->post('location'),
                'latitude' => $this->input->post('latitude'),
                'longtitude' => $this->input->post('longtitude'),
                'conservation_type' => $this->input->post('conservation_type'),
                'conservation_at' => $this->input->post('conservation_at'),
                'conservation_date' => $this->input->post('conservation_date'),
                'status_iucn' => $this->input->post('status_iucn'),
                'icon' => $icon,
                'image' => $image,
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->update(
                array('uuid' => $uuid),
                $data,
                'flora'
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
                'flora'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully deleting data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function increasePopulation() {
        try {
            $data = array(
                'uuid' => Uuid::uuid4()->toString(),
                'flora_uuid' => $this->input->post('flora_uuid'),
                'year' => $this->input->post('year'),
                'population' => $this->input->post('population'),
            );
            $this->m_data->save($data, 'flora_population');
            echo json_encode(array('code' => '200', 'message' => 'Successfully increase population.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function decreasePopulation() {
        try {
            $data = array(
                'uuid' => Uuid::uuid4()->toString(),
                'flora_uuid' => $this->input->post('flora_uuid'),
                'year' => $this->input->post('year'),
                'population' => -$this->input->post('population'),
            );
            $this->m_data->save($data, 'flora_population');
            echo json_encode(array('code' => '200', 'message' => 'Successfully decrease population.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }
    
    public function readPopulation() {
        $flora_uuid = $this->input->post('flora_uuid');
        $rows = $this->m_data->getRows(
            $_POST,
            array(null, 'uuid', 'flora_uuid', 'year', 'population'),
            array('year', 'population'),
            array('year' => 'ASC'),
            'flora_population',
            'uuid, flora_uuid, year, population',
            NULL,
            array(
                array(
                    'parameters' => 'and',
                    'field' => 'flora_uuid',
                    'value' => $flora_uuid,
                )
            )
        );

        $data = array();
        $number = $_POST['start'];
        foreach ($rows as $i) {
            $number++;

            $row = array(
                'no' => $number,
                'uuid' => $i->uuid,
                'year' => $i->year,
                'population' => $i->population,
            );
            $data[] = $row;
        }

        $result = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_data->countAll('SELECT uuid, flora_uuid, year, population
                FROM flora_population
                WHERE flora_uuid = "'.$flora_uuid.'"
                ORDER BY year ASC'),
            "recordsFiltered" => $this->m_data->countFiltered(
                $_POST,
                array(null, 'uuid', 'flora_uuid', 'year', 'population'),
                array('year', 'population'),
                array('year' => 'ASC'),
                'flora_population',
                'uuid, flora_uuid, year, population',
                NULL,
                array(
                    array(
                        'parameters' => 'and',
                        'field' => 'flora_uuid',
                        'value' => $flora_uuid,
                    )
                )
            ),
            "data" => $data
        );
        echo json_encode($result);
    }
    
    public function updatePopulation() {
        try {
            $data = array(
                'year' => $this->input->post('year'),
                'population' => $this->input->post('population'),
            );
            $this->m_data->update(
                array('uuid' => $this->input->post('uuid')),
                $data,
                'flora_population'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully update population.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function deletePopulation() {
        try {
            $this->m_data->delete(
                array(
                    'uuid' => $this->input->post('uuid'),
                ),
                'flora_population'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully deleting data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }
}