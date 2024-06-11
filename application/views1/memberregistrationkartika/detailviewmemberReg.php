
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family='Poppins'">



<style>
    body{
font-family: 'Poppins', sans-serif;
}
</style>

        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
    <div class="main-content mt-2 mt-lg-4">
        <div class="breadcrumb d-flex justify-content-end">  </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body bg-white">

                    <h3 class="text-dark mt-3">&ensp;<span class="fw-bolder">Registration Details</span></h3>
                  <hr style="margin-top:3px;">

                        <!-- <div class="card-title mb-1 py-2">
                            <h3 class="mb-0">&ensp; Leave Detalis</h3>
                        </div> -->

                        <div class="d-flex justify-content-end m-3">
                            <a href="<?=base_url() ?>MemberRegistration/create" class="text-white">
                                <button class="btn" type="button" name="" id="" style="background-color: var(--themecolor);color:white"><i class="fa-solid fa-plus"></i> &nbsp;Add Member</button>
                            </a>
                        </div>

                        <input type="hidden" class="form-control" id="registrationId" placeholder="" name="registrationId" value="<?php if(!empty($user[0]->registrationId)){echo $user[0]->registrationId;}?>">

                        <div class="table-responsive p-2">
                            <table class="display table table-striped table-bordered" id="example" style="width:100%">
                                <thead class="table-head-style">
                                    <tr>
                                        <th style="width:7%">O/P</th>
                                        <th>Id</th>
                                        <th>Member Code</th>
                                        <th>Member Name</th>
                                        <th>Address</th>
                                        <th>Pin code</th>
                                        <th>Adhar Number</th>
                                        <th>Mobile Number</th>

                                    
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                        $i=0;
                                        foreach($detailviewmember as $rw=>$value){
                                        echo "<tr>";
                                        echo  '<td><a href="'.base_url().'MemberRegistration/update/'.$value->memberid.'"><i class="fa-solid fa-pen-to-square" style="font-size:19px;color:var(--themecolor);"></i></a> 
                                        </td>';
                                        echo "<td>".$value->memberid."</td>";
                                        echo "<td>".$value->membercode."</td>";
                                        echo "<td>".$value->fullname."</td>";
                                        echo "<td>".$value->address."</td>";
                                        echo "<td>".$value->pincode."</td>";
                                        echo "<td>".$value->adharnumber."</td>";
                                        echo "<td>".$value->mobilenumber."</td>";


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
                   
                       
               
            