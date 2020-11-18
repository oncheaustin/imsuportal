$(function() {
$('#datetimepicker4').datetimepicker({
                viewMode: 'years',
                format: 'YYYY-MM-DD'
            });
     
    jQuery("#formID").validationEngine('attach', {
        onValidationComplete: function (form, status) {

                        if (status == true) {
              
              $.post("cr.php", {
   

                },

                function (data, status) {
                    
 
                    $("#image").attr('src', data);
 $("#loadi").hide();
 
                });
            var date = $(":text[name='dp1']").attr('id');
            var lastname = $('#lastname').val();
            var fname = $('#firstname').val();
            var sex = $('#sex').val();
            var state = $('#state').val();
            var religion = $('#religion').val();
            var dp1 = $('#' + date).val();
            var status = $('#status').val();
            var phone = $("#phone").val();
            var nationality = $("#nationality").val();
            var other = $("#other").val();
            var lga = $("#lga").val();
            var address = $("#address").val();
            var programme = $("#crs option:selected").val();
            var course = $("#crs option:selected").attr("course");
            var school1 = $('#school11').find("option:selected").text();
            var programm = $('#crs').find("option:selected").val();
            var dip = $('#department1').find("option:selected").text();
            var prend = $("#prend").val();
            var jambscore = $("#jambscore").val();
            var jambregno = $("#jambregno").val();
            var examtype = $("#examtype1").find("option:selected").val();
            var examno = $("#examnumber1").val();
            var mon1 = $("#examfrommonth1").find("option:selected").val();
            var mon2 = $("#examtomonth1").find("option:selected").val();
            var examyr = $("#examfromyear1").find("option:selected").val();
            var subj1 = $("#sbj1-1").find("option:selected").val();
            var grd1 = $("#grade1-1").find("option:selected").val();
            var subj2 = $("#sbj1-2").find("option:selected").val();
            var grd2 = $("#grade1-2").find("option:selected").val();
            var subj3 = $("#sbj1-3").find("option:selected").val();
            var grd3 = $("#grade1-3").find("option:selected").val();
            var subj4 = $("#sbj1-4").find("option:selected").val();
            var grd4 = $("#grade1-4").find("option:selected").val();
            var subj5 = $("#sbj1-5").find("option:selected").val();
            var grd5 = $("#grade1-5").find("option:selected").val();
            var subj6 = $("#sbj1-6").find("option:selected").val();
            var grd6 = $("#grade1-6").find("option:selected").val();
            var subj7 = $("#sbj1-7").find("option:selected").val();
            var grd7 = $("#grade1-7").find("option:selected").val();
            var subj8 = $("#sbj1-8").find("option:selected").val();
            var grd8= $("#grade1-8").find("option:selected").val();
            var subj9 = $("#sbj1-9").find("option:selected").val();
            var grd9= $("#grade1-9").find("option:selected").val();
            var schat1 = $("#school1").val();
            var schat2 = $("#school2").val();
            var schat3 = $("#school3").val();
            var schat4 = $("#school4").val();
            var schfrm1= $("#frm0").find("option:selected").val();
            var schfrm2= $("#from2").find("option:selected").val();
            var schfrm3= $("#from3").find("option:selected").val();
            var schfrm4= $("#from4").find("option:selected").val();
            var schto1 = $("#to0").find("option:selected").val();
            var schto2 = $("#t2").find("option:selected").val();
            var schto3 = $("#to3").find("option:selected").val();
            var schto4 = $("#to4").find("option:selected").val();
            var schq1 = $("#qualification1").val();
            var schq2 = $("#qualification2").val();
            var schq3 = $("#qualification3").val();
            var schq4 = $("#qualification4").val();
            var text =[];
      var schlist=[];
 $('#table tr:not(:first)').remove();
 $('#schlat tr:not(:first)').remove();
schlist[0]=[schat1,schfrm1,schto1,schq1];
schlist[1]=[schat2,schfrm2,schto2,schq2];
schlist[2]=[schat3,schfrm3,schto3,schq3];
schlist[3]=[schat4,schfrm4,schto4,schq4];
text[0] =[subj1,grd1];
text[1] =[subj2,grd2];
text[2] =[subj3,grd3];
text[3] =[subj4,grd4];
text[4] =[subj5,grd5];
text[5] =[subj6,grd6];
text[6] =[subj7,grd7];
text[7] =[subj8,grd8];
text[8] =[subj9,grd9];
 for ( var t=0;t<schlist.length;t++){
if(schlist[t][0]!=="" && schlist[t][1]!=="" && schlist[t][2]!=="" && schlist[t][3]!==""){
  $('#schlat').append('<tr> <td>'+ schlist[t][0] + '</td><td>' + schlist[t][1] + '</td> <td>' + schlist[t][2] + '</td> <td>' + schlist[t][3] + '</td>  </tr>');
  }
  }
for ( var i=0;i<text.length;i++){
if(text[i][0]!=="" && text[i][1]!==""){
  $('#table').append('<tr> <td>'+ text[i][0] + '</td><td>' + text[i][1] + '</td></tr>');
  }
  }
if(programm=="ND"){

$("#app").removeClass("hide");
}else{
$("#app").addClass("hide");
}
 $("#first").text(fname);
 $("#last").text(lastname);
  $("#others").text(other);
 $("#stat").text(status);
 $("#dob").text(dp1);
 $("#gen").text(sex);
 $("#pho").text(phone);
 $("#nat").text(nationality);
 $("#reli").text(religion);
 $("#ad").text(address);
 $("#lg").text(lga);
 $("#states").text(state);
  $("#pro").text(programm);
  $("#sch").text(school1);
  $("#depp").text(dip);
$("#cs").text(course);
  $("#pre").text(prend);
 $("#sc").text(jambscore);
 $("#jambrg").text(jambregno);
 $("#examtp").text(examtype);
 $("#examno").text(examno);
 $("#mon1").text(mon1);
 $("#mon2").text(mon2);
 $("#eyear").text(examyr);
              $("#myModal").modal('show');


            }


        }
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
    
         
          $("#warn").hide('slow');
 if ($("#file").val()=="")
   {
   $('#warn').fadeOut("slow", function () {
                    var div = $("<div id='warn' style='color:red; '   > Please Upload A Passport</div>").hide();
                    $(this).replaceWith(div);
                    $('#warn').fadeIn("slow");
  
                });
   e.preventDefault(); e.preventDefault();e.preventDefault(); e.preventDefault();
               
   }
 
               var iSize = ($("#file")[0].files[0].size / 1024);
    
        iSize = (Math.round(iSize * 100) / 100)
            
         
      if(iSize<44.4){
            
              $('div#ajax_upload_demo img').attr('src', 'images/loadings.gif');
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
        
       
      
    });
    $('iframe[name=upload_to]').load(function () {
        var result = $(this).contents().text();
        
        if (result != '') {
            if (result == 'Err:big') {
                 
 
$.post("cr.php", {
                    first: ""

                },

                function (data, status) {
 alert(data);
$('div#ajax_upload_demo img').attr('src', data);
                });



                $('#warn').fadeOut("slow", function () {
                    var div = $("<div id='warn' style='color:red; '   > Only Less Than 44.4 KB  Picture Size Is Allowed </div>").hide();
                    $(this).replaceWith(div);
                    $('#warn').fadeIn("slow");
                                        $('#file').val('');
                });
                return;
            }
            if (result == 'Err:format') {
                 
 
$.post("cr.php", {
                    first: ""

                },

                function (data, status) {
 
$('div#ajax_upload_demo img').attr('src', data);
                });
 

                $('#warn').fadeOut("slow", function () {
                    var div = $("<div id='warn' style='color:red;'   > Only JPEG,JPG Picture Fomart </div>").hide();
                    $(this).replaceWith(div);
                    $('#warn').fadeIn("slow");
                    $('#file').val('');
                    
                });
                return;
            }
            
            if (result == 'Err:forma') {
                 
 
$.post("cr.php", {
                    first: ""

                },

                function (data, status) {
 
$('div#ajax_upload_demo img').attr('src', data);
                });

                $('#warn').fadeOut("slow", function () {
                    var div = $("<div id='warn' style='color:red;'   > Please Upload a Picture</div>").hide();
                    $(this).replaceWith(div);
                    $('#warn').fadeIn("slow");
                    $('#file').val('');
                });





                return;
            }
            
                        
            if (result == 'Err:entry') {
                 
 
$.post("cr.php", {
                    first: ""

                },

                function (data, status) {
 
$('div#ajax_upload_demo img').attr('src', data);
                });

                $('#warn').fadeOut("slow", function () {
                    var div = $("<div id='warn' style='color:red; '   > Error Occured</div>").hide();
                    $(this).replaceWith(div);
                    $('#warn').fadeIn("slow");
                    $('#file').val('');
                });





                return;
            }

            $('div#ajax_upload_demo img').attr('src', $(this).contents().text());
            bmx = $('#sd').attr('src');
          
            $('#warn').fadeOut("slow", function () {
                var div = $("<div id='warn' style='color:green; '   >Upload Successful</div>").hide();
                $(this).replaceWith(div);
                $("#nm").val(bmx);
                $('#nm').validationEngine('hide');
                $('#warn').fadeIn("slow");
                $('#file').val('');
            });
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
            var phone = $("#phone").val();
            var nationality = $("#nationality").val();
            var others = $("#other").val();
            var lga = $("#lga").val();
            var address = $("#address").val();
            var cs1 = $("select[name=course1]").attr('id');
            var cs2 = $("select[name=course2]").attr('id');
            var dip1 = $("select[name=department1]").attr('id');
            var dip2 = $("select[name=department2]").attr('id');
            var course1 = $("#crs option:selected").attr("course");
            var course2 = $("#" + cs2).find("option:selected").text();
            var department1 = $("#" + dip1).find("option:selected").text();
            var department2 = $("#" + dip2).find("option:selected").text();
            var school1 = $('#school11').find("option:selected").text();
            var school2 = $('#school22').find("option:selected").text();
            var school3 = $("#school1").val();
            var school4 = $("#school2").val();
            var school5 = $("#school3").val();
            var school6 = $("#school4").val();
            var to1 = $("#to0").find("option:selected").val();
            var to2 = $("#to2").find("option:selected").val();
            var to3 = $("#to3").find("option:selected").val();
            var to4 = $("#to4").find("option:selected").val();
            var from1 = $("#frm0").find("option:selected").val();
            var from2 = $("#from2").find("option:selected").val();
            var from3 = $("#from3").find("option:selected").val();
            var from4 = $("#from4").find("option:selected").val();
            var qualification1 = $("#qualification1").val();
            var qualification2 = $("#qualification2").val();
            var qualification3 = $("#qualification3").val();
            var qualification4 = $("#qualification4").val();
            var prend = $("#prend").val();
            var jambscore = $("#jambscore").val();
            var jambregno = $("#jambregno").val();

            var programme = $("#crs option:selected").val();
            var center = $("#center").find("option:selected").val();
            var type = $("#Type").find("option:selected").val();
            var sub1 = $("#sbj1-1").find("option:selected").val();
            var sub2 = $("#sbj1-2").find("option:selected").val();
            var sub3 = $("#sbj1-3").find("option:selected").val();
            var sub4 = $("#sbj1-4").find("option:selected").val();
            var sub5 = $("#sbj1-5").find("option:selected").val();
            var sub6 = $("#sbj1-6").find("option:selected").val();
            var sub7 = $("#sbj1-7").find("option:selected").val();
            var sub8 = $("#sbj1-8").find("option:selected").val();
            var sub9 = $("#sbj1-9").find("option:selected").val();
            var sub10 = $("#sbj2-1").find("option:selected").val();
            var sub11 = $("#sbj2-2").find("option:selected").val();
            var sub12 = $("#sbj2-3").find("option:selected").val();
            var sub13 = $("#sbj2-4").find("option:selected").val();
            var sub14 = $("#sbj2-5").find("option:selected").val();
            var sub15 = $("#sbj2-6").find("option:selected").val();
            var sub16 = $("#sbj2-7").find("option:selected").val();
            var sub17 = $("#sbj2-8").find("option:selected").val();
            var sub18 = $("#sbj2-9").find("option:selected").val();
            var score1 = $("#grade1-1").find("option:selected").val();
            var score2 = $("#grade1-2").find("option:selected").val();
            var score3 = $("#grade1-3").find("option:selected").val();
            var score4 = $("#grade1-4").find("option:selected").val();
            var score5 = $("#grade1-5").find("option:selected").val();
            var score6 = $("#grade1-6").find("option:selected").val();
            var score7 = $("#grade1-7").find("option:selected").val();
            var score8 = $("#grade1-8").find("option:selected").val();
            var score9 = $("#grade1-9").find("option:selected").val();
            var score10 = $("#grade2-1").find("option:selected").val();
            var score11 = $("#grade2-2").find("option:selected").val();
            var score12 = $("#grade2-3").find("option:selected").val();
            var score13 = $("#grade2-4").find("option:selected").val();
            var score14 = $("#grade2-5").find("option:selected").val();
            var score15 = $("#grade2-6").find("option:selected").val();
            var score16 = $("#grade2-7").find("option:selected").val();
            var score17 = $("#grade2-8").find("option:selected").val();
            var score18 = $("#grade2-9").find("option:selected").val();
            var examtype1 = $("#examtype1").find("option:selected").val();
            var examtype2 = $("#examtype2").find("option:selected").val();
            var examfrommonth1 = $("#examfrommonth1").find("option:selected").val();
            var examfrommonth2 = $("#examfrommonth2").find("option:selected").val();
            var examtomonth1 = $("#examtomonth1").find("option:selected").val();
            var examtomonth2 = $("#examtomonth2").find("option:selected").val();
            var examfromyear1 = $("#examfromyear1").find("option:selected").val();
            var examfromyear2 = $("#examfromyear2").find("option:selected").val();
            var examdate1 = examfrommonth1 + "-" + examtomonth1 + "-" + examfromyear1
            var examdate2 = examfrommonth2 + "-" + examtomonth2 + "-" + examfromyear2

            var examnumber1 = $("#examnumber1").val();
            var examnumber2 = $("#examnumber2").val();
 
 
$("#ntload").fadeIn(940);



            jQuery.post("process.php", {
                firstname: fname,
                lastname: lastname,
                examfrommonth1: examfrommonth1,
                examtomonth1:examtomonth1,
                examfromyear1:examfromyear1,
                examtomonth2:examtomonth2,
                examfrommonth2:examfrommonth2,
                examfromyear2:examfromyear2,
                dp: dp1,
                sex: sex,
                examdate1: examdate1,
                examdate2: examdate2,
                state: state,
                religion: religion,
                programme: programme,
                status: status,
                phone: phone,
                nationality: nationality,
                others: others,
                examtype1: examtype1,
                examtype2: examtype2,
                examnumber1: examnumber1,
                examnumber2: examnumber2,
                address: address,
                course1: course1,
                course2: course2,
                department1: department1,
                department2: department2,
                school1: school1,
                type: type,
                school2: school2,
                school3: school3,
                school4: school4,
                school5: school5,
                school6: school6,
                center: center,
                to1: to1,
                to2: to2,
                to3: to3,
                to4: to4,
                from1: from1,
                from2: from2,
                from3: from3,
                from4: from4,
                qualification1: qualification1,
                qualification2: qualification2,
                qualification3: qualification3,
                qualification4: qualification4,
                lga: lga,
                jambregno: jambregno,
                jambscore: jambscore,
                sub1: sub1,
                sub2: sub2,
                sub3: sub3,
                sub4: sub4,
                sub5: sub5,
                sub6: sub6,
                sub7: sub7,
                sub8: sub8,
                sub9: sub9,
                sub10: sub10,
                sub11: sub11,
                sub12: sub12,
                sub13: sub13,
                sub14: sub14,
                sub15: sub15,
                sub16: sub16,
                sub17: sub17,
                sub18: sub18,
                score1: score1,
                score2: score2,
                score3: score3,
                score4: score4,
                score5: score5,
                score6: score6,
                score7: score7,
                score8: score8,
                score9: score9,
                score10: score10,
                score11: score11,
                score12: score12,
                score13: score13,
                score14: score14,
                score15: score15,
                score16: score16,
                score17: score17,
                score18: score18,
                prend: prend,
 
               
 
            }, function (data, textStatus) {
                if (data == 1) {

                  

                    window.location = "print.php";
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
   
 



    $('#sbj1-1').change(function () {
        var sub11 = $("#sbj1-1").find("option:selected").val();
        var sub22 = $("#sbj1-2").find("option:selected").val();
        var sub33 = $("#sbj1-3").find("option:selected").val();
        var sub44 = $("#sbj1-4").find("option:selected").val();
        var sub55 = $("#sbj1-5").find("option:selected").val();
        var sub66 = $("#sbj1-6").find("option:selected").val();
        var sub77 = $("#sbj1-7").find("option:selected").val();
        var sub88 = $("#sbj1-8").find("option:selected").val();
        var sub999 = $("#sbj1-9").find("option:selected").val();
        if (sub11 !== "") {
            if (sub11 == sub22 || sub11 == sub33 || sub11 == sub44 || sub11 == sub55 || sub11 == sub66 || sub11 == sub77 || sub11 == sub88 || sub11 == sub999) {

                $('#sbj1-1').val("");
            jQuery('#sbj1-1').validationEngine('showPrompt', 'You Have Seleted ' + sub11 + ' Select Another', 'error', 'topRight',true);
            }
        }  


    });

    $('#sbj2-1').change(function () {
        var sub11 = $("#sbj2-1").find("option:selected").val();
        var sub22 = $("#sbj2-2").find("option:selected").val();
        var sub33 = $("#sbj2-3").find("option:selected").val();
        var sub44 = $("#sbj2-4").find("option:selected").val();
        var sub55 = $("#sbj2-5").find("option:selected").val();
        var sub66 = $("#sbj2-6").find("option:selected").val();
        var sub77 = $("#sbj2-7").find("option:selected").val();
        var sub88 = $("#sbj2-8").find("option:selected").val();
        var sub99 = $("#sbj2-9").find("option:selected").val();
        if (sub11 !== "") {
            if (sub11 == sub22 || sub11 == sub33 || sub11 == sub44 || sub11 == sub55 || sub11 == sub66 || sub11 == sub77 || sub11 == sub88 || sub11 == sub99) {

                $('#sbj2-1').val("");
            jQuery('#sbj2-1').validationEngine('showPrompt', 'You Have Seleted ' + sub11 + ' Select Another', 'error', 'topRight',true);
            }
        }  


    });

    $('#sbj2-2').change(function () {
        var sub11 = $("#sbj2-1").find("option:selected").val();
        var sub22 = $("#sbj2-2").find("option:selected").val();
        var sub33 = $("#sbj2-3").find("option:selected").val();
        var sub44 = $("#sbj2-4").find("option:selected").val();
        var sub55 = $("#sbj2-5").find("option:selected").val();
        var sub66 = $("#sbj2-6").find("option:selected").val();
        var sub77 = $("#sbj2-7").find("option:selected").val();
        var sub88 = $("#sbj2-8").find("option:selected").val();
        var sub99 = $("#sbj2-9").find("option:selected").val();
        if (sub22 !== "") {
            if (sub22 == sub11 || sub22 == sub33 || sub22 == sub44 || sub22 == sub55 || sub22 == sub66 || sub22 == sub77 || sub22 == sub88 || sub22 == sub99) {

                $('#sbj2-2').val("");
              jQuery('#sbj2-2').validationEngine('showPrompt', 'You Have Seleted ' + sub22 + ' Select Another', 'error', 'topRight',true);     }
        }

    });

    $('#sbj1-2').change(function () {
        var sub11 = $("#sbj1-1").find("option:selected").val();
        var sub22 = $("#sbj1-2").find("option:selected").val();
        var sub33 = $("#sbj1-3").find("option:selected").val();
        var sub44 = $("#sbj1-4").find("option:selected").val();
        var sub55 = $("#sbj1-5").find("option:selected").val();
        var sub66 = $("#sbj1-6").find("option:selected").val();
        var sub77 = $("#sbj1-7").find("option:selected").val();
        var sub88 = $("#sbj1-8").find("option:selected").val();
        var sub99 = $("#sbj1-9").find("option:selected").val();
        if (sub22 !== "") {
            if (sub22 == sub11 || sub22 == sub33 || sub22 == sub44 || sub22 == sub55 || sub22 == sub66 || sub22 == sub77 || sub22 == sub88 || sub22 == sub99) {

                $('#sbj1-2').val("");
              jQuery('#sbj1-2').validationEngine('showPrompt', 'You Have Seleted ' + sub22 + ' Select Another', 'error', 'topRight',true);     }
        }

    });

    $('#sbj1-3').change(function () {
        var sub11 = $("#sbj1-1").find("option:selected").val();
        var sub22 = $("#sbj1-2").find("option:selected").val();
        var sub33 = $("#sbj1-3").find("option:selected").val();
        var sub44 = $("#sbj1-4").find("option:selected").val();
        var sub55 = $("#sbj1-5").find("option:selected").val();
        var sub66 = $("#sbj1-6").find("option:selected").val();
        var sub77 = $("#sbj1-7").find("option:selected").val();
        var sub88 = $("#sbj1-8").find("option:selected").val();
        var sub99 = $("#sbj1-9").find("option:selected").val();
        if (sub33 !== "") {
            if (sub33 == sub11 || sub33 == sub22 || sub33 == sub44 || sub33 == sub55 || sub33 == sub66 || sub33 == sub77 || sub33 == sub88 || sub33 == sub99) {

                $('#sbj1-3').val("");
       jQuery('#sbj1-3').validationEngine('showPrompt', 'You Have Seleted ' + sub33 + ' Select Another', 'error', 'topRight',true);
            }
        }  

    });

    $('#sbj2-3').change(function () {
        var sub11 = $("#sbj2-1").find("option:selected").val();
        var sub22 = $("#sbj2-2").find("option:selected").val();
        var sub33 = $("#sbj2-3").find("option:selected").val();
        var sub44 = $("#sbj2-4").find("option:selected").val();
        var sub55 = $("#sbj2-5").find("option:selected").val();
        var sub66 = $("#sbj2-6").find("option:selected").val();
        var sub77 = $("#sbj2-7").find("option:selected").val();
        var sub88 = $("#sbj2-8").find("option:selected").val();
        var sub99 = $("#sbj2-9").find("option:selected").val();
        if (sub33 !== "") {
            if (sub33 == sub11 || sub33 == sub22 || sub33 == sub44 || sub33 == sub55 || sub33 == sub66 || sub33 == sub77 || sub33 == sub88 || sub33 == sub99) {

                $('#sbj2-3').val("");
       jQuery('#sbj2-3').validationEngine('showPrompt', 'You Have Seleted ' + sub33 + ' Select Another', 'error', 'topRight',true);
            }
        }  

    });

    $('#sbj1-4').change(function () {
        var sub11 = $("#sbj1-1").find("option:selected").val();
        var sub22 = $("#sbj1-2").find("option:selected").val();
        var sub33 = $("#sbj1-3").find("option:selected").val();
        var sub44 = $("#sbj1-4").find("option:selected").val();
        var sub55 = $("#sbj1-5").find("option:selected").val();
        var sub66 = $("#sbj1-6").find("option:selected").val();
        var sub77 = $("#sbj1-7").find("option:selected").val();
        var sub88 = $("#sbj1-8").find("option:selected").val();
        var sub99 = $("#sbj1-9").find("option:selected").val();
        if (sub44 !== "") {
            if (sub44 == sub11 || sub44 == sub22 || sub44 == sub33 || sub44 == sub55 || sub44 == sub66 || sub44 == sub77 || sub44 == sub88 || sub44 == sub99) {

                $('#sbj1-4').val("");
               jQuery('#sbj1-4').validationEngine('showPrompt', 'You Have Seleted ' + sub44 + ' Select Another', 'error', 'topRight',true);
            }
        }  
    });

    $('#sbj2-4').change(function () {
              var sub11 = $("#sbj2-1").find("option:selected").val();
        var sub22 = $("#sbj2-2").find("option:selected").val();
        var sub33 = $("#sbj2-3").find("option:selected").val();
        var sub44 = $("#sbj2-4").find("option:selected").val();
        var sub55 = $("#sbj2-5").find("option:selected").val();
        var sub66 = $("#sbj2-6").find("option:selected").val();
        var sub77 = $("#sbj2-7").find("option:selected").val();
        var sub88 = $("#sbj2-8").find("option:selected").val();
        var sub99 = $("#sbj2-9").find("option:selected").val();
        if (sub44 !== "") {
            if (sub44 == sub11 || sub44 == sub22 || sub44 == sub33 || sub44 == sub55 || sub44 == sub66 || sub44 == sub77 || sub44 == sub88 || sub44 == sub99) {

                $('#sbj2-4').val("");
               jQuery('#sbj2-4').validationEngine('showPrompt', 'You Have Seleted ' + sub44 + ' Select Another', 'error', 'topRight',true);
            }
        }  
    });


    $('#sbj1-5').change(function () {
        var sub11 = $("#sbj1-1").find("option:selected").val();
        var sub22 = $("#sbj1-2").find("option:selected").val();
        var sub33 = $("#sbj1-3").find("option:selected").val();
        var sub44 = $("#sbj1-4").find("option:selected").val();
        var sub55 = $("#sbj1-5").find("option:selected").val();
        var sub66 = $("#sbj1-6").find("option:selected").val();
        var sub77 = $("#sbj1-7").find("option:selected").val();
        var sub88 = $("#sbj1-8").find("option:selected").val();
        var sub99 = $("#sbj1-9").find("option:selected").val();
        if (sub55 !== "") {
            if (sub55 == sub11 || sub55 == sub22 || sub55 == sub33 || sub55 == sub44 || sub55 == sub66 || sub55 == sub77 || sub55 == sub88 || sub55 == sub99) {

                $('#sbj1-5').val("");
              jQuery('#sbj1-5').validationEngine('showPrompt', 'You Have Seleted ' + sub55 + ' Select Another', 'error', 'topRight',true);
            }
        }

    });


    $('#sbj2-5').change(function () {
              var sub11 = $("#sbj2-1").find("option:selected").val();
        var sub22 = $("#sbj2-2").find("option:selected").val();
        var sub33 = $("#sbj2-3").find("option:selected").val();
        var sub44 = $("#sbj2-4").find("option:selected").val();
        var sub55 = $("#sbj2-5").find("option:selected").val();
        var sub66 = $("#sbj2-6").find("option:selected").val();
        var sub77 = $("#sbj2-7").find("option:selected").val();
        var sub88 = $("#sbj2-8").find("option:selected").val();
        var sub99 = $("#sbj2-9").find("option:selected").val();
        if (sub55 !== "") {
            if (sub55 == sub11 || sub55 == sub22 || sub55 == sub33 || sub55 == sub44 || sub55 == sub66 || sub55 == sub77 || sub55 == sub88 || sub55 == sub99) {

                $('#sbj2-5').val("");
              jQuery('#sbj2-5').validationEngine('showPrompt', 'You Have Seleted ' + sub55 + ' Select Another', 'error', 'topRight',true);
            }
        }

    });




    $('#sbj1-6').change(function () {
        var sub11 = $("#sbj1-1").find("option:selected").val();
        var sub22 = $("#sbj1-2").find("option:selected").val();
        var sub33 = $("#sbj1-3").find("option:selected").val();
        var sub44 = $("#sbj1-4").find("option:selected").val();
        var sub55 = $("#sbj1-5").find("option:selected").val();
        var sub66 = $("#sbj1-6").find("option:selected").val();
        var sub77 = $("#sbj1-7").find("option:selected").val();
        var sub88 = $("#sbj1-8").find("option:selected").val();
        var sub99 = $("#sbj1-9").find("option:selected").val();
        if (sub66 !== "") {
            if (sub66 == sub11 || sub66 == sub22 || sub66 == sub33 || sub66 == sub44 || sub66 == sub55 || sub66 == sub77 || sub66 == sub88 || sub66 == sub99) {

                $('#sbj1-6').val("");
 jQuery('#sbj1-6').validationEngine('showPrompt', 'You Have Seleted ' + sub66 + ' Select Another', 'error', 'topRight',true);
            }
        }  

    });




    $('#sbj2-6').change(function () {
        var sub11 = $("#sbj2-1").find("option:selected").val();
        var sub22 = $("#sbj2-2").find("option:selected").val();
        var sub33 = $("#sbj2-3").find("option:selected").val();
        var sub44 = $("#sbj2-4").find("option:selected").val();
        var sub55 = $("#sbj2-5").find("option:selected").val();
        var sub66 = $("#sbj2-6").find("option:selected").val();
        var sub77 = $("#sbj2-7").find("option:selected").val();
        var sub88 = $("#sbj2-8").find("option:selected").val();
        var sub99 = $("#sbj2-9").find("option:selected").val();
        if (sub66 !== "") {
            if (sub66 == sub11 || sub66 == sub22 || sub66 == sub33 || sub66 == sub44 || sub66 == sub55 || sub66 == sub77 || sub66 == sub88 || sub66 == sub99) {

                $('#sbj2-6').val("");
 jQuery('#sbj2-6').validationEngine('showPrompt', 'You Have Seleted ' + sub66 + ' Select Another', 'error', 'topRight',true);
            }
        }  

    });


    $('#sbj1-7').change(function () {
        var sub11 = $("#sbj1-1").find("option:selected").val();
        var sub22 = $("#sbj1-2").find("option:selected").val();
        var sub33 = $("#sbj1-3").find("option:selected").val();
        var sub44 = $("#sbj1-4").find("option:selected").val();
        var sub55 = $("#sbj1-5").find("option:selected").val();
        var sub66 = $("#sbj1-6").find("option:selected").val();
        var sub77 = $("#sbj1-7").find("option:selected").val();
        var sub88 = $("#sbj1-8").find("option:selected").val();
        var sub99 = $("#sbj1-9").find("option:selected").val();
        if (sub77 !== "") {
            if (sub77 == sub11 || sub77 == sub22 || sub77 == sub33 || sub77 == sub44 || sub77 == sub55 || sub77 == sub66 || sub77 == sub88 || sub77 == sub99) {

                $('#sbj1-7').val("");
                jQuery('#sbj1-7').validationEngine('showPrompt', 'You Have Seleted ' + sub77+ ' Select Another', 'error', 'topRight',true);
            }
        }  

    });


    $('#sbj2-7').change(function () {
        var sub11 = $("#sbj2-1").find("option:selected").val();
        var sub22 = $("#sbj2-2").find("option:selected").val();
        var sub33 = $("#sbj2-3").find("option:selected").val();
        var sub44 = $("#sbj2-4").find("option:selected").val();
        var sub55 = $("#sbj2-5").find("option:selected").val();
        var sub66 = $("#sbj2-6").find("option:selected").val();
        var sub77 = $("#sbj2-7").find("option:selected").val();
        var sub88 = $("#sbj2-8").find("option:selected").val();
        var sub99 = $("#sbj2-9").find("option:selected").val();
        if (sub77 !== "") {
            if (sub77 == sub11 || sub77 == sub22 || sub77 == sub33 || sub77 == sub44 || sub77 == sub55 || sub77 == sub66 || sub77 == sub88 || sub77 == sub99) {

                $('#sbj2-7').val("");
                jQuery('#sbj2-7').validationEngine('showPrompt', 'You Have Seleted ' + sub77+ ' Select Another', 'error', 'topRight',true);
            }
        }  

    });


    $('#sbj1-8').change(function () {
        var sub11 = $("#sbj1-1").find("option:selected").val();
        var sub22 = $("#sbj1-2").find("option:selected").val();
        var sub33 = $("#sbj1-3").find("option:selected").val();
        var sub44 = $("#sbj1-4").find("option:selected").val();
        var sub55 = $("#sbj1-5").find("option:selected").val();
        var sub66 = $("#sbj1-6").find("option:selected").val();
        var sub77 = $("#sbj1-7").find("option:selected").val();
        var sub88 = $("#sbj1-8").find("option:selected").val();
        var sub99 = $("#sbj1-9").find("option:selected").val();
        if (sub88 !== "") {
            if (sub88 == sub11 || sub88 == sub22 || sub88 == sub33 || sub88 == sub44 || sub88 == sub55 || sub88 == sub66 || sub88 == sub77 || sub88 == sub99) {
              
                $('#sbj1-8').val("");
  jQuery('#sbj1-8').validationEngine('showPrompt', 'You Have Seleted ' + sub88 + ' Select Another', 'error', 'topRight',true);
            }
        }  

    });

    $('#sbj1-9').change(function () {
        var sub11 = $("#sbj1-1").find("option:selected").val();
        var sub22 = $("#sbj1-2").find("option:selected").val();
        var sub33 = $("#sbj1-3").find("option:selected").val();
        var sub44 = $("#sbj1-4").find("option:selected").val();
        var sub55 = $("#sbj1-5").find("option:selected").val();
        var sub66 = $("#sbj1-6").find("option:selected").val();
        var sub77 = $("#sbj1-7").find("option:selected").val();
        var sub88 = $("#sbj1-8").find("option:selected").val();
        var sub99 = $("#sbj1-9").find("option:selected").val();
        if (sub99 !== "") {
            if (sub99 == sub11 || sub99 == sub22 || sub99 == sub33 || sub99 == sub44 || sub99 == sub55 || sub99 == sub66 || sub99 == sub77 || sub99 == sub88) {

                $('#sbj1-9').val("");
              jQuery('#sbj1-9').validationEngine('showPrompt', 'You Have Seleted ' + sub99 + ' Select Another', 'error', 'topRight',true);
            }
        }  
    });

    
    $('#sbj2-8').change(function () {
        var sub11 = $("#sbj2-1").find("option:selected").val();
        var sub22 = $("#sbj2-2").find("option:selected").val();
        var sub33 = $("#sbj2-3").find("option:selected").val();
        var sub44 = $("#sbj2-4").find("option:selected").val();
        var sub55 = $("#sbj2-5").find("option:selected").val();
        var sub66 = $("#sbj2-6").find("option:selected").val();
        var sub77 = $("#sbj2-7").find("option:selected").val();
        var sub88 = $("#sbj2-8").find("option:selected").val();
        var sub99 = $("#sbj2-9").find("option:selected").val();
        if (sub88 !== "") {
            if (sub88 == sub11 || sub88 == sub22 || sub88 == sub33 || sub88 == sub44 || sub88 == sub55 || sub88 == sub66 || sub88 == sub77 || sub88 == sub99) {

                $('#sbj2-8').val("");
                jQuery('#sbj2-8').validationEngine('showPrompt', 'You Have Seleted ' + sub88+ ' Select Another', 'error', 'topRight',true);
            }
        }  

    });

    
    
    $('#sbj2-9').change(function () {
        var sub111 = $("#sbj2-1").find("option:selected").val();
        var sub22 = $("#sbj2-2").find("option:selected").val();
        var sub33 = $("#sbj2-3").find("option:selected").val();
        var sub44 = $("#sbj2-4").find("option:selected").val();
        var sub55 = $("#sbj2-5").find("option:selected").val();
        var sub66 = $("#sbj2-6").find("option:selected").val();
        var sub77 = $("#sbj2-7").find("option:selected").val();
        var sub88 = $("#sbj2-8").find("option:selected").val();
        var sub99 = $("#sbj2-9").find("option:selected").val();
        if (sub99 !== "") {
            if (sub99 == sub111 || sub99 == sub22 || sub99 == sub33 || sub99 == sub44 || sub99 == sub55 || sub99 == sub66 || sub99 == sub77 || sub99 == sub88) {

                $('#sbj2-9').val("");
                jQuery('#sbj2-9').validationEngine('showPrompt', 'You Have Seleted ' + sub99+ ' Select Another', 'error', 'topRight',true);
            }
        }  

    });
    
    $("#school2,#to2,#from2,#qualification2").live("focusout keyup focusin", function () {
        var school2 = $("#school2").val();
        var to2 = $("#to2").val();
        var from2 = $("#from2").val();
        var qualification2 = $("#qualification2").val();
        if (school2.length != '' || to2.length != '' || from2.length != '' || qualification2.length != '') {
            $("#from2").addClass("validate[required]   ");
            $("#to2").addClass("validate[required]   ");
            $("#school2").addClass("validate[required]   ");
            $("#qualification2").addClass("validate[required]   ");
        } else {
            $("#from2").removeClass("validate[required]   ");
            $("#to2").removeClass("validate[required]   ");
            $("#school2").removeClass("validate[required]   ");
            $("#qualification2").removeClass("validate[required]   ");
            $('#from2').validationEngine('hide');
            $('#to2').validationEngine('hide');
            $('#school2').validationEngine('hide');
            $('#qualification2').validationEngine('hide');
            return false;
        }
    });


    $("#sbj2-9,#grade2-9").live("focusout keyup focusin", function () {


        var sbj29 = $("#sbj2-9").val();
        var grade29 = $("#grade2-9").val();

        if (sbj29.length != '' || grade29.length != '') {

            $("#sbj2-9").addClass("validate[required]   ");
            $("#grade2-9").addClass("validate[required]   ");
             $("#examtype2").addClass("validate[required]   ");
            $("#examnumber2").addClass("validate[required]   ");
            $("#examfrommonth2").addClass("validate[required]   ");
            $("#examtomonth2").addClass("validate[required]   ");
            $("#examfromyear2").addClass("validate[required]   ");
            $("#sbj2-1").addClass("validate[required]   ");
            $("#grade2-1").addClass("validate[required]   ");
            $("#sbj2-2").addClass("validate[required]   ");
            $("#grade2-2").addClass("validate[required]   ");
            $("#sbj2-3").addClass("validate[required]   ");
            $("#grade2-3").addClass("validate[required]   ");
            $("#sbj2-4").addClass("validate[required]   ");
            $("#grade2-4").addClass("validate[required]   ");
            $("#sbj2-5").addClass("validate[required]   ");
            $("#grade2-5").addClass("validate[required]   ");
        } else {
            $("#sbj2-9").removeClass("validate[required]   ");
            $("#grade2-9").removeClass("validate[required]   ");


            $('#sbj2-9').validationEngine('hide');
            $('#grade2-9').validationEngine('hide');
            return false;
        }
    });

    $("#sbj2-8,#grade2-8").live("focusout keyup focusin", function () {


        var sbj28 = $("#sbj2-8").val();
        var grade28 = $("#grade2-8").val();

        if (sbj28.length != '' || grade28.length != '') {

            $("#sbj2-8").addClass("validate[required]   ");
            $("#grade2-8").addClass("validate[required]   ");
                         $("#examtype2").addClass("validate[required]   ");
            $("#examnumber2").addClass("validate[required]   ");
            $("#examfrommonth2").addClass("validate[required]   ");
            $("#examtomonth2").addClass("validate[required]   ");
            $("#examfromyear2").addClass("validate[required]   ");
            $("#sbj2-1").addClass("validate[required]   ");
            $("#grade2-1").addClass("validate[required]   ");
            $("#sbj2-2").addClass("validate[required]   ");
            $("#grade2-2").addClass("validate[required]   ");
            $("#sbj2-3").addClass("validate[required]   ");
            $("#grade2-3").addClass("validate[required]   ");
            $("#sbj2-4").addClass("validate[required]   ");
            $("#grade2-4").addClass("validate[required]   ");
            $("#sbj2-5").addClass("validate[required]   ");
            $("#grade2-5").addClass("validate[required]   ");
        } else {
            $("#sbj2-8").removeClass("validate[required]   ");
            $("#grade2-8").removeClass("validate[required]   ");


            $('#sbj2-8').validationEngine('hide');
            $('#grade2-8').validationEngine('hide');
            return false;
        }
    });
    $("#sbj2-7,#grade2-7").live("focusout keyup focusin", function () {


        var sbj27 = $("#sbj2-7").val();
        var grade27 = $("#grade2-7").val();

        if (sbj27.length != '' || grade27.length != '') {

            $("#sbj2-7").addClass("validate[required]   ");
            $("#grade2-7").addClass("validate[required]   ");
                        $("#examtype2").addClass("validate[required]   ");
            $("#examnumber2").addClass("validate[required]   ");
            $("#examfrommonth2").addClass("validate[required]   ");
            $("#examtomonth2").addClass("validate[required]   ");
            $("#examfromyear2").addClass("validate[required]   ");
            $("#sbj2-1").addClass("validate[required]   ");
            $("#grade2-1").addClass("validate[required]   ");
            $("#sbj2-2").addClass("validate[required]   ");
            $("#grade2-2").addClass("validate[required]   ");
            $("#sbj2-3").addClass("validate[required]   ");
            $("#grade2-3").addClass("validate[required]   ");
            $("#sbj2-4").addClass("validate[required]   ");
            $("#grade2-4").addClass("validate[required]   ");
            $("#sbj2-5").addClass("validate[required]   ");
            $("#grade2-5").addClass("validate[required]   ");
        } else {
            $("#sbj2-7").removeClass("validate[required]   ");
            $("#grade2-7").removeClass("validate[required]   ");


            $('#sbj2-7').validationEngine('hide');
            $('#grade2-7').validationEngine('hide');
            return false;
        }
    });

    $("#sbj2-6,#grade2-6").live("focusout keyup focusin", function () {


        var sbj26 = $("#sbj2-6").val();
        var grade26 = $("#grade2-6").val();

        if (sbj26.length != '' || grade26.length != '') {

            $("#sbj2-6").addClass("validate[required]   ");
            $("#grade2-6").addClass("validate[required]   ");
                        $("#examtype2").addClass("validate[required]   ");
            $("#examnumber2").addClass("validate[required]   ");
            $("#examfrommonth2").addClass("validate[required]   ");
            $("#examtomonth2").addClass("validate[required]   ");
            $("#examfromyear2").addClass("validate[required]   ");
            $("#sbj2-1").addClass("validate[required]   ");
            $("#grade2-1").addClass("validate[required]   ");
            $("#sbj2-2").addClass("validate[required]   ");
            $("#grade2-2").addClass("validate[required]   ");
            $("#sbj2-3").addClass("validate[required]   ");
            $("#grade2-3").addClass("validate[required]   ");
            $("#sbj2-4").addClass("validate[required]   ");
            $("#grade2-4").addClass("validate[required]   ");
            $("#sbj2-5").addClass("validate[required]   ");
            $("#grade2-5").addClass("validate[required]   ");
        } else {
            $("#sbj2-6").removeClass("validate[required]   ");
            $("#grade2-6").removeClass("validate[required]   ");


            $('#sbj2-6').validationEngine('hide');
            $('#grade2-6').validationEngine('hide');
            return false;
        }
    });

    $("#sbj1-9,#grade1-9").live("focusout keyup focusin", function () {

        var sbj19 = $("#sbj1-9").val();
        var grade19 = $("#grade1-9").val();



        if (grade19.length != '' || sbj19.length != '') {

            $("#sbj1-9").addClass("validate[required]   ");
            $("#grade1-9").addClass("validate[required]   ");
            
        } else {
            $("#sbj1-9").removeClass("validate[required]   ");
            $("#grade1-9").removeClass("validate[required]   ");


            $('#sbj1-9').validationEngine('hide');
            $('#grade1-9').validationEngine('hide');
            return false;
        }
    });

    $("#sbj1-8,#grade1-8").live("focusout keyup focusin", function () {

        var sbj18 = $("#sbj1-8").val();
        var grade18 = $("#grade1-8").val();



        if (grade18.length != '' || sbj18.length != '') {

            $("#sbj1-8").addClass("validate[required]");
            $("#grade1-8").addClass("validate[required]");
        } else {
            $("#sbj1-8").removeClass("validate[required]");
            $("#grade1-8").removeClass("validate[required]");


            $('#sbj1-8').validationEngine('hide');
            $('#grade1-8').validationEngine('hide');
            return false;
        }
    });
    $("#sbj1-7,#grade1-7").live("focusout keyup focusin", function () {

        var sbj17 = $("#sbj1-7").val();
        var grade17  = $("#grade1-7").val();



        if (grade17.length != '' || sbj17.length != '') {

            $("#sbj1-7").addClass("validate[required]");
            $("#grade1-7").addClass("validate[required]");
        } else {
            $("#sbj1-7").removeClass("validate[required]");
            $("#grade1-7").removeClass("validate[required]");


            $('#sbj1-7').validationEngine('hide');
            $('#grade1-7').validationEngine('hide');
            return false;
        }
    });

    $("#sbj1-6,#grade1-6").live("focusout keyup focusin", function () {

        var sbj16 = $("#sbj1-6").val();
        var grade16  = $("#grade1-6").val();



        if (grade16.length != '' || sbj16.length != '') {

            $("#sbj1-6").addClass("validate[required]");
            $("#grade1-6").addClass("validate[required]");
        } else {
            $("#sbj1-6").removeClass("validate[required]");
            $("#grade1-6").removeClass("validate[required]");


            $('#sbj1-6').validationEngine('hide');
            $('#grade1-6').validationEngine('hide');
            return false;
        }
    });


    $("#examtype2,#examnumber2,#examfrommonth2,#examtomonth2,#examfromyear2,#sbj2-1,#grade2-1,#sbj2-2,#grade2-2,#sbj2-3,#grade2-3,#sbj2-4,#grade2-4,#sbj2-5,#grade2-5,#sbj2-6,#grade2-6,#sbj2-6,#grade2-6,#sbj2-7,#grade2-7,#sbj2-8,#grade2-8,#sbj2-9,#grade2-9").live("focusout keyup", function () {

        var examtype2 = $("#examtype2").val();
        var examnumber2 = $("#examnumber2").val();
        var examfrommonth2 = $("#examfrommonth2").val();
        var examtomonth2 = $("#examtomonth2").val();
        var examfromyear2 = $("#examfromyear2").val();
        var sub1 = $("#sbj2-1").val();
        var grade1 = $("#grade2-1").val();
        var sub2 = $("#sbj2-2").val();
        var grade2 = $("#grade2-2").val();
        var sub3 = $("#sbj2-3").val();
        var grade3 = $("#grade2-3").val();
        var sub4 = $("#sbj2-4").val();
        var grade4 = $("#grade2-4").val();
        var sub5 = $("#sbj2-5").val();
        var grade5 = $("#grade2-5").val();
        var sub6 = $("#sbj2-6").val();
        var grade6 = $("#grade2-6").val();
        var sub7 = $("#sbj2-7").val();
        var grade7 = $("#grade2-7").val();
        var sub8 = $("#sbj2-8").val();
        var grade8 = $("#grade2-8").val();
        var sub9 = $("#sbj2-9").val();
        var grade9 = $("#grade2-9").val();
        if (examtype2.length != '' || examnumber2.length != '' || examfrommonth2.length != '' || examtomonth2.length != '' || examfromyear2.length != '' || sub1.length != '' || grade1.length != '' || sub2.length != '' || grade2.length != '' || sub3.length != '' || grade3.length != '' || sub4.length != '' || grade4.length != '' || sub5.length != '' || grade5.length != '' || sub6.length != '' || grade6.length != '' || grade7.length != '' || sub7.length != ''  || grade8.length != '' || sub8.length != ''  || grade9.length != '' || sub9.length != ''  ) {
            $("#examtype2").addClass("validate[required]   ");
            $("#examnumber2").addClass("validate[required]   ");
            $("#examfrommonth2").addClass("validate[required]   ");
            $("#examtomonth2").addClass("validate[required]   ");
            $("#examfromyear2").addClass("validate[required]   ");
            $("#sbj2-1").addClass("validate[required]   ");
            $("#grade2-1").addClass("validate[required]   ");
            $("#sbj2-2").addClass("validate[required]   ");
            $("#grade2-2").addClass("validate[required]   ");
            $("#sbj2-3").addClass("validate[required]   ");
            $("#grade2-3").addClass("validate[required]   ");
            $("#sbj2-4").addClass("validate[required]   ");
            $("#grade2-4").addClass("validate[required]   ");
            $("#sbj2-5").addClass("validate[required]   ");
            $("#grade2-5").addClass("validate[required]   ");
             
        } else {
            $("#examtype2").validationEngine('hide');
            $("#examnumber2").validationEngine('hide');
            $("#examfrommonth2").validationEngine('hide');
            $("#examtomonth2").validationEngine('hide');
            $("#examfromyear2").validationEngine('hide');
            $("#sbj2-1").validationEngine('hide');
            $("#grade2-1").validationEngine('hide');
            $("#sbj2-2").validationEngine('hide');
            $("#grade2-2").validationEngine('hide');
            $("#sbj2-3").validationEngine('hide');
            $("#grade2-3").validationEngine('hide');
            $("#sbj2-4").validationEngine('hide');
            $("#grade2-4").validationEngine('hide');
            $("#sbj2-5").validationEngine('hide');
            $("#grade2-5").validationEngine('hide');            
 
              
 
            $("#examtype2").removeClass("validate[required]   ");
            $("#examnumber2").removeClass("validate[required]   ");
            $("#examfrommonth2").removeClass("validate[required]   ");
            $("#examtomonth2").removeClass("validate[required]   ");
            $("#examfromyear2").removeClass("validate[required]   ");
            $("#sbj2-1").removeClass("validate[required]   ");
            $("#grade2-1").removeClass("validate[required]   ");
            $("#sbj2-2").removeClass("validate[required]   ");
            $("#grade2-2").removeClass("validate[required]   ");
            $("#sbj2-3").removeClass("validate[required]   ");
            $("#grade2-3").removeClass("validate[required]   ");
            $("#sbj2-4").removeClass("validate[required]   ");
            $("#grade2-4").removeClass("validate[required]   ");
            $("#sbj2-5").removeClass("validate[required]   ");
            $("#grade2-5").removeClass("validate[required]   ");


            return false;
        }
    });

    $("#school3,#to3,#from3,#qualification3").live("focusout keyup focusin", function () {
        var school3 = $("#school3").val();
        var to3 = $("#to3").val();
        var from3 = $("#from3").val();
        var qualification3 = $("#qualification3").val();
        if (school3.length != '' || to3.length != '' || from3.length != '' || qualification3.length != '') {
            $("#from3").addClass("validate[required]   ");
            $("#to3").addClass("validate[required]   ");
            $("#school3").addClass("validate[required]   ");
            $("#qualification3").addClass("validate[required]   ");
        } else {
            $("#from3").removeClass("validate[required]   ");
            $("#to3").removeClass("validate[required]   ");
            $("#school3").removeClass("validate[required]   ");
            $("#qualification3").removeClass("validate[required]   ");
            $('#from3').validationEngine('hide');
            $('#to3').validationEngine('hide');
            $('#school3').validationEngine('hide');
            $('#qualification3').validationEngine('hide');

            return false;
        }
    });

    $("#school4,#to4,#from4,#qualification4").live("focusout keyup focusin", function () {
        var school4 = $("#school4").val();
        var to4 = $("#to4").val();
        var from4 = $("#from4").val();
        var qualification4 = $("#qualification4").val();
        if (school4.length != '' || to4.length != '' || from4.length != '' || qualification4.length != '') {
            $("#from4").addClass("validate[required]   ");
            $("#to4").addClass("validate[required]   ");
            $("#school4").addClass("validate[required]   ");
            $("#qualification4").addClass("validate[required]   ");
        } else {
            $("#from4").removeClass("validate[required]   ");
            $("#to4").removeClass("validate[required]   ");
            $("#school4").removeClass("validate[required]   ");
            $("#qualification4").removeClass("validate[required]   ");
            $('#from4').validationEngine('hide');
            $('#to4').validationEngine('hide');
            $('#school').validationEngine('hide');
            $('#qualification4').validationEngine('hide');
            return false;
        }
    });


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

var center = ["Otukpo","Ugbokolo","Ugbokpo","Oju","Makurdi","Katsina-Ala","Nsukka",];
var centerp = '';
for (var i=0;i<center.length;i++){
   centerp += '<option value="'+ center[i] + '">' + center[i] + '</option>';
}
$('#center').append(centerp);
 
 
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
   
  
 $("#department1" ).on("change", function () {
 
 
   $("#loadn").css("visibility", "visible");
});

});


   

function load_options(id, index,where) {
 if(id!=""){

    $.ajax({
        url: "ajax.php?index=" + index + "&id=" + id,
        complete: function () {
            
 $("#crs").change();
        },
        success: function (data) {
            
            $("#loadg").css("visibility", "hidden");
            $("#loadn").css("visibility", "hidden");
            $("#" + where).html(data);
 $("#crs").change();
        }

    })

}
}