<?php
  $texto_original = "php123";

  $md5 = md5($texto_original);
  $sha1 = sha1($texto_original);
  $hash_seguro = password_hash($texto_original, PASSWORD_DEFAULT);
  $codificado = base64_encode($texto_original);
  $decodificado = base64_decode($codificado);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Ejemplo: Cifrado</title>
  <link rel="stylesheet" href="../estilos.css">
</head>
<body>
<div class="contenedor">
  <h1>Ejemplo: Cifrado y codificación</h1>

  <p><strong>Texto original:</strong> <?php echo $texto_original; ?></p>

  <h2>Hashing (una sola vía)</h2>
  <p><strong>MD5:</strong> <code><?php echo $md5; ?></code></p>
  <p><strong>SHA1:</strong> <code><?php echo $sha1; ?></code></p>
  <p><strong>password_hash (recomendado hoy):</strong><br><code><?php echo $hash_seguro; ?></code></p>

  <h2>Codificación (reversible, NO es cifrado real)</h2>
  <p><strong>Base64 codificado:</strong> <code><?php echo $codificado; ?></code></p>
  <p><strong>Base64 decodificado:</strong> <code><?php echo $decodificado; ?></code></p>

  <h2>Verificación con password_verify()</h2>
  <?php
    $clave_ingresada = "php123";
    if (password_verify($clave_ingresada, $hash_seguro)) {
      echo "<p class='exito'>La clave ingresada SÍ coincide con el hash seguro.</p>";
    } else {
      echo "<p class='error'>La clave ingresada NO coincide.</p>";
    }
  ?>

  <p class="ayuda">Recarga esta página varias veces: MD5 y SHA1 siempre dan el mismo resultado, pero password_hash da un resultado distinto cada vez (usa una "sal" aleatoria) — aun así password_verify() lo sigue reconociendo.</p>
</div>
</body>
</html>
