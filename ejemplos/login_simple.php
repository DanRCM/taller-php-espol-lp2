<?php
  $usuario_correcto = "estudiante";
  $clave_correcta = "php123";
  $mensaje = "";

  if (isset($_POST["ingresar"])) {
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];

    if ($usuario === $usuario_correcto && $clave === $clave_correcta) {
      $mensaje = "<p class='exito'>Bienvenido, $usuario. Ingreso correcto.</p>";
    } else {
      $mensaje = "<p class='error'>Usuario o clave incorrectos.</p>";
    }
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Ejemplo: Login simple</title>
  <link rel="stylesheet" href="../estilos.css">
</head>
<body>
<div class="contenedor">
  <h1>Ejemplo: Login con POST</h1>
  <?php echo $mensaje; ?>

  <form method="POST">
    <label>Usuario:</label>
    <input type="text" name="usuario">

    <label>Clave:</label>
    <input type="password" name="clave">

    <input type="submit" name="ingresar" value="Ingresar">
  </form>

  <p class="ayuda">Prueba con usuario <code>estudiante</code> y clave <code>php123</code>.</p>
</div>
</body>
</html>
