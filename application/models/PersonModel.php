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

    	$consulta = "	SELECT pe.first_name, pe.middle_name, pe.last_name, pe.second_last_name, pe.profile_id,  pe.email, pe.userid, pe.person_id, pe.pass_created,sch.school_id,sch.school_name
						FROM persons pe
						JOIN schools sch ON (pe.school_id = sch.school_id)
						WHERE pe.userid = '$userid'
					";

        $query = $this->db->query($consulta);
        $person = ( $query->num_rows() == 1 ) ? $query->row() : false;

        $query = $this->db->query("SELECT profile_description FROM profiles WHERE profile_id = '$person->profile_id';");
        $profile = ( $query->num_rows() == 1 ) ? $query->row() : false;

        $person->profile_description = strtolower($profile->profile_description);
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

    function insertPerson($personData) {
        $this->db->insert('persons', $personData);
        return $this->db->insert_id();
        //error_log($this->db->error());
    }

    function insertAlumni($alumniData) {
        $this->db->insert('alumni', $alumniData);
        return $this->db->insert_id();
    }

}
