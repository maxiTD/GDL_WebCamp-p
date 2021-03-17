<?php
require_once 'funciones/funciones.php';

$id_registro = $_POST['id_registro'];
$titulo = $_POST['titulo-evento'];
$id_categoria = $_POST['categoria-evento'];
$id_invitado = $_POST['invitado-evento'];
//Formatear fecha al formato Y/m/d, para que la DB lo tome correctamente
$fecha = $_POST['fecha-evento'];
$fecha_formateada = date('Y-m-d', strtotime($fecha));
//Formatear la hora al formato H:i:s, para que la DB lo tome correctamente
$hora = $_POST['hora-evento'];
$hora_formateada = date("H:i:s", strtotime($hora));

if ($_POST['registro'] == 'nuevo') {
    try {
        $stmt = $conn->prepare("INSERT INTO eventos (nombre_evento, fecha_evento, hora_evento, id_cat_evento, id_inv) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('sssii', $titulo, $fecha_formateada, $hora_formateada, $id_categoria, $id_invitado);
        $stmt->execute();
        $id_insertado = $stmt->insert_id;
        if ($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_insertado' => $id_insertado,
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }

    die(json_encode($respuesta));
}


if ($_POST['registro'] == 'actualizar') {
    try {
        $stmt = $conn->prepare('UPDATE eventos SET nombre_evento = ?, fecha_evento = ?, hora_evento = ?, id_cat_evento = ?, id_inv = ?, editado = NOW() WHERE evento_id = ?');
        $stmt->bind_param('sssiii', $titulo, $fecha_formateada, $hora_formateada, $id_categoria, $id_invitado, $id_registro);
        $stmt->execute();
        if ($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $id_registro
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}

if ($_POST['registro'] == 'eliminar') {
    try {
        $stmt = $conn->prepare('DELETE FROM eventos WHERE evento_id = ?');
        $stmt->bind_param('i', $id_registro);
        $stmt->execute();
        if ($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_registro
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}
?>