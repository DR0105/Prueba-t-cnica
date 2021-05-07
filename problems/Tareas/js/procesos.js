$(document).ready(function () {
    function get_tarea() {
        $.ajax({
            type: 'GET',
            url: '../backend/response.php?action=list',
            success: function (response) {
                response = JSON.parse(response);
                var tr;
                $('#tarea_body').html('');
                $.each(response, function (index, emp) {
                    tr = $('<tr/>');
                    tr.append("<td>" + emp.id + "</td>");
                    tr.append("<td>" + emp.nombre + "</td>");
                    tr.append("<td>" + emp.descripcion + "</td>");
                    tr.append("<td>" + emp.estado + "</td>");
                    var action = "<td><div class='btn-group' data-toggle='buttons'>";
                    action += "<a href='#' target='_blank' class='btn btn-warning btn-xs edit_data' id='"+emp.id+"' >Editar</a>";
                    action += "<a href='#' target='_blank' class='btn btn-danger btn-xs delete_data' id='"+emp.id+"''>Borrar</a>";
                    tr.append(action);
                    $('#tarea_body').append(tr);
                });
            }
        });
    }
    $("#btn_add").click(function () {
        ajaxAction('add');
    });

    function ajaxAction(action) {
        data = $("#frm_" + action).serializeArray();
        $.ajax({
            type: "POST",
            url: "../backend/response.php?action=add",
            data: data,
            dataType: "json",
            success: function (response) {
                $('#msg').html('');
                if (response.status) {
                    $('#' + action + '_model').modal('hide');
                    $('#msg').html('<div class="alert alert-success">Tarea añadida satisfactoriamente</div>');
                } else {
                    $('#msg').html('<div class="alert alert-danger ">Error al añadir tarea</div>');
                }
                get_tarea();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#msg').html('<div class="alert alert-danger ">Error' + textStatus + '!' + errorThrown);
            }
        });
    }

    $(document).on('click', '.edit_data', function(){  
        var id = $(this).attr("id");
        $('#modal-title').html("Editar tarea");
        $.ajax({  
             url:"../backend/response.php?action=get_tarea&id="+id,  
             method:"GET", 
             dataType:"json",  
             success:function(data){ 
                 console.log(data); 
                  $('#nombre').val(data.nombre);    
                  $('#descripcion').val(data.descripcion);
                  $('#tarea_id').val(data.id);  
                  $('#btn_add').html("Actualizar");
                  $('#action').val("edit");  
                  $('#add_model').modal('show'); 
             }  
        });  
   });

   $(document).on('click', '.delete_data', function(){  
    var id = $(this).attr("id");
    var conf = confirm('¿Estás seguro de borrar la tarea?');
     if(conf && id > 0){
         $.post('../backend/response.php', { id: id, action : 'delete'}
             , function(){
                 get_tarea();
         }); 
     } 
});

    //initialize method on load
    function init() {
        get_tarea();
    }
    init();
});