<?php
include('../../config/config.php');
include('../../config/connection.php');
include('./../templates/cabecera.php');
include('../carritoProducto.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    <section class="section-menu">
        <section class="contenido">
            <h1>Panel Admin</h1>
            <a href="agregarProducto.php">agregar producto</a>
            <br>
            <a href="modificarProducto.php">modificar producto</a>
            <br>
            <div class="contenido">
      
        <h1 id="carta">CARTA ONLINE</h1>
        <h4  class="claseAlimento">sándwiches</h4>
        <?php 
          $sentencia = $pdo->prepare("SELECT producto.*, categoria.nombre as categoria_nombre, categoria.id
           as categoria_id from producto  JOIN categoria ON producto.id_categoria = categoria.id where categoria.id = 1 ");
          $sentencia->execute();
          $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
           //print_r($listaProductos);
           
           include('../templates/eliminarProductos.php')
           ?>
   
        <h4  class="claseAlimento">pichangas</h4>
        <?php 
          $sentencia = $pdo->prepare("SELECT producto.*, categoria.nombre as categoria_nombre, categoria.id
           as categoria_id from producto  JOIN categoria ON producto.id_categoria = categoria.id where categoria.id = 2 ");
          $sentencia->execute();
          $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
           //print_r($listaProductos);
           include('../templates/eliminarProductos.php')
           ?>
        
        <h4 class="claseAlimento">papafritas</h4>
        <?php 
          $sentencia = $pdo->prepare("SELECT producto.*, categoria.nombre as categoria_nombre, categoria.id
           as categoria_id from producto  JOIN categoria ON producto.id_categoria = categoria.id where categoria.id = 3 ");
          $sentencia->execute();
          $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
           //print_r($listaProductos);
           include('../templates/eliminarProductos.php')
           ?>
        <h4  class="claseAlimento">bebestibles</h4>
        
        <div class="row">
          <?php 
          $sentencia = $pdo->prepare("SELECT producto.*, categoria.nombre as categoria_nombre, categoria.id
           as categoria_id from producto  JOIN categoria ON producto.id_categoria = categoria.id where categoria.id = 4 ");
          $sentencia->execute();
          $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
           //print_r($listaProductos);
           include('../templates/eliminarProductos.php')
           ?>
            
          



           


        </section>
    </section>
    
</body>
</html>