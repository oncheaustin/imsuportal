$(function() {
    $('#datetimepicker4').datetimepicker({
        viewMode: 'years',
        format: 'YYYY-MM-DD'
    });

    $('#datetimepicker').datetimepicker({
        viewMode: 'years',
        format: 'YYYY-MM-DD'
    });

    jQuery("#formID").validationEngine('attach', {
        onValidationComplete: function(form, status) {

            if (status == true) {

                var token = $("#token").val();
                $.post("upload", {

                        _token: token

                    },

                    function(data, status) {


                        $("#image").attr('src', data);
                        $("#loadi").hide();

                    });

                var date = $(":text[name='dp1']").attr('id');
                var lastname = $('#lastname').val();
                var fname = $('#firstname').val();
                var sex = $('#sex').find("option:selected").val();
                var state = $('#state').find("option:selected").text();
                var dp1 = $('#' + date).val();
                var examdate = $('#datetimepicker').val();
                var status = $('#status').val();
                var phone = $("#phone").val();
                var nationality = $("#nationality").val();
                var other = $("#other").val();
                var lga = $("#lga ").find("option:selected").text();
                var address = $("#address").val();
                var course1 = $("#course2").find("option:selected").text();
                var course2 = $("#crs").find("option:selected").text();
                var dep1 = $("#department1").find("option:selected").text();
                var dep2 = $("#department2").find("option:selected").text();
                var jambregno = $("#jambregno").val();
                var jamb1 = $("#jambs1").find("option:selected").text();
                var jamb2 = $("#jambs2").find("option:selected").text();
                var jamb3 = $("#jambs3").find("option:selected").text();
                var jamb4 = $("#jambs4").find("option:selected").text();
                var jambsc1 = $("#jambsc1").val();
                var jambsc2 = $("#jambsc2").val();
                var jambsc3 = $("#jambsc3").val();
                var jambsc4 = $("#jambsc4").val();

                var sitting = $("#sitting").find("option:selected").val();
                var examtype = $("#examtype").find("option:selected").val();
                var examnumber = $("#examnumber").val();
                var school22 = $("#school22").find("option:selected").text();
                var school11 = $("#school11").find("option:selected").text();
                var subj1 = $("#sbj1-1").find("option:selected");
                var subj2 = $("#sbj1-2").find("option:selected");
                var subj3 = $("#sbj1-3").find("option:selected");
                var subj4 = $("#sbj1-4").find("option:selected");
                var subj5 = $("#sbj1-5").find("option:selected");
                var subj6 = $("#sbj1-6").find("option:selected");
                var subj7 = $("#sbj1-7").find("option:selected");
                var subj8 = $("#sbj1-8").find("option:selected");
                var subj9 = $("#sbj1-9").find("option:selected");

                var grad1 = $("#grade1-1").find("option:selected");
                var grad2 = $("#grade1-2").find("option:selected");
                var grad3 = $("#grade1-3").find("option:selected");
                var grad4 = $("#grade1-4").find("option:selected");
                var grad5 = $("#grade1-5").find("option:selected");
                var grad6 = $("#grade1-6").find("option:selected");
                var grad7 = $("#grade1-7").find("option:selected");
                var grad8 = $("#grade1-8").find("option:selected");
                var grad9 = $("#grade1-9").find("option:selected");

                $('#olevelt tr:not(:first)').remove();
                var sublist = [];



                sublist[0] = [subj1.text(), grad1.val()];
                sublist[1] = [subj2.text(), grad2.val()];
                sublist[2] = [subj3.text(), grad3.val()];
                sublist[3] = [subj4.text(), grad4.val()];
                sublist[4] = [subj5.text(), grad5.val()];
                sublist[5] = [subj6.text(), grad6.val()];
                sublist[6] = [subj7.text(), grad7.val()];
                sublist[7] = [subj8.text(), grad8.val()];
                sublist[8] = [subj9.text(), grad9.val()];
                var n = 0;
                for (var t = 0; t < sublist.length; t++) {

                    n = t + 1;
                    if (sublist[t][0] !== "" && sublist[t][1]) {
                        $('#olevelt').append('<tr> <td>' + n + '</td><td>' + sublist[t][0] + '</td> <td>' + sublist[t][1] + '</td>  </tr>');
                    }
                }


                $("#first").text(fname);
                $("#last").text(lastname);
                $("#others").text(other);
                $("#stat").text(status);
                $("#dob").text(dp1);
                $("#gen").text(sex);
                $("#pho").text(phone);
                $("#nat").text(nationality);
                $("#ad").text(address);
                $("#lg").text(lga);
                $("#states").text(state);
                $("#gen").text(sex);
                $("#cs").text(course1);
                $("#cs2").text(course2);
                $("#depp").text(dep1);
                $("#depp2").text(dep2);
                $("#jambno").text(jambregno);
                $("#sch").text(school11);
                $("#jamb1").text(jamb1);
                $("#jamb2").text(jamb2);
                $("#jamb3").text(jamb3);
                $("#jamb4").text(jamb4);
                $("#score1").text(jambsc1);
                $("#score2").text(jambsc2);
                $("#score3").text(jambsc3);
                $("#score4").text(jambsc4);
                $("#sch2").text(school22);
                $("#examnumberv").text(examnumber);
                $("#examtypev").text(examtype);
                $("#examdatev").text(examdate);
                $("#sittingv").text(sitting);

                $("#myModal").modal('show');
            }

        }
    });




    $("#finish").click(function() {

        var date = $(":text[name='dp1']").attr('id');
        var sex = $('#sex').val();
        var state = $('#state').val();
        var dp1 = $('#' + date).val();
        var status = $('#status').val();
        var nationality = $("#nationality").val();
        var lga = $("#lga").val();
        var address = $("#address").val();
        var dip1 = $("select[name=department1]").attr('id');
        var dip2 = $("select[name=department2]").attr('id');
        var course1 = $("#crs option:selected").attr('id');
        var course2 = $("#course2 option:selected").attr('id');
        var department1 = $("#" + dip1).find("option:selected").val();
        var department2 = $("#" + dip2).find("option:selected").val();
        var school1 = $('#school11').find("option:selected").val();
        var school2 = $('#school22').find("option:selected").val();


        var jambregno = $("#jambregno").val();
        var jamb1 = $("#jambs1").find("option:selected").val();
        var jamb2 = $("#jambs2").find("option:selected").val();
        var jamb3 = $("#jambs3").find("option:selected").val();
        var jamb4 = $("#jambs4").find("option:selected").val();
        var jambsc1 = $("#jambsc1").val();
        var jambsc2 = $("#jambsc2").val();
        var jambsc3 = $("#jambsc3").val();
        var jambsc4 = $("#jambsc4").val();
        var sitting = $("#sitting").find("option:selected").val();
        var examtype = $("#examtype").find("option:selected").val();
        var examnumber = $("#examnumber").val();
        var token = $("#token").val();
        var subj1 = $("#sbj1-1").find("option:selected").val();
        var subj2 = $("#sbj1-2").find("option:selected").val();
        var subj3 = $("#sbj1-3").find("option:selected").val();
        var subj4 = $("#sbj1-4").find("option:selected").val();
        var subj5 = $("#sbj1-5").find("option:selected").val();
        var subj6 = $("#sbj1-6").find("option:selected").val();
        var subj7 = $("#sbj1-7").find("option:selected").val();
        var subj8 = $("#sbj1-8").find("option:selected").val();
        var subj9 = $("#sbj1-9").find("option:selected").val();
        var examdate = $('#datetimepicker').val();
        var grad1 = $("#grade1-1").find("option:selected").val();
        var grad2 = $("#grade1-2").find("option:selected").val();
        var grad3 = $("#grade1-3").find("option:selected").val();
        var grad4 = $("#grade1-4").find("option:selected").val();
        var grad5 = $("#grade1-5").find("option:selected").val();
        var grad6 = $("#grade1-6").find("option:selected").val();
        var grad7 = $("#grade1-7").find("option:selected").val();
        var grad8 = $("#grade1-8").find("option:selected").val();
        var grad9 = $("#grade1-9").find("option:selected").val();

        $("#ntload").fadeIn(940);
        $("#noty").text();
        jQuery.post("process", {
            dob: dp1,
            _token: token,
            sex: sex,
            state: state,
            status: status,
            nationality: nationality,
            address: address,
            examnumber: examnumber,
            course1: course1,
            course2: course2,
            department1: department1,
            department2: department2,
            school11: school1,
            school22: school2,
            examdate: examdate,
            sub1: subj1,
            sub2: subj2,
            sub3: subj3,
            sub4: subj4,
            sub5: subj5,
            sub6: subj6,
            sub7: subj7,
            sub8: subj8,
            sub9: subj9,
            grade1: grad1,
            grade2: grad2,
            grade3: grad3,
            grade4: grad4,
            grade5: grad5,
            grade6: grad6,
            grade7: grad7,
            grade8: grad8,
            grade9: grad9,
            lga: lga,
            jambregno: jambregno,
            jamb1: jamb1,
            jamb2: jamb2,
            jamb3: jamb3,
            jamb4: jamb4,
            jambsc1: jambsc1,
            jambsc2: jambsc2,
            jambsc3: jambsc3,
            jambsc4: jambsc4,
            examtype: examtype,
            sitting: sitting,

        }, function(data, textStatus) {
            if (data == 1) {



                window.location = "print";
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

    $("#file").change(function() {



        var ext = $('#file').val().split('.').pop().toLowerCase();

        if ($.inArray(ext, ['jpg', 'jpeg']) == -1) {


            $('#warn').fadeOut("slow", function() {
                var div = $("<div id='warn' style='color:red;'   > Only JPEG,JPG Picture Fomart </div>").hide();
                $(this).replaceWith(div);
                $('#warn').fadeIn("slow");
                $('#file').val('');

            });

        }



        var iSize = ($("#file")[0].files[0].size / 1024);

        iSize = (Math.round(iSize * 100) / 100)


        if (iSize < 44.4) {

            $('#warn').fadeOut("slow", function() {
                var div = $("warn").hide();


            });
        } else {

            $('#warn').fadeOut("slow", function() {
                var div = $("<div id='warn' style='color:red;'   > Only Less Than 44.4 KB  Picture Size Is Allowed </div>").hide();
                $(this).replaceWith(div);
                $('#warn').fadeIn("slow");

            });

            return;
        }


    });

    $('#image_upload_form').submit(function(e) {
        e.preventDefault();

        $("#warn").hide('slow');

        if ($("#file").val() == "") {
            $('#warn').fadeOut("slow", function() {
                var div = $("<div id='warn' style='color:red; '   > Please Upload A Passport</div>").hide();
                $(this).replaceWith(div);
                $('#warn').fadeIn("slow");

            });
            e.preventDefault();
            e.preventDefault();
            e.preventDefault();

        }

        var iSize = ($("#file")[0].files[0].size / 1024);

        iSize = (Math.round(iSize * 100) / 100)


        if (iSize < 44.4) {

            $('div#ajax_upload_demo img').attr('src', 'public/images/loadings.gif');



            var fd = new FormData(document.getElementById("image_upload_form"));
            $.ajax({
                url: "upload",
                type: "POST",
                data: fd,
                processData: false, // tell jQuery not to process the data
                contentType: false // tell jQuery not to set contentType
            }).done(function(data) {
                console.log("PHP Output:");
                $('#warn').fadeOut("slow", function() {
                    var div = $(data).hide();
                    $(this).replaceWith(div);
                    $('#warn').fadeIn("slow");

                });
                check();

            });

            e.preventDefault();
        } else {
            $('#warn').fadeOut("slow", function() {
                var div = $("<div id='warn' style='color:red; '   > Only Less Than 44.4 KB  Picture Size Is Allowed </div>").hide();
                $(this).replaceWith(div);
                $('#warn').fadeIn("slow");

            });
            e.preventDefault();
            e.preventDefault();
            e.preventDefault();
            e.preventDefault();

        }
        e.preventDefault();


    });

    function check() {
        var token = $("#token").val();
        $.post("upload", {

                _token: token
            },
            function(data, status) {
                if (data != "") {
                    $("#sd").attr('src', data);
                    $("#nm").val(data);

                } else {
                    $("#sd").attr('src', "public/images/avatar_no.jpg");
                }

            });
    }

    $("#school2,#to2,#from2,#qualification2").live("focusout keyup focusin", function() {
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





    $("#school3,#to3,#from3,#qualification3").live("focusout keyup focusin", function() {
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

    $("#school4,#to4,#from4,#qualification4").live("focusout keyup focusin", function() {
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


    $("#school11").on("change", function() {
        var link = $(this).find("option:selected").val();
        cs2 = $("select[name=department1]").attr('id');
        if (link != "") {
            $("#" + cs2).addClass("validate[required]   ");

        }
        clear1 = $("select[name=course1]").attr('id');


        $.expr[':'].nonEmptyValue = function(obj) {
            return $(obj).val() != '';
        };

        $('#' + clear1 + ' option:nonEmptyValue').remove();

    });



    css2 = $("select[name=department1]").attr('id');
    $("#" + css2).on("change", function() {
        var link = $(this).find("option:selected").val();
        var title = $('#programme').find("option:selected").attr("title");
        var cs2 = $("select[name=course1]").attr('id');
        $('#' + cs2).validationEngine('hide');

        if (link != "") {

            $("#" + cs2).addClass("validate[required]   ");

        }
        clear1 = $("select[name=course1]").attr('id');




    });




    $("#to0,#frm0").on("change", function() {
        var from = $("#frm0").find("option:selected").val();
        var to = $("#to0").find("option:selected").val();
        if (from != "" && to != "") {
            if (from > to) {
                $('#to0').val("");
                jQuery('#to0').validationEngine('showPrompt', 'Invalide Date Range', 'error', 'topRight', true);

            }

        }



    });

    $("#to2,#from2").on("change", function() {
        var from = $("#from2").val();
        var to = $("#to2").val();
        if (from != "" && to != "") {
            if (from > to) {
                $('#to2').val("");
                jQuery('#to2').validationEngine('showPrompt', 'Invalide Date Range', 'error', 'topRight', true);

            }
        }
    });

    $("#to3,#from3").on("change", function() {
        var from = $("#from3").val();
        var to = $("#to3").val();
        if (from != "" && to != "") {
            if (from > to) {
                $('#to3').val("");
                jQuery('#to3').validationEngine('showPrompt', 'Invalide Date Range', 'error', 'topRight', true);

            }

        }

    });

    $("#to4,#from4").on("change", function() {
        var from = $("#from4").val();
        var to = $("#to4").val();
        if (from != "" && to != "") {
            if (from > to) {
                $('#to4').val("");
                jQuery('#to4').validationEngine('showPrompt', 'Invalide Date Range', 'error', 'topRight', true);

            }

        }

    });



    var scorelt = ["A1", "B2", "B3", "C4", "C5", "C6", "D7", "E8", "F9", "A/R", "DISTINCTION", "OUTSTANDING", "CREDIT", "PASS", "PENDING", "ABSENT", "A", "B", "C", "D", "E", "F"];
    var scorep = '';
    for (var i = 0; i < scorelt.length; i++) {
        scorep += '<option value="' + scorelt[i] + '">' + scorelt[i] + '</option>';
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

    var mth = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    var mthp = '';
    for (var i = 0; i < mth.length; i++) {
        mthp += '<option value="' + mth[i] + '">' + mth[i] + '</option>';
    }
    $('#examfrommonth1').append(mthp);
    $('#examtomonth1').append(mthp);

    var tdate = new Date();
    yyyy = tdate.getFullYear();

    var yrp = '';
    for (var i = 1956; i < yyyy; i++) {
        yrp += '<option value="' + i + '">' + i + '</option>';
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

$(document).ready(function() {

    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;

        if (input.length) {
            input.val(log);
        } else {
            if (log) alert(log);
        }

    });
    $("#school11").on("change", function() {

        $('#department1 option:nonEmptyValue').remove();
        $('#crs option:nonEmptyValue').remove();
        $("#loadg").css("visibility", "visible");
    });


    $("#crs,#school11,#course2,#school22").on("change", function() {
        var course1 = $("#crs option:selected").val();
        var course2 = $("#course2 option:selected").val();
        if (course1 != "" || course2 != "") {

            if (course1 == "ND" || course2 == "ND") {
                $("#jamb").fadeIn(940);
            } else {
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
        } else {
            $("#jamb").fadeOut(940);
            $("#jambregno").validationEngine('hide');
            $("#jambscore").validationEngine('hide');
            $("#hnd").fadeOut(940);
            $("#chnd").validationEngine('hide');
        }
    });
    $("#department1").on("change", function() {


        $("#loadn").css("visibility", "visible");
    });

    $("#department2").on("change", function() {

        $("#loadn2").css("visibility", "visible");
    });

    $("#school22").on("change", function() {

        $('#department2').find('option[value!=""]').remove();
        $('#course2').find('option[value!=""]').remove();

        $("#loadg2").css("visibility", "visible");

    });

});

function load_state(index) {

    $.ajax({
        url: "lga/" + index,
        complete: function() {

            $("#lga").change();
        },
        success: function(data) {
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
function load_options(id, index, name) {


    $.ajax({
        url: "study/" + name + "/" + id,
        complete: function() {

            $("#crs").change();
        },
        success: function(data) {

            if (index == "department2") $("#loadg2").css("visibility", "hidden");
            else $("#loadg").css("visibility", "hidden");
            if (index == "course2") $("#loadn2").css("visibility", "hidden");
            else $("#loadn").css("visibility", "hidden");
            $("#" + index).html(data);
            $("#crs").change();
        }

    })


}