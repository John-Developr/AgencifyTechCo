<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admintimesheet extends MY_Controller
{
	public function index()
	{
		$data['title'] = 'Documents';
		$data['allfiles'] = $this->countall();
		$data['contractors'] = $this->countcontractors();
		$data['agencies'] = $this->countagencies();
		$data['listStaffing'] = $this->listUsersStaffing(2);
		$data['listContractor'] = $this->listUsersStaffing(1);
		// $data['contractor_files'] = $this->getfilescontractors();
		// $data['agencies_files'] = $this->getfilestaffingagencies();
		$this->_admin_loadpage_('index', $data);
	}

	public function timesheet(){
		$data['title'] = 'Timesheet';
		$data['allfiles'] = $this->countall();
		$data['contractors'] = $this->countcontractors();
		$data['agencies'] = $this->countagencies();
		$data['listStaffing'] = $this->listUsersStaffing(2);
		$data['listContractor'] = $this->listUsersStaffing(1);
		$this->_admin_loadpage_('timesheets', $data);
	}

	public function getfilescontractors()
	{
		$params['select'] = '*';
		$params['join'] =  array(PREFIX . 'userdata_independent_contractors' => PREFIX . 'userdata_independent_contractors.fk_id = ' . PREFIX . 'timesheets.fk_user_id');
		$result = $this->MY_Model->getRows(PREFIX . 'timesheets', $params);

		echo json_encode($result);
		// return $result['query'];
	}

	public function getfilestaffingagencies()
	{
		$params['select'] = '*';
		$params['join'] =  array(PREFIX . 'userdata_staffing_agencies' => PREFIX . 'userdata_staffing_agencies.fk_id = ' . PREFIX . 'timesheets.fk_user_id');
		$result = $this->MY_Model->getRows(PREFIX . 'timesheets', $params);

		echo json_encode($result);
	}


	// public function searchresult(){
	// 	$params['select'] = '*';
	// 	$params['where'] =  array(PREFIX.'users.type' => $this->input->post('type'));
	// 	$params['join'] =  array(PREFIX.'users' => PREFIX.'users.id = '.PREFIX.'timesheets.fk_user_id');
	// 	$result['query2'] = $this->MY_Model->getRows(PREFIX.'timesheets', $params);

	// 	echo json_encode($result['query2'] );
	// } 

	public function countall()
	{
		$params['select'] = '*';
		$run_query['result'] = $this->MY_Model->getRows(PREFIX . 'timesheets', $params, 'count');
		return $run_query['result'];
	}

	public function countcontractors()
	{
		$params['select'] = '*';
		$params['join'] =  array(PREFIX . 'userdata_independent_contractors' => PREFIX . 'userdata_independent_contractors.fk_id = ' . PREFIX . 'timesheets.fk_user_id');
		$run_query['result'] = $this->MY_Model->getRows(PREFIX . 'timesheets', $params, 'count');
		return $run_query['result'];
	}

	public function countagencies()
	{
		$params['select'] = '*';
		$params['join'] =  array(PREFIX . 'userdata_staffing_agencies' => PREFIX . 'userdata_staffing_agencies.fk_id = ' . PREFIX . 'timesheets.fk_user_id');
		$run_query['result'] = $this->MY_Model->getRows(PREFIX . 'timesheets', $params, 'count');
		return $run_query['result'];
	}


	public function list($user_type, $_POSTDATA)
	{
		$limit = $this->input->post('length');
		$offset = $this->input->post('start');
		$search = $this->input->post('search');
		$order = $this->input->post('order');
		$draw = $this->input->post('draw');

		$type = $_POSTDATA['filterType'];

		$query['column_order'] = array();


		$query['select'] = PREFIX . 'timesheets.*, ' . PREFIX . 'users.type as user_type, ' . PREFIX . 'users.id as user_id';

		if ($type == "") {
			$query['where'] = array(PREFIX . 'timesheets.status' => 0, PREFIX . 'users.type' => $user_type, PREFIX . 'timesheets.upload_type' => 0);
		} else {
			$query['where'] = array(PREFIX . 'timesheets.status' => 0, PREFIX . 'timesheets.type' => $type, PREFIX . 'users.type' => $user_type, PREFIX . 'timesheets.upload_type' => 0);
		}

		$query['join'] = array(
			PREFIX . 'users' => PREFIX . 'users.id = ' . PREFIX . 'timesheets.fk_user_id'
		);

		$run_query = $this->MY_Model->get_datatables(PREFIX . 'timesheets', $query['column_order'], $query['select'], $query['where'], $query['join'], $limit, $offset, $search, $order, $query['group'] = array());

		$result = array(
			"draw" => $draw,
			"recordsTotal" => $run_query['count_all'],
			"recordsFiltered" => $run_query['count'],
			"data" => $run_query['data']
		);

		foreach ($run_query['data'] as $key => $value) {
			$query_fetchuser['select'] = "";
			$query_fetchuser['where'] =  array('fk_id' => $value->fk_user_id);
			$run_query['fetch_user'] = $this->MY_Model->getRows($user_type == 1 ? PREFIX . 'userdata_independent_contractors' : PREFIX . 'userdata_staffing_agencies', $query_fetchuser)[0];
			$run_query['data'][$key]->uploaded_by = $run_query['fetch_user']['fname'] . ' ' . $run_query['fetch_user']['lname'];
		}
		return $result;
	}

	public function contractor_list()
	{
		echo json_encode($this->list(1, $_POST));
	}
	public function staffing_list()
	{
		echo json_encode($this->list(2, $_POST));
	}

	public function listofdata($user_type)
	{
	   
	    $limit = $this->input->post('length');
		 $offset = $this->input->post('start');
		 $search = $this->input->post('search');
		 $order = $this->input->post('order');
		 $draw = $this->input->post('draw');
		 $select = 'a.*, b.type as user_type,b.id as user_id';
		 $column_order = array('a.fk_user_id');
 
		 $join = array(
			 PREFIX . 'users as b' => 'b.id = a.fk_user_id'
		 );
		 $where = array(
			'a.upload_type' => 1,
			'b.type' => $user_type
		);
 
		 $list = datatables(PREFIX . 'timesheets as a',$column_order, $select, $where, $join, $limit, $offset ,$search, $order);
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

		 foreach ($new_array as $key => $value) {
			$query_fetchuser['select'] = "";
			$query_fetchuser['where'] =  array('fk_id' => $value->fk_user_id);
			$run_query['fetch_user'] = $this->MY_Model->getRows($user_type == 1 ? PREFIX . 'userdata_independent_contractors' : PREFIX . 'userdata_staffing_agencies', $query_fetchuser)[0];
			$new_array[$key]->uploaded_by = $run_query['fetch_user']['fname'] . ' ' . $run_query['fetch_user']['lname'];
		}
		 return $output;
	}

	public function contractor_timesheet()
	{
		echo json_encode($this->listofdata(1));
	}
	public function staffing_timesheet()
	{
		echo json_encode($this->listofdata(2));
	}

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
	// public function listUsers()
	// {
	// 	$query['fetch_user']['select'] = "";
	// 	$query['fetch_user']['where'] = array('type' => 2, 'type' => 1);
	// 	$run_query['fetch_user'] = $this->MY_Model->getRows(PREFIX . 'users', $query['fetch_user']);

	// 	foreach ($run_query['fetch_user'] as $key => $value) :
	// 		$query['fetch_userdata']['select'] = "";
	// 		$query['fetch_userdata']['where'] = array('fk_id' => $value['id']);
	// 		$run_query['fetch_userdata'] = $this->MY_Model->getRows($value['type'] == 1 ? PREFIX . 'userdata_independent_contractors' : PREFIX . 'userdata_staffing_agencies', $query['fetch_userdata'])[0];
	// 		$run_query['fetch_user'][$key] = $run_query['fetch_userdata'];
	// 	endforeach;

	// 	return $run_query['fetch_user'];
	// }

	public function listUsersStaffing($type)
	{
		$query['fetch_userdata']['select'] = "";
		return $this->MY_Model->getRows($type == 1 ? PREFIX . 'userdata_independent_contractors' : PREFIX . 'userdata_staffing_agencies', $query['fetch_userdata']);
	}


	public function upload()
	{
		$file_type = $this->input->post('file_type');
		$user_id = $this->input->post('uploadTo');
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
				'uploadedby' => 1,
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
		
		$user_id = $this->input->post('uploadTo');
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
				'uploadedby' => 1,
				'filename' => $file_name,
				'upload_type' => 1,
				'date_added' => $date
			);
			$this->MY_Model->insert(PREFIX . 'timesheets', $data);
			$response['status'] = true;
		endif;

		echo json_encode($response);
	}
}
