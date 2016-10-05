<?php
class JobsModel extends CI_Model{
    
    public function getAllJobs(){    
        
        $this->db->from('jobs');
        $this->db->join('persons', 'persons.person_id = jobs.person_id');  
        $this->db->join('cities', 'cities.city_id = jobs.city_id'); 
        $this->db->join('countries', 'countries.country_id = jobs.country_id');
        $this->db->where('1');  
        return $this->db->get();
        
    }            
    
    public function countJobs(){
        $number = $this->db->count_all('jobs');
        return intval($number);
    }    
    
    public function getPagination($number_per_page, $seach){
        
        if($seach['title'] != ""){
          $this->db->like('title', $seach['title']);  
        }
        if($seach['location'] != ""){
          $this->db->like('city_name', $seach['location']);  
        }
        if($seach['internship'] != ""){
          $this->db->like('working_hours', $seach['internship']);  
        }
        if($seach['full-time'] != ""){
          $this->db->like('working_hours', $seach['full-time']);  
        }
        if($seach['part-time'] != ""){
          $this->db->like('working_hours', $seach['part-time']);  
        }        
        
        $this->db->join('persons', 'persons.person_id = jobs.person_id');  
        $this->db->join('cities', 'cities.city_id = jobs.city_id'); 
        $this->db->join('countries', 'countries.country_id = jobs.country_id');
        $this->db->order_by('date_posted', 'DESC');
        return $this->db->get('jobs', $number_per_page, $this->uri->segment(3));
    }    
    
}
