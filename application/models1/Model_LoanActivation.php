<?php  
if( ! defined('BASEPATH')) exit('No direct script access allowed');

	//require_once(APPPATH.'/interfaces/IBase.php');
	
	class Model_LoanActivation extends CI_Model 
	{
		public function __construct()
		{
			parent::__construct();	
		} 

	public function selectall()
	{					
		$this->db->query("SET SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
		$this->db->select('loan_activation.*,DATE_FORMAT(loan_activation.startDate,"%d/%m/%Y") as startDate,DATE_FORMAT(loan_activation.endDate,"%d/%m/%Y") as endDate,memberregistration_master.fullname,loantype_master.loantype_name,duration_master.durationName,');

	
		$this->db->join('memberregistration_master','memberregistration_master.memberid = loan_activation.fkmemberId','left outer');
		$this->db->join('loantype_master','loantype_master.loantype_id =loan_activation.fkloantypeId','left outer');
		
		$this->db->join('duration_master','duration_master.durationId = loan_activation.fkdurationId','left outer');
		
		$this->db->ORDER_BY('loan_activation.loanActivationId','desc');
		$this->db->where('loan_activation.is_active',1);
        $query = $this->db->get('loan_activation');
		return $query->result();

	}  
	public function updateinstall($tableName,$model)
		{
			return  $this->db->where('fkLoanActivationId',$model['fkLoanActivationId'])
					         ->update($tableName,$model);

		}
		public function insert($tableName,$model)
		{
			return $this->db->insert($tableName,$model);
		}  	

		public function insertMember($model)
		{
			return $this->db->insert('memberregistration_master',$model);
			return $this->db->insert_id();
		}			
		public function getrelationadata($loanActivationId){

			$this->db->select("loan_referancedata.referanceId,loan_referancedata.fkmemberId,memberregistration_master.fullname,loan_referancedata.refmobile,loan_referancedata.fkrelationId,loan_referancedata.fklicencetypeId,relation_master.relationName,loan_referancedata.attachment,loan_referancedata.loanInstaDateId");

			$this->db->join('relation_master','relation_master.relationId = loan_referancedata.fkrelationId','left outer');
			$this->db->join('memberregistration_master','memberregistration_master.memberid = loan_referancedata.referanceId','left outer');


			$this->db->from('loan_referancedata');
			$this->db->where('fkLoanActivationId',$loanActivationId);
			$this->db->where('loan_referancedata.is_active',1);
			$query=$this->db->get();
			return $query->result();
		}
		public function update($model)
		{
			return $sql=$this->db->where('LoanActivationId',$model['LoanActivationId'])
						  ->update('loan_activation',$model);

		} 

		public function delete($loanInstaDateId,$model)
		{
			return $query=$this->db->where('loanInstaDateId',$loanInstaDateId)
		
			->update('loan_referancedata',$model);
			
		}

		public function getrelationlist(){

			$this->db->select('relationId,relationName');
			$this->db->where('is_active',1);
        	$query = $this->db->get('relation_master');
        	return $query->result();
		}
		
		public function getreferlist(){

			$this->db->select('memberid,fullname');
			$this->db->where('is_active',1);
			$this->db->ORDER_BY('memberregistration_master.memberid','desc');
        	$query = $this->db->get('memberregistration_master');
        	return $query->result();
		}
		public function referemob($referanceId){

			$this->db->select('memberregistration_master.mobilenumber');
			$this->db->where('memberregistration_master.memberid',$referanceId);
			$this->db->where('is_active',1);
        	$query = $this->db->get('memberregistration_master');
        	return $query->result();
		}

		public function getbhishi($memberId){

			$this->db->select('bhishi_activation.bhishiActivationId,bhishitype_master.bhishiTypeName');
			$this->db->join('bhishitype_master','bhishitype_master.bhishiTypeId = bhishi_activation.fkbhishiTypeId','left outer');
			$this->db->where('bhishi_activation.fkmemberId',$memberId);
			$this->db->where('bhishi_activation.is_active',1);
        	$query = $this->db->get('bhishi_activation');
        	return $query->result();
		}
		public function search($loanActivationId)
		{
			$this->db->select('loan_activation.*,memberregistration_master.*,loantype_master.loantype_name,duration_master.durationName,loantype_master.loantype_value,loantype_master.loantype_id');

			$this->db->join('memberregistration_master','memberregistration_master.memberid = loan_activation.fkmemberId','left outer');
			$this->db->join('loantype_master','loantype_master.loantype_id =loan_activation.fkloanTypeId','left outer');
		
			$this->db->join('duration_master','duration_master.durationId = loan_activation.fkdurationId','left outer');
		
			$this->db->where('loan_activation.loanActivationId',$loanActivationId);
			$this->db->where('loan_activation.is_active',1);
        	$query = $this->db->get('loan_activation');
			return $query->result();

		}

		public function getMaxId()
		{
			return $this->db->select_max('loanActivationId')
					        ->get('loan_activation')->result();
		}


		public function CheckMemberCode($memberCode) 
		{
			$this->db->select("memberCode");
			$this->db->from('memberregistration_master');
			$this->db->where('memberCode',$memberCode);
			$this->db->where('is_active',1);
			$query = $this->db->get();
			return $query->result();
		}

		public function getDataByMemberCode($memberCode) 
		{
			$this->db->select("memberregistration_master.memberid,memberregistration_master.fullname");

			$this->db->from('memberregistration_master');
			$this->db->where('membercode',$memberCode);
			$query = $this->db->get();
			return $query->result();
		}



		public function MemId($memberId) 
		{
			$this->db->select("memberregistration_master.memberid,memberregistration_master.membercode");

			$this->db->from('memberregistration_master');
			$this->db->where('memberid',$memberId);
			$query = $this->db->get();
			return $query->result();
		}

		public function getautocomplete($fullName,$mobileNo)
    	{	


	        $this->db->select('memberregistration_master.memberid,memberregistration_master.fullname,memberregistration_master.mobilenumber,memberid');
	        // $this->db->group_start();
	        $this->db->like('fullname',$fullName);
	        // $this->db->or_like('memberCode',$memberCode);
	        $this->db->or_like('mobilenumber',$mobileNo);
	        // $this->db->group_end();
	        $this->db->from('memberregistration_master');
	        $this->db->where('is_active',1);
	        $this->db->ORDER_BY('memberregistration_master.memberid','desc'); 
	        $this->db->limit(10); 

	        $query=$this->db->get();
	        return $query->result();
	        // return $this->db->last_query();
    	}
		
		public function getInstallment(){

			$this->db->select('installmentTypeId,installmentTypeName');
        	$query = $this->db->get('installmenttype_master');
        	return $query->result();
		}
		public function bhishidetails($memberId,$bhishiActivationId,$startDate){

			$this->db->select("loan_activation.*,installmenttype_master.installmentTypeName,bhishitype_master.bhishiTypeName");
			$this->db->join('installmenttype_master','installmenttype_master.installmentTypeId = loan_activation.fkinstallmentTypeId','left outer');
			$this->db->join('bhishitype_master','bhishitype_master.bhishiTypeId = loan_activation.fkbhishiTypeId','left outer');
			$this->db->from('loan_activation');
			$this->db->where('loan_activation.fkmemberId',$memberId);
			$this->db->where('loan_activation.is_active',1);
			$query = $this->db->get();
			return $query->result();
			// return $this->db->last_query();
		}


		public function installdetails($fkmemberId,$bhishiActivationId){
$paid=[1,2];
		$this->db->select('member_installmentdates.mInstallmentDatesId,member_installmentdates.startDate,member_installmentdates.endDate,bhishitype_master.bhishiTypeName,installmenttype_master.installmentTypeName,bhishi_activation.installmentAmt,member_installmentdates.is_paid');
		$this->db->join('bhishi_activation','bhishi_activation.bhishiActivationId = member_installmentdates.fkbhishiActivationId','left outer');
		
		$this->db->join('bhishitype_master','bhishitype_master.bhishiTypeId = bhishi_activation.fkbhishiTypeId','left outer');

		$this->db->join('installmenttype_master','installmenttype_master.installmentTypeId = bhishi_activation.fkbhishiTypeId','left outer');
		$this->db->where('member_installmentdates.fkbhishiActivationId',$bhishiActivationId);
		$this->db->where('member_installmentdates.fkmemberId',$fkmemberId);
		// $this->db->where_in('member_installmentdates.is_paid',$paid);
		$this->db->where('bhishi_activation.is_active',1);
		  $this->db->where('member_installmentdates.is_active',1);
		$query = $this->db->get('member_installmentdates');
		return $query->result_array();
		// return $this->db->last_query();
		}
		// public function getDuration(){

		// 	$this->db->select('durationId,durationName');
  //       	$query = $this->db->get('duration_master');
  //       	return $query->result();
		// }


		public function getDuration($LoantypeId){

			$this->db->select("loantype_master.loantype_id,loantype_master.fkdurationId,duration_master.durationId,duration_master.durationName,duration_master.durationValue");

			$this->db->join('duration_master','duration_master.durationId = loantype_master.fkdurationId','left outer');

			$this->db->from('loantype_master');
			$this->db->where('loantype_id',$LoantypeId);
			$query=$this->db->get();
			return $query->result();
		}
		public function getInstallmentdates($loanActivationId){

			$this->db->select("loan_installmentdates.fkmemberId,startDate,endDate,fkloanActivationId,loan_installmentdates.is_paid");

			// $this->db->join('duration_master','duration_master.durationId = bhishitype_master.fkdurationId','left outer');

			$this->db->from('loan_installmentdates');
			$this->db->where('fkloanActivationId',$loanActivationId);
			$this->db->where('is_active',1);
			$query=$this->db->get();
			return $query->result();
		}
		public function InstallmentValue($fkinstallmentTypeId) 
		{
			$this->db->select("installmenttype_master.value");

			$this->db->from('installmenttype_master');
			$this->db->where('installmentTypeId',$fkinstallmentTypeId);
			$query = $this->db->get();
			return $query->result();
		}

		public function getloanType(){

			$this->db->select('loantype_id,loantype_name');
			$this->db->from('loantype_master');
			$this->db->where('is_active',1);
        	
        	$query = $this->db->get();
        	return $query->result();
		}

		public function getMemberType(){

			$this->db->select('memberTypeId,memberTypeName');
        	$query = $this->db->get('membertype_master');
        	return $query->result();
		}
		public function getMemberlist()
		{
			$this->db->select("memberregistration_master.memberid,memberregistration_master.fullName,memberregistration_master.membercode,memberregistration_master.mobilenumber");
			$this->db->from('memberregistration_master');
			$this->db->ORDER_BY('memberid','DESC');
			$this->db->where('is_active',1);
			$query = $this->db->get();
			return $query->result();
		}
		public function bhishpaidinfo($memberId,$bhishiActivationId,$mInstallmentDatesId)
		{
			$this->db->select("sum(instamtnow) as paidinsta,sum(penamtnow) as paidpen,instamt,penaltyamt");
			$this->db->from('bhishimemberpayment');
			$this->db->where('bhishimemberpayment.fkmemberId',$memberId);
			$this->db->where('bhishimemberpayment.fkbhishiActivationId',$bhishiActivationId);
			$this->db->where('bhishimemberpayment.mInstallmentDatesId',$mInstallmentDatesId);


			$this->db->where('bhishimemberpayment.is_active',1);
			$query = $this->db->get();
			return $query->result_array();
			// return  $this->db->last_query();
		}
		public function bhishpendiginfo($memberId,$bhishiActivationId,$mInstallmentDatesId)
		{
			$this->db->select("sum(instamtnow) as paidinsta,sum(penamtnow) as paidpen,instamt,penaltyamt");
			$this->db->from('bhishimemberpayment');
			$this->db->where('bhishimemberpayment.fkmemberId',$memberId);
			$this->db->where('bhishimemberpayment.fkbhishiActivationId',$bhishiActivationId);
			$this->db->where('bhishimemberpayment.mInstallmentDatesId',$mInstallmentDatesId);


			$this->db->where('bhishimemberpayment.is_active',1);
			$query = $this->db->get();
			return $query->result_array();
			// return  $this->db->last_query();
		}

		public function bhishunpaidinfo($memberId,$bhishiActivationId,$mInstallmentDatesId)
		{
			$this->db->select("bhishi_activation.installmentAmt,bhishi_activation.penaltyamt");
			$this->db->from('member_installmentdates');

			$this->db->join('bhishi_activation','bhishi_activation.bhishiActivationId = member_installmentdates.fkbhishiActivationId','left outer');
			$this->db->where('member_installmentdates.fkmemberId',$memberId);
			$this->db->where('member_installmentdates.fkbhishiActivationId',$bhishiActivationId);
			$this->db->where('member_installmentdates.mInstallmentDatesId',$mInstallmentDatesId);

			$this->db->where('bhishi_activation.is_active',1);
			$this->db->where('member_installmentdates.is_active',1);
			$query = $this->db->get();
			return $query->result_array();
			// return  $this->db->last_query();
		}
		

		public function getval($loanTypeId)
		{
			$this->db->select('loantype_master.loantype_id,loantype_master.loantype_name,loantype_master.loantype_value');
			$this->db->from('loantype_master');
			$this->db->where('loantype_master.loantype_id', $loanTypeId);
			$query = $this->db->get();
			return $query->result();
		}
}
?>		