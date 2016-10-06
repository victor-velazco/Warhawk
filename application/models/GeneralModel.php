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
    
    function getPersonsData($userid){

    	$qryPerson = "	SELECT p.person_id, p.first_name, p.middle_name, p.last_name, p.email, p.username, p.phone_number, p.gender_id, g.gender, pr.profile_id, pr.profile_desc
						FROM persons p
						JOIN profiles pr ON p.profile_id = pr.profile_id
                        JOIN genders g ON p.gender_id = g.gender_id
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

    function loadCitiesByCountry($country_id){
        $query = $this->db->query("SELECT city_id, city_name from cities where country_id = " . $country_id);
        $cities = ( $query->num_rows() >= 1 ) ? $query->result() : null;

        return $cities;
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
