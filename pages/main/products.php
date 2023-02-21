<?php
require_once "main/public/top.php";
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
          <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
              <a href="#" class="nav-link active" aria-current="page">
                FILTRAR
              </a>
            </li>
            <li>
              <a href="#" class="nav-link link-dark">
                TALLAS
              </a>
              <ul>
                <li><input type="checkbox" name="" id="XS"> XS</li>
                <li><input type="checkbox" name="" id="S"> S</li>
                <li><input type="checkbox" name="" id="M"> M</li>
                <li><input type="checkbox" name="" id="L"> L</li>
                <li><input type="checkbox" name="" id="XL"> XL</li>
                <li><input type="checkbox" name="" id="OSZ"> ONE SIZE</li>
              </ul>
            </li>
            <li>
              <a href="#" class="nav-link link-dark">
                
                CATEGORIAS
              </a>

              <ul>
                <li><input type="checkbox" name="" id="camiseta"> CAMISETAS</li>
                <li><input type="checkbox" name="" id="camisa"> CAMISAS</li>
                <li><input type="checkbox" name="" id="accesorio"> ACCESORIOS</li>

              </ul>
            </li>
            <li>
              <a href="#" class="nav-link link-dark">
                MANGAS
              </a>

              <ul>
                <li><input type="checkbox" name="" id="mcorta"> MANGA CORTA</li>
                <li><input type="checkbox" name="" id="mlarga"> MANGA LARGA</li>

              </ul>
            </li>
        
          </ul>
          <hr>
          <!--
            <div class="dropdown">
            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
              <strong>mdo</strong>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
              <li><a class="dropdown-item" href="#">New project...</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
          </div>

          <div class="dropdown">
            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
              <strong>mdo</strong>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
              <li><a class="dropdown-item" href="#">New project...</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
          </div>
          -->

        </div>
      </div>

      <!--MAIN CONTENT-->
      <div class="col-sm-9 col-12">
        <div class="container" id="mainContentContainer">
          <div class="row cardTitles">
              <h1>Todos los Productos</h1>
          </div>

          <div id="idCards" class="row row-cols-2 row-cols-md-3 g-4">

            <div class="col producto camiseta XS mlarga">
                <div class="card h-100 text-center">
                  <img src="../img/t (11).png" class="card-img-top" alt="...">
                  <div class="card-body">
                      <h5 class="card-title">Classic White</h5>
                    <p class="card-text">
                      La camiseta ideal para cada ocasion! Estilo Long-Sleeve.
                    </p>
                  
                  <a href="producto.html" class="btn btn-primary">Comprar</a>
                  </div>
                </div>
              </div>
            
            <div class="col producto camiseta S L mlarga">
              <div class="card h-100 text-center">
                <img src="../img/t (10).png"  class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Round Red</h5>
                    <p class="card-text">Un estilo deslumbrante en una maravillosa comodidad.</p>
                    <a href="producto.html" class="btn btn-primary">Comprar</a>
                </div>
              </div>
            </div>

            <div class="col producto camiseta XS mcorta">
                <div class="card h-100 text-center">
                  <img src="../img/t (5).png"  class="card-img-top" alt="...">
                  <div class="card-body">
                      <h5 class="card-title">Short White</h5>
                      <p class="card-text">La camiseta por excelencia en comodidad y estilo!</p>
                      <a href="producto.html" class="btn btn-primary">Comprar</a>
                  </div>
                </div>
              </div>

              <div class="col producto camiseta mcorta">
                <div class="card h-100 text-center">
                  <img src="../img/t (9).png" class="card-img-top" alt="...">
                  <div class="card-body">
                      <h5 class="card-title">Classic White</h5>
                    <p class="card-text">
                      La camiseta ideal para cada ocasion! Estilo Long-Sleeve.
                    </p>
                  
                  <a href="producto.html" class="btn btn-primary">Comprar</a>
                  </div>
                </div>
              </div>

              <div class="col producto accesorio OSZ">
                <div class="card h-100 text-center">
                  <img src="../img/t (8).png" class="card-img-top" alt="...">
                  <div class="card-body">
                      <h5 class="card-title">Classic White</h5>
                    <p class="card-text">
                      La camiseta ideal para cada ocasion! Estilo Long-Sleeve.
                    </p>
                  
                  <a href="producto.html" class="btn btn-primary">Comprar</a>
                  </div>
                </div>
              </div>

              <div class="col producto accesorio OSZ">
                <div class="card h-100 text-center">
                  <img src="../img/t (6).png" class="card-img-top" alt="...">
                  <div class="card-body">
                      <h5 class="card-title">Classic White</h5>
                    <p class="card-text">
                      La camiseta ideal para cada ocasion! Estilo Long-Sleeve.
                    </p>
                  
                  <a href="producto.html" class="btn btn-primary">Comprar</a>
                  </div>
                </div>
              </div>

              <div class="col producto accesorio OSZ">
                <div class="card h-100 text-center">
                  <img src="../img/t (7).png" class="card-img-top" alt="...">
                  <div class="card-body">
                      <h5 class="card-title">Classic White</h5>
                    <p class="card-text">
                      La camiseta ideal para cada ocasion! Estilo Long-Sleeve.
                    </p>
                  
                  <a href="producto.html" class="btn btn-primary">Comprar</a>
                  </div>
                </div>
              </div>
              
        </div><!--End of cards container-->

        </div>
      </div>
    </div>
  </div>

      <script src="../script.js"></script>
      <script>
      let aTag = document.getElementById("linkProd")
      aTag.classList.add("active");
     </script>

      <?php
    require_once "main/public/bottom.php";
    ?>

