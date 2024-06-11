

<style>
      body{
        font-family: 'Poppins', sans-serif;}

        .select2-container--default .select2-selection--single:focus {
            box-shadow: none!important;
           border: 2px solid #3169ce!important;
    }
         .select2-container--default .select2-selection--single:focus-visible {
            box-shadow: none!important;
           border: 2px solid #3169ce!important;
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

    .form-control:focus{
        box-shadow: none!important;
        /* border: 2px solid #d41574!important; */
       border:2px solid var(--common_color)!important
    }

    .select2-container--default .select2-selection--single{
        padding: 4px 12px 6px 12px!important;
    }
    .table-bordered thead th{
        padding: 6px 14px;
    }
</style>

        <!-- =============== Left side End ================-->
<div class="main-content-wrap sidenav-open d-flex flex-column" style="padding: 2rem 14px 0;">
            <!-- ============ Body content start ============= -->
    <div class="main-content mt-0">
            <div class="row">
                <div class="col-md-12">
                <div class="card mb-5  mt-0 bg-white">
                        <div class="card-body px-4 pb-4 pt-2">
                        <h3 class="m-0 text-center py-0" style="
    font-family: Rubiks!important;color:black!important;
">&ensp;Deposite</h3>
                     
                        <hr class="my-2">

                            <form role="form" id="Form" enctype="multipart/form-data" action="" method="post">

                            <input type="hidden" class="form-control" id="deposite_id" name="deposite_id" value="<?php if(!empty($dataa[0]->deposite_id)){echo $dataa[0]->deposite_id;}?>">

                            <div class="form-row"> 
                                   


                                   


                                    <div class="col-12 col-sm-12 col-md-4">
                                    <label for="">Member Name<span class="text-danger">*</span></label>
                                    &nbsp; 
                                    <select class="select2 form-control form-control-sm" id="fkmembername" name="fkmembername" style="width: 100%;" <?php echo (!empty($dataa[0]->deposite_id)) ? 'disabled' : ''; ?>>
                                        <option value="">Select Member</option>
                                        <?php
                                            foreach ($membername as $key => $value) {
                                                $selected = "";
                                                if (!empty($dataa[0]->deposite_id)) {
                                                    if ($value->memberid == $dataa[0]->fkmembername) {
                                                        $selected = "selected='selected'";
                                                    }
                                                }

                                                echo '<option value="' . $value->memberid . '"' . $selected . ' >' . $value->memberid . ' ' . $value->fullname . ' ' . $value->mobilenumber . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>

                           



                                <div id="plusbtn">
                                <a data-toggle="modal" data-target="#myModal" href="javascript:void(0)"  class="btn btn-primary border-0 text-white" style="min-width: 18px;padding: 6px 10px;background:var(--common_color);margin-top:30px;"><i class="fas fa-plus"></i></a>
                              </div>
                                

                                    
                                    <div class="col-12 col-sm-12 col-md-2" hidden>
                                        <button class="btn btn-primary" style="margin-top: 23px!important;">Member</button>
                                    </div> 


                                    <div class="col-12 col-sm-12 col-md-4">
                                        <label for="">Address</label>
                                        <textarea class="form-control custom-control border-0" style="background:#cfdde6;" rows="3" id="address" name="address"   data-parsley-id="3139" readonly><?php if(!empty($dataa[0]->address)){echo $dataa[0]->address;}?></textarea >
                                    </div> 

                                    <div class="col-12 col-sm-12 col-md-3">
                                        <label for="">Mobile Number</label>
                                        <input type="number" name="mobilenumber" id="mobilenumber" style="background:#cfdde6;" class="form-control border-0" value="<?php if(!empty($dataa[0]->mobilenumber)){echo $dataa[0]->mobilenumber;}?>" readonly>
                                    </div> 

                                    <div class="col-12 col-sm-12 col-md-2 mt-4">
                                        <label for="">Adhar Number</label>
                                        <input type="number" name="adharnumber" id="adharnumber"  style="background:#cfdde6;"  class="form-control" value="<?php if(!empty($dataa[0]->adharnumber)){echo $dataa[0]->adharnumber;}?>"  style="background:#cfdde6;" readonly>
                                    </div> 

                                    <div class="col-12 col-sm-12 col-md-2 mt-4">
                                        <label for="deposit_amount">Deposit Amount <span class="text-danger">*</span></label>
                                        <input type="number" name="deposit_amount" id="deposit_amount"  class="form-control" value="<?php if(!empty($dataa[0]->deposit_amount)){echo $dataa[0]->deposit_amount;}?>" oninput="addition();calculateInterest();calculateDayInterest()">
                                    </div>


                                    <div class="col-12 col-sm-12 col-md-2 mt-4">
                                        <label for="">Duration <span class="text-danger">*</span></label>
                                        <select class="select2 form-control form-control-sm" id="durationperiod" 
                                            name="durationperiod" style="width: 100%;" onchange="calculateEndDateFordurationperiod();completeddateconstant()">

                                              <option value="0">Select Duration</option>

                                                    <?php

                                                        foreach ($duration as $key => $value) {
                                                        $selected="";
                                                        if(!empty($dataa[0]->deposite_id)){
                                                                        
                                                        if ($value->durationId == $dataa[0]->durationperiod) {
                                                            $selected="selected='selected'";
                                                        } 
                                                        } 

                                                        echo '<option value="'.$value->durationId.'"'.$selected.' >'.$value->durationName.'</option>';

                                                        }
                                                        ?>
                                                    
                                            </select>
                                    </div> 


                                    <div class="col-12 col-sm-12 col-md-2 mt-4 d-none" >
                                        <label for="">duration value</label>
                                        <input type="number" name="duration_value" id="duration_value" class="form-control" value="" onchange="calculateEndDate()">
                                    </div> 



                                    <div class="col-12 col-sm-12 col-md-2 mt-4" hidden>
                                        <label for="end_date">End Date</label>
                                        <input type="text" id="end_date" class="form-control" readonly>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-2 mt-4" hidden>
                                        <label for="currentdate">Current date</label>
                                        <input type="date" id="currentdate"  name="currentdate" class="form-control" value="<?php if(!empty($dataa[0]->currentdate)){echo $dataa[0]->currentdate;}?>">
                                    </div>

                                    

                                    <div class="col-12 col-sm-12 col-md-2 mt-4">
                                        <label for="start_date">Start Date <span class="text-danger">*</span></label>
                                        <input type="date" name="start_date" id="start_date"  class="form-control" value="<?php if(!empty($dataa[0]->start_date)){echo $dataa[0]->start_date;}?>" onchange="calculateEndDate()">
                                    </div>


                                    <div class="col-12 col-sm-12 col-md-2 mt-4">
                                        <label for="days_until_current_date">Completed Date </label>
                                        <input type="date" name="days_until_current_date" id="days_until_current_date" class="form-control border-0" value="<?php if(!empty($dataa[0]->days_until_current_date)){echo $dataa[0]->days_until_current_date;}?>" readonly onchange="completeddateconstant()" style="background: #cfdde6;
    font-weight: 700;
    color: #262323;">
                                    </div>


                                    <div class="col-12 col-sm-12 col-md-2 mt-4">
                                        <label for="interest_rate">Interest Rate<span class="text-danger">*</span></label>
                                        <input type="number" name="interest_rate" id="interest_rate"  class="form-control" value="<?php if(!empty($dataa[0]->interest_rate)){echo $dataa[0]->interest_rate;}?>" oninput="calculateInterest();addition();calculateDayInterest()">
                                    </div>


                                    <div class="col-12 col-sm-12 col-md-2 mt-4">
                                        <label for="interest_amount">Interest Amount (Annual)</label>
                                        <input type="text" name="interest_amount" id="interest_amount"  class="form-control" value="<?php if(!empty($dataa[0]->interest_amount)){echo $dataa[0]->interest_amount;}?>" oninput="addition();calculateDayInterest()">
                                    </div>


                                    <div class="col-12 col-sm-12 col-md-2 mt-4">
                                        <label for="day_interest_amount">Day Interest Amount</label>
                                        <input type="text" name="day_interest_amount" id="day_interest_amount"  class="form-control border-0" value="<?php if(!empty($dataa[0]->day_interest_amount)){echo $dataa[0]->day_interest_amount;}?>" oninput="addition()" style="background:#cfdde6;" readonly>
                                    </div>


                                    <div class="col-12 col-sm-12 col-md-2 mt-4">
                                        <label for="totalamount">Total Amount</label>
                                        <input type="number" name="totalamount" id="totalamount"  class="form-control border-0" value="<?php if(!empty($dataa[0]->totalamount)){echo $dataa[0]->totalamount;}?>" style="background:#cfdde6;" oninput="addition()" readonly>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-4 mt-4">
                                        <label for="">Note</label>
                                        <textarea class="form-control custom-control" rows="3" id="note" name="note" ><?php if(!empty($dataa[0]->note)){echo $dataa[0]->note;}?></textarea>
                                    </div>


                                    <!-- <button type="button" class="btn btn-primary" >Open modal</button> -->

                                  
                            </div>   
                                                    </form>



                                                      <!-- model start -->
                                    <div class="modal fade" id="myModal">
                                        <div class="modal-dialog modal-lg ">
                                            <div class="modal-content">
                                            <form role="form" id="Form1" enctype="multipart/form-data" action="" method="post">

                                            <!-- Modal Header -->
                                            <div class="modal-header py-2">
                                                <h4 class="modal-title" style="font-weight:bold;">Add Member</h4>
                                                <button type="button" class="close" data-dismiss="modal" id="modelclose" style="margin-top: -16px;
    font-size: 33px!important;
    color: var(--common_color)!important;
    opacity: 1;!important">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body pt-1">
                                                
                                            <p class="text-center mb-1" style="    color: var(--common_color)!important;font-family: 'Poppins'!important;font-size:18px;    font-weight: 700;" id="showfullnm"></p>

                                                    <div class="form-row">

                                                    <input type="hidden" class="form-control" id="memberid"  name="memberid" value="<?php if(!empty($dataa[0]->memberid)){echo $dataa[0]->memberid;}?>">


                                                    <div class="col-12 col-sm-12 col-md-4 mt-4">
                                                    <label for="">First Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="firstname" id="firstname"  class="form-control" value="<?php if(!empty($dataa[0]->firstname)){echo $dataa[0]->firstname;}?>" oninput="updateFullName()">
                                                     </div>


                                                     <div class="col-12 col-sm-12 col-md-4 mt-4">
                                                    <label for="">Middle Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="middlename" id="middlename"  class="form-control" value="<?php if(!empty($dataa[0]->middlename)){echo $dataa[0]->middlename;}?>" oninput="updateFullName()">
                                                     </div>


                                                     <div class="col-12 col-sm-12 col-md-4 mt-4">
                                                    <label for="">Last Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="lastname" id="lastname"  class="form-control" value="<?php if(!empty($dataa[0]->lastname)){echo $dataa[0]->lastname;}?>" oninput="updateFullName()">
                                                     </div>

                                                     <div class="col-12 col-sm-12 col-md-6 mt-4 d-none">
                                                    <label for="">Full Name </label>
                                                    <input type="text" name="fullname" id="fullname" class="form-control border-0" value="<?php if(!empty($dataa[0]->fullname)){echo $dataa[0]->fullname;}?>" readonly style="background:#cfdde6;">
                                                     </div>

                                                    


                                                     <div class="col-12 col-sm-12 col-md-3 mt-4">
                                                    <label for="">Mobile No. <span class="text-danger">*</span></label>
                                                    <input type="number" name="mobilenumber" id="mobileNo"  class="form-control" value="<?php if(!empty($dataa[0]->mobilenumber)){echo $dataa[0]->mobilenumber;}?>" onKeyPress="if(this.value.length==10) return false;" >
                                                     </div>

                                                     


                                                     <div class="col-12 col-sm-12 col-md-6 mt-4">
                                                        <label for="">Address <span class="text-danger">*</span> </label>
                                                        <textarea class="form-control custom-control" rows="3" id="address" name="address"   data-parsley-id="3139"><?php if(!empty($dataa[0]->address)){echo $dataa[0]->address;}?></textarea>
                                                    </div>
                                                    
                                                   

                                                    <div class="col-12 col-sm-12 col-md-3 mt-4">
                                                    <label for="">Adhar Card No <span class="text-danger">*</span></label>
                                                    <input type="number" name="adharnumber" id="adharNo"  class="form-control" value="<?php if(!empty($dataa[0]->adharnumber)){echo $dataa[0]->adharnumber;}?>" onKeyPress="if(this.value.length==12) return false;">
                                                     </div>


                                                     <div class="col-12 col-sm-12 col-md-3 mt-4">
                                                    <label for="">Pincode</label>
                                                    <input type="number" name="pincode" id="pincode"  class="form-control" value="<?php if(!empty($dataa[0]->pincode)){echo $dataa[0]->pincode;}?>" onKeyPress="if(this.value.length==6) return false;">
                                                     </div>


                                                     <div class="col-12 col-sm-12 col-md-3 mt-4">
                                                    <label for="">Family Chief </label>
                                                    <input type="text" name="familychief" id="familychief"  class="form-control" value="<?php if(!empty($dataa[0]->familychief)){echo $dataa[0]->familychief;}?>" >
                                                     </div>

                                                   

                                                </div>

                                                    <button class="btn mt-2 mb-3 float-right" type="button" name="btn_model" id="btn_model" style="background-color:var(--common_color);color:white">
                                                     <i class="fa-regular fa-floppy-disk"></i> Save
                                                     </button>
                                                </form>
                                            </div>
                                       </div>
                                  </div>
                                     <!-- model end -->
                  </div>

                            
                             <div class="col-md-12 text-center p-5">
                                <button class="btn btn-primary  border-0 btnsave" type="button" name="btn_save"  id="btn_save">
                                <i class="fa-regular fa-circle-check"></i> Submit
                                 </button>
                                            
                                 <!-- <button class="btn btn-primary text-white" type="button" name="cancle" id="cancle">
                                 <a href="<?php echo base_url();?>Deposite" class="text-white">
                                 <i class="fa-solid fa-pen-to-square"></i> Edit</a> </button> -->


                                 <a href="<?=base_url() ?>Deposite" class="border-0 text-white btn btn-primary  text-white btncancel" type="button" name="cancle" id="cancle" style="background:var(--common_color)!important;">
                                 <i class="fa-solid fa-xmark"></i> Edit</a>
                             </div>


                             <div class="table-responsive p-2" id="showtable">
                            <table class="display table table-striped table-bordered  border border-2"  style="width:100%">
                                <thead class="table-head-style">
                                    <tr>
                                        <th>Id</th>
                                        <th>Member Name</th>
                                        <th>Address</th>
                                        <th>Adhar Number</th>
                                        <th>Mobile Number</th>
                                        <th>Duration</th>
                                        <th>Start Date</th>
                                        <th>Completed Date</th>
                                        <th>Total Amount</th>

                                    
                                    </tr>
                                </thead>
                                <tbody id="Pending">  </tbody>
                            </table>
                        </div>
            </div>
        </div>
    </div>
</div>

<script  src="<?php echo base_url('web_resources');?>/dist/js/jquery.min.js"></script>          
<script  src="<?php echo base_url('web_resources');?>/dist/js/controllers/DepositeCreate.js"></script>
<script  src="<?php echo base_url('web_resources');?>/dist/js/controllers/ModeldepositeCreate.js"></script>

     
 <!-- <script src="<?php echo base_url();?>Assets/jquery-3.3.1.min.js"></script> -->
 <script src="<?php echo base_url();?>Assets/select2.min.js"></script>
 <script src="<?php echo base_url();?>Assets/select2.init.js"></script>
                       
   <script>
        $(document).ready(function(){
            var id = $('#deposite_id').val();

            if(id==0 && id==""){
            // to show current date 
            document.getElementById('start_date').valueAsDate = new Date();
            document.getElementById('currentdate').valueAsDate = new Date();
            document.getElementById('days_until_current_date').valueAsDate = new Date();


            }

            });
   </script>



<script type="text/javascript">

function readimage1(input,valueid) {
                                            // alert("hello");
      if (input.files && input.files[0]) {
        var reader = new FileReader();
         reader.onload = function (e) {
         $('#'+valueid+'').attr('src',e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
  } 


  $(document).ready(function(){
 
 var id = $('#deposite_id').val();


 if(id==0){
     // $('#audio').change(function(e){
     //     var fileName = e.target.files[0].name;


     //     $('#getaudio').val(fileName);
     // });



     $('#photo').change(function(e){
         var filePhoto = e.target.files[0].name;


         $('#getphoto').val(filePhoto);
     });
 }
 
});

  </script>


<script>
    $(document).ready(function () {
        $("#fkmembername").change(function () {
            var fkkmemberid = $("#fkmembername").val();
          

        $.ajax({

        url:base_path+"Deposite/selectmember",
        method: "POST",

        data:{'fkkmemberid':fkkmemberid},
        dataType: 'json',
        success: function(data){
            console.log("show address",data[0]['address']);
            // show json data in html 
            $("#address").val(data[0]['address']);
            $("#mobilenumber").val(data[0]['mobilenumber']);
            $("#adharnumber").val(data[0]['adharnumber']);

            var cartItemsList = document.getElementById("address");
            var cartItemsList = document.getElementById("mobilenumber");
            var cartItemsList = document.getElementById("adharnumber");

            // dropdownfetch();
            }

            });
           
        });

    
    });
    
</script>




<script>
    $(document).ready(function () {
        $("#durationperiod").change(function () {
            var duration_id = $("#durationperiod").val();

            
            // alert(duration_id);

        $.ajax({

        url:base_path+"Deposite/selectduration",
        method: "POST",

        data:{'duration_id':duration_id},
        dataType: 'json',
        success: function(data){
            console.log(data);
            // show json data in html 
            $("#duration_value").val(data[0]['durationValue']);

            var cartItemsList = document.getElementById("duration_value");

            calculateEndDate();
            }


            });
           
        });

    
    });
    
</script>






<script>
    function calculateEndDate() {
        var durationValue = parseInt(document.getElementById('duration_value').value) || 0;
        var startDate = document.getElementById('start_date').value;

        if (startDate && !isNaN(durationValue)) {
            var startDateObj = new Date(startDate);
            var endDateObj = new Date(startDateObj.getTime() + durationValue * 24 * 60 * 60 * 1000);

            var month = ('0' + (endDateObj.getMonth() + 1)).slice(-2);
            var date = ('0' + endDateObj.getDate()).slice(-2);
            // var formattedEndDate = date + '-' + month + '-' + endDateObj.getFullYear();
            var formattedEndDate = endDateObj.getFullYear() + '-' + month + '-' + date;

            console.log("jhj",formattedEndDate);

           var a =   document.getElementById('days_until_current_date').value = formattedEndDate;
           console.log("fgdgh",a);
        }
    }
</script>




<script>
    function calculateInterest() {
        // Get deposit amount and interest rate
        var depositAmount = parseFloat(document.getElementById('deposit_amount').value) || 0;
        var interestRate = parseFloat(document.getElementById('interest_rate').value) || 0;

        // Calculate interest amount
        var interestAmount = (depositAmount / 100) * interestRate;

        // Update the interest amount input field
        document.getElementById('interest_amount').value = interestAmount.toFixed(2);
    }
</script>




<script>
    function addition() {
        var depositAmount = parseFloat(document.getElementById("deposit_amount").value) || 0;
        var interestAmount = parseFloat(document.getElementById("interest_amount").value) || 0;

        // Calculate total amount
        var totalAmount = depositAmount + interestAmount;

        // Update total amount input field
        document.getElementById("totalamount").value = totalAmount.toFixed(2); 
    }

    // Trigger addition function only when deposit amount changes
    document.getElementById("deposit_amount").addEventListener("input", addition);
    document.getElementById("interest_amount").addEventListener("input", addition);
</script>


<script>
    function calculateEndDateFordurationperiod() {
        var durationValue = parseInt(document.getElementById('durationperiod').value) || 0;
        var startDate = document.getElementById('start_date').value;

        if (startDate && !isNaN(durationValue)) {
            var startDateObj = new Date(startDate);
            var endDateObj = new Date(startDateObj.getTime() + durationValue * 24 * 60 * 60 * 1000);

            var months = durationValue / 30; // assuming 1 month = 30 days
            var formattedEndDate = months.toFixed(0) + ' month = ' + durationValue + ' days';

            // console.log("jhj",formattedEndDate);

          
              document.getElementById('days_until_current_date').value = formattedEndDate;
            // console.log("finaldt",a);
        }
    }
</script>


<script>
    // get the values of first,middle last in fullname field
    function updateFullName() {
        var firstName = $('#firstname').val();
        var middleName = $('#middlename').val();
        var lastName = $('#lastname').val();

        var fullName = firstName + ' ' + middleName + ' ' + lastName;

        $('#fullname').val(fullName);
        $('#showfullnm').text(fullName);

    }
    
</script>





<script>
    $(document).ready(function(){
  
    $("#fkmembername").change(function(){

    // alert('hii');


      gettableofmemberdata();
        
    });

});

var id = $('#deposite_id').val();
if(id>0){
   var fkmemberID =  $('#fkmembername').val();
//    alert(fkmemberID);


   $('#Pending').empty();
            $.ajax({
                url:"<?php echo base_url();?>Deposite/getmemberdata",
                method: "POST",
                data:{'fkmembername':fkmemberID},
                success: function(data){
                    console.log(data);


                    $('#Pending').empty();
                    $('#Pending').append(data);

                }

            });
}

function gettableofmemberdata(){
    var fkmembername = $('#fkmembername').val();
    // alert(fkmembername); 
            $('#Pending').empty();
            $.ajax({
                url:"<?php echo base_url();?>Deposite/getmemberdata",
                method: "POST",
                data:{'fkmembername':fkmembername},
                success: function(data){
                    // alert('hello');
                    console.log(data);
                    $('#Pending').empty();
                    $('#Pending').append(data);

                }

            });
}
</script>


<script>
    function calculateDayInterest() {
        var interestAmountInput = document.getElementById("interest_amount");
        var dayInterestAmountInput = document.getElementById("day_interest_amount");

        // Parse the interest amount as a float
        var interestAmount = parseFloat(interestAmountInput.value);

        // Calculate day interest amount
        var dayInterestAmount = interestAmount / 365;

        // Update the day interest amount input field
        dayInterestAmountInput.value = dayInterestAmount; // Adjust decimal places as needed
    }
</script>

<script>
    function completeddateconstant(){
        var durationperiod = document.getElementById("durationperiod").value;
        var completedDateInput = document.getElementById("days_until_current_date");

            if(durationperiod === ""){
                completedDateInput.value = "0";
            }
    }
    
</script>





