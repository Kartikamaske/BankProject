<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ComLogin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ComLogin_model');
        
    }

	public function index()
	{
		session_destroy();
		$data=$this->ComLogin_model->getallUser();
		// echo "<pre>";
		// print_r($data);
		$this->load->view('ComLogin/comLoginView');

	}


	public function login_validation()
	{ 

		$username =  $this->input->post('username');
        $password =  $this->input->post('password');
       // echo $Name;
       // echo $password;
          
        $data=$this->ComLogin_model->AdminLogin($username,$password);
        // echo "<pre>";
        //  print_r($data);

       
        if(!empty($data))
					{
						$newdata = array(
							
							'username'     => $username,
							'password'     => $data[0]->password,
							'registrationId'   => $data[0]->registrationId,
							
						
								);
							$this->session->sess_expiration = '10';
						$this->session->set_userdata($newdata);
						echo 1;
						
					}
					else
					{
						echo 2;
					}
	}
	
   
}