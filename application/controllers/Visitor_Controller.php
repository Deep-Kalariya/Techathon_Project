<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Calcutta");
	}
	// List View
	public function index()
	{
		$data['title'] = "Comfort Zone | Visitor";
		$data['link'] = "";
		$data['script'] = array(
			'assets/js/Visitors/visitor_list_js.php'
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
			$data['title'] = "Comfort Zone | Add Visitor";
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
			$data['title'] = "Comfort Zone | Edit Visitor";
			$data['link'] = "";
			$script['script'] = array(
				'assets/js/Visitors/add_edit_visitor_js.php'
			);
			$script['script_link'] = array();
			$data1['userData'] = $this->Custom_model->getSingleRow(VISITOR,'id = '.$id);
			$this->load->view('header_footer/header',$data);
			$this->load->view('Visitors/add_visitor',$data1);
			$this->load->view('header_footer/footer',$script);
		}
		else{
			redirect(base_url('login'),'refresh');
		}
	}

	public function add_edit_visitor()
	{
		$post = $this->input->post();
		// if (!empty($post)) {
			$fileInfo = pathinfo($_FILES['photo']['name']);
			$photo = time().$fileInfo['dirname'].$fileInfo['extension'];
			$config['upload_path'] = "assets/upload/";
	        $config['allowed_types'] = 'gif|jpg|jpeg|png';
	        $config['file_name'] = time().$photo;
	        $this->upload->initialize($config);
	        if ($this->upload->do_upload('photo'))
	        {
	        	$imgData = $this->upload->data();
	        	$path = base_url('assets/upload/');
	        	$filename = $imgData['file_name'];
				$data = array(
					'visitorName' => ucwords(trim($post['visitor_name'])),
					'mobileNo' => trim($post['mobile']),
					'noOfVisitor' => trim($post['no_of_visitor']),
					'flatid' => trim($post['flat_no']),
					'whomToMeet' => trim($post['whom_to_meet']),
					'address' => trim($post['address']),
					'purpose' => trim($post['purpose']),
					'entryTime' => date('h:i', strtotime($post['entry_time'])),
					'photo' => $filename,
					'visitedDate' => date('Y-m-d', strtotime($post['visited_date']))
				);
				if ($post['id'] != -1) {
					$data['exitTime'] = date('h:i', strtotime($post['exit_time']));
					$data['outTime'] = date('h:i', strtotime($post['out_time']));
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
	    			$data['exitTime'] = null;
					$data['outTime'] = null;
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
		// }
		// else{
		// 	$bool = false;
		// 	$message = "Invalid..";
		// }
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
