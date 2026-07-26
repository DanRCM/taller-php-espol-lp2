<?php
// tarea.php

// Agrega una línea con id, texto y estado al archivo del usuario
function guardarTarea($usuario, $texto) {
    $archivo = "tareas_" . $usuario . ".csv";
    $id = uniqid(); // Genera un identificador único para la tarea
    $estado = "pendiente";
    
    // Formato CSV: id,texto,estado
    $linea = "$id,$texto,$estado" . PHP_EOL; 
    
    // FILE_APPEND asegura que se agregue al final sin borrar lo anterior
    file_put_contents($archivo, $linea, FILE_APPEND);
}

// Retorna las tareas separadas en pendientes y completadas
function listarTareas($usuario) {
    $archivo = "tareas_" . $usuario . ".csv";
    $tareas = ['pendientes' => [], 'completadas' => []];

    if (file_exists($archivo)) {
        $gestor = fopen($archivo, "r");
        if ($gestor !== FALSE) {
            while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
                if (count($datos) == 3) {
                    $tarea = ['id' => $datos[0], 'texto' => $datos[1], 'estado' => $datos[2]];
                    
                    if (trim($tarea['estado']) === 'pendiente') {
                        $tareas['pendientes'][] = $tarea;
                    } else {
                        $tareas['completadas'][] = $tarea;
                    }
                }
            }
            fclose($gestor);
        }
    }
    return $tareas;
}

// Cambia el estado de una tarea indicada
function completarTarea($usuario, $id) {
    $archivo = "tareas_" . $usuario . ".csv";
    if (!file_exists($archivo)) return;

    $lineas = file($archivo);
    $nuevoContenido = "";

    foreach ($lineas as $linea) {
        $datos = str_getcsv($linea);
        if (count($datos) == 3 && $datos[0] === $id) {
            // Se reescribe la línea con el estado cambiado a 'completada'
            $nuevoContenido .= "$datos[0],$datos[1],completada" . PHP_EOL;
        } else {
            // Se mantiene la línea original
            $nuevoContenido .= $linea;
        }
    }
    // Sobrescribimos el archivo con la información actualizada
    file_put_contents($archivo, $nuevoContenido);
}

// Elimina la línea correspondiente del archivo
function eliminarTarea($usuario, $id) {
    $archivo = "tareas_" . $usuario . ".csv";
    if (!file_exists($archivo)) return;

    $lineas = file($archivo);
    $nuevoContenido = "";

    foreach ($lineas as $linea) {
        $datos = str_getcsv($linea);
        // Si el ID coincide, simplemente saltamos esa línea (no la agregamos al nuevo contenido)
        if (count($datos) == 3 && $datos[0] !== $id) {
            $nuevoContenido .= $linea;
        }
    }
    file_put_contents($archivo, $nuevoContenido);
}
?>