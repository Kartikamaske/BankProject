<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogin extends CI_Controller {
   public function __construct()
    {
        parent::__construct();
        
        $this->load->library('form_validation');
        
        $this->load->model('Login_model');
    }
	
	public function index()
	{ 
		$this->load->view('Adminlogin/adminlogin');
	}
	
	public function login_validation()
	{ 

		$Name =  $this->input->post('uname');
        $password =  $this->input->post('password');
       // echo $Name;
       // echo $password;
        
        $data=$this->Login_model->AdminLogin($Name,$password);
        // echo "<pre>";
        //  print_r($data);

       
        if(!empty($data))
					{
                      
						$newdata = array(
							
							
							'Name'     => $data[0]->Name,
							'password'     => $data[0]->password,
						
								);
						
						$this->session->set_userdata($newdata);
						echo 1;
						
					}
					else
					{
						echo 2;
					}
	}
	   public function logout()
	{
		session_destroy();
		
        // $this->load->view('Adminlogin/adminlogin');
        redirect('AdminLogin');

	}
	
}
