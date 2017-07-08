<?php

class PersonModel extends CI_Model {

    var $fist_name    ;
    var $last_name    ;
    var $middle_name  ;
    var $username     ;
    var $email        ;
    var $password     ;
    var $phone_number ;
    var $gender_id    ;
    var $profile_id   ;

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

        $qryPerson = "  SELECT a.alumni_id, a.status_id, a.image ,p.person_id, p.first_name, p.middle_name, p.last_name, p.email, p.username, p.phone_number, p.gender_id, g.gender, pr.profile_id, pr.profile_desc
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

    function getAllPersonsData(){
        $this->db->from('persons');
        $this->db->join('alumni', 'alumni.person_id = persons.person_id'); 
		$this->db->where('alumni.authorized =', 1);
     
        $query = $this->db->get();        
        return $query;
    }	
	
		
    function getPersonsDataLinkedIn($id){

        $qryPerson = "  SELECT a.alumni_id, a.status_id, a.image , p.person_id, p.first_name, p.middle_name, p.last_name, p.email, p.username, p.phone_number, p.gender_id, g.gender, pr.profile_id, pr.profile_desc
            FROM persons p
            JOIN profiles pr ON p.profile_id = pr.profile_id
            JOIN genders g ON p.gender_id = g.gender_id
            LEFT JOIN alumni a on a.person_id=p.person_id
            WHERE p.linkedin_id = '$id'";

        $query = $this->db->query($qryPerson);
        return ( $query->num_rows() == 1 ) ? $query->row_array() : false;
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

    function insertPerson($personData) {
        $this->db->insert('persons', $personData);
        return $this->db->insert_id();
        //error_log($this->db->error());
    }

    function insertAlumni($alumniData) {
        $this->db->insert('alumni', $alumniData);
        return $this->db->insert_id();
    }

    function validateEmail($email) {
        $query = $this->db->query("select 1 from persons where email=?",array($email));
        return ( $query->num_rows() >= 1 );
    }

    function validateUsername($username) {
        $query = $this->db->query("select 1 from persons where username=?",array($username));
        return ( $query->num_rows() >= 1 );
    }

}
