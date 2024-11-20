<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends App_Controller
{
	public function index()
	{
		$data['view_path'] = '';
		$data['page_title'] = '';
		$data['page_heading'] = '';
		$data['navlink'] = '';
		$data['scripts'] = [];
		$this->load->view('pages/home', $data);
	}

	public function not_found()
	{
		$data['view_path'] = 'pages/not_found';
		$data['page_title'] = 'Page Not Found - Fixed Assets Application';
		$data['page_heading'] = 'Page Not Found';
		$data['navlink'] = 'home';
		$this->load->view('layout', $data);
	}
}
