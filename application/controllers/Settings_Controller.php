<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Calcutta");
	}
	// List View
	public function index()
	{
		$data['title'] = "Comfort Zone | User Types";
		$data['link'] = "";
		$data['script'] = array(
			'assets/js/Settings/user_type_list_js.php'
		);
		$data['script_link'] = array(
			'assets/plugins/custom/datatables/datatables.bundle.js'
		);
			
		if ($this->session->userdata('user')) {
            $this->load->view('header_footer/header',$data);
			$this->load->view('Settings/user_types');
			$this->load->view('header_footer/footer');
        }
        else{
            redirect(site_url('login'),'refresh');
        }
	}

	public function user_types_list() 
	{   
        $postData = $this->input->post();
        $data = $this->User_Type_model->getUserTypes($postData);
        echo json_encode($data);
    }

	public function add_user_type()
	{
		if($this->session->userdata('user')){
			$data['title'] = "Comfort Zone | Add User Type";
			$data['link'] = "";
			$script['script'] = array(
				'assets/js/Settings/add_user_type_js.php'
			);
			$script['script_link'] = array();
			$this->load->view('header_footer/header',$data);
			$this->load->view('Settings/add_user_type');
			$this->load->view('header_footer/footer',$script);
		}
		else{
			redirect(base_url('login'),'refresh');
		}
	}

	public function add_edit_user_type()
	{
		$post = $this->input->post();
		if (!empty($post)) {
			$data = array(
				'name' => ucwords(trim($post['name'])),
				'createdDate' => date('Y-m-d h:i:s')
			);
			if ($this->Custom_model->insertRow(USER_TYPE,$data)) {
				$bool = true;
				$message = "User Type inserted successfully";
			}
			else{
				$bool = false;
				$message = "Failed...";	
			}
		}
		else{
			$bool = false;
			$message = "Invalid..";
		}
		echo json_encode(array('success' => $bool, 'message' => $message));
	}

	public function delete_user_type()
    {
    	$id = $this->input->post('id');
    	$where = array('userTypeId' => $id);
    	if ($this->Custom_model->deleteRow(USER_TYPE,$where) == "done") {
    		echo json_encode(array(
    			'success' => true,
    			'message' => "User Type deleted successfully"
    		));
    	}
    	else{
	    	echo json_encode(array(
				'success' => false,
				'message' => "Failed to delete user type"
			));
    	}
    }
}