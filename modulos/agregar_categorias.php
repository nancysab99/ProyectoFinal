<?php
global $mysqli; 
global $urlweb; 

?>

<div class="container">
<h3 class="center">Agregar Categoría</h3>

    <form class="col s12" method="POST">
        <div class="row center">
        <div class="input-field col s12 l6">
                <input name="idcategoria" type="number">
                <label>ID Categoria</label>
            </div>
            <div class="input-field col s12 l6">
                <input name="nombre_categoria" type="text">
                <label>Nombre Categoria</label>
            </div>
            <div class="input-field col s12 l6">
                <input name="descripcion" type="text">
                <label>Descripcion del la Categoría</label>
            </div>
            <div class="input-field col s12 l6">
                <input name="url_imagen" type="text" >
                <label>URL (Imagen)</label>
            </div> 
            <button class="btn-left waves-effect waves-light btn-small grey" type="submit" name="agregar">Agregar Categoria
            <i class="material-icons left">send</i>
            </button>
        </div>
        
    </form>
    <div class="center">  
    <a class="waves-effect waves-light btn-small grey" href="?modulo=admin_categorias&accion=ver">Admin de productos</a>
    </div>
    <br></br>
</div>

<?php
    if (isset($_POST['agregar'])){
        if (strlen($_POST['idcategoria']) >= 1 &&
            strlen($_POST['nombre_categoria']) >= 1 &&
            strlen($_POST['descripcion']) >= 1 &&
            strlen($_POST['url_imagen']) >= 1)
        {
            $idcategoria= trim($_POST['idcategoria']);
            $nombre_categoria= trim($_POST['nombre_categoria']);
            $descripcion= trim($_POST['descripcion']);
            $url_imagen= trim($_POST['url_imagen']);
            $strsql ="INSERT INTO categorias(idcategoria,nombre_categoria,descripcion,url_imagen) VALUES ('$idcategoria','$nombre_categoria','$descripcion','$url_imagen')";
            $resultado=mysqli_query($mysqli,$strsql);
            if ($resultado) {
            ?>
                <?php echo "Categoria agregado exitosamente"?>
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