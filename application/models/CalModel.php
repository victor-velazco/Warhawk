<?php

class CalModel extends CI_Model{
    
    public function ShowCalendar($year, $month){

        $prefs = array(
                'start_day' => 'monday',
                'show_next_prev'  => TRUE,
                'next_prev_url'   => base_url(). 'index.php/agenda/index/',
        );

        $prefs['template'] = '

            {table_open}<table border="0" cellpadding="0" cellspacing="0" class="table-bordered" id="calendario">{/table_open}

            {heading_row_start}<tr>{/heading_row_start}

            {heading_previous_cell}<th class="text-center"><a href="{previous_url}"><i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i></a></th>{/heading_previous_cell}
            {heading_title_cell}<th colspan="{colspan}" class="text-center"><h4>{heading}</h4></th>{/heading_title_cell}
            {heading_next_cell}<th class="text-center"><a href="{next_url}"><i class="fa fa-arrow-right fa-2x" aria-hidden="true"></a></th>{/heading_next_cell}

            {heading_row_end}</tr>{/heading_row_end}

            {week_row_start}<tr>{/week_row_start}
            {week_day_cell}<td class="blue darken-4 white-text">{week_day}</td>{/week_day_cell}
            {week_row_end}</tr>{/week_row_end}

            {cal_row_start}<tr class="dias">{/cal_row_start}
            {cal_cell_start}<td class="dia">{/cal_cell_start}

            {cal_cell_start_today}<td class="dia">{/cal_cell_start_today}
            {cal_cell_start_other}<td class="dia">{/cal_cell_start_other}

            {cal_cell_content}
                <div class="num_dia">{day}</div>
                <div class="contenido">{content}</div>
            {/cal_cell_content}

            {cal_cell_content_today}
                <div class="hoy">{day}</div>
                <div class="contenido_hoy">{content}</div>
            {/cal_cell_content_today}

            {cal_cell_no_content}
                <div class="num_dia">{day}</div>
            {/cal_cell_no_content}

            {cal_cell_no_content_today}
                <div class="highlight">{day}</div>
            {/cal_cell_no_content_today}

            {cal_cell_blank}&nbsp;{/cal_cell_blank}

            {cal_cell_other}{day}{/cal_cel_other}

            {cal_cell_end}</td>{/cal_cell_end}
            {cal_cell_end_today}</td>{/cal_cell_end_today}
            {cal_cell_end_other}</td>{/cal_cell_end_other}
            {cal_row_end}</tr>{/cal_row_end}

            {table_close}</table>{/table_close}';   

        $this->load->library('calendar', $prefs);
        $data = $this->getEventos($year, $month);
        
        return $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4), $data);
               
    }
    
    public function addEvento($data){
        $this->db->insert('eventos', 
            array(
                'fecha' => $data['fecha'], 
                'evento' => $data['evento'],
            ));        
        return $error = $this->db->error();
    }     
    
    public function getEventos($year, $month){
        $this->db->like('date', "$year-$month", 'after');
        $query = $this->db->get('events');

        $datos_cal = array();

        foreach ($query->result() as $row) 
        {
            //si el primer número encontrado a partir del octavo
            //encontrado en la fecha es un cero, es decir, los días 
            //01,02,03 etc le quitamos el 0 y mostramos el siguiente número
            //si no lo hacemos así nuestro calendario no mostrará los resultados
            //de los días del 1 al 9
            $index = ltrim(substr($row->fecha, 8, 2), '0');
            //datos calendario contiene la fila del comentario del evento de ese día
            $datos_cal[$index] = $row->evento;
           
        }
        //devolvemos los datos y así ya podemos pasarle estos datos al método genera_calendario($year, $month)
        return $datos_cal;
    }

    public function getAllEventos($year, $month){
        $this->db->order_by("date", "desc");
        $this->db->like('date', "$year-$month", 'after');
        $data = $this->db->get('events');
        return $data;
    }    
    
    public function delEventos($id){
        $this->db->where('events_id', $id);
        $this->db->delete('events');        
    }    
}