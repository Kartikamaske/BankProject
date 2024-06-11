<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LeaveManagement extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('registrationId')==0) {
    			redirect('ComLogin');
    		}
        $this->load->model('LeaveManagement_model');
        
    }
	
	public function index()
	{
        // $data['data']=$this->LeaveManagement_model->getleave();

		$data['user']=$this->LeaveManagement_model->getuserid();

        $data['data']=$this->LeaveManagement_model->getallleave();


        // echo "<pre>";
        // print_r($data);

		$this->load->view('common/header_view',$data);
		$this->load->view('LeaveManagement/leave_detailsview',$data);
		$this->load->view('common/footer_view');

	}
    public function create()
	{

		$data['data']=$this->LeaveManagement_model->getleave();

		$data['user']=$this->LeaveManagement_model->getuserid();
		
        // echo "<pre>";
        // print_r($data);
		$this->load->view('common/header_view',$data);
		$this->load->view('LeaveManagement/leaveManagement_view',$data);
		$this->load->view('common/footer_view');
	}


	
    function insertleave(){
		

		// $leaveid= $this->input->post('leaveid'); 
		 $leave_start_date= $this->input->post('leave_start_date');
		 $leave_end_date= $this->input->post('leave_end_date');
		 $leave_reason= $this->input->post('leave_reason');
		 $fkregisterid= $this->input->post('registrationId');

		
		  $fields=array(

			            //  'leaveid'=>$leaveid,
						 'leave_start_date'=>$leave_start_date,
						 'leave_end_date'=>$leave_end_date,
						 'leave_reason'=>$leave_reason,
						 'fkregisterid'=>$fkregisterid,

				'created_date'=>date('Y-m-d H:i:s'),
				'created_by'=>1);
			// echo json_encode($fields);

		$this->Commonmodel->insertRecord("leave_master",$fields);
	  } 


	  public function update(){

 
        $data['dataa']=$this->LeaveManagement_model->getallUserid($this->uri->segment(3));
		
		$data['user']=$this->LeaveManagement_model->getuserid();

		// $data['data']=$this->TaskcreationEdit_model->getalltaskforupdate();


        //  echo "<pre>";
		// print_r($data);

		$this->load->view('common/header_view',$data);
		$this->load->view('LeaveManagement/leaveManagement_view',$data);
		$this->load->view('common/footer_view');

      }


	  public function updateleave()

	  {


			$leaveid= $this->input->post('leaveid'); 
			$leave_start_date= $this->input->post('leave_start_date');
			$leave_end_date= $this->input->post('leave_end_date');
			$leave_reason= $this->input->post('leave_reason');
			$fkregisterid= $this->input->post('registrationId');



			$leaveid = $this->input->post('leaveid'); 
		
        
			$fields=array(
				 
						 'leaveid '=>$leaveid,
						 'leave_start_date'=>$leave_start_date,
						 'leave_end_date'=>$leave_end_date,
						 'leave_reason'=>$leave_reason,
						 'fkregisterid'=>$fkregisterid,
				
			      

			  'modified_date'=>date('Y-m-d H:i:s'),
			  'modified_by'=>1,
		   );
		//    echo "<pre>";
		//    print_r($fields);

		  $whereArray=array('leaveid'=>$leaveid);

          $this->Commonmodel->updateRecord("leave_master",$fields,$whereArray);


    } 



   
	
	 
	

}