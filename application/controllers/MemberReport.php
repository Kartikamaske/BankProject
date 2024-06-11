<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberReport extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MemberReport_model');
    }

	public function index()
	{
       
        $data['membername']=$this->MemberReport_model->getmembername();


        // echo "<pre>";
        // print_r($data);


        $this->load->view('common/header_view');
		$this->load->view('Reportmember/memberreport_view',$data);
        $this->load->view('common/footer_view');
	}


   


    public function getallreport(){
        $fkmembername = $this->input->post('fkmembername');
       $data['detailsdeposite']=$this->MemberReport_model->getalldataonsearch($fkmembername);
        
    //    echo "<pre>";
    //     print_r($data);

        foreach($data['detailsdeposite'] as $rw=>$value){
            echo "<tr>";
            echo "<td>".$value->deposite_id."</td>";
            echo "<td>".$value->fullname."</td>";
            echo "<td>".$value->address."</td>";
            echo "<td>".$value->adharnumber."</td>";
            echo "<td>".$value->mobilenumber."</td>";
            echo "<td>".$value->duration_name."</td>";
            echo "<td>".$value->start_date."</td>";
            echo "<td>".$value->days_until_current_date."</td>";
            echo "<td>".$value->totalamount."</td>";

       
  
            echo "</tr>";                        
            }

    }


        // report for deposite member 
    public function getreportofmember(){
        $fkmembername = $this->input->post('fkmembername');
       $data['detailsdeposite']=$this->MemberReport_model->getalldataofmember($fkmembername);
        
    //    echo "<pre>";
    //     print_r($data);

        foreach($data as $rw=>$value){
            echo "<tr>";
            echo "<td>".$value->deposite_id."</td>";
            echo "<td>".$value->fullname."</td>";
            echo "<td>".$value->address."</td>";
            echo "<td>".$value->adharnumber."</td>";
            echo "<td>".$value->mobilenumber."</td>";
            echo "<td>".$value->durationName."</td>";
            echo "<td>".$value->start_date."</td>";
            echo "<td>".$value->days_until_current_date."</td>";
            echo "<td>".$value->totalamount."</td>";

           
  
            echo "</tr>";                        
            }

    }


    public function GetData(){
        $fkmembername = $this->input->post('fkmemberId');
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');
        $data=$this->MemberReport_model->memberReport($fkmembername,$startDate,$endDate);
        // echo '<pre>';
        // print_r($data);
        echo json_encode($data);
    }

}
