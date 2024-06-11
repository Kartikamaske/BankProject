




<style>
        body{
        font-family: 'Poppins', sans-serif;
        }

        tr,th, td {
            border: 1px solid #dee2e6!important;
            padding: 8px!important;
        }

        table{
            border-top: 1px solid #dee2e6!important;
            border-bottom: 1px solid rgba(0, 0, 0, 0.3);
        }

        th{
           background:var(--common_color)!important;
            color: white!important;
        } 

        .styleforrow{
            margin-left:15px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
    border: 1px solid white!important;
    padding: 0px 0px!important;
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
    .select2-container--default .select2-selection--single{
        padding: 4px 12px 6px 12px!important;
    }
    
     table.dataTable{
    border-collapse: inherit!important;

    }
</style>
</style>

        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
    <div class="main-content mt-2 mt-lg-0">
        
        <div class="row mt-1">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body bg-white">

                    <div class="d-flex justify-content-between align-items-center">
                        <div></div>
                        <div>
                        <h3 class="text-dark mt-2 mb-1 text-center" style="
    font-family: Rubiks!important;
">&ensp;<span class="fw-bolder"> Deposite Completed Report</span></h3>
                        </div>


                        <div class="mt-1" >
                             <a style="float: right;">  
                                <button type="button" id="printbtn" class="btn  mt-0 btn-sm btn-default has-icon" style="background-color: var(--common_color); font-size: 13px; padding:7px 21px;color:white;margin-right: 12px;">
                                <i class="fas fa-print" style="font-size: 14px;"></i>
                                 Print</button>
                            </a>
                      </div>

                    </div>

                    <!-- <h3 class="text-dark mt-3 text-center">&ensp;<span class="fw-bolder">Member Report</span></h3> -->
                  <hr style="margin-top:3px;">


                  <div class="form-row mb-4 px-4 py-2 styleforrow">
                               
                                <div class="col-md-4">
                                <label for="">Member Name</label>
                                    <select class="select2 form-control" id="fkmemberId" 
                                            name="fkmemberId" style="width: 100%;">
                                            <option value="">Select Member</option>
                                                    <?php

                                                        foreach ($membername as $key => $value) {
                                                        $selected="";
                                                       

                                                        echo '<option value="'.$value->memberid.'"'.$selected.' >'.$value->memberid.'  '.$value->fullname.' '.$value->mobilenumber.'</option>';

                                                        }
                                                        ?>
                                                    
                                            </select>
                                </div>

                                <div class="col-md-2">
                                <label for="start_date">From Date</label>

                                        <input type="date"  id="startdt" placeholder="Start Date" class="form-control">
                                </div>


                                <div class="col-md-2">
                                <label for="">To Date</label>

                                <input type="date"  id="enddt" placeholder="Completed Date" class="form-control" >
                                </div>


                                <div class="col-md-1" style="padding-top: 29px;">
                                <button class="btn btn-primary" type="button"  id="searchbutton" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
                                background-color: var(--common_color);border: none;">Search</button>
                                </div>

                                
                            </div>


                            <!-- <div  id="printarea" >
                                Hello Hello
                            </div> -->

        <div class="container" id="printarea">
            <div class="statement_table checkout_dt" style="margin-top:5px!important;padding:10px 2px!important"  id="detialview">

                    <div class="statement_body">
                          <div id="maintable" class="col-lg-11 mx-auto">
                                <div class="table-responsive-md" style="overflow-y:hidden!important;">

                                    <table class="display table no-footer mt-3" >
                                        <thead style="background:var(--common_color)!important;">
                                            <tr>
                                            <th scope="col"> Id </th>
                                            <th scope="col">Member Name</th>
                                            <th scope="col">Address</th>
                                             <th scope="col">Adhar Number</th>
                                            <th scope="col">Mobile Number</th>
                                            <th scope="col">Duration</th>
                                            <th scope="col">Mobile Number</th>
                                            <th scope="col">Completed Date</th>
                                            <th scope="col">Total Amount</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody id="tabledata"> </tbody>

                                    </table>														
                                </div>
                            </div>
                      </div>
                 </div>
             </div>

                 <img src="<?php echo base_url(); ?>Assets/images/loading.gif" alt="" id="loadershow" class="shadow bg-white"  style="position:absolute;top:65%;right:47%;bottom:0;border-radius:50%">

                        <!-- end table -->
                    </div>
                </div>
            </div>
</div>
                  

<script  src="<?php echo base_url(); ?>Assets/css/jquery-3.3.1.min.js"></script>



    <script>
    $(document).ready(function(){
            document.getElementById('startdt').valueAsDate = new Date();
            document.getElementById('enddt').valueAsDate = new Date();

        $('#loadershow').hide();
            $('#detialview').show();
                $("#searchbutton").click(function(){
 
             //here we will run an ajax request
               let fkmemberId = document.getElementById('fkmemberId').value;
                let startDate = document.getElementById('startdt').value;
                let endDate = document.getElementById('enddt').value; 
 
        
 
             $.ajax({
 
                 url:"<?php echo base_url();?>MemberReport/GetData",
                 method: "POST",
 
                 data:{'fkmemberId':fkmemberId,
                       'startDate':startDate,
                        'endDate':endDate
                       },
               
                 // dataType:'JSON',
 
                 beforeSend: function(){
                      $('#loadershow').show();
                  },
                 success: function(res){
                  
                     setTimeout(() => {
                         $('#loadershow').hide();
 
                }, "200");
                     
                     
                // $('#maintable').show(); 
                  $('#Storedata').empty(); 
                  $('#maintable').empty(); 
                  
                  $('#maintable').append('<div class="table-responsive-md" id="tabls" style="border-collapse: inherit;"><table id="Storedata" class="display table  mt-3"> </table> </div>');

                  $.getScript('<?=base_url() ?>Assets/css/datatables.min.js');
 
                  var data=JSON.parse(res);
                   console.log(data.length);
               
                                                      
                           if (data!='') {
                           var dataSet6=[];
var x=1;
                for (var i = 0; i < data.length; i++){
                 console.log(data[i]['Id']);
                var id=data[i]['Id'];
                
                 dataSet6[i]= [
                
                 '<div class="pd">'+x+'</div>',
                 '<div class="pd">'+data[i]['fullname']+'</div>',
                 '<div class="pd">'+data[i]['address']+'</div>',
                 '<div class="pd">'+data[i]['adharnumber']+'</div>',
                 '<div class="pd">'+data[i]['mobilenumber']+'</div>',
                 '<div class="pd">'+data[i]['durationName']+'</div>',
                 '<div class="pd">'+data[i]['start_date']+'</div>',
                 '<div class="pd">'+data[i]['days_until_current_date']+'</div>',
                 '<div class="pd">'+data[i]['totalamount']+'</div>',

                ];
 x++;
      }

     
 
        var tableOne = $('#Storedata').DataTable({
                            data: dataSet6,
                            columns: [
                                { title: "Id" },
                                { title: "Fullname" },
                                { title: "Address" },
                                { title: "Adharnumber" },
                                { title: "mobilenumber" },
                                { title: "Duration Name" },
                                { title: "Start Date" },
                                { title: "End Date" },
                                { title: "Totalamount", visible: false},

                                ],
                            });
    
                        }
                           else
                           {
                             $('#Storedata').empty();
                            //   alert('No Data found');

                            swal({
              title:"",
              text:"Data Not Found",
              type:"error",
              showCancelButton: false, 
              showConfirmButton: true,
               width: '1000px',
            //   timer:300
          });
                              
                           }
                 }
             });
 
         });
     });
 </script>

 <script src="<?php echo base_url();?>Assets/select2.min.js"></script>
 <script src="<?php echo base_url();?>Assets/select2.init.js"></script>
 








<script>
    function printData() {
        var tableToPrint = document.getElementById("Storedata");
        var newWin = window.open("", "self");
        newWin.document.write('<html><head><title>Print</title>');
       
        newWin.document.write('<style>');
        newWin.document.write('tr { border: 1px solid #dee2e6!important; padding: 8px!important;text-align:center; }');
        newWin.document.write('th { border: 1px solid #dee2e6!important; padding: 8px!important;text-align:center;background:black!important;color:white!important }');
        newWin.document.write('td {  border: 1px solid #dee2e6!important;padding: 13px 8px!important;font-size:17px!important }');

        newWin.document.write('table { border-top: 1px solid #dee2e6!important; border-bottom: 1px solid rgba(0, 0, 0, 0.3); border-collapse: collapse; width: 100%; }');
        newWin.document.write('</style>');
        newWin.document.write('</head><body>');
        newWin.document.write('<h1 style="font-family:poppins;text-align:center;" class="mb-4">Member Report</h1>');
        newWin.document.write(tableToPrint.outerHTML);
        newWin.document.write('</body></html>');
        newWin.print();
        newWin.close();
    }


    $('#printbtn').on('click', function () {
  
        printData();
    });
</script>




                   
                       
               
            