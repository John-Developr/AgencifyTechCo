<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Allusers extends MY_Controller
{
    public function index()
    {
        $data['title'] = 'Users';
        $this->_coordinator_loadpage_('index', $data);
    }

    public function icuserdetails(){
        $id = $this->input->post('id');

        $params['select'] = array(PREFIX.'userdata_independent_contractors.*','CONCAT('.PREFIX.'userdata_independent_contractors.fname', '" "', PREFIX.'userdata_independent_contractors.lname) as fullname',);
        $params['where'] = array('number_rows' => $id);
     //    $params['join'] = array(PREFIX.'userdata_independent_contractors' => PREFIX.'userdata_independent_contractors.fk_id = '.PREFIX.'users.id');

        $run_query = $this->MY_Model->getRows(PREFIX.'userdata_independent_contractors', $params, 'row');

        echo json_encode($run_query);
    }

    public function staffuserdetails(){
        $id = $this->input->post('id');

        $params['select'] = array(PREFIX.'userdata_staffing_agencies.*','CONCAT('.PREFIX.'userdata_staffing_agencies.fname', '" "', PREFIX.'userdata_staffing_agencies.lname) as fullname');
        $params['where'] = array('number_rows' => $id);
     //    $params['join'] = array(PREFIX.'userdata_staffing_agencies' => PREFIX.'userdata_staffing_agencies.fk_id = '.PREFIX.'users.id');

        $run_query = $this->MY_Model->getRows(PREFIX.'userdata_staffing_agencies', $params, 'row');

        echo json_encode($run_query);
    }

    public function independentContractors(){

	   $limit = $this->input->post('length');
        $offset = $this->input->post('start');
        $search = $this->input->post('search');
        $order = $this->input->post('order');
        $draw = $this->input->post('draw');
        $select = "a.number_rows,CONCAT(a.fname, '  ', a.lname) as fullname, a.email,a.phone,a.service_location,a.specialty,a.status,a.date_added,b.type";
        $column_order = array(
            'a.number_rows','a.fname','a.lname','a.email','a.phone','a.service_location','a.specialty','a.status','a.date_added','b.type'
        );

        $join = array('sp_users as b' =>'b.id = a.fk_id');
	   $where = "";

        $list = datatables('sp_userdata_independent_contractors as a',$column_order, $select, $where, $join, $limit, $offset ,$search, $order);
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
    echo json_encode ($output);
    }

    public function agencies(){
	$limit = $this->input->post('length');
	$offset = $this->input->post('start');
	$search = $this->input->post('search');
	$order = $this->input->post('order');
	$draw = $this->input->post('draw');
	$select = "a.number_rows,CONCAT(a.fname,' ',a.lname) as fullname, a.email,a.phone,a.job_title,a.organization,a.facility_location,a.status,a.date_added,b.type";
	$column_order = array(
	    'a.number_rows','a.fname','a.lname','a.email','a.phone','a.job_title','a.organization','a.facility_location','a.status','a.date_added','b.type'
	);

	$join = array('sp_users as b' =>'b.id = a.fk_id');
	$where = "";

	$list = datatables('sp_userdata_staffing_agencies as a',$column_order, $select, $where, $join, $limit, $offset ,$search, $order);
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
	//   echo '<pre>';
	//   print_r($output);
	//   exit;
 	echo json_encode ($output);
    }
}