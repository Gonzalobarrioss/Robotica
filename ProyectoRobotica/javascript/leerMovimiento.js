$(document).ready(function() {
    var id = 0;
    //var hoy = new Date();
    //fecha = hoy.getDate()+"-"+(hoy.getMonth()+1)+"-"+hoy.getFullYear()+" "+hoy.getHours()+":"+hoy.getMinutes()+":"+hoy.getSeconds();
    //$('#fecha').html(fecha);
    var estado;
    // llamo a la funcion mostrar todo
    fetchComponentes();
    //defino funcion mostrar componentes
    function fetchComponentes() {
        $.ajax({
            url: 'php/informeComponentes.php',
            type: 'GET',
            success: function(response) {
                const componentes = JSON.parse(response);
                let template = '';
                componentes.forEach(c => {
                    template += `
                <tr componenteId=${c.id}>
                    <td>${c.id}</td>
                    <td>${c.num_comp}</td>
                    <td>${c.descripcion}</td>
                    <td>${c.ubicacion}</td>
                    <td>${c.estado}</td>
                    <td>
                      <button class="task-cambiar btn btn-warning">
                          Cambiar
                      </button>
                    </td>
                </tr>
                `
                });
                $('#componentes').html(template);
            }
        });
    }
    $(document).on('click', '.task-cambiar', function() {
        var hoy = new Date();
        fecha = hoy.getDate() + "-" + (hoy.getMonth() + 1) + "-" + hoy.getFullYear() + " " + hoy.getHours() + ":" + hoy.getMinutes() + ":" + hoy.getSeconds();
        if (confirm('Seguro que desea cambiar estado?')) {
            let element = $(this)[0].parentElement.parentElement;
            id = $(element).attr('componenteId');
            //let elementTagName = document.getElementsByTagName('td')
            //let estado = elementTagName[4].textContent;
            const postData = {
                fecha: fecha,
                id: id
            }

            $.post('php/cambiarEstado.php', postData, function(response) {
                console.log(response);
                fetchComponentes();

            })

            const postdataEdificio = {
                id: id
            }

            $.post('php/edificioEstado.php', postdataEdificio, function(response) {})
        }
    });


});