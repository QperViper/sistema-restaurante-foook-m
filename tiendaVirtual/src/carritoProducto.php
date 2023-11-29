<?php 

session_start();

$mensaje = ""; // Variable de mensaje general
$mensajeSql = ""; // Variable de mensaje específico para consultas SQL

if (isset($_POST['btnAccion'])) {
    switch ($_POST['btnAccion']) {
        // ... (otros casos)

        case 'EliminarProductoCarrito':
            if (isset($_SESSION['carrito']) && is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                $id = openssl_decrypt($_POST['id'], COD, KEY);

                foreach ($_SESSION['carrito'] as $indice => $producto) {
                    if ($producto['id'] == $id) {
                        unset($_SESSION['carrito'][$indice]);
                        echo "<script>alert('Elemento borrado')</script>";
                        break;
                    }
                }
            } else {
                $mensaje .= "Error al intentar eliminar producto del carrito. ";
            }
            header('Location: listarCarrito.php');
            exit;
            break;

        case 'EliminarProducto':
            if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                $id = openssl_decrypt($_POST['id'], COD, KEY);

                // Tu conexión a la base de datos debería estar establecida antes de este punto
                include('../config/config.php');
                include('../config/connection.php');

                // Utiliza prepared statements para prevenir SQL injection
                $sentencia = $pdo->prepare("DELETE FROM producto WHERE id = :id");
                $sentencia->bindParam(':id', $id, PDO::PARAM_INT);
                $resultado = $sentencia->execute();

                if ($resultado) {
                    $mensajeSql = "La eliminación fue exitosa.";
                } else {
                    $mensajeSql = "Error al intentar eliminar el producto.";
                }

                echo $mensajeSql;

                // Añadir el código necesario para manejar la respuesta después de la eliminación
            } else {
                $mensaje .= "Error al intentar eliminar producto. ";
            }
            break;
        
            case 'AgregarCarrito':
                function generarIDProducto() {
                    return rand(1, 9999999);
                  }
                  
                if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                    $id = openssl_decrypt($_POST['id'],COD,KEY);
                   $mensaje.= "Ok id correcto =".$id. "</br>";
                }else{
                    $mensaje.= "Error id correcto =".$id. "</br>"; break;  
                }
                if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){
                    $nombre = openssl_decrypt($_POST['nombre'],COD,KEY);
                    $mensaje.= "Ok nombre  =".$nombre. "</br>";
                }else{
                    $mensaje.= "Error nombre =".$nombre. "</br>"; break;  
                }
                if(is_string(openssl_decrypt($_POST['categoria_nombre'],COD,KEY))){
                    $categoria_nombre = openssl_decrypt($_POST['categoria_nombre'],COD,KEY);
                    $mensaje.= "Ok categoria_nombre  =".$categoria_nombre. "</br>";
                }else{
                    $mensaje.= "Error categoria_nombre =".$categoria_nombre. "</br>";  
                }
    
                if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){
                    $cantidad = openssl_decrypt($_POST['cantidad'],COD,KEY);
                    $mensaje.= "Ok cantidad =".$cantidad. "</br>";
                }else{
                    $mensaje.= "Error cantidad =".$cantidad. "</br>"; break;  
                }
                if(is_string(openssl_decrypt($_POST['descripcion'],COD,KEY))){
                    $descripcion = openssl_decrypt($_POST['descripcion'],COD,KEY);
                    $mensaje.= "Ok descripcion =".$descripcion. "</br>";
                }else{
                    $mensaje.= "Error descripcion =".$descripcion. "</br>"; break;  
                }
                if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){
                    $precio = openssl_decrypt($_POST['precio'],COD,KEY);
                    $mensaje.= "Ok descripcion =".$precio. "</br>";
                }else{
                    $mensaje.= "Error descripcion =".$precio. "</br>"; break;  
                }
            if(!isset($_SESSION['carrito'])){
                $producto = array(
                    'id' => $id,
                    'nombre' => $nombre,
                    'precio' => $precio,
                    'cantidad' => $cantidad
                );
                $_SESSION['carrito'][0]=$producto;
            }else{
                
                $numeroProductos=count($_SESSION['carrito']);
                $producto = array(
                    'id' => $id,
                    'nombre' => $nombre,
                    'precio' => $precio,
                    'cantidad' => $cantidad
                );
                
                $_SESSION['carrito'][$numeroProductos]=$producto;
               
            }
            //$mensaje= print_r($_SESSION,true);
        header('Location: listarProducto.php#carta');
        exit;
        break;
    case 'modificarProducto':
       
        $nombre= $_POST['nuevoNombreProducto'];
        $descripcion = $_POST['nuevaDescripcionProducto'];
        $precio = $_POST['nuevoPrecioProducto'];
        $categoria = $_POST['nuevaCategoriaProducto'];

        $sentencia = $pdo->prepare("UPDATE producto SET nombre = :nuevo_nombre, precio = :nuevo_precio WHERE id = :id");
        $sentencia->bindParam(':nuevo_nombre', $nuevo_nombre, PDO::PARAM_STR);
        $sentencia->bindParam(':nuevo_precio', $nuevo_precio, PDO::PARAM_INT);
        $sentencia->bindParam(':id', $id, PDO::PARAM_INT);

        $resultado = $sentencia->execute();
    header('Location: home.php');
    exit;
    break;
    
    case 'validarUsuario':
        include('../config/config.php');
        include('../config/connection.php');
        $rut = $_POST['rut'];
        $password = $_POST['password'];

        $sentencia = $pdo->prepare("SELECT * FROM cajero");
        $sentencia->execute();
        $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        $validado = false; // Initialize $validado outside the loop

        foreach ($listaProductos as $producto) {
            if ($rut == $producto['rut']) {
                if ($password == $producto['password']) {
                    $validado = true;
                    header('Location: ./admin/home.php');
                    exit(); // Add exit to stop further execution after redirection
                } else {
                    $mensaje = "<script>alert('Contraseña incorrecta');</script>";
                }
            } else {
                $mensaje = "<script>alert('RUT incorrecto');</script>";
            }
        }
       header('Location: ./admin/login.php');
       exit;
        break;

        


       

 
        
    }


}


?>
