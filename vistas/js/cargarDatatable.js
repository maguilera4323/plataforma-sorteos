$(document).ready(function() {
    $('#tablaUsuarios').DataTable( {
      "ajax":{
          "url": "../API/consulta.php",
          "dataSrc":""
      },
      "columns":[
          {"data": "id_empleado"},
          {"data": "usuario"},
          {"data": "nombre_empleados"},
          {"data": "estado_empleado"},
          {"data": "id_rol"},
          {"data": "correo_electronico"},
          {"render": function () {
            return '<button type="button" id="ButtonEditar" class="editar edit-modal btn btn-warning botonEditar"><span class="fa fa-edit"></span><span class="hidden-xs"></span></button>';
            }},
            {"render": function () {
                return '<button type="button" id="ButtonEditar" class="editar edit-modal btn btn-danger botonEditar"><span class="fa fa-trash"></span><span class="hidden-xs"></span></button>';
            }},
      ]  
    });
});