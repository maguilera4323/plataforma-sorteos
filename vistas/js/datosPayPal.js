
paypal.Buttons({
  createOrder: function(data, actions) {
    // Obtener el valor del campo de entrada de cantidad
    let cantidad = document.getElementById('cantidad').value;

    // Validar que la cantidad sea mayor que cero
    if (cantidad <= 0) {
      Swal.fire({
				title: "Error",
				text: "La cantidad de boletos no puede ser cero",
				icon: "error"
			})
      return;
    }

    // Crear un objeto de pago de PayPal
    return actions.order.create({
      purchase_units: [{
        amount: {
          value: 1 * cantidad 
        },
        description: 'Boletos de loteria',
        currency_code: 'USD'
      }]
    });
  },
  onApprove: function(data, actions) {
    $.ajax({
      method: "POST",
      url: "../ajax/boletoAjax.php",
      data: { cantidad: $("input.cantidad").val() }
    })
    // Capturar el pago aprobado
    return actions.order.capture().then(function(details) {
      // Mostrar una confirmación de pago al usuario
      /* Swal.fire(
        'Pago realizado con éxito',
        'ID de transacción: ' + details.payer.name.given_name + '!',
        'success'
      ) */
      Swal.fire({
				title: "Pago realizado con éxito",
				text: "ID de transacción: " + details.payer.name.given_name + "!",
				icon: "success"
			}).then(function() {
				window.location.href = "../home";
			})
      
    });
  }
}).render('#paypal-button-container');