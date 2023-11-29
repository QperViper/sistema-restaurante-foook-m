<?php
include('../../config/config.php');
include('../../config/connection.php');
include('../carritoProducto.php');
include('../templates/cabecera.php');
?>
  <h1 >Restaurant Food Ok</h1>
    <section class="section-portada">
    <div class="contenido">
        <div class="portada">
            <img src="../images/scene00150.jpg" alt="">
        </div>
        <a href="#carta">ver carta</a>
      </div>
    </section>
    <section class="section-menu">
      
      <div class="contenido">
      
        <h1 id="carta">CARTA ONLINE</h1>

        <figcaption class="carritoCar">
        <a class="nav-link, " href="listarCarrito.php" tabindex="-1" aria-disabled="true">
                            <img id="ibolsa"  src="../images/bolsa.png"  width="40" height="40" alt=""> (
                            <?php 
                            echo (empty($_SESSION['carrito'])) ? 0 : count($_SESSION['carrito']);
                            ?> )
                        </a>
        </figcaption>
       
        <h4>sándwiches</h4>
        <?php 
          $sentencia = $pdo->prepare("SELECT producto.*, categoria.nombre as categoria_nombre, categoria.id
           as categoria_id from producto  JOIN categoria ON producto.id_categoria = categoria.id where categoria.id = 1 ");
          $sentencia->execute();
          $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
           //print_r($listaProductos);
           include('../templates/mostrarProductos.php')
           ?>
   
        <h4>pichangas</h4>
        <?php 
          $sentencia = $pdo->prepare("SELECT producto.*, categoria.nombre as categoria_nombre, categoria.id
           as categoria_id from producto  JOIN categoria ON producto.id_categoria = categoria.id where categoria.id = 2 ");
          $sentencia->execute();
          $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
           //print_r($listaProductos);
           include('../templates/mostrarProductos.php')
           ?>
        
        <h4>papafritas</h4>
        <?php 
          $sentencia = $pdo->prepare("SELECT producto.*, categoria.nombre as categoria_nombre, categoria.id
           as categoria_id from producto  JOIN categoria ON producto.id_categoria = categoria.id where categoria.id = 3 ");
          $sentencia->execute();
          $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
           //print_r($listaProductos);
           include('../templates/mostrarProductos.php')
           ?>
        <h4>bebestibles</h4>
        
        <div class="row">
          <?php 
          $sentencia = $pdo->prepare("SELECT producto.*, categoria.nombre as categoria_nombre, categoria.id
           as categoria_id from producto  JOIN categoria ON producto.id_categoria = categoria.id where categoria.id = 4 ");
          $sentencia->execute();
          $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
           //print_r($listaProductos);
           include('../templates/mostrarProductos.php')
           ?>
            
          



           
      </div>

    </section>
    
    </header>
    <script>
      $(function () {
        $('[data-toggle="popover"]').popover()
      })
    </script>
      </div>
        
</body>
</html>
<?php include('../templates/pie.php')?>