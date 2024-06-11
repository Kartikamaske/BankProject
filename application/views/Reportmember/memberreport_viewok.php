
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family='Poppins'">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Assets/select2.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Assets/multiselect.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />


<style>
    body{
    font-family: 'Poppins', sans-serif;
    }

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
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
    <div class="main-content mt-2 mt-lg-4">
        <!-- <div class="breadcrumb d-flex justify-content-end">  </div> -->
        <!-- <div class="separator-breadcrumb border-top"></div> -->
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body bg-white">

                    <h3 class="text-dark mt-3 text-center">&ensp;<span class="fw-bolder">Member Report</span></h3>
                  <hr style="margin-top:3px;">


                  <div class="row mb-4 px-4 py-2">
                                <label for="">Member Name</label>
                                <div class="col-md-3">
                                    <select class="select2 form-control" id="fkmembername" 
                                            name="fkmembername" style="width: 100%;">
                                            <option value="">Select Member</option>
                                                    <?php

                                                        foreach ($membername as $key => $value) {
                                                        $selected="";
                                                        if(!empty($dataa[0]->deposite_id)){
                                                                        
                                                        if ($value->memberid == $dataa[0]->fkmembername) {
                                                            $selected="selected='selected'";
                                                        } 
                                                        } 

                                                        echo '<option value="'.$value->memberid.'"'.$selected.' >'.$value->memberid.'  '.$value->fullname.' '.$value->mobilenumber.'</option>';

                                                        }
                                                        ?>
                                                    
                                            </select>
                                </div>

                                <label for="start_date">From Date</label>
                                <div class="col-md-2">
                                        <input type="date"  id="startdt" placeholder="Start Date" class="form-control">
                                </div>


                                <label for="">To Date</label>
                                <div class="col-md-2">
                                <input type="date"  id="enddt" placeholder="Completed Date" class="form-control" >
                                </div>


                                <div class="col-md-2 ">
                                <button class="btn btn-primary" type="button"  id="searchbutton" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
                                background-color: var(--themecolor);border: none;">Search</button>
                                </div>

                                
                            </div>

                        

                        <div class="table-responsive p-2">
                            <table class="display table table-striped table-bordered" id="example" style="width:100%">
                                <thead class="table-head-style">
                                    <tr>
                                        <th>Id</th>
                                        <th style="width:22%;">Member Name</th>
                                        <th>Address</th>
                                        <th>Adhar Number</th>
                                        <th>Mobile Number</th>
                                        <th>Duration</th>
                                        <th>Start Date</th>
                                        <th>Completed Date</th>
                                        <th>Total Amount</th>

                                    
                                    </tr>
                                </thead>
                                <tbody id="Pending"> </tbody>
                            </table>
                        </div>


                        <!-- end table -->
                    </div>
                </div>
            </div>
</div>
                  

<script  src="<?php echo base_url(); ?>web_resources/dist/js/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<script>
	$(document).ready(function() {
   

    $('#example').dataTable();
 
    
} );
</script>


<script>
   
    $(document).ready(function(){

        $("#searchbutton").click(function(){
        // alert('hii');
        // getsearchoAlldata();
            
        });
    });


        // for all data on search button 
    function getsearchoAlldata(){
        var fkmembername = $('#fkmembername').val();
        // alert(fkmembername); 
                $('#Pending').empty();
                $.ajax({
                    url:"<?php echo base_url();?>MemberReport/getallreport",
                    method: "POST",
                    data:{'fkmembername':fkmembername},
                    success: function(data){
                        // alert('hello');
                        console.log(data);
                        $('#Pending').append(data);

                    }

                });
    }
</script>



            <!-- for member ,start date and search report  -->
            <script type="text/javascript">
            document.getElementById('startdt').valueAsDate = new Date();
            document.getElementById('enddt').valueAsDate = new Date();
            $("#searchbutton").click(function(){
                // alert('hii');
                let fkmembername = document.getElementById('fkmembername').value;
                let startDate = document.getElementById('startdt').value;
                let endDate = document.getElementById('enddt').value;


       
                        if (( startDate == "" || endDate == "" )) {

                        swal({
                                title:"",
                                text:"Please Enter Required Fields",
                                type:"error",           
                            });

                        }else{

                                    $.ajax({
                                        url:"<?php echo base_url(); ?>MemberReport/GetData",
                                        method:"POST",
                                        data:{'fkmembername':fkmembername,
                                        'startDate':startDate,
                                        'endDate':endDate

                                       },
                                        // dataType:'json',
                                        beforeSend: function(){
                                          $('#searchbutton').prop('disabled', true);
                                          $('#loader').show();
                                          },
                                        success:function(res){  
                                        // $('#loader').hide();
                                        $('#searchbutton').prop('disabled', false);   
                                        console.log(res);                                
                                            
                                            $('#Pending').empty(); 
                                            $('#Pending').append(res);
                                              
                                        }
                                    });
    }
  
});
</script>


<script src="<?php echo base_url();?>Assets/select2.min.js"></script>
 <script src="<?php echo base_url();?>Assets/select2.init.js"></script>
                   
                       
               
            