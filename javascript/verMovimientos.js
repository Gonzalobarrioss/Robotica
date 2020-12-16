$(document).ready(function() {
    // $('#resultadoSearch').hide();
    //var hoy = new Date();
    //fecha = hoy.getDate()+"-"+(hoy.getMonth()+1)+"-"+hoy.getFullYear()+" "+hoy.getHours()+":"+hoy.getMinutes()+":"+hoy.getSeconds();
    //$('#fecha').html(fecha);
    var fechaDesde = document.getElementById('fechaDesde'),
        fechaHasta = document.getElementById('fechaHasta'),
        search = document.getElementById('search');
    // llamo a la funcion mostrar todo
    fetchMovimientos();
    //defino funcion mostrar componentes
    function fetchMovimientos() {
        $.ajax({
            url: 'php/informeMovimientos.php',
            type: 'GET',
            success: function(response) {
                const movimientos = JSON.parse(response);
                let template = '';
                movimientos.forEach(m => {
                    template += `
                <tr>
                    <td>${m.id_mov}</td>
                    <td>${m.fecha}</td>
                    <td>${m.componente}</td>
                    <td>${m.valor}</td>
                    <td>${m.estado}</td>
                </tr>
                `
                });
                $('#movimientos').html(template);
            }
        });
    }

    //busqueda de clientes
    $('#searchComponente').keyup(function() {
        if ($('#searchComponente').val()) {
            let search = $('#searchComponente').val();
            $.ajax({
                url: 'php/searchComponente.php',
                data: { search },
                type: 'POST',
                success: function(response) {
                    if (!response.error) {
                        let movimientos = JSON.parse(response);
                        let template = '';
                        movimientos.forEach(m => {
                            template += `
                    <tr>
                        <td>${m.id}</td>
                        <td>${m.fecha}</td>
                        <td>${m.componente}</td>
                        <td>${m.valor}</td>
                        <td>${m.estado}</td>
                    </tr>
                `
                        });
                        $('#movimientos').html(template);
                        //$('#movimientos').show();

                    }

                }
            })
        }
        if (!($('#searchComponente').val())) {
            //$('#resultadoSearch').hide();
            fetchMovimientos();
        }
    });

    search.addEventListener('click', function(e) {
            const postData = {
                fechaDesde: fechaDesde.value,
                fechaHasta: fechaHasta.value
            }
            $.post('php/informeMovimientosFecha.php', postData, function(response) {
                const movFecha = JSON.parse(response);
                let template = '';
                movFecha.forEach(mov => {
                    template += `
            <tr>
                <td>${mov.id_mov}</td>
                <td>${mov.fecha}</td>
                <td>${mov.componente}</td>
                <td>${mov.valor}</td>
                <td>${mov.estado}</td>
            </tr>
            `
                });
                $('#movimientos').html(template);
            });

        })
        /*
          $(document).on('click', '.task-cambiar', function() {

            var hoy = new Date();
            fecha = hoy.getDate()+"-"+(hoy.getMonth()+1)+"-"+hoy.getFullYear()+" "+hoy.getHours()+":"+hoy.getMinutes()+":"+hoy.getSeconds();
            if(confirm('Seguro que desea cambiar estado?')){
              let element = $(this)[0].parentElement.parentElement;
              let id = $(element).attr('componenteId');
              const postData = {
                fecha : fecha,
                id: id
              }

              $.post('php/cambiarEstado.php', postData, function(response){
                console.log(response);
                fetchComponentes();
              })

            }
            
        });*/


});