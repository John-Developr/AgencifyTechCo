<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends MY_Controller
{
    public function index()
    {
        $data['title'] = 'Staff';
        $this->load_horizontal('index', $data);
    }

    public function add()
    {
        $_POST['added_by'] = $_SESSION['userdata']['id'];
        $_POST['date_added'] = date('Y-m-d');
        $run_query['result'] = $this->MY_Model->insert(PREFIX . 'staff', $_POST);
        if($run_query['result']){
            $params['where'] = array(
                'fname' => $_POST['fname']
            );
            $run_query['userdata'] = $this->MY_Model->getRows(PREFIX . 'staff', $params, 'row');

            $date = date('Y-m-d');
            
            $config = array(
                "upload_path" => "./upload/staffdocu/",
                "allowed_types" => "doc|docx|pdf"
            );
    
            $this->load->library('upload');
            $this->upload->initialize($config);
    
            if (!$this->upload->do_upload('file')) :
                $response['message'] = array('error' => $this->upload->display_errors());
                $response['status'] = false;
            else :
                $file_name = $this->upload->data('file_name');
                $data = array(
                    'fk_user_id' => $run_query['userdata']->id,
                    'uploadedby' => $_SESSION['userdata']['id'],
                    'filename' => $file_name,
                    'date_added' => $date
                );
                $this->MY_Model->insert(PREFIX . 'staffdocu', $data);
                $result['status'] = true;
            endif;

        }
        $response['status'] = true;
        echo json_encode($response);
    }

    public function list()
    {
        $limit = $this->input->post('length');
        $offset = $this->input->post('start');
        $search = $this->input->post('search');
        $order = $this->input->post('order');
        $draw = $this->input->post('draw');
        $type = $this->input->post('filterType');

        $user_id = $_SESSION['userdata']['id'];

        $query['column_order'] = array();

        $query['select'] = PREFIX.'staff.*, CONCAT(fname, lname) as fullname';

        $query['where'] = array(
            'status' => 0, 
            'added_by' => $user_id
        );

        $query['join'] = array();
        $run_query = $this->MY_Model->get_datatables(PREFIX . 'staff', $query['column_order'], $query['select'], $query['where'], $query['join'], $limit, $offset, $search, $order, $query['group'] = array());

        $result = array(
            "draw" => $draw,
            "recordsTotal" => $run_query['count_all'],
            "recordsFiltered" => $run_query['count'],
            "data" => $run_query['data']
        );

        echo json_encode($result);
    }

    public function remove()
	{
		$id = $this->input->post('id');
		$query['set'] = array('status' => 1);
		$query['where'] = array('id' => $id);
		$run_query = $this->MY_Model->update(PREFIX . 'staff', $query['set'], $query['where']);
		if ($run_query) {
			$response['status'] = true;
		}
		echo json_encode($response);
	}

    public function fetch(){
        $id = $this->input->post('id');
		$query['select'] = "";
		$query['where'] = array('id' => $id);
		$run_query = $this->MY_Model->getRows(PREFIX . 'staff', $query);
		echo json_encode($run_query);
    }

    public function update(){
        $date = date('Y-m-d');

		$query['where'] = array('id' => $_POST['id']);
        // unset($_POST['id']);
		$query['set'] = $_POST;
		$this->MY_Model->update(PREFIX . 'staff', $query['set'], $query['where']);
        $config = array(
            "upload_path" => "./upload/staffdocu/",
            "allowed_types" => "doc|docx|pdf"
        );

        $this->load->library('upload');
        $this->upload->initialize($config);
        
        if (!$this->upload->do_upload('file')) :
            $response['message'] = array('error' => $this->upload->display_errors());
            $response['status'] = false;
        else :
            $file_name = $this->upload->data('file_name');
            $data = array(
                'fk_user_id' =>$_POST['id'],
                'uploadedby' => $_SESSION['userdata']['id'],
                'filename' => $file_name,
                'date_added' => $date
            );
            $this->MY_Model->insert(PREFIX . 'staffdocu', $data);
            $response['status'] = true;
        endif;
           
            $response['status'] = true;
        
        echo json_encode($response);
    }
}
