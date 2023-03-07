
paypal.Buttons({
  createOrder: function(data, actions) {
    // Obtener el valor del campo de entrada de cantidad
    var cantidad = document.getElementById('cantidad').value;

    // Validar que la cantidad sea mayor que cero
    if (cantidad <= 0) {
      alert('Ingrese una cantidad válida.');
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
    // Capturar el pago aprobado
    return actions.order.capture().then(function(details) {
      // Mostrar una confirmación de pago al usuario
      alert('Pago realizado con éxito. ID de transacción: ' + details.payer.name.given_name + '!');
      window.location.href = "../home/";
    });
  }
}).render('#paypal-button-container');