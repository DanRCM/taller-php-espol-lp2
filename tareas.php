<?php
// tareas.php
session_start();

// 1. Si no existe una sesión activa, redirija a ingreso.php
if (!isset($_SESSION['cedula'])) { 
    header("Location: ingreso.php");
    exit();
}

// Identificador del usuario actual para asegurar que vea únicamente sus propias tareas
$usuario = $_SESSION['cedula'];

// Incluimos las funciones creadas en el paso anterior
require 'tarea.php';

// 2. Procesamiento de acciones (Agregar)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['texto'])) {
    $texto_limpio = trim($_POST['texto']);
    if (!empty($texto_limpio)) {
        guardarTarea($usuario, $texto_limpio);
    }
    // Redirigir para evitar que al refrescar la página se duplique el POST
    header("Location: tareas.php");
    exit();
}

// 3. Procesamiento de acciones (Completar y Eliminar) enviadas por URL (GET)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['accion']) && isset($_GET['id'])) {
    if ($_GET['accion'] === 'completar') {
        completarTarea($usuario, $_GET['id']);
    } elseif ($_GET['accion'] === 'eliminar') {
        eliminarTarea($usuario, $_GET['id']);
    }
    header("Location: tareas.php");
    exit();
}

// 4. Obtener las tareas del usuario actual
$listas = listarTareas($usuario);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Tareas</title>
    <!-- Utilice el archivo estilos.css entregado en la plantilla -->
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="contenedor">
        <h1>Mis Tareas</h1>
        
        <!-- Enlace para cerrar sesión -->
        <p><a href="logout.php">Cerrar sesión</a></p>

        <!-- Formulario para agregar una tarea -->
        <form action="tareas.php" method="POST">
            <input type="text" name="texto" placeholder="Escribe una nueva tarea..." required>
            <button type="submit">Agregar</button>
        </form>

        <h2>Pendientes</h2>
        <ul>
            <?php foreach ($listas['pendientes'] as $tarea): ?>
                <li>
                    <!-- Uso obligatorio de htmlspecialchars() al mostrar datos -->
                    <?php echo htmlspecialchars($tarea['texto'], ENT_QUOTES, 'UTF-8'); ?>
                    
                    <!-- Opciones de Completar y Eliminar -->
                    <div class="acciones">
                        <a href="tareas.php?accion=completar&id=<?php echo urlencode($tarea['id']); ?>">[Completar]</a>
                        <a href="tareas.php?accion=eliminar&id=<?php echo urlencode($tarea['id']); ?>">[Eliminar]</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>

        <h2>Completadas</h2>
        <ul>
            <?php foreach ($listas['completadas'] as $tarea): ?>
                <li>
                    <del><?php echo htmlspecialchars($tarea['texto'], ENT_QUOTES, 'UTF-8'); ?></del>
                    
                    <div class="acciones">
                        <a href="tareas.php?accion=eliminar&id=<?php echo urlencode($tarea['id']); ?>">[Eliminar]</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>