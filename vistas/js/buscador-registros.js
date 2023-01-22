/* jQuery("#searchBox").keyup(function(){
    if( jQuery(this).val() != ""){
        jQuery("#datos-usuario tbody>tr").hide();
        jQuery("#datos-usuario td:contiene-palabra('" + jQuery(this).val() + "')").parent("tr").show();
    }
    else{
        jQuery("#datos-usuario tbody>tr").show();
    }
});
 
jQuery.extend(jQuery.expr[":"], {
    "contiene-palabra": function(elem, i, match, array) {
			return (elem.textContent || elem.innerText || jQuery(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
		}
        
}); */

function filterTable() {
    // Obtiene el valor del input de búsqueda
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchBox");
    filter = input.value.toUpperCase();
    table = document.getElementById("datos-usuario");
    tr = table.getElementsByTagName("tr");
    var counter = 0;

    // Recorre cada fila de la tabla
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (var j = 0; j < td.length; j++) {
            // Oculta las filas que no coinciden con la búsqueda
            txtValue = td[j].textContent || td[j].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
                counter++;
                break;
            } else {
                tr[i].style.display = "none";
            }
        }
    }
    // Si no hay coincidencias en la búsqueda, muestra un mensaje
    if (counter === 0) {
        document.getElementById("message").innerHTML = "No se encontraron registros";
    } else {
        document.getElementById("message").innerHTML = "";
    }
}