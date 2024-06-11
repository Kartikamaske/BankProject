var a=false;
$(document).ready(function(){
$("#btn_model").click(function(){
    // alert("hi");
  if(a==false){
    
    saveperform1();
   }
  }); 
});


 function saveperform1() 
{ 
   
  var firstname=$('#firstname').val();
  var middlename=$('#middlename').val();
  var lastname=$('#lastname').val();
  var mobileNo=$('#mobileNo').val();
  var pincode=$('#pincode').val();
  var adharNo=$('#adharNo').val();



    if(firstname==""||middlename==""||lastname==""||mobileNo==""||adharNo=="") 
    {
      // alert("requird");
      swal({
        title:"",
        text:"Please Enter Required Field",
        type:"error",           
    });  

  }


  else if(mobileNo.length != 10 || isNaN(mobileNo)) 
  {
    
    // alert("requird");
   
  swal({
    title:"",
    text:"Please Enter 10 digit Numbers",
    type:"error",           
}); 
}





else if(adharNo.length != 12 || isNaN(adharNo)) 
  {
    
 
    swal({
      title:"",
      text:"Please Enter 12 digit Aadhar Numbers",
      type:"error",           
  });  
       
}


   
    	
        else
    	{
        a=true;

        
    		$.ajax({
        url:base_path+"Deposite/insertmodeldata",
        type: "POST",
        data: $('#Form1').serialize(),
         beforeSend: function(){
               $('#btn_model').prop('disabled', true);
               $('#btn_model').html('Loading');
          }, 
        success: function(data) {

            $('#btn_model').prop('disabled', false);
           $('#btn_model').html('Save');
           $('#myModal').modal('hide');
             $("#Form1").trigger("reset");

             dropdownfetch();
       
            swal({
              title:"",
              text:"Data Submitted Successfully",
              type:"success",
              showCancelButton: false, 
              showConfirmButton: false,
               width: '1000px',
              timer:300
          });
  
         setTimeout(() => {

          $("#modelclose").click();


        }, 700);
        
           a=false;
        

                }
      });
    	}
      }



      function dropdownfetch(){
        $.ajax({
            url:base_path+"Deposite/get_dropdown_data",
            method: "POST",
            dataType: 'json',
            success:function(data){
        
              console.log(data);


              const lastElement = data.slice(-1)[0];

              const lastMemberId = lastElement.memberid;
                console.log("member list data",lastMemberId);


              $('#fkmembername').empty();
               $('select[name="fkmembername"]').empty();
               $('#fkmembername').append('<option value="0">Select Member</option>');
                $.each(data,function(index,value){
                     
                    $('#fkmembername').append('<option value="'+value['memberid']+'">'+value['memberid']+'&nbsp;'+value['firstname']+'&nbsp;'+value['middlename']+'&nbsp;'+value['lastname']+'&nbsp;'+value['mobilenumber']+'</option>');
                   
                });      
                
              $('#fkmembername').val(lastMemberId).trigger('change');
              
         
          }
        });
       
    }
 
