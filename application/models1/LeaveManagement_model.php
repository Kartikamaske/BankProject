<?php
  class LeaveManagement_model extends CI_Model {
    
    public function __construct()
      {
          $this->load->database();
      }



      public function getallleave()

      {      

           $user_id= $this->session->userdata('registrationId');
              $this->db->select('leave_master.*,registration_master.*');
              $this->db->join('registration_master','leave_master.fkregisterid = registration_master.registrationId','left'); 
              $this->db->from('leave_master');
              $this->db->where('leave_master.is_active','1');
              $this->db->where("leave_master.fkregisterid",$user_id); 
              // $this->db->order_by("leave_master.leaveid", "desc"); 
               $query = $this->db->get();
               return $query->result();
              
      }

      public function getleave(){
      
        $this->db->select('leave_master.*'); 
        $this->db->from('leave_master');
        $this->db->where('leave_master.is_active','1');
         $query = $this->db->get();
         return $query->result();

      }





      public function getuserid()
      {      
 
       // session used
       
       $user_id= $this->session->userdata('registrationId');
              $this->db->select('registration_master.*');
              $this->db->from('registration_master');
              $this->db->where('registration_master.is_active','1');
              $this->db->where('registration_master.registrationId',$user_id);
             
               $query = $this->db->get();
 
               return $query->result();
              
      }



      public function getallUserid($leaveid)
      {   
       //  $this->db->select('taskassignsub_master.*');

       $this->db->select('leave_master.*,registration_master.fname');
 
    //    $this->db->join('task_master','leave_master.fktaskID = task_master.taskId','left');
 
       // $this->db->join('taskassign_master','leave_master.fktaskassignId = taskassign_master.taskassignId','left');
 
       $this->db->join('registration_master','leave_master.fkregisterid = registration_master.registrationId','left'); 
 
        $this->db->from('leave_master');
 
        $this->db->where('leave_master.leaveid',$leaveid);
 
       //  $this->db->where('leave_master.is_active','1');
 
        $query = $this->db->get();
 
        return $query->result();
    
      }

    }