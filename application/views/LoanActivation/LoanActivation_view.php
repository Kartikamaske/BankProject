<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Select2 CSS -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Assets/select2.min.css">
<link href="<?php echo base_url();?>Assets/css/sweetalert.css" rel="stylesheet">


<style type="text/css"> 


body{
        font-family: 'Poppins', sans-serif;}

        .select2-container--default .select2-selection--single:focus {
            box-shadow: none!important;
           border: 2px solid #1d458e!important;
    }
         .select2-container--default .select2-selection--single:focus-visible {
            box-shadow: none!important;
           border: 2px solid #1d458e!important;
         }

    .select2-container--default .select2-selection--single{
        margin-top: -1px;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555!important;
        background-color: #fff!important;
        background-image: none!important;
        border: 1px solid #ccc!important;
        border-radius: 4px!important;
    }
    .form-control{
      border-radius: 4px!important;

    }
    .form-control:focus{
        box-shadow: none!important;
        /* border: 2px solid #d41574!important; */
       border:2px solid #1d458e!important;
    }

    .select2-container--default .select2-selection--single{
        padding: 4px 12px 6px 12px!important;
    }
.swal2-popup {
  font-size: 0.7rem !important;
  font-family: Georgia, serif;
}
.sweet-alert.showSweetAlert  h2{
  font-size: 25px !important;
}

.swal2-popup {
  font-size: 0.7rem !important;
  font-family: Georgia, serif;
}
.sweet-alert.showSweetAlert  h2{
  font-size: 25px !important;
}


         


      @media (max-width: 485px)
        {
          
           .dd {
          
          max-width: 50%;
           }
           
 
     }

       @media(min-width: 876px){
        .for_tabview{
          max-width: 100%;
        }
      }
    @media(max-width: 875px) and (min-width: 768px){
      .for_tabview{
          max-width: 214px;
        }
    }
     @media(max-width: 1220px) and (min-width: 1025px){
      .for_tabview{
          max-width: 169px;
        }
    }

 </style>
<style type="text/css"> 
    

.btn_New{
 background: #df0c7c;
    color: white;
    /*border: 1px solid #ff0000;*/
    height: 33px;
    font-size: 13px;
}

button#btn_New{

    min-width: 0px !important;
        margin-left: 20px;
    margin-top: 30px;
}
button#btn_New:hover{
  background-position: left bottom;
  }


button#btn_Member {
    /*border-radius: 20px;*/
    box-shadow: 0 8px 17px 0 rgba(0, 0, 0, .2), 0 8px 17px 0 rgba(0, 0, 0, 0.2);
}
button#btn_Member {
      font-size: 16px;
   background-size: 200% 100%;
    background-position: right bottom;
    transition: all .5s ease-out;
}
button#btn_Member:hover {
  background-position: left bottom;
}

.input-group{
  display:inherit!important;
}
.tt-suggestion:hover{
  color:white!important;
}
.tt-menu{
  overflow: visible!important;
  border-color: #cccccc!important;
}
.tt-suggestion  b{
  font-size: 16px;
    font-family: Roboto, sans-serif;
    font-weight: 300;
}
.inputdesign{
  border-bottom: 2px solid #1d458e!important;
    border: none;
    border-radius: 0!important;
    font-size: 17px!important;
    font-weight: bold!important;
}
.inputdesign:focus{
  border-bottom: 2px solid #1d458e!important;
  border-top: none!important;
    border-left: 0px!important;
    border-right: 0px!important;
}
.select2-search__field:focus-visible{
  border:1px solid #1d458e!important;
}
.select2-container--default .select2-results__option--highlighted[aria-selected]{
  background:#1d458e!important;
}
 </style>
 <?php 
     if(!empty($data[0]->startDate) || !empty($data[0]->endDate))
    {
        $startDate=$data[0]->startDate;
        $endDate=$data[0]->endDate;
       
       
    }
    else
    {
      
         $startDate=date('Y-m-d');
         $endDate=date('Y-m-d');
         
        
    }

    if(!empty($data[0]->installmentenddate))
    {
        $installmentenddate=$data[0]->installmentenddate;
        
       
       
    }
    else
    {
      
         $installmentenddate=date('Y-m-d');
         
         
        
    }
?>

<link href="<?php echo base_url(); ?>Assets/css/typeheadstyle.css" rel="stylesheet">
 
<div class="main-content-wrap sidenav-open d-flex flex-column  " style="padding: 2rem 14px 0;">
            <!-- ============ Body content start ============= -->
    <div class="main-content mt-2 mt-lg-3">
      <div class="row mt-4">
        <div class="col-md-12 ">
        <div class="card mb-5  mt-0 bg-white">
                        <div class="card-body px-4 pb-4 pt-2">
          

          
              <h3 class="m-0 text-center py-2 " style="
    font-family: Rubiks!important;
">&ensp;Loan Activation</h3>
                       <hr class="my-2">
              
              <form class="needs-validation" id="Form" action="<?php echo base_url();?>CompanyMaster/create" method="post" autocomplete="off">

              <!-- Product Modal -->
<!-- <div class="modal fade bd-example-modal-lg" id="AddNew" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="background-color: rgb(0 0 0 / 26%); position: fixed;top: 0;left: 0;z-index: 1040;width: 100vw;height: 100vh;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="box-shadow: 0 1px 24px rgba(0,0,0,0.5) !important;">
      <div class="modal-header">
        <h4 id="MobileHead">Add Member</h4>
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-row">
            <div class="col-md-3" >
                <label for="name">Member Code<span class="required" style="color: red">*</span></label>
                <div class="form-group" >
                    <input type="number" class="form-control form-control-sm" name="memberCode" id="memberCode" placeholder="Member Code" value="<?php if(!empty($data))echo $data[0]->membercode; ?>" required>

                    <?php if(!empty($data))
                            {
                               echo "<input name='Member_id' id='Member_id' value='".$data[0]->memberid."' type='hidden' />";
                                              
                            }
                      ?>
                </div>
                
            </div>
            <div class="col-md-3">
                    <label for="name">First Name<span class="required" style="color: red">*</span></label>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-sm" name="firstName" id="firstName" placeholder="First Name" onkeyup="populateSecondTextBox();" value="<?php if(!empty($data))echo $data[0]->firstname; ?>" required>
                     
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="name">Middel Name<span class="required" style="color: red">*</span></label>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-sm" name="middelName" id="middelName" placeholder="Middel Name" onkeyup="populateSecondTextBox();" value="<?php if(!empty($data))echo $data[0]->middlename; ?>" required>
                     
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label for="name">Last Name<span class="required" style="color: red">*</span></label>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-sm" name="lastName" id="lastName" placeholder="Last Name" onkeyup="populateSecondTextBox();" value="<?php if(!empty($data))echo $data[0]->lastname; ?>" required>
                     
                    </div>
                  </div>
                  
          </div>
          <div class="form-row">
              <div class="col-md-7">
                    <label for="name">Full Name<span class="required" style="color: red">*</span></label>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-sm" name="fullName" id="fullName" placeholder="Full Name"  value="<?php if(!empty($data))echo $data[0]->firstname.' '.$data[0]->middlename.' '.$data[0]->lastname; ?>" required readonly="true">
                     
                    </div>
              </div>
              
              <div class="col-md-2">
                    <label for="pincode">Pin Code</label>
                      <div class="input-group">
                        <input type="number" class="form-control form-control-sm" id="pincode" name="pincode" placeholder="Pin code" onchange="pincodevalidate()" value="<?php if(!empty($data))echo $data[0]->pincode; ?>" required>
                       <span id="pincodeerror" style="color: red;"></span>
                      </div>
                </div>
                <div class="col-md-3">
                    <label for="mobileNo">Mobile No<span class="required" style="color: red">*</span></label>
                      <div class="form-group">
                      <input type="number" class="form-control form-control-sm" id="mobileNo" name="mobileNo" placeholder="Mobile No" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" onchange="Mobile()" value="<?php if(!empty($data))echo $data[0]->mobilenumber; ?>" required>
                      
                      </div>
                    <span id="mobileerror" style="color: red;"></span>
                  </div>
                  
          </div>
          <div class="form-row">
              
                <div class="col-md-3">
                    <label for="city">Member Type<span class="required" style="color: red">*</span></label>
                    <div class="input-group ">
                    <select class="select2 form-control form-control-sm " id="fkmemberTypeId" name="fkmemberTypeId" style="width: 100%; height:35px;"  >

                      <option value="0">select Member Type</option>
                        <?php 
                            foreach ($MemberType as $key => $value) {
                                 $selected='';
                            if(!empty($data)){
                                 if($data[0]->fkmemberTypeId==$value->memberTypeId){
                                      $selected='selected="selected"';
                                }
                            }
                        ?>
                        <option value="<?php echo $value->memberTypeId;?>" <?php echo $selected;?> ><?php  echo $value->memberTypeName; ?></option>

                        <?php  
                            }
                        ?>
                </select>
                  </div>
                  </div>
                  <div class="col-md-3">
                    <label for="mobileno1">Adhar Card Number</label>
                      <div class="form-group">
                      <input type="number" class="form-control form-control-sm" id="adharNo" name="adharNo" placeholder="Adhar Card Number" onblur="AadharValidate();" value="<?php if(!empty($data))echo $data[0]->adharNo; ?>" required>
                      
                      </div>
                    <span id="AdharError" style="color: red;"></span>
                </div>
                  <div class="col-md-3">
                    <label for="name">Family Chief</label>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-sm" name="familyChief" id="familyChief" placeholder="Family Chief" value="<?php if(!empty($data))echo $data[0]->familyChief; ?>" required>
                     
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group ">
                    <label>Address</label>    
                    <textarea class="form-control form-control-sm" id="address" name="address" placeholder="Address"><?php if(!empty($data))echo $data[0]->address; ?></textarea>
                     </div>
              </div>
          </div>




          <div style="text-align: end;">
              <button type="button" id="btn_Member" name="btn_Member" class="btn samplebtn waves-effect waves-light" ><i class="fa fa-check-circle" style="font-size: 16px;color: #FFF;"></i>Save</button>
           </div>
      </div>  
    
     </div>
   </div> -->
 <!-- </div>  -->
<!-- /End Modal -->
<!-- start member details -->
<!-- <div class="modal fade bd-example-modal-lg" id="detailsview" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="background-color: rgb(0 0 0 / 26%); position: fixed;top: 0;left: 0;z-index: 1040;width: 100vw;height: 100vh;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="box-shadow: 0 1px 24px rgba(0,0,0,0.5) !important;">
      <div class="modal-header">
        <h4 id="MobileHead">Member Bhishi Details</h4>
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-row">
            <span>Name:  &nbsp&nbsp&nbsp</span><span id="membernameview" style="font-weight: 600;"></span>    
          </div>
          <br>
          <div class="col-md-8">
            <label for="city">Bhishi<span class="required" style="color: red">*</span></label>
            <select class="select2 form-control form-control-sm " id="Bhishiii" name="Bhishiii" style="width: 100%; height:35px;"  >

              <option value="0">---select Bhishi---</option>
</select>


          </div>
          <div >
            <br>
            <br>
              <div id="detailstable">
                
              </div>
          </div>
          
</div>  
    
    </div>
  </div>
</div>
</div> -->

                <div class="form-row">
                  

                  <div class="col-md-5 divv for_tabview">
                    <label for="name">सभासदाचे नाव  <span class="required" style="color: red">*</span></label><i class="fa fa-plus-square d-none" aria-hidden="true" data-toggle="modal" data-target="#AddNew" style="padding-left: 10px;"></i>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-sm" name="Allsearch" id="Allsearch"  value="<?php if(!empty($data))echo $data[0]->fullname; ?>" data-index="2" required >

                       <input type="hidden" class="form-control form-control-sm" name="fkmemberId" id="fkmemberId"   value="<?php if(!empty($data))echo $data[0]->fkmemberId; ?>" required >
                       
                       <?php if(!empty($data))
                            {
                               echo "<input name='txt_id' id='txt_id' value='".$data[0]->loanActivationId."' type='hidden' />";
                                              
                            }
                         ?>
                    </div>
                    <div class="tt-menu" style="position: absolute; top: 65%; left: 1.5%; z-index: 100; display: none; height: auto; overflow: visible;border-color: #cccccc;;" id="showmainsearch"><div class="tt-dataset tt-dataset-sample_data" id="datamainsearchh" ></div>
                    </div>
                  </div>
               <div class="col-md-2 divv for_tabview d-none">
                <label for="BhishiType"></label>
                <div class="input-group  ">
                  <button type="button"  class="btn btn-add btn-md waves-effect waves-light text-white" id="memberdetails" aria-hidden="true" data-toggle="modal" data-target="#detailsview" style="background: #165d73;background: #165d73;height: 33px;font-size: 15px;font-weight: 600;      margin-top:0 !important">Member Details</button>
                </div>
                 
               </div>
                 </div> 

                 <div class="form-row">

                  <div class="col-md-2 divv divvv">
                    <label for="BhishiType">Loan Duration</label>
                    <div class="input-group ">
                    <select class="select2 form-control form-control-sm " id="fkloantypeId" name="fkloantypeId" style="width: 100%; height:35px;"  >

                      <option value="0">select Loan Duration</option>
                        <?php 
                            foreach ($loanType as $key => $value) {
                                 $selected='';
                            if(!empty($data)){
                                 if($data[0]->fkloantypeId==$value->loantype_id){
                                      $selected='selected="selected"';
                                }
                            }
                        ?>
                        <option value="<?php echo $value->loantype_id;?>" <?php echo $selected;?> ><?php  echo $value->loantype_name; ?></option>

                        <?php  
                            }
                        ?>
                </select>
                  </div>
                  </div>
<input type="hidden" id="getloanTypeValue"  value="<?php if(!empty($data))echo $data[0]->loantype_value; ?>">
<input type="hidden" id="getloanTypeIdd"   value="<?php if(!empty($data))echo $data[0]->loantype_id; ?>">


                   <div class="col-md-2 divv divvv dd">
                    <label for="startDate">Start Date</label>
                      <div class="input-group">
                        <input type="Date" class="form-control form-control-sm" id="startDate" name="startDate" value="<?php echo $startDate; ?>" onchange="getduration();calculateEndDate();"  required>
                      </div>
                  </div>

                  <div class="col-md-1 divv divvv dd text-center d-none">
                    <label for="Duration">Duration</label>
                    <div class="input-group ">
                      <strong id="DurationName" style="color: #017ec3;"> <?php if(!empty($data))echo $data[0]->DurationNameVal; ?> </strong>
                     
                   <input type="hidden" id="DurationNameVal" name="DurationNameVal" value="<?php if(!empty($data))echo $data[0]->DurationNameVal; ?>" >
                  </div>
                  </div>

                  <div class="col-md-2 divv divvv dd">
                    <label for="endDate">End Date</label>
                      <div class="input-group">
                        <input type="date" class="form-control form-control-sm " style="font-weight:bold;color:black;background: #cfdde6;border:none;" readonly id="endDate" name="endDate" value="<?php echo $endDate; ?>"  >

                      </div>
                       <input type="hidden" class="form-control" id="durationValue" name="durationValue" value="" data-parsley-trigger="change" readonly> 

                       <input type="hidden" class="form-control" id="fkdurationId" name="fkdurationId" value="<?php if(!empty($data))echo $data[0]->fkdurationId; ?>" data-parsley-trigger="change" readonly> 
                  </div>

                  <div class="col-md-3 divv divvv dd">
                    <label for="Installment">हप्ताचा प्रकार </label><strong id="InstallmentDuration" style="padding-left: 20px;color: #df0c7c;"> </strong>
                    <div class="input-group ">
                    <select class="select2 form-control form-control-sm " id="fkinstallmentTypeId" name="fkinstallmentTypeId" style="width: 100%; height:35px;"  >

                      <option value="0">select Installment</option>
                        <?php 
                            foreach ($Installment as $key => $value) {
                                 $selected='';
                            if(!empty($data)){
                                 if($data[0]->fkinstallmentTypeId==$value->installmentTypeId){
                                      $selected='selected="selected"';
                                }
                            }
                        ?>
                        <option value="<?php echo $value->installmentTypeId;?>" <?php echo $selected;?> ><?php  echo $value->installmentTypeName; ?></option>

                        <?php  
                            }
                        ?>
                </select>
                
                <input type="hidden" class="form-control" id="value" name="value" value=" <?php if(!empty($data))echo $data[0]->installdays; ?>"  data-parsley-trigger="change" readonly>

                 
                <input type="hidden" class="form-control form-control-sm" id="InstDuration" name="InstDuration"   value="<?php if(!empty($data))echo $data[0]->InstDuration; ?>" required>

                    
                  </div>
                  </div>
       </div>
                         <div class="form-row mt-3">
                     <div class="col-md-2 divv divvv dd">
                    <label>हप्ता संख्या </label>
                      <div class="input-group">
                        <input type="number" readonly class="form-control form-control-sm " id="installmentno" name="installmentno" style="background: #cfdde6;border:none;"   value="<?php if(!empty($data)){echo $data[0]->installmentno;}else{ echo '0';} ?>" required>
                       
                      </div>
                     
                  </div>
<div class="col-md-1 divv divvv dd d-none">
<label for="BhishiType"></label>
                <div class="input-group ">
                  <button type="button"  class="btn btn-add btn-md waves-effect waves-light text-white" id="instasearch"  style="background: #165d73;background: #165d73;height: 33px;font-size: 15px;font-weight: 600;      margin-top:0 !important">Ok</button>
                </div>

</div>

<div class="col-md-2 divv divvv dd d-none">
                    <label>Last Installment date </label>
                      <div class="input-group">
                        <input type="date" class="form-control" id="installmentenddate" name="installmentenddate"    value="<?php echo $installmentenddate; ?>" readonly>
                       
                      </div>
                     
                  </div>


                  <div class="col-md-3 divv divvv dd pt-lg-3 d-flex justify-content-center align-items-center" style="gap:15px;cursor:pointer" >

                    
                  <div class="d-flex justify-content-center align-items-center" style="gap:1px;cursor:pointer">
                  <input type="radio" id="Include" checked class="m-0" name="excludeorinclude" style="cursor:pointer" value="1" <?php if(!empty($data)){if(!empty($data[0]->excludeorinclude==1)){ ?> checked <?php } } ?>>
  <label for="Include" style="font-size: 16px!important;"><h5 style="font-family: 'Poppins'!important;margin-top:14px!important;cursor:pointer">Include </h5></label>
                  </div>


                  <div class="d-flex justify-content-center align-items-center" style="gap:1px;cursor:pointer">
                  <input type="radio" id="exclude" class="m-0" name="excludeorinclude" style="cursor:pointer" value="0" <?php if(!empty($data)){if(!empty($data[0]->excludeorinclude==0)){ ?> checked <?php } } ?>>
  <label for="exclude" style="font-size: 16px!important;"><h5 style="font-family: 'Poppins'!important;margin-top:14px!important;cursor:pointer">Exclude</h5></label>
                  </div>


                

  
</div>

                  </div>
                  <div class="form-row mt-3"> 
                    
                  

<div class="col-lg-6 col-12">
<div class="form-row">

<div class="col-md-6 divv divvv dd">
                    <label>मुद्दल</label>
                      <div class="input-group">
                        <input type="text" class="form-control form-control-sm numberss" id="installmentAmt" name="installmentAmt"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"   value="<?php if(!empty($data)){echo $data[0]->installmentAmt;}else{ echo '0';} ?>" required>
                       
                      </div>

                  </div>



                  <div class="col-md-6 divv divvv dd">
                    <label >व्याज   <span> ( वार्षिक ) </span>  </label>
                      <div class="input-group">
                        <input type="number" class="form-control form-control-sm" id="interestper" name="interestper"    value="<?php if(!empty($data)){echo $data[0]->interestper;}else{ echo '0';} ?>" required>
                       
                      </div>
                     
                  </div>


                  <div class="col-md-6 col-lg-6 divv divvv dd mt-3">
                    <label >दंड <span id="penultytype"></span>   %</label>
                      <div class="input-group">
                        <input type="number" class="form-control form-control-sm" id="penaltyAmt" name="penaltyAmt"    value="<?php if(!empty($data)){echo $data[0]->penaltyamt;}else{ echo '0';} ?>" required>
                       
                      </div>
                     
                  </div>
                 <div class="col-md-6 col-lg-6 divv divvv dd mt-3">
                    <label >हप्ता र. <span id="hapthamt"></span></label>
                      <div class="input-group">
                        <input type="number" class="form-control form-control-sm" id="haptars" name="haptars"    value="<?php if(!empty($data)){echo $data[0]->haptars;}else{ echo '0';} ?>" required>
                       
                      </div>
                     
                  </div>

                  <div class="col-md-12 mt-4">
                                       <div class="form-group">
                                 <button data-toggle="collapse" data-target="#licence" class="btn btn-primary px-3 py-2" onclick="" type="button" name="" id="" aria-expanded="true" style="background: #e91e63;border:none">Referance Details
                                </button>
                            </div>
                        </div>
                 


</div>

                               


</div>

<div class="col-lg-1 d-none d-lg-block col-12 px-0"></div>

<div class="col-lg-5 justify-content-center align-items-center  px-5 pt-4 pb-2 col-12" style=" margin-top: -45px;   border: 2px solid #e91e63;
    border-radius: 5px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">

<div class=" mb-3 d-flex justify-content-start align-items-center" style="gap:10px">
    <div class="" style="width:35%;">
      <p class="mb-0"><b>मुद्दल</b></p>
    </div>
    <div class="">
    <input type="number" class="form-control form-control-sm bg-white inputdesign" id="installmentAmt11" name="installmentAmt11"readonly   value="<?php if(!empty($data)){echo $data[0]->installmentAmt;}else{ echo '0';} ?>" required>
    </div>
  </div>


  <div class=" mb-3 d-flex justify-content-start align-items-center" style="gap:10px">
    <div class="" style="width:35%;">
    <!-- <span id="interesttypeper"> </span> -->
      <p class="mb-0"><b>एकूण व्याज र ( वार्षिक )</b></p>
    </div>
    <div class="">
    <input type="number" class="form-control form-control-sm bg-white inputdesign" id="interestamt" name="interestamt"  readonly   value="<?php if(!empty($data)){echo $data[0]->interestamt;}else{ echo '0';} ?>" required>
    </div>
  </div>



  <div class=" mb-3 d-flex justify-content-start align-items-center" style="gap:10px">
    <div class="" style="width:35%;">
      <p class="mb-0"><b>व्याज र.  <span> ( Per Day ) </span></b></p>
    </div>
    <div class="">
    <input type="number" class="form-control form-control-sm bg-white inputdesign" id="interetotalstamt" name="interetotalstamt" readonly   value="<?php if(!empty($data)){echo $data[0]->interetotalstamt;}else{ echo '0';} ?>"  >

    </div>
  </div>


  <div class=" mb-3 d-flex justify-content-start align-items-center" style="gap:10px">
    <div class="" style="width:35%;">
      <p class="mb-0"><b>एकूण व्याज र <span id="showloantypeval" style="font-size: 12px;color:#1d458e"> </span></b></p>
    </div>
    <div class="">
    <input type="number" class="form-control form-control-sm bg-white inputdesign" id="interestamttotal" name="interestamttotal"  readonly   value="<?php if(!empty($data)){echo $data[0]->interestamttotal;}else{ echo '0';} ?>" required>
    </div>
  </div>


  <div class=" mb-3 d-flex justify-content-start align-items-center" style="gap:10px">
    <div class="" style="width:35%;">
      <p class="mb-0"><b>एकूण मुद्दल र.</b></p>
    </div>
    <div class="">
      <input type="hidden" id="totalInstallmentAmtF" name="totalInstallmentAmtF" value="<?php if(!empty($data)){echo $data[0]->totalInstallmentAmtF;}else{ echo '0';} ?>">

    <input type="number" class="form-control form-control-sm  inputdesign" id="totalInstallmentAmt" style="background: #cfdde6;
    border-radius: 6px!important;color: green;" name="totalInstallmentAmt"    value="<?php if(!empty($data)){echo $data[0]->totalInstallmentAmt;}else{ echo '0';} ?>" readonly>

    </div>
  </div>


   
  </div>

</div>







              
                







                  <div class="col-md-3 divv divvv dd mt-3 d-none">
                    <label >month </label>
                      <div class="input-group">
                        <input type="number" class="form-control form-control-sm" id="monthval" name="monthval" value="<?php if(!empty($data))echo $data[0]->monthval; ?>">
                       
                      </div>
                     
                  </div>

                  <div class="col-md-3 divv divvv dd mt-3 d-none">
                    <label >Final </label>
                      <div class="input-group">
                        <input type="number" class="form-control form-control-sm" id="final" name="final"    value="<?php if(!empty($data))echo $data[0]->final; ?>" required>
                       
                      </div>
                     
                  </div>

                 <!-- </div>  -->
                  
                

              


                    
                    <div id="licence" class="collapse mt-5">
                    <div id="licencedetails"> 
                        <div class="form-row">
                             <div class="col-md-5 divv divvv dd">
                    <label>Referance Name</label>
                      <div class="input-group">
                       
                        <select class="select2 form-control form-control-sm " id="referanceName" name="referanceNames" style="width: 100%; height:35px;"  >    

                      <option value="" >--- Select Refer ---</option>
                            <?php foreach($referlist as $value)
                                {
                                    $selected ="";
                                
                                echo '<option value="'. $value->memberid.'" '.$selected.'>'. $value->memberid.'  '. $value->fullname.'</option>';
                                         }
                                        ?>
                                      </select>

                      </div>
                    
                  </div>
                     <div class="col-md-2 divv divvv dd">
                    <label>Mobile</label>
                      <div class="input-group">
                        <input type="number" class="form-control form-control-sm" id="refmobile"  onKeyPress="if(this.value.length==10) return false;"  name="refmobile"  oninput="AltMobile()"   value="" required>
                       
                      </div>
                      <p  style="color:red;font-size:12px!important;font-weight:bold;" class="mb-2 mt-2   mx-3" id="errormobileNo"></p>
                      
                    
                  </div>
                    <div class="col-md-2 divv divvv dd">
                    <label >Relation with member</label>
                      <div class="input-group">
                         <select class="select2 form-control select2-hidden-accessible" id="relationId" name="relationId" style="width: 100%; height:36px;" >
                                                <option value="" >--- Select ---</option>
                                                 <?php foreach($relation as $relation)
                                {
                                    $selected ="";
                                if($relation->relationId == $data[0]->fkrelationId)
                                    {
                                $selected ="selected=selected";
                                    }
                                echo '<option value="'. $relation->relationId.'" '.$selected.'>'. $relation->relationName.'</option>';
                                         }
                                        ?>                               
                            </select>   
                       
                      </div>
                    
                  </div>
            <div class="col-md-2">
                                     <div class="form-group">

                                        <label class="control-label">Document</label> <label for="" id="alertMsgDuplicateItem" class="validation-msg">&nbsp; </label>
                                        
                                             <select class="select2 form-control select2-hidden-accessible" id="licencetypeId" name="licencetypeId" style="width: 100%; height:36px;">
                                                <option value="" >--- Select ---</option>
                                                <option value="1">Adhar Card</option>
                                                <option value="2">PAN</option>
                                                <option value="3">Voter Id</option>                               
                            </select>           
                                          </div> 
                                          
                                    </div>

                            </div>
                        </div>


                        <!-- <div class="col-md-12 text-center p-5">
                                <button class="btn btn-primary  border-0 btnsave" type="button" name="btn_save"   id="btn_savee">
                                <i class="fa-regular fa-circle-check"></i> Submit
                                 </button>
                                            
                            
                                 <a href="<?=base_url() ?>LoanActivation" style="" class=" border-0 text-white btn btn-primary  text-white btncancel" type="button" name="cancle" id="cancle" style="background:#1d458e!important;">
                                <i class="fa-solid fa-xmark"></i> Cancel</a>
                              
                             </div> -->





                       <div class="form-row">
                    <div class="col-md-2 divv divvv dd">
                       <button type="button" id="btn_AddTo" name="btn_AddTo" class="btn btn-primary" style="min-width: 0px !important;background: #e91e63;border:none" >Add To List</button>
                  </div>
                 </div>
                            <br>
                                    <div class="row">
                                    <div class="col-md-12">
                                        <!-- <h4 style="color: deeppink;">Referance Details</h4> -->
                                        <div class="table-responsive">
                                         <table id="item_details_table" class="table table-bordered table-striped">
                                            <thead style="background: #1d458e;">
                                                <tr>
                                                    <th class="text-white" style="width: 7%;">Operation</th>
                                                    <th class="text-white">Referance Name</th>
                                                    <th class="text-white" style="width: 10%;">Mobile </th>
                                                    <th class="text-white" style="width: 10%;">Relation</th>
                                                    <th class="text-white" style="width: 10%;">Document</th>
                                                    <th class="text-white" style="width: 20%;">Attachment</th>
                                                    
                                                    <!-- <th>Warning Days</th> -->
                                                    
                                                    
                                                </tr>
                                            </thead>
                                                <tbody id="ReferanceTable">
                                                <?php
                        if (!empty($Relationdata)) {
                          $no=1;
                         for ($i=0; $i <count($Relationdata) ; $i++) { 
                           echo '<tr class="deleteclass'.$Relationdata[$i]->loanInstaDateId.'"><td class="text-center"><i class="fas fa-trash" style="cursor:pointer;    font-size: 20px;
                           color: #cf2727;
                           margin-top: 20px;" id="btnItemRowDelete'.$i.'" onclick="remove_relation_details('.$Relationdata[$i]->loanInstaDateId.');"></i></td>';

                             echo '<td>'.$Relationdata[$i]->fullname.'</td>';
                            
                              echo '<td>'.$Relationdata[$i]->refmobile.'</td>';
                              echo '<td>'.$Relationdata[$i]->relationName.'</td>';
                              if ($Relationdata[$i]->fklicencetypeId==1) {
                                 echo '<td>Adhar Card</td>';
                              }else if($Relationdata[$i]->fklicencetypeId==2)
                              {
                                echo '<td>PAN</td>';
                              }else if($Relationdata[$i]->fklicencetypeId==3){
                                echo '<td>Voter Id</td>'; 
                              }
                               echo '<td><input type="file" readonly id="licencephoto'.$Relationdata[$i]->loanInstaDateId.'" name="licencephoto[]" class="licencephoto form-control tds-width" onchange="readURL1(this,'.$Relationdata[$i]->loanInstaDateId.');" value="'.$Relationdata[$i]->attachment.'"><input  type="hidden" class="form-control" id="hiden_licencephoto" name="hiden_licencephoto[]" value="'.$Relationdata[$i]->attachment.'" data-parsley-trigger="change" >

        <img src="'.base_url().'referancephoto/'.$Relationdata[$i]->attachment.'" id="liceneprof'.$Relationdata[$i]->loanInstaDateId.'" name="liceneprof[]" class="img-thumbnail" width="100" height="60" style="height: 120px;width:100px;margin:5px auto 0;display:block;" /></td>';

        echo "<td  style='display:none;'><input type='text' id='referanceName".$i."' name='referanceName[]'class='referanceName' value='".$Relationdata[$i]->referanceId."'></td>";

        echo "<td  style='display:none;'><input type='text' id='refmobile".$i."' name='refmobile[]'class='refmobile' value='".$Relationdata[$i]->refmobile."'></td>";

        echo "<td style='display:none;'><input type='text' id='relationId".$i."' name='relationId[]'class='relationId' value='".$Relationdata[$i]->fkrelationId."'></td>";

        echo "<td style='display:none;'><input type='text' id='licencetypeId".$i."' name='licencetypeId[]'class='licencetypeId' value='".$Relationdata[$i]->fklicencetypeId."'></td>";

                               echo '</tr>';
                           $no++;
                         }
                        }
                        ?>
                        </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                    </div>


                   

                  <div class="d-flex justify-content-center py-5" style="gap:12px">
                  <button class="btn btn-primary  border-0 btnsave" type="button" name="btn_save"   id="btn_savee">
                                <i class="fa-regular fa-circle-check"></i> Submit
                                 </button>
                                            
                            
                                 <a href="<?=base_url() ?>LoanActivation" style="" class=" border-0 text-white btn btn-primary  text-white btncancel" type="button" name="cancle" id="cancle" style="background:#1d458e!important;">
                                <i class="fa-solid fa-xmark"></i> Cancel</a>
                  </div>



<div class="col-10 mx-auto">
                 <div class="table-responsive px-4 pb-3 pt-2">
                    <table class="display table table-bordered" id="tbl">
                    
                      <thead style="background:#1d458e;">
                        <tr>
                          <th class="text-center"  style="color:white!important;width: 10%;">Sr.No</th> 
                          <th class="text-center" style="color:white!important">Start Date</th>
                          <th class="text-center"  style="color:white!important">End Date</th>
                          <th class="text-center"  style="color:white!important;    width: 19%;" id="Installmentth">Installment</th>

                        </tr>
                      </thead>
                      <tbody id="ChargesTable" cass="text-center">
                        <?php
                        if (!empty($Installmentdata)) {
                          $no=1;
                         for ($i=0; $i <count($Installmentdata) ; $i++) { 
                            $startDate = date("d-m-Y", strtotime($Installmentdata[$i]->startDate));
                            $endDate = date("d-m-Y", strtotime($Installmentdata[$i]->endDate));

                          $paid =   $Installmentdata[$i]->is_paid;

                          if($paid==0){
                           $padval ='<button class="btn  py-1 px-2 text-white" style="background:#df1515">Unpaid</button>';
                          }
                          else{
                            $padval = '<button class="btn  py-1 px-4 text-white" id="paidbtntext" style="background:#055605;">Paid </button>';
                      

                       
                     
                          }

                           echo '<tr><td class="text-center">'.$no.'</td>';
                             echo '<td class="text-center">'.$startDate.'</td>';
                             
                            
                              echo '<td class="text-center">'.$endDate.'</td>';
                              echo '<td class="text-center">'.$padval.'</td>';
                            
                               echo '<td style="display:none;"><input type="text" id="Sdate'.$i.'" name="Sdate[]" value="'.$Installmentdata[$i]->startDate.'"/></td>';
                             echo '<td style="display:none;"><input type="text" id="Edate'.$i.'" name="Edate[]" value="'.$Installmentdata[$i]->endDate.'"/></td>
                             
                             </tr>';

                            
                           $no++;
                         }
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  </div>
                  <!-- </div> -->
               
              </form>
            </div>
          </div>
        </div>
      </div>
    <!-- </div>
    </div>
    </div> -->


   
    <script src="<?php echo base_url();?>Assets/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url();?>web_resources/dist/js/controllers/LoanActivationCreate.js"></script>


    <script src="<?php echo base_url();?>Assets/select2.min.js"></script>
 <script src="<?php echo base_url();?>Assets/select2.init.js"></script>
 <script src="<?php echo base_url();?>Assets/js/sweetalert.min.js"></script>


<script>

  $('#Form').on('keydown', 'input', function (event) {
    if (event.which == 13) {
        event.preventDefault();
        var $this = $(event.target);
        var index = parseFloat($this.attr('data-index'));
        $('[data-index="' + (index + 1).toString() + '"]').focus();
    }                  
});



    $('#Form').bind('keydown', function(event) {
    if (event.ctrlKey || event.metaKey) {
    switch (String.fromCharCode(event.which).toLowerCase()) {
    case 's':
    event.preventDefault();
    // alert('ctrl-s');
    saveperform();
    break;

    }
    $(function(){
    $("#MemCode").focus();
    });

    }
    });
</script>

<script type="text/javascript">

  function populateSecondTextBox() {
    // alert('called');
    document.getElementById('fullName').value = document.getElementById('firstName').value +' ' + document.getElementById('middelName').value  +' ' + document.getElementById('lastName').value;
}


   function Mobile(){
    if(document.getElementById('mobileNo').value != ""){

       var y = document.getElementById('mobileNo').value;
       if(isNaN(y)||y.indexOf(" ")!=-1)
       {
         $('#mobileerror').fadeIn().html("Invalid number");
                                 setTimeout(function(){$('#mobileerror').fadeOut('slow') }, 5000);
         // alert("Invalid Mobile No.");
          document.getElementById('mobileNo').focus();
          return false;
       }

       if (y.length>10 || y.length<10)
       {
            $('#mobileerror').fadeIn().html("Mobile No Must 10 digit");
                                 setTimeout(function(){$('#mobileerror').fadeOut('slow') }, 5000);
           // alert("Mobile No. should be 10 digit");
            document.getElementById('mobileNo').focus();
            return false;
       }
       if (!(y.charAt(0)=="9" || y.charAt(0)=="8" || y.charAt(0)=="7"))
       {
        $('#mobileerror').fadeIn().html("Mobile No Must start with 7,8,9");
                                 setTimeout(function(){$('#mobileerror').fadeOut('slow') }, 5000);
            // alert("Mobile No. should start with 7, 8 or 9");
            document.getElementById('mobileNo').focus();
            return false
       }
 }
 }


 function pincodevalidate()
 {
    
    
    var pincode=document.getElementById('pincode').value;
     if(pincode.length!=6)
     {
        $('#pincodeerror').fadeIn().html("pincode must be 6 digits");
                                 setTimeout(function(){$('#pincodeerror').fadeOut('slow') }, 5000);
     }
 }



 function AadharValidate() {
        var aadhar = document.getElementById("adharNo").value;
        var adharcardTwelveDigit = /^\d{12}$/;
        var adharSixteenDigit = /^\d{16}$/;
        if (aadhar != '') {
            if (aadhar.match(adharcardTwelveDigit)) {
                return true;
            }
            else if (aadhar.match(adharSixteenDigit)) {
                return true;
            }
            else {

                 $('#AdharError').fadeIn().html("Enter valid Aadhar Number");
                                 setTimeout(function(){$('#AdharError').fadeOut('slow') }, 5000);
//                 alert("Enter valid Aadhar Number");
                return false;
            }
        }
    }




</script>
<script>

  $(document).ready(function(){
  
 $("#showmainsearch").mouseover(function(){
    $("#showmainsearch").show();
  });
  
 $(document).click(function() {
   $("#showmainsearch").hide();
});
});

  $('#Allsearch').keyup(function(){
    // alert('bookName')
         
         
         var Allsearch=$('#Allsearch').val();
      
         if(Allsearch!='')
         {
          $('#showmainsearch').show();

        // $('#bookRgNo').val(0);
           $.ajax({
        url:base_path+"LoanActivation/fetchdata",
        type: "POST",
        data:{'fullName':Allsearch,
              // 'memberCode':Allsearch,
              'mobileNo':Allsearch
             },
        dataType:'json',
        success: function(data) {
         

          // console.log(data);
         
var output='';
if(data.length>0){ 
for(i=0;i<data.length;i++){
output+='<div class="row tt-suggestion tt-selectable" onclick="callalert(\''+data[i]['fullname']+'\',\''+data[i]['mobilenumber']+'\',\''+data[i]['memberid']+'\')"><div class="col-md-10" style="padding-right:5px; padding-left:5px;"><b style="font-size:14px;font-family: Roboto, sans-serif;"> '+data[i]['fullname']+' '+data[i]['mobilenumber']+'</b></div></div>';
}
}else{
  output+='<div class="row tt-suggestion tt-selectable" ><div class="col-md-10" style="padding-right:5px; padding-left:5px;"><b> Member is Not Registerd Yet !!!</b><br/> <span style="font-size:11px;color: #757575;"></span></div></div>';
  
}
$('#datamainsearchh').html(output);
          
          }
 });
          }
          else
          {
            $('#showmainsearch').hide();
          }

          });  

  function callalert(fullname,mobilenumber,memberid){
  if(fullname!=0 || memberid!=0){

      // alert(memberid);
$('#membernameview').empty();
     $('#Allsearch').val(fullname +'  '+ mobilenumber).trigger('change');
     $('#fkmemberId').val(memberid).trigger('change');
     $('#membernameview').append(fullname);
  }

}
</script>

<script>
$( ".body-content" ).click(function() {


$( ".ms-quick-bar-content" ).removeClass( "show" ).addClass( "hide" );
});
</script>

<script type="text/javascript">
  
   function calculateAmout() {
        var InstDuration = document.getElementById('InstDuration').value;
        var installmentAmt = document.getElementById('installmentAmt').value;
        var totalInstallmentAmt = document.getElementById('totalInstallmentAmt'); 
        // var myResult = installmentAmt * InstDuration;
          // document.getElementById('totalInstallmentAmt').value = myResult;
    }
function calculateinstAmout(){
  var InstDuration=$('#InstDuration').val();
  var totalInstallmentAmt=$('#totalInstallmentAmt').val();
  // alert(InstDuration)
  // if (totalInstallmentAmt!='' || InstDuration!='') {
    //  var myResult = parseFloat(totalInstallmentAmt) / parseFloat(InstDuration) ;
     // alert(myResult)
    //  $('#installmentAmt').val(parseFloat(myResult).toFixed(2));
  // }

}
</script>



  <script>
    $(document).ready(function () {
        $("#fkloantypeId").change(function () {
            var loanTypeId = $("#fkloantypeId").val();

          

            
            // alert(loanTypeId);

        $.ajax({

        url:base_path+"LoanActivation/getval",
        method: "POST",

        data:{'loanTypeId':loanTypeId},
        dataType: 'json',
        success: function(data){
            console.log(data);
            // show json data in html 
           $("#getloanTypeValue").val(data[0]['loantype_value']);
           $("#getloanTypeIdd").val(data[0]['loantype_id']);


            // var cartItemsList = document.getElementById("duration_value");

            // if(fkloantypeId == 1){
       
          var interetotalstamts = $('#interetotalstamt').val();
          var loanval = $('#getloanTypeValue').val();
          var getloanTypeIdd = $('#getloanTypeIdd').val();

if(getloanTypeIdd ==1){
  var getmonthval = parseFloat(loanval) * parseFloat(interetotalstamts);
          console.log('getmonthval',getmonthval);
          
          $('#monthval').val(parseFloat(getmonthval.toFixed(2)));
}
         

        // }

            calculateEndDate();
            }


            });
           
        });
   
    
    });
    


    
   
// *************  calculate end date***************
    function calculateEndDate() {
        var durationValue = parseInt(document.getElementById('getloanTypeValue').value) || 0;
        var startDate = document.getElementById('startDate').value;

        if (startDate && !isNaN(durationValue)) {
            var startDateObj = new Date(startDate);
            var endDateObj = new Date(startDateObj.getTime() + durationValue * 24 * 60 * 60 * 1000);

            var month = ('0' + (endDateObj.getMonth() + 1)).slice(-2);
            var date = ('0' + endDateObj.getDate()).slice(-2);
        
            var formattedEndDate = endDateObj.getFullYear() + '-' + month + '-' + date;

            console.log("endDate",formattedEndDate);

            document.getElementById('endDate').value = formattedEndDate;
          
        }
    }
// *************  calculate end date***************




     var txt_id = $('#txt_id').val();
// alert(txt_id);
     if(txt_id == undefined || txt_id ==""){
       
    $('#Installmentth').hide();
     }
     else{
      $('#Installmentth').show();

     }

     $('#fkloantypeId').on('change',function(){
       $('#Installmentth').hide();

     });








</script>


<script>
function AltMobile(){
if(document.getElementById('refmobile').value != ""){

   var y = document.getElementById('refmobile').value;
   if(isNaN(y)||y.indexOf(" ")!=-1)
   {
     $('#errormobileNo').fadeIn().html("Invalid number");
                             setTimeout(function(){$('#errormobileNo').fadeOut('slow') }, 2000);
      return false;
   }

   if (y.length>10 || y.length<10)
   {
        $('#errormobileNo').fadeIn().html("Mobile No Must be 10 digit");
                             setTimeout(function(){$('#errormobileNo').fadeOut('slow') }, 2000);
    
        return false;
   }

}

}

</script>