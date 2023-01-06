/* //parametros y llamado a la funcion de paginador y filtro
//usando la  libreria Ligne PaginateJs */
let options = {
    numberPerPage:5, //Cantidad de datos por pagina
    goBar:true, //Barra donde puedes digitar el numero de la pagina al que quiere ir
    pageCounter:true, //Contador de paginas, en cual estas, de cuantas paginas
};

let filterOptions = {
    el:'.filtro' //Caja de texto para filtrar, puede ser una clase o un ID
};

paginate.init('#datos-usuario',options/* filterOptions */);


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
