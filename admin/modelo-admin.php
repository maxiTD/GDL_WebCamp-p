<?php

require_once 'funciones/funciones.php';

$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$password = $_POST['password'];
$id_registro = $_POST['id_registro'];
$nivel = $_POST['nivel'];

if ($_POST['registro'] == 'nuevo') {

    $opciones = array (
        'cost' => 12
    );
    $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);

    try {
        $stmt = $conn->prepare("INSERT INTO admins (usuario, nombre, password, nivel) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $usuario, $nombre, $password_hashed, $nivel);
        $stmt->execute();
        $id_registro = $stmt->insert_id;
        if ($id_registro > 0) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_admin' => $id_registro,
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error',
                'id registro' => $id_registro
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
        if (empty($_POST['password'])){
            $stmt = $conn->prepare("UPDATE admins SET usuario = ?, nombre = ?, editado = NOW(), nivel = ? WHERE id_admin = ?");
            $stmt->bind_param("ssii", $usuario, $nombre, $nivel, $id_registro);
        } else {
            $opciones = array (
                'cost' => 12
            );
            $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);

            $stmt = $conn->prepare("UPDATE admins SET usuario = ?, nombre = ?, password = ?, editado = NOW(), nivel = ? WHERE id_admin = ?");
            $stmt->bind_param("sssii", $usuario, $nombre, $password_hashed, $nivel, $id_registro);
        }
        $stmt->execute();
        if ($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito'
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error',
                'id_actualizado' => $stmt->insert_id
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
        $stmt = $conn->prepare('DELETE FROM admins WHERE id_admin = ?');
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