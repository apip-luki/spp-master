<?php

function is_logged_in()
{
	$CI = get_instance();

	if (!$CI->session->userdata('username')) {
		$CI->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Silahkan login terlebih dahulu!</div>');
		redirect('auth');
	} else {
		$level = $CI->session->userdata('level');
		$menu = $CI->uri->segment(1);
	}
}