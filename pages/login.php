<?php
    $peticionAjax = false;
    require_once "../config/app.php";
	if(isset($_POST['loginEmailU']) && isset($_POST['loginPassU'])){
		require_once "../controladores/loginUsuariosControlador.php";
		$ins_login2=new loginUsuarioControlador();

		echo $ins_login2->iniciar_sesion_cliente_controlador();
	}?>
    
    <?php
    //require_once "../dependencias/css/link.php" ;
    require_once "main/public/top.php";
    ?>
      <!-- CONTENIDO -->
      <div class="container" style="margin-top: 90px; max-width: 500px; border: 1px rgb(175, 175, 175) solid; border-radius: 10px; padding: 20px; 
      margin-bottom: 40px;
      background-color: rgba(167, 251, 255, 0.275);">

      
          <!-- Pills navs -->
      <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
          <li class="nav-item" role="presentation" id="btnLogin">
            <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" role="tab"
              aria-controls="pills-login" aria-selected="false">Login</a>
          </li>
          <li class="nav-item" role="presentation" id="btnRegister">
            <a class="nav-link" id="tab-register" data-mdb-toggle="pill" role="tab"
              aria-controls="pills-register" aria-selected="true">Register</a>
          </li>
        </ul>
  <!-- Pills navs -->
  
      <!-- Pills content -->
      <div class="tab-content">
        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
          <!-- action="<?php //echo SERVERURL; ?>controladores/loginUsuariosControlador.php" -->
          <form id="FormLog" class="needs-validation" method="POST" data-form= "save" autocomplete="off" novalidate>
            <!-- <div class="text-center mb-3">
              <p>Sign in with:</p>
              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
              </button>
      
              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-google"></i>
              </button>
      
              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-twitter"></i>
              </button>
      
              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-github"></i>
              </button>
            </div>
      
            <p class="text-center">or:</p> -->

            
                  <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" id="loginName" class="form-control" name="loginEmailU" required">
                  <label class="form-label" for="loginName">Email</label>
                 
                </div>
          
                <!-- Password input -->
                <div class="form-outline mb-4"> 
                  <input type="password" id="loginPassword" class="form-control" name="loginPassU" required/>
                  <label class="form-label" for="loginPassword">Contraseña</label>
                 
                </div>
          
                
                <!-- <div class="row mb-4">
                  <div class="col-md-6 d-flex justify-content-center">
                    
                    <div class="form-check mb-3 mb-md-0">
                      <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                      <label class="form-check-label" for="loginCheck"> Remember me </label>
                    </div>
                  </div>
          
                  <div class="col-md-6 d-flex justify-content-center">
                    
                    <a href="#!">Forgot password?</a>
                  </div>
                </div> -->
          
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
            
            
      
            <!-- Register buttons -->
            <div class="text-center">
              <p>Not a member? <a href="#!">Register</a></p>
            </div>
          </form>

        </div>
        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
          <form id="FormReg" class="FormularioAjax needs-validation" action="<?php echo SERVERURL; ?>/ajax/registroUsuariosAjax.php" method="POST" data-form= "save" autocomplete="off" novalidate>
            <!-- <div class="text-center mb-3">
              <p>Sign up with:</p>
              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
              </button>
      
              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-google"></i>
              </button>
      
              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-twitter"></i>
              </button>
      
              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-github"></i>
              </button>
            </div>
      
            <p class="text-center">or:</p> -->
      
            <!-- Name input -->
            <div class="form-outline mb-4">
              <input type="text" id="registerName" class="form-control" name="usuarioNombre" required>
              <label class="form-label" for="registerName">Nombre</label>
              <div class="invalid-feedback" style="width: 100%;">
                    Ingrese su Nombre
                  </div>
            </div>
      
            <!-- Username input -->
            <div class="form-outline mb-4">
              <input type="text" id="usuarioApellido" class="form-control" name="usuarioApellido" required>
              <label class="form-label" for="usuarioApellido">Apellido</label>
              <div class="invalid-feedback" style="width: 100%;">
                    Ingrese su Apellido
                  </div>
            </div>
      
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="registerEmail" class="form-control" name="usuarioEmail" required>
              <label class="form-label" for="registerEmail">Email</label>
              <div class="invalid-feedback" style="width: 100%;">
                    Ingrese un email valido.
                  </div>
            </div>

            <!-- Phone input -->
            <div class="form-outline mb-4">
              <input type="text" id="usuarioTelefono" class="form-control" name="usuarioTelefono" pattern="\(?(\d{4})\)?[-\.\s]?(\d{4})">
              <label class="form-label" for="usuarioTelefono">Telefono</label>
              <div class="invalid-feedback" style="width: 100%;">
                    Ingrese su un formato de telefono válido o no agregue uno.
                  </div>
            </div>
      
            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="registerPassword" class="form-control" name="usuarioContra" maxlength="20" minlength="7" required>
              <label class="form-label" for="registerPassword">Password</label>
              <div class="invalid-feedback" style="width: 100%;">
                    Ingrese una contraseña de entre 7 a 20 caracteres
                  </div>
            </div>
      
            <!-- Repeat Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="registerRepeatPassword" class="form-control" name="usuarioContra2" maxlength="20" minlength="7" required>
              <label class="form-label" for="registerRepeatPassword">Repeat password</label>
              <div class="invalid-feedback" style="width: 100%;">
                    Ingrese una contraseña de entre 7 a 20 caracteres
                  </div>
            </div>
      
            <!-- Checkbox -->
            <!-- <div class="form-check d-flex justify-content-center mb-4">
              <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
                aria-describedby="registerCheckHelpText" />
              <label class="form-check-label" for="registerCheck">
                I have read and agree to the terms
              </label>
            </div> -->
      
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-3">Registrar</button>
          </form>
        </div>
      </div>
  <!-- Pills content -->
      </div>

      <!-- <script src="<?php //echo SERVERURL; ?>/dependencias/js/scriptBody.php"> </script> -->
      
      <!-- <script src="form-validation.js"></script> -->
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

      <script>
      let aTag = document.getElementById("linkUser")
      aTag.classList.add("active");
     </script>

     <script>
      // SCRIPT PARA QUE FUNCIONE EL CAMBIO ENTRE LOGIN Y REGISTRO
      var btnLogin = document.getElementById("btnLogin");
      var btnRegister = document.getElementById("btnRegister");
      var panelLogin = document.getElementById("pills-login");
      var panelRegistro = document.getElementById("pills-register");
      var linkLogin = document.getElementById("tab-login");
      var linkRegister = document.getElementById("tab-register");
      var FormLog = document.getElementById("FormLog");
      var FormReg = document.getElementById("FormReg");

      btnRegister.onclick = showRegister;
      btnLogin.onclick = showLogin;

      function showRegister()
      {
        panelRegistro.classList.add("show");
        panelRegistro.classList.add("active");
        linkRegister.classList.add("active");
        linkLogin.classList.remove("active");
        panelLogin.classList.remove("show");
        panelLogin.classList.remove("active");
        FormLog.classList.remove("was-validated");
        // FormReg.classList.add("needs-validation");

        // validacionAgain();

      }

      function showLogin()
      {
        panelRegistro.classList.remove("show");
        panelRegistro.classList.remove("active");
        linkRegister.classList.remove("active");
        linkLogin.classList.add("active");
        panelLogin.classList.add("show");
        panelLogin.classList.add("active");
        //FormLog.classList.add("needs-validation");
        FormReg.classList.remove("was-validated");

        // validacionAgain();
      }

      function validacionAgain(){
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
                    form.classList.add("no-valido")
                  }

                  form.classList.add('was-validated')
                }, false)
              })
      }
     </script>



    <?php
    require_once "main/public/bottom.php";
    ?>
