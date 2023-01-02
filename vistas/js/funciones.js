
      $(document).ready(function() {
          $('#tablaUsuarios').DataTable( {
            "ajax":{
                "url": "../API/consulta.php",
                "dataSrc":""
            },
            "columns":[
                {"data": "id_proveedor"},
                {"data": "nom_proveedor"},
                {"data": "rtn_proveedor"},
                {"data": "tel_proveedor"},
                {"data": "correo_proveedor"},
                {"data": "dir_proveedor"}
            ]  
          });
      });
