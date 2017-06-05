<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function linkedin(){
		if (isset($_GET['error'])) {
			$this->unauthorized();
		} else {
			$code = $_GET['code'];
			$state = $_GET['state'];
			$this->getAccessToken($code, $state);
			return;
		}
	}

	public function unauthorized(){
		$data['title'] = 'Warhawk Global Connect Site';
		$data['the_view'] = 'unauthorized';
		$this->load->view('template/template', $data);
	}

	public function getAccessToken($code, $state) {
		$curl = curl_init();
		$params = "client_id=784u6wvxgqz9bg&client_secret=QxyBbhjpknFpmGwT&grant_type=authorization_code&redirect_uri=http%3A%2F%2Fwww.quimeratech.com%2Fwgc%2Findex.php%2Fauth%2Flinkedin&code=". $code;
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://www.linkedin.com/oauth/v2/accessToken",
		  CURLOPT_POSTFIELDS => $params,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 600,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_HTTPHEADER => array(
		    "cache-control: no-cache",
		    "Content-type: application/x-www-form-urlencoded",
		    "content-length: " . strlen($params)
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$res = json_decode($response);
			
			$profile = json_decode(file_get_contents('https://api.linkedin.com/v1/people/~:(' .
				'id,first-name,last-name,email-address,headline,picture-url,industry,summary,specialties,'.
					'positions:(id,title,summary,start-date,end-date,is-current,'.
						'company:(id,name,type,size,industry,ticker)'.
					'))?oauth2_access_token='.$res->access_token.'&format=json'));
			
			// Now we have to insert a new person, if it doesn't exists.
			$person = $this->validate_user($profile->id);
			//print_r($person);
			
			if (!$person) {
				$this->register_user($profile);
			} else if (is_null($person['alumni_id']) || $person['alumni_id']=="") {
				//print_r($person);
				$user_data['data'] = $person;
                $user_data['login'] = true;
                $this->session->set_userdata($user_data);
				redirect(base_url() . 'index.php/welcome/confirm_login');
			} else {
				$user_data['data'] = $person;
				//print_r($user_data);
                $user_data['login'] = true;
                $this->session->set_userdata($user_data);
                redirect(base_url() . 'index.php/welcome/dashboard');
			}
			
		}
    }

    public function validate_user($id) {
		$this->load->model('PersonModel');
		$person = $this->PersonModel->getPersonsDataLinkedIn($id);
		return $person;
	}

    public function register_user($profile) {
    	$this->load->model('UploadModel');
    	$first_name   = $profile->firstName;
		$last_name    = $profile->lastName;
		$middle_name  = "";
		$username     = strtolower($profile->firstName) . "." . strtolower($profile->lastName);
		$email        = $profile->emailAddress;
		$password     = $this->UploadModel->generatePassword();
		$phone_number = "";
		$linkedin_id  = $profile->id;
		$gender_id    = 3; // Unknown
		$profile_id   = 2; // Alumni
		
		$personData = array('linkedin_id'=>$linkedin_id, 'first_name' => $first_name, 'last_name' => $last_name, 'middle_name' => $middle_name, 'username' => $username, 'email' => $email, 'password' => $password, 'phone_number' => $phone_number, 'gender_id' => $gender_id, 'profile_id' => $profile_id );
		$this->load->model('PersonModel');
		$person_id = $this->PersonModel->insertPerson($personData);
		
		$personData['person_id']=$person_id;
		$user_data['login'] = true;
		$personData['profile_desc'] = "alumni";
		$user_data['data'] = $personData;
        $this->session->set_userdata($user_data);
        $this->load->helper('url');
        redirect(base_url() . 'index.php/welcome/confirm_login');
	}

}
