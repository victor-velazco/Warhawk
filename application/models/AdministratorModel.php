<?php

    class AdministratorModel extends CI_Model {

        var $title   = '';
        var $content = '';
        var $date    = '';

        function __construct() {
            $this->load->helper('string');
            // Call the Model constructor
            parent::__construct();
        }

        function cleanString($string) {
            $string = preg_replace ('/[ ]+/', ' ', $string);
            $string = ucwords($string);
            $string = quotes_to_entities($string);
            $string = $this->security->xss_clean($string);

            return $string;
        }

        function cleanString2($string) {
            $string = preg_replace ('/[ ]+/', ' ', $string);
            $string = quotes_to_entities($string);
            $string = $this->security->xss_clean($string);

            return $string;
        }

        public function getOutstandingAlumniList() {
            $qryList = "SELECT a.alumni_id, a.person_id, p.first_name, p.last_name, p.email, a.status_id, s.status, a.university, a.graduation_yr, a.featured, a.origin_country_id, oc.country_name as orig_country_name, a.origin_city_id, ocy.city_name as orig_city_name, a.current_country_id, cc.country_name as curr_country_name, ccy.city_name as curr_city_name, a.current_city_id, a.occupation_id, o.description as occupation, a.company_id, c.company_name, a.education_level_id, el.level 
            FROM alumni a 
            LEFT JOIN persons p ON p.person_id=a.person_id 
            LEFT JOIN statuses s ON s.status_id=a.status_id 
            LEFT JOIN countries oc ON oc.country_id=a.origin_country_id 
            LEFT JOIN cities ocy ON ocy.city_id = a.origin_city_id 
            LEFT JOIN countries cc ON cc.country_id=a.current_country_id 
            LEFT JOIN cities ccy ON ccy.city_id = a.current_city_id 
            LEFT JOIN occupations o ON o.occupation_id=a.occupation_id 
            LEFT JOIN companies c ON c.company_id=a.company_id 
            LEFT JOIN education_levels el ON el.education_level_id=a.education_level_id 
            where outstanding=1";

            $query = $this->db->query($qryList);
            $alumniList = ( $query->num_rows() >= 1 ) ? $query->result() : false;

            return $alumniList;
        }

        public function getOutstandingAlumni($id) {
            $qryList = "SELECT a.alumni_id, a.person_id, p.first_name, p.last_name, p.email, a.status_id, s.status, a.university, a.graduation_yr, a.featured, a.origin_country_id, oc.country_name as orig_country_name, a.origin_city_id, ocy.city_name as orig_city_name, a.current_country_id, cc.country_name as curr_country_name, ccy.city_name as curr_city_name, a.current_city_id, a.occupation_id, o.description as occupation, a.company_id, c.company_name, a.education_level_id, el.level 
            FROM alumni a 
            LEFT JOIN persons p ON p.person_id=a.person_id 
            LEFT JOIN statuses s ON s.status_id=a.status_id 
            LEFT JOIN countries oc ON oc.country_id=a.origin_country_id 
            LEFT JOIN cities ocy ON ocy.city_id = a.origin_city_id 
            LEFT JOIN countries cc ON cc.country_id=a.current_country_id 
            LEFT JOIN cities ccy ON ccy.city_id = a.current_city_id 
            LEFT JOIN occupations o ON o.occupation_id=a.occupation_id 
            LEFT JOIN companies c ON c.company_id=a.company_id 
            LEFT JOIN education_levels el ON el.education_level_id=a.education_level_id 
            where a.alumni_id=" . $id;

            $query = $this->db->query($qryList);
            $alumni = ( $query->num_rows() >= 1 ) ? $query->result() : false;

            return $alumni;
        }

        public function getAuthorizedAlumniList() {
            $qryList = "SELECT a.alumni_id, a.person_id, p.first_name, p.last_name, a.status_id, s.status, a.university, a.graduation_yr, a.featured, a.origin_country_id, oc.country_name as orig_country_name, a.origin_city_id, ocy.city_name as orig_city_name, a.current_country_id, cc.country_name as curr_country_name, ccy.city_name as curr_city_name, a.current_city_id, a.occupation_id, o.description as occupation, a.company_id, c.company_name, a.education_level_id, el.level 
                FROM alumni a 
                LEFT JOIN persons p ON p.person_id=a.person_id 
                LEFT JOIN statuses s ON s.status_id=a.status_id 
                LEFT JOIN countries oc ON oc.country_id=a.origin_country_id 
                LEFT JOIN cities ocy ON ocy.city_id = a.origin_city_id 
                LEFT JOIN countries cc ON cc.country_id=a.current_country_id 
                LEFT JOIN cities ccy ON ccy.city_id = a.current_city_id 
                LEFT JOIN occupations o ON o.occupation_id=a.occupation_id 
                LEFT JOIN companies c ON c.company_id=a.company_id 
                LEFT JOIN education_levels el ON el.education_level_id=a.education_level_id 
                where a.authorized=1";

            $query = $this->db->query($qryList);
            $alumni = ( $query->num_rows() >= 1 ) ? $query->result() : false;

            return $alumni;
        }

        public function updateProfile($id, $value) {
            $data = array(
                'outstanding' => 0,
                'authorized'  => $value
            );
            $this->db->where('alumni_id', $id);
            $this->db->update('alumni', $data);
        }

        public function setAlumniFeatured($id, $value) {
            $data = array(
                'featured' => $value
            );
            $this->db->where('alumni_id', $id);
            return $this->db->update('alumni', $data);
        }

       private function _cryptPass($password){
            $salt = "";
            for ($i = 0; $i < 40; $i++) {
               $salt .= substr("./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789",mt_rand(0, 63),1);
            }
            $hashed_password = crypt ($password , $salt);
            return $hashed_password;
        }

        function lostPass($id){
            $query = $this->db->query("SELECT email, password FROM persons WHERE person_id = " . $id);
            $row = $query->row();
            if (isset($row)) {
                $to      = $row->email;
                $subject = 'WGC Password remember';
                $message = '<h1>WGC Support</h1>You password is: ' . $row->password;
                $headers = 'From: <WGC Support>support@wgc.com' . "\r\n" .
                    'Reply-To: support@wgc.com' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
                $headers  .= 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                return mail($to, $subject, $message, $headers);
            }
            else return false;
        }

        function insertHeadline($data) {
            $this->db->insert('headlines', $data);
            return $this->db->insert_id();
        }

		function delAnnouncement($id){
			$this->db->where('headline_id', $id);
			$this->db->delete('headlines');
		}  		

		public function getIdAnnouncement($id) {
			$this->db->where('headline_id', $id);
			$query = $this->db->get('headlines');
			return $query->row();
		}  
		
		public function editAnnouncement($id, $data){                
			$this->db->where('headline_id', $id);
			$this->db->update('headlines', $data);
			return $error = $this->db->error();                          
		}   		
		
		
 }



        