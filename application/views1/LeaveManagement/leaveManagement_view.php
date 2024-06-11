<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Assets/select2.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Assets/multiselect.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family='Poppins'">
<style>
      body{
        font-family: 'Poppins', sans-serif;}
</style>

        <!-- =============== Left side End ================-->
<div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
    <div class="main-content mt-2">
        <!-- <div class="breadcrumb"></div> -->
        <div class="separator-breadcrumb border-top"></div>
            <div class="form-row ">
                <div class="col-md-12">
                    <div class="card my-4 bg-white">
                        <div class="card-body p-4">
                        <h2 class="text-center">&ensp;Leave Application</h2>
                        <hr style="margin-top:10px;">

                            <!-- <div class="card-title mb-1 py-1">
                                <h2>&ensp;Leave Application</h2>
                            </div> -->

                            <form role="form" id="Form" enctype="multipart/form-data" action="" method="post">

                            <input type="hidden" class="form-control" id="leaveid" placeholder="" name="leaveid" value="<?php if(!empty($dataa[0]->leaveid)){echo $dataa[0]->leaveid;}?>"></br>

                            <input type="hidden" class="form-control" id="registrationId" placeholder="" name="registrationId" value="<?php if(!empty($user[0]->registrationId)){echo $user[0]->registrationId;}?>">


                            <div class="form-row"> 
                                <div class="col-12 col-sm-12 col-md-3 col-lg-2">
                                    <label for="">Leave Start Date</label>
                                    <input type="date" name="leave_start_date" id="leave_start_date"  class="form-control" value="<?php if(!empty($dataa[0]->leave_start_date)){echo $dataa[0]->leave_start_date;}?>">

                                </div>   
                                <!-- <label for="" class="col-md-1">From</label>  -->

                                <!-- <?php if($dataa[0]->leaveid){

                                } ?> -->

                                
                                <div class="col-12 col-sm-12 col-md-3 col-lg-2 md-5">
                                    <label for="">Leave End Date</label>
                                    <input type="date" name="leave_end_date" id="leave_end_date" class="form-control" value="<?php if(!empty($dataa[0]->leave_end_date)){echo $dataa[0]->leave_end_date;}?>">
                                </div>
                            </div><br>

                            
                            <div class="form-row"> 

                                <div class="col-12 col-sm-12 col-md-6 col-lg-8" >
                                <label for="">Leave Reason</label>
                                
                                <textarea name="leave_reason" id="leave_reason" cols="90" rows="10" class="form-control"><?php if(!empty($dataa[0]->leave_reason)){echo $dataa[0]->leave_reason;}?></textarea>
                                </div>

                            </div>



                                <div class="col-md-12 text-right p-5">
                                            <button class="btn btn-primary" type="button" name="btn_save"       id="btn_save" style="background-color: #d41574;color:white">
                                                <i class="fa-regular fa-floppy-disk"></i> Submit
                                            </button>
                                            
                                            <button class="btn btn-primary text-white" type="button" name="cancle" id="cancle">
                                            <a href="<?=base_url() ?>LeaveManagement" class="text-white">
                                            <i class="fa-solid fa-ban"></i> Cancel</a> </button>

                                </div>

            </div>
        </div>
    </div>
</div>

       <script  src="<?php echo base_url('web_resources');?>/dist/js/jquery.min.js"></script>          
        <script  src="<?php echo base_url('web_resources');?>/dist/js/controllers/LeaveManagementCreate.js"></script>
     
        <script src="<?php echo base_url();?>Assets/jquery-3.3.1.min.js"></script>
          <script src="<?php echo base_url();?>Assets/select2.min.js"></script>
          <script src="<?php echo base_url();?>Assets/select2.init.js"></script>
                       
   <script>
        $(document).ready(function(){

document.getElementById('leave_start_date').valueAsDate = new Date();
document.getElementById('leave_end_date').valueAsDate = new Date();



// this function for restrict past dates
$(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var minDate= year + '-' + month + '-' + day;

    $('#leave_end_date').attr('min', minDate);
});


        });

   </script>

   
            