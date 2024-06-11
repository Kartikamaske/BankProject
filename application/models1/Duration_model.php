<?php
  class Duration_model extends CI_Model {
    
    public function __construct()
      {
          $this->load->database();
      }


     
  
     public function getallDuration()
     {      
      
             $this->db->select('duration_master.*');

            //  $this->db->join('country_master','duration_master.fkcountry  = country_master.countryId','left');
             $this->db->from('duration_master');
             $this->db->where('duration_master.is_active','1');
            //  $this->db->order_by("student_master.id", "desc"); 
              $query = $this->db->get();
              return $query->result();
             
     }

    //    Edit 
     public function getallDurationByid($durationId)
     {   
       $this->db->select('duration_master.*');
       $this->db->from('duration_master');
       $this->db->where('duration_master.durationId',$durationId );
       $this->db->where('duration_master.is_active','1');
       $query = $this->db->get();
       return $query->result();
   
     }


    //    get all registration

    public function getallUsers()
    {      
     
            $this->db->select('registration_master.*');

           //  $this->db->join('country_master','duration_master.fkcountry  = country_master.countryId','left');
            $this->db->from('registration_master');
            $this->db->where('registration_master.is_active','1');
           //  $this->db->order_by("student_master.id", "desc"); 
             $query = $this->db->get();
             return $query->result();
            
    }
}
?>