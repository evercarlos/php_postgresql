var e_grid;

e_grid = $("#e_grid");
var e_name = $("#e_name");
var e_dni = $("#e_dni");
var e_id = $("#e_id");

function addGrid() {
    $.post('aplication/entityAll.php', function (response) {
        if (response.status) {
            e_grid.empty();
            _.each(response.data, function (item) {
                var tr_ = $('<tr></tr>');
                var td_1 = $('<td>' + item.name + '</td>');
                var td_2 = $('<td>' + item.dni + '</td>');
                var td_3 = $('<td></td>');
                var edit_e = $('<a id="' + item.id + '" href="javascript:void(0)" class="btn btn-success edit_e">Editar</a>');
                var delete_e = $('<a id="' + item.id + '" href="javascript:void(0)" class="btn btn-danger delete_e">Eliminar</a>');
                td_3.append(edit_e).append(delete_e);
                tr_.append(td_1).append(td_2).append(td_3);
                e_grid.append(tr_);

                e_grid.find('a.edit_e').click(function () {
                    var td_ = $(this);
                    var td_id = td_.attr('id');
                    findEntity(td_id);
                });
                e_grid.find('a.delete_e').click(function () {
                    var tr_ = $(this);
                    var td_id = tr_.attr('id');
                    deleteEntity(td_id);
                });
            });
        } else {

        }
    }, 'json');
}

function deleteEntity(id) {
    var params = {
        id: id
    };

    $.post('aplication/entityDelete.php', params, function (response) {
        if (response.status) {
            addGrid();
            alert('Eliminado correctamente');
        } else {
            alert('Error al eliminar');
        }
    }, 'json');
}

function findEntity(id) {
    var params = {
        id: id
    };
    $.post('aplication/entityFind.php', params, function (response) {
        if (response.status) {
            var data = response.data;
            console.log(data);
            e_id.val(data.id);
            e_name.val(data.name);
            e_dni.val(data.dni);
        } else {
            alert('mal al buscar');
        }
    }, 'json');
};


$(document).ready(function () {
    addGrid();
});




