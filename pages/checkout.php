<?php

require_once "main/public/top.php";
// use PHPMailer\PHPMailer\{PHPMailer, SMTP, Exception};

// require '../PHPMailer/src/Exception.php';
// require '../PHPMailer/src/PHPMailer.php';
// require '../PHPMailer/src/SMTP.php';

if (isset($_POST['submit'])) {

    $ip = $_SERVER["REMOTE_ADDR"];
    $captcha = $_POST['g-recaptcha-response'];
    $secretKey = '6Lc5ZwYgAAAAAE_vBYcjJTPocT4LIdPluDRHz7ae';

    $errors = array();

    $url = 'https://www.google.com/recaptcha/api/siteverify?secret='.urlencode($secretKey).'&response='.urlencode($captcha).'&remoteip='.urlencode($ip);
    $response = file_get_contents($url);

    $atributos = json_decode($response, true);

    if (!$atributos['success']) {
        $errors[] = 'Verifica el captcha';
        $respuesta = 'Verificacion captcha de site verify NO lograda a la fecha y hora: '.$atributos['challenge_ts'].' (DATO OBTENIDO DEL JSON DE LA API)';
    }
    else
    {
      $respuesta = 'Verificacion captcha de site verify lograda  a la fecha y hora: '.$atributos['challenge_ts'].' (DATO OBTENIDO DEL JSON DE LA API)';
    }

}

?>
    <!-- CONTENIDO -->
    <!--CHECKOUT-->
    <div class="container" style="margin-top: 100px; margin-bottom: 10px; border: 1px rgb(146, 146, 146) solid; border-radius: 4px;
    background-color: rgba(167, 251, 255, 0.275);">
      <div  style="border: 1px solid black  ; border-radius: 4px; margin: auto; text-align: center; margin-top: 20px; background-color: #3AF0F7;">
        <h2>Checkout </h2>
      </div>
  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Carrito</span>
        <span class="badge badge-secondary badge-pill" style="color: black ;">2</span>
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Round Red</h6>
            <small class="text-muted">Talla M - Cantidad: 1</small>
          </div>
          <span class="text-muted">$45</span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Classic White</h6>
            <small class="text-muted">Talla M - Cantidad: 1</small>
          </div>
          <span class="text-muted">$45</span>
        </li>
        
        <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">Codigo promocional</h6>
            <small>APPSGRAFICAS</small>
          </div>
          <span class="text-success">-$5</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (USD)</span>
          <strong>$85</strong>
        </li>
      </ul>

      <form class="card p-2" >
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Promo code">
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Reclamar</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Dirección de facturación</h4>

      <!-- AQUI ES EL FORM PRINCIPAL -->
      <form class="needs-validation" id="form-check" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" onsubmit="return submitUserForm();" novalidate>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Primeros nombres</label>
            <input type="text" class="form-control" pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]{3,70}" id="firstName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Nombre ingresado no valido.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Apellidos</label>
            <input type="text" class="form-control" pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]{3,70}" id="lastName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Apellido ingreado no valido.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="username">Nombre de usuario</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="text" class="form-control" id="username" pattern="[a-zA-Z@0-9]{3,70}" placeholder="Usuario" required>
            <div class="invalid-feedback" style="width: 100%;">
              Nombre de usuario requerido.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email</label>
          <input type="email" class="form-control"  id="email" placeholder="you@ejemplo.com" required>
          <div class="invalid-feedback">
            Por favor ingrese un email valido para actualizaciones de envío.
          </div>
        </div>

        <div class="mb-3">  
          <label for="address">Dirección</label>
          <input type="text" class="form-control"  id="address" placeholder="1234 Main St" required>
          <div class="invalid-feedback">
            Por favor digite una dirección valida.
          </div>
        </div>

        <div class="mb-3">
          <label for="address2">Dirección 2 <span class="text-muted">(Opcional)</span></label>
          <input type="text" class="form-control" pattern="[a-zA-ZáéíóúÁÉÍÓÚ.#0-9 ]{3,100}" id="address2" placeholder="Apartment or suite">
        </div>

        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">País</label>
            <select class="custom-select d-block w-100" id="country" required>
              <option value="">Escoger...</option>
              <option>United States</option>
            </select>
            <div class="invalid-feedback">
              Por favor, seleccione un país valido.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">Departamento</label>
            <select class="custom-select d-block w-100" id="state" required>
              <option value="">Escoger...</option>
              <option>California</option>
            </select>
            <div class="invalid-feedback">
              Por favor, seleccione un departamento valido.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Código Postal</label>
            <input type="text" class="form-control"  id="zip" placeholder="" required>
            <div class="invalid-feedback">
              Ingrese código postal valido.
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="same-address">
          <label class="custom-control-label" for="same-address">Utilizar dirección para envíos.</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="save-info">
          <label class="custom-control-label" for="save-info">Guardar información para próxima gestión.</label>
        </div>
        <hr class="mb-4">

        <h4 class="mb-3">Método de pago</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="credit">Tarjeta de crédito</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="debit">Tarjeta de débito</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="paypal">PayPal</label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="cc-name">Nombre en tarjeta</label>
            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]{3,100}" class="form-control" id="cc-name" placeholder="" required>
            <small class="text-muted">Nombre completo a como sale en la tarjeta</small>
            <div class="invalid-feedback">
              Name on card is required
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="cc-number">Número de tarjeta</label>
            <input type="text" class="form-control" pattern="[0-9-]{3,20}" id="cc-number" placeholder="" required>
            <div class="invalid-feedback">
              Registre un número de tarjeta valido.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3" style="position: relative;">
            <label for="cc-expiration">Fecha de vencimiento</label>
            <input type="text" class="form-control" pattern="^[0-9]{2}[*]{1}[0-9]{2}$" id="cc-expiration" placeholder="MM/YY" required>
            <div class="weird" >
            
            </div>
            
            <div class="invalid-feedback">
              Ingrese fecha de vencimiento valida
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="cc-cvv">CVV</label>
            <input type="text" class="form-control"pattern="[0-9]{3}" id="cc-cvv" placeholder="" required>
            <div class="invalid-feedback">
              Security code required
            </div>
          </div>
        </div>
        <div class="g-recaptcha" data-sitekey="6Lc5ZwYgAAAAACSSl_LcNUDnwHCJx2nkjyBsS5Fw" data-callback="verifyCaptcha"></div>
        <div id="g-recaptcha-error"></div>
        <hr class="mb-4">
        <!--
        <button class="g-recaptcha btn btn-primary btn-lg btn-block" 
        data-sitekey="6LfwWAQgAAAAABeRkPt-pTX7tPcc0KWa2kt2edLH" 
        data-callback='onSubmit' 
        data-action='submit'
        type="submit"
        >Submit</button>-->
        <!--<button class="btn btn-primary btn-lg btn-block" type="submit">Realizar pago</button>-->
        <label for="input"></label>
        <input class="btn btn-primary btn-lg btn-block hidden" id="input" type="submit" name="submit" value="Submit">
      </form>

      <!-- VALIDACION RESPUESTA CAPTCHA -->
<?php if (isset($respuesta)) { ?>
                <div class="row py-3">
                    <div class="col-lg-6 col-md-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo $respuesta; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            <?php } ?>
    </div>
  </div>
</div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
      <!-- FUncion de abajo sospechosa 
    <script>
   function onSubmit(token) {
     document.getElementById("form-check").submit();
   }
 </script>-->

 <script>
   function submitUserForm() {
    var response = grecaptcha.getResponse();
    if(response.length == 0) {
        document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">This field is required.</span>';
        return false;
    }
    return true;
}
 
function verifyCaptcha() {
    document.getElementById('g-recaptcha-error').innerHTML = '';
}
 </script>

<?php
    require_once "main/public/bottom.php";
    ?>