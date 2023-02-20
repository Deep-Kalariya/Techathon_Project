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

	public function visitors_list() 
	{   
        $postData = $this->input->post();
        $data = $this->Visitor_model->getVisitors($postData);
        echo json_encode($data);
    }

	public function add_visitor()
	{
		if($this->session->userdata('user')){
			$data['title'] = "Infinity Visit | Add Visitor";
			$data['link'] = "";
			$script['script'] = array(
				'assets/js/Visitors/add_edit_visitor_js.php'
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

	public function edit_visitor($id)
	{
		if($this->session->userdata('user')){
			$data['title'] = "Infinity Visit | Edit Visitor";
			$data['link'] = "";
			$script['script'] = array(
				'assets/js/Users/add_edit_user_js.php'
			);
			$script['script_link'] = array();
			$data1['userData'] = $this->Custom_model->getSingleRow(VISITOR,'id = '.$id);
			$this->load->view('header_footer/header',$data);
			$this->load->view('Users/add_user',$data1);
			$this->load->view('header_footer/footer',$script);
		}
		else{
			redirect(base_url('login'),'refresh');
		}
	}

	public function add_edit_visitor()
	{
		$post = $this->input->post();
		if (!empty($post)) {
			$data = array(
				'name' => ucwords(trim($post['name'])),
				'email' => trim($post['email']),
				'mobileNo' => trim($post['mobile']),
				'password' => trim($post['password']),
				'userTypeId' => trim($post['user_type']),
				'flatId' => trim($post['flat_no']),
				'workingTime' => trim($post['working_time']),
				'shift' => trim($post['shift'])
			);
			if ($post['id'] != -1) {
    			$data['modifiedDate'] = date('Y-m-d h:i:s');
    			$where = array('id' => $post['id']);
    			if ($this->Custom_model->updateRow(VISITOR,$data,$where)) {
    				$bool = true;
    				$message = "Data updated successfully";
    			}
    			else{
    				$bool = false;
    				$message = "Failed...";	
    			}
    		}
    		else{
    			$data['createdDate'] = date('Y-m-d h:i:s');
    			$data['modifiedDate'] = date('Y-m-d h:i:s');
    			if ($this->Custom_model->insertRow(VISITOR,$data)) {
    				$bool = true;
    				$message = "Data Inserted Successfully";
    			}
    			else{
    				$bool = false;
    				$message = "Failed...";	
    			}
    		}
		}
		else{
			$bool = false;
			$message = "Invalid..";
		}
		echo json_encode(array('success' => $bool, 'message' => $message));
	}

	public function delete_visitor()
    {
    	$id = $this->input->post('id');
    	$where = array('id' => $id);
    	if ($this->Custom_model->deleteRow(VISITOR,$where) == "done") {
    		echo json_encode(array(
    			'success' => true,
    			'message' => "Visitor deleted successfully"
    		));
    	}
    	else{
	    	echo json_encode(array(
				'success' => false,
				'message' => "Failed to delete user"
			));
    	}
    }
}
