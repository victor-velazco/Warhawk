<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index(){
		$this->load->model('GeneralModel');
		$data['title'] = 'Warhawk Global Connect Site';
		$data['the_view'] = 'index';
		$data['genders'] = $this->GeneralModel->loadGenders();
		$data['profiles'] = $this->GeneralModel->loadProfilesNoAdmin();
		$data['categories'] = $this->GeneralModel->loadCategories();
		$this->load->view('index', $data);
	}

	public function dashboard(){
		$this->load->model('GeneralModel');
		$data['title'] = 'Warhawk Global Connect Site';
		$data['the_view'] = 'dashboard';
		$data['genders'] = $this->GeneralModel->loadGenders();
		$data['profiles'] = $this->GeneralModel->loadProfilesNoAdmin();
		$data['featured'] = $this->GeneralModel->loadFeaturedAlumni();
		$data['categories'] = $this->GeneralModel->loadCategories();
		$data['feeds'] = $this->GeneralModel->loadLastFeeds();
		$data['headline'] = $this->GeneralModel->loadLastHeadLine();
		$this->load->view('template/template', $data);
	}
        
	public function about($id = NULL){
		$this->load->model('GeneralModel');
		$data['title'] = 'Warhawk Global Connect Site';
		$data['the_view'] = 'about';
		$data['genders'] = $this->GeneralModel->loadGenders();
		$data['profiles'] = $this->GeneralModel->loadProfilesNoAdmin();
        $data['about'] = $this->GeneralModel->getAboutData($id);
        $data['featured'] = $this->GeneralModel->loadFeaturedAlumni();
        $data['feeds'] = $this->GeneralModel->loadLastFeeds();
		$this->load->view('template/template', $data);
	}        

	public function announcements($id = NULL){
		$this->load->model('GeneralModel');
		$data['title'] = 'Warhawk Global Connect Announcements';
		$data['the_view'] = 'announcements';
		$data['headlines'] = $this->GeneralModel->loadHeadLines();
		$this->load->view('template/template', $data);
	}        

	public function messaging(){
		$this->load->model('GeneralModel');
		$this->load->model('PersonModel');
		$data['title'] = 'Warhawk Global Connect Announcements';
		$data['the_view'] = 'messaging';
		$data['persons'] = $this->PersonModel->getAllPersonsData();
		$this->load->view('template/template', $data);
	} 

	public function aboutAdmin($id = NULL){
		$this->load->model('GeneralModel');
		$data['title'] = 'Warhawk Global Connect Site';
		$data['the_view'] = 'about';
		$data['genders'] = $this->GeneralModel->loadGenders();
		$data['profiles'] = $this->GeneralModel->loadProfilesNoAdmin();
        $data['about'] = $this->GeneralModel->getAboutDataAdmin($id);
        $data['featured'] = $this->GeneralModel->loadFeaturedAlumni();
        $data['feeds'] = $this->GeneralModel->loadLastFeeds();
		$this->load->view('template/template', $data);
	}        

	public function profile($id = NULL) {
		if (is_null($id)) {
			$this->profileAdmin(1);
		} else {
			$this->load->model('GeneralModel');
			$data['title'] = 'Warhawk Global Connect Site - Profile Update';
			$data['the_view'] = 'profile';
			$data['genders'] = $this->GeneralModel->loadGenders();
			$data['profiles'] = $this->GeneralModel->loadProfilesNoAdmin();
	        $data['about'] = $this->GeneralModel->getAboutData($id);
			$this->load->view('template/template', $data);
		}
	}

	public function profileAdmin($id = NULL) {
		$this->load->model('GeneralModel');
		$data['title'] = 'Warhawk Global Connect Site - Profile Update';
		$data['the_view'] = 'profile';
		$data['genders'] = $this->GeneralModel->loadGenders();
		$data['profiles'] = $this->GeneralModel->loadProfilesNoAdmin();
        $data['about'] = $this->GeneralModel->getAboutDataAdmin($id);
		$this->load->view('template/template', $data);
	}

	public function profileUpdate() {
		$this->load->model('GeneralModel');
        $about = $this->GeneralModel->getAboutData($_POST['id']);
		if (is_null($about) && $_POST['id']===1) {
        	$about = $this->GeneralModel->getAboutDataAdmin($_POST['id']);
    	}
        
		if (strcmp($about->first_name,$_POST['firstname'])!=0) {
			// Insert into feeds and update the value.
			$this->GeneralModel->updatePerson($about->person_id, 'first_name', $_POST['firstname']);
			$this->GeneralModel->addFeeds($_POST['id'], $about->first_name . ' ' . $about->last_name . ' has changed the First Name.');
		}
		if (strcmp($about->last_name,$_POST['lastname'])!=0) {
			// Insert into feeds and update the value.
			$this->GeneralModel->updatePerson($about->person_id, 'last_name', $_POST['lastname']);
			$this->GeneralModel->addFeeds($_POST['id'], $about->first_name . ' ' . $about->last_name . ' has changed the Last Name.');
		}
		if (strcmp($about->email,$_POST['email'])!=0) {
			// Insert into feeds and update the value.
			$this->GeneralModel->updatePerson($about->person_id, 'email', $_POST['email']);
			$this->GeneralModel->addFeeds($_POST['id'], $about->first_name . ' ' . $about->last_name . ' has changed the Email address.');
		}
		if (strcmp($about->phone_number,$_POST['phone'])!=0) {
			// Insert into feeds and update the value.
			$this->GeneralModel->updatePerson($about->person_id, 'phone_number', $_POST['phone']);
			$this->GeneralModel->addFeeds($_POST['id'], $about->first_name . ' ' . $about->last_name . ' has changed the Phone Number.');
		}
		if (strcmp($about->about,$_POST['about'])!=0) {
			// Insert into feeds and update the value.
			$this->GeneralModel->updatePerson($about->person_id, 'about', $_POST['about']);
			$this->GeneralModel->addFeeds($_POST['id'], $about->first_name . ' ' . $about->last_name . ' has changed the About information.');
		}
		echo json_encode(array('result' => true));
	}

	public function donate() {
		if (isset($_REQUEST['id']) && !is_null($_REQUEST['id']) && ($_REQUEST['id']!="")) {
			$this->load->model('GeneralModel');
	        $about = $this->GeneralModel->getAboutData($_REQUEST['id']);
	        
			$this->GeneralModel->addFeeds($_REQUEST['id'], $about->first_name . ' ' . $about->last_name . ' has donated!!!.');
		}
		$this->dashboard();
	}

	public function refer() {
		$this->load->model('GeneralModel');
		if (!isset($_POST['email'])) {
			$data['title'] = 'Warhawk Global Connect Site - Program referal';
			$data['the_view'] = 'refer';
			$this->load->view('template/template', $data);
		} else {
			return json_encode($this->GeneralModel->refer($_POST['email'], $this->session->userdata('data')['first_name'] ,  $this->session->userdata('data')['last_name']));
		}
	}
	
	public function verLogin(){
		
		$g_recaptcha_response = $_POST['g_recaptcha_response'];		
		// your secret key
		$secret = "6LewXyMUAAAAAD8M4MWaA1KUAp7-AelaJAmEVvD4";
		
		$captcha = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$g_recaptcha_response.'&remoteip='.$_SERVER['REMOTE_ADDR']),TRUE); 
		
		$userid = $_POST['userid'];
		$password = $_POST['password'];
							
		$this->load->model('GeneralModel');
		$User = $this->GeneralModel->verifyPass($userid);				

		//print_r($captcha);
		
		if($User == False){
            echo json_encode(array('verified' => false));
        } else {
			#if($captcha['success'] == 1){ 			
				if($this->_compPass($password, $User->password)){
					$user_data['login'] = true;
					$user_data['data'] = $this->GeneralModel->getPersonsData($userid);
					echo json_encode(array('verified' => true));
					$this->session->set_userdata($user_data);
				}else{
					echo json_encode(array('verified' => false));
				}
			#} else {
			#	echo json_encode(array('verified' => false));
			#}	
        }
	}		

	public function verPass(){
		$userid = $_POST['userid'];
		$password = $_POST['password'];
		$this->load->model('GeneralModel');
		$User = $this->GeneralModel->verifyPass($userid);				
		
		if($User == False){
            echo json_encode(array('verified' => false));
        } else {
            if($this->_compPass($password, $User->password)){
                $user_data['login'] = true;
                $user_data['data'] = $this->GeneralModel->getPersonsData($userid);
                echo json_encode(array('verified' => true));
                 $this->session->set_userdata($user_data);
            }else{
                echo json_encode(array('verified' => false));
            }
        }
	}
	
	public function lostPass(){
		$email = $_POST['email'];
		$this->load->model('GeneralModel');
		$pass_sent = $this->GeneralModel->lostPass($email);
		echo json_encode(array('sent' => $pass_sent));
	}
	
	private function _cryptPass($password){
		$salt = "";
		for ($i = 0; $i < 40; $i++) {
		   $salt .= substr("./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789",mt_rand(0, 63),1);
		}
		$hashed_password = crypt ($password , $salt);
		return $hashed_password;
	}
	
	private function _compPass($user_input, $passDb) {
		return ($user_input==$passDb)?true:false;
		/*
		
		if (hash_equals($passDb, crypt($user_input, $passDb))) {
		   	return true;
		}else{
			return false;
		}
		*/
	}

	public function destroy(){
		$this->session->sess_destroy();
		$this->load->helper('url');
		redirect('welcome', 'refresh');
	}

	public function validate_user() {
		$email = $_POST['email'];
		$username = $_POST['username'];
		$this->load->model('PersonModel');
		$email_res = $this->PersonModel->validateEmail($email);
		$username_res = $this->PersonModel->validateUsername($username);
		if ($username_res) {
			echo json_encode(array('res'=>'error','message'=>'Username already exists in our system.'));
		} else if ($email_res) {
			echo json_encode(array('res'=>'error','message'=>'Email already registered in our system.'));
		} else {
			echo json_encode(array('res'=>'Ok','message'=>''));
		}
	}

	public function register_user() {
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
		$personData['profile_desc'] = "alumni";
		//$pData = print_r($personData);
		//error_log($pData);
		$user_data['data'] = $personData;
        // $user_data['persons'] = $this->GeneralModel->getPersonsData($userid);
        $this->session->set_userdata($user_data);
        //echo json_encode(array('verified' => true, 'user_data' => $personData, 'the_view' => 'template/template/confirm_login'));
        $this->load->helper('url');
        redirect(base_url() . 'index.php/welcome/confirm_login');
	}

	public function confirm_login() {
		$data['title'] = 'Warhawk Global Connect Site';
		$data['the_view'] = 'confirm_login';
		$this->load->model('GeneralModel');
		$data['levels'] = $this->GeneralModel->loadEducationLevels();
		$data['countries'] = $this->GeneralModel->loadCountries();
		$data['occupations'] = $this->GeneralModel->loadOccupations();
		$data['companies'] = $this->GeneralModel->loadCompanies();
		$data['statuses'] = $this->GeneralModel->loadStatuses();
		//$data['profiles'] = $this->GeneralModel->loadProfilesNoAdmin();
		$this->load->view('template/template_nohead', $data);
		
	}
	
	public function confirm_user() {
		//print_r($this->session->userdata('data'));
		$person_id = $this->session->userdata('data')['person_id'];
		$university         = $_POST['university'];
		$status_id          = $_POST['status'];
		$grad_year          = $_POST['graduation_year'];
		$origin_country_id  = $_POST["origin_country"];
        $origin_city_id     = $_POST["origin_city"];
        $current_country_id = $_POST["current_country"];
        $current_city_id    = $_POST["current_city"];
        $occupation_id      = $_POST["occupation"];
        $company_id         = $_POST["company"];
        $education_level_id = $_POST["ed_level"];
        $this->load->model('GeneralModel');
        if (!is_numeric($_POST["origin_country"])) {
        	// Insert Country and get the Id
        	$origin_country_id = $this->GeneralModel->insertCountry($_POST["origin_country"]);
        }
        if (!is_numeric($_POST["origin_city"])) {
        	// Insert City and get the Id
        	$origin_city_id = $this->GeneralModel->insertCity($_POST["origin_city"], $origin_country_id);
        }
        if (!is_numeric($_POST["current_country"])) {
        	// Insert Country and get the Id
        	$current_country_id = $this->GeneralModel->insertCountry($_POST["current_country"]);
        }
        if (!is_numeric($_POST["current_city"])) {
        	// Insert City and get the Id
        	$current_city_id = $this->GeneralModel->insertCity($_POST["current_city"], $current_country_id);
        }
        if (!is_numeric($_POST["occupation"])) {
        	// Insert occupation and get the Id
        	$occupation_id = $this->GeneralModel->insertOccupation($_POST["occupation"]);
        }
        if (!is_numeric($_POST["company"])) {
        	// Insert Company and get the Id
        	$company_id = $this->GeneralModel->insertCompany($_POST["company"]);
        }
        if (!is_numeric($_POST["ed_level"])) {
        	// Insert Country and get the Id
        	$education_level_id = $this->GeneralModel->insertEducationLevel($_POST["ed_level"]);
        }
		if (!is_numeric($_POST["status"])) {
        	// Insert Status and get the Id
        	$status_id = $this->GeneralModel->insertStatus($_POST["status"]);
        }

        $this->load->model('PersonModel');
        $alumni_array = array('person_id'=>$person_id, 'status_id'=>$status_id, 'university'=>$university, 
                            'graduation_yr'=>$grad_year, 'origin_country_id'=>$origin_country_id, 'origin_city_id'=>$origin_city_id, 
                            'current_country_id'=>$current_country_id, 'current_city_id'=>$current_city_id, 
                            'occupation_id'=>$occupation_id, 'company_id'=>$company_id, 'education_level_id'=>$education_level_id, 
                            'outstanding' => 1);
		$this->PersonModel->insertAlumni($alumni_array);
	}

	public function loadCities () {
		if (!isset($_POST['country_id'])) {
			$res_array = array("result"=>204, "message"=>"Please provide the country.");
		} else {
			$this->load->model('GeneralModel');
			$cities = $this->GeneralModel->loadCitiesByCountry($_POST['country_id']);
			echo json_encode($cities);
		} 
	}

	
}
