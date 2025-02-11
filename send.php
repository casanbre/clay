<?php
ob_start();
include("conexion.php");  
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (
        !empty($_POST['name']) &&
        !empty($_POST['datos']) &&
        !empty($_POST['maquina']) &&
        isset($_POST['duracion']) && $_POST['duracion'] > 0 &&
        !empty($_POST['tarea'])
    ) {
        $name = mysqli_real_escape_string($conex, trim($_POST['name']));
        $fecha = mysqli_real_escape_string($conex, trim($_POST['datos']));
        $maquina = mysqli_real_escape_string($conex, trim($_POST['maquina']));
        $duracion = mysqli_real_escape_string($conex, trim($_POST['duracion']));
        $tarea = mysqli_real_escape_string($conex, trim($_POST['tarea']));

        // Inserción segura con prepared statements
        $stmt = $conex->prepare("INSERT INTO actividad (nombre, fecha, maquina, duracion, tarea) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssds", $name, $fecha, $maquina, $duracion, $tarea);

        if ($stmt->execute()) {
            echo json_encode(["mensaje" => "Éxito"]);
        } else {
            echo json_encode(["error" => "Error en SQL: " . $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(["error" => "Todos los campos son obligatorios"]);
    }
    exit;
}
?>
