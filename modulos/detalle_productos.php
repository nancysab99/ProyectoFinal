<?php
global $mysqli;

$idproducto = $_GET['idproducto'];
  $strsql = " SELECT idproducto, nombre_producto, idcategoria, descripcion, precio, cantidad, url_imagen FROM productos where idproducto=?";
  if ($stmt = $mysqli->prepare($strsql)){
    $stmt->bind_param("i" , $idproducto);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows > 0){
      $stmt->bind_result($idproducto, $nombre_producto, $idcategoria, $descripcion, $precio, $cantidad, $url_imagen);
      $stmt->fetch();
    }
    else{
    echo "No hay nada que mostrar";
    }
  }
  else{
    echo "No se puso preparar la consulta";
  }

?>
  <div class="row">
    <div class="col 16 m6 s12 center">
        <img src="<?php echo $url_imagen ?>" width="300" height="300" alt="">
    </div>
    <div class="col 16 m6 s12 card">
      <h4><?php echo $nombre_producto ?></h4>
      <h5>Precio: <b><?php echo "L".number_format($precio,2)  ?></b></h5>
      Descripcion del producto: <b><span><?php echo $descripcion?></span> </b><br>
      Cantidad en existencia: <b><span><?php echo $cantidad?></span> </b>
      <br><br>
      <a href="?modulo=carrito&producto=<?php echo $idproducto?>" class= "red darken-3 btn"><i class="material-icons left">add_shopping_cart</i>Agregar al carrito</a>
      <br><br>
    </div>
  </div>
