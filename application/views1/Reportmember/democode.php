                    
                    
                    <div class="statement_table checkout_dt" style="margin-top:5px!important;padding:10px 2px!important"  id="detialview">

                             <div class="statement_body">
 
                             <div id="maintable" >
        
                          </div>
                                 <div class="table-responsive-md" style="overflow-y:hidden!important;">
 
                                     <table class="display table  no-footer mt-3" id="example">
                                     <thead style="background:#ededed!important;">
                                       <tr>
										  <th scope="col" style="background:#ededed!important"> Profile
                                          </th>
										  <th scope="col" style="background:#ededed!important" style="width:500px!important">Name</th>
										
                                          <th scope="col" style="background:#ededed!important">Mobile No</th>
										  <th scope="col" style="background:#ededed!important">Loction</th>
                                      
										</tr>
                                         </thead>
                                         
                                         <tbody id="tabledata">
                                      
                                             
                                           
                                         </tbody>
 
                                    
                                     </table>														
                                 </div>
                             </div>
 
                         
                         </div>
 
                        
                         <img src="Assets/img/loader.svg" alt="" id="loadershow" class="shadow bg-white"  style="position:absolute;top:65%;right:47%;bottom:0;border-radius:50%">





 <script>

 $(document).ready(function(){
 $('#loadershow').hide();
     $('#detialview').hide();
         $("#btn_save").click(function(){
             $('#loadershow').show();
 
 
             //here we will run an ajax request
             var firmCategory = $('#searchbox').val(); 
 
        
 
             $.ajax({
 
                 url:"<?php echo base_url();?>FirmcategoryReport/getdata",
                 method: "POST",
 
                 data:{'firmCategory':firmCategory,
                 
                 },
               
                 // dataType:'JSON',
 
                 beforeSend: function(){
                      $('#loadershow').show();
                  },
                 success: function(res){
                  
                     setTimeout(() => {
                         $('#loadershow').hide();
 
                }, "1000");
                     
                     
  
                                          $('#Storedata').empty(); 
                                             $('#maintable').empty(); 
 
 
                                                      $('#maintable').append('<div class="table-responsive-md" id="tabls" style="border-collapse: collapse;"><table id="Storedata" class="display table   mt-3"> </table> </div>');
 
                                                      var data=JSON.parse(res);
                                                      console.log(data.length);
                     $('#example').hide(); 
 
                    $('#detialview').show();
                                                      
                           if (data!='') {
                           var dataSet6=[];
                     
                 // var html='';
             //    var a=1;
        
             //    var i;
                for (var i = 0; i < data.length; i++){
                 console.log(data[i]['Id']);
                var id=data[i]['Id'];
                 var abc =base_path+"Profile/getbyId/"+id;
                
 
 
 
 
 
 
                 dataSet6[i]= [
                
                 '<div><a class="btn btn-default myview" href="'+abc+'">View</a></div>',
                 '<div class="pd">'+data[i]['firmName']+'</div>',

                 '<div class="pd">'+data[i]['ownerName']+'</div>',
        
                 '<div class="pd">'+data[i]['mobileNo']+'</div>',
                 '<div class="pd">'+data[i]['officeAddress']+'</div>',
                 '<div class="pd">'+data[i]['services']+'</div>',
                
                 
                ];
 
      }
 
 
      $.getScript('<?=base_url() ?>Assets/js/datatables.min.js');
 
      var tableOne = $('#Storedata').DataTable({
                           data: dataSet6,
                           columns: [
                             { title: "" },
                             { title: "Firm Name" },

                             { title: "Owner Name" },
                             { title: "Mobile No" },
                             { title: "Loction" },
                             { title: "Services", visible: false},

                             
 
                            ],
                         });
 
                     }
                           else
                           {
                             $('#Storedata').empty();

                             var toastMixin = Swal.mixin({
                                toast: true,
                                icon: 'success',
                                title: 'General Title',
                                animation: false,
                                position: 'center',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                                });

                                toastMixin.fire({
                                title: 'Sorry No Data Found',
                                icon: 'error'
                                });

                                $('#detialview').hide();

 
                           }
            
 
 
                 }
             });
 
         });
     });
 </script>
 