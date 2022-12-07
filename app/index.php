<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <link rel="stylesheet" href="<?php echo $urlweb?>app/css/estilo.css">
    <title>Proyecto Web</title>
</head>

<body> 
<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
  });
</script>
<!--Iniciar sesion -->

<div id="modal1" class="modal"> 
  <div class="modal-content"> 
  <h4>Vista Administrador</h4>
      <a href="?modulo=admin_productos&accion=ver" class=" btn red accent-4">Administrar Productos</a>
      <a href="?modulo=admin_categorias&accion=ver" class=" btn red accent-4">Administrar Categorías</a>

      <br><br>
 

    
  </div> 
</div>
  <div>
    <div class="navbar-fixed">
      <nav class="white " role="navigation">
        <div class="container">
          <div class="nav-wrapper">
            <div id="logo-container">
            <a href="index.php" class="brand-logo"><img src="app/img/logo-elektra.png" width="200" height="45" alt=""></a>
            </div>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="?modulo=carrito&producto=<?php echo $idproducto; ?>"> <i class="material-icons red-text">shopping_cart</i></a></li>
                <li><a data-target="modal1" class="modal-trigger red-text""><i class="material-icons">assignment_ind</i></a></li>
            </ul>
          </div>	  
        </div>
      </nav>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.slider');
        var instances = M.Slider.init(elems);
      });

      document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.dropdown-trigger');
        var instances = M.Dropdown.init(elems);
      });
    </script>

    <ul id='dropdown1' class='dropdown-content'>
        <li><a class="red-text" href="?modulo=categorias_productos&idcategoria=1">Celulares</a></li>
        <li class="divider" tabindex="-1"></li>
        <li><a class="red-text"  href="?modulo=categorias_productos&idcategoria=2">Computadoras</a></li>
        <li class="divider" tabindex="-1"></li>
        <li><a class="red-text"  href="?modulo=categorias_productos&idcategoria=3">Cámaras</a></li>
        <li class="divider" tabindex="-1"></li>
        <li><a  class="red-text" href="?modulo=categorias_productos&idcategoria=4">Televisores</a></li>
    </ul>
    <div class= "container" id="principal">
        <nav id="menu" class=" red accent-4" >
            <div  class="nav-wrapper">
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="sass.html"><a class='dropdown-trigger btn,blue darken-4' href='#' data-target='dropdown1'>Categorias<i class="material-icons right">arrow_drop_down</i></a>
                </a></li>                
              </ul>
            </div>
        </nav>
    </div>
  </div> 
  <div class="container">
    <?php $funciones->openModule($modulo);?>
  </div>
  <footer class="page-footer  red accent-4">     
    <div class="footer-copyright">
      <div class="container">
        © 2022 Desarrollo de Aplicaciones en Internet
        <a class="grey-text text-lighten-4 right" href="#!">www.elektra.hn</a>
      </div>
    </div>
  </footer>   
</body>
</html>

