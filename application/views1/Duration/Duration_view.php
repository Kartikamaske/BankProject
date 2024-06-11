<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content " style="margin-top:-50px">
                <div class="breadcrumb">
                    <!-- <h1>User Creation</h1> -->
                   
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                          
                            <h3>&ensp;Add Duration</h3>
                            <form role="form" id="Form" enctype="multipart/form-data" action="" method="post">

                            <!-- <input type="text" class="form-control" id="durationId" placeholder="" name="durationId" value="<?php if(!empty($dataa[0]->durationId)){echo $dataa[0]->durationId;}?>"> -->

                                <div class="form-row">
                                    <div class="col-12 col-sm-2 col-md-4">
                                        <div class="mb-3">
                                            <label for="durationname">Duration Name <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" id="durationname" placeholder="" name="durationname" value="<?php if(!empty($dataa[0]->durationname)){echo $dataa[0]->durationname;}?>">
                                        </div>
                                    </div>

                

                                         <div class="col-md-12 text-right">
                                            <button class="btn btn-primary" type="button" name="btn_save" id="btn_save">Submit</button>
                                            <button class="btn btn-warning text-white" type="button" name="cancle" id="cancle"> <a href="<?=base_url() ?>AddCollage" class="text-white">Cancle</a> </button>

                                        </div>

                                        </div></div></div>


       <script  src="<?php echo base_url('web_resources');?>/dist/js/jquery.min.js"></script>          
        <script  src="<?php echo base_url('web_resources');?>/dist/js/controllers/DurationCreate.js"></script>
                   
                       
               
<script type="text/javascript">
function readimage(input,valueid) {
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
 
    var id = $('#durationId').val();
   
});





</script>
                   
                       
               
            