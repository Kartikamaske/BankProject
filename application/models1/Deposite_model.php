<?php
  class Deposite_model extends CI_Model {
    
    public function __construct()
      {
          $this->load->database();
      }


      public function getmemberid($memberid)
      {
          $this->db->select('memberregistration_master.memberid,memberregistration_master.address,memberregistration_master.firstname,memberregistration_master.mobilenumber,memberregistration_master.adharnumber');
          $this->db->from('memberregistration_master');
          $this->db->where('memberregistration_master.memberid', $memberid);
          // $this->db->order_by('memberregistration_master.memberid', 'desc');
          $query = $this->db->get();
          return $query->result();
      }




      public function getdurationid($duration_id)
      {
          $this->db->select('duration_master.durationId,duration_master.durationName,duration_master.durationValue');
          $this->db->from('duration_master');
          $this->db->where('duration_master.durationId', $duration_id);
          // $this->db->order_by('duration_master.duration_id', 'desc');
          $query = $this->db->get();
          return $query->result();
      }
      

       public function getmembername()
       {      
     
            $this->db->select('memberregistration_master.*'); 
            $this->db->from('memberregistration_master');
            $this->db->where('memberregistration_master.is_active','1');
             $query = $this->db->get();
             return $query->result();
            
      }

      public function getduration()
      {      
    
           $this->db->select('duration_master.*'); 
           $this->db->from('duration_master');
           $this->db->where('duration_master.is_active','1');
            $query = $this->db->get();
            return $query->result();
           
     }


     public function getdurationidupdate($deposite_id)
     {   
      //  $this->db->select('taskassignsub_master.*');

      $this->db->select('deposite_master.*,memberregistration_master.firstname,memberregistration_master.memberid,memberregistration_master.fullname,duration_master.durationName');

      $this->db->join('memberregistration_master','deposite_master.fkmembername = memberregistration_master.memberid','left'); 

      $this->db->join('duration_master','deposite_master.durationperiod = duration_master.durationId','left');

       $this->db->from('deposite_master');

       $this->db->where('deposite_master.deposite_id',$deposite_id);

      //  $this->db->where('deposite_master.is_active','1');

       $query = $this->db->get();

       return $query->result();
   
     }



      public function getdetailview(){
      
        $this->db->select('deposite_master.*,DATE_FORMAT(deposite_master.start_date,"%d/%m/%Y") as start_date,DATE_FORMAT(deposite_master.days_until_current_date,"%d/%m/%Y") as days_until_current_date,memberregistration_master.firstname,memberregistration_master.memberid,memberregistration_master.fullname,duration_master.durationName'); 
        // $this->db->select('task_master.*,group_master.groupName');
          $this->db->join('memberregistration_master','deposite_master.fkmembername = memberregistration_master.memberid','left'); 

          $this->db->join('duration_master','deposite_master.durationperiod = duration_master.durationId','left');  

        $this->db->from('deposite_master');
        $this->db->where('deposite_master.is_active','1');
          $this->db->order_by('deposite_master.deposite_id', 'desc');
         $query = $this->db->get();
         return $query->result();

      }




      public function getdropdownid()
      {
          $this->db->select('memberregistration_master.*');
          $this->db->from('memberregistration_master');
          $this->db->where('memberregistration_master.memberid');
        // $this->db->where('memberregistration_master.is_active','1');
          // $this->db->order_by('memberregistration_master.memberid', 'desc');
          $query = $this->db->get();
          return $query->result();
      }



      public function get_dropdown_data() {
        $this->db->select('memberregistration_master.memberid,memberregistration_master.firstname,memberregistration_master.mobilenumber,memberregistration_master.middlename,memberregistration_master.lastname');
        $this->db->from('memberregistration_master');
       
        $query = $this->db->get();
        return $query->result();
        
    }

      // for report
    public function getmemberreportdetailview($fkmembername){
      
      $this->db->select('deposite_master.*,memberregistration_master.firstname,memberregistration_master.memberid,memberregistration_master.fullname,duration_master.durationName'); 

      $this->db->join('memberregistration_master','deposite_master.fkmembername = memberregistration_master.memberid','left'); 

       $this->db->join('duration_master','deposite_master.durationperiod = duration_master.durationId','left');  

      $this->db->from('deposite_master');
      $this->db->where('deposite_master.is_active','1');
      $this->db->where('fkmembername',$fkmembername);
        $this->db->order_by('deposite_master.deposite_id', 'desc');
       $query = $this->db->get();
       return $query->result();

    }


    
    public function getalldataofmember($fkmembername){
      
      $this->db->select('deposite_master.*,DATE_FORMAT(deposite_master.start_date,"%d/%m/%Y") as start_date,DATE_FORMAT(deposite_master.days_until_current_date,"%d/%m/%Y") as days_until_current_date,memberregistration_master.firstname,memberregistration_master.memberid,memberregistration_master.fullname,duration_master.durationName'); 

      $this->db->join('memberregistration_master','deposite_master.fkmembername = memberregistration_master.memberid','left'); 

       $this->db->join('duration_master','deposite_master.durationperiod = duration_master.durationId','left');  

      $this->db->from('deposite_master');
      $this->db->where('deposite_master.is_active','1');
      $this->db->where('fkmembername',$fkmembername);
        $this->db->order_by('deposite_master.deposite_id', 'desc');
       $query = $this->db->get();
       return $query->result();

    }
    

  




    
        






      

    }