<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

     <!-- Replace "test" with your own sandbox Business account app client ID -->
     <script src="https://www.paypal.com/sdk/js?client-id=AY8ZdCX_D1xBvYT5-ThAjwKHC26ECXTReASlTO98lkYJCy5CscrlwE3bXKwS1VR_L1XtYopUOQVT3Pfm&currency=USD"></script>
</head>
<body>
   

    <div id="paypal-button-container">
        
    </div>

    <script>
        paypal.Buttons({
            style:{
                color: 'blue',
                shape: 'pill',
                label: 'pay'
            },

            createOrder: function(data,actions){
                return actions.order.create({
                    purchase_units:[{
                        amount:{
                           value:100  
                        }
                    }]
                });

            },
            
            //SABER SI APROBO LA TRANSACCION
            onApprove:function(data,actions){
                actions.order.capture().then(function(detalles){
                    alert("Pago Completado");
                    console.log(detalles);
                });
            },

            //SABER SI DENEGO LA TRANSACCION
            onCancel: function(data){
                alert("Pago cancelado");
                console.log(data);
            }
        }).render('#paypal-button-container');
    </script>

    
</body>
</html>