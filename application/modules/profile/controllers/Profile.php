<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $data['title']  =  'Profile';
       if($_SESSION['userdata']['type'] == 3){
        $this->_coordinator_loadpage_('index', $data);
       }else{
        $this->load_horizontal('index', $data);
       }
    }
    public function update(){
        $db['database_name'] = ($_SESSION['userdata']['type'] == 1) ? PREFIX . 'userdata_independent_contractors' : (($_SESSION['userdata']['type'] == 2)  ? PREFIX . 'userdata_staffing_agencies' : PREFIX . 'userdata_facilities_staffing_coordinator');
        $userdata = $this->userdata($_SESSION['userdata']);
        if($_POST['user']['username'] == $userdata[0]['username']){
            if(isset($_POST['change_password'])){
                if($_POST['user']['password'] == $_POST['cpassword']){
                    if(password_verify($_POST['oldpassword'], $userdata[0]['password'])){
                        $_POST['user']['bu_password'] = $_POST['user']['password'];
                        $_POST['user']['password'] = password_hash($_POST['user']['bu_password'], PASSWORD_DEFAULT);
                        $this->MY_Model->update($db['database_name'], $_POST['userdata'], array('fk_id' => $_SESSION['userdata']['id']));
                        $this->MY_Model->update(PREFIX.'users', $_POST['user'], array('id' => $_SESSION['userdata']['id']));
                        $response['status'] = true;
                    }else{
                        $response['status'] = false;
                        $response['message'] = 'ERROR, Invalid old password.';
                    }
                }else{
                    $response['status'] = false;
                    $response['message'] = 'ERROR, Invalid confirmation password.';
                }
            }else{
                $this->MY_Model->update($db['database_name'], $_POST['userdata'], array('fk_id' => $_SESSION['userdata']['id']));
                $response['status'] = true;
            }
        }else{
            if($this->verify_username($_POST['user']['username'])){
                $response['status'] = false;
                $response['message'] = 'ERROR, Username already taken.';
            }else{
                if(isset($_POST['change_password'])){
                    if($_POST['user']['password'] == $_POST['cpassword']){
                        if(password_verify($_POST['oldpassword'], $userdata[0]['password'])){
                            $_POST['user']['bu_password'] = $_POST['user']['password'];
                            $_POST['user']['password'] = password_hash($_POST['user']['bu_password'], PASSWORD_DEFAULT);
                            $this->MY_Model->update($db['database_name'], $_POST['userdata'], array('fk_id' => $_SESSION['userdata']['id']));
                            $this->MY_Model->update(PREFIX.'users', $_POST['user'], array('id' => $_SESSION['userdata']['id']));
                            $response['status'] = true;
                        }else{
                            $response['status'] = false;
                            $response['message'] = 'ERROR, Invalid old password.';
                        }
                    }else{
                        $response['status'] = false;
                        $response['message'] = 'ERROR, Invalid confirmation password.';
                    }
                }else{
                    $this->MY_Model->update($db['database_name'], $_POST['userdata'], array('fk_id' => $_SESSION['userdata']['id']));
                    $this->MY_Model->update(PREFIX.'users', $_POST['user'], array('id' => $_SESSION['userdata']['id']));
                    $response['status'] = true;
                }
            }
        }
        if($response['status']){
            $response['new_info'] = $this->userdata($_SESSION['userdata']);
        }
        echo json_encode($response);
    }
    public function verify_username($_USERNME){
        $param['flag'] = null;
        $query['check']['select'] = '';
        $query['check']['where'] = array('username' => $_USERNME);
        $run_query['check'] = $this->MY_Model->getRows(PREFIX.'users', $query['check']);
        if(!empty($run_query['check'])){
            $param['flag'] = true;
        }else{
            $param['flag'] = false;
        }
        return $param['flag'];
    }
} // End of Class