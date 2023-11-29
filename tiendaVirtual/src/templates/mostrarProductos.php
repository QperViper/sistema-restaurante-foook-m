<?php foreach($listaProductos as $producto){ ?>
          <div class="col-3">
          <div class="card">
        
            <div class="card-body">
              <h6 class="categoria_sub"><i><?php echo $producto['categoria_nombre']?></i></h6>
              <h5><?php echo $producto['nombre'];?></h5>
              <h5 class="card-title">$<?php echo $producto['precio'];?></h5>

              <form action="" method="post">
                <input  hidden type="text" name="id" id="id" value="<?php echo  openssl_encrypt($producto['id'],COD,KEY);  ?>">
                <input  hidden type="text" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre'],COD,KEY);?>">
                <input  hidden type="text" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'],COD,KEY);?>">
                <input  hidden type="text" name="descripcion" id="descripcion" value="<?php echo openssl_encrypt($producto['descripcion'],COD,KEY);?>">
                <input  hidden type="text" name="categoria_nombre" id="categoria_nombre" value="<?php echo openssl_encrypt($producto['categoria_nombre'],COD,KEY);?>">
                <input  hidden type="text" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>">
                

                <button 
                  class="btn btn-primary" 
                  name="btnAccion"
                  value="AgregarCarrito"
                  type="submit" >
                  agregar al carrito
                </button>
                

              </form>    
            </div>
          </div>
        </div>
        <?php } ?>  