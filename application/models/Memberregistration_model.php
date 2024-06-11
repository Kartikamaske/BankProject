<?php
  class Memberregistration_model extends CI_Model {
    
    public function __construct()
      {
          $this->load->database();
      }


      public function getmemberregistration(){
      
        $this->db->select('memberregistration_master.*'); 
        $this->db->from('memberregistration_master');
        $this->db->where('memberregistration_master.is_active','1');
         $query = $this->db->get();
         return $query->result();

      }

      public function getdetailviewofmember(){
      
        $this->db->select('memberregistration_master.*'); 
        $this->db->from('memberregistration_master');
        $this->db->where('memberregistration_master.is_active','1');
        $this->db->order_by('memberregistration_master.memberid', 'desc');
         $query = $this->db->get();
         return $query->result();

      }

      public function getstate()
    {      
     
            $this->db->select('state_master.stateId,state_master.stateName'); 
            $this->db->from('state_master');
            $this->db->where('state_master.is_active','1');
             $query = $this->db->get();
             return $query->result();
            
    }

    public function getcity()
    {      
     
            $this->db->select('city_master.cityId,city_master.cityName'); 
            $this->db->from('city_master');
            $this->db->where('city_master.is_active','1');
             $query = $this->db->get();
             return $query->result();
            
    }

    public function gettaluka()
    {      
     
            $this->db->select('taluka_master.talukaId,taluka_master.talukaName'); 
            $this->db->from('taluka_master');
            $this->db->where('taluka_master.is_active','1');
             $query = $this->db->get();
             return $query->result();
            
    }


    public function getmemberupdate($memberid)
      {   
       //  $this->db->select('taskassignsub_master.*');

       $this->db->select('memberregistration_master.*');
 
        $this->db->from('memberregistration_master');
 
        $this->db->where('memberregistration_master.memberid',$memberid);
 
       //  $this->db->where('memberregistration_master.is_active','1');
 
        $query = $this->db->get();
 
        return $query->result();
    
      }


    
        // public function checkMobileNumber($membercode) {
        //     $this->db->where('membercode', $membercode);
        //     $query = $this->db->get('memberregistration_master'); // Replace 'your_table' with your actual table name
    
        //     return $query->num_rows() > 0;
        // }

        public function checkMobileExist($membercode){
          return $sql=$this->db->get_where('memberregistration_master',['membercode'=>$membercode])->num_rows();
        }






      

    }