<?php   
global $mysqli; 
global $funciones; 
global $urlweb; 
global $modulo;

$accion = isset($_GET["accion"])? $_GET["accion"]: "default"; 
 
switch($accion){ 
 
    case "ver": 
 
        ?>
        <h3 class="center">Administrador de Productos</h3>
        <a  href="?modulo=agregar_productos&accion=ver" class="btn  red accent-4 modal-trigger">Agregar producto</a>
        <table class="white centered responsive-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Categoría</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $strsql = "SELECT productos.idproducto, productos.nombre_producto, categorias.nombre_categoria, productos.descripcion, productos.url_imagen, productos.precio, productos.cantidad FROM productos INNER JOIN categorias ON categorias.idcategoria=productos.idcategoria ";
                if($stmt = $mysqli->prepare($strsql)){
                    $stmt->execute();
                    $stmt->store_result();
                    if($stmt->num_rows>0){
                        $stmt->bind_result($idproducto, $nombre_producto, $categoria, $descripcion, $url_imagen, $precio, $cantidad);
                        while($stmt->fetch()){
                            ?>
                            <tr>
                                <td><?php echo $idproducto ?></td>
                                <td><?php echo $nombre_producto ?></td>
                                <td><?php echo $categoria ?></td>
                                <td><?php echo $descripcion ?></td>
                                <td><img src="<?php echo $url_imagen ?>" width="100px" height="100px" alt=""></td>
                                <td><?php echo "L".number_format($precio,2) ?></td>
                                <td><?php echo $cantidad ?></td>
                                <td><a href="?modulo=editar_productos"class="btn  grey  modal-trigger">Editar</a></td>
                                <td><a href="javascript:eliminar(<?php echo $idproducto ?>)" class="btn red accent-4">Eliminar</a></td>
                            </tr>
                            <?php
                        }
                    }else{
                        echo "No Hay Registros";
                    }
                }else{
                    echo "No se pudo hacer la consulta";
                }
            ?>
            <tr>
                <td></td>
            </tr>
        </tbody>
    </table>
 
<?php 
break; 
    case "default": 
break; 
 
 
} 
 
?>

<script>
    function eliminar(idproducto){
        var url = '<?php echo $urlweb ?>servicios/ws_admin_productos.php?accion=eliminar';
        fetch(url, {
            method: 'POST',
            body: JSON.stringify({
                "idproducto": idproducto
            })
        })
        .then((response)=> response.json())
        .then ((data)=> {
            console.log(data);
            const row = document.getElementById(idproducto);
            row.remove();
        })
        .catch((error) => {
            console.error(error);
        })
    }
</script>

<script>
   

    function editar (idproducto){
        $.ajax({
            type: "POST",
            data: {'idproducto':idproducto},
            url: "<?php echo $urlweb?>/servicios/ws_<?php echo $modulo?>.php?accion=editar",
            success: function(data){
                return console.log(data);
                json = JSON.parse(data);
                alert(JSON.stringify(json['text']));
            },
            error:function(error){
                console.log(error);
            }
        });
    }
</script>

<div id="modal2" class="modal">
    <div class="modal-content">
        <div class="row center">
        <h4>Agregar producto</h4>
            <div class="input-field col s12 l6">
                <p>Id producto</p>
                <input id="idproducto" placeholder="IDproducto" name="idproducto"  type="number">
            </div>
            <div class="input-field col s12 l6">
            <p>Nombre producto</p>
                <input id="nombre_producto" placeholder="Nombre producto" name="nombre_producto"  type="text">
            </div>
            <br>
            <div class="input-field col s12 l6">
            <p>Id Categoria</p>
                <input id="idcategoria" placeholder="Id Categoria" name="idcategoria"  type="number">
            </div>
            <div class="input-field col s12 l6">
            <p>Descripcion</p>
                <input id="descripcion" placeholder="Descripcion" name="descripcion"  type="text">
            </div>
            <br>
            <div class="input-field col s12 l6">
            <p>Precio</p>
                <input id="precio" placeholder="Precio" name="precio"  type="number">
            </div>
            <div class="input-field col s12 l6">
            <p>Cantidad</p>
                <input id="cantidad" placeholder="Cantidad" name="cantidad"  type="number">
            </div>
            <br>
            <div class="input-field col s12 l6">
                <p>URL</p>
                <input id="url_imagen" placeholder="Url" name="url_imagen"  type="text">
            </div>
            
        </div>
      
    </div>
    <div class="modal-footer">
      <a href="javascript:agregar(<?php echo $idproducto ?>)" class="modal-close waves-effect waves-green btn-flat">Agregar</a>
    </div>
  </div>
  

  <div id="modal3" class="modal">
    <div class="modal-content">
      <h4>editar</h4>
      <form action="Editar">
      <div class="input-field col s12 l6">
                <p>Id producto</p>
                <input id="idproducto" placeholder="IDproducto" name="idproducto"  type="number">
            </div>
      <div class="input-field col s12 l6">
            <p>Nombre producto</p>
                <input id="nombre_producto" placeholder="Nombre producto" name="nombre_producto"  type="text">
            </div>
            <div class="input-field col s12 l6">
            <p>Descripcion</p>
                <input id="descripcion" placeholder="Descripcion" name="descripcion"  type="text">
            </div>
            <div class="input-field col s12 l6">
            <p>Precio</p>
                <input id="precio" placeholder="Precio" name="precio"  type="number">
            </div>
            <div class="input-field col s12 l6">
            <p>Cantidad</p>
                <input id="cantidad" placeholder="Cantidad" name="cantidad"  type="number">
            </div>
            </form>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="javascript:editar(<?php echo $idproducto ?>)" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>