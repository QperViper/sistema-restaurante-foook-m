<?php
include('../../config/config.php');
include('../../config/connection.php');
include('../templates/cabecera.php');
include('../carritoProducto.php');

?>
<?php 
$sentencia = $pdo->prepare("SELECT producto.*, categoria.nombre as categoria_nombre, categoria.id
as categoria_id from producto  JOIN categoria ON producto.id_categoria = categoria.id where categoria.id = 1 ");
$sentencia->execute();
$productosComprados=$sentencia->fetchAll(PDO::FETCH_ASSOC);

if($_POST){
  $total=0;
  $SID = session_id();
  $correo = $_POST['email'];


  foreach($_SESSION['carrito'] as $indice => $producto) {
    $total = $total + ($producto['precio'] * $producto['cantidad']);
}


$sentencia = $pdo->prepare("INSERT INTO `venta` (`id`, `clavetransaccion`, `datoscuenta`, `correo`, `fecha`, `total`, `status`)
   VALUES (NULL, :claveTransaccion, '', :correo, NOW(), :total, 'procesado')");

$sentencia->bindParam(":claveTransaccion", $SID);
$sentencia->bindParam(":total", $total);
$sentencia->bindParam(":correo", $correo);

$exitoInsercion = $sentencia->execute();

if ($exitoInsercion) {
    $idInsertado = $pdo->lastInsertId();

    // Ahora puedes realizar una consulta para obtener los datos de la fila insertada
    $consulta = $pdo->prepare("SELECT * FROM `venta` WHERE `id` = :id");
    $consulta->bindParam(":id", $idInsertado);
    $consulta->execute();

    $filaInsertada = $consulta->fetch(PDO::FETCH_ASSOC);

    // Muestra los datos de la fila insertada
    print_r($filaInsertada);
} else {
    echo "Error en la inserción.";
}

 
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayPal JS SDK Standard Integration</title>
  </head>
  <body>

  <div class="card-columns">
    <div class="card">
        <img class="card-img-top" src="holder.js/100x180/" alt="">
        <div class="card-body">
            <h4 class="card-title">Confirmar Pago</h4>
        </div>
    </div>
    <div class="card">
        <img class="card-img-top" src="holder.js/100x180/" alt="">
        <div class="card-body">
        <h3>total: $<?php echo $total?></h3>
        <hr>
        <p>producto:</p>
        <?php foreach($productosComprados as $producto){ ?>
        <p><?php echo $producto['categoria_nombre']. ": "?> <?php echo $producto['nombre']?></p>

        <?php } ?>
      
        <div id="paypal-button-container"></div>
      
          <p id="result-message"></p>
          <!-- Replace the "test" client-id value with your client-id -->
          <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
          <script src="../pagar.js"></script>
        </div>
    </div>
</div>

    
  </body>
</html>
<?php include('../templates/pie.php')?>
