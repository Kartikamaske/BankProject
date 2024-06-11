




<style>
    table.dataTable{
  border-collapse: collapse!important;

}
</style>

        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
    <div class="main-content mt-2 mt-lg-0">
    
        <div class="row mt-1">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body bg-white">

                  

                        <div class="d-flex justify-content-between align-items-center px-3">
                            <div></div>
                            <div> 
                                <h3 class="text-dark mt-2 mb-1" style="
    font-family: Rubiks!important;">&ensp;<span class="fw-bolder">Deposite Details</span></h3>
                            </div>

                            <div class="mt-1">
                                <a href="<?=base_url() ?>Deposite/create" class="text-white btn" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;background-color: var(--themecolor);color:white">
                                    <i class="fa-solid fa-user"></i> &nbsp;Add Deposite
                                </a>
                            </div>
                        </div>
                   
                      <hr class="my-2">

                        <input type="hidden" class="form-control" id="registrationId" placeholder="" name="registrationId" value="<?php if(!empty($user[0]->registrationId)){echo $user[0]->registrationId;}?>">

                        <div class="table-responsive p-2">
                            <table class="display table table-striped table-bordered" id="example" style="width:100%">
                                <thead class="table-head-style">
                                    <tr>
                                        <th style="width:5%">O/P</th>
                                        <th>Id</th>
                                        <th>Member Name</th>
                                        <th>Address</th>
                                        <th>Adhar No.</th>
                                        <th>Mobile No.</th>
                                        <th>Duration</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Total Amount</th>

                                    
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                        $i=0;
                                        foreach($detailsdeposite as $rw=>$value){
                                        echo "<tr>";
                                        echo  '<td><a href="'.base_url().'Deposite/update/'.$value->deposite_id.'"><i class="fa-solid fa-pen-to-square" style="font-size:19px;color:var(--common_color);"></i></a> 
                                        </td>';
                                        echo "<td>".$value->deposite_id."</td>";
                                        echo "<td>".$value->fullname."</td>";
                                        echo "<td>".$value->address."</td>";
                                        echo "<td>".$value->adharnumber."</td>";
                                        echo "<td>".$value->mobilenumber."</td>";
                                        echo "<td>".$value->durationName."</td>";
                                        echo "<td>".$value->start_date."</td>";
                                        echo "<td>".$value->days_until_current_date."</td>";
                                        echo "<td>".$value->totalamount."</td>";





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
                  


                   
                       
               
            