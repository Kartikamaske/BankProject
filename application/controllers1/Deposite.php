<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deposite extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // if($this->session->userdata('registrationId')==0) {
    	// 		redirect('ComLogin');
    	// 	}
        $this->load->model('Deposite_model');
        
    }
	
	public function index()
	{
        // $data['detailviewmember']=$this->Memberregistration_model->getdetailviewofmember();
        // $data['membername']=$this->Deposite_model->getmembername();
        // $data['duration']=$this->Deposite_model->getduration();
        $data['detailsdeposite']=$this->Deposite_model->getdetailview();




        // echo "<pre>";
        // print_r($data);

		$this->load->view('common/header_view');
		$this->load->view('deposite/detailviewdeposite',$data);
		$this->load->view('common/footer_view');

	}


    public function create(){
        $data['membername']=$this->Deposite_model->getmembername();
        $data['duration']=$this->Deposite_model->getduration();

        $this->load->view('common/header_view');
		$this->load->view('deposite/depositecreate',$data);
		$this->load->view('common/footer_view');
    }


    public function selectmember()
    {
        $memberid = $this->input->post('fkkmemberid');
    
        $usertype = $this->Deposite_model->getmemberid($memberid);

    
        echo json_encode($usertype);
    }



    public function selectduration()
    {
        $duration_id = $this->input->post('duration_id'); 
    
        $usertype = $this->Deposite_model->getdurationid($duration_id);

    
        echo json_encode($usertype);
    }




    public function getdropdown()
    {
        $memberid = $this->input->post('memberid'); 
    
        $dropdownid = $this->Deposite_model->getdropdownid($memberid);
    
        echo json_encode($dropdownid);
    }



    public function get_dropdown_data() {
        $data=$this->Deposite_model->get_dropdown_data();

        echo json_encode($data);
    }
    




    function insertdeposite(){

		 $deposit_amount= $this->input->post('deposit_amount');
		 $fkmembername= $this->input->post('fkmembername');
		 $address= $this->input->post('address');
		 $mobilenumber= $this->input->post('mobilenumber');
		 $adharnumber= $this->input->post('adharnumber');
		 $deposit_amount= $this->input->post('deposit_amount');
		 $durationperiod= $this->input->post('durationperiod');
		 $start_date= $this->input->post('start_date');
		 $days_until_current_date= $this->input->post('days_until_current_date');
		 $interest_rate= $this->input->post('interest_rate');
		 $interest_amount= $this->input->post('interest_amount');
		 $totalamount= $this->input->post('totalamount');
		 $note= $this->input->post('note');
		 $currentdate= $this->input->post('currentdate');
		 $day_interest_amount= $this->input->post('day_interest_amount');



		
		  $fields=array(

			            //  'leaveid'=>$leaveid,
						 'fkmembername'=>$fkmembername,
						 'address'=>$address,
						 'mobilenumber'=>$mobilenumber,
						 'adharnumber'=>$adharnumber,
						 'deposit_amount'=>$deposit_amount,
						 'durationperiod'=>$durationperiod,
						 'start_date'=>$start_date,
						 'days_until_current_date'=>$days_until_current_date,
						 'interest_rate'=>$interest_rate,
						 'interest_amount'=>$interest_amount,
						 'totalamount'=>$totalamount,
						 'note'=>$note,
						 'currentdate'=>$currentdate,
						 'day_interest_amount'=>$day_interest_amount,




				'created_date'=>date('Y-m-d H:i:s'),
				'created_by'=>1);
			// echo json_encode($fields);

		$this->Commonmodel->insertRecord("deposite_master",$fields);
	  } 


      public function update(){

 
        $data['dataa']=$this->Deposite_model->getdurationidupdate($this->uri->segment(3));
        $data['membername']=$this->Deposite_model->getmembername();
        $data['duration']=$this->Deposite_model->getduration();

        //  echo "<pre>";
		// print_r($data);

		$this->load->view('common/header_view');
		$this->load->view('deposite/depositecreate',$data);
		$this->load->view('common/footer_view');

      }



      public function updatedeposite()

	  {


			$deposite_id= $this->input->post('deposite_id'); 
            $deposit_amount= $this->input->post('deposit_amount');
            // $fkmembername= $this->input->post('fkmembername');
            $address= $this->input->post('address');
            $mobilenumber= $this->input->post('mobilenumber');
            $adharnumber= $this->input->post('adharnumber');
            $deposit_amount= $this->input->post('deposit_amount');
            $durationperiod= $this->input->post('durationperiod');
            $start_date= $this->input->post('start_date');
            $days_until_current_date= $this->input->post('days_until_current_date');
            $interest_rate= $this->input->post('interest_rate');
            $interest_amount= $this->input->post('interest_amount');
            $totalamount= $this->input->post('totalamount');
            $note= $this->input->post('note');
            $currentdate= $this->input->post('currentdate');
            $day_interest_amount= $this->input->post('day_interest_amount');


		

			$deposite_id = $this->input->post('deposite_id'); 

			
		
        
			$fields=array(
				 
						 'deposite_id '=>$deposite_id,
                        //  'fkmembername'=>$fkmembername,
						 'address'=>$address,
						 'mobilenumber'=>$mobilenumber,
						 'adharnumber'=>$adharnumber,
						 'deposit_amount'=>$deposit_amount,
						 'durationperiod'=>$durationperiod,
						 'start_date'=>$start_date,
						 'days_until_current_date'=>$days_until_current_date,
						 'interest_rate'=>$interest_rate,
						 'interest_amount'=>$interest_amount,
						 'totalamount'=>$totalamount,
						 'note'=>$note,
						 'currentdate'=>$currentdate,
						 'day_interest_amount'=>$day_interest_amount,


                        'modified_date'=>date('Y-m-d H:i:s'),
                        'modified_by'=>1,
		   );
		//    echo "<pre>";
		//    print_r($fields);

		  $whereArray=array('deposite_id'=>$deposite_id);

          $this->Commonmodel->updateRecord("deposite_master",$fields,$whereArray);


    }



	function insertmodeldata(){
		

        $firstname= $this->input->post('firstname');
        $middlename= $this->input->post('middlename');
        $lastname= $this->input->post('lastname');
        $fullname= $this->input->post('fullname');
        $mobilenumber= $this->input->post('mobilenumber');
        $address= $this->input->post('address');
        $pincode= $this->input->post('pincode');
        $adharnumber= $this->input->post('adharnumber');
        $familychief= $this->input->post('familychief');

       
         $fields=array(

                       //  'leaveid'=>$leaveid,
                        'firstname'=>$firstname,
                        'middlename'=>$middlename,
                        'lastname'=>$lastname,
                        'fullname'=>$fullname,
                        'mobilenumber'=>$mobilenumber,
                        'address'=>$address,
                        'pincode'=>$pincode,
                        'adharnumber'=>$adharnumber,
                        'familychief'=>$familychief,



               'created_date'=>date('Y-m-d H:i:s'),
               'created_by'=>1);
           // echo json_encode($fields);

       $this->Commonmodel->insertRecord("memberregistration_master",$fields);
     } 



    //  public function getreportofmember(){
    //     $fkmembername = $this->input->post('fkmembername');
    //    $data['detailsdeposite']=$this->Deposite_model->getmemberreportdetailview($fkmembername);
        
    // //    echo "<pre>";
    // //     print_r($data);

    //   $i=1;
    //     foreach($data as $rw=>$value){
    //         echo "<tr>";
    //         echo "<td>".$i."</td>";
    //         echo "<td>".$value->fullname."</td>";
    //         echo "<td>".$value->address."</td>";
    //         echo "<td>".$value->adharnumber."</td>";
    //         echo "<td>".$value->mobilenumber."</td>";
    //         echo "<td>".$value->durationName."</td>";
    //         echo "<td>".$value->start_date."</td>";
    //         echo "<td>".$value->days_until_current_date."</td>";
    //         echo "<td>".$value->totalamount."</td>";



  
    //         echo "</tr>"; 
    //         $i++;                       
    //         }

    // }

// new
    public function getmemberdata(){
        $fkmembername = $this->input->post('fkmembername');
       $data=$this->Deposite_model->getalldataofmember($fkmembername);
        
  
$i=1;
        foreach($data as $rw=>$value){
            echo "<tr>";
            echo "<td>".$i."</td>";
            echo "<td>".$value->fullname."</td>";
            echo "<td>".$value->address."</td>";
            echo "<td>".$value->adharnumber."</td>";
            echo "<td>".$value->mobilenumber."</td>";
            echo "<td>".$value->durationName."</td>";
            echo "<td>".$value->start_date."</td>";
            echo "<td>".$value->days_until_current_date."</td>";
            echo "<td>".$value->totalamount."</td>";

           
  
            echo "</tr>"; 
            $i++;                       
            }

    }

	

}