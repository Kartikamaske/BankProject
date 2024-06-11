var a=false;
$(document).ready(function(){
$("#btn_save").click(function(){
    // alert("hi");
  if(a==false){
    
    saveperform();
   }LeaveManagement
  }); 
});


 function saveperform() 
{ 
    var leave_reason=$('#leave_reason').val();
    var leave_start_date=$('#leave_start_date').val();
    var leave_end_date=$('#leave_end_date').val();
    // var employeename=$('#employeename').val();
    // var workhours=$('#workhours').val();
   

    
    var leaveid=$('#leaveid').val();


    if(leave_start_date==""||leave_end_date==""||leave_reason=="") 
    {
      // alert("requird");
        swal({
        title:"",
        text:"Please Enter Required Fields",
        type:"error",           
    });   
  }

    else
    {
    	if(leaveid>0 )
    	{
            a=true;
            var form = $("#Form").closest("form");
            var formData = new FormData(form[0]);
    	
    		$.ajax({
        url:base_path+"LeaveManagement/updateleave",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        // data: $('#Form').serialize(),
         beforeSend: function(){
               $('#btn_save').prop('disabled', true);
               $('#btn_save').html('Loading');
          }, 
        success: function(data) {
          console.log(data);
           $('#btn_save').prop('disabled', false);
           $('#btn_save').html('Save');
             
            swal({
            title:"",
            text:"Data Updated Successfully",
            type:"success",
            showCancelButton: true, 
            showConfirmButton: false,
            timer:2000
        }); 


        setTimeout(() => {

          window.location.href = base_path+"LeaveManagement";

        }, 2000);
        
        a=false;
            // window.location.href = base_path+"LeaveManagement";
          }
      });
    	}
        else
    	{a=true;

        
      var form = $("#Form").closest("form");
      var formData = new FormData(form[0]);
    		
    		$.ajax({
        url:base_path+"LeaveManagement/insertleave",
        type: "POST",

        data: formData,
        processData: false,
        contentType: false,

        // data: $('#Form').serialize(),
         beforeSend: function(){
               $('#btn_save').prop('disabled', true);
               $('#btn_save').html('Loading');
          }, 
        success: function(data) {

            $('#btn_save').prop('disabled', false);
           $('#btn_save').html('Save');
             $("#Form").trigger("reset");

            //    for remove data after submit code
               $('#taskdescription').val('').trigger('change');
              

    
             // alert("hi");
          swal({
            title:"",
            text:"Data Submitted Successfully",
            type:"success",
            showCancelButton: false, 
            showConfirmButton: false,
             width: '1000px',
            timer:1000
        });
           
           a=false;
           setTimeout(() => {

            window.location.href = base_path+"LeaveManagement";
  
          }, 2000);

                }
      });
    	}
      }
 }
