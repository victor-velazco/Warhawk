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


/*        
        function reportByDestination($start_dt="", $end_dt="", $person_id="") {
        	$emptyResult[0] = array(
        			'destination' => '-',
        			'per_date' => '-',
        			'per_time' => '-',
        			'destination' => '-',
        			'total_time' => '-'
        	);
        	
        	$sql = "SELECT rms.room_name, SUM( per.time ), date_format(per.timepermission, '%Y-%m-%d') as per_date, date_format(per.timepermission, '%H') as per_time, avg(per.time) as avg_time, sum(per.time) as total_time
				FROM permission per
				JOIN persons pers ON per.student = pers.person_id
				JOIN rooms rms ON per.goto = rms.room_id
				WHERE per.timepermission IS NOT NULL
				AND per.timepermission <>  '0000-00-00 00:00:00'";
        	if ($start_dt!="") {
        		$sql .= " AND per.timepermission>='".$start_dt." 00:00:00' AND per.timepermission<='".$end_dt." 23:59:59'";
        	}
        	if ($person_id!="") {
        		$sql .= " AND pers.person_id in (SELECT child_person_id FROM  relationships WHERE parent_person_id =".$person_id.")";
        	}
        	$sql .= " group by rms.room_name, date_format(per.timepermission, '%Y-%m-%d'), date_format(per.timepermission, '%H')";
        	$queryResult = $this->db->query($sql);
        	$report = ( $queryResult->num_rows() > 0 ) ? $queryResult->result_array() : $emptyResult;
        	return $report;
       }    
*/    	 
 }



        