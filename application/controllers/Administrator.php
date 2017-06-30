<?php
defined('BASEPATH') OR exit('No direct script access allowed');

@include_once ('Generic.php');

class Administrator extends CI_Controller {

	use Generic;

	private $profile = "administrator";

	public function fileupload() {
		$data['title'] = ucwords("File Upload");
		$data['body'] = "dashboard/body/".str_replace(" ", "", $this->profile) . "/fileUpload";
		$this->load->view('dashboard/template',$data);
	}

	public function upload_file() {
		$this->load->model('UploadModel');
        $result = $this->UploadModel->upload($_FILES);
        if ($result["result"]==500) {
        	$array = array("status" => "Error", "message" => "Error in file upload: " . $result["message"]);
        	$this->output->set_status_header(500)->set_content_type('application/json')->set_output(json_encode($array));
        }
        else {
        	$array = array("status" => "Success", "message" => $result["message"]);
        	$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($array));
        }
	}

	public function dashboard() {
		$data['title'] = ucwords("Dashboard");
		$this->load->model('AdministratorModel');
		$data['profile'] = $this->profile;
		$data['list'] = $this->AdministratorModel->getAuthorizedAlumniList();
		$data['side'] = "dashboard/side/".str_replace(" ", "", $this->profile);
		$data['body'] = "dashboard/body/".str_replace(" ", "", $this->profile) . "/dashboard";
		$this->load->view('dashboard/template',$data);
	}   
                         
	public function announcements() {
		$data['title'] = ucwords("Dashboard");
		$this->load->model('AdministratorModel');
		$data['profile'] = $this->profile;
		$data['list'] = $this->AdministratorModel->getAuthorizedAlumniList();
		$data['body'] = "dashboard/body/".str_replace(" ", "", $this->profile) . "/announcements";
		$this->load->view('dashboard/template',$data);
	}   
        
    public function registerAnnouncement() {
		
		$user_id = $this->session->userdata('data')['person_id'];
		
		$data['title'] = ucwords("Dashboard");
		$this->load->model('AdministratorModel');

		$hedlineData = array('header'=>$_POST['header'],'short_desc'=>$_POST['short_desc'],'description'=>$_POST['description'],'valid_from'=>$_POST['start_dt'],'valid_to'=>$_POST['end_dt'],'order'=>date('Y-m-d H:i:s'),'publisher_id'=>$user_id);
		$this->AdministratorModel->insertHeadline($hedlineData);

		$this->dashboard();
	}


	public function createUser() {
		if (isset($_POST['register_firstname'])) {
			$first_name   = $_POST['register_firstname'];
			$last_name    = $_POST['register_lastname'];
			$middle_name  = $_POST['register_middlename']=='undefined'?"":$_POST['register_middlename'];
			$username     = $_POST['register_username'];
			$email        = $_POST['register_email'];
			$password     = $_POST['register_password'];
			$phone_number = $_POST['register_phone'];
			$gender_id    = $_POST['register_gender'];
			$profile_id   = $_POST['register_profile'];

			$personData = array('first_name' => $first_name, 'last_name' => $last_name, 'middle_name' => $middle_name, 'username' => $username, 'email' => $email, 'password' => $password, 'phone_number' => $phone_number, 'gender_id' => $gender_id, 'profile_id' => $profile_id );
			$this->load->model('PersonModel');
			$person_id = $this->PersonModel->insertPerson($personData);
			$personData['person_id']=$person_id;
			$user_data['login'] = true;
			//$pData = print_r($personData);
			//error_log($pData);
			$user_data['data'] = $personData;
	        // $user_data['persons'] = $this->GeneralModel->getPersonsData($userid);
	        $this->session->set_userdata($user_data);
	        //echo json_encode(array('verified' => true, 'user_data' => $personData, 'the_view' => 'template/template/confirm_login'));
	        $this->load->helper('url');
	        redirect(base_url() . 'index.php/welcome/confirm_login');
		} else {
			$data['title'] = ucwords("Create User");
			$this->load->model('GeneralModel');
			$data['profile'] = $this->profile;
			$data['genders'] = $this->GeneralModel->loadGenders();
			$data['statuses'] = $this->GeneralModel->loadStatuses();
			$data['side'] = "dashboard/side/".str_replace(" ", "", $this->profile);
			$data['body'] = "dashboard/body/".str_replace(" ", "", $this->profile) . "/createUser";
			$this->load->view('dashboard/template',$data);
		}
	}

	public function outstanding() {
		$data['title'] = ucwords("Dashboard");
		$this->load->model('AdministratorModel');
		$data['profile'] = $this->profile;
		$data['list'] = $this->AdministratorModel->getOutstandingAlumniList();
		$data['side'] = "dashboard/side/".str_replace(" ", "", $this->profile);
		$data['body'] = "dashboard/body/".str_replace(" ", "", $this->profile) . "/index";
		$this->load->view('dashboard/template',$data);
	}

	public function reset_password() {
		$data['title'] = ucwords("Reset Password");
		$this->load->model('AdministratorModel');
		$data['profile'] = $this->profile;
		$data['list'] = $this->AdministratorModel->getAuthorizedAlumniList();
		$data['side'] = "dashboard/side/".str_replace(" ", "", $this->profile);
		$data['body'] = "dashboard/body/".str_replace(" ", "", $this->profile) . "/reset_password";
		$this->load->view('dashboard/template',$data);
	}

	public function send_password() {
		$this->load->model('AdministratorModel');
		if ($this->AdministratorModel->lostPass($_POST['person_id'])) {
			echo json_encode(array('result' => 'true'));
		} else {
			echo json_encode(array('result' => 'false'));
		}
	}

	public function show_outstanding_alumni_data($id = NULL) {
		$data['title'] = ucwords("Dashboard");
		$this->load->model('AdministratorModel');
		$data['profile'] = $this->profile;
		$data['alumni'] = $this->AdministratorModel->getOutstandingAlumni($id);
		$data['side'] = "dashboard/side/".str_replace(" ", "", $this->profile);
		$data['body'] = "dashboard/body/".str_replace(" ", "", $this->profile) . "/authorize_alumni";
		$this->load->view('dashboard/template',$data);
	}

	public function profile($id = NULL) {
		$data['title'] = ucwords("Dashboard");
		$this->load->model('AdministratorModel');
		$data['profile'] = $this->profile;
		$data['alumni'] = $this->AdministratorModel->getOutstandingAlumni($id);
		$data['side'] = "dashboard/side/".str_replace(" ", "", $this->profile);
		$data['body'] = "dashboard/body/".str_replace(" ", "", $this->profile) . "/profile";
		$this->load->view('dashboard/template',$data);
	}        
        
	public function authorizeAlumni() {
		$value = $_POST['authorize'];
		if ($value==1) {
			$auth_message = 'The administrator has authorized your profile in the WGC system.';
			$status = 'Accepted';
		} else {
			$auth_message = 'The administrator has denied your profile in the WGC system.' .
				'With the reason: ' . $_POST['reason'];
			$status = 'Denied';
		}
		$this->load->model('AdministratorModel');

		$data_alumni = $this->AdministratorModel->getOutstandingAlumni($_POST['id']);
		$this->AdministratorModel->updateProfile($_POST['id'], $value);
		$this->load->library('email');

		$this->email->from('victor.velazco@gmail.com', 'WGC Administrator');
		$this->email->to($data_alumni[0]->email);
		
		$this->email->subject('WGC Profile Authorization ['. $status .']');
		$this->email->message($auth_message);

		$this->email->send();
		$this->outstanding();
	}

	public function feature($id = NULL, $value) {
		$this->load->model('AdministratorModel');
		echo json_encode(array('result' => $this->AdministratorModel->setAlumniFeatured($id, $value))); 
	}      
/*
	public function index(){
		$data['person'] = $this->verPerfil($this->perfil);
		$data['side'] = "dashboard/side/".str_replace(" ", "", $this->perfil);
		$data['body'] = "dashboard/body/".str_replace(" ", "", $this->perfil);
		$data['title'] = ucwords($this->perfil);
		$data['subtitle'] = ucwords("Administrator Dashboard");
		$dbconnect = $this->load->database();
        $this->load->model('Administratormodel');
        $data['unreadMessages'] = $this->Administratormodel->unreadMessages($data['person']->person_id);
        $data['teachers'] = $this->Administratormodel->getTeacher();
        $data['staff'] = $this->Administratormodel->getStaff();
        $data['parents'] = $this->Administratormodel->getParents();
        $data['checkins'] = $this->Administratormodel->getLastCheckins();
		$this->load->view('dashboard/template',$data);
	}	
*/
}
