<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Check_result extends CI_Controller
{
    	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$this->load->view('check_result');
		$this->load->view('footer');
	}
		
}
