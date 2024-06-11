
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Assets/select2.min.css">

<style>
    .select2-search__field:focus-visible{
  border:1px solid #1d458e!important;
}

.select2-container--default .select2-results__option--highlighted[aria-selected]{
  background:#1d458e!important;
}

 .select2-container--default .select2-selection--single{
        padding: 4px 12px 6px 12px!important;
    } 
    
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
.table>thead>tr>th{
  padding:8px!important
}
</style>







<div class="main-content-wrap sidenav-open d-flex flex-column  " style="padding: 2rem 14px 0;">
            <!-- ============ Body content start ============= -->
    <div class="main-content mt-2 mt-lg-0">

    <div class="row mt-1">
        <div class="col-md-12 ">
        <div class="card mb-5  mt-0 bg-white">
                        <div class="card-body px-4 pb-4 pt-2">
          

          
              <h3 class="m-0 text-center py-2 " style="
    font-family: Rubiks!important;color:black;
">&ensp;Loan Activation Report</h3>
                       <hr class="my-2">
              
              <form class="needs-validation" id="Form" action="<?php echo base_url();?>CompanyMaster/create" method="post" autocomplete="off">




<div class="form-row">

<div class="col-md-5 ">
                    <label for="BhishiType">सभासदाचे नाव</label>
                    <div class="input-group ">
                    <select class="select2 form-control form-control-sm " id="fkmemberId" name="fkmemberId" style="width: 100%; height:35px;"  >

                      <option value="0">select Member</option>
                        <?php 
                            foreach ($data as $key => $value) {
                                 $selected='';
                            // if(!empty($data)){
                            //      if($data[0]->fkloantypeId==$value->loantype_id){
                            //           $selected='selected="selected"';
                            //     }
                            // }
                        ?>
                        <option value="<?php echo $value->loanActivationId;?>" <?php echo $selected;?> ><?php  echo $value->loanActivationId; ?> <?php  echo $value->fullname; ?> <?php  echo $value->mobilenumber; ?></option>

                        <?php  
                            }
                        ?>
                </select>
                  </div>
                  </div>
                  </div>



                  <div class="form-row mt-3">
                  <div class="col-md-2 divv divvv dd">
                  <label for="BhishiType">Loan Duration</label>
                      <div class="input-group">
                        <input type="text" disabled class="form-control " style="background: #cfdde6;
    border: none;" readonly id="loanType" name="loanType" value="">
                      </div>
                  </div>

                  <div class="col-md-2 ">
                    <label for="startDate">Start Date</label>
                      <div class="input-group">
                        <input type="text" class="form-control " style="background: #cfdde6;
    border: none;" readonly id="startDate" name="startDate" value="">
                      </div>
                  </div>

                  <div class="col-md-2">
                    <label for="startDate">End Date</label>
                      <div class="input-group">
                        <input type="text" class="form-control " style="background: #cfdde6;
    border: none;font-weight:bold" readonly id="endDate" name="endDate" value="">
                      </div>
                  </div>

                
                  <div class="col-md-2">
                  <label for="installmentType">हप्ताचा प्रकार</label>
                      <div class="input-group">
                        <input type="text"  class="form-control " style="background: #cfdde6;
    border: none;" readonly id="installmentType" name="installmentType" value="">
                      </div>
                  </div>
                  </div>






                  <div class="form-row mt-3">

                  <div class="col-md-2 divv divvv dd">
                    <label>हप्ता संख्या </label>
                      <div class="input-group">
                        <input type="number" readonly class="form-control" id="installmentno" name="installmentno" style="background: #cfdde6;border:none;"   value="" >
                       
                      </div>
                     
                  </div>

                  <div class="col-md-3 divv divvv dd pt-lg-3 d-flex justify-content-center align-items-center" style="gap:15px;cursor:pointer" >

                    
<div class="d-flex justify-content-center align-items-center" style="gap:1px;cursor:pointer">
<input type="radio" id="Include"   class="m-0" name="excludeorinclude" style="cursor:pointer" value="1" >
  <label for="Include" style="font-size: 16px!important;"><h5 style="font-family: 'Poppins'!important;margin-top:14px!important;cursor:pointer;color:#47404f;">Include </h5></label>
</div>


<div class="d-flex justify-content-center align-items-center" style="gap:1px;cursor:pointer">
<input type="radio" id="exclude"  class="m-0" name="excludeorinclude" style="cursor:pointer" value="0" >
  <label for="exclude" style="font-size: 16px!important;"><h5 style="font-family: 'Poppins'!important;margin-top:14px!important;cursor:pointer;color:#47404f;">Exclude</h5></label>
</div>




  
</div>
</div>


<div class="form-row mt-3"> 
                    
                  

                    <div class="col-lg-6 col-12">
                    <div class="form-row">
                    
                    <div class="col-md-6 divv divvv dd">
                                        <label>मुद्दल</label>
                                          <div class="input-group">
                                            <input type="text" class="form-control numberss" id="installmentAmt" name="installmentAmt"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"   value="" style="background: #cfdde6;
    border: none;" readonly>
                                           
                                          </div>
                    
                                      </div>
                    
                    
                    
                                      <div class="col-md-6 divv divvv dd">
                                        <label >व्याज   <span> ( वार्षिक ) </span>  </label>
                                          <div class="input-group">
                                            <input type="number" class="form-control" id="interestper" name="interestper"    value="" style="background: #cfdde6;
    border: none;" readonly>
                                           
                                          </div>
                                         
                                      </div>
                    
                    
                                      <div class="col-md-6 col-lg-6 divv divvv dd mt-3">
                                        <label >दंड <span id="penultytype"></span>   %</label>
                                          <div class="input-group">
                                            <input type="number" class="form-control" id="penaltyAmt" name="penaltyAmt"    value="" style="background: #cfdde6;
    border: none;" readonly>
                                           
                                          </div>
                                         
                                      </div>
                                     <div class="col-md-6 col-lg-6 divv divvv dd mt-3">
                                        <label >हप्ता र. <span id="hapthamt"></span></label>
                                          <div class="input-group">
                                            <input type="number" class="form-control" id="haptars" name="haptars"    value="" style="background: #cfdde6;
    border: none;" readonly>
                                           
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



                    <div class="col-lg-1 d-none d-lg-block col-12 px-0 "></div>


                    <div class="col-lg-5 justify-content-center align-items-center  px-4 pt-4 pb-2 col-12" style=" margin-top: -45px;   border: 2px solid #e91e63;
    border-radius: 5px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">

<div class=" mb-3 d-flex justify-content-start align-items-center" style="gap:10px">
    <div class="" style="width:35%;">
      <p class="mb-0"><b>मुद्दल</b></p>
    </div>
    <div class="">
    <input type="number" class="form-control  bg-white inputdesign" id="installmentAmt11" name="installmentAmt11"readonly   value="" >
    </div>
  </div>


  <div class=" mb-3 d-flex justify-content-start align-items-center" style="gap:10px">
    <div class="" style="width:35%;">

      <p class="mb-0"><b>एकूण व्याज र ( वार्षिक )</b></p>
    </div>
    <div class="">
    <input type="number" class="form-control  bg-white inputdesign" id="interestamt" name="interestamt"  readonly   value="" required>
    </div>
  </div>



  <div class=" mb-3 d-flex justify-content-start align-items-center" style="gap:10px">
    <div class="" style="width:35%;">
      <p class="mb-0"><b>व्याज र.  <span> ( Per Day ) </span></b></p>
    </div>
    <div class="">
    <input type="number" class="form-control  bg-white inputdesign" id="interetotalstamt" name="interetotalstamt" readonly   value=""  >

    </div>
  </div>


  <div class=" mb-3 d-flex justify-content-start align-items-center" style="gap:10px">
    <div class="" style="width:35%;">
      <p class="mb-0"><b>एकूण व्याज र <span id="showloantypeval" style="font-size: 12px;color:#1d458e"> </span></b></p>
    </div>
    <div class="">
    <input type="number" class="form-control  bg-white inputdesign" id="interestamttotal" name="interestamttotal"  readonly   value="" >
    </div>
  </div>


  <div class=" mb-3 d-flex justify-content-start align-items-center" style="gap:10px">
    <div class="" style="width:35%;">
      <p class="mb-0"><b>एकूण मुद्दल र.</b></p>
    </div>
    <div class="">
      

    <input type="number" class="form-control   inputdesign" id="totalInstallmentAmt" style="background: #cfdde6;
    border-radius: 6px!important;color: green;" name="totalInstallmentAmt"    value="" >

    </div>
  </div>


   
  </div>
  </div>


<br>
<div id="licence" class="collapse mt-5">
  <div class="row">
                                    <div class="col-md-12">
                                        <!-- <h4 style="color: deeppink;">Referance Details</h4> -->
                                        <div class="table-responsive">
                                         <table id="item_details_table" class="table table-bordered table-striped">
                                            <thead style="background: #1d458e;">
                                                <tr>
                                                    <th class="text-white" style="width: 7%;">ID</th>
                                                    <th class="text-white">Referance Name</th>
                                                    <th class="text-white" style="width: 10%;">Mobile </th>
                                                    <th class="text-white" style="width: 10%;">Relation</th>
                                                    <th class="text-white" style="width: 10%;">Document</th>
                                                    <th class="text-white" style="width: 20%;">Attachment</th>
                                                    
                                                    <!-- <th>Warning Days</th> -->
                                                    
                                                    
                                                </tr>
                                            </thead>
                                                <tbody id="Refrencedata">
                                         
                                        </tbody>
                                        </table>
                                    </div>
                                    </div>
                                    </div>
                                    </div>


                               


                                <div class="col-md-12 mt-3">
                                        <!-- <h4 style="color: deeppink;">Referance Details</h4> -->
                                        <div class="table-responsive">
                                         <table id="item_details_table" class="table table-bordered table-striped">
                                         <thead style="background:#1d458e;">
                        <tr>
                          <th class="text-center"  style="color:white!important;width: 10%;">Sr.No</th> 
                          <th class="text-center" style="color:white!important">Start Date</th>
                          <th class="text-center"  style="color:white!important">End Date</th>
                         
                          <th class="text-center"  style="color:white!important;    width: 19%;" id="Installmentth">Installment Amt</th>
                          <th class="text-center"  style="color:white!important;    width: 19%;" id="Installmentth">penalty Amt</th>
                          <th class="text-center"  style="color:white!important;    width: 19%;" id="Installmentth">status</th>
                          

                        </tr>
                      </thead>
                      <tbody id="ChargesTable" cass="text-center">
                                         
                                        </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>




              </div>
              <!-- **** row completed *** -->





</div>
</div>


                        </form>
                        </div>
                        </div>
                        </div>
                        </div>



                        <div class="modal fade" id="myModal">
                                        <div class="modal-dialog modal-lg ">
                                            <div class="modal-content">
                                            <form role="form" id="paynowform">

                                            <!-- Modal Header -->
                                            <div class="modal-header py-2">
                                                <h4 class="modal-title" style="font-weight:bold;">Pay Now</h4>
                                                <button type="button" class="close" data-dismiss="modal" id="modelclose" style="margin-top: -16px;
    font-size: 33px!important;
    color: var(--common_color)!important;
    opacity: 1;!important">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body pt-1">
                                            <input type="hidden" class="form-control" id="mInstallmentDatesId" name="mInstallmentDatesId"    value="" > 

                                            <input type="date"  class="form-control d-none" id="current_date" name="current_date"    value="" > 

                                                <p><b>Installment Amount : </b> <span id="showinstallmentAmt"></span></p>

                                                <p id="showpenaltytext"><b>Penalty : </b> <span id="showPenalty"></span></p>

                                          <div class="form-row">
                                          <div class="col-md-6 col-lg-6  mt-3">
                                        <label >Paid Installment </label>
                                          <div class="input-group">
                                            <input type="number" class="form-control" id="paidinstallment" name="paidinstallment" readonly     value="" >
                                           
                                          </div>
                                         
                                      </div>

                                      <div class="col-md-6 col-lg-6  mt-3" id="paidpenaltyBox">
                                        <label >Paid Penalty </label>
                                          <div class="input-group">
                                            <input type="number" class="form-control" id="paidpenalty" name="paidpenalty"    value="" >
                                           
                                          </div>
                                         
                                      </div>
                                          </div>
                                             
                                         <div class="d-flex justify-content-end mt-3">
                                         <button class="btn btn-primary  border-0 btnsave" type="button" name="paid_btn"   id="paid_btn">
                                    <i class="fa-regular fa-circle-check"></i> Pay Now
                                    </button>
                                         </div>

                                                
                                                </form>
                                            </div>
                                       </div>
                                  </div>
                                     <!-- model end -->




                        <script src="<?php echo base_url();?>Assets/jquery-3.3.1.min.js"></script>
                        <script src="<?php echo base_url();?>Assets/select2.min.js"></script>
 <script src="<?php echo base_url();?>Assets/select2.init.js"></script>
 <script src="<?php echo base_url();?>Assets/js/sweetalert.min.js"></script>


<script>
      $(document).ready(function(){
    $('#fkmemberId').on('change',function(){
        var fkmemberId = $('#fkmemberId').val();
        // alert(fkmemberId);


        
        $.ajax({

url:base_path+"LoanActivation/loactAllData",
method: "POST",

data:{'fkmemberId':fkmemberId},
dataType: 'json',
success: function(data){
    console.log(data);

   $("#loanType").val(data[0]['loantype_name']);
   $("#startDate").val(data[0]['startDate']);
   $("#endDate").val(data[0]['endDate']);
   $("#installmentType").val(data[0]['installmentTypeName']);
   $("#installmentno").val(data[0]['installmentno']);

if(data[0]['excludeorinclude']==1){
  $("#Include").prop("checked", true);   
}
else{
  $("#exclude").prop("checked", true);   

}

$("#installmentAmt").val(data[0]['installmentAmt']);
$("#interestper").val(data[0]['interestper']);
$("#penaltyAmt").val(data[0]['penaltyAmt']);
$("#haptars").val(data[0]['haptars']);
$("#installmentAmt11").val(data[0]['installmentAmt']);
$("#interestamt").val(data[0]['interestamt']);
$("#interetotalstamt").val(data[0]['interetotalstamt']);
$("#interestamttotal").val(data[0]['interestamttotal']);
$("#totalInstallmentAmt").val(data[0]['totalInstallmentAmt']);



    }


    });

// *******************  get refrence data******************

$.ajax({

url:base_path+"LoanActivation/getAllRefrences",
method: "POST",

data:{'fkmemberId':fkmemberId},
dataType: 'json',
success:function(res){
  console.log("Refrence data",res);
        if(res==""){
           
          var html='';
          html +='<tr>'+
                          '<td colspan="6" class="text-center"><p class="mb-0"><b>No Record Found<b></p></td>'+
                          '</tr>';
              
              
                      $('#Refrencedata').html(html);




        } 
        else{

             
    
               var html='';
               var a=1;
               var i;
               for(i=0; i<res.length; i++){
             
                var fklicencetypeId='';
                if (parseFloat(res[i].fklicencetypeId)=='1') {
                  fklicencetypeId="Aadhar card";
                }else if (parseFloat(res[i].fklicencetypeId)=='2'){
                  fklicencetypeId="PAN Card";
                }else if (parseFloat(res[i].fklicencetypeId)=='3'){
                  fklicencetypeId="Voter Id";
                }

        
                      html +='<tr>'+
                          '<td>'+a+'</td>'+
                          '<td>'+res[i].fullname+'</td>'+
                          '<td>'+res[i].refmobile+'</td>'+
                          '<td>'+res[i].relationName+'</td>'+
                          '<td>'+fklicencetypeId+'</td>'+
                          '<td><img src="' + base_path + 'referancephoto/' + res[0]['attachment'] + '" style="height: 70px;width: 150px;display: block;margin: 0 auto;"></td>'+

                          
                          '</tr>';
                           a++;


                      }
                      $('#Refrencedata').html(html);
                    }
                  }

             


    });

// ************** get All Installment dates******************


$.ajax({

url:base_path+"LoanActivation/getAllInstallmentdate",
method: "POST",

data:{'fkmemberId':fkmemberId},
dataType: 'json',
success:function(res){
  console.log("installmentdates data",res);
               
               
               var html='';
               var a=1;
               var i;
               for(i=0; i<res.length; i++){
             
         
                if(res[i].paidpenalty==null){
                  var paidpenalty =" 0.00";
                }
                else{
                  var paidpenalty =res[i].paidpenalty;
                }

                var ckdate='';

                var ccr = $('#current_date').val();
                console.log(ccr);
                var end =res[i].endDate1;
               
                const date1 = new Date(ccr);
                const date2 = new Date(end);
      
       


        if (date1.getTime() < date2.getTime()) {

          console.log(res[i].endDate , "0")
          ckdate=0;
       }
       else{
                  console.log(res[i].endDate  ,"1");
          ckdate=1;


                }
   




                var installment='';

      

                if (parseFloat(res[i].is_paid)=='1') {
                  installment="<div class='d-flex justify-content-center'  style='gap:10px'><button class='btn btn-default' style='background:green;color:white; id='paiddivv'   padding: 7px 28px;'>Paid</button> </div>";
                }else if (parseFloat(res[i].is_paid)=='0'){
                  installment="<div class='d-flex justify-content-center'  style='gap:10px'> <button type='button' class='btn btn-default' style='background:red;color:white' id='unpaiddiv'>UnPaid</button> <div><button type='button' class='btn btn-default' data-toggle='modal' data-target='#myModal' onclick='getid("+res[i].fkloanActivationId+ ','+res[i].mInstallmentDatesId+ ',' +ckdate+ ','+paidpenalty+ ")'  style='background:blue;color:white' id='unpaydiv'>Pay Now</button></div> </div>";
                }

        
                  html +='<tr>'+
                          '<td>'+a+'</td>'+
                          '<td>'+res[i].startDate+'</td>'+
                          '<td>'+res[i].endDate+'</td>'+
                          '<td>'+res[i].haptars +'</td>'+
                          '<td>'+paidpenalty +'</td>'+
                          '<td>'+installment+'</td>'+

                         '</tr>';
                           a++;


                      }
                      $('#ChargesTable').html(html);

                  },

                  error:function(){
                //  alert('Could not get data from database');
             }
});






    })

      });
</script>


<script>
   document.getElementById('current_date').valueAsDate = new Date();
  function getid(id,x,ckdate,paidpenalty){

    //  alert(paidpenalty.toFixed(2));
    
 if(ckdate==0){

  $('#paidpenaltyBox,#showpenaltytext').hide();
 }
 else{

  $('#paidpenaltyBox,#showpenaltytext').show();
 }

    $("#mInstallmentDatesId").val(x);

     $.ajax({

 url:base_path+"LoanActivation/getinstallmentAmt",
 method: "POST",

data:{'fkloanActivationId':id},
dataType: 'json',
success:function(res){
  console.log("getinstallmentAmt",res);
      
$("#showinstallmentAmt").text(res[0]['haptars']);
$("#showPenalty").text(paidpenalty.toFixed(2));
$("#paidinstallment").val(res[0]['haptars']);
$("#paidpenalty").val(paidpenalty.toFixed(2));



  

 },

                 
});


  }
</script>



<!-- ************ update paid amount******* -->
<script>
    var a=false;
$(document).ready(function(){
$("#paid_btn").click(function(){
  if(a==false){
    
    updatePayNow();
   }
  }); 
});


 function updatePayNow() 
{ 
   
    var mInstallmentDatesId=$('#mInstallmentDatesId').val();
    var paidinstallment=$('#paidinstallment').val();
    // var paidpenalty=$('#paidpenalty').val();
    

      if(paidinstallment=="" ) 
    {
       swal({
        title:"",
        text:"Please Enter Required Fields",
        type:"error",           
    });   
  }


    else
    {

    	if(mInstallmentDatesId>0)
    	{

            a=true;
    	
    		$.ajax({
        url:base_path+"LoanActivation/updatePayNow",
        type: "POST",
        data: $('#paynowform').serialize(),
         beforeSend: function(){
               $('#paid_btn').prop('disabled', true);
               $('#paid_btn').html('Loading');
          }, 
        success: function(data) {
           $('#paid_btn').prop('disabled', false);
           $('#paid_btn').html('Paid');
       
             
            
        swal({
                    title:"",
                    text:"Updated successfully...",
                    type:"success",
                    showCancelButton: false, 
                    showConfirmButton: false,
                    width: '1000px',
                    timer:200,
                    
                }); 

                setTimeout(() => {

             $("#modelclose").click();
          }, 400);
   
          $('#unpaiddiv').text('paid');
          $("#unpaiddiv").css("background-color","green");
          $("#unpaiddiv").css("color","white");

          $('#unpaydiv').hide();
         



        


        
        a=false;
           
          }
      });
    	}
       
      }
 }

</script>












<!-- <script>
      $(document).ready(function(){
  
  $("#showmainsearch").mouseover(function(){
     $("#showmainsearch").show();
   });
   
  $(document).click(function() {
    $("#showmainsearch").hide();
 });
 });
 
   $('#Allsearch').keyup(function(){
    
          
          
          var Allsearch=$('#Allsearch').val();
        // alert(Allsearch);
          if(Allsearch!='')
          {
           $('#showmainsearch').show();
 
         // $('#bookRgNo').val(0);
            $.ajax({
         url:base_path+"LoanActivation/loanactivationdata",
         type: "POST",
         data:{'fullName':Allsearch,
               // 'memberCode':Allsearch,
               'mobileNo':Allsearch
              },
         dataType:'json',
         success: function(data) {
          
 
           console.log(data);
          
 var output='';
 if(data.length>0){ 
 for(i=0;i<data.length;i++){
 output+='<div class="row tt-suggestion tt-selectable" onclick="callalert(\''+data[i]['fullname']+'\',\''+data[i]['mobilenumber']+'\',\''+data[i]['loanActivationId']+'\')"><div class="col-md-10" style="padding-right:5px; padding-left:5px;"><b style="font-size:14px;font-family: Roboto, sans-serif;"> '+data[i]['loanActivationId']+' '+data[i]['fullname']+' '+data[i]['mobilenumber']+'</b></div></div>';
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
</script> -->