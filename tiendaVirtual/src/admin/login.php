<?php
include('../../config/config.php');
include('../../config/connection.php');
include('./../templates/cabecera.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
<section class="section-menu">
        <section class="contenido">
        <h2>Panel admin</h2>
        <?php 
        $sentencia = $pdo->prepare("SELECT * FROM categoria");
        $sentencia->execute();
        $listaCategoria=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        ?>
        
       
    <form action="../carritoProducto.php" method="post">
        <label for="rut">nombre</label>
        <div class="input-group mb-3">
        <input required type="text" class="form-control" placeholder="123456789"  name="rut" id="rut" aria-label="rut" aria-describedby="basic-addon1">
        </div>
        <label for="password">contraseña</label>
        <div class="input-group mb-3">
        <input required type="password" class="form-control" placeholder="contraseña"  name="password" id="password" aria-label="password" aria-describedby="basic-addon1">
        </div>

       
        <button 
        class="btn btn-primary" 
        name="btnAccion"
        value="validarUsuario"
        type="submit" >
        ingresar
        </button>

    </form>
    
    </section>
    </section>
    <?php include('../templates/pie.php')?>

</html>