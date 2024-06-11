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
    // var membercode=$('#membercode').val();
    var firstname=$('#firstname').val();
    var middlename=$('#middlename').val();
    var lastname=$('#lastname').val();
    var mobilenumber=$('#mobilenumber').val();
    var pincode=$('#pincode').val();
    var adharnumber=$('#adharnumber').val();

    var memberid=$('#memberid').val();


    if(firstname==""||middlename==""||lastname==""||mobilenumber=="") 
    {
      // alert("requird");
        swal({
        title:"",
        text:"Please Enter Required Fields (*)",
        type:"error",           
    });  

  }


  else if(mobilenumber.length != 10 || isNaN(mobilenumber)) 
  {
    
    // alert("requird");
    swal({
      title:"",
      text:"Enter 10 digit Numbers",
      type:"error",           
  }); 
       
}


else if(pincode.length != 6 || isNaN(pincode)|| pincode=="") 
  {
    
    // alert("requird");
    swal({
      title:"",
      text:"Enter 6 Digits Pincode",
      type:"error",           
  }); 
       
}


else if(adharnumber.length != 12 || isNaN(adharnumber)) 
  {
    
    // alert("requird");
    swal({
      title:"",
      text:"Enter 12 Digits AdharNo.",
      type:"error",           
  }); 
       
}


// else if(memberid == 0 && photo1 == 0) {
//   swal({
//     title:"",
//     text:"Please Upload photo",
//     type:"error",
//   });
// } 

    else
    {
    	if(memberid>0 )
    	{
            a=true;
            var form = $("#Form").closest("form");
            var formData = new FormData(form[0]);
    	
    		$.ajax({
        url:base_path+"MemberRegistration/updatemember",
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
           text:"Data Submitted Successfully",
           showCancelButton: false, 
           showConfirmButton: false,
           type:"success",
           timer:100
        }); 


         setTimeout(() => {

          window.location.href = base_path+"MemberRegistration";

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
        url:base_path+"MemberRegistration/insertmember",
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
               $('#fkstate').val('').trigger('change');
               $('#fkcity').val('').trigger('change');
               $('#fktaluka').val('').trigger('change');
              //  for image reset
               document.getElementById("profile-img-tag1").src = base_path+"Assets/images/user.png";
               document.getElementById('dateofbirth').valueAsDate = new Date();

             // alert("hi");
       
             swal({
              title:"",
             text:"Data Submitted Successfully",
             showCancelButton: false, 
             showConfirmButton: false,
             type:"success",
             timer:1000
          });
        
        
           
           a=false;
          //  setTimeout(() => {

          //   window.location.href = base_path+"MemberRegistration/create";
  
          // }, 1000);

                }
      });
    	}
      }
 }
