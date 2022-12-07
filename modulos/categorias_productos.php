<?php
global $mysqli;
?>
<h3 class="center">Productos disponibles</h3>

<?php

$idcategoria=$_GET["idcategoria"];

$strsql = "SELECT idproducto, nombre_producto, idcategoria, descripcion, precio,cantidad, url_imagen FROM productos WHERE idcategoria=?";
if($stmt = $mysqli->prepare($strsql)){
    $stmt->bind_param("i", $idcategoria);
    $stmt->execute();
    $stmt -> store_result();
    if($stmt->num_rows>0){
        $stmt->bind_result($idproducto,$nombre_producto,$idcategoria,$descripcion,$precio,$cantidad,$url_imagen);
        $stmt->fetch();

    }else{
        echo"no hay nada que mostrar";
    }
}else{
    echo"No se pudo preparar la consulta";
}

?>

<div class="row center">
    
    <?php
    
     $strsql="SELECT idproducto, nombre_producto,idcategoria, descripcion, precio, url_imagen FROM productos where idcategoria=$idcategoria";
     if($stmt=$mysqli->prepare($strsql)){
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows>0){
            $stmt->bind_result($idproducto, $nombre_producto,$idcategoria, $descripcion, $precio, $url_imagen);
            while($stmt->fetch()){
                ?>
                <a href="?modulo=detalle_productos&idproducto=<?php echo $idproducto ?>">
                <div class="col 13 s12 m3">
                    <div class="card">
                    <div >
                      <div>
                        <h6 class="black-text text-darken-2"><b><?php echo $nombre_producto?></b></h6>
                      </div>
                      <img class="responsive-img" src="<?php echo $url_imagen ?>" alt=""></a></div>
                      <div><span><b> <?php echo "L".number_format($precio)?></b></span></div>
                      <br>
                      <a href="?modulo=carrito&producto=<?php echo $idproducto?>" class= "red darken-3 btn btn-small"><i class="material-icons left">add_shopping_cart</i>Agregar al carrito</a>
                      <br></br>
                    </div>
                    </div>
                  </a>
            <?php
            }
        }
     else{
        echo "No hay datos a mostrar";
     }
    }else{
        echo "No se pudo preparar la consulta";
    }

    ?>

</div>
