<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contractors extends MY_Controller
{
    public function index()
    {
        $data['title'] = 'Independent Contractors';
        $data['all'] = $this->allusers();
        $data['activated'] = $this->activated();
        $data['deactivated'] = $this->deactivated();
        $this->_admin_loadpage_('index', $data);
    }


    public function displaydata()
    {
        
        $limit = $this->input->post('length');
		$offset = $this->input->post('start');
		$search = $this->input->post('search');
		$order = $this->input->post('order');
		$draw = $this->input->post('draw');
		$select = "a.fk_id,CONCAT(a.fname,' ',a.lname) as fullname, a.email, a.service_location,a.status,a.date_added, b.id,b.username,b.bu_password";
		$column_order = array('a.fk_id');

		$join = array(
			PREFIX . 'users as b' => 'b.id = a.fk_id'
		);
		$where = "";

		$list = datatables(PREFIX . 'userdata_independent_contractors as a',$column_order, $select, $where, $join, $limit, $offset ,$search, $order);
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


    public function addcontractors()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $type = 1;
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $service_location = $this->input->post('service_location');
        // $degree = $this->input->post('degree');
        $specialty = $this->input->post('specialty');
        $status = 0;

        $this->form_validation->set_error_delimiters(' <div class="col-md-12"><div class="error text-danger">', '</div></div>');
        $this->form_validation->set_rules('fname', 'First Name can\'t be empty, ', 'required');
        $this->form_validation->set_rules('lname', 'Last Name can\'t be empty,', 'required');
        $this->form_validation->set_rules('email', 'Email can\'t be empty,', 'required');
        $this->form_validation->set_rules('username', 'Username can\'t be empty,', 'required');
        $this->form_validation->set_rules('password', 'Password can\'t be empty,', 'required');

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
                    'fname' => $fname,
                    'lname' => $lname,
                    'email' => $email,
                    'phone' => $phone,
                    'service_location' => $service_location,
                    // 'degree' => $degree,
                    'specialty' => $specialty,
                    'status' => $status,
                    'date_added' => date('Y-m-d')
                );

                $result['data'] = $this->MY_Model->insert(PREFIX . 'userdata_independent_contractors', $query['userdata']);
                if ($result['data']) {
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
                            'uploadedby' => 1,
                            'filename' => $file_name,
                            'date_added' => $date
                        );
                        $this->MY_Model->insert(PREFIX . 'staffdocu', $data);
                        $result['status'] = true;
                    endif;
                    
                    $result['all'] = $this->allusers();
                    $result['active'] = $this->activated();
                    $result['icon'] = 'success';
                    $result['message'] = 'Contractor Added Successfully';
                    $result['status'] = true;
                }
            } else {
                
                $result['message'] = 'Error Occured';
                $result['status'] = false;
            }
        } else {
                
                $result['message'] = 'Please Input Data';
                $result['status'] = false;
        }

        json($result);
    }


    public function status()
    {
        $id = $this->input->post('FK_ID');

        $params['select'] = '*';
        $params['where'] = array('fk_id' => $id);

        $result['userdata'] = $this->MY_Model->getRows(PREFIX . 'userdata_independent_contractors', $params);

        if ($result['userdata'][0]['status'] == 0) {
            $set = array('status' => 1);
            $where = array('fk_id' => $result['userdata'][0]['fk_id']);

            $run_query['check_status'] = $this->MY_Model->update(PREFIX . 'userdata_independent_contractors', $set, $where);
            if ($run_query['check_status']) {
                $result['all'] = $this->allusers();
                $result['active'] = $this->activated();
                $result['inactive'] = $this->deactivated();
                $result['icon'] = 'success';
                $result['message'] = 'Contractor Deactivated Successfully';
                $result['status'] = true;
            }
        } else {
            $set = array('status' => 0);
            $where = array('fk_id' => $result['userdata'][0]['fk_id']);

            $run_query['check_status'] = $this->MY_Model->update(PREFIX . 'userdata_independent_contractors', $set, $where);
            if ($run_query['check_status']) {
                $result['all'] = $this->allusers();
                $result['active'] = $this->activated();
                $result['inactive'] = $this->deactivated();
                $result['icon'] = 'success';
                $result['message'] = 'Contractor Activated Successfully';
                $result['status'] = true;
            }
        }
        json($result);
    }

    public function contractordetails()
    {
        $id = $this->input->post('id');

        $data['select'] = array(
            PREFIX . 'userdata_independent_contractors.fk_id',
            PREFIX . 'userdata_independent_contractors.fname',
            PREFIX . 'userdata_independent_contractors.lname',
            'CONCAT(' . PREFIX . 'userdata_independent_contractors.fname', '" "', PREFIX . 'userdata_independent_contractors.lname) as fullname',
            PREFIX . 'userdata_independent_contractors.email',
            PREFIX . 'userdata_independent_contractors.phone',
            PREFIX . 'userdata_independent_contractors.service_location',
            // PREFIX . 'userdata_independent_contractors.degree',
            PREFIX . 'userdata_independent_contractors.specialty',
            PREFIX . 'users.username',
            PREFIX . 'users.bu_password'
        );
        $data['where'] = array(PREFIX . 'userdata_independent_contractors.fk_id' => $id);
        $data['join'] = array(PREFIX . 'users' => PREFIX . 'users.id = ' . PREFIX . 'userdata_independent_contractors.fk_id');
        $result = $this->MY_Model->getRows(PREFIX . 'userdata_independent_contractors', $data, 'row');

        //  echo '<pre>';
        // print_r($result);
        // echo'</pre>';
        // exit;
        json($result);
    }

    public function updatecontractor()
    {
        $id = $this->input->post('id');

        $where1 = array('fk_id' => $id);
        $where2 = array('id' => $id);

        $set1 = array(
            'fname' => $this->input->post('firstname'),
            'lname' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'service_location' => $this->input->post('service_location'),
            // 'degree' => $this->input->post('degree'),
            'specialty' => $this->input->post('specialty'),
        );

        $this->MY_Model->update(PREFIX . 'userdata_independent_contractors', $set1, $where1);
        //  echo '<pre>';
        // print_r($result);
        // echo'</pre>';
        // exit;
        $set2 = array(
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'bu_password' => $this->input->post('password')
        );
        $this->MY_Model->update(PREFIX . 'users', $set2, $where2);

        $result['icon'] = 'success';
        $result['message'] = 'Contractor Updated Successfully';
        $result['status'] = true;

        json($result);
    }

    public function allusers()
    {
        $params['select'] = '*';
        $params['where'] = array('type' => 1);
        $params['join'] = array(PREFIX . 'users' => PREFIX . 'users.id = ' . PREFIX . 'userdata_independent_contractors.fk_id');
        $query['all'] = $this->MY_Model->getRows(PREFIX . 'userdata_independent_contractors', $params, 'count');
        return $query['all'];
    }

    public function activated()
    {
        $params['select'] = '*';
        $params['where'] = array(PREFIX . 'users.type' => 1, PREFIX . 'userdata_independent_contractors.status' => 0);
        $params['join'] = array(PREFIX . 'users' => PREFIX . 'users.id = ' . PREFIX . 'userdata_independent_contractors.fk_id');
        $query['activate'] = $this->MY_Model->getRows(PREFIX . 'userdata_independent_contractors', $params, 'count');
        return $query['activate'];
    }
    public function deactivated()
    {
        $params['select'] = '*';
        $params['where'] = array(PREFIX . 'users.type' => 1, PREFIX . 'userdata_independent_contractors.status' => 1);
        $params['join'] = array(PREFIX . 'users' => PREFIX . 'users.id = ' . PREFIX . 'userdata_independent_contractors.fk_id');
        $query['inactive'] = $this->MY_Model->getRows(PREFIX . 'userdata_independent_contractors', $params, 'count');
        return $query['inactive'];
    }
}
