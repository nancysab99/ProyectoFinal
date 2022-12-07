<?php
global $mysqli; 
global $funciones; 
global $urlweb; 
global $modulo;

?>

<div class="container">
<h3 class="center">Agregar Producto</h3>

    <form class="col s12" method="POST">
        <div class="row center">
        <div class="input-field col s12 l6">
                <input name="idproducto" type="number">
                <label>ID Producto</label>
            </div>
            <div class="input-field col s12 l6">
                <input name="nombre_producto" type="text">
                <label>Nombre Producto</label>
            </div>
            <div class="input-field col s12 l6">
                <input name="idcategoria" type="number">
                <label>ID Categoría</label>
            </div>
            <div class="input-field col s12 l6">
                <input name="descripcion" type="text">
                <label>Descripcion del Producto</label>
            </div>
            <div class="input-field col s12 l6">
                <input name="precio" type="number">
                <label>Precio</label>
            </div>
            <div class="input-field col s12 l6">
                <input name="cantidad" type="number">
                <label>Cantidad</label>
            </div>
            <div class="input-field col s12 l6">
                <input name="url_imagen" type="text" >
                <label>URL (Imagen)</label>
            </div> 
            <button class="btn waves-effect waves-light btn-small grey" type="submit" name="agregar">Agregar Producto
            <i class="material-icons left">send</i>
            </button>
        </div>  
    </form>
    <div>  
    <a class="waves-effect waves-light btn-small grey" href="?modulo=admin_productos&accion=ver">Admin de productos</a>
    </div>
    <br></br>
</div>

<?php
    if (isset($_POST['agregar'])){
        if (strlen($_POST['idproducto']) >= 1 &&
            strlen($_POST['nombre_producto']) >= 1 &&
            strlen($_POST['idcategoria']) >= 1 && 
            strlen($_POST['descripcion']) >= 1 &&
            strlen($_POST['precio']) >=1 &&
            strlen($_POST['cantidad']) >= 1 && 
            strlen($_POST['url_imagen']) >= 1)
        {
            $idproducto= trim($_POST['idproducto']);
            $nombre_producto= trim($_POST['nombre_producto']);
            $idcategoria= trim($_POST['idcategoria']);
            $descripcion= trim($_POST['descripcion']);
            $precio= trim($_POST['precio']);
            $cantidad= trim($_POST['cantidad']);
            $url_imagen= trim($_POST['url_imagen']);
            $strsql ="INSERT INTO productos(idproducto, nombre_producto, idcategoria, descripcion, precio, cantidad, url_imagen) VALUES ('$idproducto','$nombre_producto','$idcategoria','$descripcion','$precio','$cantidad','$url_imagen')";
            $resultado=mysqli_query($mysqli,$strsql);
            if ($resultado) {
                ?>
                    <?php echo "Producto agregado exitosamente"?>
                    <?php
                    mysqli_close($mysqli);
                } else {
                    ?>
                    <?php echo "Error al agregar el producto."?>
                    <?php
                }
            }else {
                ?>
                <?php echo "Hay campos vacios"?>
                <?php
            }
    }
?>