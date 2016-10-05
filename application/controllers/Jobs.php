<?php

class Jobs extends CI_Controller{
    
    public function index(){
        $config['base_url'] = base_url() . 'index.php/jobs/index/';
        $config['total_rows'] = $this->JobsModel->countJobs();
        $config['per_page'] = 200;   
        $config['uri_segment'] = 3;
        $config['num_links'] = 5;        
        $config['prev_link'] = '<span class="glyphicon glyphicon-backward"></span>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<span class="glyphicon glyphicon-forward"></span>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';          
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';   
        $config['cur_tag_open'] = '<li class="active"><a href="#!">';
        $config['cur_tag_close'] = '</a></li>';
        
        $this->pagination->initialize($config);
        
        if ($this->input->method() == 'post'){
            $search['title'] = $this->input->post('title');
            $search['category'] = $this->input->post('category');
            $search['location'] = $this->input->post('location');
            $search['internship'] = $this->input->post('internship');
            $search['full-time'] = $this->input->post('full-time');
            $search['part-time'] = $this->input->post('part-time');
        }else{
            $search = 0;
        }
        
        $result = $this->JobsModel->getPagination($config['per_page'], $search);         
        
        $data['jobs'] = $result;
        $data['pagination'] = $this->pagination->create_links();

        $data['title'] = 'Warhawk Global Connect Site';
        $data['the_view'] = 'jobs';             
        $data['genders'] = $this->JobsModel->GeneralModel->loadGenders();
        $data['profiles'] = $this->JobsModel->GeneralModel->loadProfilesNoAdmin();
        $this->load->view('template/template', $data);    
    }        
}