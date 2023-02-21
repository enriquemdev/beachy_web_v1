<?php
require_once "main/public/top.php";
?>
<?php
require_once "../controladores/productosControlador.php";
$ins_producto = new productosControlador();

$producto = $ins_producto->producto_cliente_controlador($_GET['codProd']);
$tallas = $ins_producto->tallas_producto_cliente_controlador($_GET['codProd']);

?>
  <div class="container-fluid" id="primerElemento">
      <div class="row" id="contenedor">
         
          <div class="col-md-2 col-4" id="fotos">
                <div class="row">
                    <div class="imgSmall">
                    <img src="../img/imgProductos/<?= $producto['codigoEstilo'] ?>/main.jpeg" class="fotoSmall" alt="" width="80%">
                    </div>
                
                </div>
              <div class="row">
                  <div class="imgSmall">
                    <img src="../img/imgProductos/<?= $producto['codigoEstilo'] ?>/front.jpeg" class="fotoSmall" alt="" width="80%">
                  </div>
                
              </div>
              <div class="row">
                  <div class="imgSmall">
                    <img src="../img/imgProductos/<?= $producto['codigoEstilo'] ?>/back.jpeg" class="fotoSmall" alt="" width="80%">
                  </div>
                
              </div>
              
          </div>
          <div class="col-md-6 col-8">
            <div class="row">
                <img src="../img/imgProductos/<?= $producto['codigoEstilo'] ?>/main.jpeg" alt="" id="mainPhoto">
              </div>
          </div>
          <div class="col-md-4 col-12">
            <form class="needs-validation" novalidate>
              <div>
                <h1><?= $producto['descripcionProducto'] ?></h1>
                <h4>Precio: <span><?= mainModel::formatDollar($producto['precioProducto']) ?></span></h4>
                <h3>Escoja Su talla:</h3>

                <ul>
                    <!-- <li><input type="checkbox" name="" id="XS" value="1" required> XS HOMBRE
                      <div class="invalid-feedback">
                        Seleccione una talla
                      </div>
                    </li> -->
                    <?php 
                    if ($tallas != 0)
                    {
                      foreach($tallas as $rows)
                      { ?>

                      <li><input type="checkbox" name="tallasProducto[]" value="<?= $rows['tallaProducto'] ?>"> <?= $rows['nombreTalla'] ?></li>
                      <?php 
                      }
                    }else{
                    ?>
                      <li>No hay tallas disponibles para este producto</li>
                    <?php 
                    } 
                    ?>
                </ul>

                <button type="submit" class="btn btn-primary btn-block mb-4">Agregar a carrito</button>
              </div>
            </form>
          </div>
      </div>
  </div>

      <script>
          document.onclick = evento;

        function evento(e){
            let elementoClicked;

            if (e == null)
            {
                elementoClicked = event.srcElement;
            }
            else
            {
                elementoClicked = e.target;
            }

            if (elementoClicked.className == 'fotoSmall')
            {
                document.getElementById("mainPhoto").src = elementoClicked.src;
            }
            
        }
      </script>
  
      <!-- Validations -->

      <script src="form-validation.js"></script>
      <script>
          // Example starter JavaScript for disabling form submissions if there are invalid fields
          (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
              .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                  if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                  }

                  form.classList.add('was-validated')
                }, false)
              })
          })()

          
      </script>

<?php
    require_once "main/public/bottom.php";
    ?>