<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	// List View
	public function index()
	{
		$data['title'] = "Infinity Visit | Dashboard";
		$data['link'] = "";
		$data['script'] = array(
			// 'assets/js/Dashboard/dashboard_js_min.php'
		);
		$data['script_link'] = array(
			'assets/plugins/custom/datatables/datatables.bundle.js'
		);
			
		if ($this->session->userdata('user')) {
            $this->load->view('header_footer/header',$data);
			$this->load->view('Dashboard/dashboard');
			$this->load->view('header_footer/footer');
        }
        else{
            redirect(site_url('login'),'refresh');
        }
	}
}
