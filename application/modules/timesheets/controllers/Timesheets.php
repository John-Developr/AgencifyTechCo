<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Timesheets extends MY_Controller
{
	public function index()
	{
		$data['title'] = 'Document';
		// $this->login_restriction(null);
		// $this->page_restriction('position', 'Admin', '/');
		// echo 'hello! '. user()->first_name;
		$this->load_horizontal('index', $data);
	}

	public function files(){
		$data['title'] = 'Document';
		$this->load_horizontal('documents', $data);
	}

	public function upload()
	{
		$file_type = $this->input->post('file_type');
		$user_id = $_SESSION['userdata']['id'];
		$date = date('Y-m-d');

		$config = array(
			"upload_path" => "./upload/timesheets/",
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
				'fk_user_id' => $user_id,
				'filename' => $file_name,
				'type' => $file_type,
				'upload_type' => 0,
				'date_added' => $date
			);
			$this->MY_Model->insert(PREFIX . 'timesheets', $data);
			$response['status'] = true;
		endif;

		echo json_encode($response);
	}


	public function uploadtimesheet()
	{
		$user_id = $_SESSION['userdata']['id'];
		$date = date('Y-m-d');

		$config = array(
			"upload_path" => "./upload/timesheets/",
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
				'fk_user_id' => $user_id,
				'filename' => $file_name,
				'upload_type' => 1,
				'date_added' => $date
			);
			$this->MY_Model->insert(PREFIX . 'timesheets', $data);
			$response['status'] = true;
		endif;

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

		$query['column_order'] = array(
			'UID',
			'profile',
			'full_name',
			'email',
			'status'
		);

		$query['select'] = '*';

		if ($type == "") {
			$query['where'] = array('status' => 0, 'fk_user_id' => $user_id,'upload_type' => 0);
		} else {
			$query['where'] = array('status' => 0, 'fk_user_id' => $user_id, 'type' => $type,'upload_type' => 0);
		}

		$query['join'] = array();
		$run_query = $this->MY_Model->get_datatables(PREFIX . 'timesheets', $query['column_order'], $query['select'], $query['where'], $query['join'], $limit, $offset, $search, $order, $query['group'] = array());

		$result = array(
			"draw" => $draw,
			"recordsTotal" => $run_query['count_all'],
			"recordsFiltered" => $run_query['count'],
			"data" => $run_query['data']
		);
		echo json_encode($result);
	}
	public function listofdata()
	{
	   
	    $limit = $this->input->post('length');
		 $offset = $this->input->post('start');
		 $search = $this->input->post('search');
		 $order = $this->input->post('order');
		 $draw = $this->input->post('draw');
		 $select = '*';
		 $column_order = array('fk_user_id');
 
		 $join = array();
		 $where = array(
			'status' => 0,
			'upload_type' => 1,
			'fk_user_id' => $_SESSION['userdata']['id']
		);
 
		 $list = datatables(PREFIX . 'timesheets ',$column_order, $select, $where, $join, $limit, $offset ,$search, $order);
		 $new_array = array();
		 foreach ($list['data'] as $key => $value) {
		 $new_array[] = $value;
		 }
		 $output = array(
		 "draw" => $draw,
		 "recordsTotal" => $list['count_all'],
		 "recordsFiltered" => $list['count'],
		 "data" => $new_array,
		 );
		 echo json_encode($output);
	}

	// public function drop(){
	// if(!empty($_FILES)):
	// 	$param['file_name'] = $_FILES['file']['name'];
	// 	$param['count_arr'] = count($param['file_name']);
	// 	for ($i = 0; $i < $param['count_arr']; $i++) {
	// 		$query['file_info'] = array('fk_user_id' => $_SESSION['userdata']['id'], 'date_added' => date('Y-m-d'));
	// 		$param['path'] =  $_SERVER['DOCUMENT_ROOT'].'/portal/upload/timesheets/';
	// 		$param['default_name'] = $param['file_name'][$i];
	// 		$param['file_path'] = $param['path'].$param['default_name'];
	// 		$param['temp_name'] = $_FILES['file']['tmp_name'][$i];
	// 		if(file_exists($param['file_path'])){
	// 			$param['default'] = 1;
	// 			$param['file_path_v2'] = $param['path'].'('.$param['default'].') '.$param['default_name'];
	// 			if(file_exists($param['file_path_v2'])){
	// 				$param['flag'] = true;
	// 				$param['count'] = 1;
	// 				while ($param['flag'] == true){
	// 					$param['count']++;
	// 					$param['count_path'] = $param['path'].'('.$param['count'].') '.$param['default_name'];
	// 					$param['check'] = file_exists($param['path'].'('.$param['count'].') '.$param['default_name']);
	// 					if($param['check']){
	// 						continue;
	// 					}else{
	// 						$query['file_info']['filename'] = '('.$param['count'].') '.$param['default_name'];
	// 						$this->MY_Model->insert(PREFIX.'timesheets', $query['file_info']);
	// 						move_uploaded_file($param['temp_name'], $param['count_path']);
	// 						$param['flag'] = false;
	// 					}
	// 				}
	// 			}else{
	// 				$query['file_info']['filename'] = '('.$param['default'].') '.$param['default_name'];
	// 				$this->MY_Model->insert(PREFIX.'timesheets', $query['file_info']);
	// 				move_uploaded_file($param['temp_name'], $param['file_path_v2']);
	// 			}
	// 		}else{
	// 			$query['file_info']['filename'] = $param['default_name'];
	// 			$this->MY_Model->insert(PREFIX.'timesheets', $query['file_info']);
	// 			move_uploaded_file($param['temp_name'], $param['file_path']);
	// 		}
	// 	}
	// endif;
	// $response['file_data'] = $this->file_data();
	// $response['status'] = true;
	// echo json_encode($response);
	// }
	// public function file_data(){
	// 	return $this->MY_Model->getRows(PREFIX.'timesheets', array('where' => array('fk_user_id' => $_SESSION['userdata']['id'], 'status' => 0)));
	// }
	public function remove()
	{
		$id = $this->input->post('id');

		$query['set'] = array('status' => 1);
		$query['where'] = array('id' => $id);

		$run_query = $this->MY_Model->update(PREFIX . 'timesheets', $query['set'], $query['where']);

		if ($run_query) {
			$response['status'] = true;
		}

		echo json_encode($response);
	}
}
