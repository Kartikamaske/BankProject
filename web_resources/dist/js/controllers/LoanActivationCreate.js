a=false;
var chkRemoveItem2=0;

   var AWorkNo=0;  
$(document).ready(function() {

  // $('#instasearch').click(function(){
  //   var installmentno= $('#installmentno').val();
  //   if (installmentno>0) {
   
  //     installmentnocal(installmentno);
  //   }
    
  // });

  $('#installmentno').on('input',function(){
    var installmentno= $('#installmentno').val();
    if (installmentno>0) {
   
      installmentnocal(installmentno);
    }
    
  });


$('#btn_AddTo').click(function(){
  // alert('h')
            if(valChkk())
            {
             AWorkNo++;

           $iii=1;
            var refmobile=$('#refmobile').val();
            var relationId=$('#relationId').val();
            var licenceName=$('#licencetypeId option:selected').text();
              var relationName=$('#relationId option:selected').text();
            var licencetypeId=$('#licencetypeId').val();

            var referanceName=$('#referanceName option:selected').text();
             var referanceId=$('#referanceName').val();
             // alert(referanceId);
            var objTo = document.getElementById('ReferanceTable');
                var divtest = document.createElement("tr");
                divtest.setAttribute("class", "removeclass2" + AWorkNo);
                divtest.innerHTML='<td class="text-center"><i class="fas fa-trash" style="cursor:pointer;    font-size: 20px;color: #cf2727;margin-top: 20px;" id="btnItemRowDelete'+AWorkNo+'" onclick="remove_ActualWork_details('+AWorkNo+');"></i> </td> <td style="display:none;"><input type="hidden" readonly  id="relationId'+AWorkNo+'" name="relationId[]" class=" relationId form-control" value="'+relationId+'"></td><td style="display:none;"><input type="hidden" readonly  id="licencetypeId'+AWorkNo+'" name="licencetypeId[]" class="licencetypeId form-control" value="'+licencetypeId+'"></td><td style="display:none;"><input type="hidden" readonly  id="referanceId'+AWorkNo+'" name="referanceId[]" class="referanceId form-control" value="'+referanceId+'"></td><td><input type="hidden" readonly  id="referanceName'+AWorkNo+'" name="referanceName[]" class="referanceName form-control tds-width total" value="'+referanceName+'">'+referanceName+'</td><td><input type="hidden" readonly  id="refmobile'+AWorkNo+'" name="refmobile[]" class="refmobile form-control tds-width total" value="'+refmobile+'">'+refmobile+'</td><td>'+relationName+'</td><td>'+licenceName+'</td> <td><input type="file" readonly id="licencephoto'+ $iii+'" name="licencephoto[]" class="licencephoto form-control form-control-sm tds-width" onchange="readURL1(this,'+AWorkNo+');" value=""><input type="hidden" readonly id="hiden_licencephoto'+AWorkNo+'" name="hiden_licencephoto[]" class="hiden_licencephoto form-control form-control-sm tds-width" value=""><img src="" id="liceneprof'+AWorkNo+'" style="height: 120px;width:100px;margin:5px auto 0;display:block;" name="liceneprof[]" width="100px" /></td>';

                objTo.appendChild(divtest);
                  $('#fkbhishiActivationId').removeAttr('disabled','disabled');
                    // confirpaidbhishi(AWorkNo);       
                // CalculateAllAmount();
                clearDetails2();
                $iii++;
                
               $('#btn_savee').removeAttr('disabled','disabled');
           }
        });




$("#btn_Member").click(function(){

var Member_id=$('#Member_id').val();

// var memberCode=$('#memberId').val();
var firstName=$('#firstName').val();
var middelName=$('#middelName').val();
var lastName=$('#lastName').val();
var fullName=$('#fullName').val();
var address=$('#address').val();
var pincode=$('#pincode').val();
var mobileNo=$('#mobileNo').val();
var adharNo=$('#adharNo').val();
var fkmemberTypeId=$('#fkmemberTypeId').val();
var familyChief=$('#familyChief').val();
   
    
    if( fullName=="" || mobileNo=="" || fkmemberTypeId==0)
    {
      
        swal({
            title:"",
            text:"Please Enter Required Fieldsss",
            type:"error",           
        });       
    }

    else
    {
        // alert('InsertSR');
        $.ajax({
              url:base_path+"LoanActivation/performMemberpopup",
              type: "POST",
              data: $('#Form').serialize(),      
              success: function(data) { 
             
               },
               complete:function()
               {
                    $('#memberCode').val('').trigger('change');
                    $('#firstName').val('').trigger('change');
                    $('#middelName').val('').trigger('change');
                    $('#lastName').val('').trigger('change');
                    $('#fullName').val('').trigger('change');
                    $('#address').val('').trigger('change');
                    $('#pincode').val('').trigger('change');
                    $('#mobileNo').val('').trigger('change');
                    $('#adharNo').val('').trigger('change');
                    $('#fkmemberTypeId').val('').trigger('change');
                    $('#familyChief').val('').trigger('change');
                
              swal({
                    title:"",
                    text:"Data Submitted Successfully",
                    type:"success",
                    showCancelButton: false, 
                    showConfirmButton: false,
                    width: '1000px',
                    timer:2000
                }); 

                getMemberlist();
               }
              });      
       
      }

  });




$('#referanceName').change(function(){

var referanceId=$('#referanceName').val();
if (referanceId>0) {
  $.ajax({
                        url:base_path+'LoanActivation/referemob',
                        method: 'post',
                        data: {
                          'referanceId' : referanceId
                          
                        },
                           beforeSend: function(){
                  $("#modalbox").show();
                },
                        success: function(data){
                          // console.log(data);
                          var abc=JSON.parse(data);
                          if (abc.length>0) {
                            $("#refmobile").val(abc[0]['mobileNo']);
                          }

                            }
                        });
}

});
});
  function clearDetails2()
      {
        $('#licencedetails').find('input:text').val('');

        $('select', '#licencedetails').each(function() {
          $(this).val(0);
          // $('#selectpicker').selectpicker('refresh');
        });
          $('#refmobile').val('').trigger('change');
            $('#referanceName').val('').trigger('change');
            $('#relationId').val('').trigger('change');
        $('#licencetypeId').val('').trigger('change');


      } 

function installmentnocal(installmentnos){

var fkinstallmentTypeId = $('#fkinstallmentTypeId').val();
var instatypedays = $('#value').val();
if (instatypedays>0) {
  $('#ChargesTable').empty();
 var tabledata='';
   var startDate = $('#startDate').val();
date1 = new Date();
no=1;
var installmentcount=0;
for (var i = 0; i < installmentnos; i++) {
  installmentcount++;
  if (i==0) {
    var date = new Date(startDate);

    var newdate = new Date(date);

tabledata+='<tr>';
            tabledata+='<td>'+ no +'</td>';
             tabledata+=' <td>'+ convertDate(newdate); +'</td>';
 tabledata+=' <td style="display:none;"><input type="text" class="form-control form-control-sm tds-width txtCal" id="Sdate'+i+'" value="'+newdate.toInputFormat1()+'" name="Sdate[]" /></td>';

var res = newdate.setTime(newdate.getTime() + (instatypedays * 24 * 60 * 60 * 1000));
 var nd =  newdate.setDate(newdate.getDate() - 1); // minus the date

    date1 = new Date(nd);
    tabledata+=' <td>'+ convertDate(date1); +'</td>';
 tabledata+=' <td style="display:none;"><input type="text" class="form-control form-control-sm tds-width txtCal" id="Edate'+i+'" value="'+date1.toInputFormat1()+'" name="Edate[]" /></td>';
            
// alert(date1)/
    if (installmentcount==parseInt(installmentnos)) {
      
       var dd = date1.getDate(); //yields day
   var MM = date1.getMonth()+1;
   var yyyy = date1.getFullYear();
   if (MM>9) {
MM=MM;
   }
   else{
    MM='0'+MM;
   }
   if (dd>9) {
dd=dd;
   }
   else{
    dd='0'+dd;
   }
var bb=yyyy + "-" +MM + "-" +dd;
      $('#installmentenddate').val(bb);

    }
    
  }else{

 var nd =  date1.setDate(date1.getDate() + 1);
   var date = new Date(nd);
    var newdate = new Date(date);



if (fkinstallmentTypeId==3) {

tabledata+='<tr>';
            tabledata+='<td>'+ no +'</td>';
             tabledata+=' <td>'+ convertDate(newdate); +'</td>';

              tabledata+=' <td style="display:none;"><input type="text" class="form-control form-control-sm tds-width txtCal" id="Sdate'+i+'" value="'+newdate.toInputFormat1()+'" name="Sdate[]" /></td>';

var res = newdate.setTime(newdate.getTime() + (instatypedays * 24 * 60 * 60 * 1000));
   
    
    var nd =  newdate.setDate(newdate.getDate() - 1);
    date1 = new Date(nd);
     tabledata+=' <td>'+ convertDate(date1); +'</td>';
      tabledata+=' <td style="display:none;"><input type="text" class="form-control form-control-sm tds-width txtCal" id="Edate'+i+'" value="'+date1.toInputFormat1()+'" name="Edate[]" /></td>';

     // alert(date1)
     if (installmentcount==parseInt(installmentnos)) {
        var dd = date1.getDate(); //yields day
   var MM = date1.getMonth()+1;
   var yyyy = date1.getFullYear();
   if (MM>9) {
MM=MM;
   }
   else{
    MM='0'+MM;
   }
   if (dd>9) {
dd=dd;
   }
   else{
    dd='0'+dd;
   }
var bb=yyyy + "-" +MM + "-" +dd;
      $('#installmentenddate').val(bb);
    }

}else{
  tabledata+='<tr>';
            tabledata+='<td>'+ no +'</td>';
             tabledata+=' <td>'+ convertDate(newdate); +'</td>';
        tabledata+=' <td style="display:none;"><input type="text" class="form-control form-control-sm tds-width txtCal" id="Sdate'+i+'" value="'+newdate.toInputFormat1()+'" name="Sdate[]" /></td>';

var res = newdate.setTime(newdate.getTime() + (instatypedays * 24 * 60 * 60 * 1000));
   
    date1 = new Date(res);
     tabledata+=' <td >'+ convertDate(date1); +'</td>';
 tabledata+=' <td style="display:none;"><input type="text" class="form-control form-control-sm tds-width txtCal" id="Edate'+i+'" value="'+date1.toInputFormat1()+'" name="Edate[]" /></td>';

     if (installmentcount==parseInt(installmentnos)) {
       var dd = date1.getDate(); //yields day
   var MM = date1.getMonth()+1;
   var yyyy = date1.getFullYear();
   if (MM>9) {
MM=MM;
   }
   else{
    MM='0'+MM;
   }
   if (dd>9) {
dd=dd;
   }
   else{
    dd='0'+dd;
   }
var bb=yyyy + "-" +MM + "-" +dd;
      $('#installmentenddate').val(bb);
      // console.log(bb);//
    }
}

  }
  no++;

}

 $('#ChargesTable').append(tabledata);
    


}

        
            
  }
      function readURL1(input,i) {
  if (input.files && input.files[0]) {
 var reader = new FileReader();
reader.onload = function (e) {
$('#liceneprof'+i).attr('src', e.target.result);

}
 reader.readAsDataURL(input.files[0]);
  }
}
function remove_ActualWork_details(rid){
   $('.removeclass2' + rid).remove();
                chkRemoveItem2=1;
        // calculateAllAmount();
}

function valChkk()
  {
    var refmobile = $('#refmobile').val();
    var valChkAWork=false;
    
    
     if($('#referanceName').val()=="" || $('#licencetypeId').val()=="")
    {
      swal({
        title:"",
        text:"Please Enter referance Name And Document",
        type:"error",           
    }); 

     
      
    }
  else if(refmobile==""){
    swal({
      title:"",
      text:"Please Enter Mobile No",
      type:"error",           
  });
  }
  else if(refmobile.length != 10 || isNaN(refmobile)) 
  {
    
   
   
  swal({
    title:"",
    text:"Please Enter 10 digit Numbers",
    type:"error",           
}); 
}
    else
    {
      valChkAWork=true;
    }

    return valChkAWork;

  }
 function getMemberlist()
  {

    $.ajax({
                        url:base_path+'LoanActivation/getMemberlist',
                        method: 'post',
                        // dataType: 'json',
                        success: function(data){

                            // console.log(data);
                            
                          var a=JSON.parse(data);
                                // console.log(a[0]['fullName']);

                            $('#Allsearch').val(a[0]['memberid'] +' || '+ a[0]['fullname'] +' || '+ a[0]['mobileNo']);
                            // $('#memberName').val();
                            $('#fkmemberId').val(a[0]['memberid']);
                                                      
                        }
                    });
                  

  }


$(document).ready(function() {
$("#fkinstallmentTypeId").change(function() {


   
var fkinstallmentTypeId = $(this).val();
// alert(fkdurationId);
$('#penultytype').empty();
$('#interesttypeper').empty();
$('#interesttypeamt').empty();
$('#hapthamt').empty();
if (fkinstallmentTypeId>0) {
var installmentType = $('#fkinstallmentTypeId option:selected').text();
// alert(installmentType);
$('#penultytype').append('( '+installmentType+' )');
if(installmentType=='Daily'){
  $('#interesttypeper').append('( Annual ) ');
}
else{
  $('#interesttypeper').append('( '+installmentType+' )');
}


$('#interesttypeamt').append('( '+installmentType+' )');
$('#hapthamt').append('( '+installmentType+' )');
  $.ajax({
                        url:base_path+'LoanActivation/InstallmentValue',
                        method: 'post',
                        data: {'fkinstallmentTypeId' : fkinstallmentTypeId},
                        success: function(data){

                          console.log(data);
                            var a=JSON.parse(data);
                            if(a.length!=0){
                            $('#value').val(a[0]['value']);

                            // console.log('haptta sankhya' ,a[0]['value'] )
                            adddays1();
                            
                            }
                            },
                             complete: function(data){
                              abc();
                              xyz();
                             }
                        });
}

                    
                    });
 





 
  });


  function abc(){
    if ($('#Include').is(':checked')) {
    var installmentno4=$('#installmentno').val();
    // alert(installmentno4);

    var totalInstallmentAmt4=$('#totalInstallmentAmt').val();



    var  hapttasankhya4 = parseFloat(totalInstallmentAmt4)/parseFloat(installmentno4);
    $('#haptars').val(parseFloat(hapttasankhya4.toFixed(2)));

  }

 




  if ($('#exclude').is(':checked')) {
    var installmentno5=$('#installmentno').val();
    var installmentAmt5=$('#installmentAmt').val();
  
    
  
      var  hapttasankhya5 = parseFloat(installmentAmt5)/parseFloat(installmentno5);
      $('#haptars').val(parseFloat(hapttasankhya5.toFixed(2)));
 

  }
}

function  xyz(){
  var getloanTypeValue=$('#getloanTypeValue').val();
  var interetotalstamt=$('#interetotalstamt').val();
  var installmentAmt11=$('#installmentAmt11').val();

  var e = document.getElementById("fkloantypeId");
  var text = e.options[e.selectedIndex].text;


$('#showloantypeval').text('('+text+')');

var  interestamttotal = parseFloat(getloanTypeValue)*parseFloat(interetotalstamt);
    $('#interestamttotal').val(parseFloat(interestamttotal.toFixed(2)));

// /***** Addition of muddal and next vyaj*** */
    var  totalInstallmentAmtttt = parseFloat(interestamttotal)+parseFloat(installmentAmt11);
    $('#totalInstallmentAmt').val(parseFloat(totalInstallmentAmtttt.toFixed(2)));
}


function convertDate(inputFormat) {
       function pad(s) { return (s < 10) ? '0' + s : s; }
          var d = new Date(inputFormat)
          return [pad(d.getDate()), pad(d.getMonth()+1), d.getFullYear()].join('-')

  }
// (function($, window, document, undefined){

  
// })(jQuery, this, document);
   
     Date.prototype.toInputFormat1 = function() {
      // alert('formatfn');

      var yyyy = this.getFullYear().toString();
       var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
       var dd  = this.getDate().toString();
       return yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]); 
    };
 function diff_months(date2, date1) 
 {

 var Nomonths;
    Nomonths= (date2.getFullYear() - date1.getFullYear()) * 12;
    Nomonths-= date1.getMonth() + 1;
    Nomonths+= date2.getMonth() +1; // we should add + 1 to get correct month number
    
    return Nomonths <= 0 ? 0 : Nomonths;
  
 }
function adddays1(){
// alert('hhh')
var fkinstallmentTypeId = $('#fkinstallmentTypeId').val();

var date = new Date($("#startDate").val()),days = parseInt($("#value").val(), 10);
// var endDate=$('#endDate').val();
var startDate=$('#startDate').val();
  
  var DAYS = days-1;

// calculate Weeks between 2 dates
var date1 = new Date($("#startDate").val());
var date2 = new Date($('#endDate').val());
// console.log();
  // alert(date1);
  // alert(date2);
// // To calculate the time difference of two dates
var Difference_In_Time = date2.getTime() - date1.getTime();
  
// // To calculate the no. of days between two dates
var TotalDays = Difference_In_Time / (1000 * 3600 * 24);
  
  // $('#days').val(TotalDays);


// calculate month between 2 dates
 var Nomonths=diff_months(date2, date1);
 daycheck= date1.getDate();
 // alert(daycheck);
 if (parseFloat(daycheck)==1) {
  Nomonths=parseFloat(Nomonths)+1;
 }
    
 var ONE_WEEK = 1000 * 60 * 60 * 24 * 7;
       
        var date1_ms = date1.getTime();
        var date2_ms = date2.getTime();
       
        var difference_ms = Math.abs(date1_ms - date2_ms);

        var NoOfWeeks= Math.floor(difference_ms / ONE_WEEK);

      

        if (fkinstallmentTypeId==1) {
           
            document.getElementById('InstallmentDuration').innerHTML = Nomonths;
             $('#InstDuration').val(Nomonths);
             $('#installmentno').val(Nomonths);
             calculateAmout();
        }
        else if (fkinstallmentTypeId==2) {

          document.getElementById('InstallmentDuration').innerHTML = NoOfWeeks;
          $('#InstDuration').val(NoOfWeeks);
           $('#installmentno').val(NoOfWeeks);
          calculateAmout();
        }
        else
        {
          TotalDays=parseInt(TotalDays)+1;
          document.getElementById('InstallmentDuration').innerHTML = TotalDays;
          $('#InstDuration').val(TotalDays);
          $('#installmentno').val(TotalDays);
          calculateAmout();
        }



        var tabledata="";
        var j=1;
        // var abc = endDate.length+1;
        // alert(abc);
        var newDate=0;
        var NextDate1=startDate;

        if (fkinstallmentTypeId==1) {

            

          $('#ChargesTable').empty();
          
          var weekss=0;
          // var durationV=$('#durationValue').val();
          // var installV=$('#value').val();
          // var countmonth=(durationV/installV);
          // // alert(countmonth);
          var count=Nomonths;
          var flags=0
          // if (Nomonths>0) {}
            for (var i = 0; i < parseInt(Nomonths); i++) {
             ++weekss;

          if(!isNaN(date.getTime())){
            var days=0;
              if (newDate==0) {
                  date.setDate(date.getDate() + DAYS);
                  var NextDate = date.toInputFormat1();
                  var d11= new Date(NextDate);
                  var t11time=d11.getTime();
                  // var Diffrance = Math.abs(t11time - date2_ms);
                   var time_difference = date2_ms - t11time;

         // var days = time_difference / (1000 * 60 * 60 * 24);
         // days=days-1;
         //          console.log(parseInt(days));
         if(parseInt(weekss)===parseInt(Nomonths)){
                     // alert(weekss);
                     flags=1;
                     var d11= new Date(NextDate);
                  var t11time=d11.getTime();
                   var time_difference = date2_ms - t11time;

                   var days = time_difference / (1000 * 60 * 60 * 24);
                   days=days;
                     date.setDate(date.getDate() + days);
                  var NextDate = date.toInputFormat1();
                  }
              }
              else
              {
                 date.setDate(date.getDate() + 1);
                  var NextDate1 = date.toInputFormat1();

                  date.setDate(date.getDate() + DAYS);
                  var NextDate = date.toInputFormat1();
                  
                  // console.log(parseInt(days));
                  if(parseInt(weekss)===parseInt(Nomonths)){
                     // alert(weekss);
                     flags=1;
                     var d11= new Date(NextDate);
                  var t11time=d11.getTime();
                   var time_difference = date2_ms - t11time;

                   var days = time_difference / (1000 * 60 * 60 * 24);
                   days=days;
                     date.setDate(date.getDate() + days);
                  var NextDate = date.toInputFormat1();
                  }
                  // alert(NextDate);
              }
                  
                  
                } 
                newDate++;  

                // console.log(NextDate1);
                // console.log(NextDate);

                if (flags==1) {
                  // alert('hh')
          tabledata+='<tr>';
            tabledata+='<td>'+ j++ +'</td>';
            tabledata+=' <td>'+ convertDate(NextDate1); +'</td>';
            tabledata+='<td>'+ convertDate(NextDate); +'<div></div><span>'+days+'</span></td>';
            tabledata+='</tr>';

              tabledata+='<tr style="display:none;">';
            tabledata+=' <td><input type="text" class="form-control form-control-sm tds-width txtCal" id="Sdate'+j+'" value="'+NextDate1+'" name="Sdate[]" /></td>';
            tabledata+='<td><input type="text" class="form-control form-control-sm tds-width txtCal" id="Edate'+j+'" value="'+NextDate+'" name="Edate[]" /></td>';
            tabledata+='</tr>';
                }else{
                  tabledata+='<tr>';
            tabledata+='<td>'+ j++ +'</td>';
            tabledata+=' <td>'+ convertDate(NextDate1); +'</td>';
            tabledata+='<td>'+ convertDate(NextDate); +'</td>';
            tabledata+='</tr>';

              tabledata+='<tr style="display:none;">';
            tabledata+=' <td><input type="text" class="form-control form-control-sm tds-width txtCal" id="Sdate'+j+'" value="'+NextDate1+'" name="Sdate[]" /></td>';
            tabledata+='<td><input type="text" class="form-control form-control-sm tds-width txtCal" id="Edate'+j+'" value="'+NextDate+'" name="Edate[]" /></td>';
            tabledata+='</tr>';

                }
            
             
        }
        $('#ChargesTable').append(tabledata);


        }
        else if (fkinstallmentTypeId==2) {
          // alert('weekly');

          $('#ChargesTable').empty();
             var weekss=0;
           for (var i = 0; i < NoOfWeeks; i++) {
            ++weekss;
          if(!isNaN(date.getTime())){
            var days=0;
              if (newDate==0) {
                  // date.setDate(date.getDate() + DAYS);
                  // var NextDate = date.toInputFormat1();

                  date.setDate(date.getDate() + DAYS);
                  var NextDate = date.toInputFormat1();
                  var d11= new Date(NextDate);
                  var t11time=d11.getTime();
                  // var Diffrance = Math.abs(t11time - date2_ms);
                   var time_difference = date2_ms - t11time;

              }
              else
              {
                 date.setDate(date.getDate() + 1);
                  var NextDate1 = date.toInputFormat1();

                  date.setDate(date.getDate() + DAYS);
                  var NextDate = date.toInputFormat1();

                  if(parseInt(weekss)===parseInt(NoOfWeeks)){
                     var d11= new Date(NextDate);
                  var t11time=d11.getTime();
                   var time_difference = date2_ms - t11time;

                   var days = time_difference / (1000 * 60 * 60 * 24);
                   days=days;
                     date.setDate(date.getDate() + days);
                  var NextDate = date.toInputFormat1();
                  }

              }
                  
                  
                } 
                newDate++;  

                // console.log(NextDate1);
                // console.log(NextDate);


            tabledata+='<tr>';
            tabledata+='<td>'+ j++ +'</td>';
            tabledata+=' <td>'+ convertDate(NextDate1); +'<input type="hidden" id="Sdate'+j+'" value="'+NextDate1+'" name="Sdate[]" /></td>';
            tabledata+='<td>'+ convertDate(NextDate); +'<input type="hidden" id="Edate'+j+'" value="'+NextDate+'" name="Edate[]" /></td>';
            tabledata+='</tr>';

            tabledata+='<tr style="display:none;">';
            tabledata+=' <td><input type="text" class="form-control form-control-sm tds-width txtCal" id="Sdate'+j+'" value="'+NextDate1+'" name="Sdate[]" /></td>';
            tabledata+='<td><input type="text" class="form-control form-control-sm tds-width txtCal" id="Edate'+j+'" value="'+NextDate+'" name="Edate[]" /></td>';
            tabledata+='</tr>';

             
        }
        $('#ChargesTable').append(tabledata);

        }
        else if (fkinstallmentTypeId==3) {

          // alert(TotalDays);

            $('#ChargesTable').empty();
            
            for (var i = 0; i < TotalDays; i++) {
          if(!isNaN(date.getTime())){

              if (newDate==0) {
                  date.setDate(date.getDate() + DAYS);
                  var NextDate = date.toInputFormat1();

              }
              else
              {
                 date.setDate(date.getDate() + 1);
                  var NextDate1 = date.toInputFormat1();

                  date.setDate(date.getDate() + DAYS);
                  var NextDate = date.toInputFormat1();
              }
                  
                  
                } 
                newDate++;  

                // console.log(NextDate1);
                // console.log(NextDate);


            tabledata+='<tr>';
            tabledata+='<td>'+ j++ +'</td>';
            tabledata+=' <td>'+ convertDate(NextDate1); +'<input type="hidden"  id="Sdate'+j+'" value="'+NextDate1+'" name="Sdate[]" /></td>';
            tabledata+='<td>'+ convertDate(NextDate); +'<input type="hidden" id="Edate'+j+'" value="'+NextDate+'" name="Edate[]" /></td>';
            tabledata+='</tr>';

            tabledata+='<tr style="display:none;">';
            tabledata+=' <td><input type="text" class="form-control form-control-sm tds-width txtCal" id="Sdate'+j+'" value="'+NextDate1+'" name="Sdate[]" /></td>';
            tabledata+='<td><input type="text" class="form-control form-control-sm tds-width txtCal" id="Edate'+j+'" value="'+NextDate+'" name="Edate[]" /></td>';
          
            tabledata+='</tr>';

             
        }
        $('#ChargesTable').append(tabledata);


        }

        
         
  }


$(document).ready(function(){

  $('#fkloantypeId').change(function(){
     var fkloantypeId = $(this).val(); 
    
   

      $('#DurationName').empty();
        $('#ChargesTable').empty();
        $('#fkinstallmentTypeId').val('0').trigger('change');
        $('#InstallmentDuration').empty();
        // $('#installmentAmt').val('0');
        $('#penaltyAmt').val('0');
        // $('#totalInstallmentAmt').val('0');
          $('#value').val('0');
            $('#InstDuration').val('0');
     

       


      if (fkloantypeId>0) {
       getduration();
       calculateEndDate();
                   
      }
       

    });

  $('#installmentAmt').on('input',function(){
var loantamount=$('#installmentAmt').val();






if (loantamount>0) {
  calculattotalamot();
  calinterestamt();
}else{
  // $('#interestper').val(0);
  // $('#interestamt').val(0);
  // $('#interetotalstamt').val(0);
  // $('#totalInstallmentAmt').val(0);
  // $('#haptars').val(0);
  
}

     });

  $('#interestper').on('input',function(){
    // alert('gg')
    var loantamount=$('#installmentAmt').val();
     var interestper=$('#interestper').val();
    if (loantamount>0 && interestper>0) {
      calculateinterest();
      calculathapta();
    }else{
      // $('#interestamt').val(0);
  // $('#interetotalstamt').val(0);
 calinteresttotalamt();
    }
  });
$('#interestamt').on('input',function(){
   
    var loantamount=$('#installmentAmt').val();
     var interestamt=$('#interestamt').val();
    //  $('#interetotalstamt').val(0);
    //  $('#interestper').val(0);
     
    if (loantamount>0 && interestamt>0) {
      calinterestamt();
      calculathapta();
    }
  });
$('#interetotalstamt').on('input',function(){
   
    var interetotalstamt=$('#interetotalstamt').val();
     var installmentAmt=$('#installmentAmt').val();
    //  $('#interestamt').val(0);
    //  $('#interestper').val(0);
     
    if (installmentAmt>0 && interetotalstamt>0) {
      calinteresttotalamt();
      calculathapta();
    }
  });

// $('input[name="excludeorinclude"]').on('input',function(){
//    var excludeorinclude=$(this).val();
//    calculathapta();
//   });
});


function calculateinterest(){
 var loantamount=$('#installmentAmt').val();
     var interestper=$('#interestper').val();
     var installmentno=$('#installmentno').val();
     var getloanTypeValue=$('#getloanTypeValue').val();

     var interestamt=0;
      var totinterestamt=0;
     if (installmentno>0) {
      interestamt=(parseFloat(loantamount)/100)*(parseFloat(interestper));
      // totinterestamt=parseFloat(interestamt)*parseFloat(installmentno)
      // totinterestamt=parseFloat(interestamt)/parseFloat(getloanTypeValue);
      totinterestamt=parseFloat(interestamt)/365;

     }
     $('#interestamt').val(parseFloat(interestamt.toFixed(2)));
    

      $('#interetotalstamt').val(parseFloat(totinterestamt));
      
      var tttt = $('#interetotalstamt').val();
      var ggg =  $('#getloanTypeValue').val();
      var lll =  $('#getloanTypeIdd').val();
      var installamt =  $('#installmentAmt').val();
      var mval =  $('#monthval').val();



      // console.log("lll",lll);/
  //  if(lll==1)
  //  {
  //   var rrrr = parseFloat(tttt) * parseFloat(ggg);
  //   console.log(rrrr);

  //   $('#monthval').val(parseFloat(rrrr.toFixed(2)));
  //  }

   var rrrr = parseFloat(tttt) * parseFloat(ggg);
    console.log(rrrr);

    $('#monthval').val(parseFloat(rrrr.toFixed(2)));


    var final = parseFloat(installamt) + parseFloat(mval);
    // console.log('final',parseFloat(final.toFixed(2)));
    $('#final').val(parseFloat(final.toFixed(2)));


      calculattotalamot();
      calculathapta();
}

function calinterestamt(){

 var loantamount=$('#installmentAmt').val();
     var interestamt=$('#interestamt').val();
     var installmentno=$('#installmentno').val();
     var getloanTypeValue=$('#getloanTypeValue').val();
     var totinterestamt=0;
      var interper=0;
      

     if (installmentno>0) {
// alert(interestamt)
      // totinterestamt=(parseFloat(interestamt))*(parseFloat(installmentno));
      // totinterestamt=parseFloat(interestamt)/parseFloat(getloanTypeValue);
      totinterestamt=parseFloat(interestamt)/365;

      interper=((parseFloat(totinterestamt)*100)/parseFloat(loantamount))/(parseFloat(installmentno));

     }

     $('#interetotalstamt').val(parseFloat(totinterestamt));
     $('#interestper').val(parseFloat(interper.toFixed(2)));

     var tttt = $('#interetotalstamt').val();
     var ggg =  $('#getloanTypeValue').val();
     var lll =  $('#getloanTypeIdd').val();
     var installamt =  $('#installmentAmt').val();
     var mval =  $('#monthval').val();


     var rrrr = parseFloat(tttt) * parseFloat(ggg);
     console.log(rrrr);
 
     $('#monthval').val(parseFloat(rrrr.toFixed(2)));
 
 
     var final = parseFloat(installamt) + parseFloat(mval);
     $('#final').val(parseFloat(final.toFixed(2)));




     calculattotalamot();
     calculathapta();
}


function calinteresttotalamt(){
   var loantamount=$('#installmentAmt').val();
     var interetotalstamt=$('#interetotalstamt').val();
     var installmentno=$('#installmentno').val();
     var interestamt=0;
      var interper=0;
      

     if (installmentno>0) {

      interestamt=(parseFloat(interetotalstamt))/(parseFloat(installmentno));

      interper=((parseFloat(interetotalstamt)*parseFloat(installmentno))/parseFloat(loantamount));

     }

     $('#interestamt').val(parseFloat(interestamt.toFixed(2)));
     $('#interestper').val(parseFloat(interper.toFixed(2)));


     calculattotalamot();
     calculathapta();
}
function calculattotalamot(){
  var loantamount=$('#installmentAmt').val();
     var interetotalstamt=$('#interetotalstamt').val();
     var interestamt=$('#interestamt').val();

     var totalamount=0;
     if (loantamount >0) {
      if (interetotalstamt>0) {
        interetotalstamt=interetotalstamt;
      }else{
        interetotalstamt=0;
      }
    //  totalamount=(parseFloat(loantamount)+parseFloat(interetotalstamt));
     totalamount=(parseFloat(loantamount)+parseFloat(interestamt));


     }
     $('#totalInstallmentAmtF').val(parseFloat(totalamount.toFixed(2)));
    
      calculathapta();
}






$(document).ready(function() {
  $('#exclude').change(function() {
    if ($(this).is(':checked')) {
      var installmentno1=$('#installmentno').val();
      var installmentAmt1=$('#installmentAmt').val();
    
      var  hapttasankhya1 = parseFloat(installmentAmt1)/parseFloat(installmentno1);
  
      $('#haptars').val(parseFloat(hapttasankhya1.toFixed(2)));



     
    }
  });


// ************* include 
$('#Include').change(function() {
  if ($(this).is(':checked')) {
    var installmentno1=$('#installmentno').val();
    var totalInstallmentAmt1=$('#totalInstallmentAmt').val();
  
    var  hapttasankhya2 = parseFloat(totalInstallmentAmt1)/parseFloat(installmentno1);
    $('#haptars').val(parseFloat(hapttasankhya2.toFixed(2)));



   
  }
});





});





function calculathapta(){
  if ($('#exclude').is(':checked')) {
    
  var installmentno1=$('#installmentno').val();
  var installmentAmt1=$('#installmentAmt').val();
  var installmentAmt111=$('#installmentAmt11').val();

  $('#installmentAmt').on('input',function(){

    var  hapttasankhya2 = parseFloat(installmentAmt1)/parseFloat(installmentno1);
    $('#haptars').val(parseFloat(hapttasankhya2.toFixed(2)));

    var e = document.getElementById("fkloantypeId");
    var text = e.options[e.selectedIndex].text;
  
  
   $('#showloantypeval').text('('+text+')');
  
    var  interestamttotal = parseFloat(getloanTypeValue)*parseFloat(interetotalstamt);
      $('#interestamttotal').val(parseFloat(interestamttotal.toFixed(2)));


    // /***** Addition of muddal and next vyaj*** */
    var  totalInstallmentAmtttts = parseFloat(interestamttotal)+parseFloat(installmentAmt111);
    $('#totalInstallmentAmt').val(parseFloat(totalInstallmentAmtttts.toFixed(2)));

  });
}


if ($('#Include').is(':checked')) {
    

  

  $('#interestper').on('input',function(){
    var installmentno3=$('#installmentno').val();
    var totalInstallmentAmt3=$('#totalInstallmentAmt').val();
    var getloanTypeValue=$('#getloanTypeValue').val();
    var interetotalstamt=$('#interetotalstamt').val();
    var installmentAmt11=$('#installmentAmt11').val();






    var  hapttasankhya3 = parseFloat(totalInstallmentAmt3)/parseFloat(installmentno3);
    $('#haptars').val(parseFloat(hapttasankhya3.toFixed(2)));

    var e = document.getElementById("fkloantypeId");
  var text = e.options[e.selectedIndex].text;


$('#showloantypeval').text('('+text+')');

var  interestamttotal = parseFloat(getloanTypeValue)*parseFloat(interetotalstamt);
    $('#interestamttotal').val(parseFloat(interestamttotal.toFixed(2)));

// /***** Addition of muddal and next vyaj*** */
    var  totalInstallmentAmtttt = parseFloat(interestamttotal)+parseFloat(installmentAmt11);
    $('#totalInstallmentAmt').val(parseFloat(totalInstallmentAmtttt.toFixed(2)));

  });

  


 

 
}







$('#installmentAmt').on('input',function(){
  var installmentAmt=$('#installmentAmt').val();
  var installmentAmt11=$('#installmentAmt11').val(installmentAmt);

 




});



   
}






function getduration(){
 var fkloantypeId = $('#fkloantypeId').val();
    if (fkloantypeId>0) {
 $.ajax({
                        url:base_path+'LoanActivation/getDuration',
                        method: 'post',
                        data: {'fkloantypeId': fkloantypeId},
                        // dataType: 'json',
                        success: function(data){

                             console.log(data);
                          
                                var obj=JSON.parse(data);
                              
                                
                                 $('#fkdurationId').val(obj[0]['durationId']);
                             
                                 $('#durationValue').val(obj[0]['durationValue']);
                                 $('#DurationName').empty();
                                $('#DurationName').append(obj[0]['durationName']);

                                var DurationName=  $('#DurationName').text();
                               
                                $('#DurationNameVal').val(DurationName);
                                    console.log(DurationName);

                                  adddays();

                       


                        }
                    }); 
}
}

  
// })(jQuery, this, document);
  Date.prototype.toInputFormat = function() {
    // alert('fun20');

    var yyyy = this.getFullYear().toString();

       var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
       var dd  = this.getDate().toString();
       return yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]);  
    };

function adddays(){
   // $('#DurationName').empty();
        $('#ChargesTable').empty();
        $('#fkinstallmentTypeId').val('0').trigger('change');
        $('#InstallmentDuration').empty();
        // $('#installmentAmt').val('0');
        $('#penaltyAmt').val('0');
        // $('#totalInstallmentAmt').val('0');
          $('#value').val('0');
            $('#InstDuration').val('0');

            // $('#interestper').val('0');
            // $('#interestamt').val('0');
            // $('#interetotalstamt').val('0');
            // $('#haptars').val('0');
            // $('#installmentno').val('0');

   var date = new Date($("#startDate").val());

    days = parseInt($("#durationValue").val(), 10);
        // alert(days)
        if(!isNaN(date.getTime())){
            date.setDate(date.getDate() + days-1);

            var xyw=
            
            // $("#endDate").val(date.toInputFormat());
            $("#installmentenddate").val(date.toInputFormat());
        } 
  }


$(document).ready(function(){
$("#btn_savee").click(function(){
if(a==false){
  saveperform();
 }
  });


$('#memberdetails').click(function(){

// alert('h')
var  memberId=$('#fkmemberId').val();
// 
$('#detailstable').empty();
if (memberId>0) {


 $.ajax({
                        url:base_path+'LoanActivation/getbhishi',
                        method: 'post',
                        data: {'memberId' : memberId},
                         dataType:'json',
                        success: function(data){

                           $('select[name="Bhishiii"]').empty();
                           $('#Bhishiii').append('<option value="" selected>---select Bhishi---</option>');
                           $.each(data,function(index,value){
                               
                                $('#Bhishiii').append('<option value="'+value['bhishiActivationId']+'">'+value['bhishiActivationId']+'   '+value['bhishiTypeName']+'</option>');
                                
                            
                            });
                         }
 });






}
});

$('#Bhishiii').change(function(){
  var Bhishiii=$('#Bhishiii').val();
  var memberId=$('#fkmemberId').val();
  $('#detailstable').empty();
  if (Bhishiii>0) {
  var startDate=$('#startDate').val();
      $.ajax({
                        url:base_path+'LoanActivation/bhishidetails',
                        method: 'post',
                        data: {'memberId' : memberId,
                        'bhishiActivationId' : Bhishiii,
                        'startDate':startDate
                      },
                      
                        success: function(data){
// alert(memberId);
                          // console.log(data);
                          $('#detailstable').append(data);
                            }
                        });    
  }

});
}); 

function saveperform()
{
  // alert('hiii');
    var LoanActivationId=$('#txt_id').val();

    var fkmemberId=$('#fkmemberId').val();
    var fkbhishiTypeId=$('#fkbhishiTypeId').val();
    var fkinstallmentTypeId=$('#fkinstallmentTypeId').val();
    var startDate=$('#startDate').val();
    var fkdurationId=$('#fkdurationId').val();
    var endDate=$('#endDate').val();
    var week=$('#week').val();
    var installmentAmt=$('#installmentAmt').val();
    var totalInstallmentAmt=$('#totalInstallmentAmt').val();
    var month=$('#month').val();
   
    var days=$('#days').val();
    
    if(startDate=="" || fkdurationId=="")
    {
      swal({
        title:"",
        text:"Please Enter Required Field (*)",
        type:"error",           
    });        
    }

    else
    {
        if(LoanActivationId>0)
        {
           a=true;

           var paidbtntext = $('#paidbtntext').text();
           
           if(paidbtntext){
            $('#btn_savee').prop('disabled', true);
            $('#startDate').prop('disabled', true);

            $('#btn_savee').html('Installment Start');
            $("#btn_savee").css("transform", "translateY(0px)");

            swal({
              title:"",
              text:"Your Installment Start..you can not be make change",
              type:"error",
              showCancelButton: false, 
              showConfirmButton: true,
               width: '1000px',
          });

           }
           else{
               


            var form = $("#Form").closest("form");
            var formData = new FormData(form[0]);
                  
                  $.ajax({
              url:base_path+"LoanActivation/update",
              type: "POST",
          
              data: formData,
              processData: false,
              contentType: false,
              beforeSend: function(){
                $('#btn_savee').prop('disabled', true);
                $('#btn_savee').html('<i class="fa fa-spinner " style="padding-right:2%;"></i> Loading');
              }, 
              success: function(data) { 
            
      
                $("#Form").trigger("reset");
                $('#btn_savee').html('Save');
                $('#btn_savee').prop('disabled', false);
      
                  swal({
                  title:"",
                  text:"Data Updatted Successfully",
                  type:"success",
                  showCancelButton: false, 
                  showConfirmButton: false,
                   width: '1000px',
                  timer:600
              });
              console.log(data);
                   window.location.href = base_path+"LoanActivation";
                       
              }
            });




           }




     

        }
    else
    {      
         // alert('Insert');
         var form = $("#Form").closest("form");
         var formData = new FormData(form[0]);
            
            $.ajax({
              url:base_path+"LoanActivation/perform",
              type: "POST",
    
              data: formData,
              processData: false,
              contentType: false,
              beforeSend: function(){
                $('#btn_savee').prop('disabled', true);
                $('#btn_savee').html('<i class="fa fa-spinner " style="padding-right:2%;"></i> Loading');
              }, 
              success: function(data) { 
                console.log('loan data',data);
               swal("Your Loan Activation Id is "+data+"", "Data Submitted Successfully", "success")
                $("#Form").trigger("reset");
                $('#btn_savee').html('Save');
                $('#btn_savee').prop('disabled', false);
                
              
                
                $('#startDate').val('').trigger('change');
                $('#endDate').val('').trigger('change');
                $('#fkbhishiTypeId').val('0').trigger('change');
                $('#fkinstallmentTypeId').val('0').trigger('change');

                 $('#ChargesTable').empty();
                  $('#ReferanceTable').empty();

                // console.log(data);
  var tdate = new Date();
   var dd = tdate.getDate(); //yields day
   var MM = tdate.getMonth()+1; //yields month
   if (MM>9) {
MM=MM;
   }
   else{
    MM='0'+MM;
   }
   if (dd>9) {
dd=dd;
   }
   else{
    dd='0'+dd;
   }
   var yyyy = tdate.getFullYear(); //yields year
   var currentDate= yyyy + "-" +MM + "-" +dd ;
    $('#startDate').val(currentDate);
$('#endDate').val(currentDate);
            // swal({
            //       title:"",
            //       text:"Data Submitted Successfully",
            //       type:"success",
            //       showCancelButton: false, 
            //       showConfirmButton: false,
            //       width: '1000px',
            //       timer:2000
            //     }); 
            a=false;         
               }
              });      
        }
      }
    
    }
function remove_relation_details(rid) {

        swal({
            title: "Do you want to Delete?",
            text: "",
            type: "error",    
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Confirm",
            cancelButtonText: "Back",
            closeOnConfirm:true 
            },  

            function(isConfirm){
              
              if (isConfirm) {

                $.ajax({
                    url:base_path+"LoanActivation/delete",
                    type:'GET',
                    data:{
                        'loanInstaDateId':rid
                    },
                    success:function(data)
                    {
                      // alert(data)
                        if(data==1)
                        {
                          // alert('hii');
                            $('.deleteclass' + rid).remove();
                            var chkRemoveItem=0;
                              // calculateAllAmount();
                            // checkRow();
                            // if(chkRow==0)
                            // {
                            //     $('#btnSave').attr('disabled','disabled');
                            // }
                        }
                    }
                });
 } 

            });
    }