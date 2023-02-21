<?php
require_once "main/public/top.php";
?>

    <div class="container" style="border: 1px rgb(168, 168, 168) solid ; border-radius: 10px;
    padding: 10px;
    margin-top: 90px;
    margin-bottom: 10px;
    background-color: rgba(167, 251, 255, 0.275);
    max-width: 800px;">
        <!--Section: Contact v.2-->
      <section class="mb-4">

          <!--Section heading-->
          <h2 class="h1-responsive font-weight-bold text-center my-4">Contáctanos</h2>
          <!--Section description-->
          <p class="text-center w-responsive mx-auto mb-5">Si tienes alguna pregunta, no dudes en ponerte en contacto con nosotros

          </p>

          <div class="row">

              <!--Grid column-->
              <div class="col-md-9 mb-md-0 mb-5">
                  <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                      <!--Grid row-->
                      <div class="row">

                          <!--Grid column-->
                          <div class="col-md-6">
                              <div class="md-form mb-0">
                                  <input type="text" id="name" name="name" class="form-control">
                                  <label for="name" class="">Tu nombre</label>
                              </div>
                          </div>
                          <!--Grid column-->

                          <!--Grid column-->
                          <div class="col-md-6">
                              <div class="md-form mb-0">
                                  <input type="text" id="email" name="email" class="form-control">
                                  <label for="email" class="">Tu email</label>
                              </div>
                          </div>
                          <!--Grid column-->

                      </div>
                      <!--Grid row-->

                      <!--Grid row-->
                      <div class="row">
                          <div class="col-md-12">
                              <div class="md-form mb-0">
                                  <input type="text" id="subject" name="subject" class="form-control">
                                  <label for="subject" class="">Motivo</label>
                              </div>
                          </div>
                      </div>
                      <!--Grid row-->

                      <!--Grid row-->
                      <div class="row">

                          <!--Grid column-->
                          <div class="col-md-12">

                              <div class="md-form">
                                  <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                  <label for="message">Tu mensaje</label>
                              </div>

                          </div>
                      </div>
                      <!--Grid row-->

                  </form>

                  <div class="text-center text-md-left">
                      <a class="btn btn-primary" onclick="validateForm();">Send</a>
                  </div>
                  <div class="status"></div>
              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-md-3 text-center">
                  <ul class="list-unstyled mb-0">
                      <li><i class="fas fa-map-marker-alt fa-2x"></i>
                          <p>Miami Florida, FL 94126, USA</p>
                      </li>

                      <li><i class="fas fa-phone mt-4 fa-2x"></i>
                          <p>+ 01 234 567 89</p>
                      </li>

                      <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                          <p>contact@vinyervines.com</p>
                      </li>
                  </ul>
              </div>
              <!--Grid column-->

          </div>

      </section>
      <!--Section: Contact v.2-->
    </div>

      <script>
          function validateForm() {
            var name =  document.getElementById('name').value;
            if (name == "") {
                document.querySelector('.status').innerHTML = "Nombre no puede ir vacío";
                return false;
            }
            var email =  document.getElementById('email').value;
            if (email == "") {
                document.querySelector('.status').innerHTML = "Email no puede ir vacío";
                return false;
            } else {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if(!re.test(email)){
                    document.querySelector('.status').innerHTML = "Formato de email invalido";
                    return false;
                }
            }
            var subject =  document.getElementById('subject').value;
            if (subject == "") {
                document.querySelector('.status').innerHTML = "Motivo no puede ir vacío";
                return false;
            }
            var message =  document.getElementById('message').value;
            if (message == "") {
                document.querySelector('.status').innerHTML = "Mensaje no puede ir vacío";
                return false;
            }
            document.querySelector('.status').innerHTML = "Enviando...";
            }
      </script>

<?php
    require_once "main/public/bottom.php";
    ?>