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
		$this->load->view('template/template', $data);
	}
        
	public function about($id = NULL){
		$this->load->model('GeneralModel');
		$data['title'] = 'Warhawk Global Connect Site';
		$data['the_view'] = 'about';
		$data['genders'] = $this->GeneralModel->loadGenders();
		$data['profiles'] = $this->GeneralModel->loadProfilesNoAdmin();
                $data['about'] = $this->GeneralModel->getAboutData($id);
		$this->load->view('template/template', $data);
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
		$this->load->view('template/template', $data);
		
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
