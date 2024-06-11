<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CombineReport extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('registrationId')==0) {
			redirect('ComLogin');
		}
    
        
        $this->load->model('CombineReport_model');
        
    }

    public function index()
	
	{

        
        $data['data']=$this->CombineReport_model->getalltaskdetails();

		// for table data show
        

        $data['running']=$this->CombineReport_model->getalltaskrunning();
        $data['runnings']=$this->CombineReport_model->getalltaskrunnings();

        $data['complete']=$this->CombineReport_model->getalltaskcompleted();
        $data['completes']=$this->CombineReport_model->getalltaskcompletedindivisual();

        $data['pending']=$this->CombineReport_model->getalltaskpending();


		$data['user']=$this->CombineReport_model->getuserid();

        // completed arrays
        $array1 = $data['completes'];
       $array2 = $data['complete'];


       $completedArray = array_merge($array1, $array2);

       $data['completed'] = $completedArray;


       // Running arrays
       $array1 = $data['runnings'];
       $array2 = $data['running'];

       // Combining arrays
       $combinedArray = array_merge($array1, $array2);

       // Load view and pass the combined array to the view
       $data['combinedArray'] = $combinedArray;

    // //    echo "<pre>";
    //    print_r( $data['completed']);


		$this->load->view('common/header_view',$data);

        $this->load->view('taskmanagement/CombineReport_view',$data);

		$this->load->view('common/footer_view');
	
	}
}