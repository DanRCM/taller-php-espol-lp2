<?php
function registrarFallo($usuario) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $fecha = date("Y-m-d H:i:s");
    $linea = "$usuario,$ip,$fecha\n";
    file_put_contents("logs.txt", $linea, FILE_APPEND);
}
?>