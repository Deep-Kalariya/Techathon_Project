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
		$data['title'] = "Comfort Zone | Dashboard";
		$data['link'] = "";
		$data['script'] = array(
			// 'assets/js/Dashboard/dashboard_js_min.php'
		);
		$data['script_link'] = array(
			'assets/plugins/custom/datatables/datatables.bundle.js'
		);
		$count['total_visitors'] = $this->Custom_model->getTotalCount(VISITOR);
		$count['total_flats'] = $this->Custom_model->getTotalCount(FLAT);
		$count['total_users'] = $this->Custom_model->getTotalCount(USER);
		$count['total_user_types'] = $this->Custom_model->getTotalCount(USER_TYPE);
		if ($this->session->userdata('user')) {
            $this->load->view('header_footer/header',$data);
			$this->load->view('Dashboard/dashboard',$count);
			$this->load->view('header_footer/footer');
        }
        else{
            redirect(site_url('login'),'refresh');
        }
	}
}
