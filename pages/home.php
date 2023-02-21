<?php
require_once "main/public/top.php";



// echo '<script>';
//             echo 'console.log('. json_encode( $_SESSION['nombresCliente'] ) .')';
//             echo '</script>';
?>
<!-- <link rel="stylesheet" type="text/css" href="../botman/chat.min.css"> -->
      
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

          <div class="carousel-item active">

            <div class="carrusel" style="left: 35%;">
              <h1>Shorts de Baño</h1>
              <button class="btn btn-info"><h5>Comprar para Hombre</h5></button>
            </div>
              
            <img src="../img/c3.jpg" class="d-block w-100 imgCarrusel" alt="..." height="750px">
          </div>

          <div class="carousel-item">

            <div class="carrusel" style="left: 65%;">
              <h1>Trajes de Baño</h1>
              <button class="btn btn-info"><h5>Comprar para Dama</h5></button>
            </div>

            <img src="../img/c2.jpg" class="d-block w-100 imgCarrusel" alt="..." height="750px">
          </div>

          <div class="carousel-item">

            <div class="carrusel" style="left: 65%;">
              <h1>Trajes de Verano</h1>
              <button class="btn btn-info"><h5>Comprar para Dama</h5></button>
            </div>

            <img src="../img/c1.jpg" class="d-block w-100 imgCarrusel" alt="..." height="750px">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <div class="container-fluid">
        <div class="row cardTitles">
            <h2>Productos de la Temporada de Verano</h2>
        </div>

        <div id="idCards" class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100 text-center">
                  <img src="../img/t (11).png" class="card-img-top" alt="...">
                  <div class="card-body">
                      <h5 class="card-title">Classic White</h5>
                    <p class="card-text">
                      La camiseta ideal para cada ocasion! Estilo Long-Sleeve.
                    </p>
                  
                  <a href="#" class="btn btn-primary">Comprar</a>
                  </div>
                </div>
              </div>
            
            <div class="col">
              <div class="card h-100 text-center">
                <img src="../img/t (10).png"  class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Round Red</h5>
                    <p class="card-text">Un estilo deslumbrante en una maravillosa comodidad.</p>
                    <a href="#" class="btn btn-primary">Comprar</a>
                </div>
              </div>
            </div>

            <div class="col">
                <div class="card h-100 text-center">
                  <img src="../img/t (5).png"  class="card-img-top" alt="...">
                  <div class="card-body">
                      <h5 class="card-title">Short White</h5>
                      <p class="card-text">La camiseta por excelencia en comodidad y estilo!</p>
                      <a href="#" class="btn btn-primary">Comprar</a>
                  </div>
                </div>
              </div>
              
        </div><!--End of cards container-->
 
      </div>

      <div class="row">
        <img src="../img/fila.jpg" alt="fila vineyard" class="imagenFila">
      </div>

      <div class="container-fluid">
        <div class="row cardTitles">
            <h2>Best Sellers</h2>
        </div>

        <div id="idCards" class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100 text-center">
                  <img src="../img/t (3).png" class="card-img-top" alt="...">
                  <div class="card-body">
                      <h5 class="card-title">White tee</h5>                 
                  <a href="#" class="btn btn-primary">Comprar</a>
                  </div>
                </div>
              </div>
            
            <div class="col">
              <div class="card h-100 text-center">
                <img src="../img/t (4).png"  class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Non Iron Short Sleeve Shirt</h5>
                    <a href="#" class="btn btn-primary">Comprar</a>
                </div>
              </div>
            </div>

            <div class="col">
                <div class="card h-100 text-center">
                  <img src="../img/t (2).png"  class="card-img-top" alt="...">
                  <div class="card-body">
                      <h5 class="card-title">Red tee</h5>
                      <a href="#" class="btn btn-primary">Comprar</a>
                  </div>
                </div>
              </div>


              
        </div><!--End of cards container-->
 
        
      </div>

      
     <script>
      let aTag = document.getElementById("linkHome")
      aTag.classList.add("active");
     </script>

      <?php
    require_once "main/public/bottom.php";
    ?>