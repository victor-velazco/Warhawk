<?php

class Agenda extends CI_Controller{
    
    public function index($year = null, $month = null){
                
        if(!$year){
            $year = date('Y');
        }
        if(!$month){
            $month = date('m');
        }

        //si el año y el mes al que queremos acceder es menor que el actual no dejamos
        if($this->uri->segment(3).'/'.$this->uri->segment(4) < date('Y').'/'.date('m'))
    	{
            redirect(base_url('index.php/agenda/index/'.date('Y').'/'.date('m')));
    	}        
                   
        $data['calendario'] = $this->CalModel->ShowCalendar($year, $month);
        $data['eventos'] = $this->CalModel->getAllEventos($year, $month);
        
        $data['title'] = 'Warhawk Global Connect Site';
        $data['the_view'] = 'calendar';        
        $data['genders'] = $this->CalModel->GeneralModel->loadGenders();
        $data['profiles'] = $this->CalModel->GeneralModel->loadProfilesNoAdmin();
        
        $this->load->view('template/template', $data);                       
    }
    
    public function add(){        
        $data = array(
            'fecha' => $this->input->post('fecha'),
            'evento'=>$this->input->post('evento')
        );
        
        $error = $this->CalModel->addEvento($data);
        if ($error['code'] === 0){
            //echo '<div class="card-panel green darken-3">Evento registrado correctamente!</div>';
            //redirect(base_url('agenda/index/'.$this->uri->segment(3).'/'.$this->uri->segment(4) . '#acciones'));
            
        }else{
            //echo '<div class="card-panel red accent-4">Error al registrar el Evento!</div>';
            //redirect(base_url('agenda/index/'.$this->uri->segment(3).'/'.$this->uri->segment(4) . '#acciones'));
        }        
        
        //Either you can print value or you can send value to database
        //echo json_encode($data);        
    }
    
    public function del(){
        $id = $this->uri->segment(3);
        $year = $this->uri->segment(4);
        $month = $this->uri->segment(5);
        $this->CalModel->delEventos($id);
        $this->session->set_flashdata('msg', '<div class="card-panel green darken-3">Evento borrado correctamente!</div>');
        redirect(base_url(). 'agenda/index/' . $year . '/' . $month . '#acciones');  
    }     
}