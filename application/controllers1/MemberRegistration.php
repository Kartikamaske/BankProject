<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberRegistration extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('registrationId')==0) {
    			redirect('ComLogin');
    		}
        $this->load->model('Memberregistration_model');
        
    }
	
	public function index()
	{
        $data['detailviewmember']=$this->Memberregistration_model->getdetailviewofmember();

		// $data['user']=$this->Memberregistration_model->getuserid();

        // $data['data']=$this->Memberregistration_model->getallleave();


        // echo "<pre>";
        // print_r($data);

		$this->load->view('common/header_view');
		$this->load->view('memberregistration/detailviewmemberReg',$data);
		$this->load->view('common/footer_view');

	}



    public function create()
	{

		// $data['data']=$this->Memberregistration_model->getmemberregistration();

        $data['State']=$this->Memberregistration_model->getstate();
        $data['City']=$this->Memberregistration_model->getcity();
        $data['Taluka']=$this->Memberregistration_model->gettaluka();



		// $data['user']=$this->Memberregistration_model->getuserid();
		
        // echo "<pre>";
        // print_r($data);

		$this->load->view('common/header_view');
		$this->load->view('memberregistration/memberregistrationcreate',$data);
		$this->load->view('common/footer_view');
	}


	
    function insertmember(){
		

		// $leaveid= $this->input->post('leaveid'); 
		 $membercode= $this->input->post('membercode');
		 $firstname= $this->input->post('firstname');
		 $middlename= $this->input->post('middlename');
		 $lastname= $this->input->post('lastname');
		 $fullname= $this->input->post('fullname');
		 $mobilenumber= $this->input->post('mobilenumber');
		 $address= $this->input->post('address');
		 $fkstate= $this->input->post('fkstate');
		 $fkcity= $this->input->post('fkcity');
		 $fktaluka= $this->input->post('fktaluka');
		 $pincode= $this->input->post('pincode');
		 $dateofbirth= $this->input->post('dateofbirth');
		 $adharnumber= $this->input->post('adharnumber');
		 $familychief= $this->input->post('familychief');
		 $memberPhotoPath= $this->input->post('memberPhotoPath');




        //   image code start
        
        $photo1 = '';  
        if($_FILES["photo1"]["name"] != '')  
        {  
            $photo1 = $this->upload_image1();  
        }  
        else  
        {  
            $photo1 = $this->input->post("hidden_photo1");  
        } 
        //   image code end
		
		  $fields=array(

			            //  'leaveid'=>$leaveid,
						 'membercode'=>$membercode,
						 'firstname'=>$firstname,
						 'middlename'=>$middlename,
						 'lastname'=>$lastname,
						 'fullname'=>$fullname,
						 'mobilenumber'=>$mobilenumber,
						 'address'=>$address,
						 'fkstate'=>$fkstate,
						 'fkcity'=>$fkcity,
						 'fktaluka'=>$fktaluka,
						 'pincode'=>$pincode,
						 'dateofbirth'=>$dateofbirth,
						 'adharnumber'=>$adharnumber,
						 'familychief'=>$familychief,
						 'photo1'=>$photo1,



				'created_date'=>date('Y-m-d H:i:s'),
				'created_by'=>1);
			// echo json_encode($fields);

		$this->Commonmodel->insertRecord("memberregistration_master",$fields);
	  } 


      function upload_image1()   
	  {  
		if(isset($_FILES["photo1"]))  
		  {  
			  if($_FILES["photo1"]["name"] != '')  
				{ 
			$extension = explode('.', $_FILES['photo1']['name']);  
			$new_name = rand() . '.' . $extension[1];  
			$destination = './upload/' . $new_name;  
			move_uploaded_file($_FILES['photo1']['tmp_name'], $destination);  
			return $new_name;  
			  }
		   }  
	  }

	  public function update(){

 
        $data['dataa']=$this->Memberregistration_model->getmemberupdate($this->uri->segment(3));
		$data['State']=$this->Memberregistration_model->getstate();
        $data['City']=$this->Memberregistration_model->getcity();
        $data['Taluka']=$this->Memberregistration_model->gettaluka();
		
		// $data['user']=$this->Memberregistration_model->getuserid();

		// $data['data']=$this->TaskcreationEdit_model->getalltaskforupdate();


        //  echo "<pre>";
		// print_r($data);

		$this->load->view('common/header_view');
		$this->load->view('memberregistration/memberregistrationcreate',$data);
		$this->load->view('common/footer_view');

      }


	  public function updatemember()

	  {


			$memberid= $this->input->post('memberid'); 
			$membercode= $this->input->post('membercode');
			$firstname= $this->input->post('firstname');
			$middlename= $this->input->post('middlename');
			$lastname= $this->input->post('lastname');
			$fullname= $this->input->post('fullname');
			$mobilenumber= $this->input->post('mobilenumber');
			$address= $this->input->post('address');
			$fkstate= $this->input->post('fkstate');
			$fkcity= $this->input->post('fkcity');
			$fktaluka= $this->input->post('fktaluka');
			$pincode= $this->input->post('pincode');
			$dateofbirth= $this->input->post('dateofbirth');
			$adharnumber= $this->input->post('adharnumber');
			$familychief= $this->input->post('familychief');

			$memberid = $this->input->post('memberid'); 

			$photo1=$this->input->post('photo1');
			$photo1='';
			 if ($_FILES["photo1"]["name"]!='') {
			   $photo1=$this->upload_image1();
			   # code...
			 }
			 else{
				 $photo1=$this->input->post("hidden_photo1");
			 }
		
        
			$fields=array(
				 
						 'memberid '=>$memberid,
						 'membercode'=>$membercode,
						 'firstname'=>$firstname,
						 'middlename'=>$middlename,
						 'lastname'=>$lastname,
						 'fullname'=>$fullname,
						 'mobilenumber'=>$mobilenumber,
						 'address'=>$address,
						 'fkstate'=>$fkstate,
						 'fkcity'=>$fkcity,
						 'fktaluka'=>$fktaluka,
						 'pincode'=>$pincode,
						 'dateofbirth'=>$dateofbirth,
						 'adharnumber'=>$adharnumber,
						 'familychief'=>$familychief,
						 'photo1'=>$photo1,
				
			      

			  'modified_date'=>date('Y-m-d H:i:s'),
			  'modified_by'=>1,
		   );
		//    echo "<pre>";
		//    print_r($fields);

		  $whereArray=array('memberid'=>$memberid);

          $this->Commonmodel->updateRecord("memberregistration_master",$fields,$whereArray);


    } 



	public function checkuserexist()
	{
	 $membercode=$this->input->post('membercode');
	 $count=$this->Memberregistration_model->checkMobileExist($membercode);
	 if($count>0)
	 {
	   echo 1;
	 }
	 else
	 {
	   echo 0;
	 }
	}



   
	
	 
	

}