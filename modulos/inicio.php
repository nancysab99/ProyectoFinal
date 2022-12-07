<?php
global $mysqli;
?>


<div class="slider">
  <ul class="slides">
    <li>
      <img class= "responsive-img" src="app/img/slide2.jpg">
    </li>
    <li>
      <img class= "responsive-img" src="app/img/slide1.jpg">
    </li>
    <li>
      <img class= "responsive-img" src="app/img/slide3.jpg">
    </li>
    <li>
      <img class= "responsive-img" src="app/img/slide4.jpg">
    </li>
  </ul>
</div>
<br>
<div>
  <div id="contenedor">
    <div id="tecnologia">   
      <div  class="row">
      <div class="col s12">
        <h5 class=center><b>Lo Mejor en Telefonía</b></h5>
      </div>       
       <center>
          <?php
          $strsql = " SELECT idproducto, nombre_producto, idcategoria, descripcion, precio, cantidad, url_imagen FROM productos LIMIT 4";
            if ($stmt = $mysqli->prepare($strsql)){
              $stmt->execute();
              $stmt->store_result();
              if($stmt->num_rows > 0){
                $stmt->bind_result($idproducto, $nombre_producto, $idcategoria, $descripcion, $precio, $cantidad, $url_imagen);
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
                echo "No hay datos para mostrar";
              }
            }
            else{
              echo"No se pudo preparar la consulta";
            }
          ?>
        </div>
        </center>
      </div>
    </div>
  </div>
  <br> 
    <div id="categorias" class="row">
      <div class="col s12">
        <h5 class=center><b>Nuestras Categorías</b></h5>
      </div>
      <center>
      <?php
            $strsql = "SELECT idcategoria, nombre_categoria, descripcion, url_imagen FROM categorias  LIMIT 4";
            if($stmt = $mysqli->prepare($strsql)){
                $stmt->execute();
                $stmt->store_result();
              if($stmt->num_rows>0){
                $stmt->bind_result($idcategoria, $nombre_categoria, $descripcion, $url_imagen);
                while($stmt->fetch()){
                ?>
                <a href="?modulo=categorias_productos&idcategoria=<?php echo $idcategoria ?>">
                  <div class="col s12 m6">
                    <div id="myContainer" class="card ">
                    <div>
                      <img class="responsive-img" src="<?php echo $url_imagen ?>" alt=""></a>
                    </div>  
                    <div>  
                      <h6><b><?php echo $nombre_categoria?></b></h6>
                    </div>
                    <br>
                    <a href="?modulo=categorias_productos&idcategoria=<?php echo $idcategoria ?>" class= "red darken-3 btn btn-small"><i class="material-icons left">add_circle_outline</i>Ver más</a>
                    <br></br>

                    </div>
                  </div>
                </a>
                <?php
                }
             }
              else{
                echo "No hay datos para mostrar";
              }
            }
            else{
              echo"No se pudo preparar la consulta";
            }
          ?>   
      </center>
    </div>
  </div>
</div> 


 


