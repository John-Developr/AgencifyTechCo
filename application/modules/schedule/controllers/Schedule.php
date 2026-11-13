<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends MY_Controller {
	public function index(){
        redirect(base_url('schedule/pending'));
	}
    public function pending(){
		$data['title'] = 'Pending Schedule';
		$data['pending'] = $this->fetch(0);
		$this->load_horizontal('pending', $data);
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
	public function decline(){
		$data['title'] = 'List of Schedule';
		$data['decline'] = $this->fetch(3);
		$this->load_horizontal('decline', $data);
	}
	// public function history(){
	// 	$data['title'] = 'List of Ongoing/History Schedule';
	// 	$data['ongoing'] = $this->fetch(1);
	// 	$data['history'] = $this->fetch(4);
	// 	$this->load_horizontal('schedule', $data);
	// }
}
?>
