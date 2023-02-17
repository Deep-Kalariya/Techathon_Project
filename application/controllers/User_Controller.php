<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	// List View
	public function index()
	{
		$data['title'] = "Infinity Visit | Users";
		$data['link'] = "";
		$data['script'] = array(
			'assets/js/Users/users_list_js.php'
		);
		$data['script_link'] = array(
			'assets/plugins/custom/datatables/datatables.bundle.js'
		);
			
		if ($this->session->userdata('user')) {
            $this->load->view('header_footer/header',$data);
			$this->load->view('Users/users');
			$this->load->view('header_footer/footer');
        }
        else{
            redirect(site_url('login'),'refresh');
        }
	}

	public function users_list() 
	{   
        $postData = $this->input->post();
        $data = $this->User_model->getUsers($postData);
        echo json_encode($data);
    }

	public function add_user()
	{
		if($this->session->userdata('user')){
			$data['title'] = "Infinity Visit | Add User";
			$link['link'] = array();
			$script['script'] = array(
				// 'assets/js/Dealers/add_visitor_js.php'
			);
			$script['script_link'] = array();
			$this->load->view('header_footer/header',$data);
			$this->load->view('Users/add_user');
			$this->load->view('header_footer/footer',$script);
		}
		else{
			redirect(base_url('login'),'refresh');
		}
	}
}
