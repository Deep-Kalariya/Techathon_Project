<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flat_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Calcutta");
	}
	// List View
	public function index()
	{
		$data['title'] = "Comfort Zone | Flats";
		$data['link'] = "";
		$data['script'] = array(
			'assets/js/Flats/flat_list_js.php'
		);
		$data['script_link'] = array(
			'assets/plugins/custom/datatables/datatables.bundle.js'
		);
			
		if ($this->session->userdata('user')) {
            $this->load->view('header_footer/header',$data);
			$this->load->view('Flats/flats');
			$this->load->view('header_footer/footer');
        }
        else{
            redirect(site_url('login'),'refresh');
        }
	}

	public function flats_list() 
	{   
        $postData = $this->input->post();
        $data = $this->Flat_model->getFlats($postData);
        echo json_encode($data);
    }

	public function add_flat()
	{
		if($this->session->userdata('user')){
			$data['title'] = "Comfort Zone | Add Flat";
			$data['link'] = "";
			$script['script'] = array(
				'assets/js/Flats/add_edit_flat_js.php'
			);
			$script['script_link'] = array();
			$this->load->view('header_footer/header',$data);
			$this->load->view('Flats/add_flat');
			$this->load->view('header_footer/footer',$script);
		}
		else{
			redirect(base_url('login'),'refresh');
		}
	}

	public function edit_flat($id)
	{
		if($this->session->userdata('user')){
			$data['title'] = "Comfort Zone | Edit Flat";
			$data['link'] = "";
			$script['script'] = array(
				'assets/js/Flats/add_edit_flat_js.php'
			);
			$script['script_link'] = array();
			$data1['userData'] = $this->Custom_model->getSingleRow(FLAT,'flatid = '.$id);
			$this->load->view('header_footer/header',$data);
			$this->load->view('Flats/add_flat',$data1);
			$this->load->view('header_footer/footer',$script);
		}
		else{
			redirect(base_url('login'),'refresh');
		}
	}
	
	public function add_edit_flat()
	{
		$post = $this->input->post();
		if (!empty($post)) {
			$data = array(
				'name' => ucwords(trim($post['name'])),
				'mobileno' => trim($post['mobile']),
				'email' => trim($post['email']),
				'flatNo' => trim($post['flat_no']),
				'noOfYearToStay' => trim($post['no_of_year']),
				'noOfPerson' => trim($post['no_of_person']),
				'ownerBusiness' => trim($post['owner_business'])
			);
			if ($post['id'] != -1) {
    			$data['modifiedDate'] = date('Y-m-d h:i:s');
    			$where = array('flatid' => $post['id']);
    			if ($this->Custom_model->updateRow(FLAT,$data,$where)) {
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
    			if ($this->Custom_model->insertRow(FLAT,$data)) {
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

	public function delete_flat()
    {
    	$id = $this->input->post('id');
    	$where = array('flatid' => $id);
    	if ($this->Custom_model->deleteRow(FLAT,$where) == "done") {
    		echo json_encode(array(
    			'success' => true,
    			'message' => "Flat deleted successfully"
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
