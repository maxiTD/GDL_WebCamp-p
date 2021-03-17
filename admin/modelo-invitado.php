<?php
require_once 'funciones/funciones.php';

$nombre = $_POST['nombre_invitado'];
$apellido = $_POST['apellido_invitado'];
$biografia = $_POST['biografia_invitado'];
$id_registro = $_POST['id_registro'];

if ($_POST['registro'] == 'nuevo') {
    /*
    $respuesta = array(
        'post' => $_POST,
        'file' => $_FILES
    );
    die(json_encode($respuesta)); */

    $directorio = "../img/invitados/";

    //comprueba si existe el directorio, si no, lo crea
    //mkdir(directorio, permisos, recursivo(true para que los archivos que se crean en el directorio
    // tengan los mismos permisos que el directorio))
    if(!is_dir($directorio)) {
        mkdir($directorio, 0755, true);
    }

    if(move_uploaded_file($_FILES['imagen_invitado']['tmp_name'], $directorio . $_FILES['imagen_invitado']['name'])) {
        $imagen_url = $_FILES['imagen_invitado']['name'];
        $imagen_resultado = "Se cargó correctamente.";
    } else {
        $respuesta = array (
            'respuesta' => error_get_last()
        );
    }

    try {
        $stmt = $conn->prepare("INSERT INTO invitados (nombre_invitado, apellido_invitado, descripcion_invitado, url_imagen) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombre, $apellido, $biografia, $imagen_url);
        $stmt->execute();
        $id_registro = $stmt->insert_id;
        if ($id_registro > 0) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_admin' => $id_registro,
                'resultado_imagen' => $imagen_resultado
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

    $directorio = "../img/invitados/";

    if(!is_dir($directorio)) {
        mkdir($directorio, 0755, true);
    }

    if(move_uploaded_file($_FILES['imagen_invitado']['tmp_name'], $directorio . $_FILES['imagen_invitado']['name'])) {
        $imagen_url = $_FILES['imagen_invitado']['name'];
        $imagen_resultado = "Se cargó correctamente.";
    } else {
        $respuesta = array (
            'respuesta' => error_get_last()
        );
    }

    try {
        if($_FILES['imagen_invitado']['size'] > 0) {
            //Si se carga un archivo
            $stmt = $conn->prepare("UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion_invitado = ?, url_imagen = ?, editado = NOW() WHERE id_invitado = ?");
            $stmt->bind_param("ssssi", $nombre, $apellido, $biografia, $imagen_url, $id_registro);
        } else {
            $stmt = $conn->prepare("UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion_invitado = ?, editado = NOW() WHERE id_invitado = ?");
            $stmt->bind_param("sssi", $nombre, $apellido, $biografia, $id_registro);
        }
        $stmt->execute();
        $registros = $stmt->affected_rows;
        if ($registros > 0) {
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
        $stmt = $conn->prepare('DELETE FROM invitados WHERE id_invitado = ?');
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