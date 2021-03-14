    $(document).ready(function() {
          $('#tb_personas').DataTable({
            autoWidth: false,
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
              language: {
                  search: '<span>Buscar:</span> _INPUT_',
                  lengthMenu: '<span>Mostrar:</span> _MENU_',
                  info:"Mostrando _START_ a _END_ de _TOTAL_ entradas",
                  infoEmpty:"Mostrando 0 de 0 de 0 entradas",
                  infoFiltered:"(filtrado de un total de _MAX_ entradas)",
                  zeroRecords:"No se encontraron resultados",
                  paginate: { 'first': 'First', 'last': 'Last', 'next': '→', 'previous': '←' }
              },
              drawCallback: function () {
                  $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
            },
              preDrawCallback: function() {
                  $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
              }



                   } );


          $('#tb_duplicados').DataTable({
            order : [ 4, 'asc' ],
            autoWidth: false,
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
              language: {
                  search: '<span>Buscar:</span> _INPUT_',
                  lengthMenu: '<span>Mostrar:</span> _MENU_',
                  info:"Mostrando _START_ a _END_ de _TOTAL_ entradas",
                  infoEmpty:"Mostrando 0 de 0 de 0 entradas",
                  infoFiltered:"(filtrado de un total de _MAX_ entradas)",
                  zeroRecords:"No se encontraron resultados",
                  paginate: { 'first': 'First', 'last': 'Last', 'next': '→', 'previous': '←' }
              },
              drawCallback: function () {
                  $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
            },
              preDrawCallback: function() {
                  $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
              }



                   } );


        //  var table = $('#tb_personas').DataTable(); 

        //  var gv_idpers;

        // $('#tb_personas tbody').on('click', 'tr', function () {
            
        //     var       data = table.row( this ).data();
        //     var  idpersona = data["idpersona"];
            
        //     gv_idpers = idpersona;

        //     $('#iddelpersona').html(idpersona);
            
        // });  

        // $('#btn_del').on('click',function(e){

        //     borrar_id($('#iddelpersona').html());
        // });
        
        // $('#modalDel').on('hidden.bs.modal', function () {
        //     $('#tb_personas').DataTable().ajax.reload();
        // });

        // $('body').on('click', '#bt_view', function () {
        //     window.location.href = "detalle-persona.html?id=" + gv_idpers;
        // });
        
        // // var show_box_filtrar;
        // $('#box-filtrar').hide();

        // $('#btn-filtrar').click(function(){
        //       $('#box-filtrar').slideToggle();
        // });

        // $('#buscar').click(function(){

        //   $('#tb_personas').DataTable().ajax.reload();

        // });
// // FUNCIONES        

//         function borrar_id(iddelpersona){

//             $.ajax({
//                 type: 'POST',
//                  url: 'php/accion_persona.php', 
//                 data: { function: 'BORRAR', 
//                         idpersona: iddelpersona
//                        }
//             })
//             .done(function(data){
//                // show the response
//                 alert(data);
//             })
//             .fail(function() {
//                 // just in case posting your form failed
//                 alert( "Posting failed." );
//             });
//             // to prevent refreshing the whole page page
//             $('#modalDel').modal('toggle'); //or  $('#IDModal').modal('hide');
//             return false;
//         }  
  
    $("body").on("click", ".btn-eliminar", function (event) {
            a =  $(this).siblings('.id').val();
            b = $(this);
            datos = new FormData();
            datos.append("eliminar_suscripcion", a);
            $('#eliminarModal').modal('show');
  });

            $("#confirmar").on("click", function(event){    
               $.ajax({
                  url:"vista/modulos/ajax/dashboard.php",
                  method:"POST",
                  data: datos,
                  cache: false,
                  contentType: false,
                  processData: false,
                  success:function(respuesta){
                      // b.closest('tr').remove();
                      // $('body').append('<div class="alert-motivar alert alert-success alert-dismissible fade show" role="alert">'+respuesta+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                      window.location = "dashboard"
                      $('body').append('<div class="alert-motivar alert alert-success alert-dismissible fade show" role="alert">'+respuesta+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                      }
         }); 
          });



        $('#box-filtrar').hide();

        $('#btn-filtrar').click(function(){
              $('#box-filtrar').slideToggle();
        });



    });
