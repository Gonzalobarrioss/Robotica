$(document).ready(function() {
    //Agregar cliente con submit
    $('#formulario-componente').submit(function(e) {
        e.preventDefault();
        const postData = {
            descripcion: $('#descripcion').val(),
            num_componente: $('#numcomp').val(),
            ubicacion: $('#ubicacion').val()
        }
        $.post('php/agregarComponente.php', postData, function(response) {
            alert(response);
            $('#formulario-componente').trigger('reset');
        });
    })


});