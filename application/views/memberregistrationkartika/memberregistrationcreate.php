<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Assets/select2.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Assets/multiselect.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family='Poppins'">
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
       border:2px solid #3169ce!important
    }

    .select2-container--default .select2-selection--single{
        padding: 4px 12px 6px 12px!important;
    }
</style>

        <!-- =============== Left side End ================-->
<div class="main-content-wrap sidenav-open d-flex flex-column" style="padding: 2rem 14px 0;">
            <!-- ============ Body content start ============= -->
    <div class="main-content mt-2 mt-lg-4">
        <div class="separator-breadcrumb border-top"></div>
            <div class="form-row ">
                <div class="col-md-12">
                    <div class="card my-4 bg-white">
                        <div class="card-body p-4">
                        <h3 class="m-0 text-center">&ensp;Member Registration</h3>
                        <hr class="my-2">

                            <form role="form" id="Form" enctype="multipart/form-data" action="" method="post">

                            <input type="hidden" class="form-control" id="memberid" placeholder="" name="memberid" value="<?php if(!empty($dataa[0]->memberid)){echo $dataa[0]->memberid;}?>"></br>

                            <!-- <input type="hidden" class="form-control" id="registrationId" placeholder="" name="registrationId" value="<?php if(!empty($user[0]->registrationId)){echo $user[0]->registrationId;}?>"> -->


                            <div class="form-row"> 
                                <div class="col-12 col-sm-12 col-md-4 col-lg-3">
                                    <label for="">Member Code <span class="text-danger">*</span></label>
                                    <input type="number" name="membercode" id="membercode"  class="form-control" value="<?php if(!empty($dataa[0]->membercode)){echo $dataa[0]->membercode;}?>" min="1" onchange="checkMobileNumber()">
                                    <p id="error_mob" class="text-danger"></p>
                                    <p id="error_msgMob"></p>
                                </div>   
                                

                                <div class="col-12 col-sm-12 col-md-4 col-lg-3 md-5">
                                    <label for="">First Name <span class="text-danger">*</span></label>
                                    <input type="text" name="firstname" id="firstname" class="form-control" value="<?php if(!empty($dataa[0]->firstname)){echo $dataa[0]->firstname;}?>" oninput="updateFullName()">
                                </div>

                                <div class="col-12 col-sm-12 col-md-4 col-lg-3 md-5">
                                    <label for="">Middle Name <span class="text-danger">*</span></label>
                                    <input type="text" name="middlename" id="middlename" class="form-control" value="<?php if(!empty($dataa[0]->middlename)){echo $dataa[0]->middlename;}?>" oninput="updateFullName()">
                                </div>


                                <div class="col-12 col-sm-12 col-md-4 col-lg-3 md-5">
                                    <label for="">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" name="lastname" id="lastname" class="form-control" value="<?php if(!empty($dataa[0]->lastname)){echo $dataa[0]->lastname;}?>" oninput="updateFullName()">
                                </div>
                            


                            <!-- <div class="form-row">  -->
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                    <label for="">Full Name<span class="text-danger">*</span></label>
                                    <input type="text" name="fullname" id="fullname"  class="form-control" value="<?php if(!empty($dataa[0]->fullname)){echo $dataa[0]->fullname;}?>" readonly>
                                </div>   


                                <div class="col-12 col-sm-12 col-md-4 col-lg-2 md-5">
                                        <label for="">Date Of Birth</label>
                                        <input type="date" name="dateofbirth" id="dateofbirth" class="form-control" value="<?php if(!empty($dataa[0]->dateofbirth)){echo $dataa[0]->dateofbirth;}?>">
                                    </div>
                                

                                
                                <div class="col-12 col-sm-12 col-md-4 col-lg-2 md-5">
                                    <label for="">Mobile No <span class="text-danger">*</span></label>
                                    <input type="number" name="mobilenumber" id="mobilenumber" class="form-control" value="<?php if(!empty($dataa[0]->mobilenumber)){echo $dataa[0]->mobilenumber;}?>" onKeyPress="if(this.value.length==10) return false;"  oninput="AltMobile()">
                                    <p  style="color:red;font-size:12px;" class="mb-2 mx-3" id="errormobileNo"></p>
                                </div>


                                <div class="col-12 col-sm-12 col-md-4 col-lg-2">
                                        <label for="">Pin code <span class="text-danger">*</span></label>
                                        <input type="number" name="pincode" id="pincode"  class="form-control" value="<?php if(!empty($dataa[0]->pincode)){echo $dataa[0]->pincode;}?>" onKeyPress="if(this.value.length==6) return false;" oninput="Alpincode()">
                                        <p style="color:red;font-size:12px;" class="mb-2 mx-3" id="errorpincode"></p>
                                    </div>   
                                    
                                   

                                    <div class="col-12 col-sm-12 col-md-4 col-lg-2 md-5">
                                        <label for="">Adhar Card Number <span class="text-danger">*</span></label>
                                        <input type="number" name="adharnumber" id="adharnumber" class="form-control" value="<?php if(!empty($dataa[0]->adharnumber)){echo $dataa[0]->adharnumber;}?>" onKeyPress="if(this.value.length==12) return false;" oninput="Aladharvalidation()">
                                        <p  style="color:red;font-size:12px;" class="mb-2  mx-3" id="erroradharnumber"></p>
                                    </div>

                            <!-- </div> -->


                            <!-- <div class="form-row">
                                <div class="col-12 col-sm-12">
                                     <button type="button" data-toggle="collapse" id="btn_collapse" data-target="#Details" class="btn btn-add btn-md waves-effect waves-light" style="background: #165d73;background: #165d73;height: 33px;font-size: 15px;color:white;" aria-expanded="true">Personal Details</button>
                                </div>
                            </div> -->
                            
                            <!-- collapse use to hide show -->
                           <div id="Details" class="collapse mt-5 show" style="">
                             <div class="form-row"> 
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-2 md-5">
                                        <label for="">State</label>
                                        <select class="select2 form-control form-control-sm" id="fkstate" 
                                            name="fkstate" style="width: 100%;">
                                                    <?php

                                                        foreach ($State as $key => $value) {
                                                        $selected="";
                                                        if(!empty($dataa[0]->memberid)){
                                                                        
                                                        if ($value->stateId == $dataa[0]->fkstate) {
                                                            $selected="selected='selected'";
                                                        } 
                                                        } 

                                                        echo '<option value="'.$value->stateId.'"'.$selected.' >'.$value->stateName.'</option>';

                                                        }
                                                        ?>
                                                    
                                            </select>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-4 col-lg-2 md-5">
                                            <label for="">City</label>
                                            <select class="select2 form-control form-control-sm" id="fkcity" 
                                            name="fkcity" style="width: 100%;">
                                                    <?php

                                                        foreach ($City as $key => $value) {
                                                        $selected="";
                                                        if(!empty($dataa[0]->memberid)){
                                                                        
                                                        if ($value->cityId == $dataa[0]->fkcity) {
                                                            $selected="selected='selected'";
                                                        } 
                                                        } 

                                                        echo '<option value="'.$value->cityId.'"'.$selected.' >'.$value->cityName.'</option>';

                                                        }
                                                        ?>
                                                    
                                            </select>
                                    </div>


                                    <div class="col-12 col-sm-12 col-md-4 col-lg-2 md-5">
                                        <label for="">Taluka</label>
                                        <select class="select2 form-control form-control-sm" id="fktaluka" 
                                            name="fktaluka" style="width: 100%;">
                                                    <?php

                                                        foreach ($Taluka as $key => $value) {
                                                        $selected="";
                                                        if(!empty($dataa[0]->taskId)){
                                                                        
                                                        if ($value->talukaId == $dataa[0]->fktaluka) {
                                                            $selected="selected='selected'";
                                                        } 
                                                        } 

                                                        echo '<option value="'.$value->talukaId.'"'.$selected.' >'.$value->talukaName.'</option>';

                                                        }
                                                        ?>
                                                    
                                            </select>
                                        </div>

                                        <!--     -->
                                <!-- </div> -->

                                <!-- <div class="form-row">  -->
                                   

                                    <div class="col-12 col-sm-12 col-md-4 col-lg-3 md-5">
                                        <label for="">Family Chief</label>
                                        <input type="text" name="familychief" id="familychief" class="form-control" value="<?php if(!empty($dataa[0]->familychief)){echo $dataa[0]->familychief;}?>">
                                    </div>


                                    <div class="col-12 col-sm-12 col-md-4 col-lg-3 md-5 text-center" style="position:relative;">
                                           <label for="">Photo </label>
                                           <input type="file" class="form-control form-control-sm" id="photo1" name="photo1" placeholder="image" onchange="readimage1(this,'profile-img-tag1');" value="<?php if(!empty($dataa))echo $dataa[0]->photo1; ?>"  >
                                                                
                                            <?php if(!empty($dataa[0]->photo1)){
                                            ?>
                                                <img src="<?php echo base_url();?>upload/<?php echo $dataa[0]->photo1 ?>" id="profile-img-tag1" calss="img-thumbnail" style="height: 86px;margin: 10px 32px;"> 
                                            <?php } else
                                            // these is for at the time of update bydefault image not show
                                                 echo '<img src="https://bhishi.jstrading.tech/assets/img/img_avatar.png" id="profile-img-tag1" calss="img-thumbnail" style="margin: 10px 32px;height:100px;border-radius: 10px; margin-top: 20px;position:absolute;bottom:-193%;left:17%;" />';
                                            
                                            ?>
                                                    
                                       
                                            <input type="hidden" name="hidden_photo1" id="hidden_photo1" value="<?php if(!empty($dataa[0]->photo1)){echo $dataa[0]->photo1;} ?>"> 
                                            
                                            <input type="hidden" id="getphoto1" value="<?php if(!empty($dataa[0]->photo1)){echo $dataa[0]->photo1;} ?>">
                                    </div>
                             <br>
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-5 mt-3">
                                        <label for="">Address</label>
                                        <textarea class="form-control custom-control" rows="3" id="address" name="address" placeholder="Enter address" onkeypress="return onlyAlphabets(event,this)" required="" data-parsley-id="3139"><?php if(!empty($dataa[0]->address)){echo $dataa[0]->address;}?></textarea>
                                    </div>
                                </div>

                               
                          </div>

                            
                             <div class="col-md-12 text-center p-5">
                                <button class="btn btn-primary" type="button" name="btn_save"       id="btn_save" style="background-color: #d41574;color:white">
                                <i class="fa-regular fa-circle-check"></i> Submit
                                 </button>
                                            
                                 <!-- <button class="btn btn-primary text-white" type="button" name="cancle" id="cancle"> -->
                                 <a href="<?=base_url() ?>MemberRegistration" class="text-white btn btn-primary text-white" type="button" name="cancle" id="cancle">
                                 <i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                 <!-- </button> -->
                             </div>
            </div>
        </div>
    </div>
</div>

<script  src="<?php echo base_url('web_resources');?>/dist/js/jquery.min.js"></script>          
<script  src="<?php echo base_url('web_resources');?>/dist/js/controllers/MemberCreate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     
 <script src="<?php echo base_url();?>Assets/jquery-3.3.1.min.js"></script>
 <script src="<?php echo base_url();?>Assets/select2.min.js"></script>
 <script src="<?php echo base_url();?>Assets/select2.init.js"></script>
                       
   <script>
        $(document).ready(function(){
            var id = $('#memberid').val();

            if(id==0 && id==""){
            // to show current date 
            document.getElementById('dateofbirth').valueAsDate = new Date();
            }

            });
   </script>


<script>

function readURL(input) {
    var fileInput = input;
    var previewImg = document.getElementById('blah');

    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            previewImg.src = e.target.result;
        };

        reader.readAsDataURL(fileInput.files[0]);
    }
}

// Add this JavaScript code to hide the file input
document.addEventListener('DOMContentLoaded', function() {
    var fileInput = document.getElementById('memberPhotoPath');

    // Hide the file input
    fileInput.style.display = 'none';
});
</script>

<script>
    // get the values of first,middle last in fullname field
    function updateFullName() {
        var firstName = $('#firstname').val();
        var middleName = $('#middlename').val();
        var lastName = $('#lastname').val();

        var fullName = firstName + ' ' + middleName + ' ' + lastName;

        $('#fullname').val(fullName);
    }
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
 
 var id = $('#memberid').val();


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


<!-- mobile number validation -->
<script>
function AltMobile() {
    var mobileNumber = document.getElementById('mobilenumber').value;

    if (mobileNumber !== "") {
        if (isNaN(mobileNumber) || mobileNumber.indexOf(" ") !== -1) {
            showErrorMobile("Invalid number");
            return false;
        }

        if (mobileNumber.length !== 10) {
            showErrorMobile("Mobile No must be 10 digits");
            return false;
        }
    }
}

function showErrorMobile(message) {
    var errorElement = document.getElementById('errormobileNo');
    errorElement.innerHTML = message;
    errorElement.style.color = 'red';
    errorElement.style.display = 'block';
    
    setTimeout(function() {
        errorElement.style.display = 'none';
    }, 2000);
}
</script>


<!-- pincode validation -->
<script>
function Alpincode() {
    var pinNumber = document.getElementById('pincode').value;

    if (pinNumber !== "") {
        if (isNaN(pinNumber) || pinNumber.indexOf(" ") !== -1) {
            showErrorPincode("Invalid number");
            return false;
        }

        if (pinNumber.length !== 6) {
            showErrorPincode("Pincode must be 6 digits");
            return false;
        }
    }
}

function showErrorPincode(message) {
    var errorElement = document.getElementById('errorpincode');
    errorElement.innerHTML = message;
    errorElement.style.color = 'red';
    errorElement.style.display = 'block';
    
    setTimeout(function() {
        errorElement.style.display = 'none';
    }, 2000);
}
</script>

<!-- aadhar validation -->
<script>
function Aladharvalidation() {
    var AdharNumber = document.getElementById('adharnumber').value;

    if (AdharNumber !== "") {
        if (isNaN(AdharNumber) || AdharNumber.indexOf(" ") !== -1) {
            showErrorAdhar("Invalid number");
            return false;
        }

        if (AdharNumber.length !== 12) {
            showErrorAdhar("Number must be 12 digits");
            return false;
        }
    }
}

function showErrorAdhar(message) {
    var errorElement = document.getElementById('erroradharnumber');
    errorElement.innerHTML = message;
    errorElement.style.color = 'red';
    errorElement.style.display = 'block';
    
    setTimeout(function() {
        errorElement.style.display = 'none';
    }, 2000);
}
</script>




<!-- <script>
        function checkMobileNumber() {
            // alert('hii');
            var membercode = $("#membercode").val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url('MemberRegistration/checkMobileNumber'); ?>",
                // url:base_path+'MemberRegistration/checkMobileNumber',
                data: { membercode: membercode },
                success: function(response) {
                    if(data==1)
            {
            //   $('#error_msgMob').html('<p class="text-danger">error</p>');
              swal({
                    title:"",
                    text:"Mobile No. Already Exists!",
                    type:"error",           
                }); 

                $('#membercode').val("");
            }
                }
            });
        }
    </script> -->


    <script type="text/javascript">
        
    $(document).ready(function(){
    $('#membercode').change(function(){
      var membercode=$(this).val();

      if ( $.trim($('#membercode').val()) != '') {
        // alert(membercode);
       $.ajax({
                url:base_path+'MemberRegistration/checkuserexist',
                method: 'post',
                data: {membercode: membercode},
                // dataType:'json',
                success: function(data){
                // console.log(data);
                              
              if(data==1)
            {
      
              swal({
                    title:"",
                    text:"Member code Already Exists!",
                    type:"error",           
                }); 

                $('#membercode').val("");
            }
            
    }
                    });
      }
    });
}) 
</script>









   
            