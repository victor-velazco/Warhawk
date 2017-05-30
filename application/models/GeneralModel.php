<?php

class GeneralModel extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    
    function verifyPass($userid){
        $query = $this->db->query("SELECT password FROM persons WHERE username = '$userid';");
        return ( $query->num_rows() == 1 ) ? $query->row() : false;
    }
    
    function lostPass($email){
        $query = $this->db->query("SELECT password FROM persons WHERE email = '$email';");
        $row = $query->row();
        if (isset($row)) {
            $to      = $email;
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
    
    function refer($email, $name){
        $to      = $email;
        $subject = 'WGC Referal Program';
        $message = '<h1>WGC Support</h1>Your friend: ' . $name . " has invited you to sign up to <a href='http://www.quimeratech.com/wgc'>Warhawk Global Connection page</a><br/>Give it a try !!!" . "\r\n";
        $headers = 'From: <WGC Support>support@wgc.com' . "\r\n" .
            'Reply-To: support@wgc.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        $headers  .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        return mail($to, $subject, $message, $headers);
    }

    function getPersonsData($userid){

    	$qryPerson = "	SELECT a.alumni_id, a.status_id, p.person_id, p.first_name, p.middle_name, p.last_name, p.email, p.username, p.phone_number, p.gender_id, g.gender, pr.profile_id, pr.profile_desc
						FROM persons p
						JOIN profiles pr ON p.profile_id = pr.profile_id
                        JOIN genders g ON p.gender_id = g.gender_id
                        LEFT JOIN alumni a on a.person_id=p.person_id and a.status_id=1
						WHERE p.username = '$userid'
					";

        $query = $this->db->query($qryPerson);
        $person = ( $query->num_rows() == 1 ) ? $query->row_array() : false;
        return $person;
    }

    function resetPassword($userid, $pass_created){
		$data = array (
				'pass_created' => $pass_created
		);
		$this->db->where('userid', $userid);
		$this->db->update('persons', $data);
        
		return;
    }
        
    function changePassword($person_id, $newpass){
         $consulta = "  UPDATE persons
                        SET password = '$newpass', pass_created = '0'
                        WHERE person_id = '$person_id'
                    ";
        $query = $this->db->query($consulta);
        $change = (( $this->db->affected_rows() == 1 ) ? true : false);
        return $change;
    }

    function loadGenders(){
        $query = $this->db->query("SELECT gender_id, gender from genders");
        $genders = ( $query->num_rows() >= 1 ) ? $query->result() : null;

        return $genders;
    }

    function loadFaturedStudents(){
        $query = $this->db->query("SELECT alumni_id FROM alumni where featured=1");
        $genders = ( $query->num_rows() >= 1 ) ? $query->result() : null;

        return $genders;
    }

    function loadCountries(){
        $query = $this->db->query("SELECT country_id, country_name from countries");
        $countries = ( $query->num_rows() >= 1 ) ? $query->result() : null;

        return $countries;
    }
    
    function loadCities(){
        $query = $this->db->query("SELECT city_id, city_name from cities");
        $countries = ( $query->num_rows() >= 1 ) ? $query->result() : null;

        return $countries;
    }    

    function loadStatuses(){
        $query = $this->db->query("SELECT status_id, status from statuses");
        $statuses = ( $query->num_rows() >= 1 ) ? $query->result() : null;

        return $statuses;
    }

    function loadOccupations(){
        $query = $this->db->query("SELECT occupation_id, description from occupations");
        $occupations = ( $query->num_rows() >= 1 ) ? $query->result() : null;

        return $occupations;
    }

    function loadCompanies(){
        $query = $this->db->query("SELECT company_id, company_name from companies;");
        $companies = ( $query->num_rows() >= 1 ) ? $query->result() : null;

        return $companies;
    }

    function loadEducationLevels(){
        $query = $this->db->query("SELECT education_level_id, level from education_levels;");
        $education_levels = ( $query->num_rows() >= 1 ) ? $query->result() : null;

        return $education_levels;
    }

    function loadProfilesNoAdmin(){
        $query = $this->db->query("SELECT profile_id, profile_desc from profiles where profile_id>1;");
        $profiles = ( $query->num_rows() >= 1 ) ? $query->result() : null;

        return $profiles;
    }

    function loadProfiles(){
        $query = $this->db->query("SELECT profile_id, profile_desc from profiles;");
        $profiles = ( $query->num_rows() >= 1 ) ? $query->result() : null;

        return $profiles;
    }

    function loadCategories(){
        $query = $this->db->query("SELECT category_id, category_desc from categories where type=1;");
        $categories = ( $query->num_rows() >= 1 ) ? $query->result() : null;

        return $categories;
    }

    function loadJobCategories(){
        $query = $this->db->query("SELECT category_id, category_desc from categories where type=2;");
        $categories = ( $query->num_rows() >= 1 ) ? $query->result() : null;

        return $categories;
    }

    function loadCitiesByCountry($country_id){
        $query = $this->db->query("SELECT city_id, city_name from cities where country_id = " . $country_id);
        $cities = ( $query->num_rows() >= 1 ) ? $query->result() : null;

        return $cities;
    }

    function loadFeaturedAlumni(){
        $query = $this->db->query("SELECT alumni_id, image from alumni where featured=1");
        $featured = ( $query->num_rows() >= 1 ) ? $query->result() : null;

        return $featured;
    }

    function loadLastFeeds(){
        $this->db->from('feeds');
        $this->db->join('alumni', 'alumni.alumni_id = feeds.alumni_id'); 
        $this->db->join('persons', 'persons.person_id = alumni.person_id'); 
        $this->db->order_by('feed_dt', 'DESC');
        $this->db->limit(15);       
        $query = $this->db->get();        
        return $query->result();
    }

    function loadLastHeadLine(){
        $this->db->from('headlines');
        $this->db->where('valid_from <=', date('Y-m-d H:i:s')); 
        $this->db->where('valid_to >=', date('Y-m-d H:i:s')); 
        $this->db->order_by('order', 'DESC');
        $this->db->limit(1);       
        $query = $this->db->get();        
        return ( $query->num_rows() >= 1 ) ? $query->row() : null;
    }

    function loadHeadLines(){
        $this->db->from('headlines');
        $this->db->where('valid_from <=', date('Y-m-d H:i:s')); 
        $this->db->where('valid_to >=', date('Y-m-d H:i:s')); 
        $this->db->order_by('order', 'DESC');
        $query = $this->db->get();        
        return ( $query->num_rows() >= 1 ) ? $query->result() : null;
    }

    function insertCountry($country_name) {
        $countryData = array('country_name'=>$country_name);
        $this->db->insert('countries', $countryData);
        return $this->db->insert_id();
    }

    function insertCity($city_name, $country_id) {
        $cityData = array('city_name'=>$city_name, 'country_id'=>$country_id);
        $this->db->insert('cities', $cityData);
        return $this->db->insert_id();
    }

    function insertOccupation($occupation) {
        $occupationData = array('description'=>$occupation);
        $this->db->insert('occupations', $occupationData);
        return $this->db->insert_id();
    }

    function insertCompany($company_name) {
        $companyData = array('company_name'=>$company_name);
        $this->db->insert('companies', $companyData);
        return $this->db->insert_id();
    }

    function insertEducationLevel($education_level) {
        $elData = array('education_level'=>$education_level);
        $this->db->insert('cities', $elData);
        return $this->db->insert_id();
    }

    function getAboutData($id){
        $this->db->from('alumni');
        $this->db->join('persons', 'persons.person_id = alumni.person_id'); 
        $this->db->join('countries', 'countries.country_id = alumni.current_country_id'); 
        $this->db->join('occupations', 'occupations.occupation_id = alumni.occupation_id'); 
        $this->db->join('cities', 'cities.city_id = alumni.current_city_id'); 
        $this->db->where('alumni_id', $id);        
        $query = $this->db->get();        
        return $query->row();        
     
    }

    function getAboutDataAdmin($id){
        $this->db->from('persons');
        $this->db->where('person_id', $id);        
        $query = $this->db->get();        
        return $query->row();        
     
    }

    function updatePerson($person_id, $field, $newvalue){
         $consulta = "  UPDATE persons
                        SET ".$field." = '$newvalue'
                        WHERE person_id = '$person_id'
                    ";
        $query = $this->db->query($consulta);
        $change = (( $this->db->affected_rows() == 1 ) ? true : false);
        return $change;
    }

    function addFeeds($alumni_id, $feed) {
        $feedData = array('feed'=>$feed,'alumni_id'=>$alumni_id, 'feed_dt'=>date("Y/m/d H:i:s"));
        $this->db->insert('feeds', $feedData);
        return $this->db->insert_id();
    }
    
    public function setSelect($field, $select){
        if($field == $select){
            return "selected";
        }
    }  
    
    public function setCheck($field, $select){
        if($field == $select){
            return "checked";
        }
    }      
}
