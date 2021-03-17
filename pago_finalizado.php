<?php
echo "pagina de pago finalizado...";
die("pagina de pago finalizado...");?>
<?php include_once 'includes/templates/header.php';

use PayPal\Rest\ApiContext;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Payment;
require 'includes/paypal.php';

?>

<section class="seccion contenedor clearfix">
    <h2>Resumen Registro</h2>

    <?php
        $paymentId = $_GET['paymentId'];
        $id_pago = (int)$_GET['id_pago'];

        //Peticion a REST API PayPal
        $pago = Payment::get($paymentId, $apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);
        //@resultado obtiene la información de la transacción
        $resultado = $pago->execute($execution, $apiContext);
        $respuesta = $resultado->transactions[0]->related_resources[0]->sale->state;

        if ($respuesta == "completed") {
            echo "<div class='resultado correcto'>";
            echo 'El pago se realizó exitosamente. <br>';
            echo "ID pago: {$paymentId}";
            echo "</div>";

            require_once('includes/funciones/db_conexion.php');
            $stmt = $conn->prepare('UPDATE registrados SET pagado = ? WHERE id_registrado = ?');
            $pagado = 1;
            $stmt->bind_param('ii', $pagado, $id_pago);
            $stmt->execute();
            $stmt->close();
            $conn->close();
        } else {
            echo "<div class='resultado error'>";
            echo "Pago no realizado.";
            echo "</div>";
        }
    ?>
</section>

<?php include_once 'includes/templates/footer.php'; ?>