<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Workschedules extends MY_Controller
{
	public function index()
	{
		$data['title'] = 'Work Schedules';
		$this->_coordinator_loadpage_('index', $data);
	}
	public function getUserdetails(){
        $id = $_SESSION['id'];
        $params['select'] = '*';
        $params['where'] = array('fk_id' => $id);
        $run_query['result'] = $this->MY_Model->getRows(PREFIX.'userdata_facilities_staffing_coordinator', $params);
        return $run_query['result'];
    }

	public function contractorreq()
	{
		$limit = $this->input->post('length');
		$offset = $this->input->post('start');
		$search = $this->input->post('search');
		$order = $this->input->post('order');
		$draw = $this->input->post('draw');
		$select = "a.id,a.fk_user_id,a.fk_calendar_id, a.status,a.date_added,CONCAT(b.fname,' ',b.lname) as fullname,c.title,c.start_date,c.end_date";
		$column_order = array('a.id','a.fk_user_id','a.fk_calendar_id', 'a.status','a.date_added','c.title','c.start_date','c.end_date');

		$join = array(
			PREFIX . 'userdata_independent_contractors as b' => 'b.fk_id = a.fk_user_id',
			PREFIX . 'calendar as c ' => 'c.id = a.fk_calendar_id'
		);
		$where = "";

		$list = datatables(PREFIX . 'request_schedule as a',$column_order, $select, $where, $join, $limit, $offset ,$search, $order);
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

	public function agenciesreq()
	{
		$limit = $this->input->post('length');
		$offset = $this->input->post('start');
		$search = $this->input->post('search');
		$order = $this->input->post('order');
		$draw = $this->input->post('draw');
		$select = "a.id,a.fk_user_id,a.fk_calendar_id, a.status,a.date_added,CONCAT(b.fname,' ',b.lname) as fullname,c.title,c.start_date,c.end_date";
		$column_order = array('a.id','a.fk_user_id','a.fk_calendar_id', 'a.status','a.date_added','c.title','c.start_date','c.end_date');

		$join = array(
			PREFIX . 'userdata_staffing_agencies as b' => 'b.fk_id = a.fk_user_id',
			PREFIX . 'calendar as c ' => 'c.id = a.fk_calendar_id'
		);
		$where = "";

		$list = datatables(PREFIX . 'request_schedule as a',$column_order, $select, $where, $join, $limit, $offset ,$search, $order);
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

	public function inprogress()
	{
		$id = $this->input->post('status_id');

		$params['select'] = '*';
		$params['where'] = array('id' => $id);
		$run_query['result'] = $this->MY_Model->getRows(PREFIX . 'request_schedule', $params);

		if ($run_query['result'][0]['status'] != 1) {
			$set = array('status' => 1);
			$where = array('id' => $id);

			$this->MY_Model->update(PREFIX . 'request_schedule', $set, $where);
			$result['status'] = true;
			echo json_encode($result);
		}
	}

	public function approved()
	{
		$id = $this->input->post('status_id');

		$params['select'] = array(PREFIX . 'request_schedule.*', PREFIX . 'users.id', PREFIX . 'users.type');
		$params['where'] = array(PREFIX . 'request_schedule.id' => $id);
		$params['join'] = array(PREFIX . 'users' => PREFIX . 'users.id = ' . PREFIX . 'request_schedule.fk_user_id');
		$run_query['result'] = $this->MY_Model->getRows(PREFIX . 'request_schedule', $params);
		
		if ($run_query['result'][0]['type'] == 1) {
			$params['select'] =  array(PREFIX . 'request_schedule.*', PREFIX . 'userdata_independent_contractors.fk_id', PREFIX . 'userdata_independent_contractors.fname', PREFIX . 'userdata_independent_contractors.lname', PREFIX . 'userdata_independent_contractors.email', PREFIX . 'calendar.start_date', PREFIX . 'calendar.end_date', PREFIX . 'calendar.service_location', PREFIX . 'calendar.shift_type', PREFIX . 'calendar.start_time', PREFIX . 'calendar.end_time');
			$params['where'] = array(PREFIX . 'request_schedule.id' => $id);
			$params['join'] = array(
				PREFIX . 'userdata_independent_contractors' => PREFIX . 'userdata_independent_contractors.fk_id = ' . PREFIX . 'request_schedule.fk_user_id',
				PREFIX . 'calendar' => PREFIX . 'calendar.id = ' . PREFIX . 'request_schedule.fk_calendar_id'
			);
			$result['data'] = $this->MY_Model->getRows(PREFIX . 'request_schedule', $params);

			$name = $result['data'][0]['fname'];
			$surname = $result['data'][0]['lname'];
			$email = $result['data'][0]['email'];
			$shift_type = $result['data'][0]['shift_type'];
			$start_time = $result['data'][0]['start_time'];
			$end_time = $result['data'][0]['end_time'];
			$start = $result['data'][0]['start_date'];
			$end = $result['data'][0]['end_date'];
			$location = $result['data'][0]['service_location'];
			$type = 1;
			if ($result['data'][0]['status'] == 0 || $result['data'][0]['status'] == 3) {
				$set = array('status' => 2);
				$where = array('id' => $id);
				$this->MY_Model->update(PREFIX . 'request_schedule', $set, $where);

				$result['status'] = true;
				echo json_encode($result);
			}
		} else {
			$params['select'] =  array(PREFIX . 'request_schedule.*', PREFIX . 'userdata_staffing_agencies.fk_id', PREFIX . 'userdata_staffing_agencies.email', PREFIX . 'userdata_staffing_agencies.fname',PREFIX . 'userdata_staffing_agencies.lname', PREFIX . 'calendar.start_date', PREFIX . 'calendar.end_date', PREFIX . 'calendar.service_location', PREFIX . 'calendar.shift_type', PREFIX . 'calendar.start_time', PREFIX . 'calendar.end_time');
			$params['where'] = array(PREFIX . 'request_schedule.id' => $id);
			$params['join'] = array(
				PREFIX . 'userdata_staffing_agencies' => PREFIX . 'userdata_staffing_agencies.fk_id = ' . PREFIX . 'request_schedule.fk_user_id',
				PREFIX . 'calendar' => PREFIX . 'calendar.id = ' . PREFIX . 'request_schedule.fk_calendar_id'
			);
			$result['data'] = $this->MY_Model->getRows(PREFIX . 'request_schedule', $params);

			$name = $result['data'][0]['fname'];
			$surname = $result['data'][0]['lname'];
			$email = $result['data'][0]['email'];
			$shift_type = $result['data'][0]['shift_type'];
			$start_time = $result['data'][0]['start_time'];
			$end_time = $result['data'][0]['end_time'];
			$start = $result['data'][0]['start_date'];
			$end = $result['data'][0]['end_date'];
			$location = $result['data'][0]['service_location'];
			$type = 2;

			
			if ($result['data'][0]['status'] == 0 || $result['data'][0]['status'] == 3) {
				$set = array('status' => 2);
				$where = array('id' => $id);
				$this->MY_Model->update(PREFIX . 'request_schedule', $set, $where);

				$result['status'] = true;
				echo json_encode($result);
					
			}
		}
		// paras approved by
		$params['data'] = $this->getUserdetails();
        	$fname= $params['data'][0]['fname'];
		$lname= $params['data'][0]['lname'];
		
		// Send Email
		$status = "Approved";
		$result = $this->sendEmail($email,$name,$start,$end,$location,$surname,$fname,$lname,$type,$status,$shift_type,$start_time,$end_time);

		// for page notif
		$about = "New work schedule is approved";
		$sched_id = $id;
		$result2 = $this->notifAdmin($sched_id, $about);
		
	}	

	public function decline()
	{
		$id = $this->input->post('status_id');

		$params['select'] = array(PREFIX . 'request_schedule.*', PREFIX . 'users.id', PREFIX . 'users.type');
		$params['where'] = array(PREFIX . 'request_schedule.id' => $id);
		$params['join'] = array(PREFIX . 'users' => PREFIX . 'users.id = ' . PREFIX . 'request_schedule.fk_user_id');
		$run_query['result'] = $this->MY_Model->getRows(PREFIX . 'request_schedule', $params);

		if ($run_query['result'][0]['type'] == 1) {
			$params['select'] =  array(PREFIX . 'request_schedule.*', PREFIX . 'userdata_independent_contractors.fk_id', PREFIX . 'userdata_independent_contractors.fname',PREFIX . 'userdata_independent_contractors.lname', PREFIX . 'userdata_independent_contractors.email', PREFIX . 'calendar.start_date', PREFIX . 'calendar.end_date', PREFIX . 'calendar.service_location', PREFIX . 'calendar.shift_type', PREFIX . 'calendar.start_time', PREFIX . 'calendar.end_time');
			$params['where'] = array(PREFIX . 'request_schedule.id' => $id);
			$params['join'] = array(
				PREFIX . 'userdata_independent_contractors' => PREFIX . 'userdata_independent_contractors.fk_id = ' . PREFIX . 'request_schedule.fk_user_id',
				PREFIX . 'calendar' => PREFIX . 'calendar.id = ' . PREFIX . 'request_schedule.fk_calendar_id'
			);
			$result['data'] = $this->MY_Model->getRows(PREFIX . 'request_schedule', $params);

			$name = $result['data'][0]['fname'];
			$surname = $result['data'][0]['lname'];
			$email = $result['data'][0]['email'];
			$shift_type = $result['data'][0]['shift_type'];
			$start_time = $result['data'][0]['start_time'];
			$end_time = $result['data'][0]['end_time'];
			$start = $result['data'][0]['start_date'];
			$end = $result['data'][0]['end_date'];
			$location = $result['data'][0]['service_location'];
			$type  = 1;

			if ($result['data'][0]['status'] == 0 || $result['data'][0]['status'] == 2) {
				$set = array('status' => 3);
				$where = array('id' => $id);
				$this->MY_Model->update(PREFIX . 'request_schedule', $set, $where);

				$result['status'] = true;
				echo json_encode($result);
			}
		} else {
			$params['select'] =  array(PREFIX . 'request_schedule.*', PREFIX . 'userdata_staffing_agencies.fk_id', PREFIX . 'userdata_staffing_agencies.email', PREFIX . 'userdata_staffing_agencies.fname',PREFIX . 'userdata_staffing_agencies.lname', PREFIX . 'calendar.start_date', PREFIX . 'calendar.end_date', PREFIX . 'calendar.service_location', PREFIX . 'calendar.shift_type', PREFIX . 'calendar.start_time', PREFIX . 'calendar.end_time');
			$params['where'] = array(PREFIX . 'request_schedule.id' => $id);
			$params['join'] = array(
				PREFIX . 'userdata_staffing_agencies' => PREFIX . 'userdata_staffing_agencies.fk_id = ' . PREFIX . 'request_schedule.fk_user_id',
				PREFIX . 'calendar' => PREFIX . 'calendar.id = ' . PREFIX . 'request_schedule.fk_calendar_id'
			);
			$result['data'] = $this->MY_Model->getRows(PREFIX . 'request_schedule', $params);

			$name = $result['data'][0]['fname'];
			$surname = $result['data'][0]['lname'];
			$shift_type = $result['data'][0]['shift_type'];
			$start_time = $result['data'][0]['start_time'];
			$end_time = $result['data'][0]['end_time'];
			$email = $result['data'][0]['email'];
			$start = $result['data'][0]['start_date'];
			$end = $result['data'][0]['end_date'];
			$location = $result['data'][0]['service_location'];
			$type = 2;

			if ($result['data'][0]['status'] == 0 || $result['data'][0]['status'] == 2) {
				$set = array('status' => 3);
				$where = array('id' => $id);
				$this->MY_Model->update(PREFIX . 'request_schedule', $set, $where);

				$result['status'] = true;
				echo json_encode($result);
			}
		}

		$params['data'] = $this->getUserdetails();
        	$fname= $params['data'][0]['fname'];
		$lname= $params['data'][0]['lname'];
		
		// Send Email
		$status = "Declined";
		$result = $this->sendEmail($email,$name,$start,$end,$location,$surname,$fname,$lname,$type,$status,$shift_type,$start_time,$end_time);

		$about = "New work schedule is declined";
		$sched_id = $id;
		$result2 = $this->notifAdmin($sched_id, $about);

	}


	public function sendEmail($email,$name,$start,$end,$location,$surname,$fname,$lname,$type,$status,$shift_type,$start_time,$end_time){
		// Start: Send Email
		// name and surname - contractors/agencies || fname and lname - coordinator(ang nag approve)
		$param['explode'] = explode('/', base_url());
		unset($param['explode'][3]);
		$param['home_url'] = implode('/', $param['explode']);
		$param['contact_us'] =  $param['home_url'] . 'healthcare-staffing-contact-us';
		$to_email = $email;
		$from_name = 'Agencify Tech Co';
		$subject = 'Email Notification - Work Schedule' ;
		$use_html_template = true;
		$message = "";
		
		$this->load->config('email'); //initialize config
		$this->load->library('email');
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");
		$this->email->to($to_email);
		!empty($cc) ? $this->email->cc($cc) : "";
		$this->email->from('noreply@proweaversend.com', $from_name);
		$this->email->subject($subject);
		$this->email->message($message);
		if ($use_html_template) {
			$messageData = array(
				'title' => $subject,
				'content' => $message,
				'name' => $name,
				'shift_type' => $shift_type,
				'start_time' => $start_time,
				'end_time' => $end_time,
				'start_date' => $start,
				'end_date' => $end,
				'service_location' => $location,
				'status' => $status,
				'contact_us' => $param['contact_us'],
			);
			// $message = $this->load->view('template/approvedemail', $messageData, true);
			$this->email->message($this->load->view('template/approvedemail', $messageData, true));
			
			if($this->email->send()) {

				// Start: Para admin

				$param['explode'] = explode('/', base_url());
				unset($param['explode'][3]);
				$param['home_url'] = implode('/', $param['explode']);
				$param['contact_us'] =  $param['home_url'] . 'healthcare-staffing-contact-us';
				$to_email = ""; //gmail ni client
				$from_name = 'Agencify Tech Co';
				$subject = $type == 1 ? 'Email Notification - Contractor\'s Work Schedule' : 'Email Notification - Agencie\'s Work Schedule';
				$use_html_template = true;
				$cc = ""; 
				$message = "";
				
				$this->load->config('email'); //initialize config
				$this->load->library('email');
				$this->email->set_mailtype("html");
				$this->email->set_newline("\r\n");
				$this->email->to($to_email);
				!empty($cc) ? $this->email->cc($cc) : "";
				$this->email->from('noreply@proweaversend.com', $from_name);
				$this->email->subject($subject);
				$this->email->message($message);

				$messageData2 = array(
					'title' => $subject,
					'content' => $message,
					'name' => $name,
					'surname' => $surname,
					'start_date' => $start,
					'end_date' => $end,
					'service_location' => $location,
					'fname' => $fname,
					'lname' => $lname,
					'status' => $status,
				);
				$result = $this->email->message($this->load->view('template/adminnotif', $messageData2, true));
				$this->email->send();

				// End:
				$response['status'] = true;
			}
			
		} else {
			$this->email->message($message);
		}
		return $response;
		// End: Send Email
	}

	public function notifAdmin($sched_id, $about){
		$id = $_SESSION['id'];

		$query['add_notif'] = array(
			'fk_user_id' => $id,
			'fk_schedule_id' => $sched_id,
			'about' => $about,
			'status' => 0,
			'date_created' => date('Y-m-d')
		);
		return $this->MY_Model->insert(PREFIX.'notif', $query['add_notif']);
		// return $query['add_notif'];
	}
}


// public function status()
// 	{
// 		echo '<pre>';
// 		print_r($this->send_work_status($this->input->post('id')), $this->input->post('status')));
// 		exit;
// 		// $this->MY_Model->update(PREFIX . 'request_schedule', array('status' => $this->input->post('status')), array('id' => $this->input->post('id')));
// 		// $response['status'] = true;
// 		// echo json_encode($response);
// 	}

// 	public function send_work_status($_SCHED_ID, $_STATUS)
// 	{
// 		$query_event['select'] = array(PREFIX . 'request_schedule.*', PREFIX . 'users.id as person_id', PREFIX . 'users.type');
// 		$query_event['where'] = array(PREFIX . 'request_schedule.id' => $_SCHED_ID);
// 		$query_event['join'] = array(PREFIX . 'users' => PREFIX . 'users.id = ' . PREFIX . 'request_schedule.fk_user_id');
// 		$run_query['event_data'] = $this->MY_Model->getRows(PREFIX . 'request_schedule', $query_event);
// 		if(!empty($run_query['event_data'])){
// 			$db = $run_query['event_data'][0]['type'] == 1 ? 'userdata_independent_contractors':'userdata_staffing_agencies';
// 			$query_userdata['select'] = "";
// 			$query_userdata['where'] = array('fk_id' => $run_query['event_data'][0]['person_id']);
// 			$run_query['user_data'] = $this->MY_Model->getRows(PREFIX . $db, $query_userdata);
// 			if(!empty($run_query['user_data'])){
// 				// $send['users'] = $this->sendEmail($email, $name, $start, $end, $location, $surname, $fname, $lname, $type, $status);
// 				$send['users'] = $this->send_email($run_query['event_data'], $run_query['user_data'], $run_query['user_data']);
// 			}else{
// 				$response['status'] = false;
// 				$response['message'] = 'Failed to retrieve userdata.';
// 			}
// 		}else{
// 			$response['status'] = false;
// 			$response['message'] = 'Failed to retrieve event schedule.';
// 		}
// 	}

// 	public function send_email($_EVENDATA, $_USERDATA, $_COORDINATORDATA, $_STATS){
// 		$param['contact_us'] =  $this->contact_us();

// 		$to_email = $_USERDATA[0]['email'];
// 		$from_name = 'Agencify Tech Co';
// 		$subject = 'Email Notification - Work Schedule';
// 		$use_html_template = true;
// 		$message = "";

// 		$this->load->config('email'); //initialize config
// 		$this->load->library('email');
// 		$this->email->set_mailtype("html");
// 		$this->email->set_newline("\r\n");
// 		$this->email->to($to_email);
// 		!empty($cc) ? $this->email->cc($cc) : "";
// 		$this->email->from('noreply@proweaversend.com', $from_name);
// 		$this->email->subject($subject);
// 		$this->email->message($message);

// 		if ($use_html_template) {

// 		}else{
// 			$this->email->message($message);
// 		}

// 		return $response;
// 	}

// 	public function contact_us(){
// 		$param['explode'] = explode('/', base_url());
// 		unset($param['explode'][3]);
// 		$param['home_url'] = implode('/', $param['explode']);
// 		return  $param['home_url'] . 'healthcare-staffing-contact-us';
// 	}