<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('registrationId')==0) {
// 			redirect('ComLogin');
            redirect(base_url('ComLogin'));
		}
        
        $this->load->model('Attendance_model');
        
    }
	
	public function index()
	{
        $data['data']=$this->Attendance_model->getallAttendance();
		$data['user']=$this->Attendance_model->getallUser();
        // echo "<pre>";
        // print_r($data);
		$this->load->view('common/header_view',$data);
		$this->load->view('Attendance/attendanceReport_view',$data);
		$this->load->view('common/footer_view');
	}
    public function create()
	{
        $data['user']=$this->Attendance_model->getallUser();
        $data['dataa']=$this->Attendance_model->getallAttendanceById($this->uri->segment(3));

		//   echo "<pre>";
        //   print_r($data);

		$this->load->view('common/header_view',$data);
		$this->load->view('Attendance/attendance_view',$data);
		$this->load->view('common/footer_view');
	}

	public function update()
	{
        $data['dataa']=$this->Attendance_model->getallAttendanceById($this->uri->segment(3));
		$data['user']=$this->Attendance_model->getallUser();
        // echo "<pre>";
        // print_r($data);
		$this->load->view('common/header_view',$data);
		$this->load->view('Attendance/attendance_view',$data);
		$this->load->view('common/footer_view');
	}
	
   

	function insertAttendance(){
		$startdate= $this->input->post('startdate'); 
		$starttime= $this->input->post('starttime');
		$registrationId= $this->input->post('registrationId');

		$resDt=$this->Attendance_model->checkdt($startdate,$registrationId);
		
		 if(!empty($resDt))
		{
			echo  1;
		}
		else
		{
			$fields=array(
				'startdate'=>$startdate,
				'starttime'=>$starttime,
				'fkregisterid'=>$registrationId,
		
		
			'created_date'=>date('Y-m-d H:i:s'),
			'created_by'=>1);
			echo json_encode($fields);

			// echo "<pre>";
			// print_r($fields);

			$this->Commonmodel->insertRecord("attendance_master",$fields);	
			
				echo 0 ;
		}
		
	  } 
	   

	 public function updateAttendance(){

		$enddate = $this->input->post('enddate'); 
		$endtime = $this->input->post('endtime'); 
		$attendFlag=$this->input->post('attendFlag');
		$registrationId= $this->input->post('fkregisterid');
			
			$attendId = $this->input->post('attendId'); 

			// $res=$this->Attendance_model->checkFlag($attendId);
			
			$res=$this->Attendance_model->checkFlag($enddate,$registrationId);
			
			print_r(count($res));

				if(count($res)==0){
					

					$fields=array(
			            'attendId'=>$attendId,
			            'enddate'=>$enddate,
			            'endtime'=>$endtime,
						// 'fkregisterid'=>$registrationId,
						'attendFlag'=>$attendFlag,


						'modified_date'=>date('Y-m-d H:i:s'),
						'modified_by'=>1,
		   			);

					
					echo 1;
					// print_r($fields);

					$whereArray=array('attendId'=>$attendId);
					$this->Commonmodel->updateRecord("attendance_master",$fields,$whereArray);

				}
				else{

					echo 2;
					return false;
					
				}
				
				// $whereArray=array('attendId'=>$attendId);
				// $this->Commonmodel->updateRecord("attendance_master",$fields,$whereArray);	
				
			
	  }
	


}