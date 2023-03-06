<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Pagos/EstiloPagos.css">

    <script src="https://www.paypal.com/sdk/js?client-id=sb"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://www.paypal.com/sdk/js?client-id=AY8ZdCX_D1xBvYT5-ThAjwKHC26ECXTReASlTO98lkYJCy5CscrlwE3bXKwS1VR_L1XtYopUOQVT3Pfm&currency=USD"></script>
    <title>Document</title>
</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<form method="POST" >
        <section class="form-login">
          <div class ='imagen-redonda'>
                <img src="./Carrito.png" >
          </div>
          <label for="cantidad">Sorteo Numero: </label><br>
          <label for="cantidad">Cantidad:</label>
          <input type="number" id="cantidad"   min="1" value="1" required>
    
          <div id="paypal-button-container"> </div>
    
        
       
        </section>

       
  

 
    </form>

   


<script>
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
            value: 10 * cantidad 
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
        window.location.href = "https://www.google.hn/";
      });
    }
  }).render('#paypal-button-container');


</script>



    







</body>
</html>