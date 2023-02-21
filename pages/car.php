<?php
require_once "main/public/top.php";
?>
      <!-- CONTENIDO -->
      <section class="h-100" style="background-color: #eee; padding-top: 50px;">
        <div class="container h-100 py-5">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">
      
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-normal mb-0 text-black">Carrito de compras</h3>
                <div>
                  <p class="mb-0"><span class="text-muted">Ordenar por:</span> <a href="#!" class="text-body">Precio <i
                        class="fas fa-angle-down mt-1"></i></a></p>
                </div>
              </div>
      
              <div class="card rounded-3 mb-4">
                <div class="card-body p-4">
                  <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <img
                        src="../img/Camisa1.jpg"
                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <p class="lead fw-normal mb-2">Round Red</p>
                      <p><span class="text-muted">Size: </span>M <span class="text-muted">Color: </span>Red</p>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                      <button class="btn btn-link px-2"
                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                        <i class="fas fa-minus"></i>
                      </button>
      
                      <input id="form1" min="0" name="quantity" value="1" type="number"
                        class="form-control form-control-sm" />
      
                      <button class="btn btn-link px-2"
                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                        <i class="fas fa-plus"></i>
                      </button>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <h5 class="mb-0">$45.00</h5>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                    </div>
                  </div>
                </div>
              </div>
      
              <div class="card rounded-3 mb-4">
                <div class="card-body p-4">
                  <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <img
                        src="../img/Camisa2.jpg"
                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <p class="lead fw-normal mb-2">Classic White</p>
                      <p><span class="text-muted">Size: </span>M <span class="text-muted">Color: </span>White</p>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                      <button class="btn btn-link px-2"
                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                        <i class="fas fa-minus"></i>
                      </button>
      
                      <input id="form1" min="0" name="quantity" value="1" type="number"
                        class="form-control form-control-sm" />
      
                      <button class="btn btn-link px-2"
                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                        <i class="fas fa-plus"></i>
                      </button>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <h5 class="mb-0">$45.00</h5>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                    </div>
                  </div>
                </div>
              </div>
      
              <div class="card">
                <div class="card-body">
                  <a href="checkout.php" style="text-decoration: none; color: black ;"> 
                  <button type="button" class="btn btn-warning btn-block btn-lg">Proceder al pago</button>
                </a>
                </div>
              </div>
      
            </div>
          </div>
        </div>
      </section>

      <script>
      let aTag = document.getElementById("linkCart")
      aTag.classList.add("active");
     </script>

      <?php
    require_once "main/public/bottom.php";
    ?>

