

<style>
     table.dataTable{
  border-collapse: collapse!important;

}
</style>

        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
    <div class="main-content mt-1 mt-lg-0">
        <!--<div class="breadcrumb d-flex justify-content-end">  </div>-->
        <!--<div class="separator-breadcrumb border-top"></div>-->
        <div class="row mt-1">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body bg-white">

                         <div class="d-flex justify-content-between align-items-center px-3">
                            <div></div>
                            <div> 
                                <h3 class="text-dark mt-2 mb-1" style="
    font-family: Rubiks!important;">&ensp;<span class="fw-bolder">Registration Details</span></h3>
                            </div>

                            <div>
                                <a href="<?=base_url() ?>MemberRegistration/create" class="text-white btn" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;background-color: var(--common_color);color:white">
                                    <i class="fa-solid fa-user"></i> &nbsp;Add Member
                                </a>
                            </div>
                        </div>
                   
                  <hr class="my-2">

                        <input type="hidden" class="form-control" id="registrationId" placeholder="" name="registrationId" value="<?php if(!empty($user[0]->registrationId)){echo $user[0]->registrationId;}?>">

                        <div class="table-responsive px-4 pb-3 pt-2" >
                            <!--<i class="fa-solid fa-magnifying-glass searchicon"></i>-->
                            <table class="display table table-bordered" id="example" style="width:100%;    border-left: 1px solid #dee2e6;border-right: 1px solid #dee2e6;border-bottom: 1px solid #dee2e6;">
                                <thead class="table-head-style">
                                    <tr>
                                        <th style="width:5%">O/P</th>
                                        <!-- <th style="width: 12%;">Member Code</th> -->
                                        <th>Member Name</th>
                                        <th>Address</th>
                                        <th style="width: 9%;">Pin code</th>
                                        <th style="width: 10%;">Adhar No</th>
                                        <th style="width: 10%;">Mobile No</th>

                                    
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                        $i=0;
                                        foreach($detailviewmember as $rw=>$value){
                                        echo "<tr>";
                                        echo  '<td  class="text-center"><a href="'.base_url().'MemberRegistration/update/'.$value->memberid.'"><i class="fa-solid fa-pen-to-square" style="font-size:19px;color:var(--common_color);"></i></a> 
                                        </td>';
                                        // echo "<td>".$value->membercode."</td>";
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
                  


                   
                       
               
            