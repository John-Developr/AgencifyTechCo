<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coordinators extends MY_Controller
{
    public function index()
    {
        $data['title'] = 'Staffing Coordinators';
        $data['all'] = $this->allusers();
        $data['activated'] = $this->activated();
        $data['deactivated'] = $this->deactivated();
        $this->_admin_loadpage_('index', $data);
    }

    public function listofcoordinators()
    {
         $limit = $this->input->post('length');
		$offset = $this->input->post('start');
		$search = $this->input->post('search');
		$order = $this->input->post('order');
		$draw = $this->input->post('draw');
		$select = "a.fk_id,CONCAT(a.fname,' ',a.lname) as fullname, a.email, a.title, a.service_location,a.status,a.date_added,a.facility_name, b.id,b.username,b.bu_password";
		$column_order = array('a.fk_id');

		$join = array(
			PREFIX . 'users as b' => 'b.id = a.fk_id'
		);
		$where = "";

		$list = datatables(PREFIX . 'userdata_facilities_staffing_coordinator as a',$column_order, $select, $where, $join, $limit, $offset ,$search, $order);
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

        // echo '<pre>';
        // print_r($output);
        // exit;
        echo json_encode($output);
        
    }

    public function addcoordinators()
    {
        $username = $this->input->post('username123');
        $password = $this->input->post('password123');
        $type = 3;
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $facility_name = $this->input->post('fac_name');
        $service_location = $this->input->post('service_location');
        $status = 0;

        $this->form_validation->set_error_delimiters(' <div class="col-md-12"><div class="error text-danger">', '</div></div>');
        $this->form_validation->set_rules('fac_name', 'Facility Name can\'t be empty, ', 'required');
        $this->form_validation->set_rules('fname', 'First Name can\'t be empty, ', 'required');
        $this->form_validation->set_rules('lname', 'Last Name can\'t be empty,', 'required');
        $this->form_validation->set_rules('email', 'Email can\'t be empty,', 'required');
        $this->form_validation->set_rules('username123', 'Username can\'t be empty,', 'required');
        $this->form_validation->set_rules('password123', 'Password can\'t be empty,', 'required');

        if ($this->form_validation->run() == TRUE) {

            $query['user'] = array(
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'bu_password' => $password,
                'type' => $type
            );
            $run_query['user'] = $this->MY_Model->insert(PREFIX . 'users', $query['user']);

            if ($run_query['user']) {
                $params['where'] = array('username' => $username);
                $run_query['userdata'] = $this->MY_Model->getRows(PREFIX . 'users', $params, 'row');

                $query['userdata'] = array(
                    'fk_id' => $run_query['userdata']->id,
                    'facility_name' => $facility_name,
                    'fname' => $fname,
                    'lname' => $lname,
                    'email' => $email,
                    'phone' => $phone,
                    'service_location' => $service_location,
                    'status' => $status,
                    'date_added' => date('Y-m-d')
                );

                $result['data'] = $this->MY_Model->insert(PREFIX . 'userdata_facilities_staffing_coordinator', $query['userdata']);
                if ($result['data']) {
                    $result['all'] = $this->allusers();
                    $result['active'] = $this->activated();
                    $result['icon'] = 'success';
                    $result['message'] = 'Staffing Coordinator Added Successfully';
                    $result['status'] = true;
                }
            } else {
                $result['icon'] = 'error';
                $result['message'] = 'Error Occured';
                $result['status'] = false;
            }
        } else {

            $result['message'] = 'Please Input Data';
            $result['status'] = false;
        }
        json($result);
    }

    public function updatestatus()
    {
        $id = $this->input->post('FK_ID');

        $params['select'] = '*';
        $params['where'] = array('fk_id' => $id);

        $result['userdata'] = $this->MY_Model->getRows(PREFIX . 'userdata_facilities_staffing_coordinator', $params);

        if ($result['userdata'][0]['status'] == 0) {
            $set = array('status' => 1);
            $where = array('fk_id' => $result['userdata'][0]['fk_id']);

            $run_query['check_status'] = $this->MY_Model->update(PREFIX . 'userdata_facilities_staffing_coordinator', $set, $where);
            if ($run_query['check_status']) {
                $result['all'] = $this->allusers();
                $result['active'] = $this->activated();
                $result['inactive'] = $this->deactivated();
                $result['icon'] = 'success';
                $result['message'] = 'Staffing Agency Deactivated Successfully';
                $result['status'] = true;
            } else {
                $result['status'] = false;
            }
        } else {
            $set = array('status' => 0);
            $where = array('fk_id' => $result['userdata'][0]['fk_id']);

            $run_query['check_status'] = $this->MY_Model->update(PREFIX . 'userdata_facilities_staffing_coordinator', $set, $where);
            if ($run_query['check_status']) {
                $result['all'] = $this->allusers();
                $result['active'] = $this->activated();
                $result['inactive'] = $this->deactivated();
                $result['icon'] = 'success';
                $result['message'] = 'Staffing Agency Activated Successfully';
                $result['status'] = true;
            }
        }
        echo json_encode($result);
    }

    public function coordinatordetails()
    {
        $id = $this->input->post('id');

        $data['select'] = array(
            PREFIX . 'userdata_facilities_staffing_coordinator.*',
            // PREFIX . 'userdata_facilities_staffing_coordinator.fname',
            // PREFIX . 'userdata_facilities_staffing_coordinator.lname',
            'CONCAT(' . PREFIX . 'userdata_facilities_staffing_coordinator.fname', '" "', PREFIX . 'userdata_facilities_staffing_coordinator.lname) as fullname',
            // PREFIX . 'userdata_facilities_staffing_coordinator.title',
            // PREFIX . 'userdata_facilities_staffing_coordinator.email',
            // PREFIX . 'userdata_facilities_staffing_coordinator.phone',
            // PREFIX . 'userdata_facilities_staffing_coordinator.service_location',
            PREFIX . 'users.username',
            PREFIX . 'users.bu_password'
        );
        $data['where'] = array(PREFIX . 'userdata_facilities_staffing_coordinator.fk_id' => $id);
        $data['join'] = array(PREFIX . 'users' => PREFIX . 'users.id = ' . PREFIX . 'userdata_facilities_staffing_coordinator.fk_id');
        $result = $this->MY_Model->getRows(PREFIX . 'userdata_facilities_staffing_coordinator', $data, 'row');

        //  echo '<pre>';
        // print_r($result);
        // echo'</pre>';
        // exit;
        json($result);
    }

    public function updateuserdetails()
    {
        $id = $this->input->post('id');

        $where1 = array('fk_id' => $id);
        $where2 = array('id' => $id);

        $set1 = array(
            'facility_name' => $this->input->post('up_fac_name'),
            'fname' => $this->input->post('up-fname'),
            'lname' => $this->input->post('up-lname'),
            'email' => $this->input->post('up-email'),
            'phone' => $this->input->post('up-phone'),
            'service_location' => $this->input->post('service_location'),
        );

        $this->MY_Model->update(PREFIX . 'userdata_facilities_staffing_coordinator', $set1, $where1);
        //  echo '<pre>';
        // print_r($result);
        // echo'</pre>';
        // exit;
        $set2 = array(
            'username' => $this->input->post('up-username'),
            'password' => password_hash($this->input->post('up-password'), PASSWORD_DEFAULT),
            'bu_password' => $this->input->post('up-password')
        );
        $this->MY_Model->update(PREFIX . 'users', $set2, $where2);

        $result['icon'] = 'success';
        $result['message'] = 'Coordinator Updated Successfully';
        $result['status'] = true;

        json($result);
    }

    public function allusers()
    {
        $params['select'] = '*';
        $params['where'] = array('type' => 3);
        $params['join'] = array(PREFIX . 'users' => PREFIX . 'users.id = ' . PREFIX . 'userdata_facilities_staffing_coordinator.fk_id');
        $query['all'] = $this->MY_Model->getRows(PREFIX . 'userdata_facilities_staffing_coordinator', $params, 'count');
        return $query['all'];
    }

    public function activated()
    {
        $params['select'] = '*';
        $params['where'] = array(PREFIX . 'users.type' => 3, PREFIX . 'userdata_facilities_staffing_coordinator.status' => 0);
        $params['join'] = array(PREFIX . 'users' => PREFIX . 'users.id = ' . PREFIX . 'userdata_facilities_staffing_coordinator.fk_id');
        $query['activate'] = $this->MY_Model->getRows(PREFIX . 'userdata_facilities_staffing_coordinator', $params, 'count');
        return $query['activate'];
    }
    public function deactivated()
    {
        $params['select'] = '*';
        $params['where'] = array(PREFIX . 'users.type' => 3, PREFIX . 'userdata_facilities_staffing_coordinator.status' => 1);
        $params['join'] = array(PREFIX . 'users' => PREFIX . 'users.id = ' . PREFIX . 'userdata_facilities_staffing_coordinator.fk_id');
        $query['inactive'] = $this->MY_Model->getRows(PREFIX . 'userdata_facilities_staffing_coordinator', $params, 'count');
        return $query['inactive'];
    }
}
