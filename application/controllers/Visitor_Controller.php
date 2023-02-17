<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	// List View
	public function index()
	{
		$data['title'] = "Infinity Visit | Visitor";
		$data['link'] = "";
		$data['script'] = array(
			// 'assets/js/Dashboard/dashboard_js_min.php'
		);
		$data['script_link'] = array(
			'assets/plugins/custom/datatables/datatables.bundle.js'
		);
			
		if ($this->session->userdata('user')) {
            $this->load->view('header_footer/header',$data);
			$this->load->view('Visitors/visitors');
			$this->load->view('header_footer/footer');
        }
        else{
            redirect(site_url('login'),'refresh');
        }
	}

	public function add_visitor()
	{
		if($this->session->userdata('user')){
			$data['title'] = "Infinity Visit | Add Visitor";
			$link['link'] = array();
			$script['script'] = array(
				// 'assets/js/Dealers/add_visitor_js.php'
			);
			$script['script_link'] = array();
			$this->load->view('header_footer/header',$data);
			$this->load->view('Visitors/add_visitor');
			$this->load->view('header_footer/footer',$script);
		}
		else{
			redirect(base_url('login'),'refresh');
		}
	}
}
