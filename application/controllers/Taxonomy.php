<?php defined('BASEPATH') or exit('No direct script access allowed');
use Ramsey\Uuid\Uuid;
class Taxonomy extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('m_data');

        if (!empty($this->session->userdata('isLogin') == FALSE)) {
            $this->session->set_flashdata('failed', 'Your session has expired, please sign in again.');
            redirect(base_url('Auth'));
        }
    }

    public function faunaDomain() {
        $this->load->view('taxonomy/fauna/domain/index');
    }

    public function createFaunaDomain() {
        try {
            $data = array(
                'uuid' => Uuid::uuid4()->toString(),
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->save($data, 'fauna_domain');
            echo json_encode(array('code' => '201', 'message' => 'Successfully adding data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function readFaunaDomain() {
        $rows = $this->m_data->getRows(
            $_POST,
            array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
            array('name'),
            array('createdAt' => 'ASC'),
            'fauna_domain',
            'uuid, name, createdAt, updatedAt',
        );

        $data = array();
        $number = $_POST['start'];
        foreach ($rows as $i) {
            $number++;
            
            $row = array(
                'no' => $number,
                'uuid' => $i->uuid,
                'name' => $i->name,
                'createdAt' => $i->createdAt,
                'updatedAt' => $i->updatedAt
            );
            $data[] = $row;
        }

        $result = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_data->countAll('SELECT uuid, name, createdAt, updatedAt FROM fauna_domain ORDER BY createdAt ASC'),
            "recordsFiltered" => $this->m_data->countFiltered(
                $_POST,
                array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
                array('name'),
                array('createdAt' => 'ASC'),
                'fauna_domain',
                'uuid, name, createdAt, updatedAt',
            ),
            "data" => $data
        );
        echo json_encode($result);
    }

    public function updateFaunaDomain() {
        try {
            $uuid = $this->input->post('uuid');
            $data = array(
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->update(
                array('uuid' => $uuid),
                $data,
                'fauna_domain'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully updating data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function deleteFaunaDomain() {
        try {
            $uuid = $this->input->post('uuid');
            $this->m_data->delete(
                array(
                    'uuid' => $uuid,
                ),
                'fauna_domain'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully deleting data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function faunaKingdom() {
        $this->load->view('taxonomy/fauna/kingdom/index');
    }

    public function createFaunaKingdom() {
        try {
            $data = array(
                'uuid' => Uuid::uuid4()->toString(),
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->save($data, 'fauna_kingdom');
            echo json_encode(array('code' => '201', 'message' => 'Successfully adding data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function readFaunaKingdom() {
        $rows = $this->m_data->getRows(
            $_POST,
            array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
            array('name'),
            array('createdAt' => 'ASC'),
            'fauna_kingdom',
            'uuid, name, createdAt, updatedAt',
        );

        $data = array();
        $number = $_POST['start'];
        foreach ($rows as $i) {
            $number++;
            
            $row = array(
                'no' => $number,
                'uuid' => $i->uuid,
                'name' => $i->name,
                'createdAt' => $i->createdAt,
                'updatedAt' => $i->updatedAt
            );
            $data[] = $row;
        }

        $result = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_data->countAll('SELECT uuid, name, createdAt, updatedAt FROM fauna_kingdom ORDER BY createdAt ASC'),
            "recordsFiltered" => $this->m_data->countFiltered(
                $_POST,
                array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
                array('name'),
                array('createdAt' => 'ASC'),
                'fauna_kingdom',
                'uuid, name, createdAt, updatedAt',
            ),
            "data" => $data
        );
        echo json_encode($result);
    }

    public function updateFaunaKingdom() {
        try {
            $uuid = $this->input->post('uuid');
            $data = array(
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->update(
                array('uuid' => $uuid),
                $data,
                'fauna_kingdom'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully updating data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function deleteFaunaKingdom() {
        try {
            $uuid = $this->input->post('uuid');
            $this->m_data->delete(
                array(
                    'uuid' => $uuid,
                ),
                'fauna_kingdom'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully deleting data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function faunaPhylum() {
        $this->load->view('taxonomy/fauna/phylum/index');
    }

    public function createFaunaPhylum() {
        try {
            $data = array(
                'uuid' => Uuid::uuid4()->toString(),
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->save($data, 'fauna_phylum');
            echo json_encode(array('code' => '201', 'message' => 'Successfully adding data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function readFaunaPhylum() {
        $rows = $this->m_data->getRows(
            $_POST,
            array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
            array('name'),
            array('createdAt' => 'ASC'),
            'fauna_phylum',
            'uuid, name, createdAt, updatedAt',
        );

        $data = array();
        $number = $_POST['start'];
        foreach ($rows as $i) {
            $number++;
            
            $row = array(
                'no' => $number,
                'uuid' => $i->uuid,
                'name' => $i->name,
                'createdAt' => $i->createdAt,
                'updatedAt' => $i->updatedAt
            );
            $data[] = $row;
        }

        $result = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_data->countAll('SELECT uuid, name, createdAt, updatedAt FROM fauna_phylum ORDER BY createdAt ASC'),
            "recordsFiltered" => $this->m_data->countFiltered(
                $_POST,
                array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
                array('name'),
                array('createdAt' => 'ASC'),
                'fauna_phylum',
                'uuid, name, createdAt, updatedAt',
            ),
            "data" => $data
        );
        echo json_encode($result);
    }

    public function updateFaunaPhylum() {
        try {
            $uuid = $this->input->post('uuid');
            $data = array(
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->update(
                array('uuid' => $uuid),
                $data,
                'fauna_phylum'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully updating data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function deleteFaunaPhylum() {
        try {
            $uuid = $this->input->post('uuid');
            $this->m_data->delete(
                array(
                    'uuid' => $uuid,
                ),
                'fauna_phylum'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully deleting data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function faunaClass() {
        $this->load->view('taxonomy/fauna/class/index');
    }

    public function createFaunaClass() {
        try {
            $data = array(
                'uuid' => Uuid::uuid4()->toString(),
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->save($data, 'fauna_class');
            echo json_encode(array('code' => '201', 'message' => 'Successfully adding data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function readFaunaClass() {
        $rows = $this->m_data->getRows(
            $_POST,
            array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
            array('name'),
            array('createdAt' => 'ASC'),
            'fauna_class',
            'uuid, name, createdAt, updatedAt',
        );

        $data = array();
        $number = $_POST['start'];
        foreach ($rows as $i) {
            $number++;
            
            $row = array(
                'no' => $number,
                'uuid' => $i->uuid,
                'name' => $i->name,
                'createdAt' => $i->createdAt,
                'updatedAt' => $i->updatedAt
            );
            $data[] = $row;
        }

        $result = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_data->countAll('SELECT uuid, name, createdAt, updatedAt FROM fauna_class ORDER BY createdAt ASC'),
            "recordsFiltered" => $this->m_data->countFiltered(
                $_POST,
                array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
                array('name'),
                array('createdAt' => 'ASC'),
                'fauna_class',
                'uuid, name, createdAt, updatedAt',
            ),
            "data" => $data
        );
        echo json_encode($result);
    }

    public function updateFaunaClass() {
        try {
            $uuid = $this->input->post('uuid');
            $data = array(
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->update(
                array('uuid' => $uuid),
                $data,
                'fauna_class'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully updating data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function deleteFaunaClass() {
        try {
            $uuid = $this->input->post('uuid');
            $this->m_data->delete(
                array(
                    'uuid' => $uuid,
                ),
                'fauna_class'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully deleting data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }
    
    public function faunaOrdo() {
        $this->load->view('taxonomy/fauna/ordo/index');
    }

    public function createFaunaOrdo() {
        try {
            $data = array(
                'uuid' => Uuid::uuid4()->toString(),
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->save($data, 'fauna_ordo');
            echo json_encode(array('code' => '201', 'message' => 'Successfully adding data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function readFaunaOrdo() {
        $rows = $this->m_data->getRows(
            $_POST,
            array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
            array('name'),
            array('createdAt' => 'ASC'),
            'fauna_ordo',
            'uuid, name, createdAt, updatedAt',
        );

        $data = array();
        $number = $_POST['start'];
        foreach ($rows as $i) {
            $number++;
            
            $row = array(
                'no' => $number,
                'uuid' => $i->uuid,
                'name' => $i->name,
                'createdAt' => $i->createdAt,
                'updatedAt' => $i->updatedAt
            );
            $data[] = $row;
        }

        $result = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_data->countAll('SELECT uuid, name, createdAt, updatedAt FROM fauna_ordo ORDER BY createdAt ASC'),
            "recordsFiltered" => $this->m_data->countFiltered(
                $_POST,
                array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
                array('name'),
                array('createdAt' => 'ASC'),
                'fauna_ordo',
                'uuid, name, createdAt, updatedAt',
            ),
            "data" => $data
        );
        echo json_encode($result);
    }

    public function updateFaunaOrdo() {
        try {
            $uuid = $this->input->post('uuid');
            $data = array(
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->update(
                array('uuid' => $uuid),
                $data,
                'fauna_ordo'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully updating data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function deleteFaunaOrdo() {
        try {
            $uuid = $this->input->post('uuid');
            $this->m_data->delete(
                array(
                    'uuid' => $uuid,
                ),
                'fauna_ordo'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully deleting data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }
    
    public function faunaFamilia() {
        $this->load->view('taxonomy/fauna/familia/index');
    }

    public function createFaunaFamilia() {
        try {
            $data = array(
                'uuid' => Uuid::uuid4()->toString(),
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->save($data, 'fauna_familia');
            echo json_encode(array('code' => '201', 'message' => 'Successfully adding data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function readFaunaFamilia() {
        $rows = $this->m_data->getRows(
            $_POST,
            array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
            array('name'),
            array('createdAt' => 'ASC'),
            'fauna_familia',
            'uuid, name, createdAt, updatedAt',
        );

        $data = array();
        $number = $_POST['start'];
        foreach ($rows as $i) {
            $number++;
            
            $row = array(
                'no' => $number,
                'uuid' => $i->uuid,
                'name' => $i->name,
                'createdAt' => $i->createdAt,
                'updatedAt' => $i->updatedAt
            );
            $data[] = $row;
        }

        $result = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_data->countAll('SELECT uuid, name, createdAt, updatedAt FROM fauna_familia ORDER BY createdAt ASC'),
            "recordsFiltered" => $this->m_data->countFiltered(
                $_POST,
                array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
                array('name'),
                array('createdAt' => 'ASC'),
                'fauna_familia',
                'uuid, name, createdAt, updatedAt',
            ),
            "data" => $data
        );
        echo json_encode($result);
    }

    public function updateFaunaFamilia() {
        try {
            $uuid = $this->input->post('uuid');
            $data = array(
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->update(
                array('uuid' => $uuid),
                $data,
                'fauna_familia'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully updating data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function deleteFaunaFamilia() {
        try {
            $uuid = $this->input->post('uuid');
            $this->m_data->delete(
                array(
                    'uuid' => $uuid,
                ),
                'fauna_familia'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully deleting data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }
    
    public function faunaGenus() {
        $this->load->view('taxonomy/fauna/genus/index');
    }

    public function createFaunaGenus() {
        try {
            $data = array(
                'uuid' => Uuid::uuid4()->toString(),
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->save($data, 'fauna_genus');
            echo json_encode(array('code' => '201', 'message' => 'Successfully adding data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function readFaunaGenus() {
        $rows = $this->m_data->getRows(
            $_POST,
            array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
            array('name'),
            array('createdAt' => 'ASC'),
            'fauna_genus',
            'uuid, name, createdAt, updatedAt',
        );

        $data = array();
        $number = $_POST['start'];
        foreach ($rows as $i) {
            $number++;
            
            $row = array(
                'no' => $number,
                'uuid' => $i->uuid,
                'name' => $i->name,
                'createdAt' => $i->createdAt,
                'updatedAt' => $i->updatedAt
            );
            $data[] = $row;
        }

        $result = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_data->countAll('SELECT uuid, name, createdAt, updatedAt FROM fauna_genus ORDER BY createdAt ASC'),
            "recordsFiltered" => $this->m_data->countFiltered(
                $_POST,
                array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
                array('name'),
                array('createdAt' => 'ASC'),
                'fauna_genus',
                'uuid, name, createdAt, updatedAt',
            ),
            "data" => $data
        );
        echo json_encode($result);
    }

    public function updateFaunaGenus() {
        try {
            $uuid = $this->input->post('uuid');
            $data = array(
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->update(
                array('uuid' => $uuid),
                $data,
                'fauna_genus'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully updating data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function deleteFaunaGenus() {
        try {
            $uuid = $this->input->post('uuid');
            $this->m_data->delete(
                array(
                    'uuid' => $uuid,
                ),
                'fauna_genus'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully deleting data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }
    
    public function faunaSpesies() {
        $this->load->view('taxonomy/fauna/spesies/index');
    }

    public function createFaunaSpesies() {
        try {
            $data = array(
                'uuid' => Uuid::uuid4()->toString(),
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->save($data, 'fauna_spesies');
            echo json_encode(array('code' => '201', 'message' => 'Successfully adding data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function readFaunaSpesies() {
        $rows = $this->m_data->getRows(
            $_POST,
            array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
            array('name'),
            array('createdAt' => 'ASC'),
            'fauna_spesies',
            'uuid, name, createdAt, updatedAt',
        );

        $data = array();
        $number = $_POST['start'];
        foreach ($rows as $i) {
            $number++;
            
            $row = array(
                'no' => $number,
                'uuid' => $i->uuid,
                'name' => $i->name,
                'createdAt' => $i->createdAt,
                'updatedAt' => $i->updatedAt
            );
            $data[] = $row;
        }

        $result = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_data->countAll('SELECT uuid, name, createdAt, updatedAt FROM fauna_spesies ORDER BY createdAt ASC'),
            "recordsFiltered" => $this->m_data->countFiltered(
                $_POST,
                array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
                array('name'),
                array('createdAt' => 'ASC'),
                'fauna_spesies',
                'uuid, name, createdAt, updatedAt',
            ),
            "data" => $data
        );
        echo json_encode($result);
    }

    public function updateFaunaSpesies() {
        try {
            $uuid = $this->input->post('uuid');
            $data = array(
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->update(
                array('uuid' => $uuid),
                $data,
                'fauna_spesies'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully updating data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function deleteFaunaSpesies() {
        try {
            $uuid = $this->input->post('uuid');
            $this->m_data->delete(
                array(
                    'uuid' => $uuid,
                ),
                'fauna_spesies'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully deleting data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    // Flora
    public function floraDomain() {
        $this->load->view('taxonomy/flora/domain/index');
    }

    public function createFloraDomain() {
        try {
            $data = array(
                'uuid' => Uuid::uuid4()->toString(),
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->save($data, 'flora_domain');
            echo json_encode(array('code' => '201', 'message' => 'Successfully adding data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function readFloraDomain() {
        $rows = $this->m_data->getRows(
            $_POST,
            array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
            array('name'),
            array('createdAt' => 'ASC'),
            'flora_domain',
            'uuid, name, createdAt, updatedAt',
        );

        $data = array();
        $number = $_POST['start'];
        foreach ($rows as $i) {
            $number++;
            
            $row = array(
                'no' => $number,
                'uuid' => $i->uuid,
                'name' => $i->name,
                'createdAt' => $i->createdAt,
                'updatedAt' => $i->updatedAt
            );
            $data[] = $row;
        }

        $result = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_data->countAll('SELECT uuid, name, createdAt, updatedAt FROM flora_domain ORDER BY createdAt ASC'),
            "recordsFiltered" => $this->m_data->countFiltered(
                $_POST,
                array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
                array('name'),
                array('createdAt' => 'ASC'),
                'flora_domain',
                'uuid, name, createdAt, updatedAt',
            ),
            "data" => $data
        );
        echo json_encode($result);
    }

    public function updateFloraDomain() {
        try {
            $uuid = $this->input->post('uuid');
            $data = array(
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->update(
                array('uuid' => $uuid),
                $data,
                'flora_domain'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully updating data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function deleteFloraDomain() {
        try {
            $uuid = $this->input->post('uuid');
            $this->m_data->delete(
                array(
                    'uuid' => $uuid,
                ),
                'flora_domain'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully deleting data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function floraKingdom() {
        $this->load->view('taxonomy/flora/kingdom/index');
    }

    public function createFloraKingdom() {
        try {
            $data = array(
                'uuid' => Uuid::uuid4()->toString(),
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->save($data, 'flora_kingdom');
            echo json_encode(array('code' => '201', 'message' => 'Successfully adding data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function readFloraKingdom() {
        $rows = $this->m_data->getRows(
            $_POST,
            array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
            array('name'),
            array('createdAt' => 'ASC'),
            'flora_kingdom',
            'uuid, name, createdAt, updatedAt',
        );

        $data = array();
        $number = $_POST['start'];
        foreach ($rows as $i) {
            $number++;
            
            $row = array(
                'no' => $number,
                'uuid' => $i->uuid,
                'name' => $i->name,
                'createdAt' => $i->createdAt,
                'updatedAt' => $i->updatedAt
            );
            $data[] = $row;
        }

        $result = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_data->countAll('SELECT uuid, name, createdAt, updatedAt FROM flora_kingdom ORDER BY createdAt ASC'),
            "recordsFiltered" => $this->m_data->countFiltered(
                $_POST,
                array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
                array('name'),
                array('createdAt' => 'ASC'),
                'flora_kingdom',
                'uuid, name, createdAt, updatedAt',
            ),
            "data" => $data
        );
        echo json_encode($result);
    }

    public function updateFloraKingdom() {
        try {
            $uuid = $this->input->post('uuid');
            $data = array(
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->update(
                array('uuid' => $uuid),
                $data,
                'flora_kingdom'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully updating data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function deleteFloraKingdom() {
        try {
            $uuid = $this->input->post('uuid');
            $this->m_data->delete(
                array(
                    'uuid' => $uuid,
                ),
                'flora_kingdom'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully deleting data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function floraDivision() {
        $this->load->view('taxonomy/flora/division/index');
    }

    public function createFloraDivision() {
        try {
            $data = array(
                'uuid' => Uuid::uuid4()->toString(),
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->save($data, 'flora_division');
            echo json_encode(array('code' => '201', 'message' => 'Successfully adding data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function readFloraDivision() {
        $rows = $this->m_data->getRows(
            $_POST,
            array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
            array('name'),
            array('createdAt' => 'ASC'),
            'flora_division',
            'uuid, name, createdAt, updatedAt',
        );

        $data = array();
        $number = $_POST['start'];
        foreach ($rows as $i) {
            $number++;
            
            $row = array(
                'no' => $number,
                'uuid' => $i->uuid,
                'name' => $i->name,
                'createdAt' => $i->createdAt,
                'updatedAt' => $i->updatedAt
            );
            $data[] = $row;
        }

        $result = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_data->countAll('SELECT uuid, name, createdAt, updatedAt FROM flora_division ORDER BY createdAt ASC'),
            "recordsFiltered" => $this->m_data->countFiltered(
                $_POST,
                array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
                array('name'),
                array('createdAt' => 'ASC'),
                'flora_division',
                'uuid, name, createdAt, updatedAt',
            ),
            "data" => $data
        );
        echo json_encode($result);
    }

    public function updateFloraDivision() {
        try {
            $uuid = $this->input->post('uuid');
            $data = array(
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->update(
                array('uuid' => $uuid),
                $data,
                'flora_division'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully updating data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function deleteFloraDivision() {
        try {
            $uuid = $this->input->post('uuid');
            $this->m_data->delete(
                array(
                    'uuid' => $uuid,
                ),
                'flora_division'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully deleting data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function floraClass() {
        $this->load->view('taxonomy/flora/class/index');
    }

    public function createFloraClass() {
        try {
            $data = array(
                'uuid' => Uuid::uuid4()->toString(),
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->save($data, 'flora_class');
            echo json_encode(array('code' => '201', 'message' => 'Successfully adding data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function readFloraClass() {
        $rows = $this->m_data->getRows(
            $_POST,
            array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
            array('name'),
            array('createdAt' => 'ASC'),
            'flora_class',
            'uuid, name, createdAt, updatedAt',
        );

        $data = array();
        $number = $_POST['start'];
        foreach ($rows as $i) {
            $number++;
            
            $row = array(
                'no' => $number,
                'uuid' => $i->uuid,
                'name' => $i->name,
                'createdAt' => $i->createdAt,
                'updatedAt' => $i->updatedAt
            );
            $data[] = $row;
        }

        $result = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_data->countAll('SELECT uuid, name, createdAt, updatedAt FROM flora_class ORDER BY createdAt ASC'),
            "recordsFiltered" => $this->m_data->countFiltered(
                $_POST,
                array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
                array('name'),
                array('createdAt' => 'ASC'),
                'flora_class',
                'uuid, name, createdAt, updatedAt',
            ),
            "data" => $data
        );
        echo json_encode($result);
    }

    public function updateFloraClass() {
        try {
            $uuid = $this->input->post('uuid');
            $data = array(
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->update(
                array('uuid' => $uuid),
                $data,
                'flora_class'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully updating data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function deleteFloraClass() {
        try {
            $uuid = $this->input->post('uuid');
            $this->m_data->delete(
                array(
                    'uuid' => $uuid,
                ),
                'flora_class'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully deleting data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }
    
    public function floraOrdo() {
        $this->load->view('taxonomy/flora/ordo/index');
    }

    public function createFloraOrdo() {
        try {
            $data = array(
                'uuid' => Uuid::uuid4()->toString(),
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->save($data, 'flora_ordo');
            echo json_encode(array('code' => '201', 'message' => 'Successfully adding data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function readFloraOrdo() {
        $rows = $this->m_data->getRows(
            $_POST,
            array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
            array('name'),
            array('createdAt' => 'ASC'),
            'flora_ordo',
            'uuid, name, createdAt, updatedAt',
        );

        $data = array();
        $number = $_POST['start'];
        foreach ($rows as $i) {
            $number++;
            
            $row = array(
                'no' => $number,
                'uuid' => $i->uuid,
                'name' => $i->name,
                'createdAt' => $i->createdAt,
                'updatedAt' => $i->updatedAt
            );
            $data[] = $row;
        }

        $result = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_data->countAll('SELECT uuid, name, createdAt, updatedAt FROM flora_ordo ORDER BY createdAt ASC'),
            "recordsFiltered" => $this->m_data->countFiltered(
                $_POST,
                array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
                array('name'),
                array('createdAt' => 'ASC'),
                'flora_ordo',
                'uuid, name, createdAt, updatedAt',
            ),
            "data" => $data
        );
        echo json_encode($result);
    }

    public function updateFloraOrdo() {
        try {
            $uuid = $this->input->post('uuid');
            $data = array(
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->update(
                array('uuid' => $uuid),
                $data,
                'flora_ordo'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully updating data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function deleteFloraOrdo() {
        try {
            $uuid = $this->input->post('uuid');
            $this->m_data->delete(
                array(
                    'uuid' => $uuid,
                ),
                'flora_ordo'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully deleting data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }
    
    public function floraFamilia() {
        $this->load->view('taxonomy/flora/familia/index');
    }

    public function createFloraFamilia() {
        try {
            $data = array(
                'uuid' => Uuid::uuid4()->toString(),
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->save($data, 'flora_familia');
            echo json_encode(array('code' => '201', 'message' => 'Successfully adding data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function readFloraFamilia() {
        $rows = $this->m_data->getRows(
            $_POST,
            array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
            array('name'),
            array('createdAt' => 'ASC'),
            'flora_familia',
            'uuid, name, createdAt, updatedAt',
        );

        $data = array();
        $number = $_POST['start'];
        foreach ($rows as $i) {
            $number++;
            
            $row = array(
                'no' => $number,
                'uuid' => $i->uuid,
                'name' => $i->name,
                'createdAt' => $i->createdAt,
                'updatedAt' => $i->updatedAt
            );
            $data[] = $row;
        }

        $result = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_data->countAll('SELECT uuid, name, createdAt, updatedAt FROM flora_familia ORDER BY createdAt ASC'),
            "recordsFiltered" => $this->m_data->countFiltered(
                $_POST,
                array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
                array('name'),
                array('createdAt' => 'ASC'),
                'flora_familia',
                'uuid, name, createdAt, updatedAt',
            ),
            "data" => $data
        );
        echo json_encode($result);
    }

    public function updateFloraFamilia() {
        try {
            $uuid = $this->input->post('uuid');
            $data = array(
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->update(
                array('uuid' => $uuid),
                $data,
                'flora_familia'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully updating data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function deleteFloraFamilia() {
        try {
            $uuid = $this->input->post('uuid');
            $this->m_data->delete(
                array(
                    'uuid' => $uuid,
                ),
                'flora_familia'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully deleting data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }
    
    public function floraGenus() {
        $this->load->view('taxonomy/flora/genus/index');
    }

    public function createFloraGenus() {
        try {
            $data = array(
                'uuid' => Uuid::uuid4()->toString(),
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->save($data, 'flora_genus');
            echo json_encode(array('code' => '201', 'message' => 'Successfully adding data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function readFloraGenus() {
        $rows = $this->m_data->getRows(
            $_POST,
            array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
            array('name'),
            array('createdAt' => 'ASC'),
            'flora_genus',
            'uuid, name, createdAt, updatedAt',
        );

        $data = array();
        $number = $_POST['start'];
        foreach ($rows as $i) {
            $number++;
            
            $row = array(
                'no' => $number,
                'uuid' => $i->uuid,
                'name' => $i->name,
                'createdAt' => $i->createdAt,
                'updatedAt' => $i->updatedAt
            );
            $data[] = $row;
        }

        $result = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_data->countAll('SELECT uuid, name, createdAt, updatedAt FROM flora_genus ORDER BY createdAt ASC'),
            "recordsFiltered" => $this->m_data->countFiltered(
                $_POST,
                array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
                array('name'),
                array('createdAt' => 'ASC'),
                'flora_genus',
                'uuid, name, createdAt, updatedAt',
            ),
            "data" => $data
        );
        echo json_encode($result);
    }

    public function updateFloraGenus() {
        try {
            $uuid = $this->input->post('uuid');
            $data = array(
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->update(
                array('uuid' => $uuid),
                $data,
                'flora_genus'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully updating data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function deleteFloraGenus() {
        try {
            $uuid = $this->input->post('uuid');
            $this->m_data->delete(
                array(
                    'uuid' => $uuid,
                ),
                'flora_genus'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully deleting data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }
    
    public function floraSpesies() {
        $this->load->view('taxonomy/flora/spesies/index');
    }

    public function createFloraSpesies() {
        try {
            $data = array(
                'uuid' => Uuid::uuid4()->toString(),
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->save($data, 'flora_spesies');
            echo json_encode(array('code' => '201', 'message' => 'Successfully adding data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function readFloraSpesies() {
        $rows = $this->m_data->getRows(
            $_POST,
            array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
            array('name'),
            array('createdAt' => 'ASC'),
            'flora_spesies',
            'uuid, name, createdAt, updatedAt',
        );

        $data = array();
        $number = $_POST['start'];
        foreach ($rows as $i) {
            $number++;
            
            $row = array(
                'no' => $number,
                'uuid' => $i->uuid,
                'name' => $i->name,
                'createdAt' => $i->createdAt,
                'updatedAt' => $i->updatedAt
            );
            $data[] = $row;
        }

        $result = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_data->countAll('SELECT uuid, name, createdAt, updatedAt FROM flora_spesies ORDER BY createdAt ASC'),
            "recordsFiltered" => $this->m_data->countFiltered(
                $_POST,
                array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
                array('name'),
                array('createdAt' => 'ASC'),
                'flora_spesies',
                'uuid, name, createdAt, updatedAt',
            ),
            "data" => $data
        );
        echo json_encode($result);
    }

    public function updateFloraSpesies() {
        try {
            $uuid = $this->input->post('uuid');
            $data = array(
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->update(
                array('uuid' => $uuid),
                $data,
                'flora_spesies'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully updating data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function deleteFloraSpesies() {
        try {
            $uuid = $this->input->post('uuid');
            $this->m_data->delete(
                array(
                    'uuid' => $uuid,
                ),
                'flora_spesies'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully deleting data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }
}