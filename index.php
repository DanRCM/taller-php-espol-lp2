<?php
  $fecha = date("d/m/Y H:i:s");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Taller PHP - ESPOL</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
<div class="contenedor">
  <h1>¡Tu entorno PHP está funcionando!</h1>
  <p>Si ves esta página, PHP y el servidor están corriendo correctamente en tu Codespace.</p>
  <p><strong>Hora del servidor:</strong> <?php echo $fecha; ?></p>

  <h2>Archivos de ejemplo</h2>
  <ul>
    <li><a href="ejemplos/login_simple.php">Login simple (POST)</a></li>
    <li><a href="ejemplos/cifrado_ejemplo.php">Ejemplo de cifrado</a></li>
  </ul>

  <p class="ayuda">Empieza a construir tu proyecto editando este archivo (<code>index.php</code>) o creando archivos nuevos en este mismo panel de la izquierda.</p>
</div>
</body>
</html>
