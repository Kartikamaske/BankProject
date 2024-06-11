var a=false;
$(document).ready(function(){
$("#btn_save").click(function(){
    // alert("hi");
  if(a==false){
    
    saveperform();
   }
  }); 
});


 function saveperform() 
{ 
    var deposit_amount=$('#deposit_amount').val();
    var fkmembername=$('#fkmembername').val();
    var deposit_amount=$('#deposit_amount').val();
    var durationperiod=$('#durationperiod').val();
    var start_date=$('#start_date').val();
    var interest_rate=$('#interest_rate').val();

    var deposite_id=$('#deposite_id').val();

    if(deposit_amount==""||fkmembername==""||deposit_amount==""||durationperiod==""||start_date==""||interest_rate=="") 
    {
      // alert("requird");
      swal({
        title:"",
        text:"Please Enter Required Field (*)",
        type:"error",           
    });   

  }


    else
    {
    	if(deposite_id>0 )
    	{
            a=true;
            var form = $("#Form").closest("form");
            var formData = new FormData(form[0]);
    	
    		$.ajax({
        url:base_path+"Deposite/updatedeposite",
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
            text:"Data Updatted Successfully",
            type:"success",
            showCancelButton: false, 
            showConfirmButton: false,
             width: '1000px',
            timer:100
        });


        setTimeout(() => {

          window.location.href = base_path+"Deposite";

        }, 200);
        
        a=false;
            
          }
      });
    	}
        else
    	{a=true;

        
      var form = $("#Form").closest("form");
      var formData = new FormData(form[0]);
    		
    		$.ajax({
        url:base_path+"Deposite/insertdeposite",
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

               $('#fkmembername').val(0).trigger('change');
               $('#durationperiod').val(0).trigger('change');


               document.getElementById('start_date').valueAsDate = new Date();
               document.getElementById('currentdate').valueAsDate = new Date();
               document.getElementById('days_until_current_date').valueAsDate = new Date();
       
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
          

                }
      });
    	}
      }
 }
