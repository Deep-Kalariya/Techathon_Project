<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$data['title'] = "Infinity Visit | Login";
		$link['link'] = array();
		$script['script'] = array(
			'assets/js/Login/login_js.php'
		);
		$script['script_link'] = array();
		$this->load->view('Login/login',$data);
		$this->load->view('header_footer/footer',$script);
	}
	public function select_data(){
		$post = $this->input->post();
		$where = array('email' => $post['email'], 'password' => $post['password'], 'userTypeId' => $post['user_type']);
		$check = $this->Custom_model->checkAvailability(USER, $where);
		if($check > 0) {
			$this->session->set_userdata('user',$post['email']);
			echo json_encode(array(
				'success' => true,
				'message' => 'Successfully Login'
			));
		}
		else{
			echo json_encode(array(
				'success' => false,
				'message' => 'Email or Password Invalid'
			));
		}
	}
	public function logout()
	{
		if($this->session->unset_userdata('user'))
		{
			redirect(base_url('login'),'refresh');
		}
		else{
			redirect(base_url('dashboard'),'refresh');
		}
	}
}
