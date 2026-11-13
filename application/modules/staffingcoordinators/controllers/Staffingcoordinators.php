<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staffingcoordinators extends MY_Controller
{
    public function index()
    {
        $data['title'] = 'Staffing Coordinator Homepage';
        $this->_coordinator_loadpage_('index', $data);

        
    }

    public function getUserdetails(){
        $id = $_SESSION['id'];
        $params['select'] = '*';
        $params['where'] = array('fk_id' => $id);
        $run_query['result'] = $this->MY_Model->getRows(PREFIX.'userdata_facilities_staffing_coordinator', $params);
        return $run_query['result'];
    }

    public function getfilescontractors(){
        $params['data'] = $this->getUserdetails();
        $service_location = $params['data'][0]['service_location'];


		$params['select'] = '*';
        $params['where'] = array('service_location' => $service_location);
		$params['join'] =  array(PREFIX.'userdata_independent_contractors' => PREFIX.'userdata_independent_contractors.fk_id = '.PREFIX.'timesheets.fk_user_id');
		$result = $this->MY_Model->getRows(PREFIX.'timesheets', $params);

		echo json_encode($result);
		// return $result['query'];
	} 

    public function getfilestaffingagencies(){
        $params['data'] = $this->getUserdetails();
        $facility_location = $params['data'][0]['service_location'];


		$params['select'] = '*';
        $params['where'] = array('facility_location' => $facility_location);
		$params['join'] =  array(PREFIX.'userdata_staffing_agencies' => PREFIX.'userdata_staffing_agencies.fk_id = '.PREFIX.'timesheets.fk_user_id');
		$result = $this->MY_Model->getRows(PREFIX.'timesheets', $params);
		// return $result['query1'];

		echo json_encode($result);
	}

    
	public function listofdata($file_type)
	{
	    $params['data'] = $this->getUserdetails();
        $service_location = $params['data'][0]['service_location'];

	    $limit = $this->input->post('length');
		 $offset = $this->input->post('start');
		 $search = $this->input->post('search');
		 $order = $this->input->post('order');
		 $draw = $this->input->post('draw');
		 $select = PREFIX .'timesheets.*';
		 $column_order = array(PREFIX .'timesheets.fk_user_id');
 
		 $join = array(
			PREFIX.'userdata_independent_contractors' => PREFIX.'userdata_independent_contractors.fk_id = '.PREFIX.'timesheets.fk_user_id'
		 );
		 $where = array(
			PREFIX .'timesheets.upload_type' => $file_type,
            PREFIX .'userdata_independent_contractors.service_location' => $service_location
		);
 
		 $list = datatables(PREFIX . 'timesheets',$column_order, $select, $where, $join, $limit, $offset ,$search, $order);
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


		 return $output;
	}
    public function contractor_timesheet()
	{
      
		echo json_encode($this->listofdata(1));
	}
	public function contrator_documents()
	{
		echo json_encode($this->listofdata(0));
	}


    public function listofdata2($file_type)
	{
	    $params['data'] = $this->getUserdetails();
        $facility_location = $params['data'][0]['service_location'];

	    $limit = $this->input->post('length');
		 $offset = $this->input->post('start');
		 $search = $this->input->post('search');
		 $order = $this->input->post('order');
		 $draw = $this->input->post('draw');
		 $select = PREFIX .'timesheets.*';
		 $column_order = array(PREFIX .'timesheets.fk_user_id');
 
		 $join = array(
			PREFIX.'userdata_staffing_agencies' => PREFIX.'userdata_staffing_agencies.fk_id = '.PREFIX.'timesheets.fk_user_id'
		 );
		 $where = array(
			PREFIX .'timesheets.upload_type' => $file_type,
            PREFIX .'userdata_staffing_agencies.facility_location' => $facility_location
		);
 
		 $list = datatables(PREFIX . 'timesheets',$column_order, $select, $where, $join, $limit, $offset ,$search, $order);
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


		 return $output;
	}

    public function agency_timesheet()
	{
      
		echo json_encode($this->listofdata2(1));
	}
	public function agency_documents()
	{
		echo json_encode($this->listofdata2(0));
	}
}