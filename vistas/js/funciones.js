
      $(document).ready(function() {
          $('#tablaUsuarios').DataTable( {
            ajax:{
                url: "../API/consulta.php",
                dataSrc:""
            },
            columns:[
                {data: "id_proveedor"},
                {data: "nom_proveedor"},
                {data: "rtn_proveedor"},
                {data: "tel_proveedor"},
                {data: "correo_proveedor"},
                {data: "dir_proveedor"},
                {"defaultContent": "<button type='button' class='form btn btn-primary> <span class='glyphicon glyphicon-search'></span></button>"},
                {"defaultContent": "<button type='button' class='form btn btn-primary btn-xs '> <span class='glyphicon glyphicon-search'></span></button>"}
            ]  
          });
      }); 

      