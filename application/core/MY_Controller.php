<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller {

	public $assets_ = array(
		'account' => array(
			'css' => array('account.css'),
			'js' => array('account.js'),
		),
		'dashboard' => array(
			'css' => array('dashboard.css'),
			'js' => array('dashboard.js'),
		),
		'home' => array(
			'css' => array('home.css'),
			'js' => array('home.js'),
		),
		'timesheets' => array(
			'css' => array('timesheets.css'),
			'js' => array('timesheets.js?v=1.0.1'),
		),
		'contractors' => array(
			'css' => array('contractors.css'),
			'js' => array('contractors.js'),
		),
		'profile' => array(
			'css' => array('profile.css'),
			'js' => array('profile.js'),
		),
		'agencies' => array(
			'css' => array('agencies.css'),
			'js' => array('agencies.js'),
		),
		'coordinators' => array(
			'css' => array('coordinators.css'),
			'js' => array('coordinators.js'),
		),
		'eventcalendar' => array(
			'css' => array('eventcalendar.css'),
			'js' => array('eventcalendar.js'),
		),
		'admintimesheet' => array(
			'css' => array('admintimesheet.css'),
			'js' => array('admintimesheet.js'),
		),
		'staffingcoordinators' => array(
			'css' => array('staffingcoordinators.css'),
			'js' => array('staffingcoordinators.js'),
		),
		'coordinatorsched' => array(
			'css' => array('coordinatorsched.css'),
			'js' => array('coordinatorsched.js'),
		),
		'allusers' => array(
			'css' => array('allusers.css'),
			'js' => array('allusers.js'),
		),
		'workschedules' => array(
			'css' => array('workschedules.css'),
			'js' => array('workschedules.js'),
		),
		'schedule' => array(
			'css' => array('schedule.css'),
			'js' => array('schedule.js'),
		),
		'staff' => array(
			'css' => array('staff.css'),
			'js' => array('staff.js'),
		)
	);

	public function __construct(){
		$route = $this->router->fetch_class();
		// $Staffing_construtor_Allowed_conroller = array("home", "timesheets", "schedule", "profile", "staff", "logout");
		// $Coordinator_Allowed_conroller = array("staffingcoordinators","coordinatorsched","allusers","workschedules", "profile", "logout");
		// $Admin_Allowed_conroller = array("dashboard","eventcalendar","contractors", "agencies", "coordinators", "admintimesheet", "logout");
		// if($route == "account"){
		// 	if(isset($_SESSION['logged_in'])):
		// 		redirect(base_url($_SESSION['userdata']['type'] == 0 ? 'dashboard' : ($_SESSION['userdata']['type'] == 3 ? 'staffingcoordinators' : 'home') ));
		// 	endif;
		// }else{
		// 	if(isset($_SESSION['logged_in'])){
		// 		if($_SESSION['userdata']['type'] == 0){
		// 			if(!in_array($route, $Admin_Allowed_conroller)):
		// 				redirect(base_url('404'));
		// 			endif;
		// 		}else if($_SESSION['userdata']['type'] == 3){
		// 			if(!in_array($route, $Coordinator_Allowed_conroller)):
		// 				redirect(base_url('404'));
		// 			endif;
		// 		}else{
		// 			if(!in_array($route, $Staffing_construtor_Allowed_conroller)):
		// 				redirect(base_url('404'));
		// 			endif;
		// 		}
		// 	}else{
		// 		redirect(base_url('account'));
		// 	}
		// }
	}

	// public function load_adminwrap_page($page, $data = array()){
	// 	$data['__assets__'] = $this->assets_;
    //   	$this->load->view('includes/admin_wrap/header',$data);
    //   	$this->load->view($page,$data);
    //   	$this->load->view('includes/admin_wrap/footer',$data);
    // }

	public function _admin_loadpage_($page, $data = array()){
		$data['__assets__'] = $this->assets_;
		$data['countnotifi'] = $this->countnotif();
		$data['notications'] = $this->noticationinfo();
		$this->load->view('includes/admin/head', $data);
		$this->load->view('includes/admin/navigation', $data);
		$this->load->view($page, $data);
		$this->load->view('includes/admin/footer', $data);
    }

	public function _coordinator_loadpage_($page, $data = array()){
		$data['__assets__'] = $this->assets_;
		$data['userdata'] = $this->userdata($_SESSION['userdata']);
		$data['method'] = $this->router->fetch_method();
		$data['module_name'] = $this->current_class = $this->router->fetch_class();
		$data['service_location'] = $this->getservicelocation();
		$data['facility_name'] = $this->getfacilityname();
      	$this->load->view('includes/coordinators/head',$data);
      	$this->load->view('includes/coordinators/navigation',$data);
      	$this->load->view($page,$data);
      	$this->load->view('includes/coordinators/footer',$data);
    }

	public function _lrf_view_includes($page, $data = array())
	{
		$data['__assets__'] = $this->assets_;
		$this->load->view('includes/account/login_head', $data);
		$this->load->view($page, $data);
		$this->load->view('includes/account/login_footer', $data);
	}
	// public function load_adminwrap_login($page, $data = array()){
	// 	$data['__assets__'] = $this->assets_;
    //   	$this->load->view('includes/admin_wrap/login_header',$data);
    //   	$this->load->view($page,$data);
    //   	$this->load->view('includes/admin_wrap/login_footer',$data);
    // }
	public function userdata($userdata){
		$db['database_name'] = ($userdata['type'] == 1) ? PREFIX . 'userdata_independent_contractors' : (($userdata['type'] == 2)  ? PREFIX . 'userdata_staffing_agencies' : PREFIX . 'userdata_facilities_staffing_coordinator');
		$query['userinfo']['where'] = array(PREFIX.'users.id'=> $userdata['id'] );
		$query['userinfo']['join'] = array($db['database_name'] => $db['database_name'].'.fk_id = '.PREFIX.'users.id');
		$run_query['check_userdata'] = $this->MY_Model->getRows(PREFIX.'users', $query['userinfo']);
		return $run_query['check_userdata'];
	}
	public function load_horizontal($page, $data = array()){
		$data['__assets__'] = $this->assets_;
		$data['userdata'] = $this->userdata($_SESSION['userdata']);
		$data['method'] = $this->router->fetch_method();
		$data['module_name'] = $this->current_class = $this->router->fetch_class();
      	$this->load->view('includes/horizontal/head',$data);
      	$this->load->view('includes/horizontal/navigation',$data);
      	$this->load->view($page,$data);
      	$this->load->view('includes/horizontal/footer',$data);
    }

	public function load_wp_page($page,$data = array()){
		$data['isCIPage'] = true;
		$data['base_url'] = base_url();
		$this->load->view('../../../../../wp-systcon/wp-load.php');
		$this->load->view('../../../../../wp-content/themes/agencifytechis171/includes/head',$data);
		$this->load->view('../../../../../wp-content/themes/agencifytechis171/includes/header');
		$this->load->view('../../../../../wp-content/themes/agencifytechis171/includes/nav');
		$this->load->view('../../../../../wp-content/themes/agencifytechis171/includes/banner',$data);
		// $this->load->view('includes/wp-head',$data);
		$this->load->view($page,$data);
		// $this->load->view('includes/wp-footer',$data);
		$this->load->view('../../../../../wp-content/themes/agencifytechis171/includes/footer',$data);
	}

	protected function generate_num($strength = 4) {
        $permitted_chars = '0123456789';
        $input_length = strlen($permitted_chars);
        $random_string = '';
        for ($i = 0; $i < $strength; $i++) {
            $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
	}

	protected function generate_code($strength = 20) {
        $permitted_chars = '012345-6789abc-defghijklmnopqrstu-vwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-';
        $input_length = strlen($permitted_chars);
        $random_string = '';
        for ($i = 0; $i < $strength; $i++) {
            $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return strtolower($random_string);
	}

	public function set_rules_from_post($data, $unrequired_fields=array()){
		$email = '';
		$uname = '';
		if (isset($_POST['email_address'])) {
			if (isset($_POST['orig_email_address'])) {
				$email = ($_POST['orig_email_address'] != $_POST['email_address'])?'|is_unique[ecl_users.email_address]':'';
			}else{
				$email = '|is_unique[ecl_users.email_address]';
			}
		}
		if (isset($_POST['username'])) {
			if (isset($_POST['orig_username'])) {
				$uname = ($_POST['orig_username'] != $_POST['username'])?'|is_unique[ecl_users.username]':'';
			}else{
				$uname = '|is_unique[ecl_users.username]';
			}
		}
		foreach ($data as $key => $value) {
			if(!empty($unrequired_fields) && in_array($key, $unrequired_fields)) continue;
			$this->form_validation->set_rules($key, ucfirst(str_replace('_', ' ', $key)), 'trim|required', array('required' => '{field} is required'));
			if($key == 'username'){
				$rule = $this->form_validation->set_rules($key, 'Username', 'trim|required'.$uname, array('is_unique' => 'The Username already exists.'));
				$rule;
			}
			if($key == 'email_address'){
				$rule = $this->form_validation->set_rules($key, 'Email Address', 'trim|required|valid_email'.$email, array('valid_email' => 'Please provide a valid {field}','is_unique' => 'The Email Address already exists.'));
				$rule;
			}
			if ($key == 'confirm_password') {
				$rule = $this->form_validation->set_rules($key, 'Password Confirmation', 'trim|required|matches[password]');
				$rule;
			}
		}
	}

	public function countnotif(){
		$params['select'] = '*';
		$params['where'] = array('status' => 0);
		$run_query['notif_count'] = $this->MY_Model->getRows(PREFIX.'notif', $params,'count');
		
		return $run_query['notif_count'];
	}
	public function noticationinfo(){
		$params['where'] = array('status' => 0);
		$params['order'] = 'id desc';
		$run_query['notif_info'] = $this->MY_Model->getRows(PREFIX.'notif', $params);
		return $run_query['notif_info'];
	}

	public function getservicelocation(){
		$id = $_SESSION['id'];
		$params['select'] = '*';
		$params['where'] = array('fk_id' => $id);
		$run_query = $this->MY_Model->getRows(PREFIX.'userdata_facilities_staffing_coordinator', $params, 'row');
		return $run_query->service_location;
	  
	 }

	 public function getfacilityname(){
		$id = $_SESSION['id'];
		$params['select'] = '*';
		$params['where'] = array('fk_id' => $id);
		$run_query = $this->MY_Model->getRows(PREFIX.'userdata_facilities_staffing_coordinator', $params, 'row');
		return $run_query->facility_name;
	  
	 }

	 
}
