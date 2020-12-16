$(document).ready(function() {
    console.log('Jquery is Working');
    $('#task-result').hide();
    fetchTasks();
    $('#search').keyup(function(e) {
        if ($('#search').val()) {
            let search = $('#search').val();
            $.ajax({
                url: 'task-search.php',
                type: 'POST',
                data: { search: search },
                success: function(response) {
                    let tasks = JSON.parse(response);
                    let template = '';
                    tasks.forEach(task => {
                        template += `<li>
                    ${task.name}            
                    </li><li>${task.Descripcion}</li>`
                    });
                    $('#container').html(template);
                    $('#task-result').show();
                }
            });
        }
    })

});

$('#task-form').submit(function(e) {
    const postData = {
        componenteTipo: $('#componenteTipo').val(),
        descripcionComponente: $('#descripcionComponente').val(),
        ubicacionComponente: $('#ubicacionComponente').val()
    };
    $.post('task-add.php', postData, function(response) {
        fetchTasks();
        $('#task-form').trigger('reset');
    });
    e.preventDefault();
});

function fetchTasks() {

    $.ajax({
        url: 'task-list.php',
        type: 'POST',
        success: function(response) {
            console.log(response);
            let tasks = JSON.parse(response);
            let template = '';
            tasks.forEach(task => {
                template += `
                <tr taskId="${task.idComponente}">
                <td> ${task.idComponente}</td>
                <td> ${task.nroComponente}</td>
                <td> ${task.Descripcion}</td>
                <td> ${task.nroComponente}</td>
                <td> ${task.estado}</td>
                <td> ${task.ubicacion}</td>
                <td> 
                    <button class="task-delete btn btn-danger">Delete</button>                    
                </td>
                </tr>
                `
            });
            $('#tasks').html(template);
        }

    })

}

$(document).on('click', '.task-delete', function() {
    if (confirm('¿Seguro que quieres eliminar?')) {
        let element = $(this)['0'].parentElement.parentElement;
        let id = $(element).attr('taskId');
        console.log(id);
        $.post('task-delete.php', { id }, function(response) {
            fetchTasks();
        })
    }
})