$(function() {
$('#datetimepicker4').datetimepicker({
                viewMode: 'years',
                format: 'YYYY-MM-DD'
            });
     
    jQuery("#formID").validationEngine('attach', {
        onValidationComplete: function (form, status) {

            if (status == true) {
              
                var token =$("#token").val(); 
                $.post("upload", {
               
                    _token : token

                },

                function (data, status) {
                    
 
                    $("#image").attr('src', data);
 $("#loadi").hide();
 
                });
            var date = $(":text[name='dp1']").attr('id');
            var lastname = $('#lastname').val();
            var fname = $('#firstname').val();
            var sex = $('#sex').val();
            var state = $('#state').find("option:selected").text();
            var religion = $('#religion').val();
            var dp1 = $('#' + date).val();
            var status = $('#status').val();
            var phone = $("#phone").val();
            var kinad = $("#kin_address").val();
            var kinph = $("#kin_phone").val();
            var nationality = $("#nationality").val();
            var other = $("#other").val();
            var lga = $("#lga ").find("option:selected").text();
            var address = $("#address").val();
            var programme = $("#crs option:selected").val();
            var course = $("#crs  ").find("option:selected").text();
            var course2 = $("#course2").find("option:selected").text();
            var school1 = $('#school11').find("option:selected").text();
            var school22 = $('#school22').find("option:selected").text();
            var programm = $('#crs').find("option:selected").val();
            var dip = $('#department1').find("option:selected").text();
            var dip2 = $('#department2').find("option:selected").text();
            var prend = $("#prend").val();
            var regno = $("#reg_no").val();
            var teller = $("#teller").val();
            var jambscore = $("#jambscore").val();
            var jambregno = $("#jambregno").val();
            var examtype = $("#examtype1").find("option:selected").val();
            var examno = $("#examnumber1").val();
            var mon1 = $("#examfrommonth1").find("option:selected").val();
            var mon2 = $("#examtomonth1").find("option:selected").val();
            var examyr = $("#examfromyear1").find("option:selected").val(); 
           
            var grade = $("#grade").val();
            
 
 
if(programm=="ND"){

$("#app").removeClass("hide");
}else{
    
$("#app").addClass("hide");

}

if(programm=="HND"){

$("#hndp").removeClass("hide");
}else{
    
$("#hndp").addClass("hide");

}
 $("#first").text(fname);
 $("#last").text(lastname);
 $("#others").text(other);
 $("#stat").text(status);
 $("#dob").text(dp1);
 $("#gen").text(sex);
 $("#pho").text(phone);
 $("#kin_ad").text(kinad);
 $("#kin_ph").text(kinph);
 $("#nat").text(nationality);
 $("#reli").text(religion);
 $("#ad").text(address);
 $("#lg").text(lga);
 $("#states").text(state);
 $("#pro").text(programm);
 $("#sch").text(school1);
 $("#sch2").text(school22);
 $("#gradep").text(grade);
 $("#depp").text(dip);
 $("#depp2").text(dip2);
 $("#cs").text(course);
 $("#cs2").text(course2); 
 $("#sc").text(jambscore); 
 $("#regno").text(regno);
 $("#tell").text(teller);  
 $("#myModal").modal('show');
            }

        }
    });
  
   

  $("#finish").click(function(){
    
                var date = $(":text[name='dp1']").attr('id');
            var lastname = $('#lastname').val();
            var fname = $('#firstname').val();
            var sex = $('#sex').val();
            var state = $('#state').val();
            var religion = $('#religion').val();
            var dp1 = $('#' + date).val();
            var status = $('#status').val();
            var grade = $('#grade').val();
            var phone = $("#phone").val();
            var nationality = $("#nationality").val();
            var others = $("#other").val();
            var lga = $("#lga").val();
            var address = $("#address").val();
            var kinadd = $("#kin_address").val();
            var regno = $("#reg_no").val();
            var teller = $("#teller").val();
            var kinph = $("#kin_phone").val(); 
            var dip1 = $("select[name=department1]").attr('id'); 
            var course1 = $("#crs option:selected").attr('id');
            var course2 = $("#course2 option:selected").attr('id');
            var department1 = $("#" + dip1).find("option:selected").val();  
            var school1 = $('#school11').find("option:selected").val();
            var jambscore = $("#jambscore").val();
            var jambregno = $("#jambregno").val();
            var token =$("#token").val(); 
    
 
  $("#ntload").fadeIn(940); 
  $("#noty").text();
         jQuery.post("regoff", { 
                dob: dp1,
                _token:token,
                sex: sex,
                teller:teller,
                regno:regno,
                kin_address:kinadd,
                kin_phone:kinph,
                state: state,
                religion: religion, 
                status: status, 
                school11:school1,
                nationality: nationality,  
                address: address,
                course1: course1, 
                department1: department1,  
                lga: lga,
                jambregno: jambregno,
                jambscore: jambscore, 
               
 
            }, function (data, textStatus) {
                var array = data.split("/"); 
                
                if (array[0] == 1) {

                  

                    window.location = "reg/"+array[1];
                   $("#noty").text("Succefully Submitted");
                  $("#noty").removeClass("text-danger");
                    $("#noty").addClass("text-success");
                    return false
                    return false

                } else {
                   $("#ntload").fadeOut(940);
                  $("#noty").addClass("text-danger");
                    $("#noty").removeClass("text-success");
                  $("#noty").text(data);
                   
                }
              

            });


 
         }); 
  
      $("#file").change(function ()
   {
     
     
 
         var ext = $('#file').val().split('.').pop().toLowerCase();
 
          if($.inArray(ext, ['jpg','jpeg']) == -1) {
 
           
                $('#warn').fadeOut("slow", function () {
                    var div = $("<div id='warn' style='color:red;'   > Only JPEG,JPG Picture Fomart </div>").hide();
                    $(this).replaceWith(div);
                    $('#warn').fadeIn("slow");
                    $('#file').val('');
                    
                });

}      
                   
 
 
     var iSize = ($("#file")[0].files[0].size / 1024);
   
        iSize = (Math.round(iSize * 100) / 100)
 
     
      if(iSize<44.4){
            
                    $('#warn').fadeOut("slow", function () {
                    var div = $("warn").hide();
                     
  
                });    
        }
        else
        {

                            $('#warn').fadeOut("slow", function () {
                    var div = $("<div id='warn' style='color:red;'   > Only Less Than 44.4 KB  Picture Size Is Allowed </div>").hide();
                    $(this).replaceWith(div);
                    $('#warn').fadeIn("slow");
  
                });
 
                return;
        }

     
  });
 
$('#image_upload_form').submit(function (e) {
    e.preventDefault();
         
          $("#warn").hide('slow');
         
 if ($("#file").val()=="")
   {
   $('#warn').fadeOut("slow", function () {
                    var div = $("<div id='warn' style='color:red; '   > Please Upload A Passport</div>").hide();
                    $(this).replaceWith(div);
                    $('#warn').fadeIn("slow");
  
                });
   e.preventDefault(); e.preventDefault();e.preventDefault(); 
               
   }
 
                var iSize = ($("#file")[0].files[0].size / 1024);
    
        iSize = (Math.round(iSize * 100) / 100)
            
         
       if(iSize<44.4){
            
              $('div#ajax_upload_demo img').attr('src', 'images/loadings.gif');
               
              
          
                var fd = new FormData(document.getElementById("image_upload_form"));  
                          $.ajax({
                            url: "upload",
                            type: "POST",
                            data: fd,
                            processData: false,  // tell jQuery not to process the data
                            contentType: false   // tell jQuery not to set contentType
                          }).done(function( data ) {
                              console.log("PHP Output:");
                              $('#warn').fadeOut("slow", function () {
                                var div = $(data).hide();
                                $(this).replaceWith(div);
                                $('#warn').fadeIn("slow");
                
                            });     
                         check();                    
                               
                          });
                       
              e.preventDefault();
        }
        else
        {
                            $('#warn').fadeOut("slow", function () {
                    var div = $("<div id='warn' style='color:red; '   > Only Less Than 44.4 KB  Picture Size Is Allowed </div>").hide();
                    $(this).replaceWith(div);
                    $('#warn').fadeIn("slow");
  
                });
               e.preventDefault(); e.preventDefault();e.preventDefault(); e.preventDefault();
               
        }                                  
        e.preventDefault();
       
      
    });
   function check(){
    var token =$("#token").val(); 
    $.post("upload", {
   
        _token : token
    }, 
    function (data, status) {
        if(data!=""){ 
      $("#sd").attr('src', data);
                              $("#nm").val( data); 
                
        }
        else{
            $("#sd").attr('src', "images/avatar_no.jpg");  
        }

    });
   }
  
 
 
     
 

    $("#school11").on("change", function () {
        var link = $(this).find("option:selected").val();
        cs2 = $("select[name=department1]").attr('id');
        if (link != "") {
            $("#" + cs2).addClass("validate[required]   ");
 
        }
        clear1 = $("select[name=course1]").attr('id');


        $.expr[':'].nonEmptyValue = function (obj) {
            return $(obj).val() != '';
        };

        $('#' + clear1 + ' option:nonEmptyValue').remove();

    });

    

    css2 = $("select[name=department1]").attr('id');
    $("#" + css2).on("change", function () {
        var link = $(this).find("option:selected").val();
        var title = $('#programme').find("option:selected").attr("title");
        var cs2 = $("select[name=course1]").attr('id');
        $('#' + cs2).validationEngine('hide');

        if (link != "") {

            $("#" + cs2).addClass("validate[required]   ");
           
        }
        clear1 = $("select[name=course1]").attr('id');




    });

 
  
    
    $("#to0,#frm0").on("change", function () {
    var from=$("#frm0").find("option:selected").val();
    var to = $("#to0").find("option:selected").val();
    if(from !="" &&  to !="")
    {
    if ( from >to)
    {
        $('#to0').val("");
              jQuery('#to0').validationEngine('showPrompt', 'Invalide Date Range', 'error', 'topRight',true);
               
    }
     
    }      
    

 
    });    
    
    $("#to2,#from2").on("change", function () {
    var from=$("#from2").val();
    var to = $("#to2").val();
     if(from !="" &&  to !="")
    {
    if ( from >to)
    {
              $('#to2').val("");
              jQuery('#to2').validationEngine('showPrompt', 'Invalide Date Range', 'error', 'topRight',true);
               
    }
    }
    });    
    
    $("#to3,#from3").on("change", function () {
    var from=$("#from3").val();
    var to = $("#to3").val();
        if(from !="" &&  to !="")
    {
    if ( from >to)
    {
              $('#to3').val("");
              jQuery('#to3').validationEngine('showPrompt', 'Invalide Date Range', 'error', 'topRight',true);
               
    }
 
    }

    });    
    
    $("#to4,#from4").on("change", function () {
    var from=$("#from4").val();
    var to = $("#to4").val();
        if(from !="" &&  to !="")
    {
    if ( from >to)
    {
              $('#to4').val("");
              jQuery('#to4').validationEngine('showPrompt', 'Invalide Date Range', 'error', 'topRight',true);
               
    }
 
    }

    });

 
     
var subject = ["ACCOUNT","AGRICULTURAL SCIENCE","APPLIED ELECTRICITY","ARABIC","ARITHMETIC","ART.","AUTO ELECTRICITY","BASIC ELECTRICITY","BASIC SICENCE","BIOLOGY","BLOCK LAYING","BOOK KEEPING","BUILDING CONSTRUCTION","BUILDING/ENGINEERING DRAWING","CABLE JOINT &  BATTERY CHARGING","CARPENTRY","CHEMISTRY","CHRISTIAN RELIGIOUS STUDIES","CIVIC","CLASS TEACHING","COMMERCE","COMPUTER SCIENCE","CONCRETING","CRAFT SCIENCE","CRAFT THEORY","CRAFT/WORKSHOPPRACTICE","DOMESTIC INSTALLATION","ECONOMICS","ELECTRICAL INSTALLATION &  MAINTENANCE WORK","ELECTRONICS DEVICES &  CIRCUITS","ELECTRONICS WORKS","ENGINE MAINTENACE &  REFURBISHING","ENGINEERING DRAWING","ENGLISH LANGUAGE","F/MATHS","FABRICATION AND WELDING","FOOD &  NUTRITION","FRENCH","GAS WELDING", "CUTTING AND ARC WELDING","GENERAL METAL WORK","GEOGRAPHY","GOVERNMENT","HAUSA","HEALTH SCIENCE","HISTORY","HOME MANAGEMENT","IGBO LANGUAGE","INFORMATION & COMMUNICATION TECHNOLOGY","INTERGRATED SCIENCE","INTRO. TO BUILDING CONSTRUCTION","ISLAMIC HISTORY","ISLAMIC RELIGION STUDIES","JOINERY","LIT. IN ENGLISH","MATHEMATICS","MECHANICAL ENGINEERING CRAFT PRACTICE","METAL WORK","MOTOR VEHICLE MECHINE WORKS","OFFICE PRACTIES","P.H.E","PHYSICS","PLUMBING & PIPE FITTING","PRINCIPLES OF EDUCATION","RADIO COMMUNICATION","SCIENCE TECHNOLOGY & SOCIETY","SERVICE STATION MECH. WORK & VEHICLE","SHEET METAL/STRUCTURAL STEEL WORK","SHORTHAND","SOCIAL STUDIES","SOCIOLOGY","TECHNICAL DRAWING","TELEVISION","TYPING","VERNACULAR (HAUSA)","WALL","FLOORS & CELLING FINIHSING","WELDING OF ELECTRIC MACHINE","WOOD WORK","YORUBA LANGUAGE"];
var option = '';
for (var i=0;i<subject.length;i++){
   option += '<option value="'+ subject[i] + '">' + subject[i] + '</option>';
}
$('#sbj1-1').append(option);
$('#sbj1-2').append(option);
$('#sbj1-3').append(option);
$('#sbj1-4').append(option);
$('#sbj1-5').append(option);
$('#sbj1-6').append(option);
$('#sbj1-7').append(option);
$('#sbj1-8').append(option);
$('#sbj1-9').append(option);

var scorelt = ["A1","B2","B3","C4","C5","C6","D7","E8","F9","A/R","DISTINCTION","OUTSTANDING","CREDIT","PASS","PENDING","ABSENT","A","B","C","D","E","F"];
var scorep = '';
for (var i=0;i<scorelt.length;i++){
   scorep += '<option value="'+ scorelt[i] + '">' + scorelt[i] + '</option>';
}
$('#grade1-1').append(scorep);
$('#grade1-2').append(scorep);
$('#grade1-3').append(scorep);
$('#grade1-4').append(scorep);
$('#grade1-5').append(scorep);
$('#grade1-6').append(scorep);
$('#grade1-7').append(scorep);
$('#grade1-8').append(scorep);
$('#grade1-9').append(scorep);

var mth = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
var mthp = '';
for (var i=0;i<mth.length;i++){
   mthp += '<option value="'+ mth[i] + '">' + mth[i] + '</option>';
}
$('#examfrommonth1').append(mthp);
$('#examtomonth1').append(mthp);

var tdate = new Date();
yyyy = tdate.getFullYear();

 var yrp = '';
for (var i=1956;i<yyyy;i++){
   yrp += '<option value="'+ i + '">' + i + '</option>';
}
  
 $('#examfromyear1').append(yrp);
 $('#frm0').append(yrp);
 $('#from2').append(yrp);
 $('#from3').append(yrp);
 $('#from4').append(yrp);
 $('#to0').append(yrp);
 $('#to3').append(yrp);
 $('#to4').append(yrp);
 $('#to2').append(yrp);

 
 
 
});

$(document).on('change', '.btn-file :file', function() {
  var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);
});

$(document).ready( function() {
   
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
        
    });
  $("#school11").on("change", function () {

    $('#department1 option:nonEmptyValue').remove();
    $('#crs option:nonEmptyValue').remove();
 $("#loadg").css("visibility", "visible"); 
}); 
    
 
 $("#crs,#school11,#course2,#school22" ).on("change", function () {
   var course1 = $("#crs option:selected").val();  
   var course2 = $("#course2 option:selected").val();
   if(course1!="" ||  course2!=""  ){
   
if(course1=="ND" || course2=="ND"){
 $("#jamb").fadeIn(940);
}else{
 $("#jamb").fadeOut(940);  
$("#jambregno").validationEngine('hide');  
$("#jambscore").validationEngine('hide');   
}
/*   
if(course1=="HND" || course2=="HND"){
 $("#hnd").fadeIn(940);
}else{
 $("#hnd").fadeOut(940);  
$("#chnd").validationEngine('hide');      
}*/
  }else{
      $("#jamb").fadeOut(940);  
$("#jambregno").validationEngine('hide');  
$("#jambscore").validationEngine('hide');
$("#hnd").fadeOut(940);  
$("#chnd").validationEngine('hide');
 }
});
 $("#department1" ).on("change", function () {
 
 
   $("#loadn").css("visibility", "visible"); 
}); 

$("#department2" ).on("change", function () { 
 
   $("#loadn2").css("visibility", "visible"); 
});

 $("#school22").on("change", function () {
 
      $('#department2').find('option[value!=""]').remove();
      $('#course2').find('option[value!=""]').remove();
      
      $("#loadg2").css("visibility", "visible");
 
});
   
});

 function load_state( index) {
   
    $.ajax({
        url: "lga/" + index ,
        complete: function () {
            
 $("#lga").change();
        },
        success: function (data) {
            $("#lga").html(data);
 $("#lga").change(); 
        }

    })

 
}
/*
function checkHELLO(field, rules, i, options){

   var course1 = $("#crs option:selected").val();  
   var course2 = $("#course2 option:selected").val();
   if(course2!="" && course1!=""){
            if (field.val() != course2 || field.val() != course1 ) {
                // this allows to use i18 for the error msgs
                return options.allrules.validate2fields.alertText;
            }else{$("#course2").validationEngine('hide'); $("#crs").validationEngine('hide');    }
        }
        }
 */
function load_options(id, index,name) {
  

    $.ajax({
        url: "study/" + name + "/" + id,
        complete: function () {
            
 $("#crs").change();
        },
        success: function (data) {
             
            if(index=="department2") $("#loadg2").css("visibility", "hidden"); else $("#loadg").css("visibility", "hidden");
           if(index=="course2") $("#loadn2").css("visibility", "hidden"); else $("#loadn").css("visibility", "hidden");
            $("#" + index).html(data);
 $("#crs").change(); 
        }

    })

 
}
 