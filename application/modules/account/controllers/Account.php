<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller {
	public function index(){
		$data['title'] = 'Login';
		$this->_lrf_view_includes('login', $data);
	}
    public function login(){
		$data['title'] = 'Login';
		$this->_lrf_view_includes('login', $data);
	}
    public function register(){
        $data['title'] = 'Register';
		$this->_lrf_view_includes('register', $data);
    }
    public function forgetpassword(){
        $data['title'] = 'Forget Password';
		$this->_lrf_view_includes('forgetpassword', $data);
    }
    public function register_data(){
        $_POST['user']['bu_password'] = $_POST['user']['password'];
        $_POST['user']['password'] =  password_hash($_POST['user']['bu_password'], PASSWORD_DEFAULT);
        $_POST['user']['type'] = $_POST['type'];
        $_POST['userdata']['date_added'] = date('Y-m-d');
        if($_POST['g-recaptcha-response'] == ""){
            $reponse['msg'] = 'ERROR, reCAPTCHA not verified.';
            $reponse['status'] = false;
        }else{
            if($this->validateEmail($_POST['user']['username'])){
                $reponse['msg'] = 'ERROR, Username already exist, please try another one.';
                $reponse['status'] = false;
            }else{
                $_POST['userdata']['fk_id'] = $this->MY_Model->insert(PREFIX . 'users', $_POST['user']);
                $this->MY_Model->insert(($_POST['type'] == 1) ? PREFIX . 'userdata_independent_contractors' : (($_POST['type'] == 2)  ? PREFIX . 'userdata_staffing_agencies' : PREFIX . 'userdata_facilities_staffing_coordinator'), $_POST['userdata']);
                
                $query['check_username']['where'] = array('id' => $_POST['userdata']['fk_id']);
		        $run_query['check_username'] = $this->MY_Model->getRows(PREFIX . 'users', $query['check_username']);

                $session['session_data'] = array('id' => $run_query['check_username'][0]['id'],'type' => $run_query['check_username'][0]['type']);
                $session['set_session'] = array('logged_in' => true,'userdata'	=> $session['session_data']);

                $this->session->set_userdata($session['session_data']);
                $this->session->set_userdata($session['set_session']);

                $reponse['type'] = $run_query['check_username'][0]['type'];
                $reponse['status'] = true;
            }
        }
        echo json_encode($reponse);
    }
    public function validateEmail($_USERNAME){
		$query['where'] = array('username' => $_USERNAME);
		$run_query['check_username'] = $this->MY_Model->getRows(PREFIX . 'users', $query);
		if (!empty($run_query['check_username'])) {
			$result['status'] = true;
		} else {
			$result['status'] = false;
		}
		return $result['status'];
	}
    public function auth(){
		$query['check_username']['where'] = array('username' => $_POST['username']);
		$run_query['check_username'] = $this->MY_Model->getRows(PREFIX . 'users', $query['check_username']);
		if (!empty($run_query['check_username'])) {
			if (password_verify($_POST['password'], $run_query['check_username'][0]['password'])) {
				$query['check_userdata']['where'] = array('fk_id' => $run_query['check_username'][0]['id'], 'status' => 0);
				$run_query['check_userdata'] = $this->MY_Model->getRows(($run_query['check_username'][0]['type'] == 1) ? PREFIX . 'userdata_independent_contractors' : (($run_query['check_username'][0]['type'] == 2)  ? PREFIX . 'userdata_staffing_agencies' : PREFIX . 'userdata_facilities_staffing_coordinator'), $query['check_userdata']);
                $session['session_data'] = array('id' => $run_query['check_username'][0]['id'],'type' => $run_query['check_username'][0]['type']);
                $session['set_session'] = array('logged_in' => true,'userdata'	=> $session['session_data']);
                $result['type'] = $run_query['check_username'][0]['type'];
                if($run_query['check_username'][0]['type'] == 0){
                    $result['status'] = true;
                    $this->session->set_userdata($session['session_data']);
                    $this->session->set_userdata($session['set_session']);
                }else{
                    if (!empty($run_query['check_userdata'])) {
                        $result['status'] = true;
                        $this->session->set_userdata($session['session_data']);
                        $this->session->set_userdata($session['set_session']);
                    } else {
                        $result['msg'] = "ERROR, Your Account has been deactivated.";
                        $result['status'] = false;
                    }
                }
			} else {
                $result['msg'] = "ERROR, Invalid Username/Password.";
				$result['status'] = false;
			}
		} else {
            $result['msg'] = "ERROR, Invalid Username/Password.";
			$result['status'] = false;
		}
		echo json_encode($result);
	}
    public function requestchangepass()
	{
       if(empty($_POST['email'])){
            $response['status'] = false;
            $response['message'] = 'ERROR, Please fill up the form';
       }else{
            $query['check_email']['where'] = $_POST;
            $run_query['check_email'] = $this->MY_Model->getRows(PREFIX.'userdata_facilities_staffing_coordinator',  $query['check_email']);
            if(!empty($run_query['check_email'])){
                $response = $this->sentEmail($_POST['email'],  $run_query['check_email'][0]['fk_id']);
            }else{
                $run_query['check_email'] = $this->MY_Model->getRows(PREFIX.'userdata_independent_contractors',  $query['check_email']);
                if(!empty($run_query['check_email'])){
                    $response = $this->sentEmail($_POST['email'],  $run_query['check_email'][0]['fk_id']);
                }else{
                    $run_query['check_email'] = $this->MY_Model->getRows(PREFIX.'userdata_staffing_agencies',  $query['check_email']);
                    if(!empty($run_query['check_email'])){
                        $response = $this->sentEmail($_POST['email'],  $run_query['check_email'][0]['fk_id']);
                    }else{
                        $response['status'] = false;
                        $response['message'] = 'ERROR, No records found with this email ' . $_POST['email'];
                    }
                }
            }
       }
		echo json_encode($response);
	}
    public function changepassword($_PRIVACY_CODE = null){
        if($_PRIVACY_CODE != null){
            if(isset($_SESSION['reset_data'])){
                if($_SESSION['reset_data']['privacy_code'] == $_PRIVACY_CODE){
                    $data['title'] = 'Change Password';
                    $this->_lrf_view_includes('changepassword', $data);
                }else{
                    redirect(base_url('404'));
                }
            }else{
                redirect(base_url('404'));
            }
        }else{
            redirect(base_url('404'));
        }
    }
    public function changenow(){
        if($_POST['password'] != $_POST['cpassword']){
            $response['message'] = 'ERROR, Invalid confirmation password';
            $response['status'] = false;
        }else{
            $query['update_pass']['set'] = array(
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'bu_password' => $_POST['password']
            );
            $query['update_pass']['where'] = array(
                'id' => $_SESSION['reset_data']['fk_user_id']
            ); 
            $this->MY_Model->update(PREFIX.'users', $query['update_pass']['set'], $query['update_pass']['where']);
            unset($_SESSION['reset_data']);
            $response['status'] = true;
        }
        echo json_encode($response);
    }
    public function sentEmail($_EMAIL, $_FK_USER_ID){
        $param['explode'] = explode('/', base_url());
        unset($param['explode'][3]);
        $param['home_url'] = implode('/', $param['explode']);
        $param['company_logo'] = base64_encode(file_get_contents($_SERVER["DOCUMENT_ROOT"]."/portal/assets/img/main-logo.png"));
        $_SESSION['reset_data'] = array(
            'privacy_code' => $this->generate_code(250),
            'email' => $_EMAIL,
            'fk_user_id' => $_FK_USER_ID,
        );
        $param['contact_us'] =  $param['home_url'] . 'healthcare-staffing-contact-us';
        $param['link'] = base_url() . 'account/changepassword/'.$_SESSION['reset_data']['privacy_code'];
        $to_email = $_EMAIL;
        $from_name = 'Agencify Tech Co';
        $subject = 'Email Notification - Confirmation Reset Password';
        $use_html_template = true;
        $cc = "";
        $message = "";
        $config = array(
            'protocol' 	  => 'smtp',
            'smtp_host' => 'smtp.sendgrid.net',
            'smtp_port' => 587,
            'smtp_user' => 'apikey',
            'smtp_pass' => getenv('SENDGRID_API_KEY') ?: '',
            'mailtype' 	  => 'html',
            'charset'     => 'iso-8859-1',
            'wordwrap' 	  => TRUE,
            'set_newline' => "\r\n"
        );
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        $this->email->to($to_email);
        !empty($cc) ? $this->email->cc($cc) : "";
        $this->email->from('noreply@proweaversend.com', $from_name);
        $this->email->subject($subject);
        $this->email->message($message);
        if ($use_html_template) {
            $messageData['title']   = $subject;
            $messageData['content'] = $message;
            $messageData['company_logo'] =   $param['company_logo'];
            $messageData['link'] =  $param['link'];
            $messageData['contact_us'] =  $param['contact_us'];
            $message = $this->load->view('template/forgetpass', $messageData, true);
            $this->email->message($message);
        } else {
            $this->email->message($message);
        }
        if ($this->email->send()) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
            $response['message'] = 'ERROR, Failed to sent email notification.';
        }
        return $response;
    }
}
