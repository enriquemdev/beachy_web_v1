<?php
require_once "main/public/top.php";
?>

<?php
//$_GET['page']


  //FILTRADO
  $tallasSelected = [];
  if(isset($_GET['tallas']))
  {
    $tallasSelected = $_GET['tallas'];
  }
  else
  {
    $tallasSelected = 0;
  }

  $categoriasSelected = [];
  if(isset($_GET['categorias']))
  {
    $categoriasSelected = $_GET['categorias'];
  }
  else
  {
    $categoriasSelected = 0;
  }

  $telaSelected = [];
  if(isset($_GET['tela']))
  {
    $telaSelected = $_GET['tela'];
  }
  else
  {
    $telaSelected = 0;
  }

  $coloresSelected = [];
  if(isset($_GET['colores']))
  {
    $coloresSelected = $_GET['colores'];
  }
  else
  {
    $coloresSelected = 0;
  }

  //PAGINACION
  $porPagina = 6;

  

require_once "../controladores/productosControlador.php";
$ins_producto = new productosControlador();

$totalProductos = $ins_producto->totalProductos_controlador($tallasSelected, $categoriasSelected, $telaSelected, $coloresSelected);

$cantPaginas = ceil($totalProductos / $porPagina);
mainModel::console_log("pages".$cantPaginas);

$paginaActual = isset($_GET['page']) ? $_GET['page'] : 1;

$limiteConsulta = (((int)$paginaActual - 1) * $porPagina);

//Traer los datos
$listaProducto = $ins_producto->lista_productos_cliente_controlador($tallasSelected, $categoriasSelected, $telaSelected, $coloresSelected, $limiteConsulta, $porPagina);
$listaDatosCatalogos = $ins_producto->lista_catalogos_cliente_controlador();

?>

  <div class="container-fluid" id="mainContainerProducts">
    <div class="row">
      <div class="col-0 col-sm-3" id="sidebar">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 100%;">
          <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">Sidebar</span>
          </a>
          <hr>

          <form action="" method="GET" id="navbar-form">
            <ul class="nav nav-pills flex-column mb-auto">
              <li class="nav-item" id="itemdenav">
                <button type="submit" href="#" class="nav-link active w-100" aria-current="page" id="boton-filtrar">
                <i class="fa-solid fa-sliders" style="font-size: 25px ;"></i></i> FILTRAR 
                </button>
                
              </li>
              <li class="filtros">
                <a href="#" class="nav-link link-dark categoria" >
                  TALLAS 
                </a>
                <ul>
                  <?php 

                  //mainModel::console_log($_GET['tallas']);
                  foreach($listaDatosCatalogos['tallas'] as $campo)
                  {    
                    $tallasSelec = [];
                    if(isset($_GET['tallas']))
                    {
                      $tallasSelec = $_GET['tallas'];
                    }
                  ?>
                    <li><input type="checkbox" name="tallas[]" value="<?php echo $campo['idTalla']; ?>" <?php if(in_array($campo['idTalla'], $tallasSelec)){echo "checked";}?>>
                     <?php echo $campo['nombreTalla']; ?>
                    </li>
                  <?php 
                  }
                  ?>
                </ul>
              </li>
              <li class="filtros">
                <a href="#" class="nav-link link-dark categoria">
                  
                  CATEGORÍAS
                </a>

                <ul>
                  <?php 
                  foreach($listaDatosCatalogos['categorias'] as $campo)
                  {    

                    $categoriasSelec = [];
                    if(isset($_GET['categorias']))
                    {
                      $categoriasSelec = $_GET['categorias'];
                    }
                  ?>
                    <li><input type="checkbox" name="categorias[]" value="<?php echo $campo['idCategoria']; ?>" <?php if(in_array($campo['idCategoria'], $categoriasSelec)){echo "checked";}?>> 
                    <?php echo $campo['nombreCategoria']; ?></li>
                  <?php 
                  }
                  ?>
                </ul>
              </li>

              <li class="filtros">
                <a href="#" class="nav-link link-dark categoria">
                  
                  TELAS
                </a>

                <ul>
                  <?php 
                  foreach($listaDatosCatalogos['tela'] as $campo)
                  {    

                    $telaSelec = [];
                    if(isset($_GET['tela']))
                    {
                      $telaSelec = $_GET['tela'];
                    }
                  ?>
                    <li><input type="checkbox" name="tela[]" value="<?php echo $campo['idTela']; ?>" <?php if(in_array($campo['idTela'], $telaSelec)){echo "checked";}?>> 
                    <?php echo $campo['nombreTela']; ?>
                  </li>
                  <?php 
                  }
                  ?>
                </ul>
              </li>

              <li class="filtros">
                <a href="#" class="nav-link link-dark categoria">
                  
                  COLORES
                </a>

                <ul>
                  <?php 
                  foreach($listaDatosCatalogos['colores'] as $campo)
                  {    

                    $coloresSelec = [];
                    if(isset($_GET['colores']))
                    {
                      $coloresSelec = $_GET['colores'];
                    }
                  ?>
                    <li><input type="checkbox" name="colores[]" value="<?php echo $campo['idColor']; ?>" <?php if(in_array($campo['idColor'], $coloresSelec)){echo "checked";}?>> 
                    <?php echo $campo['nombreColor']; ?>
                  </li>
                  <?php 
                  }
                  ?>
                </ul>
              </li>

              <?php
              //Aqui se pueden ver las variables del servidor
// $uri = $_SERVER['REQUEST_URI'];
// //echo $uri; // Outputs: URI
 
// $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
 
// $url =  $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ;
// //echo $url; // Outputs: Full URL
 
$variablesGet = $_SERVER['QUERY_STRING'];
//echo $variablesGet; // Outputs: Query String
?>
          
            </ul>
          </form>
          
          <hr>

        </div>
      </div>

      <!--MAIN CONTENT-->
      <div class="col-sm-9 col-12">
        <div class="container" id="mainContentContainer">
          <div class="row cardTitles">
              <h1 id="titulouno">Todos los Productos</h1>

              <div class="w-100" style="position: relative;" id="divPaginacion">
                <nav aria-label="Page navigation example" style="float: right;">
                  <ul class="pagination">

                    <li class="page-item <?php if($paginaActual == 1){echo "disabled";}?>">
                      <a <?php if($paginaActual == 1){echo 'tabindex="-1"';}?> class="page-link" href="<?= SERVERURL ?>pages/products.php? <?= $variablesGet."&page=". ($paginaActual-1)?>">Anterior</a>
                    </li>
                    <?php
                    for ($i = 1; $i <= $cantPaginas; $i++)
                    {
                    ?>
                      <li class="page-item <?php if($paginaActual == $i){echo "active";}?>">
                        <a class="page-link" href="<?= SERVERURL ?>pages/products.php? <?= $variablesGet."&page=". $i?>"><?= $i ?></a>
                      </li>
                    <?php
                    }
                    ?>
                    <li class="page-item <?php if($cantPaginas == $paginaActual ){echo "disabled";}?>">
                      <a <?php if($cantPaginas == $paginaActual){echo 'tabindex="-1"';}?> class="page-link" href="<?= SERVERURL ?>pages/products.php? <?= $variablesGet."&page=". ($paginaActual+1)?>">Siguiente</a>
                   </li>
                  </ul>
                </nav>
              </div>
              
          </div>

          <div id="idCards" class="row row-cols-2 row-cols-md-3 g-4">

          <?php 
					if ($listaProducto != 0)
					{
					foreach($listaProducto as $rows){ ?>
                    
                    <div class="col producto camiseta XS mlarga">
                <div class="card h-100 text-center">
                  <img src="../img/imgProductos/<?= $rows['codigoEstilo'] ?>/main.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                      <h5 class="card-title"><?=$rows['descripcionProducto']?></h5>
                    <!-- <p class="card-text">
                      La camiseta ideal para cada ocasion! Estilo Long-Sleeve.
                    </p> -->
                  
                  <a href="producto.php?codProd=<?= $rows['idProducto'] ?>" class="btn btn-primary">Ver</a>
                  </div>
                </div>
              </div>

					<?php 
					}
					}else{
					?>
						<tr class="text-center"><td colspan="9">No hay registros en el sistema</td></tr>
					<?php 
					} 
					?>

              
        </div><!--End of cards container-->

        <div class="w-100" style="position: relative;" id="divPaginacion">
                <nav aria-label="Page navigation example" style="float: right;">
                  <ul class="pagination">

                    <li class="page-item <?php if($paginaActual == 1){echo "disabled";}?>">
                      <a <?php if($paginaActual == 1){echo 'tabindex="-1"';}?> class="page-link" href="<?= SERVERURL ?>pages/products.php? <?= $variablesGet."&page=". ($paginaActual-1)?>">Anterior</a>
                    </li>
                    <?php
                    for ($i = 1; $i <= $cantPaginas; $i++)
                    {
                    ?>
                      <li class="page-item <?php if($paginaActual == $i){echo "active";}?>">
                        <a class="page-link" href="<?= SERVERURL ?>pages/products.php? <?= $variablesGet."&page=". $i?>"><?= $i ?></a>
                      </li>
                    <?php
                    }
                    ?>
                    <li class="page-item <?php if($cantPaginas == $paginaActual ){echo "disabled";}?>">
                      <a <?php if($cantPaginas == $paginaActual){echo 'tabindex="-1"';}?> class="page-link" href="<?= SERVERURL ?>pages/products.php? <?= $variablesGet."&page=". ($paginaActual+1)?>">Siguiente</a>
                   </li>
                  </ul>
                </nav>
              </div>

        </div>
      </div>
    </div>
  </div>

      <!-- <script src="../script.js"></script> -->
      <script>
      let aTag = document.getElementById("linkProd")
      aTag.classList.add("active");
     </script>

      <?php
    require_once "main/public/bottom.php";
    ?>

