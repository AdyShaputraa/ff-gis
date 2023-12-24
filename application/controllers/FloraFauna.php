<?php defined('BASEPATH') or exit('No direct script access allowed');
use Ramsey\Uuid\Uuid;
class FloraFauna extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('m_data');

        if (!empty($this->session->userdata('isLogin') == FALSE)) {
            $this->session->set_flashdata('failed', 'Sesi anda habis, silahkan sign in kembali.');
            redirect(base_url('Auth'));
        }
    }

    public function index() {
        $this->load->view('flora_fauna/index');
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
                        echo json_encode(array('code' => '400', 'message' => 'Ukuran file tidak boleh melebihi 2MB.'));
                        die();
                    } else {
                        echo json_encode(array('code' => '400', 'message' => 'Icon gagal diupload.', 'error' => $this->upload->display_errors()));
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
                        echo json_encode(array('code' => '400', 'message' => 'Ukuran file tidak boleh melebihi 2MB.'));
                    } else {
                        echo json_encode(array('code' => '400', 'message' => 'Image gagal diupload.'));
                    }
                } else {
                    $image = base_url('assets/upload/image/animals/').$this->upload->data('file_name');
                }
            }

            $data = array(
                'uuid' => Uuid::uuid4()->toString(),
                'type' => $this->input->post('type'),
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'icon' => $icon,
                'image' => $image,
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->save($data, 'flora_fauna_ledger_entries');
            echo json_encode(array('code' => '201', 'message' => 'Data berhasil ditambah.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }

    public function read() {
        $rows = $this->m_data->getRows(
            $_POST,
            array(null, 'uuid', 'type', 'name', 'description', 'latitude', 'longitude', 'icon', 'image', 'createdAt'),
            array('type', 'name',),
            array('createdAt' => 'ASC'),
            'flora_fauna_ledger_entries',
            'uuid, type, name, description, latitude, longitude, icon, image, createdAt',
        );

        $data = array();
        $number = $_POST['start'];
        foreach ($rows as $i) {
            $number++;
            $row = array(
                'no' => $number,
                'uuid' => $i->uuid,
                'type' => $i->type,
                'name' => $i->name,
                'description' => $i->description,
                'latitude' => $i->latitude,
                'longitude' => $i->longitude,
                'icon' => $i->icon,
                'image' => $i->image
            );
            $data[] = $row;
        }

        $result = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_data->countAll('SELECT uuid, type, name, description, latitude, longitude, icon, image, createdAt
                FROM flora_fauna_ledger_entries
                ORDER BY createdAt ASC'),
            "recordsFiltered" => $this->m_data->countFiltered(
                $_POST,
                array(null, 'uuid', 'type', 'name', 'description', 'latitude', 'longitude', 'icon', 'image', 'createdAt'),
                array('type', 'name',),
                array('createdAt' => 'ASC'),
                'flora_fauna_ledger_entries',
                'uuid, type, name, description, latitude, longitude, icon, image, createdAt',
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
                        echo json_encode(array('code' => '400', 'message' => 'Ukuran file tidak boleh melebihi 2MB.'));
                        die();
                    } else {
                        echo json_encode(array('code' => '400', 'message' => 'Icon gagal diupload.', 'error' => $this->upload->display_errors()));
                        die();
                    }
                } else {
                    $icon = base_url('assets/upload/icon/').$this->upload->data('file_name');
                }
            }

            if ($icon == NULL) {
                $getData = $this->m_data->runQuery('SELECT icon FROM flora_fauna_ledger_entries WHERE uuid = "'.$uuid.'"')->result();
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
                        echo json_encode(array('code' => '400', 'message' => 'Ukuran file tidak boleh melebihi 2MB.'));
                    } else {
                        echo json_encode(array('code' => '400', 'message' => 'Image gagal diupload.'));
                    }
                } else {
                    $image = base_url('assets/upload/image/animals/').$this->upload->data('file_name');
                }
            }

            if ($image == NULL) {
                $getData = $this->m_data->runQuery('SELECT image FROM flora_fauna_ledger_entries WHERE uuid = "'.$uuid.'"')->result();
                foreach ($getData as $value) {
                    $image = $value->image;
                }
            }

            $data = array(
                'type' => $this->input->post('type'),
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'icon' => $icon,
                'image' => $image,
                'createdAt' => date('Y-m-d H:i:s')
            );
            $this->m_data->update(
                array('uuid' => $uuid),
                $data,
                'flora_fauna_ledger_entries'
            );
            echo json_encode(array('code' => '200', 'message' => 'Data berhasil diubah.'));
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
                'flora_fauna_ledger_entries'
            );
            echo json_encode(array('code' => '200', 'message' => 'Data berhasil dihapus.'));
        } catch (Exception $e) {
            echo json_encode(array('code' => '500', 'message' => $e->getMessage()));
        }
    }
}