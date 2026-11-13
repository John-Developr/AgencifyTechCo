<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coordinatorsched extends MY_Controller
{
	public function index()
	{
		$data['title'] = 'Timesheet';
		$data['location'] = $this->getUserdetails();
		$this->_coordinator_loadpage_('schedules', $data);
	}

	public function getUserdetails()
	{
		$id = $_SESSION['id'];
		$params['select'] = '*';
		$params['where'] = array('fk_id' => $id);
		$run_query = $this->MY_Model->getRows(PREFIX . 'userdata_facilities_staffing_coordinator', $params, 'row');
		return $run_query->service_location;
	}

	public function addSched()
	{
		$location = $this->getUserdetails();

		$title = $this->input->post('title');
		$shift_sched = $this->input->post('shift_sched');
		$time_start = $this->input->post('time_start');
		$time_end = $this->input->post('time_end');
		$start = $this->input->post('start');
		$end = $this->input->post('end');
		$service_location = $location;

		$this->form_validation->set_error_delimiters(' <div class="col-md-12"><div class="error text-danger">', '</div></div>');
		$this->form_validation->set_rules('title', 'Title can\'t be empty, ', 'required');
		$this->form_validation->set_rules('shift_sched', 'Shift Schedule can\'t be empty, ', 'required');
		$this->form_validation->set_rules('start', 'Start Date can\'t be empty,', 'required');
		$this->form_validation->set_rules('end', 'End Date can\'t be empty,', 'required');

		if ($this->form_validation->run() == TRUE) {
			$query['sched'] = array(
				'title' => $title,
				'shift_type' => $shift_sched,
				'service_location' => $service_location,
				'start_time' => $time_start,
				'end_time' => $time_end,
				'start_date' => $start,
				'end_date' => $end,
				'created_by' => $_SESSION['id'],
				'isDeleted' => 1,
				'create_at' => date('Y-m-d')
			);

			$run_query['calendar'] = $this->MY_Model->insert(PREFIX . 'calendar', $query['sched']);
			if ($run_query['calendar']) {

				$email = $this->fetchallemail1();
				$email2 = $this->fetchallemail2();
				$email3 = $this->fetchallemail3();
				$emails = array_merge($email, $email2, $email3);
				$to_emails = array_column($emails, 'email');
				$to_email = implode(',', $to_emails);

				$param['explode'] = explode('/', base_url());
				unset($param['explode'][3]);
				$param['home_url'] = implode('/', $param['explode']);
				$param['contact_us'] =  $param['home_url'] . 'healthcare-staffing-contact-us';

				$to_email = $to_emails;
				// $to_email = 'test@example.com'; pang test ra ni
				$from_name = 'Agencify Tech Co';
				$subject = 'Email Notification - New Work Schedule';
				$use_html_template = true;
				$message = "Test Only";

				$this->load->config('email'); //initialize config
				$this->load->library('email');
				$this->email->to($to_email);
				$this->email->set_mailtype("html");
				$this->email->set_newline("\r\n");
				!empty($cc) ? $this->email->cc($cc) : "";
				$this->email->from('noreply@proweaversend.com', $from_name);
				$this->email->subject($subject);
				$this->email->message($message);
				if ($use_html_template) {
					$messageData = array(
						'title' => $subject,
						'content' => $message,
						'contact_us' => $param['contact_us'],
					);
					// $message = $this->load->view('template/approvedemail', $messageData, true);
					$this->email->message($this->load->view('template/newsched', $messageData, true));

					if ($this->email->send()) {
						$result['icon'] = 'success';
						$result['message'] = 'Schedule Added Successfully';
						$result['status'] = true;
					} else {
						$result['icon'] = 'error';
						$result['message'] = 'Error Occured';
						$result['status'] = false;
						$this->email->message($message);
					}
					// End: Send Email
				}


				$result['icon'] = 'success';
				$result['message'] = 'Schedule Added Successfully';
				$result['status'] = true;
			} else {
				$result['icon'] = 'error';
				$result['message'] = 'Error Occured';
				$result['status'] = false;
			}
		} else {
			$result['icon'] = 'error';
			$result['status'] = false;
			// $result['message'] = validation_errors();
			$errors = array();
			foreach ($this->input->post() as $key => $val) {
				$errors[$key] = form_error($key);
			}
			$result['errors'] = array_filter($errors);
		}

		json($result);
	}

	public function updatesched()
	{
		$id = $this->input->post('up_id');

		$set = array(
			'title' => $this->input->post('up_title'),
			'shift_type' => $this->input->post('up_shift_sched'),
			'start_time' => $this->input->post('up_time_start'),
			'end_time' => $this->input->post('up_time_end'),
			'start_date' => $this->input->post('up_start'),
			'end_date' => $this->input->post('up_end'),
		);
		$where = array('id' => $id);
		$run_query['data'] = $this->MY_Model->update(PREFIX . 'calendar', $set, $where);

		if ($run_query['data']) {
			$result['icon'] = 'success';
			$result['message'] = 'Schedule Updated Successfully';
			$result['status'] = true;
		} else {
			$result['icon'] = 'error';
			$result['message'] = 'ERROR';
			$result['status'] = false;
		}

		// echo '<pre>';
		// print_r($id);
		// exit;
		json($result);
	}

	public function delete()
	{
		$id = $this->input->post('id');

		$set = array('isDeleted' => 0);
		$where = array('id' => $id);
		$run_query['update'] = $this->MY_Model->update(PREFIX . 'calendar', $set, $where);

		if ($run_query['update']) {
			$result['icon'] = 'success';
			$result['message'] = 'Schedule Deleted Successfully';
			$result['status'] = true;
		} else {
			$result['icon'] = 'error';
			$result['message'] = 'ERROR';
			$result['status'] = false;
		}


		json($result);
	}

	public function displaySchedules()
	{
		$service_location = $this->getUserdetails();
		$limit = $this->input->post('length');
		$offset = $this->input->post('start');
		$search = $this->input->post('search');
		$order = $this->input->post('order');
		$draw = $this->input->post('draw');
		$select = "*";
		$column_order = array('id');

		$join = array();
		$where = array('service_location' => $service_location, 'isDeleted' => 1);

		$list = datatables(PREFIX . 'calendar as a', $column_order, $select, $where, $join, $limit, $offset, $search, $order);
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

	public function scheduledetails()
	{
		$id = $this->input->post('id');

		$data['select'] = '*';
		$data['where'] = array(PREFIX . 'calendar.id' => $id);
		$result = $this->MY_Model->getRows(PREFIX . 'calendar', $data, 'row');
		echo json_encode($result);
	}
	public function fetchallemail1()
	{
		$params['select'] = 'b.email';
		$params['join'] = array(
			PREFIX . 'userdata_independent_contractors as b' => 'b.fk_id  = a.id',
		);
		return $this->MY_Model->getRows(PREFIX . 'users as a', $params);
	}
	public function fetchallemail2()
	{
		$params['select'] = 'c.email';
		$params['join'] = array(
			PREFIX . 'userdata_staffing_agencies as c' => 'c.fk_id = a.id'
		);
		return $this->MY_Model->getRows(PREFIX . 'users as a', $params);
	}
	
	public function fetchallemail3()
	{
		$params['select'] = 'email';

		return $this->MY_Model->getRows(PREFIX . 'staff', $params);
	}
}
