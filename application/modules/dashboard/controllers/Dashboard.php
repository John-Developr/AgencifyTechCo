<?php 

    class Dashboard extends MY_Controller{

        public function index(){
            $data['title'] = 'Dashboard';
            $data['all'] = $this->alluser();
            $data['contractor'] = $this->contractor();
            $data['agencies'] = $this->agencies();
            $data['coordinator'] = $this->coordinators();
            $this->_admin_loadpage_('dashboard', $data);
        }

        function alluser(){
            $params['select'] = '*';
            $params['where'] = array('type !=' => 0);
            $run_query['result'] = $this->MY_Model->getRows(PREFIX.'users', $params, 'count');
            return $run_query['result'];
        }

        function contractor(){
            $params['select'] = '*';
            $params['where'] = array('type' => 1);
            $run_query['result'] = $this->MY_Model->getRows(PREFIX.'users', $params, 'count');
            return $run_query['result'];
        }

        function agencies(){
            $params['select'] = '*';
            $params['where'] = array('type' => 2);
            $run_query['result'] = $this->MY_Model->getRows(PREFIX.'users', $params, 'count');
            return $run_query['result'];
        }

        function coordinators(){
            $params['select'] = '*';
            $params['where'] = array('type' => 3);
            $run_query['result'] = $this->MY_Model->getRows(PREFIX.'users', $params, 'count');
            return $run_query['result'];
        }
        
        public function view(){
            $id = $this->input->post('id');

            $set = array('status' => 1);
            $where = array('id' => $id);
            $run_query['update_view'] = $this->MY_Model->update(PREFIX.'notif', $set, $where);
            if($run_query['update_view']){
                $response['status'] = true;
				$response['count'] = $this->countnotif();
                $response['url_redirect'] = 'dashboard';
            }else{
                $response['status'] = false;
            }
            echo json_encode($response);
        }

        public function readall(){
            $set = array('status' => 1);
            $where = array('status' => 0); $run_query['update_view'] = $this->MY_Model->update(PREFIX.'notif', $set, $where);
            if($run_query['update_view']){
                $response['status'] = true;
				$response['count'] = $this->countnotif();
                $response['url_redirect'] = 'dashboard';
            }else{
                $response['status'] = false;
            }
            echo json_encode($response);
        }
        public function getEvents()
	{
		$params['select'] = '*';
		$params['where'] = array('isDeleted' => 1);
		$result = $this->MY_Model->getRows(PREFIX.'calendar', $params, 'obj');

		foreach ($result as $key => $val) 
		{
			$calendar[] = array(
				'id' 	=> $val->id, 
				'title' => $val->title, 
				'description' => trim($val->description), 
				'service_location' => $val->service_location,
				'start' => date_format( date_create($val->start_date) ,"Y-m-d"),
				'end' 	=> $val->end_date. "T23:59:00",
				'created_by' => $val->created_by,
				'color' => $val->color
				);
		}
        // echo '<pre>';
        // print_r($calendar);
        // exit;
		// $data = array();
		// $data['get_data'] = json_encode($calendar);
		// return $data['get_data'];
		echo json_encode($calendar);
	}

    public function startdate(){
        $params['select'] = array('COUNT("id") as count, MONTHNAME(start_date) as month_name');
        $params['where'] = array('YEAR(start_date)' => date("Y"));
        $params['group'] = array('YEAR(start_date), MONTH(start_date)');
        
        $result = $this->MY_Model->getRows(PREFIX.'calendar', $params,'obj');
        $data = [];

        foreach($result as $row){
            // $data['label'][] = $row->month_name;
            $data['data'][] = (int) $row->count;
        }

        echo json_encode($data);
    }

    public function enddate(){
        $params['select'] = array('COUNT("id") as count, MONTHNAME(end_date) as month_name');
        $params['where'] = array('YEAR(end_date)' => date("Y"));
        $params['group'] = array('YEAR(end_date), MONTH(end_date)');
        
        $result = $this->MY_Model->getRows(PREFIX.'calendar', $params,'obj');
        $data = [];

        foreach($result as $row){
            // $data['label'][] = $row->month_name;
            $data['data'][] = (int) $row->count;
        }

        echo json_encode($data);
    }
}