var table = null;
var temp_tr = null;
var route = '';
$(document).ready(function () {
    table = $('#table-company').DataTable({
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        iDisplayLength: 50,
        "language": {
            "sLengthMenu":     "Mostrar _MENU_ empresas",
            "sInfo":           "Mostrando empresas del _START_ al _END_ de  _TOTAL_ ",
            "sSearch":         "Buscar:",
            "oPaginate": {
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
        }
    });
    table.on('click', '.edit', function () {
        $tr = $(this).closest('tr');
        var data = table.row($tr).data();
        $('#name').val(data[1]);
        $('#address').val(data[2]);
        $('#phone').val(data[3]);
        $('#description').val(data[4]);
        $('#visits').val(data[5]);
        $('#add-modal').modal('show');
        route = 'companies/edit/'+data[0];
        temp_tr = $tr;
        save();
    });
    table.on('click', '.delete', function () {
        $tr = $(this).closest('tr');
        var data = table.row($tr).data();
        console.log(data[0]);
        deleteCompany(data[0]);
        temp_tr = $tr;
    });
    
    $('#form-company').on('submit', function (e) {
        e.preventDefault();
        save();
    });
    $('#btn-add').on('click',()=>route='companies/create');
    $('#add-modal').on('hidden.bs.modal', function () {
        document.getElementById('form-company').reset();
    });
});
function save(){
    $.ajax({
        type: "POST",
        url: route,
        data: $('#form-company').serialize(),
        dataType: "json",
        success: function (response) {
            if(response.status){
                addRow(response.data);
                $('#add-modal').modal('hide');
            }else{
                console.log('no');
            }
        },
        error: function(error){
            console.log(error);
        }
    });
}
function addRow(data){
    if(data.update == true) table.row(temp_tr).remove().draw();
    console.log(data);
    let row = table.row.add([
        data.id,
        data.name,
        data.address,
        data.phone,
        data.description,
        data.visits,
        '<td><button type="button" class="btn btn-warning edit">Editar</button> <button type="button" class="btn btn-danger delete">Eliminar</button></td>'
    ]).draw().node();
}

function deleteCompany(id){
    $.ajax({
        type: "POST",
        url: "companies/delete/"+id,
        data: id,
        dataType: "json",
        success: function (response) {
            if(response.status){
                table.row(temp_tr).remove().draw();
            }else{
                alert('Error al eliminar');
            }
        }
    });
}