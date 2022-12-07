

<h3 class="center">Carrito de Compra</h3>
 <div class="row">
    <div class="col-12">
    <table class="highlight "> 
 
<thead> 
<tr> 
    <th>Imagen</th> 
    <th>Producto</th> 
    <th>Cantidad</th> 
    <th>Precio</th>  
    <th>Eliminar</th> 
</tr> 
 </thead> 
 <tbody> 
<tr> 

<?php  
 
 
global $mysqli; 
$strsql="SELECT nombre_producto, precio, url_imagen from productos where idproducto =".$_GET['producto']; 
if($stmt= $mysqli->prepare($strsql)){ 
    $stmt->execute(); 
    $stmt->store_result(); 
 
    if($stmt->num_rows>0){ 
        $stmt->bind_result($nombre_producto,  $precio, $url_imagen); 
        while($stmt->fetch()){ 
            ?> 
            <tr> 
                <td><img src="<?php echo $url_imagen ?>" width="100px" height="100px" alt=""></td>
                <td><?php echo $nombre_producto?></td> 
                <td>1</td> 
                <td><?php echo "L".number_format($precio,2)?></td>  
                <td><a href="javascript:eliminar(<?php echo $idproducto ?>)"class="btn red black-text">Eliminar</a></td>
            </tr> 
 
            <?php 
 
        } 
 
 
    }else{ 
        echo "No hay datos en la tabla"; 
    } 
 
}else{ 
    echo "No se pudo preparar la consuta"; 
}

$total=$precio;
?>



</tr>
</tbody>
</table>
<h5>Total: <?php echo "L".number_format($total)?></h5>

    </div>
  
  </div>

  
  <script>
    function eliminar (idproducto){
        var url='<?php echo $urlweb ?>servicios/ws_admin_carrito.php?accion=eliminar';
        fetch(url, (
            method: 'POST',
            body: JSON.stringif((
                "idproducto":idproducto
            ))
        ))
        .then((response)=>response.json())
        .then((data)=>{
            console.log(data)
        })
        .catch((error)=>{
            console.error(error);
        })
    }
</script>

