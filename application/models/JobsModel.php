<?php
class JobsModel extends CI_Model{
                 
    public function countJobs(){
        $number = $this->db->count_all('jobs');
        return intval($number);
    }    
    
    public function getPagination($number_per_page, $seach){
        
        if($seach['title'] != ""){
          $this->db->or_like('title', $seach['title']);  
        }
        if($seach['location'] != ""){
          $this->db->or_like('city_name', $seach['location']);  
        }
        if($seach['internship'] != ""){
          $this->db->or_like('working_hours', $seach['internship']);  
        }
        if($seach['full-time'] != ""){
          $this->db->or_like('working_hours', $seach['full-time']);  
        }
        if($seach['part-time'] != ""){
          $this->db->or_like('working_hours', $seach['part-time']);  
        }        
        
        $this->db->join('persons', 'persons.person_id = jobs.person_id');  
        $this->db->join('cities', 'cities.city_id = jobs.city_id'); 
        $this->db->join('countries', 'countries.country_id = jobs.country_id');
        $this->db->where('jobs.date_exp >=', date('Y-m-d'));
        $this->db->order_by('jobs.date_posted', 'DESC');
        return $this->db->get('jobs', $number_per_page, $this->uri->segment(3));
    }    
    
    public function getPagArchive($number_per_page){                     
        $this->db->join('persons', 'persons.person_id = jobs.person_id');  
        $this->db->join('cities', 'cities.city_id = jobs.city_id'); 
        $this->db->join('countries', 'countries.country_id = jobs.country_id');
        $this->db->where('jobs.date_exp <=', date('Y-m-d'));
        $this->db->order_by('jobs.date_posted', 'DESC');
        return $this->db->get('jobs', $number_per_page, $this->uri->segment(3));
    }     
    
    public function addJob($data){
        $now = date('Y-m-d');
        $effectiveDate = date('Y-m-d', strtotime($now . "+3 months") );

        $this->db->insert('jobs', 
            array(
                'person_id' => $this->session->userdata('data')['person_id'], 
                'title' => $data['title'], 
                'description' => $data['description'],
                'company' => $data['company'],
                'working_hours' => $data['working_hours'],
                'city_id' => $data['city_id'],
                'country_id' => $data['country_id'],
                'date_posted' => $now,
                'date_exp' => $effectiveDate,
            ));        
        return $error = $this->db->error();
    }  
    
    public function applyJob($data){
        $this->db->insert('jobs_persons', 
            array(
                'person_id' => $this->session->userdata('data')['person_id'], 
                'jobs_id' => $data['jobs_id'], 
                'date_apply' => date('Y-m-d'), 
            ));        
        return $error = $this->db->error();
        
    }
}
