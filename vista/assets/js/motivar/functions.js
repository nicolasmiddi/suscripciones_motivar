$(document).ready(function(){
  window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                }, 4000);


    //Toolbar extra buttons
    var btnFinish = $('<button></button>').text('Finalizar')
                                     // .addClass('btn btn-info')
      .addClass('btn btn-finish')
      .hide()
      .on('click', function(){
             if( !$(this).hasClass('disabled')){
                 var elmForm = $("#myForm");
                 if(elmForm){
                     elmForm.validator('validate');
                     var elmErr = elmForm.find('.has-error');
                     if(elmErr && elmErr.length > 0){
                         $('#smartwizard').append('<div class="alert-motivar alert alert-warning alert-dismissible fade show" role="alert">Hubo un error enviando el formulario. Por favor, revise los campos<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                         return false;
                     }else{
                          // console.log ( elmForm.serialize() );
                         var new_entry = "vista/modulos/ajax/suscripciones.php";
                            a = 'formulario';
                            b = elmForm.serialize();
                            datos = new FormData();
                            datos.append("formulario", a);
                            datos.append("datos", b);

                         $.ajax({
                                url:"vista/modulos/ajax/suscripciones.php",
                                method:"POST",
                                data: datos,
                                cache: false,
                                contentType: false,
                                processData: false,
                             }).done(function(data){
                                    // show the response
                         $('#smartwizard').append('<div class="alert-motivar alert alert-success alert-dismissible fade show" role="alert">Formulario Enviado con éxito. Gracias por registrarse.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                                      console.log(data);
                                      // $('#myModal').modal('toggle');
                             }).fail(function(data){
                         $('#smartwizard').append('<div class="alert-motivar alert alert-danger alert-dismissible fade show" role="alert">Hubo un error enviando el formulario. Por favor, vuelva a intentar más tarde<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                             });

                         // alert('Great! we are ready to submit form');
                         return false;
                     }
                 }
             }
                                        });
    var btnCancel = $('<button></button>').text('Cancel')
                                     .addClass('btn btn-danger')
                                     .on('click', function(){
                                            $('#smartwizard').smartWizard("reset");
                                            $('#myForm').find("input, textarea").val("");
                                        });

    // Smart Wizard
    $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'arrows',
            transitionEffect:'fade',
             toolbarSettings: {
                        toolbarPosition: 'bottom',
                        toolbarExtraButtons: [btnFinish]
                            },                    
            anchorSettings: {
                        markDoneStep: true, // add done css
                        markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                        removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                        enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                    },
            lang: {  // Language variables
                next: 'Siguiente', 
                previous: 'Anterior',
                finish: 'Finalizar'
            }

         });

    $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
        var moti_impreso = $("#moti_ed_impreso")[0].checked;
        var moti_digital = $("#moti_ed_digital")[0].checked;
        var dosm_impreso = $("#dosm_ed_impreso")[0].checked;
        var dosm_digital = $("#dosm_ed_digital")[0].checked;
        
        if (stepNumber == 0  && moti_impreso == false && moti_digital == false && dosm_digital == false && dosm_impreso == false){
            // $("#step-0").css("display","block");
            $("#step-0").removeClass("hide");
            return false;
        }else{
            $("#step-0").addClass("hide");
        }

        var elmForm = $("#form-step-" + stepNumber);
        // stepDirection === 'forward' :- this condition allows to do the form validation
        // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
        if(stepDirection === 'forward' && elmForm){
            elmForm.validator('validate');
            // var elmErr = elmForm.children('.has-error');
            var elmErr = elmForm.find('.has-error');
            if(elmErr && elmErr.length > 0){
                // Form validation failed
                return false;
            }
        }
        return true;
    });

    $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
        
        var moti_impreso = $("#moti_ed_impreso")[0].checked;
        var dosm_impreso = $("#dosm_ed_impreso")[0].checked;
        if (stepNumber == 1 && (moti_impreso == true || dosm_impreso == true) ){
            // $('#domicilio').find('input').prop('required',true);
            $('#calle').prop('required',true);
            $('#numero').prop('required',true);
            $('#cod_postal').prop('required',true);
            $('#provincia').prop('required',true);
            $('#localidad').prop('required',true);

        }else if (stepNumber == 1 && moti_impreso == false && dosm_impreso == false ){
            // $('#domicilio').find('input').prop('required',false);
            $('#calle').prop('required',false);
            $('#numero').prop('required',false);
            $('#cod_postal').prop('required',false);
            $('#provincia').prop('required',false);
            $('#localidad').prop('required',false);
            
        }

        // Enable finish button only on last step
        if(stepNumber == 3){
            // $('.btn-finish').removeClass('disabled');
            $('.btn-finish').show();
        }else{
            // $('.btn-finish').addClass('disabled');
            $('.btn-finish').hide();
        }
    });
   
///////////////////////////////////////////////////////
                        // PASO 1 //
///////////////////////////////////////////////////////

   $('#moti_ed_impreso').change(function(){
        $('#img-moti-impreso').toggleClass('img-grayscale');
   });

   $('#moti_ed_digital').change(function(){
        $('#img-moti-digital').toggleClass('img-grayscale');
   });

  $('#dosm_ed_impreso').change(function(){
        $('#img-dosm-impreso').toggleClass('img-grayscale');
   });

    $('#dosm_ed_digital').change(function(){
        $('#img-dosm-digital').toggleClass('img-grayscale');
   });

///////////////////////////////////////////////////////
                        // PASO 2 //
///////////////////////////////////////////////////////
   
// DIRECCION
fill_pais(); 

if ($('#provincia').val() != ''){
        fill_provincias();
}

if ($('#localidad').val() != ''){
     a = $('#provincia').val();
        fill_localidad(a);
}

  $("#pais").change(function(){
    var id = $(this).val();

    $('#provincia').val('');
    $('#cod_postal').val('');
    $('#localidad').val('');
    if (id != '9'){ 
        $('#provincia').attr('disabled',true);
        $('#cod_postal').attr('disabled',true);
        $('#localidad').attr('disabled',true);
        $('#localidad').parent('div').removeClass('has-error');
        $('#localidad').parent('div').removeClass('has-danger');
        $('#localidad').siblings('div').addClass('has-error-hidden');
        $('#provincia').parent('div').removeClass('has-error');
        $('#provincia').parent('div').removeClass('has-danger');
        $('#provincia').siblings('div').addClass('has-error-hidden');

    } else {
        fill_provincias();
        $('#provincia').attr('disabled',false);
        $('#cod_postal').attr('disabled',false);
        $('#localidad').attr('disabled',false);
        $('#localidad').siblings('div').removeClass('has-error-hidden');
        $('#provincia').siblings('div').removeClass('has-error-hidden');

    }

  });


  $("#provincia").change(function(){
    var id = $(this).val();
    $('#cod_postal').val('');
    $('#localidad').val('');
    $('#localidad').empty();
    if (id != '4'){ 
        fill_localidad(id);
        $('#localidad').children().empty();
        $('#localidad').attr('disabled', false);
        $('#localidad').attr('required', true);
        $('#localidad').siblings('div').removeClass('has-error-hidden');
    } else {
        $('#localidad').val('');
        $('#localidad').attr('disabled', true);
        $('#localidad').attr('required', false);
        $('#localidad').parent('div').removeClass('has-error');
        $('#localidad').parent('div').removeClass('has-danger');
        $('#localidad').siblings('div').addClass('has-error-hidden');

    }
  });




    $("#localidad").change(function(){
        var opti = $(this).children('option:selected').attr('id');

        $('#cod_postal').val(opti);

    });
////////////////

if ($("#chk-profesional").prop("checked")){
             fill_profesiones();
}
if ($("#chk-estudiante").prop("checked")){
            fill_instituciones();
            fill_carreras();
}

    $("#tipo-prof-otro").hide();
    $("#chk-profesional").change(function() {
        if(this.checked) {
            $('#profesion').prop('disabled',false);
             fill_profesiones()
        }else{
            $('#profesion').prop('disabled',true);
            $('#profesion').empty();

        }            

    });
    $("#profesion").change(function(){
        if(this.value == "Otro"){
            $("#tipo-prof-otro").show();
        }else{
            $("#tipo-prof-otro").hide();
        };

    });


    $("#chk-estudiante").change(function() {
        if(this.checked) {
            $('#institucion').prop('disabled',false);
            $('#carrera').prop('disabled',false);
            fill_instituciones();
            fill_carreras();
        }else{
            $('#institucion').prop('disabled',true);
            $('#carrera').prop('disabled',true);
            $('#institucion').empty();
            $('#carrera').empty();

        }
     });

// TIPO EMPRESA    
$('.detalle-institucion').hide();
$('.detalle-empresa').hide();


if ($("#opc_empresa").prop("checked")){
            a = $("#opc_empresa").parents().siblings().children('.area');
            fill_area(a);
            b = $("#opc_empresa").parents().siblings().children('.cargo');
            fill_cargo(b);
}
if ($("#opc_institucion").prop("checked")){
            a = $('#opc_institucion').parents().siblings().children('.area');
            fill_area(a);
            b = $('#opc_institucion').parents().siblings().children('.cargo');
            fill_cargo(b);
}


$('input[type=radio][name=edit_tipo_empresa]').change(function() {
        if (this.value=='1'){
            $('.area').empty();
            $('.cargo').empty();
            a = $(this).parents().siblings().children('.area');
            fill_area(a);
            b = $(this).parents().siblings().children('.cargo');
            fill_cargo(b);
        }else if (this.value=='2'){
            $('.area').empty();
            $('.cargo').empty();
            a = $(this).parents().siblings().children('.area');
            fill_area(a);
            b = $(this).parents().siblings().children('.cargo');
            fill_cargo(b);
        }else if (this.value=='3'){
        };
});

$('input[type=radio][name=tipo_empresa]').change(function() {
        if (this.value=='1'){
            $('.detalle-institucion').slideUp();
            $('.detalle-empresa').slideDown();
            $('.area').empty();
            $('.cargo').empty();
            a = $(this).siblings().find('.area');
            fill_area(a);
            b = $(this).siblings().find('.cargo');
            fill_cargo(b);

        }else if (this.value=='2'){
            $('.detalle-institucion').slideDown();
            $('.detalle-empresa').slideUp();
            $('.area').empty();
            $('.cargo').empty();
            a = $(this).siblings().find('.area');
            fill_area(a);
            b = $(this).siblings().find('.cargo');
            fill_cargo(b);
        }else if (this.value=='3'){
            $('.detalle-empresa').slideUp();
            $('.detalle-institucion').slideUp();
            $('.area').empty();
            $('.cargo').empty();
        };
});

$('#area-empresa-otro').hide();
$('#area-empresa').change(function(){
    if(this.value=='Otra'){
    $('#area-empresa-otro').show();
    }else{
        $('#area-empresa-otro').hide();
    };
});

$('#cargo-empresa-otro').hide();
$('#cargo-empresa').change(function(){
    if(this.value=='Otro'){
    $('#cargo-empresa-otro').show();
    }else{
        $('#cargo-empresa-otro').hide();
    };
});

$('#area-institucion-otro').hide();
$('#area-institucion').change(function(){
    if(this.value=='Otra'){
    $('#area-institucion-otro').show();
    }else{
        $('#area-institucion-otro').hide();
    };
});

$('#cargo-institucion-otro').hide();
$('#cargo-institucion').change(function(){
    if(this.value=='Otro'){
    $('#cargo-institucion-otro').show();
    }else{
        $('#cargo-institucion-otro').hide();
    };
});

///////////////////////////////////////////////////////
                        // PASO 3 //
///////////////////////////////////////////////////////
fill_intereses();
fill_grandes_animales()
fill_actlaboral()

    $("body").on("change", "input[type=radio][name=act-laboral]", function (event) {
            $("input[type=radio][name=act-laboral]").siblings('div').slideUp('slow');
            //$("input[type=radio][name=subact-laboral]").siblings('div').slideUp('slow');
            $(this).siblings('div').slideDown('slow');
             $('input[type=radio][name=subact-laboral]').each(function(){
                      $(this).prop("checked", false);
                });   
         }); 

    $("body").on("change", "input[type=radio][name=edit-act-laboral]", function (event) {
             $('input[type=radio][name=edit-subact-laboral]').each(function(){
                      $(this).prop("checked", false);
                });   
         }); 
    $("body").on("change", "input[type=radio][name=edit-subact-laboral]", function (event) {
             $('input[type=radio][name=edit-act-laboral]').each(function(){
                      $(this).prop("checked", false);
                });   
             $(this).parents().parents().siblings('.form-check-input').prop("checked", true);

         }); 


    $('#grandes_animales').hide();
    $('input[type=radio][name=tipo-animal]').change(function() {
    if (this.value == '1') {
        $('#grandes_animales').slideDown('slow');
    }else{
        $('#grandes_animales').slideUp('slow');
    };
        
    });

    $('input[type=radio][name=tipo_empresa]').change(function(){
        if(this.value=='independiente'){
            $('#area').prop('disabled',true);
            $('#cargo').prop('disabled',true);
        }else{
            $('#area').prop('disabled',false);
            $('#cargo').prop('disabled',false);
        }

    });

    $('#myModal').on('hidden.bs.modal', function (e) {
        $('#smartwizard').smartWizard("reset");
        $('#myForm').trigger("reset");
        $('#img-moti-impreso').addClass('img-grayscale');
        $('#img-moti-digital').addClass('img-grayscale');
        $('#img-dosm-impreso').addClass('img-grayscale');
        $('#img-dosm-digital').addClass('img-grayscale'); 
        
        return true;
    })
 

    function fill_pais(){
        var a = "paises",
            datos = new FormData();
            datos.append("pais", a);

          $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
                    $('#pais').append(respuesta);
            }
         });
    }

    function fill_provincias(){
        var a = "provincias",
            datos = new FormData();
            datos.append("provincias", a);
          $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
                    $('#provincia').append(respuesta);
            }
         });
    }

    function fill_localidad(id){
        var a = "localidades",
            datos = new FormData();
            datos.append("localidades", id);
          $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
                    $('#localidad').append(respuesta);
            }   
         });
    }
    function fill_profesiones(){
        var a = "profesiones",
            datos = new FormData();
            datos.append("profesiones", a);
          $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
                    $('#profesion').append(respuesta);
            }
         });
    }
    function fill_instituciones(){
        var a = "instituciones",
            datos = new FormData();
            datos.append("instituciones", a);
          $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
                    $('#institucion').append(respuesta);
            }
         });
    }
    function fill_carreras(){
        var a = "carreras",
            datos = new FormData();
            datos.append("carreras", a);
          $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
                    $('#carrera').append(respuesta);
            }
         });
    }

    function fill_area(b){
        var a = "area",
            datos = new FormData();
            datos.append("area", a);
          $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
                    $(b).append(respuesta);
            }
         });
    }

    function fill_cargo(b){
        var a = "cargo",
            datos = new FormData();
            datos.append("cargo", a);
          $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
                    $(b).append(respuesta);
            }
         });
    }
    function fill_intereses(){
        var a = "intereses",
            datos = new FormData();
            datos.append("intereses", a);
          $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
                    $('#intereses').append(respuesta);
            }
         });
    }    
        function fill_grandes_animales(){
       var a = "grandes_animales",
            datos = new FormData();
            datos.append("grandes_animales", a);
          $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
                    $('#grandes_animales').append(respuesta);
            }
         });
    }
        function fill_actlaboral(){
        var a = "actlaboral",
            datos = new FormData();
            datos.append("actlaboral", a);
          $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
                    $('#act-laboral').append(respuesta);
                    $('.actlaboral').hide();

            }
         });
    }

///////////////////////////////////////////////////////
                        // EDITAR  //
///////////////////////////////////////////////////////


  //  $("body").on("click", "#datos_personales", function (event) {
    $("body").on("click", "#btn-guardar", function (event) {
        var a = $("#id").val(),
            b = $("#nombre").val(),
            c = $("#apellido").val(),
            d = $("#dni").val(),
            e = $("#nacimiento").val(),
            f = $("#email").val(),
            g = $("#email2").val(),
            h = $("#telefono").val(),
            i = $("#telefono2").val(),
            datos = new FormData();
            datos.append("edit_datos_personales", a);
            datos.append("nombre", b);
            datos.append("apellido", c);
            datos.append("dni", d);
            datos.append("nacimiento", e);
            datos.append("email", f);
            datos.append("email2", g);
            datos.append("telefono", h);
            datos.append("telefono2", i);
          $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
          //  $('body').append('<div class="alert-motivar alert alert-success alert-dismissible fade show" role="alert">'+respuesta+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); 
            }
         }); 
        var a = $("#id").val(),
            b = $("#pais").val(),
            c = $("#provincia").val(),
            d = $("#localidad").val(),
            e = $("#cod_postal").val(),
            f = $("#calle").val(),
            g = $("#numero").val(),
            h = $("#piso").val(),
            datos = new FormData();
            datos.append("edit_datos_postales", a);
            datos.append("edit_pais", b);
            datos.append("edit_provincia", c);
            datos.append("edit_localidad", d);
            datos.append("edit_cod_postal", e);
            datos.append("edit_calle", f);
            datos.append("edit_numero", g);
            datos.append("edit_piso", h);
          $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
           //$('body').append('<div class="alert-motivar alert alert-success alert-dismissible fade show" role="alert">'+respuesta+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
         }); 
        var a = $("#id").val(),
            b = $("#moti_ed_impreso").prop("checked"),
            d = $("#moti_ed_digital").prop("checked"),
            e = $("#dosm_ed_impreso").prop("checked"),
            f = $("#dosm_ed_digital").prop("checked"),
            datos = new FormData();
            datos.append("edit_suscripciones", a);
            datos.append("edit_moti_ed_impreso", b);
            datos.append("edit_moti_ed_digital", d);
            datos.append("edit_dosm_ed_impreso", e);
            datos.append("edit_dosm_ed_digital", f);
          $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
            // $('body').append('<div class="alert-motivar alert alert-success alert-dismissible fade show" role="alert">'+respuesta+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
         }); 
        var a = $("#id").val(),
            elmForm = $("#laboral");
            b = elmForm.serialize();
            datos = new FormData();
            datos.append("datos_laborales", a);
            datos.append("datos", b);
          $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
           // $('body').append('<div class="alert-motivar alert alert-success alert-dismissible fade show" role="alert">'+respuesta+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
         }); 
        var a = $("#id").val(),
            elmForm = $("#otros");
            b = elmForm.serialize();
            datos = new FormData();
            datos.append("edit_otros", a);
            datos.append("datos", b);
            // console.log(b);
          $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
            $('body').append('<div class="alert-motivar alert alert-success alert-dismissible fade show" role="alert">'+respuesta+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
         }); 
    }); 
  
    $("body").on("click", "#btn-guardar_salir", function (event) {
        var a = $("#id").val(),
            b = $("#nombre").val(),
            c = $("#apellido").val(),
            d = $("#dni").val(),
            e = $("#nacimiento").val(),
            f = $("#email").val(),
            g = $("#email2").val(),
            h = $("#telefono").val(),
            i = $("#telefono2").val(),
            datos = new FormData();
            datos.append("edit_datos_personales", a);
            datos.append("nombre", b);
            datos.append("apellido", c);
            datos.append("dni", d);
            datos.append("nacimiento", e);
            datos.append("email", f);
            datos.append("email2", g);
            datos.append("telefono", h);
            datos.append("telefono2", i);
          $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
          //  $('body').append('<div class="alert-motivar alert alert-success alert-dismissible fade show" role="alert">'+respuesta+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
              
            }
         }); 
        var a = $("#id").val(),
            b = $("#pais").val(),
            c = $("#provincia").val(),
            d = $("#localidad").val(),
            e = $("#cod_postal").val(),
            f = $("#calle").val(),
            g = $("#numero").val(),
            h = $("#piso").val(),
            datos = new FormData();
            datos.append("edit_datos_postales", a);
            datos.append("edit_pais", b);
            datos.append("edit_provincia", c);
            datos.append("edit_localidad", d);
            datos.append("edit_cod_postal", e);
            datos.append("edit_calle", f);
            datos.append("edit_numero", g);
            datos.append("edit_piso", h);
          $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
         //  $('body').append('<div class="alert-motivar alert alert-success alert-dismissible fade show" role="alert">'+respuesta+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
         }); 
        var a = $("#id").val(),
            b = $("#moti_ed_impreso").prop("checked"),
            d = $("#moti_ed_digital").prop("checked"),
            e = $("#dosm_ed_impreso").prop("checked"),
            f = $("#dosm_ed_digital").prop("checked"),
            datos = new FormData();
            datos.append("edit_suscripciones", a);
            datos.append("edit_moti_ed_impreso", b);
            datos.append("edit_moti_ed_digital", d);
            datos.append("edit_dosm_ed_impreso", e);
            datos.append("edit_dosm_ed_digital", f);
          $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
            // $('body').append('<div class="alert-motivar alert alert-success alert-dismissible fade show" role="alert">'+respuesta+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
         }); 
        var a = $("#id").val(),
            elmForm = $("#laboral");
            b = elmForm.serialize();
            datos = new FormData();
            datos.append("datos_laborales", a);
            datos.append("datos", b);
          $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
          //   $('body').append('<div class="alert-motivar alert alert-success alert-dismissible fade show" role="alert">'+respuesta+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
         }); 
        var a = $("#id").val(),
            elmForm = $("#otros");
            b = elmForm.serialize();
            datos = new FormData();
            datos.append("edit_otros", a);
            datos.append("datos", b);
            // console.log(b);
          $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
            $('#guardado').modal('show');

             // window.location = "duplicado_excel"

            }
         }); 
          }); 


            $("#confirmar_guardado_dup").on("click", function(event){    
                      window.location = "duplicado_excel";
               });



///////////////////////////////////////////////////////
                        // IMPORTADOR  //
///////////////////////////////////////////////////////

$("body").on("click", ".duplicado", function (event) {
    a = $(this).siblings().attr('id');
    b = $(this).siblings().attr('name');
    $(this).siblings().remove();
    $(this).attr('id', a);
    $(this).removeClass('col-md-4');
    $(this).addClass('col-md-12');
    $(this).attr('name', b);

   }); 

$("body").on("click", ".duplicado_select", function (event) {
    b = $(this).siblings('select').attr('id');
    c = $(this).siblings('select').attr('name');
    a = $(this).val();
    $(this).siblings('select').remove();
    $(this).attr('id', b);
    $(this).attr('name', c);

    if (b == 'pais'){
        fill_provincias();
    } else if (b == 'provincia'){
        fill_localidad(a);

    }

   }); 

$("body").on("click", ".opt-empresa", function (event) {
    $('#opc_empresa').prop("checked", true);

 });

$("body").on("click", ".opt-nstitucion", function (event) {
    $('#opc_institucion').prop("checked", true);

 });
$("body").on("click", ".chk-estudiante", function (event) {
    $('#chk-estudiante').prop("checked", true);

 });
$("body").on("click", ".chk-profesional", function (event) {
    $('#chk-profesional').prop("checked", true);

 });



$("body").on("click", ".delet_id_excel", function (event) {

        var a = $(this).siblings('input').val(),
            b = $(this);
            datos = new FormData();
            datos.append("delete_temporal", a);
          $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
            $('body').append('<div class="alert-motivar alert alert-success alert-dismissible fade show" role="alert">'+respuesta+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            $(b).closest("tr").remove();

            }
         }); 

   }); 
$("body").on("click", ".btn-delet_id_excel", function (event) {

        var a = $(this).siblings('input').val(),
            b = $(this);
            datos = new FormData();
            datos.append("delete_temporal", a);
          $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
             window.location = "duplicado_excel";

            }
         }); 

   }); 
$("body").on("click", ".insert_temporal", function (event) {

        var a = $(this).siblings('input').val(),
            b = $(this);
            datos = new FormData();
            datos.append("insert_temporal", a);
          $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
        if (respuesta != 'No ingresado por correo duplicado'){
            $(b).closest("tr").remove();
            $('body').append('<div class="alert-motivar alert alert-success alert-dismissible fade show" role="alert">'+respuesta+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    } else {
            $("#confirmarDuplicado").modal('show');
            $("#id_deplicado").val(a);

                    }}
         }); 

   }); 

$("body").on("click", "#confirmar_duplicado", function (event) {

        var a = $(this).siblings('input').val(),
            datos = new FormData();
            datos.append("insert_temporal2", a);
              console.log(a);
        $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
            $('body').append('<div class="alert-motivar alert alert-success alert-dismissible fade show" role="alert">'+respuesta+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        if (respuesta != 'No ingresado por correo duplicado'){
            $('#'+a).closest("tr").remove();
            $('.'+a).remove();

            console.log('col-eliminada');
                    }}
         }); 




    });
});

///////////////////////////////////////////////////////
                        // DUPLICADOS  //
///////////////////////////////////////////////////////

$("body").on("click", "#btn-resumen", function (event) {
        var a = $(this).siblings('.sus').val();
        var b = $(this).siblings('.filtro').val();
         $('#id-resumen').html(a);
         $('#id-r').val(a);
         $('#id-f').val(b);

        datos = new FormData();
        datos.append("resumen_duplicado_tmp", a);
        datos.append("filtro", b);
            $.ajax({
            url:"vista/modulos/ajax/suscripciones.php",
            method:"POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success:function(respuesta){
                $('#resumenModal').modal('show');
                $('.resumenModal').html(respuesta);
             } 
        });
    });


$("body").on("click", "#btn-resumen-tmp-act", function (event) {
        var a = $(this).siblings('input').val();
         $('#id-resumen').html(a);
         $('#id-r').val(a);

        
        datos = new FormData();
        datos.append("resumen_duplicado_tmp_act", a);
            $.ajax({
            url:"vista/modulos/ajax/suscripciones.php",
            method:"POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success:function(respuesta){
                $('#resumenModal').modal('show');
                $('.resumenModal').html(respuesta);
             } 
        });
    });

$("body").on("click", "#resumen-editar", function (event) {
        var a = $(this).siblings('#id-r').val();
        var c = $(this).siblings('#id-f').val();
        b = "index.php?action=editar_duplicado_temporal&suscriptor="+a+"&filtro="+c;
        window.location = b;
   }); 

$("body").on("click", ".deshabilitado", function (event) {
       $(this).children().prop( "disabled", false );
       a= $(this).children().prop( "name" );
       a = a.substr(-2,1);
       b = $('#filtro').val()
if ((a == 4)&&(b == 'correo')) {
         $(this).addClass('has-error');
         $(this).children('small').html('Si modifica el correo, dejará de ser considerado duplicado');
}
if ((a == 8)&&(b == 'celular')) {
         $(this).addClass('has-error');
         $(this).children('small').html('Si modifica el celular, dejará de ser considerado duplicado');
}

if ((a == 3)&&(b == 'apellido')) {
         $(this).addClass('has-error');
         $(this).children('small').html('Si modifica el apellido, dejará de ser considerado duplicado');
}

if ((a == 2)&&(b == 'nombre')) {
         $(this).addClass('has-error');
         $(this).children('small').html('Si modifica el nombre, dejará de ser considerado duplicado');
}

if ((a == 10)&&(b == 'dni')) {
         $(this).addClass('has-error');
         $(this).children('small').html('Si modifica el DNI, dejará de ser considerado duplicado');
}


   }); 

$("body").on("click", ".btn-eliminar-dup-tmp", function (event) {
        event.preventDefault();
        var a = $(this).parents().siblings('input').val();


            datos = new FormData();
            datos.append("delete_temporal", a);
          $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
            $('body').append('<div class="alert-motivar alert alert-success alert-dismissible fade show" role="alert">'+respuesta+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            $('.'+a).remove();

            }
         }); 
   }); 

$("body").on("click", ".btn-insert-dup-tmp", function (event) {
        event.preventDefault();
        var a = $(this).parents().siblings('input').val();
            datos = new FormData();
            datos.append("insert_temporal", a);
          $.ajax({
        url:"vista/modulos/ajax/suscripciones.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
        if (respuesta != 'No ingresado por correo duplicado'){
            $(b).closest("tr").remove();
            $('body').append('<div class="alert-motivar alert alert-success alert-dismissible fade show" role="alert">'+respuesta+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    } else {
            $("#confirmarDuplicado").modal('show');
            $("#id_deplicado").val(a);

                    }}
         }); 

   }); 

$("body").on("click", "#btn-filtrar", function (event) {
    $('#filtrarModal').modal('show');

   }); 


