<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat_model extends CI_Model {  
  
	function add_message($message, $from, $to, $nickname, $guid)
	{
		$data = array(
			'from_person_id'	=> (int) $from,
			'to_person_id'	=> (int) $to,			
			'message'	=> (string) $message,
			'nickname'	=> (string) $nickname,
			'guid'		=> (string)	$guid,
			'timestamp'	=> time(),
		);
		  
		$this->db->insert('messages', $data);
	}

	function get_messages($timestamp, $from, $to)
	{
		$this->db->where('timestamp >', $timestamp);
		$this->db->where('from_person_id =', $from);
		$this->db->where('to_person_id =', $to);	
		$this->db->order_by('timestamp', 'DESC');
		$this->db->limit(10); 
		$query = $this->db->get('messages');
		
		return array_reverse($query->result_array());
	}

}