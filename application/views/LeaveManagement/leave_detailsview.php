
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family='Poppins'">



<style>
    body{
font-family: 'Poppins', sans-serif;
}
</style>

        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
    <div class="main-content">
        <div class="breadcrumb d-flex justify-content-end">  </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body bg-white">

                    <h3 class="text-center text-dark mt-3">&ensp;<span class="fw-bolder"> Leave Detalis</span></h3>
                  <hr style="margin-top:3px;">

                        <!-- <div class="card-title mb-1 py-2">
                            <h3 class="mb-0">&ensp; Leave Detalis</h3>
                        </div> -->

                        <div class="d-flex justify-content-end m-3">
                            <a href="<?=base_url() ?>LeaveManagement/create" class="text-white">
                                <button class="btn btn-primary" type="button" name="" id="" style="background-color: #d41574;color:white">Add Leave</button>
                            </a>
                        </div>

                        <input type="hidden" class="form-control" id="registrationId" placeholder="" name="registrationId" value="<?php if(!empty($user[0]->registrationId)){echo $user[0]->registrationId;}?>">

                        <div class="table-responsive p-2">
                            <table class="display table table-striped table-bordered" id="example" style="width:100%">
                                <thead class="table-head-style">
                                    <tr>
                                        <!-- <th style="width:7%">O/P</th> -->
                                        <th>id</th>
                                        <!-- <th>registration id</th> -->
                                        <th>Leave Reason</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Verify</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>

                                     <?php 
                                     
                                        $i=1;
                                        foreach($data as $rw=>$value){

                                            $flag=$value->verifyflag;

                                        echo "<tr>";
                                        // echo  '<td class="text-center"><a href="'.base_url().'LeaveManagement/update/'.$value->leaveid.'"><i class="fas fa-eye" style="font-size: 16px;"></i></a> 
                                        // </td>';
                                
                                        echo "<td>".$i."</td>";
                                        // echo "<td>".$value->fkregisterid."</td>";
                                        echo "<td>".$value->leave_reason."</td>";
                                        echo "<td>".$value->leave_start_date."</td>";
                                        echo "<td>".$value->leave_end_date."</td>";

                                        if($flag==0){

                                            $a="<button class='btn btn-danger'>Not Verify</button>";

                                          }
                                          else{
                                            //   $a="Verify"; 
                                            //   $a="<span style='color:white;background-color:green;'>Verify</span>"; 
                                            $a ="<button class='btn' style='background-color:blue;color:white;'>Verify</button>";

                                          }
  
                                         echo  "<td>".$a."</td>";

                                        //  echo "<td><button class='btn'>$a</button></td>";

                                        // echo "<td>".$value->typeName."</td>";
                                        $i++;
                              
                                        echo "</tr>";                        
                                        }
                                    ?>
                                          
                                </tbody>
                            </table>
                        </div>
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
                   
                       
               
            