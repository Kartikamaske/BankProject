<?php
  class MemberReport_model extends CI_Model {
    
    public function __construct()
      {
          $this->load->database();
      }


      // dropdown fetch
      public function getmembername()
       {      
     
            $this->db->select('memberregistration_master.*'); 
            $this->db->from('memberregistration_master');
            $this->db->where('memberregistration_master.is_active','1');
             $query = $this->db->get();
             return $query->result();
            
      }



      // for only one person
      public function memberReport($fkmembername,$startDate,$endDate){



        $this->db->select('deposite_master.*,DATE_FORMAT(deposite_master.start_date,"%d/%m/%Y") as start_date,DATE_FORMAT(deposite_master.days_until_current_date,"%d/%m/%Y") as days_until_current_date,memberregistration_master.firstname,memberregistration_master.memberid,memberregistration_master.fullname,duration_master.durationName'); 

        $this->db->join('memberregistration_master','deposite_master.fkmembername = memberregistration_master.memberid','left'); 

         $this->db->join('duration_master','deposite_master.durationperiod = duration_master.durationId','left');  
        $this->db->where('deposite_master.is_active','1');
        $this->db->from('deposite_master');

        if($fkmembername>0){
          $this->db->where('deposite_master.fkmembername',$fkmembername);

         }

          //  $this->db->where('deposite_master.days_until_current_date >=', $startDate);
          //  $this->db->where('deposite_master.days_until_current_date <=', $endDate);

           $this->db->where('days_until_current_date >=', $startDate);
           $this->db->where('days_until_current_date <=', $endDate);  


         $query = $this->db->get();
         return $query->result();

      }




      // public function Enquiry_by_Date1($fkstatusId,$startDate,$endDate,$fkworkId,$fkworkSubId,$fkcontactPerson,$fkjobId)
      // {
      //     $this->db->select('enquiryId,enquiryName,enquiry_master.mobileNo,DATE_FORMAT(enquiryDate,"%d-%m-%Y") as enquiryDate,enquiry_master.remark,enquiry_master.fkworkId,fkemployeeId,work_master.workName ,employee_master.employeeName,worksubmaster_master.worksubmasterName,contactPersonNm,job_master.jobName');
      //         $this->db->from('enquiry_master');
      //  $this->db->join('job_master','enquiry_master.fkjobId  = job_master.jobId','left');
 
      //  $this->db->join('employee_master','enquiry_master.fkemployeeId  = employee_master.employeeId','left');
      //  $this->db->join('work_master','enquiry_master.fkworkId  = work_master.workId','left');
      //  $this->db->join('worksubmaster_master','enquiry_master.fkworkId  = worksubmaster_master.worksubmasterId','left');
      // //  $this->db->join('job_master','enquiry_master.fkjobId  = job_master.jobId','left');
      //      $this->db->where('enquiry_master.is_active','1');
      //      if ($fkstatusId>0) {
      //           $this->db->where('enquiry_master.fkstatusId', $fkstatusId);
      //      }
      //        if ($fkworkId>0) {
      //           $this->db->where('enquiry_master.fkworkId', $fkworkId);
      //      }
      //        if ($fkworkSubId>0) {
      //           $this->db->where('enquiry_master.fkworkSubId', $fkworkSubId);
      //      }
      //      if ($fkcontactPerson>0) {
      //           $this->db->where('enquiry_master.enquiryId', $fkcontactPerson);
      //      }
      //      if ($fkjobId>0) {
      //           $this->db->where('enquiry_master.fkjobId', $fkjobId);
      //      }
         
      //      // $this->db->where('fkworkId', $fkworkId);
      //      $this->db->where('enquiryDate >=', $startDate);
      //      $this->db->where('enquiryDate <=', $endDate);               
      //      // $this->db->order_by('orderId', 'DESC');
      //      $query = $this->db->get();
      //      return $query->result();
 
      //      // return $this->db->last_query();
 
      // }













          // for all data report on search button
      public function getalldataonsearch($fkmembername){
      
        $this->db->select('deposite_master.*,memberregistration_master.firstname,memberregistration_master.memberid,memberregistration_master.fullname,duration_master.durationName'); 

        $this->db->join('memberregistration_master','deposite_master.fkmembername = memberregistration_master.memberid','left'); 

         $this->db->join('duration_master','deposite_master.durationperiod = duration_master.duration_id','left');  

        $this->db->from('deposite_master');
        $this->db->where('deposite_master.is_active','1');
        // $this->db->where('fkmembername',$fkmembername);
          $this->db->order_by('deposite_master.deposite_id', 'desc');
         $query = $this->db->get();
         return $query->result();

      }


        // report for deposite member 
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