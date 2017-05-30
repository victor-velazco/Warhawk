<?php
    if (!$this->session->userdata('data')) {
        redirect("/");
    }
	if (isset($genders))
		$data['genders'] = $genders;
	if (isset($profiles))
		$data['profiles'] = $profiles;
	$this->load->view('template/front_end/header_simple');
	$this->load->view($the_view);
	$this->load->view('template/front_end/footer');
?>
