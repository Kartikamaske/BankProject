
        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb d-flex justify-content-end">
                  
               
                    
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                            
                            
                                <div class="card-title mb-1">
                                <h3 class="mb-0">&ensp; Duration Details</h3>
                                </div>



                                <div class="d-flex justify-content-end mb-2">
                            <button class="btn btn-primary"  type="button" name="" id="">
                    <a href="<?=base_url() ?>Duration/create" class="text-white">Add New</a>
                </button>
                            </div>
                                <div class="table-responsive">
                                    <table class="display table table-striped table-bordered" id="example" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="width:7%">O/P</th>
                                                <th>durationId </th>
                                                <th>durationname</th>
                                                <!-- <th>Musician</th>

                                                <th>Artist</th> -->
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <?php 
                                 $i=0;
                                foreach($data as $rw=>$value){
                                 echo "<tr>";
                                 echo  '<td><a href="'.base_url().'Duration/update/'.$value->durationId.'"><i class="fas fa-eye" style="font-size: 16px;"></i></a> 
                                 </td>';
                                
                                 echo "<td>".$value->durationId."</td>";
                                 echo "<td>".$value->durationname."</td>";
                                //  echo "<td>".$value->musician."</td>";
                                //  echo "<td>".$value->artist."</td>"; 
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
                   
                       
               
            