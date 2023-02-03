<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Pagos/EstiloR.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Registro</title>
</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
   
    <form method="POST" >
        <section class="form-login">
          <h5>FORMULARIO DE REGISTRO</h5>
          <input class="controls" type="text" name="txtnombre" value="" placeholder="Nombre" required><br>
          <input class="controls" type="text" name="txtidentidad" value="" placeholder="Numero de identidad" required><br>
          <input class="controls" type="text" name="txttelefono" value="" placeholder="Numero de telefono" required><br>
          <input class="controls" type="text" name="txtfechaN" value="" placeholder="Fecha de nacimiento" required><br>
          <input class="controls" type="text" name="txtusuario" value="" placeholder="Usuario" required><br>
          <input class="controls" type="enmail" name="txtcorreo" value="" placeholder="Correo electronico" required><br>
          <input class="controls" type="password" name="txtcontrasena" value="" placeholder="Contraseña" required><br>
          <button class="buttons" type="submit" name="Registrar">REGISTRATE</button>
        </section>

    </form>
</body>
</html>