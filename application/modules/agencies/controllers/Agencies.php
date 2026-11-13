<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agencies extends MY_Controller
{
    public function index()
    {
        $data['title'] = 'Staffing Agencies';
        $data['all'] = $this->allusers();
        $data['activated'] = $this->activated();
        $data['deactivated'] = $this->deactivated();
        $this->_admin_loadpage_('index', $data);
    }

    public function listofdata()
    {
       
        $limit = $this->input->post('length');
		$offset = $this->input->post('start');
		$search = $this->input->post('search');
		$order = $this->input->post('order');
		$draw = $this->input->post('draw');
		$select = "a.fk_id,CONCAT(a.fname,' ',a.lname) as fullname, a.email, a.facility_location,a.status,a.date_added, b.id,b.username,b.bu_password";
		$column_order = array('a.fk_id');

		$join = array(
			PREFIX . 'users as b' => 'b.id = a.fk_id'
		);
		$where = "";

		$list = datatables(PREFIX . 'userdata_staffing_agencies as a',$column_order, $select, $where, $join, $limit, $offset ,$search, $order);
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

    public function addstaffingagencies()
    {
        $username = $this->input->post('username123');
        $password = $this->input->post('password123');
        $type = 2;
        $fname = $this->input->post('fname');
        // $lname = $this->input->post('lname');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $facility_location = $this->input->post('facility_location');
        $status = 0;

        $this->form_validation->set_error_delimiters(' <div class="col-md-12"><div class="error text-danger">', '</div></div>');
        $this->form_validation->set_rules('fname', 'First Name can\'t be empty, ', 'required');
        // $this->form_validation->set_rules('lname', 'Last Name can\'t be empty,', 'required');
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
                    'fname' => $fname,
                    // 'lname' => $lname,
                    'email' => $email,
                    'phone' => $phone,
                    'facility_location' => $facility_location,
                    'status' => $status,
                    'date_added' => date('Y-m-d')
                );

                $result['data'] = $this->MY_Model->insert(PREFIX . 'userdata_staffing_agencies', $query['userdata']);

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
                    $result['message'] = 'Staffing Agency Added Successfully';
                    $result['status'] = true;
                }
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

        $result['userdata'] = $this->MY_Model->getRows(PREFIX . 'userdata_staffing_agencies', $params);

        if ($result['userdata'][0]['status'] == 0) {
            $set = array('status' => 1);
            $where = array('fk_id' => $result['userdata'][0]['fk_id']);

            $run_query['check_status'] = $this->MY_Model->update(PREFIX . 'userdata_staffing_agencies', $set, $where);
            if ($run_query['check_status']) {
                $result['all'] = $this->allusers();
                $result['active'] = $this->activated();
                $result['inactive'] = $this->deactivated();
                $result['icon'] = 'success';
                $result['message'] = 'Staffing Agency Deactivated Successfully';
                $result['status'] = true;
            }
        } else {
            $set = array('status' => 0);
            $where = array('fk_id' => $result['userdata'][0]['fk_id']);

            $run_query['check_status'] = $this->MY_Model->update(PREFIX . 'userdata_staffing_agencies', $set, $where);
            if ($run_query['check_status']) {
                $result['all'] = $this->allusers();
                $result['active'] = $this->activated();
                $result['inactive'] = $this->deactivated();
                $result['icon'] = 'success';
                $result['message'] = 'Staffing Agency Activated Successfully';
                $result['status'] = true;
            }
        }
        json($result);
    }

    public function staffdetails()
    {
        $id = $this->input->post('id');

        $data['select'] = array(
            PREFIX . 'userdata_staffing_agencies.fk_id',
            PREFIX . 'userdata_staffing_agencies.fname',
            PREFIX . 'userdata_staffing_agencies.lname',
            'CONCAT(' . PREFIX . 'userdata_staffing_agencies.fname', '" "', PREFIX . 'userdata_staffing_agencies.lname) as fullname',
            PREFIX . 'userdata_staffing_agencies.email',
            PREFIX . 'userdata_staffing_agencies.phone',
            PREFIX . 'userdata_staffing_agencies.facility_location',
            PREFIX . 'userdata_staffing_agencies.job_title',
            PREFIX . 'userdata_staffing_agencies.organization',
            PREFIX . 'users.username',
            PREFIX . 'users.bu_password'
        );
        $data['where'] = array(PREFIX . 'userdata_staffing_agencies.fk_id' => $id);
        $data['join'] = array(PREFIX . 'users' => PREFIX . 'users.id = ' . PREFIX . 'userdata_staffing_agencies.fk_id');
        $result = $this->MY_Model->getRows(PREFIX . 'userdata_staffing_agencies', $data, 'row');

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
            'fname' => $this->input->post('up-fname'),
            // 'lname' => $this->input->post('up-lname'),
            'email' => $this->input->post('up-email'),
            'phone' => $this->input->post('up-phone'),
            'job_title' => $this->input->post('up-job'),
            'organization' => $this->input->post('up-org'),
            'facility_location' => $this->input->post('up-facility_location')
        );

        $this->MY_Model->update(PREFIX . 'userdata_staffing_agencies', $set1, $where1);
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
        $result['message'] = 'Staffing Agency Updated Successfully';
        $result['status'] = true;

        json($result);
    }

    public function allusers()
    {
        $params['select'] = '*';
        $params['where'] = array('type' => 2);
        $params['join'] = array(PREFIX . 'users' => PREFIX . 'users.id = ' . PREFIX . 'userdata_staffing_agencies.fk_id');
        $query['all'] = $this->MY_Model->getRows(PREFIX . 'userdata_staffing_agencies', $params, 'count');
        return $query['all'];
    }

    public function activated()
    {
        $params['select'] = '*';
        $params['where'] = array(PREFIX . 'users.type' => 2, PREFIX . 'userdata_staffing_agencies.status' => 0);
        $params['join'] = array(PREFIX . 'users' => PREFIX . 'users.id = ' . PREFIX . 'userdata_staffing_agencies.fk_id');
        $query['activate'] = $this->MY_Model->getRows(PREFIX . 'userdata_staffing_agencies', $params, 'count');
        return $query['activate'];
    }
    public function deactivated()
    {
        $params['select'] = '*';
        $params['where'] = array(PREFIX . 'users.type' => 2, PREFIX . 'userdata_staffing_agencies.status' => 1);
        $params['join'] = array(PREFIX . 'users' => PREFIX . 'users.id = ' . PREFIX . 'userdata_staffing_agencies.fk_id');
        $query['inactive'] = $this->MY_Model->getRows(PREFIX . 'userdata_staffing_agencies', $params, 'count');
        return $query['inactive'];
    }
}
