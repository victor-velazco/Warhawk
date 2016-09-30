<?php
	$this->load->helper('url');
	if(!$this->session->userdata('login')){
		redirect("/welcome");
		//header('Location: ' . $this->config->base_url());
		#echo "No session, or session expired";
	}
	$this->load->view('dashboard/front_end/header');
	if (isset($side))
		$this->load->view($side);
	$this->load->view('template/front_end/js_scripts');
	$this->load->view($body);
	
	$this->load->view('dashboard/front_end/footer');
?>
