<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

   function getUsers($postData=null){

     $response = array();

     ## Read value
     $draw = $postData['draw'];
     $start = $postData['start'];
     $rowperpage = $postData['length']; // Rows display per page
     $columnIndex = $postData['order'][0]['column']; // Column index
     $columnName = $postData['columns'][$columnIndex]['data']; // Column name
     $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
     $searchValue = $postData['search']['value']; // Search value
     if ($columnName == 'Name') {
        $columnName = 'visitorName';
     }
     else {
        $columnName = 'createdDate';
     }
     ## Search 
     $searchQuery = "";
     if($searchValue != ''){
        $searchQuery = " (visitorName like '%".$searchValue."%' or createdDate like '%".$searchValue."%') ";
     }

     ## Total number of records without filtering
     $this->db->select('count(*) as allcount');
     $records = $this->db->get(VISITOR)->result();
     $totalRecords = $records[0]->allcount;

     ## Total number of record with filtering
     $this->db->select('count(*) as allcount');
     if($searchQuery != '')
        $this->db->where($searchQuery);
     $records = $this->db->get(VISITOR)->result();
     $totalRecordwithFilter = $records[0]->allcount;

     ## Fetch records
     $this->db->select('*');
     if($searchQuery != '')
        $this->db->where($searchQuery);
     $this->db->order_by($columnName, $columnSortOrder);
     $this->db->limit($rowperpage, $start);
     $records = $this->db->get(VISITOR)->result();

     $data = array();

     foreach($records as $record ){
        $userName = $this->Custom_model->getSingleValue(USER,'name','userid = '.$record->userid);
        $flatNo = $this->Custom_model->getSingleValue(FLAT,'flatNo','flatNo = '.$record->flatid);
        $data[] = array( 
           "Id"=>$record->userid,
           "Flat No"=>$flatNo,
           "User"=>$userName,
           "Name"=>$record->name,
           "Mobile"=>$record->mobileNo,
           "Email"=>$record->email,
           "Working Time"=>$record->workingTime,
           "Shift"=>$record->shift,
           "Create Date"=>date("d-m-Y", strtotime($record->createdDate)),
           "Login Date"=>date("d-m-Y", strtotime($record->loginDate))
        ); 
     }

     ## Response
     $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
     );

     return $response; 
   }
}