<?php defined('BASEPATH') or exit('No direct script access allowed');
use Ramsey\Uuid\Uuid;
class Provinces extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('m_data');

        if (!empty($this->session->userdata('isLogin') == FALSE)) {
            $this->session->set_flashdata('failed', 'Your session has expired, please sign in again.');
            redirect(base_url('Auth'));
        }
    }

    public function index() {
        $this->load->view('provinces/index');
    }

    public function create() {
        try {
            $data = array(
                'uuid' => Uuid::uuid4()->toString(),
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->save($data, 'provinces');
            echo json_encode(array('code' => '201', 'message' => 'Successfully adding data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function read() {
        $rows = $this->m_data->getRows(
            $_POST,
            array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
            array('name'),
            array('createdAt' => 'ASC'),
            'provinces',
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
            "recordsTotal" => $this->m_data->countAll('SELECT uuid, name, createdAt, updatedAt FROM provinces ORDER BY createdAt ASC'),
            "recordsFiltered" => $this->m_data->countFiltered(
                $_POST,
                array(null, 'uuid', 'name', 'createdAt', 'updatedAt'),
                array('name'),
                array('createdAt' => 'ASC'),
                'provinces',
                'uuid, name, createdAt, updatedAt',
            ),
            "data" => $data
        );
        echo json_encode($result);
    }

    public function update() {
        try {
            $uuid = $this->input->post('uuid');
            $data = array(
                'name' => $this->input->post('name'),
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->update(
                array('uuid' => $uuid),
                $data,
                'provinces'
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
                'provinces'
            );
            echo json_encode(array('code' => '200', 'message' => 'Successfully deleting data.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }
}