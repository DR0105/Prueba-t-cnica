$(document).ready(function () {
    $("#guardar").click(function () {
        ajaxAction('add');
    });
    function ajaxAction(action) {
        var nombre = $('#nombre').val();
        var descripcion = $('descripcion').val();
        var estado = "No completado"
        $.ajax({
            type: "POST",
            url: "../backend/response.php?action=add",
            data: {'action':'add', 'p_nombre':nombre, 'p_descripcion':descripcion, 'p_estado':estado},
            dataType: 'JSON',
            success: function (response) {
                $('#msg').html('');
                if (response.status) {
                    $('#modalagregar').modal('hide');
                    $('#msg').html('<div class="alert alert-success">Añadido exitosamente</div>');
                } else {
                    $('#msg').html('<div class="alert alert-danger ">Error al añadir</div>');
                }

            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#msg').html('<div class="alert alert-danger ">Error' + textStatus + '!' + errorThrown);
            }
        });
    }
});