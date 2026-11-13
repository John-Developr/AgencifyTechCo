<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	public function index(){
		$data['title'] = 'Home';
		$data['approved'] = $this->fetch(2);
		$this->load_horizontal('index', $data);
	}

	public function schedules(){
		$param['serialize_sched'] = array();
		$query['schedules']['select'] = '';
		$query['schedules']['order'] = 'start_date';
		$query['schedules']['where'] = array(
			'start_date >=' => date('Y-m-d'),
			'service_location' => $_POST['service_location'],
			'isDeleted' =>  1
		);
		$run_query['schedules'] = $this->MY_Model->getRows(PREFIX.'calendar', $query['schedules']);
		if(!empty($run_query['schedules'])){
			foreach($run_query['schedules'] as $key => $value):
				$query['request_sched']['select'] = '';
				$query['request_sched']['where'] = array('fk_user_id' => $_SESSION['userdata']['id'],'fk_calendar_id' => $run_query['schedules'][$key]['id'], 'status !=' => 3);
				$run_query['request_sched'] = $this->MY_Model->getRows(PREFIX.'request_schedule', $query['request_sched']);
				$run_query['schedules'][$key]['selected_stats'] = !empty($run_query['request_sched']) ? true : false;
				$run_query['schedules'][$key]['start_date'] = date("M d, Y", strtotime($value['start_date']));
				$run_query['schedules'][$key]['end_date'] = date("M d, Y", strtotime($value['end_date']));
				$run_query['schedules'][$key]['start_time'] = date("g:i A", strtotime($value['start_time']));
				$run_query['schedules'][$key]['end_time'] = date("g:i A", strtotime($value['end_time']));
				$param['serialize_sched'][$run_query['schedules'][$key]['start_date']][] = $run_query['schedules'][$key];
			endforeach;
		}
		echo json_encode($param['serialize_sched']);
	}

	public function fetch($_STATUS){
		$param['serialize_sched'] = array();
		$query['fetch_schedule']['select'] = '';
		$query['fetch_schedule']['order'] = PREFIX.'calendar.start_date DESC';
		$query['fetch_schedule']['where'] = array(PREFIX.'request_schedule.fk_user_id' => $_SESSION['userdata']['id'], PREFIX.'request_schedule.status' => $_STATUS);
		$query['fetch_schedule']['join'] = array(PREFIX.'calendar' => PREFIX.'calendar.id = '.PREFIX.'request_schedule.fk_calendar_id');
		$run_query['fetch_schedule'] = $this->MY_Model->getRows(PREFIX.'request_schedule', $query['fetch_schedule']);
		if(!empty($run_query['fetch_schedule'])){
			foreach($run_query['fetch_schedule'] as $key => $value):
				$run_query['fetch_schedule'][$key]['start_date'] = date("M d, Y", strtotime($value['start_date']));
				$run_query['fetch_schedule'][$key]['end_date'] = date("M d, Y", strtotime($value['end_date']));
				$run_query['fetch_schedule'][$key]['start_time'] = date("g:i A", strtotime($value['start_time']));
				$run_query['fetch_schedule'][$key]['end_time'] = date("g:i A", strtotime($value['end_time']));
				$param['serialize_sched'][$run_query['fetch_schedule'][$key]['start_date']][] = $run_query['fetch_schedule'][$key];
			endforeach;
		}
		return $param['serialize_sched'];
	}

	public function select(){
		$query['event_request'] = array(
			'fk_user_id' => $_SESSION['type'] == 1 ? $_SESSION['userdata']['id'] : $_POST['fk_user_id'],
			'fk_calendar_id' => $_POST['sched_id'],
			'status' => 0,
			'date_added' => date('Y-m-d')
		);
		if(!empty($query['event_request']['fk_user_id'])){
			$this->MY_Model->insert(PREFIX.'request_schedule', $query['event_request']);
			$response['status'] = true;
		}else{
			$response['status'] = false;
		}
		echo json_encode($response);
	}

	public function getStaff(){
		$title = $this->input->post('title');
		$params['select'] = "CONCAT(fname, ' ', lname) AS full_name, id as fk_user_id, title";
		$params['where'] = array('title' => $title);
		$result = $this->MY_Model->getRows(PREFIX.'staff',$params);

		echo json_encode($result);
	}
}
