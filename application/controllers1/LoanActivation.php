 <?php  
class LoanActivation extends CI_Controller
{
	public function __construct()
	{		
		parent::__construct();
		if($this->session->userdata('registrationId')==0) {
			redirect('ComLogin');
		}
		$this->load->model('Model_LoanActivation');	
	} 
	public function index() 
	{
		$data['data']=$this->Model_LoanActivation->selectall();
		// echo "<pre>";
		// print_r($data);
		
	$this->load->view('common/header_view');
		$this->load->view("LoanActivation/LoanActivationDetails_view",$data);
		$this->load->view('common/footer_view');
	}


	public function create()
	{
		$obj='';
		$data['Installmentdata']=array();
		$loanActivationId =$this->uri->segment(3);

				
		if($loanActivationId > 0){
			$obj = $this->Model_LoanActivation->search($loanActivationId);
			
			$data['Installmentdata']=$this->Model_LoanActivation->getInstallmentdates($loanActivationId);
			$data['Relationdata']=$this->Model_LoanActivation->getrelationadata($loanActivationId);
		}

		$data['data']=$obj;

		
		$data['Installment']=$this->Model_LoanActivation->getInstallment();
		$data['loanType']=$this->Model_LoanActivation->getloanType();
		$data['MemberType']=$this->Model_LoanActivation->getMemberType();
		$data['relation']=$this->Model_LoanActivation->getrelationlist();
		$data['referlist']=$this->Model_LoanActivation->getreferlist();

// echo "<pre>";
// 		print_r($data);

	$this->load->view('common/header_view');
		$this->load->view("LoanActivation/LoanActivation_view",$data);
		$this->load->view('common/footer_view');

	 	// print_r($data['loanType']);
	}	

	function fetch()
 	{
			$fullName= $this->input->post('fullName');
			// $memberCode= $this->input->post('memberCode');
			$mobileNo= $this->input->post('mobileNo');

			$data=$this->Model_LoanActivation->getautocomplete($fullName,$mobileNo);
			echo json_encode($data);
 	}

 	
	public function InstallmentValue(){
		$fkinstallmentTypeId = $this->input->post('fkinstallmentTypeId');
		$data = $this->Model_LoanActivation->InstallmentValue($fkinstallmentTypeId);
		 print_r(json_encode($data));
		
	}

	public function CheckMemberCode(){
		$memberCode = $this->input->post('memberCode');
		$data = $this->Model_LoanActivation->CheckMemberCode($memberCode);
		 print_r(json_encode($data));
		
	}

	public function getMemberlist(){
		$data=$this->Model_LoanActivation->getMemberlist();
		 print_r( json_encode($data));
		
	}

	public function referemob(){
		$referanceId = $this->input->post('referanceId');
		$data=$this->Model_LoanActivation->referemob($referanceId);
		 print_r( json_encode($data));
		
	}
	public function getbhishi(){
		$memberId = $this->input->post('memberId');
		$data=$this->Model_LoanActivation->getbhishi($memberId);
		 print_r( json_encode($data));
		
	}

	function fetchdata()
	{
		   $fullName= $this->input->post('fullName');
		//    $memberCode= $this->input->post('memberCode');
		   $mobileNo= $this->input->post('mobileNo');

		   $data=$this->Model_LoanActivation->getautocomplete($fullName,$mobileNo);
		   echo json_encode($data);
	}


	public function getDuration(){
		$fkloantypeId = $this->input->post('fkloantypeId');
		$data = $this->Model_LoanActivation->getDuration($fkloantypeId);
		 print_r( json_encode($data));
		
	}
public function bhishidetails(){
	$output='';
		$memberId = $this->input->post('memberId');
		$bhishiActivationId = $this->input->post('bhishiActivationId');
		$startDate = $this->input->post('startDate');
		$data = $this->Model_LoanActivation->installdetails($memberId,$bhishiActivationId,$startDate);
		// print_r($data);
		$output.='<table class="table table-bordered thead-primary">';
			$output.='<thead><tr>';
$output.='<th>Sr.</th>';
$output.='<th>installment date </th>';
$output.='<th> installment </th>';
$output.='<th style="width: 24%;">Penalty</th>';
$output.='<th style="width: 15%;">Paid Inst</th>';
$output.='<th style="width: 15%;">Paid Penalty</th>';
$output.='<th style="width: 15%;">Remain Inst. </th>';
$output.='<th style="width: 15%;">Remain Penalty. </th>';

			$output.='</tr></thead>';
			$output.='<tbody>';
			$no=0;
			$totinstaamt=0;
			$totpaidaamt=0;
			$totremaamt=0;
		for ($i=0; $i <count($data) ; $i++) { 
++$no;

$startDate = date("d-m-Y", strtotime($data[$i]['startDate']));
$endDate = date("d-m-Y", strtotime($data[$i]['endDate']));
			if ($data[$i]['is_paid']==1) {
				$paid = $this->Model_LoanActivation->bhishpaidinfo($memberId,$bhishiActivationId,$data[$i]['mInstallmentDatesId']);
				$output.='<tr style="background-color:green;color:white;">';
				$output.='<td>'.$no.'</td>';
				$output.='<td>'.$startDate.' To '.$endDate.' </td>';
				$output.='<td>'.$paid[0]['instamt'].'</td>';
				$output.='<td>'.$paid[0]['penaltyamt'].'</td>';
				
				$output.='<td>'.$paid[0]['paidinsta'].'</td>';
				$output.='<td>'.$paid[0]['paidpen'].'</td>';
				$output.='<td>0</td>';
				$output.='<td>0 </td>';
			$output.='</tr>';
			$totinstaamt=$totinstaamt+$paid[0]['instamt'];

			$totpaidaamt=$totpaidaamt+$paid[0]['paidinsta'];
			$totremaamt=$totremaamt+0;
				// print_r($paid);
			}else if ($data[$i]['is_paid']==2) {


				$paid = $this->Model_LoanActivation->bhishpendiginfo($memberId,$bhishiActivationId,$data[$i]['mInstallmentDatesId']);
				$output.='<tr style="background-color:#ff4700;color:white;">';
				$output.='<td>'.$no.'</td>';
				$output.='<td>'.$startDate.' To '.$endDate.' </td>';
				$output.='<td>'.$paid[0]['instamt'].'</td>';
				$output.='<td>'.$paid[0]['penaltyamt'].'</td>';
				$output.='<td>'.$paid[0]['paidinsta'].'</td>';
				$output.='<td>'.$paid[0]['paidpen'].'</td>';

				$instapend=0;
				$penamt=0;
				$instapend=$paid[0]['instamt']-$paid[0]['paidinsta'];
				if ($paid[0]['paidpen']>0) {
					$penamt=$paid[0]['paidpen']-$paid[0]['paidpen'];
				}

				$output.='<td>'.$instapend.'</td>';
				$output.='<td>'.$penamt.'</td>';
				$totinstaamt=$totinstaamt+$paid[0]['instamt'];
				$totpaidaamt=$totpaidaamt+$paid[0]['paidinsta'];
				$totremaamt=$totremaamt+$instapend;
			$output.='</tr>';
			
			}else{
				$paid = $this->Model_LoanActivation->bhishunpaidinfo($memberId,$bhishiActivationId,$data[$i]['mInstallmentDatesId']);
				

				$output.='<tr style="background-color:#a51515;color:white;">';
				$output.='<td>'.$no.'</td>';
				$output.='<td>'.$startDate.' To '.$endDate.' </td>';
				$output.='<td>'.$paid[0]['installmentAmt'].'</td>';
				$output.='<td>'.$paid[0]['penaltyamt'].'</td>';
				$output.='<td>0</td>';
				$output.='<td>0</td>';

				

				$output.='<td>'.$paid[0]['installmentAmt'].'</td>';
				$output.='<td>'.$paid[0]['penaltyamt'].'</td>';
				
				
				$totinstaamt=$totinstaamt+$paid[0]['installmentAmt'];
			$totpaidaamt=$totpaidaamt+0;

			$totremaamt=$totremaamt+$paid[0]['installmentAmt'];
			$output.='</tr>';

			}
		}

		$output.='<tr>';
		$output.='<td ></td>';
		$output.='<td style="font-size: 17px;font-weight: 700;">Total </td>';
$output.='<td style="font-size: 17px;font-weight: 700;">'.$totinstaamt.' Rs.</td>';
$output.='<td ></td>';
$output.='<td style="font-size: 17px;font-weight: 700;">'.$totpaidaamt.' Rs.</td>';
$output.='<td ></td>';
$output.='<td style="font-size: 17px;font-weight: 700;">'.$totremaamt.' Rs.</td>';
$output.='<td ></td>';


			$output.='</tr>';
			$output.='</tbody>';


		echo $output;
		 // print_r(json_encode($data));
		
	}

	public function performMemberpopup()
	{	
		$Member_id=$this->input->post('Member_id');
		$memberCode=$this->input->post('memberCode');
		$firstName=$this->input->post('firstName');
		$middelName=$this->input->post('middelName');
		$lastName=$this->input->post('lastName');
		$fullName=$this->input->post('fullName');
		$address=$this->input->post('address');
		$pincode=$this->input->post('pincode');
		$mobileNo=$this->input->post('mobileNo');
		$adharNo=$this->input->post('adharNo');
		$fkmemberTypeId=$this->input->post('fkmemberTypeId');
		$familyChief=$this->input->post('familyChief');

		$datapopup=[
                 'memberCode'	   	=> $memberCode,
                 'firstName'		=> $firstName,
                 'middelName'		=> $middelName,
                 'lastName'			=> $lastName,
                 'fullName'			=> $fullName,
                 'address'			=> $address,
                 'pincode'			=> $pincode,
                 'mobileNo'			=> $mobileNo,
                 'adharNo'			=> $adharNo,
                 'fkmemberTypeId'	=> $fkmemberTypeId,
                 'familyChief'		=> $familyChief,
                 'created_by'	   => $_SESSION['registrationId'],
                 'created_date'    => date('Y-m-d H:i:s')
      ];
     $this->Model_LoanActivation->insertMember($datapopup);
   }

	
	public function perform()
	{
		$LoanActivationId=$this->input->post('txt_id');
		$fkmemberId=$this->input->post('fkmemberId');

		$fkloantypeId=$this->input->post('fkloantypeId');
		$startDate=$this->input->post('startDate');
        $fkdurationId=$this->input->post('fkdurationId');
        $endDate=$this->input->post('endDate');
        $fkinstallmentTypeId=$this->input->post('fkinstallmentTypeId');

        $installmentno=$this->input->post('installmentno');
        $installmentenddate=$this->input->post('installmentenddate');
        
        $excludeorinclude=$this->input->post('excludeorinclude');
		$interestper=$this->input->post('interestper');
		$interestamt=$this->input->post('interestamt');
		$interetotalstamt=$this->input->post('interetotalstamt');
		$totalInstallmentAmt=$this->input->post('totalInstallmentAmt');

        $week=$this->input->post('week');
        $installmentAmt=$this->input->post('installmentAmt');
        $haptars=$this->input->post('haptars');
        
        $month=$this->input->post('month');
        $days=$this->input->post('days');
        $year=$this->input->post('year');
        
         $InstDuration=$this->input->post('InstDuration');
         $installdays=$this->input->post('value');
        $Sdate=$this->input->post('Sdate');
		$Edate=$this->input->post('Edate');
		// $totintloanamt=$this->input->post('totintloanamt');
		$penaltyAmt=$this->input->post('penaltyAmt');

		$referanceName=$this->input->post('referanceId');
		$refmobile=$this->input->post('refmobile');
		$relationId=$this->input->post('relationId');
		$licencetypeId=$this->input->post('licencetypeId');
		 $licencephoto=$this->input->post('licencephoto');
		 $DurationNameVal=$this->input->post('DurationNameVal');
		 $final=$this->input->post('final');
		 $monthval=$this->input->post('monthval');
		 $interestamttotal=$this->input->post('interestamttotal');
		 $totalInstallmentAmtF=$this->input->post('totalInstallmentAmtF');





		 
		
			$data=[
				
				'DurationNameVal'			=>	$DurationNameVal,
				'final'			=>	$final,
				'monthval'			=>	$monthval,


				
				'fkmemberId'			=>	$fkmemberId,
				'fkloanTypeId'		=>	$fkloantypeId,
				'startDate'				=>	$startDate,
				'fkdurationId'		 	=>	$fkdurationId,
				'endDate'		 		=>	$endDate,
				'fkinstallmentTypeId'	=>	$fkinstallmentTypeId,


				'excludeorinclude'	=>	$excludeorinclude,
				'interestper'	=>	$interestper,
				'interestamt'	=>	$interestamt,
				'interetotalstamt'=>	$interetotalstamt,
				'haptars'=>	$haptars,

				'installmentAmt'		=>	$installmentAmt,
				'totalInstallmentAmt'	=>	$totalInstallmentAmt,
				'InstDuration'					=>	$InstDuration,
				'installmentno'	=>$installmentno,
				'installmentenddate'	=>	$installmentenddate,
				'installdays'			=>$installdays,
				'interestamttotal'		=>$interestamttotal,
				'totalInstallmentAmtF'					=>$totalInstallmentAmtF,



				'month'					=>	$month,
				'week'					=>	$week,
				'days'					=>	$days,
				'year'					=>	$year,
				'penaltyamt'					=>	$penaltyAmt,
				'created_by'			=>	$_SESSION['registrationId'],
				'created_date'			=>	date('Y-m-d H:i:s')
			];
			
			// $this->Model_LoanActivation->insert($data);
			// print_r($data);
			if($this->Model_LoanActivation->insert('loan_activation',$data))
			{

				$MaxLoanActivationId=$this->Model_LoanActivation->getMaxId()[0]->loanActivationId;
				print_r($MaxLoanActivationId);
				if(!empty($Sdate)){

					

				for($i=0;$i<count($Sdate);$i++)
				{
				$getSdate=$Sdate[$i];
				$getEdate=$Edate[$i];
				// $gettotintloanamt=$totintloanamt[$i];
				
				
				$dataLine=[
					
					'fkLoanActivationId'			=> $MaxLoanActivationId,
					'fkmemberId'   					=> $fkmemberId,
					'startDate'    					=> $getSdate,
					'endDate'       				=> $getEdate,	
					// 'totintloanamt'       				=> $gettotintloanamt,					
					'created_by'					=>	$_SESSION['registrationId'],
					'created_date'					=>	date('Y-m-d H:i:s')
				];
				// print_r($dataLine);
				$this->Model_LoanActivation->insert('loan_installmentdates',$dataLine);
					}	

				}
				if(!empty($referanceName)){
				for($i=0;$i<count($referanceName);$i++)
				{
					$licencephoto = '';  
              if($_FILES["licencephoto"]["name"][$i] != '')  
               {  
                    $extension1 = explode('.', $_FILES['licencephoto']['name'][$i]);  
                          $new_name1 = rand() . '.' . $extension1[1];  
                         $destination1 = './referancephoto/' . $new_name1;  
                          move_uploaded_file($_FILES['licencephoto']['tmp_name'][$i], $destination1);  
                          $licencephoto=$new_name1;                                  
                }
				$getreferanceName=$referanceName[$i];
				$getrefmobile=$refmobile[$i];
				$getrelationId=$relationId[$i];
				
				$getlicencetypeId=$licencetypeId[$i];
				

				$dataLine=[
					
					'fkLoanActivationId'			=> $MaxLoanActivationId,
					'fkmemberId'   					=> $fkmemberId,
					'referanceId'    					=> $getreferanceName,
					'refmobile'       				=> $getrefmobile,	
					'fkrelationId'       				=> $getrelationId,				
					'fklicencetypeId'       				=> $getlicencetypeId,
					'attachment'       				=> $licencephoto,		
					'created_by'					=>	$_SESSION['registrationId'],
					'created_date'					=>	date('Y-m-d H:i:s')
				];
				// print_r($dataLine);
				$this->Model_LoanActivation->insert('loan_referancedata',$dataLine);
					}	

				}
				
			}
		
	}


	public function update()
	{	
		$LoanActivationId=$this->input->post('txt_id');
		$fkmemberId=$this->input->post('fkmemberId');

		$fkloantypeId=$this->input->post('fkloantypeId');
		$startDate=$this->input->post('startDate');
        $fkdurationId=$this->input->post('fkdurationId');
        $endDate=$this->input->post('endDate');
        $fkinstallmentTypeId=$this->input->post('fkinstallmentTypeId');

        $week=$this->input->post('week');
        
        $installmentAmt=$this->input->post('installmentAmt');
        $totalInstallmentAmt=$this->input->post('totalInstallmentAmt');


        $installmentno=$this->input->post('installmentno');
        $installmentenddate=$this->input->post('installmentenddate');

         $excludeorinclude=$this->input->post('excludeorinclude');
		$interestper=$this->input->post('interestper');
		$interestamt=$this->input->post('interestamt');
		$interetotalstamt=$this->input->post('interetotalstamt');
		$haptars=$this->input->post('haptars');


      
        $month=$this->input->post('month');
        $days=$this->input->post('days');
        $year=$this->input->post('year');
        $penaltyAmt=$this->input->post('penaltyAmt');
		$Sdate=$this->input->post('Sdate');
		 $Edate=$this->input->post('Edate');
		$InstDuration=$this->input->post('InstDuration');
		$installdays=$this->input->post('value');

		 $referanceName=$this->input->post('referanceName');
		$refmobile=$this->input->post('refmobile');
		$relationId=$this->input->post('relationId');
		$licencetypeId=$this->input->post('licencetypeId');
		 $licencephoto=$this->input->post('licencephoto');
		 $hiden_licencephoto=$this->input->post('hiden_licencephoto');
		 $DurationNameVal=$this->input->post('DurationNameVal');
		 $final=$this->input->post('final');
		 $monthval=$this->input->post('monthval');
		 $interestamttotal=$this->input->post('interestamttotal');
		 $totalInstallmentAmtF=$this->input->post('totalInstallmentAmtF');





			$data=[

				'LoanActivationId'	=>	$LoanActivationId,
				'DurationNameVal'			=>	$DurationNameVal,
				'final'			=>	$final,
				'monthval'			=>	$monthval,



				'fkmemberId'			=>	$fkmemberId,
				'fkloanTypeId'		=>	$fkloantypeId,
				'startDate'				=>	$startDate,
				'fkdurationId'		 	=>	$fkdurationId,
				'endDate'		 		=>	$endDate,
				'fkinstallmentTypeId'	=>	$fkinstallmentTypeId,
				'installmentAmt'		=>	$installmentAmt,
				'totalInstallmentAmt'	=>	$totalInstallmentAmt,
				'InstDuration'			=>	$InstDuration,
				'installdays'			=>	$installdays,


				'installmentno'	=>	$installmentno,
				'installmentenddate'	=>	$installmentenddate,

				'excludeorinclude'	=>	$excludeorinclude,
				'interestper'	=>	$interestper,
				'interestamt'	=>	$interestamt,
				'interetotalstamt'=>	$interetotalstamt,
				'haptars'=>	$haptars,
				'interestamttotal'					=>$interestamttotal,
				'totalInstallmentAmtF'					=>$totalInstallmentAmtF,



				
				'month'					=>	$month,
				'week'					=>	$week,
				'days'					=>	$days,
				'year'					=>	$year,
				'penaltyamt'			=>	$penaltyAmt,
				'modified_by'		=>	$_SESSION['registrationId'],
				'modified_date'	 	=>	date('Y-m-d H:i:s')
			];
			$this->Model_LoanActivation->update($data);
			// print_r($data);
			$installupdate=[

				'fkLoanActivationId'	=>	$LoanActivationId,
				'is_active'	=>0,
				'modified_by'		=>	$_SESSION['registrationId'],
				'modified_date'	 	=>	date('Y-m-d H:i:s')
			];
			
					
			// $this->Model_LoanActivation->updateinstall('loan_installmentdates',$installupdate);

			
					
			// $this->Model_LoanActivation->updateinstall('loan_referancedata',$installupdate);
	


			if ($LoanActivationId >0) {
	 
				$whereArray=array('fkLoanActivationId'=>$LoanActivationId);
				$this->Commonmodel->deleteRecord('loan_installmentdates',$whereArray);
		   
		//    print_r($relationId);
				if (!empty($Sdate)) {
					for ($i=0; $i<count($Sdate); $i++) { 
					

						  $fieldsDoc=array(
		   
							'fkLoanActivationId' =>$LoanActivationId,
							'fkmemberId'   		=> $fkmemberId,
							'startDate'    		=> $Sdate[$i],
							'endDate'       	=> $Edate[$i],
							'is_active'=>1,
						 
							   'created_by'=>$this->session->userdata('registrationId'),
							   'created_date'=>date('Y-m-d H:i:s')
						  );
						//   print_r($fieldsDoc);
		   
						$this->Commonmodel->insertRecord("loan_installmentdates",$fieldsDoc);
		   
					  }
				  }
			}






			// for($i=0;$i<count($Sdate);$i++)
			// 		{
			// 		$getSdate=$Sdate[$i];
			// 		$getEdate=$Edate[$i];
				
					
					
			// 		$dataLine=[
						
			// 			'fkLoanActivationId'			=> $LoanActivationId,
			// 			'fkmemberId'   					=> $fkmemberId,
			// 			'startDate'    					=> $getSdate,
			// 			'endDate'       				=> $getEdate,
								
			// 			'created_by'					=>	$_SESSION['registrationId'],
			// 			'is_active'	=>1,
			// 			'created_date'					=>	date('Y-m-d H:i:s')
			// 		];
					
			// 		$this->Model_LoanActivation->insert('loan_installmentdates',$dataLine);
			// 			}
	

						if ($LoanActivationId >0) {
	 
							$whereArray=array('fkLoanActivationId'=>$LoanActivationId);
							$this->Commonmodel->deleteRecord('loan_referancedata',$whereArray);
					   
					//    print_r($relationId);
							if (!empty($relationId)) {
								for ($i=0; $i<count($relationId); $i++) { 
								

									$licencephoto = '';  
				  if($_FILES["licencephoto"]["name"][$i] != '')  
				   {  
						$extension1 = explode('.', $_FILES['licencephoto']['name'][$i]);  
							  $new_name1 = rand() . '.' . $extension1[1];  
							 $destination1 = './referancephoto/' . $new_name1;  
							  move_uploaded_file($_FILES['licencephoto']['tmp_name'][$i], $destination1);  
							  $licencephoto=$new_name1;                                  
					}
					 else
						  {
							  $licencephoto=$hiden_licencephoto[$i];
						  }
									  $fieldsDoc=array(
					   
											   'fkLoanActivationId' =>$LoanActivationId,
											    'fkmemberId'   		=> $fkmemberId,
												 'referanceId' =>$referanceName[$i],
												 'refmobile' =>$refmobile[$i],
												 'fkrelationId' =>$relationId[$i],
												 'fklicencetypeId' =>$licencetypeId[$i],
												 'attachment'       => $licencephoto,	
					   
												
					   
											   'is_active'=>1,
									 
										   'created_by'=>$this->session->userdata('registrationId'),
										   'created_date'=>date('Y-m-d H:i:s')
									  );
									//   print_r($fieldsDoc);
					   
									$this->Commonmodel->insertRecord("loan_referancedata",$fieldsDoc);
					   
								  }
							  }
						}







				
	
		}
 	public function delete()
	{
		$loanInstaDateId=$this->input->get('loanInstaDateId');
		// print_r($invoiceproductId);
		$data=[
				'is_active'=>0,
				'deleted_by'	=>	$_SESSION['registrationId'],
				'deleted_date'	=>	date('Y-m-d H:i:s')];

		if($this->Model_LoanActivation->delete($loanInstaDateId,$data))
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
 	



	public function getval()
    {
        $loanTypeId = $this->input->post('loanTypeId'); // Use get instead of post for AJAX requests
    
        $data = $this->Model_LoanActivation->getval($loanTypeId);
        echo json_encode($data);
    }
	
}

?>